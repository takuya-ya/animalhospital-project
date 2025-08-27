<div class="flex flex-col items-center mt-6">
    {{-- ロゴ --}}
    <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </a>

    {{-- ログイン中ボタン --}}
    <div x-data="{ open: false }" class="relative inline-block text-center mt-4">
        <button @click="open = !open"
            class="text-sm text-gray-500 hover:text-orange-500 flex items-center justify-center"
            style="font-family: 'M PLUS Rounded 1c'; background:none; border:none; cursor:pointer;">
            {{ Auth::user()->name }}さんがログイン中
            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="open" x-cloak @click.away="open = false"
            class="absolute left-1/2 transform -translate-x-1/2 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-red-100 hover:text-red-600"
                    style="background:none; border:none; cursor:pointer; font-family: 'M PLUS Rounded 1c';">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</div>

</body>