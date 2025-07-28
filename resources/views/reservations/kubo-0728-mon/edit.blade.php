<x-app-layout>
    <x-slot name="header">

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

            @if (session('message'))
            <div class="mb-4 text-green-600">
                {{ session('message') }}
            </div>
            @endif

            <!-- オレンジ枠白背景の枠 -->
            <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                @csrf
                @method('patch')

                <div class="text-center mt-2">
                    <div class="text-center mt-4 text-orange-500 text-2xl font-bold"
                        style="font-family: 'M PLUS Rounded 1c';">
                        予約日時変更登録
                    </div>
                    <label for="reservation_datetime" class="block mb-2">
                        @auth
                        <p class="text-center mt-4 text-black text-sm"
                            style="font-family: 'M PLUS Rounded 1c';">
                            {{ Auth::user()->name }}さん、こちらから日時変更をどうぞ！<br>
                        </p>
                        @endauth
                    </label>
                    <input type="datetime-local" step="3600"
                        name="reservation_datetime" id="reservation_datetime"
                        class="border border-gray-300 rounded px-3 py-2 w-full" required>
                </div>

                <!-- 送信ボタン -->
                <button type="submit"
                    class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded-lg mt-5"
                    style="font-family: 'M PLUS Rounded 1c';">
                    送信する
                </button>
            </form>
        </div>
    </div>
</x-app-layout>