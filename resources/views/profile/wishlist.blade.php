<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wishlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($wishlist->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ __('Your list is empty.') }}
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($wishlist as $item)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <img src="{{ asset('storage/' . $item->hotel->image) }}" alt="{{ $item->hotel->name }}" class="w-full h-48 object-cover">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <h3 class="text-lg font-semibold">{{ $item->hotel->name }}</h3>
                                <form method="POST" action="{{ route('wishlist.remove', $item->hotel->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="mt-3">{{ __('Remove from Wishlist') }}</x-primary-button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>