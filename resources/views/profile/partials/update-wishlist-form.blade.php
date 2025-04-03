<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Wishlist') }}
        </h2>
    </header>

    @if ($wishlist->isEmpty())
        <p class="mt-6">{{ __('Your list is empty.') }}</p>
    @else
        <div class="mt-6 space-y-6">
            @foreach ($wishlist as $hotel)
                <div class="p-4 bg-white shadow sm:rounded-lg flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $hotel->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $hotel->description }}</p>
                    </div>
                    <form method="post" action="{{ route('wishlist.remove', ['hotel' => $hotel->id]) }}">
                        @csrf
                        @method('delete')
                        <x-primary-button>{{ __('Remove from Wishlist') }}</x-primary-button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</section>