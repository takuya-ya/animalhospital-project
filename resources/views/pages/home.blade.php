<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    {{-- スライダーセクション --}}
    <div class="swiper mySwiper w-full mb-10">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/home-top-slide-01.png') }}" class="w-full object-cover " alt="1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/home-top-slide-02.png') }}" class="w-full object-cover " alt="2">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/home-top-slide-03.png') }}" class="w-full object-cover" alt="3">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/home-top-slide-04.png') }}" class="w-full object-cover" alt="4">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/home-top-slide-05.png') }}" class="w-full object-cover" alt="5">
            </div>
        </div>

        {{-- 👇 ドット（ページネーション）はそのまま --}}
        <div class="swiper-pagination mt-4 text-center"></div>
    </div>

    <div class="m-auto max-w-[960px]">
        {{-- 本文 --}}
        {{-- お知らせセクション --}}
        <div class="w-full mx-auto py-10 px-4 text-center relative">
            {{-- 見出し + 一覧リンク --}}
            <div class="flex justify-between items-center mb-5">
                {{-- 見出し（中央揃えにするために左右画像含めflex） --}}
                <div class="flex items-center justify-center space-x-2 mx-auto">
                    <img src="{{ asset('images/home-info.png') }}" alt="左画像" style="height: 40px;">
                    <h2 class="text-lg font-bold" style="font-size: 1.2rem;">お知らせ</h2>
                    <img src="{{ asset('images/home-info.png') }}" alt="右画像" style="height: 40px;">
                </div>
            </div>

            {{-- お知らせリスト枠 --}}
            <div class="bg-white border-2 border-[#FD8C07] rounded p-10 relative mt-10">
                {{-- お知らせ内容 --}}
                <ul class="space-y-3 text-sm text-left">
                    @foreach([
                    ['date' => '2025.07.01', 'text' => '7月6日(日)：院長不在のため休診とさせていただきます。'],
                    ['date' => '2025.05.15', 'text' => '5月18日(日)：院長不在のため休診とさせていただきます。'],
                    ['date' => '2025.04.24', 'text' => '5月3日(土)：院長不在のため休診とさせていただきます。'],
                    ['date' => '2025.04.04', 'text' => '4月10日(水)：院長不在のため休診とさせていただきます。'],
                    ['date' => '2025.03.01', 'text' => '3月9日(日)：院長不在のため休診とさせていただきます。'],
                    ] as $item)
                    <li class="text-left text-sm leading-relaxed">
                        <span style="color:#FD8C07">{{ $item['date'] }}</span>
                        <span>{{ $item['text'] }}</span>
                    </li>

                    {{-- 区切り線（最後以外） --}}
                    @unless($loop->last)
                    <div class="max-w-full mb-2"
                        style="height: 3px;
                background-image: radial-gradient(circle, #715433 1px, transparent 1px);
                background-size: 3px 3px;
                background-repeat: repeat-x;
                border-radius: 3px;">
                    </div>
                    @endunless
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="max-w-[960px] mx-auto px-4">

            <div class="w-full mx-auto py-6">
                <h1 class="text-2xl font-bold text-center mt-6 mb-3">当院について</h1>
                <div class="w-full mb-10"
                    style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
                </div>

                <div class="flex flex-col md:flex-row items-stretch justify-center w-full px-4 mb-10 md:space-x-8 space-y-4 md:space-y-0 max-w-6xl mx-auto">
                    <!-- 左：テキストグループ -->
                    <div class="flex flex-col space-y-4 h-full" style="max-width: 400px;">
                        <p class="text-sm leading-loose text-left" style="color:#715433">
                            動物病院を開院するにあたり、私が目指す病院はすべての動物を診る病院です。
                            特にイヌ・ネコ以外の動物を診る病院はいまだ、多くはありません。
                            脊椎動物（背骨を持つ動物）は哺乳類、鳥類、爬虫類、両生類、魚類に分かれます。
                            その5種を主な診療対象とし、さらにもうひとつ、飼い主様の心の健康で合計６とし、
                            それらをモチーフとして六ツ木小動物病院と名付けました。
                        </p>

                        <div class="rounded p-6 flex flex-col"
                            style="background-color: rgba(176, 243, 59, 0.2);">
                            {{-- 開業理念 --}}
                            <h2 class="text-2xl font-bold">開業理念</h2>
                            <p class="text-sm text-base leading-loose">
                                当院はイヌ、ネコのほか、ウサギ、小鳥、爬虫類などエキゾチック動物の診察も実施しております。
                                エキゾチック動物はイヌやネコに比べ、その生態や飼育方法、また病気や治療に関していまだに不明な点も多く、
                                日夜、飼育や病気の情報が更新されています。当院ではそれらの新しく正確な情報と知識を診療に役立てるほか、
                                飼い主の皆様に共有することで、飼育動物と飼い主の皆様のより良い関係性の構築を目的としています。
                                動物は症状を隠すことも少なくないため、日々、些細なことでも気になることがあれば
                                気軽に受診していただける病院を目指しております。
                            </p>
                        </div>
                    </div>
                    <!-- 右：画像カラム -->
                    <div class="h-full w-full max-w-sm flex items-center justify-center">
                        <img src="{{ asset('images/home-contents-01.png') }}"
                            class="h-full w-auto object-contain rounded"
                            alt="ホームのコンテンツ画像1">
                    </div>
                </div>
            </div>

            <div class="w-full mx-auto py-6">
                <h1 class="text-2xl font-bold text-center mt-6 mb-3">診察のご案内</h1>
                <div class="mb-10"
                    style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
                </div>

                <div class="flex flex-col md:flex-row items-stretch justify-center w-full px-4 mb-10 md:space-x-8 space-y-4 md:space-y-0 max-w-6xl mx-auto">
                    <!-- 左：画像カラム -->
                    <div class="h-full w-full max-w-sm flex items-center justify-center">
                        <img src="{{ asset('images/home-contents-02.png') }}"
                            class="h-full w-auto object-contain rounded"
                            alt="ホームのコンテンツ画像2">
                    </div>
                    <!-- 右：テキストグループ -->
                    <div class="flex flex-col space-y-4 h-full" style="max-width: 400px;">
                        <p class="text-sm leading-loose text-left" style="color:#715433">
                            六ツ木小動物病院に初めてご来院される方へのご案内です。<br>
                            まず、できるだけ飼い主様ご本人がお子さんと一緒にご来院いただけますようお願いいたします。
                            代理の方の場合、治療内容や費用などをご決定できない場合があります。
                            そのため、できるだけ意思を伝えられる方とわかった方が一緒にお越しください。
                            また、気になる症状などを簡単にメモしてお持ちいただけるとスムーズに診察できます。<br>
                            当院は福岡市早良区にあり、次郎丸駅から徒歩9分となっております。
                            また、お車で来院される飼い主様のために、駐車場も完備しておりますのでアクセスしやすくなっております
                        </p>
                        <a href="/guide">
                            <img src="{{ asset('images/home-btn-view-details.png') }}"
                                alt="詳しく見るボタン"
                                style="width: 180px; margin-left: auto; margin-right: auto;">
                        </a>

                    </div>
                </div>
            </div>

            <div class="w-full mx-auto py-6">
                <h1 class="text-2xl font-bold text-center mt-6 mb-3">スタッフ紹介</h1>
                <div class="mb-10"
                    style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
                </div>

                <div class="flex flex-col md:flex-row items-stretch justify-center w-full px-4 mb-10 md:space-x-8 space-y-4 md:space-y-0 max-w-6xl mx-auto">
                    <!-- 左：画像カラム -->
                    <div class="flex flex-col space-y-4 h-full" style="max-width: 400px;">
                        <p class="text-sm leading-loose text-left" style="color:#715433">
                            初めまして、福岡市の動物病院「六ツ木小動物病院」院長の髙木佑基と申します。
                            地元福岡で、みなさまの笑顔のお手伝いをさせていただくことで少しでも地域へ貢献させていただきたいと思っております。<br>
                            地域のみなさまに信頼され、愛される病院にするために、“愛情を持って診療すること・飼い主さまとの対話を大切にすること”をお約束します。<br>
                            獣医師として、そして一人の動物好きとして、スタッフが一丸となって皆様と動物たちの幸せな暮らしをサポートできれば嬉しいと思っております。
                        </p>
                        <a href="/staff">
                            <img src="{{ asset('images/home-btn-view-details.png') }}"
                                alt="詳しく見るボタン"
                                style="width: 180px; margin-left: auto; margin-right: auto;">
                        </a>
                    </div>
                    <!-- 右：テキストグループ -->
                    <div class="h-full w-full max-w-sm flex items-center justify-center">
                        <img src="{{ asset('images/home-contents-03.png') }}"
                            class="h-full w-auto object-contain rounded"
                            alt="ホームのコンテンツ画像3">
                    </div>
                </div>
            </div>

            <div class="w-full mx-auto py-6">
                <h1 class="text-2xl font-bold text-center mt-6 mb-3">院内・設備紹介</h1>
                <div class="mb-10"
                    style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
                </div>
                <div class="flex flex-col md:flex-row items-stretch justify-center w-full px-4 mb-10 md:space-x-8 space-y-4 md:space-y-0 max-w-6xl mx-auto">
                    <!-- 左：画像カラム -->
                    <div class="h-full w-full max-w-sm flex items-center justify-center">
                        <img src="{{ asset('images/home-contents-04.png') }}"
                            class="h-full w-auto object-contain rounded"
                            alt="ホームのコンテンツ画像4">
                    </div>
                    <!-- 右：テキストグループ -->
                    <div class="flex flex-col space-y-4 h-full" style="max-width: 400px;">
                        <p class="text-sm leading-loose text-left" style="color:#715433">
                            何でも相談できる地域のかかりつけ医院であるために現代社会において、ペットは家族そのものです。
                            言葉を話さない動物たちの体調を管理してあげられるのは、飼い主さまです。
                            当院は、動物たちと飼い主さまが少しでも長い時間を共に過ごすことができるよう、熱意と愛情をもって検査・治療にあたるほか、
                            お気軽に、そして安心して相談できる医院づくりを心がけております。
                            多様な動物たちの特性や症状に対応できるよう、それぞれに配慮した設備と環境を整えています。ペットホテルも併設しています。
                            小さなご家族が安心して過ごせるよう、丁寧な空間づくりを心がけています。
                        </p>
                        <a href="/facility">
                            <img src="{{ asset('images/home-btn-view-details.png') }}"
                                alt="詳しく見るボタン"
                                style="width: 180px; margin-left: auto; margin-right: auto;">
                        </a>
                    </div>
                </div>
            </div>


                <a href="#">
                    <!-- スマホ用画像：幅が md 未満のとき表示 -->
                    <img src="{{ asset('images/home-banner-to-hotel-sp.png') }}"
                        alt="スマホ用画像"
                        class="block md:hidden w-full mb-6">

                    <!-- PC用画像：幅が md 以上のとき表示 -->
                    <img src="{{ asset('images/home-banner-to-hotel-pc.png') }}"
                        alt="PC用画像"
                        class="hidden md:block w-full mb-6">
                </a>

                <div class="w-full flex flex-col md:flex-row items-center justify-center">
                    <a href="/faq">
                        <img src="{{ asset('images/home-banner-to-faq.png') }}" class="w-full" alt="よくある質問">
                    </a>
                    <a href="/recruit">
                        <img src="{{ asset('images/home-banner-to-recruit.png') }}" class="w-full" alt="採用情報">
                    </a>
                </div>

                <a href="/reservation">
                    <!-- スマホ用画像（768px未満で表示） -->
                    <img src="{{ asset('images/home-banner-to-reservation-sp.png') }}"
                        alt="診察予約（スマホ）"
                        class="block md:hidden w-full mt-6">

                    <!-- PC用画像（768px以上で表示） -->
                    <img src="{{ asset('images/home-banner-to-reservation-pc.png') }}"
                        alt="診察予約（PC）"
                        class="hidden md:block w-full mt-6">
                </a>

        </div>
</x-app-layout>