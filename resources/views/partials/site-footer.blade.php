<!-- resources/views/partials/footer.blade.php -->
<footer class="text-sm text-[#715433] pt-10 pb-4 relative">
    {{-- アクセス --}}
    <div class="bg-[#FFFFFF] scroll-mt-40" id="access">
        <div class="max-w-[960px] mx-auto px-4">

            {{-- タイトル --}}
            <div class="max-w-[960px] mx-auto py-6">
                <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">アクセス</h1>
                <div class="max-w-full"
                    style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
                </div>
            </div>

            {{-- 左カラム --}}
            <div class="flex flex-col md:flex-row justify-between gap-8 pb-8 pt-6">
                <div class="flex-1">
                    {{-- 車でお越しの方 --}}
                    <div class="mb-4">
                        <!-- スマホ：縦並び、PC：横並び -->
                        <div class="flex flex-row items-start md:items-center gap-2 md:gap-2 mb-2">
                            <img src="/images/access-car.png" alt="車アイコン" class="w-16 mt-3 md:w-16 h-auto">

                            <!-- テキストと駐車場画像をまとめる -->
                            <div class="flex flex-col md:flex-row md:items-center md:gap-2">
                                <p class="font-bold text-lg">車でお越しの方</p>
                                <img src="/images/footer-parking.png" alt="駐車場案内" class="w-48 md:w-48 h-auto">
                            </div>
                        </div>

                        <p class="text-sm list-disc list-inside text-[#715433]">
                            - 福岡都市高速・野芥出口で降り、次郎丸交差点から原通りを藤崎方面へ北上すると右手に現れます。<br>
                            - 原四つ角（原交差点）から原通りを次郎丸方面に南下すると左手に現れます。
                        </p>
                    </div>


                    {{-- 公共交通機関でお越しの方 --}}
                    <div class="mb-6 text-[#715433]">
                        <div class="flex items-center gap-2 mb-2">
                            <img src="/images/access-bus.png" alt="バスアイコン" class="w-16 h-auto">
                            <p class="font-bold text-lg">公共交通機関でお越しの方</p>
                        </div>

                        <p class="text-sm mt-2 leading-relaxed">
                            [地下鉄] 次郎丸駅から原通りを藤崎方面に徒歩9分。<br>
                            [バス] 藤崎バス乗り継ぎターミナル発
                        </p>
                        <p class="text-xs ml-2 leading-relaxed">
                            - 2系統 金武営業所方面もしくは 四箇田団地方面行きにて、平田（福岡市）もしくは立屋敷にて下車、徒歩5分<br>
                            - 306・2系統 金武営業所方面もしくは 四箇田団地方面行きにて、平田（福岡市）もしくは立屋敷にて下車、徒歩5分
                        </p>
                    </div>

                </div>

                <div class="flex-1 w-full mx-auto">
                    <div class="aspect-[4/3] w-full rounded-lg overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.8540091664354!2d130.33163617466994!3d33.5571692437111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354194975458dbbb%3A0x2307e91413ab41d9!2z44CSODE0LTAwMzMg56aP5bKh55yM56aP5bKh5biC5pep6Imv5Yy65pyJ55Sw77yV5LiB55uu77yS77yQ4oiS77yS77yT!5e0!3m2!1sja!2sjp!4v1753420783174!5m2!1sja!2sjp"
                            class="w-full h-full border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- フッター --}}
    <div class="bg-[rgba(253,140,7,0.1)] scroll-mt-40 mx-auto" id="footer">
        <div class="max-w-[960px] mx-auto pt-10 px-4">

            {{-- ロゴ・連絡先・診療時間・カレンダー --}}
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 mb-8">
                <div class="flex-1">
                    <img src="/images/header-footer-logo.png" alt="ロゴ" class="pb-6 w-120">

                    <div class="flex flex-col sm:flex-row sm:justify-center sm:items-center gap-2 sm:gap-3 text-center sm:text-left">
                        <!-- お問い合わせテキスト -->
                        <p class="font-bold text-lg whitespace-nowrap">お問い合わせ</p>

                        <!-- 電話アイコン＋番号 -->
                        <div class="flex justify-center sm:justify-start items-center gap-2">
                            <img src="/images/header-footer-tell.png" alt="電話アイコン" class="w-8 h-8">

                            <!-- スマホのみ表示（telリンクあり） -->
                            <a href="tel:0920000000" class="text-[#715433] font-bold text-4xl block sm:hidden">
                                092-000-0000
                            </a>

                            <!-- タブレット以上で表示（telリンクなし） -->
                            <span class="text-[#715433] font-bold text-4xl hidden sm:block">
                                092-000-0000
                            </span>
                        </div>
                    </div>


                    <div class="max-w-full mb-3"
                        style="height: 6px;
                        background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
                        background-size: 8px 8px;
                        background-repeat: repeat-x;
                        border-radius: 3px;">
                    </div>
                    <p class="text-base">〒814-0033 福岡県福岡市早良区有田5丁目20-23</p>
                    <div class="flex items-center mb-4">
                        <!-- 駐車場テキスト＋アイコン -->
                        <p class="text-base flex items-center gap-1 flex-1 mb-0">
                            <img src="/images/footer-icon-parking.png" alt="車アイコン" class="w-6 h-auto">
                            駐車場：建物前に<span class="text-[#FD8C07] text-xl font-bold leading-tight tracking-tighter">5</span>台分完備
                        </p>

                        <!-- Instagramアイコン（右寄せ） -->
                        <a href="https://www.instagram.com/mutsuki_smallanimalhospital/" target="_blank" rel="noopener noreferrer">
                            <img src="/images/header-footer-instagram.png" alt="Instagram" class="w-8 h-auto">
                        </a>
                    </div>

                    <img src="/images/footer-schedule.png" alt="診療時間" class="mb-1 w-full">
                    <p class="text-xs mt-0">
                        ※木曜日終日、日曜・祝日の午前は休診<br>
                        ※臨時休診日に関してはお知らせの新着情報をご覧ください。
                    </p>

                </div>

                <div class="flex-1">
                    <img src="/images/footer-calender-202508.png" alt="">
                </div>
            </div>


        </div>
        {{-- 建物帯とコピーライト --}}
        <div class="w-screen">

            <!-- 背景帯画像（横リピート） -->
            <div class="h-[110px] bg-[url('/public/images/footer-bottom.png')] bg-repeat-x bg-top" style="background-size: auto 100%;"></div>

            <!-- 著作権バー -->
            <div class="bg-[#4a3724] text-white text-center py-1 text-[11px]">
                &copy; {{ date('Y') }} 六ツ木小動物病院 All Rights Reserved.
            </div>

        </div>
    </div>

</footer>