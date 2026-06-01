<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $wishlists = Wishlist::with('details')->get();
        } catch (\Throwable $e) {
            $wishlists = collect();
        }

        $totalTarget = $wishlists->sum('harga');
        
        $totalTerkumpul = 0;
        $tercapai = collect();
        $belumTercapai = collect();

        foreach ($wishlists as $wishlist) {
            $terkumpul = $wishlist->details->sum('pemasukan');
            $totalTerkumpul += $terkumpul;
            
            // Simpan info terkumpul ke object wishlist agar bisa dipakai di view
            $wishlist->terkumpul = $terkumpul;
            
            if ($wishlist->harga > 0 && $terkumpul >= $wishlist->harga) {
                $tercapai->push($wishlist);
            } else {
                $belumTercapai->push($wishlist);
            }
        }

        return view('dashboard', compact(
            'totalTarget',
            'totalTerkumpul',
            'tercapai',
            'belumTercapai'
        ));
    }
}
