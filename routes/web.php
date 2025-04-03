<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRoomsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminHotelsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminCouponsController;
use App\Http\Controllers\AdminReviewsController;
use App\Http\Controllers\AdminBookingsController;
use App\Http\Controllers\FeaturedHotelsController;



Route::get('/', [FeaturedHotelsController::class, 'index']
)->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Home Page
Route::get('/home', [FeaturedHotelsController::class, 'index'])->name('home');

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


Route::prefix('admin')->name('admin.')->middleware('checkAdmin')->group(function () {
        
    //users CRUD
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('homepage.index');

    //users CRUD
    Route::get('/users', [AdminUsersController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [AdminUsersController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminUsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [AdminUsersController::class, 'update'])->name('users.update');
    Route::get('/users/{id}', [AdminUsersController::class, 'show'])->name('users.show');

    //hotels CRUD
    Route::get('/hotels', [AdminHotelsController::class, 'index'])->name('hotels.index');
    Route::delete('/hotels/{id}', [AdminHotelsController::class, 'destroy'])->name('hotels.destroy');
    Route::get('/hotels/create', [AdminHotelsController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [AdminHotelsController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{id}/edit', [AdminHotelsController::class, 'edit'])->name('hotels.edit');
    Route::put('/hotels/{id}', [AdminHotelsController::class, 'update'])->name('hotels.update');
    Route::get('/hotels/{id}', [AdminHotelsController::class, 'show'])->name('hotels.show');

    //Rooms CRUD
    Route::get('/rooms', [AdminRoomsController::class, 'index'])->name('rooms.index');
    Route::delete('/rooms/{id}', [AdminRoomsController::class, 'destroy'])->name('rooms.destroy');
    Route::get('/rooms/create', [AdminRoomsController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [AdminRoomsController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [AdminRoomsController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [AdminRoomsController::class, 'update'])->name('rooms.update');

    //Bookings CRUD
    Route::get('/bookings', [AdminBookingsController::class, 'index'])->name('bookings.index');
    Route::delete('/bookings/{id}', [AdminBookingsController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/create', [AdminBookingsController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [AdminBookingsController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [AdminBookingsController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [AdminBookingsController::class, 'update'])->name('bookings.update');

    //Coupons CRUD
    Route::get('/coupons', [AdminCouponsController::class, 'index'])->name('coupons.index');
    Route::delete('/coupons/{id}', [AdminCouponsController::class, 'destroy'])->name('coupons.destroy');
    Route::get('/coupons/create', [AdminCouponsController::class, 'create'])->name('coupons.create');
    Route::post('/coupons', [AdminCouponsController::class, 'store'])->name('coupons.store');
    Route::get('/coupons/{id}/edit', [AdminCouponsController::class, 'edit'])->name('coupons.edit');
    Route::put('/coupons/{id}', [AdminCouponsController::class, 'update'])->name('coupons.update');
   
    //Reviews CRUD
    Route::get('/reviews', [AdminReviewsController::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{id}', [AdminReviewsController::class, 'destroy'])->name('reviews.destroy');
    Route::post('/reviews/{id}/{actionType}', [AdminReviewsController::class, 'update'])->name('reviews.update');
});



/////////////////

Route::middleware(['auth'])->group(function () {
    // Create a new review form
    Route::get('/hotels/{hotel}/reviews/create', [ReviewController::class, 'create'])
        ->name('hotels.reviews.create');
    
    // Store a new review
    Route::post('/hotels/{hotel}/reviews', [ReviewController::class, 'store'])
        ->name('hotels.reviews.store');
    
    // View all reviews for a hotel
    Route::get('/hotels/{hotel}/reviews', [ReviewController::class, 'index'])
        ->name('hotels.reviews.index');
});