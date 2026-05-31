<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WishlistController extends Controller
{
    public function index()
    {
        // Tampilan saja (hindari error jika table wishlist belum ada)
        try {
            $wishlists = Wishlist::all();
        } catch (\Throwable $e) {
            $wishlists = collect();
        }

        return view('wishlist.index', compact('wishlists'));
    }

    public function create()
    {
        return view('wishlist.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_wishlist' => 'required|string|max:255',
            'deadline' => 'required|date',
            'jumlah_barang' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('wishlist', 'public');
        }

        Wishlist::create($validated);

        return redirect()->route('wishlist.index')
            ->with('success', 'Wishlist berhasil ditambahkan.');
    }

    public function edit(Wishlist $wishlist)
    {
        return view('wishlist.edit', compact('wishlist'));
    }

    public function update(Request $request, Wishlist $wishlist)
    {
        $validated = $request->validate([
            'nama_wishlist' => 'required|string|max:255',
            'deadline' => 'required|date',
            'jumlah_barang' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        if ($request->hasFile('gambar')) {
            if ($wishlist->gambar) {
                Storage::disk('public')->delete($wishlist->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('wishlist', 'public');
        }

        $wishlist->update($validated);

        return redirect()->route('wishlist.index')
            ->with('success', 'Wishlist berhasil diperbarui.');
    }

    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->gambar) {
            Storage::disk('public')->delete($wishlist->gambar);
        }
        $wishlist->delete();

        return redirect()->route('wishlist.index')
            ->with('success', 'Wishlist berhasil dihapus.');
    }
}
