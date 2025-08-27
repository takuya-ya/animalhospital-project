<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::first();
        if (!$user) {
            $user = \App\Models\User::factory()->create();
            $this->command->info('ユーザーが見つからなかったため、factoryでユーザーを作成しました。');
        }

        $this->command->info("ユーザー: {$user->name} (ID: {$user->id}) の過去予約を作成中...");

        for ($i = 1; $i <= 10; $i++) {
            $reservation = \App\Models\Reservation::create([
                'user_id' => $user->id,
                'reservation_datetime' => now()->subDays(rand(1, 30))->subHours(rand(9, 17))
            ]);

            $this->command->info("予約作成: {$reservation->reservation_datetime} (ID: {$reservation->id})");
        }

        $this->command->info('10個の過去予約を作成しました。');
    }
}
