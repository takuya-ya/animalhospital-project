<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 開発・テスト環境のみのダミーデータ（本番では実行しない）
        if (app()->environment(['local', 'testing'])) {
            $this->call([
                StaffSeeder::class,        // ダミー管理者
                ReservationSeeder::class,  // テスト予約
                NewsSeeder::class,         // サンプル記事
                HolidaySeeder::class,      // 休診日テストデータ
            ]);
        }
    }
}
