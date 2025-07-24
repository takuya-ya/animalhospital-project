@auth 
 <p>
    {{ Auth::user()->name }} さん、こんにちは！
 </p>
@endauth

<x-app-layout>
    <x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ Auth::user()->name }} さんの予約一覧
</h2>
    </x-slot>

    <div class="mx-auto px-6">
        @if(session('message'))
             <div class="text-red-600 font-bold">
                {{session('message')}}
             </div>
        @endif
        
        @foreach ($reservations as $reservation)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                <!-- 予約IDを表示 -->
                <a href="{{ route('reservations.show', $reservation->id) }}"
                   class="text-black-600 text-base">
                   {{ $reservation->id }}回目の予約
                </a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4 font-extrabold text-blue-700 text-3xl ">
                <a href="{{route('reservations.show',$reservation)}}" class="text-blue-600">
                   {{ \Carbon\Carbon::parse($reservation->reservation_datetime)->format('Y年m月d日 H:i') }}に予約されました
                </a>
            </p>
            <div class="p-4 text-sm text-gray-600">
                   登録日: {{ \Carbon\Carbon::parse($reservation->created_at)->format('Y年m月d日 H:i') }}
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>