<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    <div class="w-screen mt-0 pt-0 overflow-hidden">
        <img
            src="/images/faq-top.png"
            alt="FAQトップ画像"
            class="w-full
               h-[200px] object-cover
               sm:h-64 sm:object-cover">
    </div>


    <div class="max-w-[960px] mx-auto px-4">

        {{-- 本文 --}}
        {{-- タイトル --}}
        <div class="py-6">
            <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">よくある質問</h1>
            <div class="max-w-full mb-10"
                style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
            </div>

            {{-- コピー --}}
            <!-- スマホ用（1段落） -->
            <p class="block md:hidden text-[#715433] text-base text-center leading-loose mb-10">
                よくある質問をまとめましたので、こちらをご確認ください。
                この他のご質問はお電話にてお問い合わせください。
            </p>

            <!-- PC用（3段落） -->
            <div class="hidden md:block text-[#715433] text-base text-center leading-snug space-y-2 mb-10 ">
                <p>よくある質問をまとめましたので、こちらをご確認ください。</p>
                <p>この他のご質問はお電話にてお問い合わせください。</p>
            </div>

        </div>



        {{-- 質問01 --}}
        <div x-data="{ open: false }" class="bg-white border rounded-md mb-4 shadow-sm">
            <!-- 質問部分 -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center px-5 py-4 font-semibold text-left"
                style="color:#715433">
                <div class="flex items-center space-x-2">
                    <span class="text-[#FD8C07] font-bold text-xl">Q.</span>
                    <span class="text-lg font-bold">小動物やめずらしい動物も診てもらえますか？</span>
                </div>
                <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
            </button>

            <!-- 回答部分 -->
            <div x-show="open" x-transition class="px-5 pb-5 text-sm" style="color:#715433">
                <div class="text-left flex items-start space-x-2">
                    <p class="text-[#0CC0DF] font-bold text-xl shrink-0">A.</p>
                    <p class="font-normal text-base">
                        モルモットやハリネズミ、フクロモモンガ、フェレット、爬虫類など、
                        いわゆる“エキゾチックアニマル”や小さな動物たちの診療にも対応しております。<br>
                        ご家族の皆さまと協力しながら、その子にとって最適な診療を目指します。<br>
                        まずはお気軽にご相談ください。
                    </p>
                </div>
            </div>
        </div>

        {{-- 質問02 --}}
        <div x-data="{ open: false }" class="bg-white border rounded-md mb-4 shadow-sm">
            <!-- 質問部分 -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center px-5 py-4 font-semibold text-left"
                style="color:#715433">
                <div class="flex items-center space-x-2">
                    <span class="text-[#FD8C07] font-bold text-xl">Q.</span>
                    <span class="text-lg font-bold">診療や手術の料金はどのくらいかかりますか？</span>
                </div>
                <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
            </button>

            <!-- 回答部分 -->
            <div x-show="open" x-transition class="px-5 pb-5 text-sm" style="color:#715433">
                <div class="text-left flex items-start space-x-2">
                    <p class="text-[#0CC0DF] font-bold text-xl shrink-0">A.</p>
                    <p class="font-normal text-base">
                        まずはお電話にてお問い合わせください。<br>
                        診療内容や動物の種類によって料金が異なるため、お話を伺ってからご案内しております。<br>
                        手術など高額な治療が予想される場合は、事前にお見積もりをお出しすることも可能です。どうぞお気軽にご相談ください。
                    </p>
                </div>
            </div>
        </div>

        {{-- 質問03 --}}
        <div x-data="{ open: false }" class="w-full max-w-[960px] mx-auto bg-white border rounded-md mb-4 shadow-sm">
            <!-- 質問部分 -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center px-5 py-4 font-semibold text-left"
                style="color:#715433">
                <div class="flex items-center space-x-2">
                    <span class="text-[#FD8C07] font-bold text-xl">Q.</span>
                    <span class="text-lg font-bold">救急対応はしていますか？</span>
                </div>
                <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
            </button>

            <!-- 回答部分 -->
            <div x-show="open" x-transition class="px-5 pb-5 text-sm" style="color:#715433">
                <div class="text-left flex items-start space-x-2">
                    <p class="text-[#0CC0DF] font-bold text-xl shrink-0">A.</p>
                    <p class="font-normal text-base">
                        状況に応じて、できる限り対応いたします。<br>
                        診療時間外でも可能な範囲で対応いたしますが病状等によっては対応できない場合もございます。<br>
                        その際は、連携している救急対応可能な動物病院をご案内いたします。まずはお電話にてご相談ください。
                    </p>
                </div>
            </div>
        </div>

        {{-- 質問04 --}}
        <div x-data="{ open: false }" class="w-full max-w-[960px] mx-auto bg-white border rounded-md mb-4 shadow-sm">
            <!-- 質問部分 -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center px-5 py-4 font-semibold text-left"
                style="color:#715433">
                <div class="flex items-center space-x-2">
                    <span class="text-[#FD8C07] font-bold text-xl">Q.</span>
                    <span class="text-lg font-bold">診察時に注意することはありますか？</span>
                </div>
                <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
            </button>

            <!-- 回答部分 -->
            <div x-show="open" x-transition class="px-5 pb-5 text-sm" style="color:#715433">
                <div class="text-left flex items-start space-x-2">
                    <p class="text-[#0CC0DF] font-bold text-xl shrink-0">A.</p>
                    <p class="font-normal text-base">
                        普段の様子がわかる情報や写真・動画をお持ちいただくと助かります。<br>
                        小動物やエキゾチックアニマルは、診察室では緊張して普段の様子を見せないことがあります。<br>
                        食事量や排泄、動きなど、気になる点がある場合はメモや動画をぜひお持ちください。
                    </p>
                </div>
            </div>
        </div>

        {{-- 質問05 --}}
        <div x-data="{ open: false }" class="bg-white border rounded-md mb-4 shadow-sm">
            <!-- 質問部分 -->
            <button
                @click="open = !open"
                class="w-full flex justify-between items-center px-5 py-4 font-semibold text-left"
                style="color:#715433">
                <div class="flex items-center space-x-2">
                    <span class="text-[#FD8C07] font-bold text-xl">Q.</span>
                    <span class="text-lg font-bold">温度管理やストレス対策はどうしていますか？</span>
                </div>
                <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
            </button>

            <!-- 回答部分 -->
            <div x-show="open" x-transition class="px-5 pb-5 text-sm" style="color:#715433">
                <div class="text-left flex items-start space-x-2">
                    <p class="text-[#0CC0DF] font-bold text-xl shrink-0">A.</p>
                    <p class="font-normal text-base">
                        動物ごとの適正温度や環境に配慮した管理を行っています。<br>
                        エキゾチックアニマルは環境の変化に敏感な子が多いため、温度・湿度管理や音・においなどのストレス軽減に配慮した診察・お預かり体制を整えています。
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>