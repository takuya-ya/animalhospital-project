<!-- resources/views/partials/header.blade.php -->
<header class="sticky top-0 bg-white bg-opacity-90 shadow z-50" x-data="{ open: false }">
    <div class="max-w-[960px] mx-auto flex justify-between items-center p-4">
        <!-- ロゴ -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/header-footer-logo.png') }}" alt="ロゴ" class="w-60 sm:w-[350px] border-none outline-none hover:brightness-110">
        </a>

        <!-- ハンバーガーアイコン（スマホのみ表示） -->
        <button @click="open = !open" class="sm:hidden focus:outline-none">
            <svg class="w-10 h-10 text-[#715433]" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- PC用ナビ -->
        <div class="hidden sm:flex max-w-[960px] flex justify-between font-bold pt-4">
            <nav class="items-center text-center ">
                <div class="flex justify-between mb-2">
                    <a href="https://www.instagram.com/mutsuki_smallanimalhospital/"
                        target="_blank" class=hover:brightness-110><img src="{{ asset('images/header-footer-instagram.png') }}" alt="instagram" width="33"></a>
                    <a href="#footer" class=hover:brightness-110><img src="{{ asset('images/header-btn-view-hours.png') }}" alt="診察時間" width="127"></a>
                    <a href="#access" class=hover:brightness-110><img src="{{ asset('images/header-btn-access.png') }}" alt="アクセス" width="127"></a>
                </div>
                <div class="flex items-end">
                    <h2>お問い合わせ</h2>
                    <img src="{{ asset('images/header-footer-tell.png') }}" alt="tel" width="30">
                    <h2 class="text-2xl font-bold hidden sm:block">092-000-0000</h2>
                </div>
                <p class="text-lg font-bold -mt-2" style="color:#fd8c07">……………………………………………</p>
            </nav>
        </div>
    </div>
    <nav class="hidden sm:flex max-w-[960px] mx-auto flex justify-between text-center font-bold pb-2">

        <p>|</p>
        <a href="{{ url('/') }}" class="hover:brightness-150" @if(Request::is('/')) style="color:#fd8c07" @endif>ホーム</a>
        <p>|</p>
        <a href="{{ url('/guide') }}" class="hover:brightness-150" @if(Request::is('guide')) style="color:#fd8c07" @endif>診察のご案内</a>
        <p>|</p>
        <a href="{{ url('/staff') }}" class="hover:brightness-150" @if(Request::is('staff')) style="color:#fd8c07" @endif>スタッフ紹介</a>
        <p>|</p>
        <a href="{{ url('/facility') }}" class="hover:brightness-150" @if(Request::is('facility')) style="color:#fd8c07" @endif>院内・設備紹介</a>
        <p>|</p>
        <a href="{{ url('/recruit') }}" class="hover:brightness-150" @if(Request::is('recruit')) style="color:#fd8c07" @endif>採用情報</a>
        <p>|</p>
        <a href="{{ url('/faq') }}" class="hover:brightness-150" @if(Request::is('faq')) style="color:#fd8c07" @endif>よくある質問</a>
        <p>|</p>
    </nav>


    <!-- スマホ用メニュー -->
    <nav x-show="open" x-transition class="sm:hidden px-4 pb-4 space-y-2 font-bold bg-white text-center">
        <a href="{{ url('/') }}" class="block py-1 hover:text-orange-500">ホーム</a>
        <a href="{{ url('/guide') }}" class="block py-1 hover:text-orange-500">診察のご案内</a>
        <a href="{{ url('/staff') }}" class="block py-1 hover:text-orange-500">スタッフ紹介</a>
        <a href="{{ url('/facility') }}" class="block py-1 hover:text-orange-500">院内・設備紹介</a>
        <a href="{{ url('/recruit') }}" class="block py-1 hover:text-orange-500">採用情報</a>
        <a href="{{ url('/faq') }}" class="block py-1 hover:text-orange-500">よくある質問</a>
        <a href="#footer" class="block py-1 hover:text-orange-500" @click="open = false">診察時間</a>
        <a href="#access" class="block py-1 hover:text-orange-500" @click="open = false">アクセス</a>
    </nav>

</header>