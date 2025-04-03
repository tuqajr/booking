<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Hotel;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();
        $wishlist = $user->wishlist()->with('hotel')->get();
        
        return view('profile.edit', [
            'user' => $user,
            'hotels' => Hotel::all(),
            'profileStats' => $this->getProfileStats($user),
            'bio' => $user->bio,
            'socialMediaLinks' => $this->getSocialMediaLinks($user),
            'profilePicture' => $user->image,
            'wishlist' => $wishlist,
        ]);
    }

    private function getProfileStats(User $user)
    {
        return [
            'wishlist_count' => $user->wishlist()->count(),
            'reviews_count' => $user->reviews()->count(),
            'bookings_count' => $user->bookings()->count(),
        ];
    }

    private function getSocialMediaLinks(User $user)
    {
        return [
            'twitter' => $user->twitter,
            'linkedin' => $user->linkedin,
        ];
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->update($request->validated());
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

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

    public function updateSocialLinks(Request $request)
    {
        $request->validate([
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $user = Auth::user();
        $user->update([
            'twitter' => $request->input('twitter'),
            'linkedin' => $request->input('linkedin'),
        ]);

        return back()->with('status', 'social-links-updated');
    }

    public function updateBio(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $user->update([
            'bio' => $request->input('bio'),
        ]);

        return back()->with('status', 'bio-updated');
    }

    public function addToWishlist(Request $request): RedirectResponse
    {
        $user = $request->user();
        $hotel = Hotel::findOrFail($request->input('hotel_id'));
        $user->wishlist()->attach($hotel->id);
        return Redirect::route('wishlist.view')->with('status', 'hotel-added');
    }

    public function removeFromWishlist($hotelId): RedirectResponse
    {
        $user = Auth::user();
        $hotel = Hotel::findOrFail($hotelId);
        $user->wishlist()->detach($hotel->id);
        return Redirect::route('wishlist.view')->with('status', 'hotel-removed');
    }

    public function viewWishlist(): View
    {
        $user = Auth::user();
        $wishlist = $user->wishlist()->with('hotel')->get();
        return view('profile.wishlist', compact('wishlist'));
    }
}
