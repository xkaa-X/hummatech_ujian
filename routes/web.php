<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\WishlistDetailController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist/create', [WishlistController::class, 'create'])->name('wishlist.create');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/wishlist/{wishlist}/edit', [WishlistController::class, 'edit'])->name('wishlist.edit');
    Route::patch('/wishlist/{wishlist}', [WishlistController::class, 'update'])->name('wishlist.update');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('/wishlist/{wishlist_id}/detail', [WishlistDetailController::class, 'index'])->name('wishlist-detail.index');
    Route::get('/wishlist/{wishlist_id}/detail/create', [WishlistDetailController::class, 'create'])->name('wishlist-detail.create');
    Route::post('/wishlist/{wishlist_id}/detail', [WishlistDetailController::class, 'store'])->name('wishlist-detail.store');
    Route::get('/wishlist/{wishlist_id}/detail/{detail_id}/edit', [WishlistDetailController::class, 'edit'])->name('wishlist-detail.edit');
    Route::patch('/wishlist/{wishlist_id}/detail/{detail_id}', [WishlistDetailController::class, 'update'])->name('wishlist-detail.update');
    Route::delete('/wishlist/{wishlist_id}/detail/{detail_id}', [WishlistDetailController::class, 'destroy'])->name('wishlist-detail.destroy');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::patch('/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

require __DIR__.'/auth.php';
