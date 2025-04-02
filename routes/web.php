<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Home Page
Route::get('/home', [PageController::class, 'home'])->name('home');

// Hotels Page
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/reservations/hotel/{id}', [ReservationController::class, 'showHotel'])->name('reservations.hotel');
    Route::get('/reservations/create/{roomId}', [ReservationController::class, 'createReservation'])->name('reservations.create');
    Route::post('/reservations/check-availability', [ReservationController::class, 'checkAvailability'])->name('reservations.check-availability');
    Route::post('/reservations/validate-coupon', [ReservationController::class, 'validateCoupon'])->name('reservations.validate-coupon');
    Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/confirmation/{id}', [ReservationController::class, 'confirmation'])->name('reservations.confirmation');
    Route::get('/my-reservations', [ReservationController::class, 'userReservations'])->name('reservations.my-reservations');
    Route::post('/reservations/cancel/{id}', [ReservationController::class, 'cancelReservation'])->name('reservations.cancel');
});

// Contact Us Page
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';


