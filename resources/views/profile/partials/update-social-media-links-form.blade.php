<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Social Media Links') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.update.social-links') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="twitter" :value="__('Twitter')" />
            <x-text-input id="twitter" name="twitter" type="url" class="mt-1 block w-full" value="{{ old('twitter', $user->twitter) }}" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
        </div>

        <div>
            <x-input-label for="linkedin" :value="__('LinkedIn')" />
            <x-text-input id="linkedin" name="linkedin" type="url" class="mt-1 block w-full" value="{{ old('linkedin', $user->linkedin) }}" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'social-links-updated')
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