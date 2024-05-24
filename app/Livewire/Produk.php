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

        // public function mount()
        // {
        //     if (auth()->user()->peran != 'admin') {
        //         abort(403);
        //     }
        // }

        public function importExcel()
        {
            try {
                Excel::import(new ImportProduk, $this->fileExcel);
                $this->reset();
            } catch (\Exception $e) {
                // Handle the exception, maybe log the error or show a message to the user
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
                'kode' => ['required', 'unique:produks,kode,' . $this->produkTerpilih->id], // Fixed validation rule and table name
                'harga' => 'required',
                'stok' => 'required',
            ], [
                'nama.required' => 'Nama Harus Diisi',
                'kode.required' => 'Kode Harus Diisi',
                'kode.unique' => 'Kode telah digunakan', // Fixed the error message key
                'harga.required' => 'Harga Harus Diisi', // Added missing error message
                'stok.required' => 'Stok Harus Diisi'
            ]);


            $simpan = $this->produkTerpilih;
            $simpan->nama = $this->nama;
            $simpan->kode = $this->kode;
            $simpan->stok = $this->stok;
            $simpan->harga = $this->harga;
            $simpan->save();

            $this->reset();
            $this->pilihanMenu = 'simpan';
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
        }
        public function batal()
        {
            $this->reset();
        }

        public function simpan()
        {
            $this->validate([
                'nama' => 'required',
                'kode' => ['required', 'unique:produks,kode'], // Fixed validation rule and table name
                'harga' => 'required',
                'stok' => 'required',

            ], [
                'nama.required' => 'Nama Harus Diisi',
                'kode.required' => 'Kode Harus Diisi',
                'kode.unique' => 'Kode telah digunakan', // Fixed the error message key
                'harga.required' => 'Harga Harus Diisi', // Added missing error message
                'stok.required' => 'Stok Harus Diisi',
            ]);

            $simpan = new ModelProduk();
            $simpan->nama = $this->nama;
            $simpan->kode = $this->kode;
            $simpan->stok = $this->stok;
            $simpan->harga = $this->harga;
            $simpan->save();

            $this->reset(['nama', 'kode', 'stok', 'harga']);
            $this->pilihanMenu = 'lihat';
        }
        public function pilihMenu($menu)
        {
            $this->pilihanMenu = $menu;
        }

        public function editProduk($id)
        {
            $produk = Produk::find($id);
            if ($produk) {
                $this->produkId = $produk->id;
                $this->nama = $produk->nama;
                $this->kode = $produk->kode;
                $this->harga = $produk->harga;
                $this->stok = $produk->stok;
            }
        }


        public $produkId;

        // Metode untuk mengedit produk
        public function edit()
        {
            // Validasi data input
            $this->validate([
                'nama' => 'required|string|max:255',
                'kode' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
            ]);

            // Temukan produk berdasarkan ID
            $produk = Produk::find($this->produkId);
            if ($produk) {
                // Perbarui data produk
                $produk->nama = $this->nama;
                $produk->kode = $this->kode;
                $produk->harga = $this->harga;
                $produk->stok = $this->stok;
                $produk->save();
            }

            // Reset input form
            // $this->reset();

            // Flash message atau tindakan lain setelah edit berhasil
            session()->flash('message', 'Produk berhasil diperbarui.');
        }


        public function render()
        {
            return view('livewire.produk')->with([
                'semuaProduk' => ModelProduk::all()
            ]);
        }
    }
