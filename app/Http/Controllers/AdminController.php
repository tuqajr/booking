<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Review;

class AdminController extends Controller
{
    public function dashboard()
{
    $totalHotels = Hotel::count();
    $activeHotels = Hotel::whereHas('rooms', function ($query) {
        $query->where('capacity', '>', 0);
    })->count();
    $hotelWithMostReviews = Hotel::withCount('reviews')
    ->orderBy('reviews_count', 'desc')
    ->first();
    
    $totalUsers = User::count();
    $adminUsers = User::where('role', 'admin')->count();
    $newUsersThisMonth = User::whereMonth('created_at', now()->month)
    ->whereYear('created_at', now()->year)
    ->count();

    $totalRooms = Room::count();
    $occupiedRooms = Booking::where('status', 'confirmed')->count();
    $mostExpensiveRoom = Room::orderBy('price', 'desc')->first();

    $totalBookings = Booking::count();
    $pendingBookings = Booking::where('status', 'pending')->count();
    $monthlyRevenue = Booking::where('status', 'confirmed')
    ->whereMonth('created_at', now()->month)
    ->sum('price');

    $totalCoupons = Coupon::count();
    $activeCoupons = Coupon::where('expiry_date', '>=', now())->count();

    $totalReviews = Review::count();
    $averageRating = Review::avg('rating');
    $pendingReviews = Review::whereNull('is_approved')->count();

    return view('admin.homepage.index', compact('totalHotels', 'totalUsers', 'totalRooms', 'totalBookings', 'totalCoupons', 'totalReviews', 'activeHotels', 'hotelWithMostReviews', 
    'adminUsers', 'newUsersThisMonth', 'occupiedRooms', 'mostExpensiveRoom', 'pendingBookings', 'monthlyRevenue', 'activeCoupons', 'averageRating', 'pendingReviews'));
}

}