<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
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
});

require __DIR__.'/auth.php';
