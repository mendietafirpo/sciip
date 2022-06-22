<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img class="block lg:hidden h-8 w-auto" src="{{ asset('/logo.png') }}" alt="sciip">
            <img style="overflow: hidden; border-radius:50%" class="hidden lg:block h-16 w-16" src="{{ asset('/logo.png') }}" alt="sciip">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>

            <div class="bg-indigo-500 hover:bg-indigo-800 mt-4 py-1 px-2 text-center rounded-md text-white"> <a href="{{ url('auth/google') }}">{{ __('Login with Google')}} </a></div>
            <div class="bg-violet-500 hover:bg-violet-800 hover:text-white mt-2 py-1 px-2 text-center rounded-md text-gray-200"> <a href="{{ url('auth/facebook') }}">{{ __('Login with Facebook')}} </a></div>
            <div class="hidden bg-pink-200 mt-2 py-1 px-2 text-center rounded-md text-gray-700"> <a href="{{ url('auth/github') }}">{{ __('Login with Github')}} </a></div>


        </form>
    </x-jet-authentication-card>
</x-guest-layout>
