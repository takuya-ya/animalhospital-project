<x-head-section title="予約登録" />

<!-- 上に配置しているログイン/ログアウトの機能　reservations/viewa/components/user-menu.blade.php -->
<x-user-menu />




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
                <img src="{{ asset('img/bird4.png') }}" alt="小鳥" class="absolute -top-[80px] right-0 w-16 h-auto -mr-4 z-10">

                @php
                $hasExistingReservation = auth()->user()->reservations()->where('reservation_datetime', '>', now())->count() > 0;
                @endphp

                @if($hasExistingReservation)
                <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded" style="font-family: 'M PLUS Rounded 1c';">
                    <p class="text-center">すでに予約があります。新しい予約をするには、<a href="{{ route('reservations.index') }}" class="underline text-blue-600">既存の予約</a>をキャンセルしてください。</p>
                </div>
                @endif

                <form method="POST" action="{{ route('reservations.store') }}" @if($hasExistingReservation) style="display:none;" @endif>
                    @csrf

                    <div class="text-center mt-2">
                        <div class="text-center mt-4 text-orange-500 text-2xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
                            新規予約登録
                        </div>
                        @auth
                        <p class="text-center mt-4 text-black text-sm" style="font-family: 'M PLUS Rounded 1c';">
                            {{ Auth::user()->name }}さん、こんにちは！<br>
                            予約希望日時を下記からお選びください
                        </p>
                        @endauth

                        <!-- 予約日 -->
                        <div class="mb-4 text-left">
                            <label for="reservation_date" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'M PLUS Rounded 1c';">予約日</label>
                            <input type="text" name="reservation_date" id="reservation_date" value="{{ old('reservation_date') }}"
                                class="border border-gray-300 rounded px-3 py-2 w-full" placeholder="日付を選択してください">
                            <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
                        </div>

                        <!-- 予約時間 -->
                        <div class="mb-4 text-left">
                            <label for="reservation_time" class="block text-sm font-medium text-gray-700 mb-2" style="font-family: 'M PLUS Rounded 1c';">予約時間</label>
                            <select name="reservation_time" id="reservation_time" class="border border-gray-300 rounded px-3 py-2 w-full">
                                <option value="">時間を選択してください</option>
                                <!-- JavaScriptで動的生成 -->
                            </select>
                            <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
                        </div>
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
            <!-- 枠 -->
            <div class=" relative mt-10 max-w-md mx-auto p-6 rounded-2xl shadow" style="background-color: #FFFFFF; border: 2px solid #FFB85C;">
                <!-- 小鳥のイラスト -->
                <img src="{{ asset('img/bird3.png') }}"
                    alt="小鳥"
                    class="absolute bottom-13 w-12 h-auto z-10 left-1/2 transform -translate-x-[300%]">
                <div class="not-flex">
                    <div class="text-center mt-4 text-orange-500 text-2xl font-bold" style="font-family: 'M PLUS Rounded 1c';">
                        予約確認
                    </div>
                    <p class="text-center mt-4 text-black text-sm" style="font-family: 'M PLUS Rounded 1c';">
                        キャンセルはこちらから
                    </p>

                    <a href="{{ route('reservations.index') }}"
                        class="block w-full sm:w-[400px] max-w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded mt-5 text-center"
                        style="font-family: 'M PLUS Rounded 1c';">
                        予約一覧<br>
                    </a>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/reservation-calendar.js') }}"></script>
    </div>


    </div>
</body>

</html>