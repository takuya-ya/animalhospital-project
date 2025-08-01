<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" max-w-md mx-auto p-6 rounded-2xl shadow mb-10 relative" style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

        <!-- 左下にparrot画像-->
        <img src="/img/parrot.png"
            alt="parrot"
            class="absolute -bottom-10 left-0 w-20 h-auto pb-19">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-primary-button class="ms-3 bg-orange-500 hover:bg-gray-400 active:bg-orange-600">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- 新規アカウント登録ボタン -->
    <div class="mt-6 text-center">
        <a href="{{ route('register') }}"
            class="inline-block w-[370px] px-6 py-2 text-sm font-semibold text-white bg-orange-500 rounded-lg hover:bg-orange-500 transition text-center"
            style="font-family: 'M PLUS Rounded 1c';">
            新規アカウント登録はこちらから
        </a>
    </div>

</x-guest-layout>