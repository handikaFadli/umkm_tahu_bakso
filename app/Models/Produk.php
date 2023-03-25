<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'kd_produk';

    protected $keyType = 'string';

    // protected $fillable = [
    //     'kd_produk',
    //     'nm_produk',
    //     'kategori',
    //     'stok',
    //     'harga',
    //     'ket',
    //     'gambar'
    // ];

    protected $guarded = [];
}
