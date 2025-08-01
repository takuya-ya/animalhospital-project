<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('休診日管理') }}
            </h2>
            <a href="{{ route('admin.holidays.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                新規休診日登録
            </a>
        </div>
    </x-slot>

    <div class="pt-12 pb-o">
        <div class="max-w-[960px] mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 px-3">
                    @if($holidays->count() > 0)
                        <!-- スマホ版テーブル（md未満） -->
                        <div class="block md:hidden">
                            <table class="w-full table-fixed border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="w-1/2 px-6 py-3 text-center text-base font-semibold text-gray-700">休診日</th>                                        {{-- カラム間の余白 --}}
                                        <th class="w-1/2 px-6 py-3 text-center text-base font-semibold text-gray-700">理由</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($holidays as $holiday)
                                    <tr class="border-t border-gray-200">
                                        <td class="w-1/2 px-6 py-3 text-center">
                                            <a href="{{ route('admin.holidays.show', $holiday) }}"
                                            class="text-base font-bold text-indigo-600 hover:underline">
                                                {{ $holiday->holiday_date->format('Y年n月j日(D)') }}
                                            </a>
                                        </td>
                                        <td class="w-1/2 px-6 py-3 text-center text-base text-gray-700">
                                            {{ $holiday->description ?: '説明なし' }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                        <!-- タブレット以上の通常テーブル（md以上） -->
                        <div class="hidden md:block overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">休診日</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">曜日</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">説明</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">登録日</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ステータス</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">操作</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($holidays as $holiday)
                                    <tr class="{{ $holiday->holiday_date < now()->toDateString() ? 'bg-gray-50' : '' }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $holiday->holiday_date->format('Y年n月j日') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ $holiday->holiday_date->format('(D)') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{ $holiday->description ?: '説明なし' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ $holiday->created_at->format('Y年n月j日') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($holiday->holiday_date < now()->toDateString())
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    終了
                                                </span>
                                            @elseif($holiday->holiday_date == now()->toDateString())
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    本日
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    予定
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                            <a href="{{ route('admin.holidays.show', $holiday) }}" class="text-indigo-600 hover:text-indigo-900">詳細</a>
                                            <a href="{{ route('admin.holidays.edit', $holiday) }}" class="text-yellow-600 hover:text-yellow-900">編集</a>
                                            <form action="{{ route('admin.holidays.destroy', $holiday) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか？')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">削除</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6">
                            {{ $holidays->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">休診日が登録されていません</h3>
                            <p class="mt-1 text-sm text-gray-500">新しい休診日を登録してください。</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.holidays.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    新規休診日登録
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>