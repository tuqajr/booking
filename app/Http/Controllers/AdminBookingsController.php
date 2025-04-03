<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Room;

class AdminBookingsController extends Controller
{
    public function index(Request $request) {
        $users = User::all();
        $rooms = Room::all();
        $coupons = Coupon::all();
        $bookings = Booking::with(['user', 'coupon'])->orderBy('created_at', 'desc')->paginate(10);
        if ($request->ajax()) {
            return view('admin.bookings.table', compact('bookings', 'users', 'rooms', 'coupons'))->render();
        }
    
        return view('admin.bookings.index', compact('bookings', 'users', 'rooms', 'coupons'));
    
    }

    public function create() {
        $users = User::all();
        $rooms = Room::all();
        $coupons = Coupon::all();
        return view('admin.bookings.create', compact('users', 'rooms', 'coupons'));

    }


    public function store(Request $request) {

        $validatedData = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'room_id'   => 'required|exists:rooms,id',
            'coupon_id' => 'nullable|exists:coupons,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);


        Booking::create($validatedData); // Save the order
        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully!');
    }

    public function edit($id)
    {
        $users = User::all();
        $rooms = Room::all();
        $coupons = Coupon::all();
        $booking = Booking::findOrFail($id);

        if (request()->ajax()) {
            // Render the edit modal view with the order data
            $view = view('admin.bookings.edit', compact('booking', 'users', 'rooms', 'coupons'))->render();
            return response()->json(['html' => $view]);
        }

        // Fallback: Return a full view if the request is not AJAX (optional)
        return view('admin.bookings.edit', compact('booking', 'users', 'rooms', 'coupons'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id'   => 'required|exists:users,id',
            'room_id'   => 'required|exists:rooms,id',
            'coupon_id' => 'nullable|exists:coupons,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'price' => 'required|numeric',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update($validatedData);
        return redirect()->back()->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete(); // This sets the 'deleted_at' timestamp

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}