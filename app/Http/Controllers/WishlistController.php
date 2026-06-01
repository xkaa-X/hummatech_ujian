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
            $file = $request->file('gambar');
            $compressedPath = $this->compressAndStoreImage($file);
            if ($compressedPath) {
                $validated['gambar'] = $compressedPath;
            } else {
                $validated['gambar'] = $file->store('wishlist', 'public');
            }
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
            
            $file = $request->file('gambar');
            $compressedPath = $this->compressAndStoreImage($file);
            if ($compressedPath) {
                $validated['gambar'] = $compressedPath;
            } else {
                $validated['gambar'] = $file->store('wishlist', 'public');
            }
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

    private function compressAndStoreImage($file)
    {
        try {
            if (!extension_loaded('gd')) {
                return null;
            }

            $imageInfo = getimagesize($file->getRealPath());
            if (!$imageInfo) {
                return null;
            }

            list($width, $height, $type) = $imageInfo;
            
            // Limit max dimensions to 800px
            $maxDim = 800;
            if ($width > $maxDim || $height > $maxDim) {
                $ratio = $width / $height;
                if ($ratio > 1) {
                    $newWidth = $maxDim;
                    $newHeight = round($maxDim / $ratio);
                } else {
                    $newHeight = $maxDim;
                    $newWidth = round($maxDim * $ratio);
                }
            } else {
                $newWidth = $width;
                $newHeight = $height;
            }

            // Create image based on type
            switch ($type) {
                case IMAGETYPE_JPEG:
                    $src = imagecreatefromjpeg($file->getRealPath());
                    break;
                case IMAGETYPE_PNG:
                    $src = imagecreatefrompng($file->getRealPath());
                    break;
                case IMAGETYPE_GIF:
                    $src = imagecreatefromgif($file->getRealPath());
                    break;
                case IMAGETYPE_WEBP:
                    $src = imagecreatefromwebp($file->getRealPath());
                    break;
                default:
                    return null;
            }

            if (!$src) {
                return null;
            }

            $dst = imagecreatetruecolor($newWidth, $newHeight);
            
            // Handle transparency
            if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF || $type == IMAGETYPE_WEBP) {
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
                $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
                imagefilledrectangle($dst, 0, 0, $newWidth, $newHeight, $transparent);
            }

            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Generate unique filename on public/wishlist disk path
            $filename = 'wishlist/' . uniqid() . '.jpg';
            
            // Output to buffer as JPEG with 75% quality
            ob_start();
            imagejpeg($dst, null, 75);
            $imageData = ob_get_clean();

            // Destroy GD resources
            imagedestroy($src);
            imagedestroy($dst);

            // Save to public disk
            Storage::disk('public')->put($filename, $imageData);
            return $filename;
        } catch (\Throwable $e) {
            return null; // Fallback to original store
        }
    }
}
