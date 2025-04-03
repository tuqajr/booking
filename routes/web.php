<?php

use App\Http\Controllers\ProfileController;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/social-links', [ProfileController::class, 'updateSocialLinks'])->name('profile.update.social-links');
    Route::patch('/profile/bio', [ProfileController::class, 'updateBio'])->name('profile.update.bio');
    Route::post('/wishlist/add', [ProfileController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{hotelId}', [ProfileController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/wishlist', [ProfileController::class, 'viewWishlist'])->name('wishlist.view');
});

require __DIR__.'/auth.php';
