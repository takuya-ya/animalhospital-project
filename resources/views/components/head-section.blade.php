<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>新規予約登録</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


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
<body style="background-color: #FFFDEA;">   <!-- ← ページ全体の背景色を指定 -->

<!-- max-w-[960px]で横幅制限、mx-autoで中央寄せ、px-4で左右余白 -->
<div class="max-w-[960px] mx-auto px-4 sm:px-6 lg:px-8">

