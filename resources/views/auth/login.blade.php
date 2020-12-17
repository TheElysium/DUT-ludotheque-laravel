<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
<img src="{{ asset("images/logo_rancho.png") }}" class="mt-5 d-block ml-auto mr-auto">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="col-12 d-flex flex-column align-items-center">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4 col-12 d-flex flex-column align-items-center">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 col-12 d-flex flex-column align-items-center">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="col-12 d-flex flex-column align-items-center">
                <x-jet-button class="ml-4" style="color:black !important;">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            <div class="d-flex flex-column align-items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-md" style="color:black;" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
