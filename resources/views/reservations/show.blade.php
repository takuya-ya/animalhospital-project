<x-app-layout>
    <x-slot name="header">
        <!--久保さん text-center -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $reservation->id }}回目の予約
        </h2>
    </x-slot>

    <!-- 背景色指定のコード -->
    <div class="py-12" style="background-color: #FFFDEA;">
        <!-- 予約詳細カード -->
        <div class="w-[400px] mx-auto mt-10 p-6 border-2 border-orange-300 rounded-xl bg-[#fffcee] relative"
            style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

            <h2 class="text-center text-orange-500 text-xl font-bold mb-4" style="font-family: 'M PLUS Rounded 1c';">
                予約詳細
            </h2>

            @php
            // 予約日時のCarbon インスタンス作成と曜日マップ
            $date = \Carbon\Carbon::parse($reservation->reservation_datetime);
            $weekMap = ['日', '月', '火', '水', '木', '金', '土'];
            @endphp

            {{-- 予約日時を大きく表示 --}}
            <div class="text-center text-black text-lg font-bold">
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
                    <button type="button" class="px-6 py-2 bg-sky-400 hover:bg-sky-500 text-white font-semibold rounded-lg shadow-md transition-colors duration-300">
                        予約変更
                    </button>
                </a>

                <!-- キャンセルボタン（黄緑） -->
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                      onsubmit="return confirm('本当にキャンセルしますか？');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-lime-400 hover:bg-lime-500 text-white font-semibold rounded-lg shadow-md transition-colors duration-300">
                        キャンセル
                    </button>
                </form>
            </div>

            <!-- 左下のチューリップ -->
            <img src="{{ asset('img/flower2.png') }}" alt="チューリップ" class="absolute bottom-[-3px] left-1 w-20 h-auto">
            <!-- 右下のうさぎ -->
            <img src="{{ asset('img/rabbit.png') }}" alt="うさぎ" class="absolute bottom-[-5px] right-[-9px] w-24 h-auto">
        </div>

        {{-- 戻るボタン --}}
        <div class="text-center mt-6">
            <a href="{{ route('reservations.index') }}"
               class="inline-block px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md transition-colors duration-300">
                予約一覧に戻る
            </a>
        </div>
    </div>
</x-app-layout>
