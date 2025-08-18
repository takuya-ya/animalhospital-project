<x-head-section title="予約編集" />

<!-- 上に配置しているログイン/ログアウトの機能　reservations/viewa/components/user-menu.blade.php -->
<x-user-menu />

<!-- 現在の予約情報 -->
<div class="text-center mt-10">
    <div class="flex items-center justify-center mt-10">
                <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
                <h1 class="text-center text-2xl font-bold pr-5 pl-5">現在の予約</h1>
                <img src="{{ asset('img/dot.png') }}" alt="ドット" class="w-20 h-auto ">
    </div>
    <!-- 親コンテナにrelativeを付与 -->
    <div class="relative w-full mb-10" style="
    height: 6px;
    background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
    background-size: 8px 8px;
    background-repeat: repeat-x;
    border-radius: 3px;">
    </div>
    
    <p class="w-4/5 mx-auto text-center text-2xl font-semibold bg-[#0CC0DF] px-3 py-2 rounded-md text-white">
       {{ $reservation->reservation_datetime
     ->locale('ja')             {{-- 明示指定して安全に --}}
     ->isoFormat('Y年M月D日 (ddd) H:mm') }}
    </p>
</div>




<form method="POST" action="{{ route('reservations.update', $reservation) }}">
    @csrf
    @method('PUT')
    <!-- フォーム全体を縦並び中央寄せ -->
    <div class="flex flex-col items-center space-y-6 mt-10 ">

        <!-- 予約日 -->
        <div class="w-4/5 mx-auto text-left">
            <label for="reservation_date" class="block font-semibold text-base mb-1">
                <div class="flex items-center justify-start gap-2">
                    <span class="block text-sm font-medium text-[#715433] text-left ">新しい予約日</span>
                </div>
            </label>
            <input type="text" name="reservation_date" id="reservation_date"
                value="{{ old('reservation_date', $reservation->reservation_datetime->format('Y-m-d')) }}"
                class="px-4 py-2 border border-[#715433] rounded-md text-[#715433] placeholder-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433] w-full"
                placeholder="日付を選択してください">
            <x-input-error :messages="$errors->get('reservation_date')" class="mt-2" />
        </div>
        <!-- 予約時間 -->
        <div class="w-4/5 text-left mx-auto mt-6">
            <label for="reservation_time" class="block font-semibold text-base mb-1">
                <div class="flex items-center justify-start gap-2">
                    <span class="block text-sm font-medium  text-[#715433] text-left ">新しい予約時間</span>
                </div>
            </label>
            <select name="reservation_time" id="reservation_time"
                class="px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433] w-full">
                <option value="">時間を選択してください</option>
                <!-- JavaScriptで動的生成 -->
            </select>
            <x-input-error :messages="$errors->get('reservation_time')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center justify-center mt-6 space-x-4">
        <a href="{{ route('reservations.show', $reservation) }}"
            class="w-32 bg-[#C4C4C4] text-white text-center font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
            戻る
        </a>
        <button type="submit"
            class="w-32 bg-[#FD8C07] text-white font-bold px-6 py-2 rounded-full hover:brightness-75 transition">
            変更を保存
        </button>
    </div>
</form>

<script src="{{ asset('js/reservation-calendar.js') }}"></script>

<div class="mt-6 text-center">
    <a href="{{ url('/') }}"
        class="mb-10 inline-flex items-center text-gray-500 hover:text-orange-500 transition text-sm font-normal"
        style="font-family: 'M PLUS Rounded 1c';">
        ✻ ホームにもどる ✻
    </a>
</div>
</body>

</html>