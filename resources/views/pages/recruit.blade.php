<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    <div class="w-screen mt-0 pt-0 overflow-hidden">
        <img
            src="/images/recruit-top.png"
            alt="recruitトップ画像"
            class="w-full
               h-[200px] object-cover
               sm:h-64 sm:object-cover">
    </div>

    {{-- 本文 --}}
    {{-- タイトル --}}
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">採用情報</h1>
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
            当院ではイヌ・ネコに限らず、様々な動物を診療対象としています。
            受付業務や保定、エキゾチック動物のことなど広く学びたい方を募集します。
            未経験の方もエキゾチック動物に触れたことがない経験者の方も歓迎いたします。
        </p>

        <!-- PC用（3段落） -->
        <div class="hidden md:block text-[#715433] text-base text-center leading-snug space-y-2 mb-10 ">
            <p>当院ではイヌ・ネコに限らず、様々な動物を診療対象としています。</p>
            <p>受付業務や保定、エキゾチック動物のことなど広く学びたい方を募集します。</p>
            <p>未経験の方もエキゾチック動物に触れたことがない経験者の方も歓迎いたします。</p>
        </div>

    </div>

    {{-- 採用イメージ画像 --}}
    <div class="w-full max-w-[900px] aspect-[15/8] overflow-hidden rounded-lg mx-auto bg-gray-100">
        <img src="/images/home-contents-03.png" class="w-full h-full object-cover object-top" alt="Image">
    </div>



    {{-- 採用情報01 --}}
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">動物病院スタッフ（正社員）募集</h1>
        <div class="max-w-full"
            style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
        </div>
    </div>

    {{-- 採用詳細01 --}}
    <div class="max-w-4xl w-full mx-auto px-4 overflow-hidden">
        <table class="min-w-full table-auto border-t border-b border-[#715433] divide-y divide-[#715433]">
            <tbody class="divide-y divide-[#715433]">
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 w-1/4 font-semibold">雇用形態</th>
                    <td class="px-6 py-4">正社員</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">仕事内容</th>
                    <td class="px-6 py-4">会計、電話対応、診察補助、手術補助、調剤業務、入院動物のケア</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">給与</th>
                    <td class="px-6 py-4">月給200,000〜（経験者技術手当あり）、残業代支給</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">勤務時間</th>
                    <td class="px-6 py-4">月〜水、金、土 9:00〜17:30 もしくは11:00〜21:00</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">待遇・福利厚生</th>
                    <td class="px-6 py-4 space-y-1">
                        <ul class="list-disc list-inside">
                            社会保険完備、賞与年2回支給、昇給年1回、交通費支給あり（上限あり）、
                            学習・技能支援あり<、スタッフが飼っている動物の治療費補助・フード割引あり
                                </ul>
                    </td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">休日・休暇</th>
                    <td class="px-6 py-4">有給休暇あり、年末年始休暇、誕生日休暇あり</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">勤務地</th>
                    <td class="px-6 py-4">六ツ木小動物病院</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- 採用情報02 --}}
    <div class="max-w-4xl mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">動物病院スタッフ（パート）募集</h1>
        <div class="max-w-full"
            style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
        </div>
    </div>

    {{-- 採用詳細02 --}}
    <div class="max-w-4xl w-full mx-auto px-4 overflow-hidden">
        <table class="min-w-full table-auto border-t border-b border-[#715433] divide-y divide-[#715433]">
            <tbody class="divide-y divide-[#715433]">
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 w-1/4 font-semibold">雇用形態</th>
                    <td class="px-6 py-4">アルバイト/パート</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">仕事内容</th>
                    <td class="px-6 py-4">会計、電話対応、診察補助、手術補助、調剤業務、入院動物のケア</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">給与</th>
                    <td class="px-6 py-4">時給1,000～（経験者技能手当あり、夜間手当あり）</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">勤務時間</th>
                    <td class="px-6 py-4">月～水、金、土 9:00～12:00 もしくは17:00～21:00</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">待遇・福利厚生</th>
                    <td class="px-6 py-4 space-y-1">
                        <ul class="list-disc list-inside">
                            交通費支給あり（上限あり）雇用保険（法令に則り適⽤）、昇給あり（毎年4月）、
                            スタッフが飼っている動物の治療費補助・フード割引あり
                        </ul>
                    </td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">応募資格等</th>
                    <td class="px-6 py-4">土、日出勤可能な方優遇</td>
                </tr>
                <tr class="bg-white">
                    <th class="bg-[rgba(176,243,59,0.2)] text-left px-6 py-4 font-semibold">勤務地</th>
                    <td class="px-6 py-4">六ツ木小動物病院</td>
                </tr>
            </tbody>
        </table>
    </div>


    {{-- コピー --}}
    <div>
        <!-- スマホ用（1段落） -->
        <p class="block md:hidden text-[#715433] text-base text-center leading-loose mt-10 mb-20">
            当院では獣医師、愛玩動物看護師（免許取得予定者含む）
            他、就職を希望するかたの実習を受け入れております。
            面接、実習希望の方も先ずは下記フォームよりご連絡下さい。
        </p>

        <!-- PC用（3段落） -->
        <div class="hidden md:block text-[#715433] text-base text-center leading-snug space-y-2 mt-10 mb-20 ">
            <p>当院では獣医師、愛玩動物看護師（免許取得予定者含む）</p>
            <p>他、就職を希望するかたの実習を受け入れております。</p>
            <p>面接、実習希望の方も先ずは下記フォームよりご連絡下さい。</p>
        </div>

    </div>


    {{-- お問い合わせフォーム --}}
    {{-- タイトル --}}
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">求人等のお問い合わせ</h1>
        <div class="max-w-full mb-10"
            style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
        </div>
    </div>

    <div class="px-6 max-w-xl mx-auto rounded-lg">
        <form action="#" method="POST" class="space-y-5 text-[#715433]">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1 text-[#715433]">氏名</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433]" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-[#715433]">メールアドレス</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433]" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-[#715433]">電話番号</label>
                <input type="tel" name="phone" class="w-full px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433]">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-[#715433]">お問い合わせ内容</label>
                <textarea name="message" rows="4" class="w-full px-4 py-2 border border-[#715433] rounded-md text-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433]" required></textarea>
            </div>

            <div class="text-center pt-4">
                <button type="submit" class="bg-[#00c0de] text-white px-6 py-2 rounded-full hover:bg-[#00aac2] transition">
                    送信する
                </button>
            </div>
        </form>
    </div>

</x-app-layout>