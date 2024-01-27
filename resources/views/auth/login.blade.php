<x-authentication-card>
    <x-slot name="logo">
        <x-authentication-card-logo/>
    </x-slot>

    <form method="POST" wire:submit.prevent="submit">
        @csrf

        <div>
            <x-label for="email" value="{{ __('Email') }}"/>
            <x-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                     :value="old('email')" autofocus autocomplete="username"/>
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}"/>
            <x-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                     autocomplete="current-password"/>
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-checkbox id="remember_me" name="remember"/>
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ms-4" type="submit">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-authentication-card>
