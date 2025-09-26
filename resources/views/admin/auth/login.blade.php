{{-- クラスベース・コンポーネント(App\View\Components\GuestLayout)で制御 --}}
<x-guest-layout>
    <div class="max-w-[960px] mx-auto px-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="mb-4 text-sm text-gray-600 text-center">
            <h2 class="text-xl font-semibold text-gray-900 mb-2">管理画面ログイン</h2>
            <p>スタッフ専用のログインページです</p>
        </div>

        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('メールアドレス')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('パスワード')" />

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
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保持する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('ログイン') }}
                </x-primary-button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500">
                一般のお客様は <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">こちら</a> からログインしてください
            </p>
        </div>
    </div>
</x-guest-layout>
