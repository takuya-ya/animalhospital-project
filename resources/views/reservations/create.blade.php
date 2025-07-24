<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center">
            {{ __('新規 診察予約登録') }}
        </h2>
    </x-slot>

    <!-- 予約入力してボタンを押すと予約完了しましたの文字が表示されるところ -->
    <div class="py-2" style="background-color: #FFFDEA;">
        <div class="text-center mt-4  text-2xl font-bold" style="font-family: 'M PLUS Rounded 1c';">

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
    <div class="py-12" style="background-color: #FFFDEA;">
        <div class="mt-1 max-w-md mx-auto p-6 rounded-2xl shadow" style="background-color: #FFFFFF; border: 2px solid #FFB85C;">


            <div class="relative">
                <!-- 小鳥のイラスト -->
                <img src="{{ asset('img/bird1.png') }}" alt="小鳥" class="absolute -top-20 right-0 w-16 h-auto -mr-4 z-10">


                <form method="POST" action="{{ route('reservations.store') }}">
                    @csrf

                    <div class="text-center mt-2">
                        <div class="text-center mt-4 text-orange-500 text-2xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
                            新規予約登録
                        </div>
                        <label for="reservation_datetime" class="block    mb-2">
                            @auth
                            <p class="text-center mt-4 text-black text-sm" style="font-family: 'M PLUS Rounded 1c';">
                                {{ Auth::user()->name }}さん、こんにちは！<br>

                                @endauth
                                予約希望日時を下記からお選びください
                            </p>
                        </label>
                        <input type="datetime-local" step="3600" name="reservation_datetime" id="reservation_datetime"
                            class="border border-gray-300 rounded px-3 py-2 w-full" required>
                    </div>


                    <!-- 新規予約送信ボタン-->
                    <button type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded mt-5"
                        style="font-family: 'M PLUS Rounded 1c';">
                        送信する
                    </button>
                </form>
            </div>
        </div>

        <!-- 予約一覧ボタン/キャンセルはこちらから -->
        <div class="relative">
            <!-- 小鳥のイラスト -->
            <img src="{{ asset('img/bird2.png') }}" alt="小鳥" class="absolute -top-8  w-12 h-auto -mr-4 z-10" style="left: 470px;">

            <!-- 枠 -->
            <div class="mt-10 max-w-md mx-auto p-6 rounded-2xl shadow" style="background-color: #FFFFFF; border: 2px solid #FFB85C;">
                <div class="not-flex">
                    <div class="text-center mt-4 text-orange-500 text-2xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
                        予約確認
                    </div>
                    <p class="text-center mt-4 text-black text-sm" style="font-family: 'M PLUS Rounded 1c';">
                        キャンセルはこちらから
                    </p>

                    <button type="submit"
                        class="w-[400px] bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded mt-5" style="font-family: 'M PLUS Rounded 1c';">
                        予約一覧<br>
                    </button>
                </div>
            </div>
        </div>
</x-app-layout>
