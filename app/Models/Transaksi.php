<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode', 'total', 'status',
    ];

    public function detilTransaksis()
    {
        return $this->hasMany(DetilTransaksi::class);
    }

    // Metode untuk membuat transaksi baru
    public static function buatBaru()
    {
        return static::create([
            'kode' => 'INV' . date('YmdHis'),
            'total' => 0,
            'status' => 'pending',
        ]);
    }

    // Metode untuk menyelesaikan transaksi
    public function selesaikanTransaksi($totalBelanja)
    {
        $this->total = $totalBelanja;
        $this->status = 'selesai';
        $this->save();
    }

    // Metode untuk membatalkan transaksi
    public function batalkanTransaksi()
    {
        foreach ($this->detilTransaksis as $detil) {
            $produk = $detil->produk;
            $produk->stok += $detil->jumlah;
            $produk->save();
            $detil->delete();
        }
        $this->delete();
    }
}