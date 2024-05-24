<?php

// namespace App\Livewire;

use App\Models\DetilTransaksi;
use App\Models\Transaksi as ModelsTransaksi;
use Livewire\Component;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class Transaksi extends Component
{
    public $kode, $total, $kembalian, $totalSemuaBelanja;
    public $bayar = 0;
    public $transaksiAktif;

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->kode = 'INV' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();
    }

    public function hapusProduk($id)
    {
        $detil = DetilTransaksi::find($id);
        if ($detil) {
            $produk = Produk::find($detil->produk_id);
            if ($produk) {
                $produk->stok += $detil->jumlah;
                $produk->save();
            }
            $detil->delete();
        }
        $this->updateTotal();
    }

    public function transaksiSelesai()
    {
        $this->transaksiAktif->total = $this->totalSemuaBelanja;
        $this->transaksiAktif->status = 'selesai';
        $this->transaksiAktif->save();
        $this->reset();
    }

    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $detilTransaksi = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            foreach ($detilTransaksi as $detil) {
                $produk = Produk::find($detil->produk_id);
                if ($produk) {
                    $produk->stok += $detil->jumlah;
                    $produk->save();
                }
                $detil->delete();
            }
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updatedKode()
    {
        DB::beginTransaction();

        try {
            $produk = Produk::where('kode', $this->kode)->first();
            if ($produk && $produk->stok > 0) {
                $detil = DetilTransaksi::firstOrNew(
                    [
                        'transaksi_id' => $this->transaksiAktif->id,
                        'produk_id' => $produk->id,
                    ],
                    [
                        'jumlah' => 0,
                    ]
                );
                $detil->jumlah += 1;
                $detil->save();
                $produk->stok -= 1;
                $produk->save();
                $this->reset('kode');
                $this->updateTotal();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            session()->flash('error', 'Terjadi kesalahan saat menambah produk ke transaksi.');
        }
    }

    public function updatedBayar()
    {
        $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
    }

    public function updateTotal()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detil) {
                return $detil->produk->harga * $detil->jumlah;
            });
        } else {
            $this->totalSemuaBelanja = 0;
        }
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $this->kode = $produk->kode;
            // Isi properti lain sesuai kebutuhan
        }
    }

    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetilTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
            $this->totalSemuaBelanja = $semuaProduk->sum(function ($detil) {
                return $detil->produk->harga * $detil->jumlah;
            });
        } else {
            $semuaProduk = [];
        }

        return view('livewire.transaksi')
            ->with([
                'semuaProduk' => $semuaProduk
            ]);
    }
}
