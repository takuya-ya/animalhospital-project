<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約変更') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #FFFDEA;">
        <div class="mt-1 max-w-md mx-auto p-6 rounded-2xl shadow relative"
            style="background-color: #FFFFFF; border: 2px solid #FFB85C;">

            <!-- 左上にmouse画像（さらに上へ移動）-->
            <img src="/img/mouse.png"
                alt="mouse"
                class="absolute -top-11 left-2 w-12 h-12">

            <!-- 右上にdandelion画像（さらに上へ移動）-->
            <img src="/img/dandelion.png"
                alt="dandelion"
                class="absolute -top-6 right-2 w-32 h-auto">

            <!-- 右下にcat画像（さらに右へ移動）-->
            <img src="/img/cat.png"
                alt="cat"
                class="absolute bottom-0 -right-14 w-18 h-32">

            <!-- 現在の予約情報 -->
            <div class="mb-8 p-4 bg-blue-50 rounded-lg">
                <h3 class="text-lg font-medium text-blue-900 mb-2">現在の予約</h3>
                <p class="text-blue-800">
                    {{ $reservation->reservation_datetime->format('Y年n月j日 (D) H:i') }}
                </p>
            </div>

            <form method="POST" action="{{ route('reservations.update', $reservation) }}">
                @csrf
                @method('PUT')

                <!-- 予約日 -->
                <div class="mb-6">
                    <label for="reservation_date" class="block text-sm font-medium text-gray-700">新しい予約日</label>
                    <input type="text" name="reservation_date" id="reservation_date"
                        value="{{ old('reservation_date', $reservation->reservation_datetime->format('Y-m-d')) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="日付を選択してください">
                    <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
                </div>

                <!-- 予約時間 -->
                <div class="mb-6">
                    <label for="reservation_time" class="block text-sm font-medium text-gray-700">新しい予約時間</label>
                    <select name="reservation_time" id="reservation_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">時間を選択してください</option>

                        <!-- JavaScriptで動的生成 -->
                    </select>
                    <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 space-x-4">
                    <a href="{{ route('reservations.show', $reservation) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        戻る
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        変更を保存
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/reservation-calendar.js') }}"></script>
</x-app-layout>