<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>新規予約登録</title>

    <!-- Fonts --><!-- Google Fonts -->
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

    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<!-- 背景色指定のコード -->
<body class="font-sans antialiased" style="background-color: #FFFDEA; color:#715433">   <!-- ← ページ全体の背景色を指定 -->

<!-- max-w-[960px]で横幅制限、mx-autoで中央寄せ、px-4で左右余白 -->
<div class="max-w-[960px] mx-auto px-4 sm:px-6 lg:px-8">

