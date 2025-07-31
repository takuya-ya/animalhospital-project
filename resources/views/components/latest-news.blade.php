{{-- お知らせ表示コンポーネント --}}
@if(isset($latestNews) && $latestNews->count() > 0)
    <ul class="space-y-3 text-sm text-left">
        @foreach($latestNews as $newsItem)
        <li class="text-left text-sm leading-relaxed">
            <span style="color:#FD8C07">{{ $newsItem->published_at->format('Y.m.d') }}</span>
            <span class="ml-2 px-2 py-1 text-xs rounded-full 
                @if($newsItem->category === '臨時休診') bg-red-100 text-red-700
                @elseif($newsItem->category === 'お知らせ') bg-blue-100 text-blue-700
                @else bg-green-100 text-green-700 @endif">
                {{ $newsItem->category }}
            </span>
            <span class="block mt-1">{{ $newsItem->title }}</span>
        </li>

        {{-- 区切り線（最後以外） --}}
        @unless($loop->last)
        <div class="max-w-full mb-2"
            style="height: 3px;
        background-image: radial-gradient(circle, #715433 1px, transparent 1px);
        background-size: 3px 3px;
        background-repeat: repeat-x;
        border-radius: 3px;">
        </div>
        @endunless
        @endforeach
    </ul>
@else
    <div class="text-center py-8">
        <p class="text-gray-500 text-sm">現在お知らせはありません</p>
    </div>
@endif
