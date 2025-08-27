<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('予約管理') }}
            </h2>
            <a href="{{ route('admin.reservations.create') }}" class="text-white font-bold py-2 px-4 rounded hover:brightness-110" style="background-color: #FD8C07;">
                新規予約作成
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[960px] mx-auto px-4">
            <!-- 検索フィルター -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.reservations.index') }}" class="flex flex-col sm:flex-row flex-wrap gap-4">
                        <div class="flex-1 min-w-0">
                            <label for="date" class="block text-sm font-medium text-gray-700">日付</label>
                            <input type="date" name="date" id="date" value="{{ request('date') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="flex-1 min-w-0">
                            <label for="user_name" class="block text-sm font-medium text-gray-700">顧客名</label>
                            <input type="text" name="user_name" id="user_name" value="{{ request('user_name') }}"
                                placeholder="顧客名で検索"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="flex flex-col sm:flex-row items-center sm:items-end w-full sm:w-auto">
                            <button type="submit" class="text-white font-bold py-2 px-4 rounded w-full sm:w-auto hover:brightness-110" style="background-color: #715433;">
                                検索
                            </button>
                            <a href="{{ route('admin.reservations.index') }}"
                            class="mt-2 sm:mt-0 sm:ml-2 text-gray-800 font-bold py-2 px-4 rounded w-full sm:w-auto text-center hover:brightness-110" style="background-color: #C4C4C4;">
                                クリア
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-3 sm:p-6 text-gray-900">
                    @if($reservations->count() > 0)
                        <!-- スマホ版テーブル（md未満） -->
                        <div class="block md:hidden">
                            <table class="w-full table-fixed border-collapse">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="w-1/2 px-6 py-3 text-center text-base font-semibold text-gray-700 tracking-wider">予約日</th>
                                        <th class="w-1/2 px-6 py-3 text-center text-base font-semibold text-gray-700 tracking-wider">顧客名</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $reservation)
                                    <tr class="border-t border-gray-200 {{ $reservation->reservation_datetime < now() ? 'bg-gray-50' : '' }}">
                                        <td class="px-6 py-4 text-center whitespace-normal sm:whitespace-nowrap">
                                            <a href="{{ route('admin.reservations.show', $reservation) }}" 
                                            class="text-sm font-medium sm:font-normal" style="color: #088BA1;">
                                                {{ $reservation->created_at->format('Y年n月j日 (D)') }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-700 sm:px-6 sm:py-4 whitespace-normal sm:whitespace-nowrap">
                                            <div class="flex flex-col items-center sm:block">
                                                <span class="block font-normal sm:font-medium">
                                                    {{ $reservation->user->name }}
                                                </span>
                                            </div>
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
                                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">予約日時</th>
                                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">顧客名</th>
                                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">メールアドレス</th>
                                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">予約日</th>
                                        <th class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">予約状況</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($reservations as $reservation)
                                    <tr class="{{ $reservation->reservation_datetime < now() ? 'bg-gray-100' : '' }}">
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <a href="{{ route('admin.reservations.show', $reservation) }}"
                                            class="text-sm font-medium hover:underline hover:brightness-110" style="color: #088BA1;">
                                                {{ $reservation->reservation_datetime->format('Y年n月j日 (D)') }}
                                            </a>
                                            <div class="text-sm text-gray-500">
                                                {{ $reservation->reservation_datetime->format('H:i') }}
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $reservation->user->name }}
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap hidden lg:table-cell">
                                            <div class="text-sm text-gray-500">
                                                {{ $reservation->user->email }}
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">
                                                {{ $reservation->created_at->format('Y年n月j日') }}
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">
                                            @if($reservation->reservation_datetime < now())
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    完了
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    予約中
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $reservations->withQueryString()->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">予約がありません</h3>
                            <p class="mt-1 text-sm text-gray-500">新しい予約を作成してください。</p>
                            <div class="mt-6">
                                <a href="{{ route('admin.reservations.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:brightness-110" style="background-color: #FD8C07;">
                                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    新規予約作成
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>