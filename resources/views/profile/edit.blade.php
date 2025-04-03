<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Stats Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex items-center space-x-4">
                        <img class="w-16 h-16 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">{{ $user->name }}</h3>
                            <p class="text-sm text-gray-600">{{ $user->email }}</p>
                            <p class="text-sm text-gray-600">{{ __('Member since') }} {{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Wishlist Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-wishlist-form', ['wishlist' => $wishlist])
                </div>
            </div>

            <!-- User Activity Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Recent Activity') }}</h3>
                    <ul class="mt-6 space-y-4">
                        @foreach ($recentBookings as $booking)
                            <li class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-md font-semibold">{{ $booking->hotel->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ __('Booked on') }} {{ $booking->created_at->format('M d, Y') }}</p>
                                </div>
                                <x-primary-button>{{ __('View Booking') }}</x-primary-button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- User Reviews Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Recent Reviews') }}</h3>
                    <ul class="mt-6 space-y-4">
                        @foreach ($recentReviews as $review)
                            <li class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-md font-semibold">{{ $review->hotel->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ __('Reviewed on') }} {{ $review->created_at->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-800">{{ $review->content }}</p>
                                </div>
                                <x-primary-button>{{ __('View Review') }}</x-primary-button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Update Profile Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>