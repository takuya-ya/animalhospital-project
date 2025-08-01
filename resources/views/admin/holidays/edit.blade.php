<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('休診日編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[960px] mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- 現在の休診日情報 -->
                    <div class="mb-8 p-4 bg-yellow-50 rounded-lg">
                        <h3 class="text-lg font-medium text-yellow-900 mb-2">現在の休診日</h3>
                        <p class="text-yellow-800">
                            日付: {{ $holiday->holiday_date->format('Y年n月j日 (D)') }}<br>
                            @if($holiday->description)
                            理由: {{ $holiday->description }}
                            @endif
                        </p>
                    </div>

                    <form method="POST" action="{{ route('admin.holidays.update', $holiday) }}">
                        @csrf
                        @method('PUT')

                        <!-- 休診日 -->
                        <div class="mb-6">
                            <label for="holiday_date" class="block text-sm font-medium text-gray-700">休診日</label>
                            <input type="date" name="holiday_date" id="holiday_date" 
                                   value="{{ old('holiday_date', $holiday->holiday_date->format('Y-m-d')) }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <x-input-error :messages="$errors->get('holiday_date')" class="mt-2" />
                            <p class="mt-2 text-sm text-gray-500">
                                注意: 日曜日は通常の定休日のため、登録する必要はありません。
                            </p>
                        </div>

                        <!-- 説明 -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">説明</label>
                            <textarea name="description" id="description" rows="3" 
                                      placeholder="休診理由を入力してください（例：学会参加、設備点検など）"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $holiday->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- 影響する予約の確認 -->
                        @php
                            $affectedReservations = \App\Models\Reservation::whereDate('reservation_datetime', $holiday->holiday_date)->get();
                        @endphp
                        
                        @if($affectedReservations->count() > 0)
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-md">
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
                                        <p>この日に {{ $affectedReservations->count() }} 件の予約があります：</p>
                                        <ul class="mt-2 list-disc list-inside">
                                            @foreach($affectedReservations as $reservation)
                                            <li>{{ $reservation->reservation_datetime->format('H:i') }} - {{ $reservation->user->name }}</li>
                                            @endforeach
                                        </ul>
                                        <p class="mt-2">休診日を変更する前に、これらの予約の変更またはキャンセルが必要です。</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center justify-between mt-6 space-x-4">
                            <a href="{{ route('admin.holidays.show', $holiday) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                詳細に戻る
                            </a>
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                更新
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>