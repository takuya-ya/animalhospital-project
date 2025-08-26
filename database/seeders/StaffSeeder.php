<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 既にスタッフが存在する場合はスキップ
        if (\App\Models\Staff::exists()) {
            $this->command->info('スタッフは既に存在します。スキップします。');
            return;
        }

        $this->command->info('スタッフのダミーデータを作成中...');

        $staff = \App\Models\Staff::create([
            'name' => 'ダミー管理者',
            'email' => 'auth@auth.com',
            'password' => Hash::make('12345678'),
        ]);

        $this->command->info("スタッフ作成: {$staff->name} (ID: {$staff->id})");
        $this->command->info('1人のスタッフダミーデータを作成しました。');
    }
}
