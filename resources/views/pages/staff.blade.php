<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    <div class="w-screen mt-0 pt-0 overflow-hidden">
        <img
            src="/images/staff-top.png"
            alt="staffトップ画像"
            class="w-full
               h-[200px] object-cover
               sm:h-64 sm:object-cover">
    </div>

    <div class="m-auto max-w-[960px]">
        {{-- 本文 --}}
        <div class="w-full mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold text-center mt-6 mb-3">スタッフ紹介</h1>
            <div class="w-full mb-10"
                style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
            </div>

            <p class="text-base text-center leading-loose mb-20" style="color:#715433">
                動物たちとご家族の毎日に寄り添い、心をこめてサポートするスタッフをご紹介します。<br>
                けやき通りの動物クリニックは、チームであなたの大切なご家族を支えます。
            </p>
        </div>


        <div class="w-full flex flex-col md:flex-row items-stretch justify-center px-4 mb-10 md:space-x-8 space-y-4 md:space-y-0 max-w-6xl mx-auto">
            <!-- 左：テキストグループ -->
            <div class="flex flex-col space-y-4 h-full" style="max-width: 400px;">
                <h2 class="text-3xl font-bold" style="color:#FD8C07">院長紹介</h2>
                <p class="text-sm leading-loose text-left" style="color:#715433">
                    院長の髙木佑基と申します。<br>
                    小さい頃から動物が大好きで、気付けばこの獣医師の道に進んでいました。<br>
                    診察中には動物たちが少しでも安心して診察に臨めるように、そして飼い主様が
                    どんな些細なことでも気軽に相談できるように、丁寧なコミニュケーションを心がけてまいります。<br>
                    もちろん、専門的な知識や技術を磨くことも大切にしていますが、一番大切にしていることは、動物たちとその飼い主様に寄り添う心です。
                    何かご心配なことがありましたら、どんなことでも気軽にご相談ください。
                </p>
                <img src="{{ asset('images/staff-dr-lt.png') }}" class="w-auto" alt="院長紹介画像">
            </div>
            <!-- 右：画像カラム -->
            <div class="h-full w-full max-w-sm flex items-center justify-center">
                <img src="{{ asset('images/staff-dr-rt.png') }}"
                    class="h-full w-auto object-contain rounded"
                    alt="院長画像">
            </div>
        </div>


        <div class="flex flex-col md:flex-row items-stretch justify-center
     w-110 p-5 px-4 gap-10 md:gap-10 max-w-6xl mx-auto"
            style="background-color: rgba(176, 243, 59, 0.2);">
            <!-- 左：画像カラム -->
            <!-- 左：画像カラム -->
            <div class="flex flex-row items-center justify-center space-x-4 md:flex-col md:items-start md:justify-start md:space-x-0 md:space-y-2 h-full max-w-sm p-0 m-0">
                <h2 class="text-xl font-bold" style="color:#715433">経歴</h2>
                <img src="{{ asset('images/staff-dr-career.png') }}"
                    class="h-32 w-auto object-contain md:h-40"
                    alt="院長画像">
            </div>
            <!-- 右：テキストグループ -->
            <div class="flex flex-col space-y-4 h-full w-full max-w-2xl">
                <p class="text-sm leading-loose text-left" style="color:#715433">
                    福岡県福岡市出身
                </p>
                <ul class="list-inside text-sm leading-loose" style="color:#715433">
                    <li>2008 福岡大学附属大濠高等学校 卒業</li>
                    <li>2015 酪農学園大学獣医学部獣医学科 卒業</li>
                    <li>2015－2025 バーツ動物病院勤務</li>
                    <li>2025 六ツ木小動物病院 開院</li>
                </ul>
                <p class="text-sm leading-loose text-left" style="color:#715433">
                    幼少期の昆虫から始まり、様々な生物を飼育してきました。<br>
                    学生時代は野生動物の救護活動やエキゾチック動物の寄生虫に関して学んできました。<br>
                    就職後はエキゾチック動物が多く来院する動物病院にて、イヌ・ネコをはじめ、
                    エキゾチック動物の診察に従事する他、論文の執筆や、教育講演なども行っております。
                </p>
            </div>
        </div>


        <div class="w-full mx-auto px-4 py-6 mt-10 mb-10">
            <div class="flex items-center justify-center space-x-4 mb-6">
                <img src="{{ asset('images/staff-academic-activity-lt.png') }}" alt="左画像" class="h-12 w-auto">
                <h1 class="text-2xl font-bold text-center" style="color:#715433">学術活動</h1>
                <img src="{{ asset('images/staff-academic-activity-rt.png') }}" alt="右画像" class="h-12 w-auto">
            </div>

            <div x-data="{ open: false }" class="w-full mx-auto border rounded mb-4 shadow-sm">
                <button
                    @click="open = !open"
                    class="w-full flex justify-between items-center px-4 py-3 bg-white font-semibold text-left"
                    style="color:#715433">
                    <span class="text-lg font-bold">筆頭論文、発表</span>
                    <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
                </button>

                <div x-show="open" x-transition class="px-4 py-3 bg-white text-sm">
                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">ウサギ</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">ウサギの臨床. 高木佑基. 臨床五月会. 2024.</li>
                            <li class="hanging-indent">ウサギの臨床の基本のき. 高木佑基. 酪農大臨床情報交換会. 2024.</li>
                            <li class="hanging-indent">獣医さんが話すうさぎのあれこれ. Rabbit EXPO 2025 in 福岡. 2025.</li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">小動物</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                ヨツユビハリネズミ（Atelerix albiventris）のクリプトスポリジウム症に関する検査法および治療に関する検討. 髙木佑基, 村越ふみ, 渡邊岳大,
                                中屋隆明, 高見義紀. 動物臨床医学年次大会抄録. 2017.
                            </li>
                            <li class="hanging-indent">
                                ヨツユビハリネズミのクリプトスポリジウム症に関する検査法および治療法に関する検討. 高木佑基, 渡辺岳大, 高見義紀. 九州エキゾチック動物臨床研究会...
                            </li>
                            <li class="hanging-indent">
                                ハリネズミのクリプトスポリジウム症に関する検査法および治療に関する検討. 高木佑基, 渡辺岳大, 高見義紀. 動物臨床医学. 28(1)13-15. 2019.
                            </li>
                            <li class="hanging-indent">
                                Molecular identification of Cryptosporidium isolates from ill exotic pet animals in Japan including a new subtype in Cryptosporidium
                                fayeri (日本で初めての検出となるCryptosporidium fayeriを含む症状を有したエキゾチック動物からのクリプトスポリジウム原虫の遺伝子学的手法を用いた検出).
                                Youki Takaki, Yoshinori Takami, Takehiro Watanabe, Takaaki Nakaya, Fumi Murakoshi. Vet. Parasitol. Reg. 21:100430.
                                2020.
                            </li>
                            <li class="hanging-indent">
                                First demonstration of Strongyloides parasite from an imported pet meerkat – Possibly a novel species in the stercoralis/procyonis
                                group (輸入されたミーアキャットからの新しい種類である可能性のある糞線虫類線虫の検出報告). Youki Takaki, Sho Kadekaru, Yoshinori Takami,
                                Ayako Yoshida, Haruhiko Maruyama, Yumi Une, Eiji Nagayasu. Parasitol. International. 84(1):102399. 2021
                            </li>
                            <li class="hanging-indent">
                                ハムスターの消化器疾患. 高木佑基. 九州エキゾチック動物臨床研究会 第7回九州エキゾチック動物臨床研究会セミナー抄録. 2024.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">爬虫類</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                糞便及び死亡個体を用いた活用した動物園展示爬虫類の蠕虫保有状況の把握. 高木佑基, 田中祥菜, 高江洲昇, 本田直也, 浅川満彦. 第20回日
                                本野生動物医学会つくば大会, 国立環境研究所. 2014.
                            </li>
                            <li class="hanging-indent">
                                糞便及び死亡個体を用いた活用した動物園展示爬虫類の蠕虫保有調査. 高木佑基, 高江洲昇,本田直也,浅川満彦. 第8回蠕虫研究会,札幌市.
                                2014.
                            </li>
                            <li class="hanging-indent">
                                最近経験した飼育・野生動物からのシタムシ類検出事例. 高木佑基, 浅川満彦. Medical Entomology and Zoology, 65(2): 83-83. 2014.
                            </li>
                            <li class="hanging-indent">
                                舌形動物および舌虫症に関する最近の知見 ―特に酪農学園大学野生動物医学センター WAMCで扱われた事例を中心に. 高木佑基, 浅川満彦.
                                J.Rakuno Gakuen Univ,40 (1):11-16. 2015.
                            </li>
                            <li class="hanging-indent">
                                動物園展示爬虫類における蠕虫類保有状況の調査. 高木佑基, 高江洲昇, 本田直也, 浅川満彦. J-vet7. 2015.
                            </li>
                            <li class="hanging-indent">
                                Genus Raillietiella (Pentastomida) obtained from captive reptiles at a northern Japan zoo(北日本の動物園の飼育爬虫類からえられ
                                たRaillietiella属舌形動物の検出). Youki TAKAKI, Mitsuhiko ASAKAWA. Med. Entomol. Zool. 7(1): 35-36. 2016.
                            </li>
                            <li class="hanging-indent">
                                九州域内ー動物病院におけるミシシッピアカミミガメ（Trachemys scripta elegans）218症例238疾患の発生状況. 高木佑基, 渡辺岳大, 武
                                山航, 高見義紀. エキゾチックペット研究会 症例発表会抄録. 2016.
                            </li>
                            <li class="hanging-indent">
                                九州域内ー動物病院に来院した飼育爬虫類1560個体の雌性生殖器疾患の発生状況. 高木佑基, 渡辺岳大, 武山航, 高見義紀. エキゾチックペ
                                ット研究会症 症例発表会抄録. 2017
                            </li>
                            <li class="hanging-indent">
                                九州域内一動物病院に来院した飼育爬虫類1560個体の雌性生殖器疾患の発生状況. 高木佑基, 武山航, 渡邊岳大, 森田真央, 高見義紀. エキゾ
                                チックペット研究会誌, (19): 3-5. 2017.
                            </li>
                            <li class="hanging-indent">
                                ウォールバーグネコツメヤモリより検出されたシタムシ類の治療報告. 高木佑基, 渡辺岳大, 高見義紀. エキゾチックペット研究会症 症例検
                                討会抄録. 2019.
                            </li>
                            <li class="hanging-indent">
                                フトアゴヒゲトカゲのコクシジウムに対するトルトラズリルの駆虫効果. 高木佑基, 渡辺岳大, 高見義紀. 九州エキゾチック動物臨床研究会　
                                第1回九州エキゾチック動物臨床研究会何でも症例検討・相談会＜症例検討会＞抄録. 2019.
                            </li>
                            <li class="hanging-indent">
                                ヒョウモントカゲモドキのクリプトスポリジウム感染症におけるパロモマイシンの有用性と予後についての検討. 高木佑基, 渡邉岳大, 加藤
                                一世, 高見義紀. 第25回日本野生動物医学会大会抄録. 2019.
                            </li>
                            <li class="hanging-indent">
                                Tongue worm (subclass: Pentastomida) infection and treatment in two domesticated reptiles - A case report(症例報告-２頭の家庭
                                飼育爬虫類での舌形動物寄生と治療). Youki Takaki, Takao Irie, Yoshinori Takami, Mistuhiko Asakawa, Ayako Yoshida. Parasitol. Int.
                                91:102617. 2022.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">鳥類</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                脛骨骨折を呈したシロムネオオハシ Ramphastos tucanus に対してＸ線透視下にてキルシュナー鋼線を用いて固定術を行った一例. 高木
                                佑基, 渡辺岳大, 武山航, 高見義紀. 鳥類臨床研究会 症例検討会21回抄録. 2017.
                            </li>
                            <li class="hanging-indent">
                                脛骨骨折を呈したシロムネオオハシ（Ramphaastos tucanus）に対してX線透視下にてキルシュナー鋼線を用いて非開創的に固定術を行
                                った一例. 高木佑基, 渡辺岳大, 武山航, 高見義紀. 鳥類臨床研究会会報(20). 2017.
                            </li>
                            <li class="hanging-indent">
                                セキセイインコ（Melopsittacus undulatus）の疥癬症におけるセラメクチンの有用性に関する検討. 高木佑基, 渡辺岳大, 高見義紀. 鳥類
                                臨床研究会 症例検討会22回抄録. 2018.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">無脊椎動物</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                Leucochloridium属吸虫スポロシスト寄生オカモノアラガイの教材化事例. 高木佑基, 平山拓郎, 牛山喜偉, 吉沼利晃, 浅川満彦. 寄生虫学研
                                究：材料と方法2014年版, 三恵社, 名古
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">その他</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                獣毛鑑定の一例. 高木佑基, 浅川満彦. 森林保護, (341)：6-7. 2016.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">教育講演</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                犬猫のワクチン及びエキゾチック動物の飼養管理. 令和6年度 福岡県動物取扱責任者研修会. 2024.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>



            <div x-data="{ open: false }" class="w-full mx-auto border rounded mb-4 shadow-sm">
                <button
                    @click="open = !open"
                    class="w-full flex justify-between items-center px-4 py-3 bg-white font-semibold text-left"
                    style="color:#715433">
                    <span class="text-lg font-bold">関連論文</span>
                    <span x-text="open ? '－' : '＋'" class="text-2xl leading-none" style="color:#FD8C07"></span>
                </button>

                <div x-show="open" x-transition class="px-4 py-3 bg-white text-sm" style="color:#715433">
                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">ウサギ</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                対称性ジメチルアルギンの測定はウサギ(Oryctolagus cuniculus)の臨床に有用か. 渡辺岳大, 高木佑基, 加藤一世, 高見義紀. 日本獣医エキ
                                ゾチック動物学会症例検討会抄録. 2021.
                            </li>
                            <li class="hanging-indent">
                                ペットのウサギ（Oryctolagus cuniculus）におけるドライ式血液凝固検査機器測定項目の参照範囲. 坂井晴哉, 高木佑基, 渡邉岳大, 加藤
                                一世, 高見義紀. 日本獣医エキゾチック動物学会　症例検討会抄録. 2023.・
                            </li>
                            <li class="hanging-indent">
                                ペットのウサギ (Oryctolagus cuniculus) におけるドライ式血液凝固検査機器測定項目の参照範囲. 坂井晴哉, 高木佑基, 渡邉岳大, 加藤一
                                世, 高見義紀. 日本獣医エキゾチック動物学会誌 5: 3-8, 2023.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">小動物</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                ヨツユビハリネズミに発生した疾患に関する回顧的調査. 小泉伊織, 高木佑基, 渡邉岳大,武山航, 高見義紀. エキゾチックペット研究会誌,
                                (18):27-34. 2016.
                            </li>
                            <li class="hanging-indent">
                                ヨツユビハリネズミ231症例に発生した408疾患に関する検討. 小泉伊織, 高木佑基, 渡邉岳大, 武山航, 高見義紀. エキゾチックペット研究
                                会症　症例発表会抄録, :42-46. 2016.
                            </li>
                            <li class="hanging-indent">
                                ヨツユビハリネズミ231症例に発生した408疾患に関する検討. 小泉伊織, 高木佑基, 渡邉岳大, 武山航, 高見義紀. 第12回日本獣医内科学ア
                                カデミー学術大会抄録,:209. 2016.
                            </li>
                            <li class="hanging-indent">
                                子宮卵巣摘出術を行ったヨツユビハリネズミ62症例の術後の短期的予後調査. 渡辺岳大, 高木佑基, 高見義紀. エキゾチックペット研究会
                                症　症例検討会抄録. 2019.
                            </li>
                            <li class="hanging-indent">
                                卵巣子宮摘出術を行ったヨツユビハリネズミ(Atelerix albiventris)62症例の術後の短期的予後調査. 渡邉岳大, 高木佑基, 高見義紀. 日本
                                獣医エキゾチック動物学会誌. (1). 2019.
                            </li>
                            <li class="hanging-indent">
                                内分泌感受性乳癌のフクロモモンガの1例.渡辺岳大, 高木佑基, 高見義紀. 九州エキゾチック動物臨床研究会 第1回九州エキゾチック動物
                                臨床研究会何でも症例検討・相談会＜症例検討会＞抄録. 2019.
                            </li>
                            <li class="hanging-indent">
                                Strongyloidiasis in recently arrived captive-bred meerkats imported to Japan(日本に輸入された野生採取個体のミーアキャットから
                                の糞線虫の検出). Eiji Nagayasu, Youki Takaki, Yoshinori Takami, Ayako Yoshida, Yumi Une, Haruhiko Maruyama. J. Exo. Pet. Med.
                                (40).2021.
                            </li>
                            <li class="hanging-indent">
                                尿道結石による尿閉を呈したシマリス（Tamias sibiricus）に対して膀胱腹壁瘻を作成した2例. 坂井晴哉, 高木佑基, 渡邉岳大, 加藤一世,
                                高見義紀. 日本獣医エキゾチック動物学会　症例検討会抄録. 2023.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">爬虫類</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                食欲不振を呈する幼体の半水棲ガメに輸血を実施した2症例の報告. 加藤一世, 高木佑基, 渡辺岳大, 高見義紀. 九州エキゾチック動物臨床研
                                究会　第2回九州エキゾチック動物臨床研究会何でも症例検討・相談会＜症例検討会＞抄録. 2020.
                            </li>
                            <li class="hanging-indent">
                                First report of ophidiomycosis in Asia caused by Ophidiomyces ophiodiicola in captive snakes in Japan(飼育ヘビにおける
                                Ophidiomyces ophiodiicolaによるアジア初の上皮真菌症の報告). Yoshinori Takami, Kyung-Ok NAM, Youki TAKAKI, Sho Kadekaru,
                                Chizuka HEMMI, Tsuyoshi Hosoya, Yumi Une June. J. Vet. Med Sci. 83(8). 2021.
                            </li>
                            <li class="hanging-indent">
                                Survey of tortoises with urolithiasis in Japan(日本における尿路結石症のカメの調査). Yoshinori Takami, Hitoshi KOIEYAMA, Nobuo
                                SASAKI, Takumi IWAI, Youki TAKAKI, Takehiro WATANABE, Yasutugu MIWA. J. Vet. Med. Sci. 83(3). 2021.
                            </li>
                            <li class="hanging-indent">
                                First report of emerging snake fungal disease caused by Ophidiomyces ophiodiicola from Asia in imported captive snakes in
                                Japan(輸入飼育ヘビにおけるアジア産Ophidiomyces ophiodiicolaによる新興ヘビ真菌症の日本初報告). Yoshinori Takami, Yumi Une, Ikki
                                Mitsui, Chizuka Hemmi, Youki Takaki, Tsuyoshi Hosoya, Kyung-Ok Nam. J. Vet. Med Sci. 83(8) : 1234-1239. 2021.
                            </li>
                            <li class="hanging-indent">
                                胃神経内分泌癌摘出後のフトアゴヒゲトカゲ (Pogona vitticeps) の臨床転帰2例. 高見義紀, 高木佑基, 渡邉岳大, 加藤一世, 坂井晴哉, 谷口
                                萌, 嘉手苅将, 宇根有美. 日本獣医エキゾチック動物学会誌 4: 3-7. 2022.
                            </li>
                        </ul>
                    </div>

                    <div class="w-full mx-auto p-4 text-left mt-4">
                        <h2 class="text-xl font-bold mb-2" style="color:#FD8C07">両生類</h2>
                        <ul class="list-disc list-outside pl-6 text-sm leading-loose space-y-6">
                            <li class="hanging-indent">
                                メキシコサンショウウオの転覆症候群3例　外科的治療と病理，高見義紀. エキゾチックペット研究会症　症例発表会抄録, 2017
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>