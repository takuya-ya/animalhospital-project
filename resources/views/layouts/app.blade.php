<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '六ツ木小動物病院') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">

    <!-- ViteによるCSS/JS読み込み -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
</head>


<body class="font-sans antialiased overflow-x-hidden" style="background-color:#fffdea; color:#715433">

    {{-- 共通ヘッダー（partials/site-header.blade.php） --}}
    @include('partials.site-header')

    {{-- メインコンテンツ --}}
    <main class="w-screen mx-auto">
        {{ $slot }}

        {{-- ご予約ボタン画像（右下に表示） --}}
        <a href="/reservation"
            class="fixed bottom-[4.5rem] md:bottom-[7.5rem] right-6 z-50 w-24 h-24 md:w-28 md:h-28">
            <img src="{{ asset('images/home-top-button-to-reservation.png') }}"
                alt="ご予約はこちらボタン"
                class="w-full h-full object-contain">
        </a>

        <!-- トップへ戻るボタン（ご予約ボタンの下に表示） -->
        <button
            x-data="{ show: false }"
            x-init="window.addEventListener('scroll', () => show = window.scrollY > 200)"
            x-show="show"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-orange-400 text-white text-lg font-bold shadow-md hover:bg-orange-500 transition-opacity duration-300"
            x-transition>
            ↑
        </button>
    </main>



    {{-- 共通フッター（partials/site-footer.blade.php） --}}
    @include('partials.site-footer')

</body>


</html>