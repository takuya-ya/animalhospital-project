<!-- オレンジ色の幅広のボタンのコンポーネント -->
@props(['route', 'label'])

<a href="{{ $route }}"
    class="inline-block sm:w-[400px] bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded mt-5 text-center"
    style="font-family: 'M PLUS Rounded 1c';">
    {{ $label }}
</a>