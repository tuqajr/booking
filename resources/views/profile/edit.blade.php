<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Picture, Full Name, Email, and Stats Section -->
            <div class="bg-white shadow sm:rounded-lg p-6 flex items-center space-x-6 animate-fade-in">
                <div class="profile-picture">
                    <img src="{{ asset('storage/' . $user->image) }}" alt="Profile Picture" class="h-24 w-24 rounded-full object-cover">
                </div>
                <div class="flex-1">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                        <div class="bg-gray-100 p-4 rounded-lg shadow animate-fade-in">
                            <div class="text-center">
                                <dt class="text-sm font-medium text-gray-500">Total Reviews</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $user->reviews->count() }}</dd>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow animate-fade-in">
                            <div class="text-center">
                                <dt class="text-sm font-medium text-gray-500">Total Bookings</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $user->bookings->count() }}</dd>
                            </div>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg shadow animate-fade-in">
                            <div class="text-center">
                                <dt class="text-sm font-medium text-gray-500">Join Date</dt>
                                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $user->created_at->format('M d, Y') }}</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bio Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.update-bio-form')
                </div>
            </div>

            <!-- Social Media Links Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.update-social-media-links-form')
                </div>
            </div>

            <!-- Profile Information Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Wishlist Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.update-wishlist-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg animate-fade-in">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>