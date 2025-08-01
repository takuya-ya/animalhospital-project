<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('新規休診日登録') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[960px] mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.holidays.store') }}">
                        @csrf

                        <!-- 休診日 -->
                        <div class="mb-6">
                            <label for="holiday_date" class="block text-sm font-medium text-gray-700">休診日</label>
                            <input type="date" name="holiday_date" id="holiday_date" value="{{ old('holiday_date') }}" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <x-input-error :messages="$errors->get('holiday_date')" class="mt-2" />
                            <p class="mt-2 text-sm text-gray-500">
                                注意: 木曜日は通常の定休日のため、登録する必要はありません。
                            </p>
                        </div>

                        <!-- 説明 -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">説明</label>
                            <textarea name="description" id="description" rows="3" 
                                      placeholder="休診理由を入力してください（例：学会参加、設備点検など）"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- 休診日の種類（参考情報） -->
                        <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-md">
                            <h4 class="text-sm font-medium text-yellow-800 mb-2">休診日の種類</h4>
                            <ul class="text-sm text-yellow-700 space-y-1">
                                <li>• <strong>定休日</strong>: 毎週木曜日（自動適用）</li>
                                <li>• <strong>臨時休診</strong>: 学会参加、設備点検、研修など</li>
                                <li>• <strong>長期休暇</strong>: 夏季・年末年始休暇</li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-between mt-6 space-x-4">
                            <a href="{{ route('admin.holidays.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                戻る
                            </a>
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>