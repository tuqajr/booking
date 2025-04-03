<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-red-600">{{ __('Delete Account') }}</x-primary-button>

            @if (session('status') === 'account-deleted')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Deleted.') }}</p>
            @endif
        </div>
    </form>
</section>