<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('お知らせ詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">お知らせ情報</h3>
                        
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    #{{ $news->id }}
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">公開状態</dt>
                                <dd class="mt-1">
                                    @if($news->is_published)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            公開中
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            下書き
                                        </span>
                                    @endif
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">投稿日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $news->published_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500">カテゴリ</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        @if($news->category === '臨時休診') bg-red-100 text-red-800
                                        @elseif($news->category === 'お知らせ') bg-blue-100 text-blue-800
                                        @else bg-green-100 text-green-800 @endif">
                                        {{ $news->category }}
                                    </span>
                                </dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">登録日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $news->created_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            
                            @if($news->updated_at != $news->created_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">最終更新日</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{ $news->updated_at->format('Y年n月j日 H:i') }}
                                </dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                    <!-- タイトル -->
                    <div class="mb-6 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">タイトル</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-700 font-medium">{{ $news->title }}</p>
                        </div>
                    </div>

                    <!-- 本文 -->
                    <div class="mb-6 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">本文</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $news->body }}</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.news.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                            一覧に戻る
                        </a>
                        
                        <div class="space-x-2">
                            <a href="{{ route('admin.news.edit', $news) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                編集
                            </a>
                            <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="inline" onsubmit="return confirm('本当に削除しますか？')">
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
