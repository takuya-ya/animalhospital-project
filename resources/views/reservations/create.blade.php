<x-head-section title="新規予約登録" />

<!-- 上に配置しているログイン/ログアウトの機能　reservations/viewa/components/user-menu.blade.php -->
<x-user-menu />

<!-- 予約入力してボタンを押すと予約完了しましたの文字が表示されるところ -->
<div class="py-2" style="background-color: #FFFDEA;">
    <div class="text-center mt-4  text-2xl font-bold">

        @if (session('message'))
        <div class="mb-4 text-orange-500">
            {{ session('message') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<!-- 新規予約フォーム -->
@php
$hasExistingReservation = auth()->user()->reservations()->where('reservation_datetime', '>', now())->count() > 0;
@endphp

@if($hasExistingReservation)
<div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded"
    style="font-family: 'M PLUS Rounded 1c';">
    <p class="text-center">すでに予約があります。新しい予約をするには、<a href="{{ route('reservations.index') }}"
            class="underline text-blue-600">既存の予約</a>をキャンセルしてください。</p>
</div>
@endif

<form method="POST" action="{{ route('reservations.store') }}" @if($hasExistingReservation) style="display:none;"
    @endif>
    @csrf

    <div class="text-center mt-2">
        <div class="flex items-center justify-center mt-10">
            <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
            <h1 class="text-center text-2xl font-bold pr-5 pl-5">
                新規予約<span class="block sm:inline">登録</span>
            </h1>
            <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
        </div>
        <div class="w-full mb-10" style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
        </div>
        @auth
        <p class="text-center mt-0 text-sm">
            {{ Auth::user()->name }}さん、こんにちは！<br class="sm:hidden">
            予約希望日時を下記からお選びください
        </p>
        @endauth

        <!-- 予約日 -->
        <div class="mb-4 w-2/3 mx-auto text-left mt-5">
            <label for="reservation_date" class="block text-sm font-medium mb-1 text-[#715433]">
                予約日
            </label>
            <input type="text" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}"
                class="px-4 py-2 border border-[#715433] rounded-md text-[#715433] placeholder-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433] w-full"
                placeholder="日付を選択してください">
            <x-input-error :messages="$errors->get('reservation_date')" class="mt-2 text-[#715433]" />
        </div>

        <!-- 予約時間 -->
        <div class="mb-4 w-2/3 mx-auto text-left">
            <label for="reservation_time" class="block text-sm font-medium mb-1 text-[#715433]">
                予約時間
            </label>
            <select name="reservation_time" id="reservation_time"
                class="px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433] w-full ">
                <option value="">時間を選択してください</option>
                <!-- JavaScriptで動的生成 -->
            </select>
            <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
        </div>
    </div>


    <!-- 新規予約送信ボタン-->
    <div class="text-center pt-4">
        <button type="submit"
            class="w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
            予約する
        </button>
    </div>
</form>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->


<div class="text-center mt-20 px-4 sm:px-6 md:px-8 lg:px-0">


    <div class="flex items-center justify-center mt-10">
        <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
        <h1 class="text-center text-2xl font-bold pr-5 pl-5">予約確認</h1>
        <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
    </div>

</div>

<div class="w-full mb-10" style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
</div>

{{-- 予約一覧ボタン --}}
<div class="text-center">
    <h4 class="mb-5">キャンセルはこちらから</h4>
    <button type="button"
        class="w-32 bg-[#B0F33B] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition"
        onclick="window.location.href='{{ route('reservations.index') }}'">
        予約一覧
    </button>
</div>
</div>

<script src="{{ asset('js/reservation-calendar.js') }}"></script>
</div>

<div class="mt-6 text-center mb-5">
    <a href="{{ url('/') }}"
        class="mb-10 inline-flex items-center text-gray-500 hover:text-orange-500 transition text-sm font-normal"
        style="font-family: 'M PLUS Rounded 1c';">
        ✻ ホームにもどる ✻
    </a>
</div>
</body>

</html>