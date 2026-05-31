<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = [
        'nama_wishlist',
        'deadline',
        'jumlah_barang',
        'harga',
        'gambar',
    ];

    public $timestamps = false;
}
