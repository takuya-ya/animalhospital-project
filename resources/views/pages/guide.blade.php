<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    <div class="w-screen mt-0 pt-0 overflow-hidden">
        <img
            src="/images/guide-top.png"
            alt="guideトップ画像"
            class="w-full
               h-[200px] object-cover
               sm:h-64 sm:object-cover">
    </div>

    <div class="m-auto max-w-[960px]">
        {{-- 本文 --}}
        <div class="w-full mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold text-center mt-6 mb-3">診察のご案内</h1>
            <div class="w-full mb-10"
                style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
            </div>

            <p class="text-base text-center leading-loose mb-20">
                笑顔で帰ってほしいから。<br>
                動物と飼い主様がゆったりと過ごせる、優しい空間づくりを私たちは心がけています。
            </p>
        </div>



        <div class="flex items-center justify-center space-x-4 mb-15">
            <img src="{{ asset('images/guide-flow-of-visit-lt.png') }}" alt="左画像" class="h-17 w-auto">
            <h1 class="text-2xl font-bold text-center mt-6">ご来院の流れ</h1>
            <img src="{{ asset('images/guide-flow-of-visit-rt.png') }}" alt="右画像" class="h-17 w-auto">
        </div>
        <div class="max-w-5xl mx-auto mb-10 grid grid-cols-1 sm:grid-cols-2 gap-10 p-10">
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                {{-- ご来院 --}}
                <h2 class="text-3xl font-bold" style="color:#FD8C07">1.ご来院</h2>
                <p class="text-base">ご用意いただきたいもの (※なくても診察は可能です)</p>
                <ul class="list-disc list-inside text-sm leading-loose">
                    <li>リードやキャリーケース(脱走防止や落ち着かせるため)</li>
                    <li>オヤツ(診療中に気を引くためや、病院を好きになってもらうため)</li>
                    <li>予防接種の証明証</li>
                    <li>他院での検査結果、服用中のお薬</li>
                    <li>ペット保険証(保険に加入している方のみ)</li>
                </ul>
                <p class="text-base mt-10 leading-loose">
                    <br>駐車場は5台完備！お車でも安心<br>
                    原通り沿い、駐車スペースもございます。
                </p>
            </div>


            {{-- 受付 --}}
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">2.受付</h2>
                <!-- flex: モバイルは縦（flex-col）、中画面以上は横（md:flex-row） -->
                <div class="rounded p-4 flex flex-col md:flex-row items-center md:space-x-8 space-y-4 md:space-y-0">
                    <p class="text-sm max-w-xl leading-loose text-center md:text-left">
                        ご来院の際は、院内設置のQRコードリーダーに診察券のQRコードをかざして受付を行ってください。<br>
                        読み取りが完了しましたら、受付表が発行されますので、お受け取りのうえ順番までお待ちください。
                    </p>
                    <img src="{{ asset('images/guide-2.png') }}" class="w-48 rounded" alt="ガイドページ画像2">
                </div>

            </div>



            {{-- 待合 --}}
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">3.待合</h2>
                <p class="text-lg border-l-4 pl-3 py-0.5 inline-block leading-tight" style="border-color:#0CC0DF;">
                    待合スペースについて
                </p>

                <p class="text-sm pb-5 leading-loose">
                    動物たちが落ち着いて過ごせるよう、草食・小動物用と肉食動物用に待合スペースを分けてご案内しています。
                </p>

                <p class="text-lg border-l-4 pl-3 py-0.5 inline-block leading-tight" style="border-color:#0CC0DF;">
                    草食・小動物優先エリア
                </p>
                <p class="text-sm pb-5">
                    ウサギ、モルモット、ハリネズミ、爬虫類、小鳥などのためのスペースです。
                </p>

                <p class="text-lg border-l-4 pl-3 py-0.5 inline-block leading-tight" style="border-color:#0CC0DF;">
                    肉食動物優先エリア
                </p>
                <p class="text-sm">
                    イヌ、ネコ、フェレット、ミーアキャット、猛禽類などのためのスペースです。
                </p>
            </div>

            {{-- 診察 --}}
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">4.診察について</h2>
                <div class="max-w-5xl mx-auto flex flex-col space-y-2">
                    <p class="text-sm mb-5 leading-loose">
                        まずご家族のお話をじっくりと伺うところから診察を始めます。<br>
                        小さな変化や気になることがありましたら、どんなことでも遠慮なくお聞かせください。<br>
                        その子の性格や暮らしぶりを知ることが、より良い診療につながると考えています。<br>
                        視診、触診、聴診も行い、疑われる病気と必要な検査、料金などを十分にご説明して各種検査へ進みます。
                    </p>
                    <img src="{{ asset('images/guide-4.png') }}" class="w-auto max-w-full rounded" alt="ガイドページ画像4">
                </div>
            </div>

            {{-- 治療 --}}
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">5.治療</h2>
                <div class="max-w-5xl mx-auto flex flex-col space-y-1">
                    <p class="text-sm mb-6 leading-loose">
                        同じ病気であっても、症例に応じて様々な治療の選択肢があります。<br>
                        できるだけ多くの選択肢を提示させていただき、その中で最良と思われるものを、飼い主様ともよく相談し選ぶよう努めます。
                    </p>
                    <div class="h-40 rounded overflow-hidden relative">
                        <img src="{{ asset('images/home-top-slide-04.png') }}"
                            class="absolute top-4 h-auto w-full object-cover"
                            alt="ガイドページ画像5">
                    </div>

                </div>
            </div>

            {{-- お会計 --}}
            <div class="rounded p-6 flex flex-col space-y-2"
                style="background-color: rgba(176, 243, 59, 0.2);">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">6.お会計</h2>
                <div class="max-w-5xl mx-auto flex flex-col space-y-2">
                    <p class="text-sm mb-3 leading-loose">
                        各種クレジットカードがご使用いただけます。分割でのお払いも可能です。
                    </p>
                    <img src="{{ asset('images/guide-6.png') }}" class="h-30 rounded object-cover pb-3" alt="クレジットカード種類">
                </div>
                <p class="text-lg border-l-4 pl-3 py-0.5 inline-block leading-tight" style="border-color:#0CC0DF;">
                    ペット保険
                </p>
                <p class="text-sm pb-5 leading-loose">
                    「アニコム損害保険」「アイペット損害保険」のペット保険対応病院です。<br>
                    「健康保険証」を必ずご提示下さい。（カード会社とアニコムのマーク入れて）
                </p>
            </div>

        </div>

        <div class="w-full mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold text-center mt-6 mb-3">診察対象動物</h1>
            <div class="w-full mb-10"
                style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
            </div>
            <p class="text-sm mb-8 leading-loose">
                エキゾチック動物はイヌやネコに比べ、その生態や飼育方法、また病気や治療に関していまだに不明な点も多く、日夜、飼育や病気の情報が更新されています。
                当院ではそれらの新しく正確な情報と知識を診療に役立てるほか、飼い主の皆様に共有することで、飼育動物と飼い主の皆様のより良い関係性の構築を目的としています。
                動物は症状を隠すことも少なくないため、日々、些細なことでも気になることがあれば
                気軽に受診していただける病院を目指しております。
            </p>
            <div class="w-full flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 mb-10">
                <img src="{{ asset('images/guide-animal-01.png') }}" class="w-80 md:w-96 h-64 object-cover rounded" alt="ガイドページ動物画像1">
                <img src="{{ asset('images/guide-animal-02.png') }}" class="w-80 md:w-96 h-64 object-cover rounded" alt="ガイドページ動物画像2">
            </div>




            <div class="w-full mx-auto p-4 text-left mt-4">
                <h2 class="text-2xl font-bold mb-2" style="color:#FD8C07">哺乳類</h2>
                <p class="text-sm leading-loose">
                    イヌ・ネコ・ウサギ・フェレット・モルモット・ハムスター・ジャービル・チンチラ・デグー・マウス・ラット・ステップレミング・フェネック・フクロモモンガ・ミーアキャット・ハリネズミ・サル類他
                </p>
            </div>

            <div class="w-full mx-auto p-4 text-left">
                <h2 class="text-2xl font-bold mb-2" style="color:#FD8C07">鳥類</h2>
                <p class="text-sm leading-loose">
                    セキセイインコ・オカメインコ・ブンチョウ・ラブバード・ニワトリ（家庭飼育）・フクロウ類・ワシタカ類・野鳥※他
                </p>
            </div>

            <div class="w-full mx-auto p-4 text-left">
                <h2 class="text-2xl font-bold mb-2" style="color:#FD8C07">爬虫類</h2>
                <p class="text-sm leading-loose">
                    アカミミガメ・クサガメ・ニホンイシガメ・リクガメ類・ヒョウモントカゲモドキ・フトアゴヒゲトカゲ・イグアナ類・コーンスネーク・ナミヘビ類・ボールパイソン・ボア類他
                </p>
            </div>

            <div class="w-full mx-auto p-4 text-left">
                <h2 class="text-2xl font-bold mb-2" style="color:#FD8C07">両生類</h2>
                <p class="text-sm leading-loose">
                    ベルツノガエル・バジェットガエル・イエアメガエル・ヒキガエル・トゲイモリ・アカハライモリ・シリケンイモリ・ファイアーサラマンダー・メキシコサンショウウオ（ウーパールーパー）・イモリ類
                </p>
            </div>

            <div class="w-full mx-auto p-4 text-left mb-10">
                <h2 class="text-2xl font-bold mb-2" style="color:#FD8C07">魚類</h2>
                <p class="text-sm leading-loose">
                    金魚・観賞魚・コイ・日本産淡水魚の元、可能な限り対応いたします。一度、当院までご相談いただければ幸いです。なお、行政の指示の下、受け入れが不可の場合もあります。ご了承ください。
                </p>
            </div>

            <div class="w-full flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 mb-10">
                <img src="{{ asset('images/guide-animal-03.png') }}" class="w-80 md:w-96 h-64 object-cover rounded" alt="ガイドページ動物画像3">
                <img src="{{ asset('images/guide-animal-04.png') }}" class="w-80 md:w-96 h-64 object-cover rounded" alt="ガイドページ動物画像4">
            </div>
        </div>
    </div>
</x-app-layout>