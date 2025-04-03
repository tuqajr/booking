<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Bio') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update.bio') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="bio" :value="__('Your Bio')" />
            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'bio-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>