<x-head-section title="予約確認" />
<!-- 上に配置しているログイン/ログアウトの機能　reservations/viewa/components/user-menu.blade.php -->
<x-user-menu />

<!-- 予約詳細カード -->
<div class="text-center mt-10">
    <div class="flex items-center justify-center mt-10">
        <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
        <h1 class="text-center text-2xl font-bold pr-5 pl-5">予約詳細</h1>
        <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
    </div>

    <!-- ドット風ライン -->
    <div class="w-full mb-10" style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
    </div>

    @php
    // 予約日時のCarbon インスタンス作成と曜日マップ
    $date = \Carbon\Carbon::parse($reservation->reservation_datetime);
    $weekMap = ['日', '月', '火', '水', '木', '金', '土'];
    @endphp


    {{-- 予約日時を大きく表示 --}}
    <div class="text-2xl font-semibold">
        {{ $date->format('Y年m月d日') }}（{{ $weekMap[$date->dayOfWeek] }}）{{ $date->format(' H:i') }}
    </div>
    {{-- 登録日時を小さく表示 --}}
    <div class="text-center text-gray-600 text-sm mt-2">
        登録日：{{ \Carbon\Carbon::parse($reservation->created_at)->format('Y年m月d日 H:i') }}
    </div>
    <!-- ボタン2つを横並びにするコンテナ -->
    <div class="flex justify-center gap-4 mt-6">
        <!-- 予約変更ボタン（水色） -->
        <a href="{{ route('reservations.edit', $reservation) }}">
            <button type="button"
                class="w-32 bg-[#0CC0DF] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
                予約変更
            </button>
        </a>

        <!-- キャンセルボタン（黄緑） -->
        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
            onsubmit="return confirm('本当にキャンセルしますか？');" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-32 bg-[#DC143C] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
                キャンセル
            </button>
        </form>
    </div>
</div>
<!-- ドット風ライン -->
<div class="w-full mt-10 mb-10" style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
</div>

<!-- 予約一覧ボタン -->
<div class="text-center">
    <a href="{{ route('reservations.index') }}"
        class="w-32 bg-[#B0F33B] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition text-center inline-block">
        予約一覧
    </a>
</div>
<!-- ホームに戻るリンク -->
<div class="mt-6 text-center mb-5">
    <a href="{{ url('/') }}"
        class="mb-10 inline-flex items-center text-gray-500 hover:text-orange-500 transition text-sm font-normal"
        style="font-family: 'M PLUS Rounded 1c';">
        ✻ ホームにもどる ✻
    </a>
</div>
</body>

</html>