<x-app-layout>
    {{-- メインビジュアル（画像はページごとに変更） --}}
    <div class="w-screen mt-0 pt-0 overflow-hidden">
        <img
            src="/images/facility-top.png"
            alt="facilityトップ画像"
            class="w-full
               h-[200px] object-cover
               sm:h-64 sm:object-cover">
    </div>

    {{-- 本文 --}}
    <div class="max-w-[960px] mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-center mt-6 mb-3" style="color:#715433">院内・設備紹介</h1>
        <div class="max-w-full mb-10"
            style="height: 6px;
            background-image: radial-gradient(circle, #fd8c07 2px, transparent 2px);
            background-size: 8px 8px;
            background-repeat: repeat-x;
            border-radius: 3px;">
        </div>

        <p class="text-base text-center leading-loose mb-6" style="color:#715433">
            ペットと飼い主さまが安心して診療を受けられるよう、設備環境にも徹底してこだわっています。<br>
            大切な家族であるペットの健康を守るために、安心・清潔・高機能な医療設備を整え、丁寧な診療を行っています。
        </p>
    </div>

    <div class="max-w-[960px] mx-auto mb-10 grid grid-cols-1 sm:grid-cols-2 gap-10 p-10">

        {{-- 草食動物・小動物優先待合 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-01.png') }}" class="h-[260px] rounded object-cover" alt="草食動物画像">
            <h2 class="text-xl font-bold">草食動物・小動物優先待合</h2>
            <p class="text-sm" style="color:#715433">草食動物と小動物優先の待合となります。
                ウサギ、モルモットなどの草食の動物や、ハリネズミ、
                爬虫類、小鳥などの小動物のための優先待合スペースです。</p>

        </div>
        {{-- 肉食動物優先待合 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-02.png') }}" class="h-[260px] rounded object-cover" alt="肉食動物優先待合画像">
            <h2 class="text-xl font-bold">肉食動物優先待合</h2>
            <p class="text-sm" style="color:#715433">肉食動物優先の待合となります。
                イヌ、ネコ、フェレット、ミーアキャット、猛禽類などの
                ための優先待合スペースです。
            </p>
        </div>

        {{-- 集中治療用入院舎  --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-03.png') }}" class="h-[260px] rounded object-cover" alt="集中治療用画像">
            <h2 class="text-xl font-bold">集中治療用入院舎 </h2>
            <p class="text-sm" style="color:#715433">集中治療が必要な個体に対してICU内で
                入院治療を行うための設備です。</p>
        </div>

        {{-- 一般入院舎 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-03.png') }}" class="h-[260px] rounded object-cover" alt="集中治療用画像">
            <h2 class="text-xl font-bold">一般入院舎</h2>
            <p class="text-sm" style="color:#715433">すべての動物を受け入れ可能な入院スペースです。
                小動物用入院舎
                小動物を優先する入院スペースです。</p>
        </div>

        {{-- 小動物用入院舎 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-03.png') }}" class="h-[260px] rounded object-cover" alt="集中治療用画像">
            <h2 class="text-xl font-bold">小動物用入院舎</h2>
            <p class="text-sm" style="color:#715433">小動物を優先する入院スペースです。</p>
        </div>

        {{-- 感染症隔離用入院舎 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-03.png') }}" class="h-[260px] rounded object-cover" alt="集中治療用画像">
            <h2 class="text-xl font-bold">感染症隔離用入院舎</h2>
            <p class="text-sm" style="color:#715433">感染症を有する可能性のある患者様優先の入院スペースです。</p>
        </div>

        {{-- 資料室 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-07.png') }}" class="h-[260px] rounded object-cover" alt="資料室画像">
            <h2 class="text-xl font-bold">資料室</h2>
            <p class="text-sm" style="color:#715433">エキゾチック動物をはじめ、様々な獣医関連書籍がおいてあり、日常の診察の一助となります。</p>
        </div>

        {{-- 飼育室 --}}
        <div class="rounded flex flex-col space-y-2">
            <img src="{{ asset('images/facilities-Inside-08.png') }}" class="h-[260px] rounded object-cover" alt="飼育室画像">
            <h2 class="text-xl font-bold">飼育室</h2>
            <p class="text-sm" style="color:#715433">院長が個人的に飼育している動物の部屋です</p>
        </div>

    </div>

    {{-- 小動物・エキゾチックアニマル専用ペットホテル --}}
    <div class="max-w-[960px] mx-auto rounded p-6 border-4 border-orange-400"
        style="background-color: rgba(176, 243, 59, 0.2);">
        <div class="w-full flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-6 mb-10">
            <img src="{{ asset('images/facility-hotel-lt.png') }}" class="w-[150px] rounded object-cover" alt="飼育室画像">
            <h2 class="text-3xl font-bold text-center" style="color:#FD8C07">小動物・エキゾチックアニマル専用<br>ペットホテル</h2>
            <img src="{{ asset('images/facility-hotel-rt.png') }}" class="w-[150px] rounded object-cover" alt="飼育室画像">
        </div>
        <img src="{{ asset('images/facility-hotel-phot-01.png') }}" class="mx-auto rounded" alt="ペットと二人画像">
        <p class="mx-auto text-center mt-4 mb-10">
            モルモット、ハリネズミ、フェレット、フクロモモンガ、亀など――<br>
            珍しい小さなご家族も、安心してお預けいただけます。<br>
            習性に配慮したお世話はもちろん、体調の変化にも獣医師がすぐ対応できる環境です。<br>
            他ではなかなか見つからない、小動物にやさしいペットホテルです。<br>
            大切なご家族を、私たちが心をこめてお預かりいたします。
        </p>
        <div class="flex flex-col w-[306px] mx-auto md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 mb-10">
            <img src="{{ asset('images/facility-hotel-phot-02.png') }}" class="h-60 md:w-96 rounded object-cover" alt="カメ画像">
            <img src="{{ asset('images/facility-hotel-phot-03.png') }}" class="h-60 md:w-96 rounded object-cover" alt="ネコ用画像">
        </div>
    </div>

</x-app-layout>