<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItems = [
            [
                'title' => '8月5日（月）臨時休診のお知らせ',
                'body' => '学会参加のため、8月5日（月）は臨時休診とさせていただきます。ご迷惑をおかけいたしますが、何卒ご理解のほどよろしくお願いいたします。',
                'category' => '臨時休診',
                'published_at' => Carbon::now()->subDays(2),
                'is_published' => true,
            ],
            [
                'title' => '夏季休暇のお知らせ',
                'body' => '8月13日（火）〜8月16日（金）まで夏季休暇をいただきます。8月17日（土）より通常通り診察いたします。',
                'category' => 'お知らせ',
                'published_at' => Carbon::now()->subDays(5),
                'is_published' => true,
            ],
            [
                'title' => '予防接種キャンペーン開始',
                'body' => '9月1日より狂犬病予防接種キャンペーンを開始いたします。期間中は通常料金より20%割引でご提供いたします。詳細はお電話でお問い合わせください。',
                'category' => 'イベント',
                'published_at' => Carbon::now()->subDays(1),
                'is_published' => true,
            ],
            [
                'title' => '新しい検査機器導入のご案内',
                'body' => '最新のデジタルレントゲン装置を導入いたしました。より精密な診断が可能になり、撮影時間も大幅に短縮されます。',
                'category' => 'お知らせ',
                'published_at' => Carbon::now()->subDays(7),
                'is_published' => true,
            ],
            [
                'title' => '健康診断のすすめ（下書き）',
                'body' => '定期的な健康診断の重要性について説明する記事です。まだ下書き段階です。',
                'category' => 'お知らせ',
                'published_at' => Carbon::now(),
                'is_published' => false,
            ],
        ];

        foreach ($newsItems as $item) {
            News::create($item);
        }

        $this->command->info('5件のお知らせを作成しました（うち1件は下書き)。');
    }
}
