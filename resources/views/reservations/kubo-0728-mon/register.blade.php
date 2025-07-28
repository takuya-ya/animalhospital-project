<x-guest-layout>

    <!-- 変更箇所　ここから　フレーム追加 -->
    <div class=" max-w-md mx-auto p-6 rounded-2xl shadow mt-7 relative" style="background-color: #FFFFFF; border: 2px solid #FFB85C;">
        
        <!-- 左上にbirds画像（さらに上へ移動）-->
        <img src="/img/birds.png"
            alt="birds"
            class="absolute -top-14 left-30 w-20 h-auto">

        <!-- 右上にchameleon画像（さらに上へ移動）-->
        <img src="/img/chameleon.png"
            alt="chameleon"
            class="absolute -top-9 right-2 w-20 h-auto">
    <!-- ここまで↑ -->




        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 bg-orange-100" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 bg-orange-100" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 bg-orange-100"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50 bg-orange-100"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>