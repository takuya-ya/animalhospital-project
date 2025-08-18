<x-guest-layout>

    <div class=" max-w-md mx-auto p-6 rounded-2xl shadow mt-7 relative" 
         style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

        <!-- 左上にbirds画像（さらに上へ移動）-->
        <img src="/img/birds.png"
            alt="birds"
            class="absolute -top-14 left-30 w-20 h-auto">

        <!-- 右上にchameleon画像（さらに上へ移動）-->
        <img src="/img/chameleon.png"
            alt="chameleon"
            class="absolute -top-9 right-2 w-20 h-auto">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-[#715433] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <div class="text-center pt-4">
                <button type="submit"
                    class="w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
                    登録
                </button>
            </div>
        </form>
</x-guest-layout>