<x-guest-layout>
    <div class="mb-4 text-sm  text-[#715433]">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="text-center pt-4">
            <button type="submit"
                class="bg-[#0CC0DF] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
                パスワード再登録
            </button>
        </div>
    </form>
</x-guest-layout>