<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-center font-medium text-3xl mb-8">Inicia sesión</h1>

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

            <x-jet-button class="mt-8 w-full py-3 flex justify-center">
                {{ __('Iniciar sesión') }}
            </x-jet-button>

            <div class="flex justify-center mt-4 font-bold text-sm">
                @if (Route::has('password.request'))
                    Olvidaste tu contraseña?
                    <a class="text-blue-600 hover:text-blue-900 pl-2" href="{{ route('password.request') }}">
                        {{ __('Recuperala aquí') }}
                    </a>
                @endif
            </div>
        </form>


        <div role="hidden" class="mt-12 border-t border-sky-600 mb-8">
            <span class="block w-max mx-auto -mt-4 px-4 text-center font-bolder text-blue-500 font-medium bg-white">O también</span>
        </div>

        <a href="{{ url('login/google') }}" class="inline-block w-full mb-4 py-3 px-6 rounded-xl bg-gray-100 hover:bg-gray-200 focus:bg-gray-200 active:bg-blue-200">
            <div class="flex gap-4 justify-center">
                <img src="{{ asset('images/google.svg') }}" class="w-5" alt="">
                <span class="block w-max font-medium tracking-wide text-sm text-black-900">Acceder con Google</span>
            </div>
        </a>
        <a href="{{ url('login/facebook') }}" class="inline-block mb-16 w-full py-3 px-6 rounded-xl bg-blue-900 transition hover:bg-blue-800 active:bg-blue-600 focus:bg-gray-700">
            <div class="flex gap-4 items-center justify-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
                <span class="block w-max font-medium tracking-wide text-sm text-white">Acceder con facebook</span>
            </div>
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="inline-block text-center w-full bg-gray-300 py-3 rounded-xl text-blue-600 font-medium px-6 hover:bg-gray-200">Crear cuenta</a>
        @endif
    </x-jet-authentication-card>
</x-guest-layout>
