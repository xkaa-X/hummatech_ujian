<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistDetail extends Model
{
    protected $table = 'wishlist_detail';

    protected $fillable = [
        'wishlist_id',
        'pemasukan',
        'kategori',
        'tanggal',
    ];

    public $timestamps = false;

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
