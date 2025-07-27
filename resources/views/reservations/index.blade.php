@auth
<p>
    {{ Auth::user()->name }} さん、こんにちは！
</p>
@endauth

<x-app-layout>
    <!-- ヘッダー -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('新規 診察予約登録') }}
        </h2>
    </x-slot>

    <!-- 背景色指定のコード -->
    <div class="py-12" style="background-color: #FFFDEA;">

        <!--------------------------------------------------------------------------------------------- -->
        <!-- create.blade.phpに飛ぶ用のボタン -->
        <div class="flex justify-center">
            <a href="{{ route('reservations.create') }}">
                <button type="button"
                    class="w-[400px] bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg mt-5"
                    style="font-family: 'M PLUS Rounded 1c';">
                    【新規】 診察予約する
                </button>
            </a>
        </div>

        <!--------------------------------------------------------------------------------------------- -->
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

        @if($reservations->count() > 0)
        @php
            // 共通設定：最初に一度だけ定義
            $weekMap = ['日', '月', '火', '水', '木', '金', '土'];
            $latest = $reservations->first();
            $reservationDate = \Carbon\Carbon::parse($latest->reservation_datetime);
            $PAST_RESERVATION_THRESHOLD = 1;
            $hasPastReservations = $reservations->count() > $PAST_RESERVATION_THRESHOLD;
        @endphp
        <!--------------------------------------------------------------------------------------------- -->
        <!-- 最新の予約表示 -->
        <div class="w-[450px] mx-auto mt-10 p-6 border border-orange-500 rounded-xl relative"
            style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

            <!-- リスの画像：右上に絶対配置 -->
            <img src="{{ asset('img/squirrel.png') }}" alt="リス" class="absolute -bottom-0 -right-3 w-20 h-auto z-10">

            <!-- キノコの画像：左下に絶対配置 -->
            <img src="{{ asset('img/mushroom.png') }}" alt="キノコ" class="absolute bottom-0 left-2 w-24 h-auto z-10">

            <h2 class="text-center mt-3 mb-4 text-orange-500 text-2xl font-bold"
                style="font-family: 'M PLUS Rounded 1c';">
                最新の予約
            </h2>

            <div class="text-center space-y-2">
                {{-- 予約日時を大きなフォントで表示 --}}
                <p class="text-2xl font-semibold">
                    {{-- Carbonのformat()で日付を整形し、weekMapで曜日を日本語表示 --}}
                    {{ $reservationDate->format('Y年m月d日') }}（{{ $weekMap[$reservationDate->dayOfWeek] }}）{{ $reservationDate->format(' H:i') }}
                </p>

                <!-- 登録日表示：時間含む -->
                <p>
                    <span class="font-semibold">登録日：</span>{{ \Carbon\Carbon::parse($latest->created_at)->format('Y年m月d日 H:i') }}
                </p>

                <a href="{{ route('reservations.show', $latest->id) }}"
                    class="inline-block mt-6 px-6 py-2 bg-lime-400 hover:bg-lime-500 text-white font-semibold rounded-lg shadow-md transition-colors duration-300">
                    詳細を見る
                </a>
            </div>
        </div>

        <!-- 過去の予約一覧 -->
        @if ($hasPastReservations)
        <!-- 外枠 -->
        <div class="w-[450px] mx-auto mt-10 border border-orange-500 rounded-xl"
            style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

            <h2 class="text-center mt-7 mb-3 text-orange-500 text-2xl font-bold"
                style="font-family: 'M PLUS Rounded 1c';">
                {{ Auth::user()->name }} さんの予約履歴
            </h2>

            <!-- 内側（表を囲む）にpadding追加 -->
            <div class="relative">
                <!-- 花：日時フォームの右上 -->
                <img src="{{ asset('img/flower.png') }}" alt="花" class="absolute -top-8 right-0 w-20 h-auto z-10">

                <div class="overflow-hidden p-4 bg-white rounded-xl">
                    <table class="w-[390px] table-auto border-collapse mx-auto">
                        <thead class="bg-orange-500 text-white text-center">
                            <tr>
                                <th class="w-1/6 border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations->skip(1) as $reservation)
                            @php
                            // 各予約のCarbon インスタンス作成
                            $reservationDate = \Carbon\Carbon::parse($reservation->reservation_datetime);
                            $createdDate = \Carbon\Carbon::parse($reservation->created_at);
                            @endphp
                            <tr class="hover:bg-gray-50 text-center">
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('reservations.show', $reservation->id) }}" class="text-blue-600 hover:text-blue-800">
                                        {{ $reservation->id }}
                                    </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-left">
                                    <div>
                                        <div class="text-gray-800 font-semibold">
                                            <a href="{{ route('reservations.show', $reservation->id) }}" class="hover:text-blue-600">
                                                予約：{{ $reservationDate->format('Y年m月d日') }}（{{ $weekMap[$reservationDate->dayOfWeek] }}）{{ $reservationDate->format(' H:i') }}
                                            </a>
                                        </div>
                                        <div class="text-gray-500 text-[14px] mt-1">
                                            登録：{{ $createdDate->format('Y年m月d日') }}（{{ $weekMap[$createdDate->dayOfWeek] }}）
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="relative">
                        <!-- ハリネズミ：日時フォームの下 -->
                        <img src="{{ asset('img/hedgehog.png') }}" alt="ハリネズミ" class="absolute -top-5 left-10 -translate-x-1/2 w-16 h-auto z-10">
                    </div>
                </div>
            </div>
        </div>
        @endif
        {{-- 予約がある場合の処理ここまで --}}

        @else
        {{-- 予約がない場合の処理 --}}
        <!-- 予約がない場合の表示 -->
        <div class="w-[450px] mx-auto mt-10 p-6 border border-orange-500 rounded-xl relative text-center"
            style="background-color: #FFFFFF; border: 2px solid #FFB85C;">
            <h2 class="text-orange-500 text-xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
                まだ予約がありません
            </h2>
            <p class="mt-4 text-gray-600">上のボタンから新規予約を作成してください。</p>
        </div>
        @endif

    </div>
</x-app-layout>
