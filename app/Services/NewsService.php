<?php

namespace App\Services;

use App\Models\News;

class NewsService
{
    /**
     * お知らせを作成
     */
    public function create(array $data): News
    {
        return News::create($data);
    }

    /**
     * お知らせを更新
     */
    public function update(News $news, array $data): News
    {
        $news->update($data);
        return $news;
    }

    /**
     * お知らせを削除
     */
    public function delete(News $news): void
    {
        $news->delete();
    }

    /**
     * 最新のお知らせを取得（公開済みのみ）
     */
    public function getLatest(int $limit = 5): \Illuminate\Database\Eloquent\Collection
    {
        return News::published()
            ->latest()
            ->take($limit)
            ->get();
    }
}
