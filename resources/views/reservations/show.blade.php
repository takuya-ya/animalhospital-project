<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $reservation->id }}回目の予約
        </h2>
    </x-slot>

    <div class="p-6 flex">
        <a href="{{route('reservations.edit',$reservation)}}">
            <x-primary-button>
                編集
            </x-primary-button>
        </a>
        <form method="POST" action="{{ route('reservations.destroy', $reservation) }}" class="flex-2">
             @csrf
             @method('delete')
            <x-primary-button class="bg-red-700 ml-2">
               キャンセル
            </x-primary-button>
        </form>
    </div>
        <p>予約日時：{{ \Carbon\Carbon::parse($reservation->reservation_datetime)->format('Y年m月d日 H:i') }}</p>
        <p>登録日：{{ \Carbon\Carbon::parse($reservation->created_at)->format('Y年m月d日 H:i') }}</p>
    </div>

    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('本当にキャンセルしますか？');">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">
        キャンセルする
    </button>
    </form>
</x-app-layout>