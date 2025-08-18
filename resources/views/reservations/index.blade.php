<x-head-section title="予約一覧" />
<!-- 上に配置しているログイン/ログアウトの機能　reservations/viewa/components/user-menu.blade.php -->
<x-user-menu />
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- メッセージ表示 -->
<div class="px-6">
    @if(session('success'))
    <div class="text-green-600 font-bold mb-4 text-center">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="text-red-600 font-bold mb-4 text-center">
        {{ session('error') }}
    </div>
    @endif
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
@if($reservations->count() > 0)
@php
// 共通設定：最初に一度だけ定義
$weekMap = ['日', '月', '火', '水', '木', '金', '土'];
$latest = $reservations->first();
$reservationDate = \Carbon\Carbon::parse($latest->reservation_datetime);
$PAST_RESERVATION_THRESHOLD = 1;
$hasPastReservations = $reservations->count() > $PAST_RESERVATION_THRESHOLD;
@endphp
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- 最新の予約タイトル -->
<div class="flex items-center justify-center mt-10">
    <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
    <h1 class="text-center text-2xl font-bold pr-5 pl-5">最新の予約</h1>
    <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
</div>
<!--　ドットライン-->
<div class="w-full mb-10" style="height: 6px;
                            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
                            background-size: 8px 8px;
                            background-repeat: repeat-x;
                            border-radius: 3px;">
</div>
<!--　最新の予約表示-->
<div class="text-center ">
    {{-- 予約日時を大きなフォントで表示 --}}
    <p class="text-2xl font-semibold">
        {{-- Carbonのformat()で日付を整形し、weekMapで曜日を日本語表示 --}}
        {{ $reservationDate->format('Y年m月d日') }}（{{ $weekMap[$reservationDate->dayOfWeek] }}）{{ $reservationDate->format(' H:i') }}
    </p>
    <!-- 登録日表示：時間含む -->
    <p>
        <span class="font-semibold">登録日：</span>{{ \Carbon\Carbon::parse($latest->created_at)->format('Y年m月d日 H:i') }}
    </p>
    <!-- 詳細へのボタン-->
    <div class="mt-10">
        <a href="{{ route('reservations.show', $latest->id) }}"
            class="inline-block w-32 bg-[#088BA1] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
            詳細確認
        </a>
    </div>
</div>

<!-- タイトル -->
<div class="flex items-center justify-center mt-20">
    <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
    <h1 class="text-center text-2xl font-bold pr-5 pl-5">予約履歴 </h1>
    <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
</div>
<!-- ドット風ライン -->
<div class="relative w-full h-12 mb-2
                                absolute inset-x-0 top-1/2 -translate-y-1/2 h-[6px]
                                bg-[radial-gradient(circle,#fd8c07_2px,transparent_2px)]
                                [background-size:8px_8px] rounded-full">
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- 過去の予約一覧 -->
@if ($hasPastReservations)


<!-- 内側（表を囲む）にpadding追加 -->
<div class="p-4 overflow-x-auto">
    <table class="min-w-full table-auto">
        <tbody>
            @foreach ($reservations->skip(1) as $reservation)
            @php
            $reservationDate = \Carbon\Carbon::parse($reservation->reservation_datetime);
            $createdDate = \Carbon\Carbon::parse($reservation->created_at);
            @endphp
            <tr class="text-center">
                <td class="px-4 py-3">
                    <div class="flex flex-wrap items-center justify-center gap-x-4">
                        <!-- 予約日 -->
                        <div class="font-semibold">
                            ・{{ $reservationDate->format('Y年m月d日') }}
                            （{{ $weekMap[$reservationDate->dayOfWeek] }}）
                            {{ $reservationDate->format(' H:i') }}
                            </a>
                        </div>
                        <!-- 登録日（小さめ） -->
                        <div class="text-gray-500 text-xs sm:text-sm">
                            登録：{{ $createdDate->format('Y年m月d日') }}
                            （{{ $weekMap[$createdDate->dayOfWeek] }}）
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
{{-- 予約がある場合の処理ここまで --}}

@else
{{-- 予約がない場合の処理 --}}
<div class="max-w-[960px] w-full mx-auto mt-10 p-6 text-center">
    <h2 class="text-orange-500 text-xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
        まだ予約がありません
    </h2>
    <p class="mt-4 text-gray-600">
        下記から新規予約へお進みください。
    </p>
</div>
@endif


<!-- ② 上の if／div を完全に終えた後に配置 -->
<div class="flex flex-col items-center mt-5 space-y-4 z-20 relative">
    <a href="{{ route('reservations.create') }}"
        class="w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition text-center">
        新規予約
    </a>
    <a href="{{ url('/') }}" class="mb-10 text-gray-500 hover:text-orange-500 text-sm font-normal inline-flex items-center">
        ✻ ホームにもどる ✻
    </a>
</div>
</body>

</html>