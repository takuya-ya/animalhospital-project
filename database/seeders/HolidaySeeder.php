<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Holiday;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 0=日曜, 4=木曜 を定休日として除外
        $regularClosedDow = [0, 4];
        $descs = ['学会参加', '設備点検', 'スタッフ研修', '院内メンテナンス', '台風の影響'];

        // クロージャ：外部変数$regularClosedDowをuseでキャプチャして内部で使用
        // $date: 具体的日付を持つCarbonインスタンス（例：2025-09-18のオブジェクト）
        $add = function (Carbon $date, string $desc) use ($regularClosedDow): void {
            // $date->dayOfWeek: そのオブジェクトの曜日を数値で取得（0=日〜6=土）
            if (in_array((int)$date->dayOfWeek, $regularClosedDow, true)) {
                return; // 定休日は登録しない
            }
            // created_atをランダムな過去日時に設定（自然な並び順のため）
            $randomCreatedAt = Carbon::now()->subDays(random_int(1, 120))->subHours(random_int(9, 17));

            Holiday::updateOrCreate(
                ['holiday_date' => $date->toDateString()],
                [
                    'description' => $desc,
                    'created_at' => $randomCreatedAt,
                    'updated_at' => $randomCreatedAt
                ]
            );
        };

        // 全ての休診日を一度に生成してシャッフル（自然な並び順のため）
        $allHolidays = [];

        // 今後8件
        $added = 0;
        $seen = [];
        while ($added < 8) {
            $d = Carbon::now()->addDays(random_int(1, 90))->startOfDay();
            $key = $d->toDateString();
            if (isset($seen[$key]) || in_array((int)$d->dayOfWeek, $regularClosedDow, true)) {
                continue;
            }
            $seen[$key] = true;
            $allHolidays[] = [$d, $descs[array_rand($descs)]];
            $added++;
        }

        // 過去5件
        $added = 0;
        $seen = [];
        while ($added < 5) {
            $d = Carbon::now()->subDays(random_int(1, 45))->startOfDay();
            $key = $d->toDateString();
            if (isset($seen[$key]) || in_array((int)$d->dayOfWeek, $regularClosedDow, true)) {
                continue;
            }
            $seen[$key] = true;
            $allHolidays[] = [$d, $descs[array_rand($descs)]];
            $added++;
        }

        // 3日連続の連休
        $start = Carbon::now()->addMonthNoOverflow()->startOfMonth()->next(Carbon::MONDAY);
        foreach (CarbonPeriod::create($start, 2) as $date) {
            $allHolidays[] = [$date, '院内改装のため休診'];
        }

        // シャッフルしてからDB投入（自然な並び順にするため）
        shuffle($allHolidays);
        foreach ($allHolidays as [$date, $desc]) {
            $add($date, $desc);
        }

        // command?: null安全演算子でテスト実行時のエラー回避
        $this->command?->info('休診日のダミーデータを作成しました（臨時休診のみ、木・日を除外）。');
    }
}
