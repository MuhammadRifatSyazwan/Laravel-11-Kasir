<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;

class ProdukComponent extends Component
{
    public $nama, $kode, $harga, $stok, $produkId;

    public function edit()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:produks,kode,' . $this->produkId, // Pastikan kode unik kecuali untuk produk saat ini
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $produk = Produk::find($this->produkId); // Menggunakan model Produk
        if ($produk) {
            $produk->nama = $this->nama;
            $produk->kode = $this->kode;
            $produk->harga = $this->harga;
            $produk->stok = $this->stok;
            $produk->save();
        }

        $this->reset(['nama', 'kode', 'harga', 'stok', 'produkId']);

        session()->flash('message', 'Produk berhasil diperbarui.');
    }

    public function editProduk($id)
    {
        $produk = Produk::find($id); // Menggunakan model Produk
        if ($produk) {
            $this->produkId = $produk->id;
            $this->nama = $produk->nama;
            $this->kode = $produk->kode;
            $this->harga = $produk->harga;
            $this->stok = $produk->stok;
        }
    }

    public function render()
    {
        return view('livewire.produk-component', [
            'semuaProduk' => Produk::all() // Mengirimkan semua produk ke view
        ]);
    }
}
