<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Produk as ImportProduk;

class Produk extends Component
{
    use WithFileUploads;

    public $pilihanMenu;
    public $kode;
    public $nama;
    public $harga;
    public $stok;
    public $produkTerpilih;
    public $fileExcel;
    public $produkId;

    public function mount()
    {
        if(auth()->user()->peran != 'admin'){
            abort(403);
        }
    }

    public function importExcel()
    {
        try {
            Excel::import(new ImportProduk, $this->fileExcel);
            $this->reset();
        } catch (\Exception $e) {
            report($e); // or use your preferred logging method
            session()->flash('error', 'There was an error importing the file.');
        }
    }

    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->nama = $this->produkTerpilih->nama;
        $this->kode = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => ['required', 'unique:produks,kode,' . $this->produkTerpilih->id],
            'harga' => 'required',
            'stok' => 'required',
        ],[
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode telah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        $this->produkTerpilih->update([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $this->reset();
        $this->pilihanMenu = 'simpan';
        session()->flash('message', 'Produk berhasil diperbarui.');
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
        session()->flash('message', 'Produk berhasil dihapus.');
    }

    public function batal()
    {
        $this->reset();
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => ['required', 'unique:produks,kode'],
            'harga' => 'required',
            'stok' => 'required',
        ],[
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode telah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        ModelProduk::create([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $this->reset(['nama', 'kode', 'harga', 'stok']);
        $this->pilihanMenu = 'lihat';
        session()->flash('message', 'Produk berhasil disimpan.');
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.produk')->with([
            'semuaProduk' => ModelProduk::all()
        ]);
    }
}
