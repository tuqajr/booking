<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="{{ route('hotels.show', $hotel) }}" class="text-blue-600 hover:underline">
                &larr; Back to {{ $hotel->name }}
            </a>
        </div>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Reviews for {{ $hotel->name }}</h1>
                    <a href="{{ route('hotels.reviews.create', $hotel) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150" style="background-color: #4a6fa5">
                        Write a Review
                    </a>
                </div>
                
                @if (session('success'))
                    <div class="mb-4 bg-green-50 text-green-700 p-4 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if ($reviews->count() > 0)
                    <div class="space-y-6">
                        @foreach ($reviews as $review)
                            <div class="border-b pb-6 last:border-b-0 last:pb-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="flex items-center space-x-2">
                                            <span class="font-medium text-gray-800" style="margin-right: 0.5rem">{{ $review->user->name }}</span>
                                            <span class="text-gray-500 text-sm">{{ $review->created_at->format('M d, Y') }}</span>
                                        </div>
                                        {{-- <div class="flex space-x-1 mt-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }} fill-current" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="mt-3 text-gray-700">
                                    {{ $review->review }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        No reviews yet. Be the first to review this hotel!
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>