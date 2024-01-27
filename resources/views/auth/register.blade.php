<x-authentication-card>
    <x-slot name="logo">
        <x-authentication-card-logo/>
    </x-slot>

    <form wire:submit.prevent="submit">
        @csrf

        <div>
            <x-label for="first_name" value="{{ __('First Name') }}"/>
            <x-input wire:model="user.first_name" id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                     :value="old('user.first_name')" autofocus autocomplete="first_name"/>
            <x-input-error for="user.first_name" />
        </div>

        <div>
            <x-label for="last_name" value="{{ __('Last Name') }}"/>
            <x-input wire:model="user.last_name" id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                     :value="old('user.last_name')" autofocus autocomplete="last_name"/>
            @error('user.last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-label for="email" value="{{ __('Email') }}"/>
            <x-input wire:model="user.email" id="email" class="block mt-1 w-full" type="email" name="email"
                     :value="old('user.email')" autocomplete="username"/>
            @error('user.email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}"/>
            <x-input wire:model="user.password" id="password" class="block mt-1 w-full" type="password" name="password"
                     autocomplete="new-password"/>
            @error('user.password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
            <x-input wire:model="user.password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                     type="password" name="password_confirmation" autocomplete="new-password"/>
            @error('user.password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ms-4" type="submit">
                {{ __('Register') }}
            </x-button>
        </div>
    </form>
</x-authentication-card>
