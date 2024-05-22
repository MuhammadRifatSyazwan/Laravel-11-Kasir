<div>
    <div class="container">
        <div class="row my-2">
            <div class="col-12">

                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua produk
                </button>

                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah produk
                </button>
                <button wire:click="pilihMenu('excel')"
                    class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Import produk
                </button>
                <button wire:loading class="btn btn-info">
                    Loading...
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu=='lihat')
                    <div class="card">
                        <div class="card border-primary">
                            <div class="card-header">
                                Semua produk
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Data</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($semuaProduk as $produk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $produk->kode }}</td>
                                                <td>{{ $produk->name }}</td>
                                                <td>{{ $produk->harga }}</td>
                                                <td>{{ $produk->stok }}</td>
                                                <td>
                                                    <button wire:click="pilihEdit({{-- 'edit',--}} {{ $produk->id }})" 
                                                        class="btn {{ $pilihanMenu=='edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                        Edit produk
                                                    </button>
                                                    <button wire:click="pilihHapus({{--'hapus',--}} {{ $produk->id }})"
                                                        class="btn {{ $pilihanMenu=='hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                                        Hapus produk
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </div>
                        </div>
                    </div>
                @elseif ($pilihanMenu=='tambah')
                    <div class="card">
                        <div class="card border-primary">
                            <div class="card-header">
                                tambah produk
                            </div>
                            <div class="card-body">
                                <form wire:submit='simpan'>
                                    <label>nama</label>
                                    <input type="text" class="form-control" wire:model='nama' />
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>kode / Barcode</label>
                                    <input type="text" class="form-control" wire:model='kode' />
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>Harga</label>
                                    <input type="number" class="form-control" wire:model='harga' />
                                    @error('harga')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>Stock</label>
                                    <input type="number" class="form-control" wire:model='stok' />
                                    @error('stok')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif ($pilihanMenu=='edit')
                    <div class="card">
                        <div class="card border-primary">
                            <div class="card-header">
                                Edit produk
                            </div>
                            <div class="card-body">
                                <form wire:submit='edit'>
                                    <label>nama</label>
                                    <input type="text" class="form-control" wire:model='nama' />
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>kode / Barcode</label>
                                    <input type="text" class="form-control" wire:model='kode' />
                                    @error('kode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>Harga</label>
                                    <input type="number" class="form-control" wire:model='harga' />
                                    @error('harga')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <label>Stock</label>
                                    <input type="number" class="form-control" wire:model='stok' />
                                    @error('stok')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @elseif ($pilihanMenu=='hapus')
                    <div class="card">
                        <div class="card border-danger">
                            <div class="card-header bg-danger txet-white">
                                Hapus produk
                            </div>
                            <div class="card-body">
                                <br/>
                                Anda yakin akan menghapus produk ini ?
                                <p>Nama : {{ $produkTerpilih->name }}</p>
                                <p>kode : {{ $produkTerpilih->kode }}</p>
                                
                                <button class="btn btn-danger" wire:click='hapus'>HAPUS</button>
                                <button class="btn btn-secodary" wire:click='batal'>BATAL</button>
                            </div>
                        </div>
                    </div>
                    @elseif ($pilihanMenu=='excel')
                    <div class="card">
                        <div class="card border-primary">
                            <div class="card-header bg-primary text-white">
                                Import produk
                            </div>
                            <div class="card-body">
                                <form action="" wire:submit='importExcel'>
                                    <input type="file" class="form-control" wire:model='fileExcel'>
                                    <br>
                                    <button class="btn btn-primary" type="submit">KIRIM</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
{{-- 17.41 --}}
