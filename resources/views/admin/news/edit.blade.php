<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('お知らせ編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- 現在のお知らせ情報 -->
                    <div class="mb-8 p-4 bg-yellow-50 rounded-lg">
                        <h3 class="text-lg font-medium text-yellow-900 mb-2">現在のお知らせ</h3>
                        <p class="text-yellow-800">
                            タイトル: {{ $news->title }}<br>
                            カテゴリ: {{ $news->category }}<br>
                            投稿日: {{ $news->published_at->format('Y年n月j日 H:i') }}<br>
                            公開状態: {{ $news->is_published ? '公開中' : '下書き' }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('admin.news.update', $news) }}">
                        @csrf
                        @method('PUT')

                        <!-- タイトル -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
                            <input type="text" name="title" id="title" 
                                   value="{{ old('title', $news->title) }}" 
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
                                <option value="臨時休診" {{ old('category', $news->category) === '臨時休診' ? 'selected' : '' }}>臨時休診</option>
                                <option value="お知らせ" {{ old('category', $news->category) === 'お知らせ' ? 'selected' : '' }}>お知らせ</option>
                                <option value="イベント" {{ old('category', $news->category) === 'イベント' ? 'selected' : '' }}>イベント</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <!-- 本文 -->
                        <div class="mb-6">
                            <label for="body" class="block text-sm font-medium text-gray-700">本文</label>
                            <textarea name="body" id="body" rows="8" 
                                      maxlength="1000"
                                      placeholder="お知らせの内容を入力してください"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('body', $news->body) }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            <p class="mt-2 text-sm text-gray-500">
                                1000文字以内で入力してください。
                            </p>
                        </div>

                        <!-- 公開状態 -->
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_published" id="is_published" value="1" 
                                       {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <label for="is_published" class="ml-2 block text-sm text-gray-900">
                                    公開する
                                </label>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                チェックを外すと下書きとして保存されます。
                            </p>
                        </div>

                        <div class="flex items-center justify-end mt-6 space-x-4">
                            <a href="{{ route('admin.news.show', $news) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                戻る
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
