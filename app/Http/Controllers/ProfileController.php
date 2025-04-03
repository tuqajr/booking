<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Hotel;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $wishlist = $user->wishlist()->with('hotel')->get();
        $recentBookings = $user->bookings()->with('hotel')->latest()->take(5)->get();
        $recentReviews = $user->reviews()->with('hotel')->latest()->take(5)->get();

        return view('profile.edit', [
            'user' => $user,
            'wishlist' => $wishlist,
            'recentBookings' => $recentBookings,
            'recentReviews' => $recentReviews,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Add a hotel to the user's wishlist.
     */
    public function addToWishlist(Request $request): RedirectResponse
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $user = $request->user();
        $hotel = Hotel::findOrFail($request->hotel_id);

        if (!$user->wishlist->contains($hotel)) {
            $user->wishlist()->attach($hotel);
        }

        return Redirect::route('profile.edit')->with('status', 'wishlist-updated');
    }

    /**
     * Remove a hotel from the user's wishlist.
     */
    public function removeFromWishlist(Request $request, Hotel $hotel): RedirectResponse
    {
        $user = $request->user();

        if ($user->wishlist->contains($hotel)) {
            $user->wishlist()->detach($hotel);
        }

        return Redirect::route('profile.edit')->with('status', 'wishlist-updated');
    }
}