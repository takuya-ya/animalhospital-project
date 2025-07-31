<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('新規お知らせ投稿') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.news.store') }}">
                        @csrf

                        <!-- タイトル -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                   maxlength="50"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            <p class="mt-2 text-sm text-gray-500">
                                50文字以内で入力してください。
                            </p>
                        </div>

                        <!-- カテゴリ -->
                        <div class="mb-6">
                            <label for="category" class="block text-sm font-medium text-gray-700">カテゴリ</label>
                            <select name="category" id="category" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">カテゴリを選択してください</option>
                                <option value="臨時休診" {{ old('category') === '臨時休診' ? 'selected' : '' }}>臨時休診</option>
                                <option value="お知らせ" {{ old('category') === 'お知らせ' ? 'selected' : '' }}>お知らせ</option>
                                <option value="イベント" {{ old('category') === 'イベント' ? 'selected' : '' }}>イベント</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- 本文 -->
                        <div class="mb-6">
                            <label for="body" class="block text-sm font-medium text-gray-700">本文</label>
                            <textarea name="body" id="body" rows="8" 
                                      maxlength="1000"
                                      placeholder="お知らせの内容を入力してください"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            <p class="mt-2 text-sm text-gray-500">
                                1000文字以内で入力してください。
                            </p>
                        </div>

                        <!-- 公開状態 -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" id="is_published" value="1" 
                                       {{ old('is_published', true) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label for="is_published" class="ml-2 block text-sm text-gray-900">
                                    公開する
                                </label>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                チェックを外すと下書きとして保存されます。
                            </p>
                        </div>

                        <!-- カテゴリ参考情報 -->
                        <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-md">
                            <h4 class="text-sm font-medium text-yellow-800 mb-2">カテゴリについて</h4>
                            <ul class="text-sm text-yellow-700 space-y-1">
                                <li>• <strong>臨時休診</strong>: 学会参加、設備点検、緊急休診など</li>
                                <li>• <strong>お知らせ</strong>: 一般的な連絡事項、サービス案内など</li>
                                <li>• <strong>イベント</strong>: 健康診断、予防接種キャンペーンなど</li>
                            </ul>
                        </div>

                        <div class="flex items-center justify-between mt-6 space-x-4">
                            <a href="{{ route('admin.news.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                一覧に戻る
                            </a>
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                投稿
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
