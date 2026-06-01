<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\WishlistDetail;
use Illuminate\Http\Request;

class WishlistDetailController extends Controller
{
    public function index($wishlist_id)
    {
        $wishlist = Wishlist::findOrFail($wishlist_id);
        $details = WishlistDetail::where('wishlist_id', $wishlist_id)->orderBy('tanggal', 'desc')->get();
        
        $terkumpul = $details->sum('pemasukan');
        $progress = $wishlist->harga > 0 ? round(($terkumpul / $wishlist->harga) * 100, 1) : 0;
        
        return view('wishlist-detail.index', compact('wishlist', 'details', 'terkumpul', 'progress'));
    }

    public function create($wishlist_id)
    {
        $wishlist = Wishlist::findOrFail($wishlist_id);
        return view('wishlist-detail.create', compact('wishlist'));
    }

    public function store(Request $request, $wishlist_id)
    {
        $request->validate([
            'pemasukan' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $wishlist = Wishlist::findOrFail($wishlist_id);

        WishlistDetail::create([
            'wishlist_id' => $wishlist->id,
            'pemasukan' => $request->pemasukan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('wishlist-detail.index', $wishlist->id)
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($wishlist_id, $detail_id)
    {
        $wishlist = Wishlist::findOrFail($wishlist_id);
        $detail = WishlistDetail::where('wishlist_id', $wishlist_id)->findOrFail($detail_id);
        
        return view('wishlist-detail.edit', compact('wishlist', 'detail'));
    }

    public function update(Request $request, $wishlist_id, $detail_id)
    {
        $request->validate([
            'pemasukan' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $detail = WishlistDetail::where('wishlist_id', $wishlist_id)->findOrFail($detail_id);
        $detail->update([
            'pemasukan' => $request->pemasukan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('wishlist-detail.index', $wishlist_id)
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($wishlist_id, $detail_id)
    {
        $detail = WishlistDetail::where('wishlist_id', $wishlist_id)->findOrFail($detail_id);
        $detail->delete();

        return redirect()->route('wishlist-detail.index', $wishlist_id)
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
