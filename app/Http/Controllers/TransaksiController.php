<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('details')->get();

        $totalTarget = $wishlists->sum('harga');
        $totalTerkumpul = $wishlists->sum(function ($wishlist) {
            return $wishlist->details->sum('pemasukan');
        });

        $persentaseKeseluruhan = $totalTarget > 0 ? round(($totalTerkumpul / $totalTarget) * 100, 1) : 0;
        $sisaKekurangan = max(0, $totalTarget - $totalTerkumpul);

        return view('transaksi.index', [
            'wishlists' => $wishlists,
            'totalTarget' => $totalTarget,
            'totalTerkumpul' => $totalTerkumpul,
            'persentaseKeseluruhan' => $persentaseKeseluruhan,
            'sisaKekurangan' => $sisaKekurangan,
        ]);
    }
}
