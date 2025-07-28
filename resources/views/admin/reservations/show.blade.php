<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">予約情報</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    #{{ $reservation->id }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ステータス</dt>
                                <dd class="mt-1">
                                    @if($reservation->reservation_datetime < now())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            完了
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            予約中
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->reservation_datetime->format('Y年n月j日 (D)') }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約時間</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->reservation_datetime->format('H:i') }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="mb-6 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">顧客情報</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">顧客名</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->user->name }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">メールアドレス</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->user->email }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">会員登録日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->user->created_at->format('Y年n月j日') }}
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">予約履歴</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">予約作成日時</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->created_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            
                            @if($reservation->updated_at != $reservation->created_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">最終更新日時</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $reservation->updated_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.reservations.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            一覧に戻る
                        </a>
                        
                        <div class="space-x-2">
                            <a href="{{ route('admin.reservations.edit', $reservation) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                編集
                            </a>
                            <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか？')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    削除
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>