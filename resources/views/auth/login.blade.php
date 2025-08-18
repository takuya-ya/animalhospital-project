<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <div class=" max-w-md mx-auto p-6 rounded-2xl shadow mb-10 relative" style="background-color: #FFFFFF; border: 2px solid #FFB85C; ">

        <!-- 左下にparrot画像-->
        <img src="/img/parrot.png"
            alt="parrot"
            class="absolute -bottom-10 left-0 w-20 h-auto pb-19">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium mb-1 text-[#715433]" />
                <x-text-input id="email"
                    class="px-4 py-2"
                    type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"
                    class="px-4 py-2"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                        type="checkbox"
                        class="rounded border-[#715433] text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <span class="ms-2 text-sm text-[#715433] ">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-[#715433] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <button type="submit"
                    class="block w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
                    ログイン
                </button>
            </div>
        </form>
    </div>

    <!-- 新規アカウント登録ボタン -->
    <p class="text-center antialiased"
        style="font-family: 'M PLUS Rounded 1c', sans-serif; color: #715433;">
        新規アカウント登録はこちらから
    </p>
    <div class="mt-3 text-center">
        <a href="{{ route('register') }}"
            class="inline-block w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
            会員登録
        </a>
    </div>

</x-guest-layout>