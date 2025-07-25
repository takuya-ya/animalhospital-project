<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('休診日詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">休診日情報</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">休診日ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    #{{ $holiday->id }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ステータス</dt>
                                <dd class="mt-1">
                                    @if($holiday->holiday_date < now()->toDateString())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            終了
                                        </span>
                                    @elseif($holiday->holiday_date == now()->toDateString())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            本日
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            予定
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">休診日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $holiday->holiday_date->format('Y年n月j日 (D)') }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">登録日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $holiday->created_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            
                            @if($holiday->updated_at != $holiday->created_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">最終更新日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $holiday->updated_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                    @if($holiday->description)
                    <div class="mb-6 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">休診理由</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-700">{{ $holiday->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- 影響する予約の確認 -->
                    @php
                        $affectedReservations = \App\Models\Reservation::whereDate('reservation_datetime', $holiday->holiday_date)->get();
                    @endphp
                    
                    @if($affectedReservations->count() > 0)
                    <div class="mb-6 border-t border-gray-200 pt-6">
                        <div class="bg-red-50 border border-red-200 rounded-md p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        影響する予約があります
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <p>この日に {{ $affectedReservations->count() }} 件の予約があります。休診日を登録する前に、これらの予約の変更またはキャンセルが必要です。</p>
                                        <ul class="mt-2 list-disc list-inside">
                                            @foreach($affectedReservations as $reservation)
                                            <li>{{ $reservation->reservation_datetime->format('H:i') }} - {{ $reservation->user->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.holidays.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            一覧に戻る
                        </a>
                        
                        <div class="space-x-2">
                            <a href="{{ route('admin.holidays.edit', $holiday) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                編集
                            </a>
                            <form action="{{ route('admin.holidays.destroy', $holiday) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか？')">
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
</x-app-layout>