<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use App\Models\Produk;

class DetilTransaksi extends Model
{
    use HasFactory;
    //  /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var array
    //  */
    protected $fillable = [
        'transaksi_id', // Menambahkan transaksi_id ke dalam fillable
        // tambahkan atribut lain yang ingin diisi secara massal
        'produk_id',
        'jumlah',
        // 'harga',
        // dll.
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
