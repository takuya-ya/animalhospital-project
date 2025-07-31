<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);                   // タイトル（50文字以内）
            $table->text('body');                          // 本文（1000文字以内）
            $table->enum('category', ['臨時休診', 'お知らせ', 'イベント']); // カテゴリ
            $table->timestamp('published_at')->default(now()); // 投稿日（now()自動指定）
            $table->boolean('is_published')->default(true);    // 公開状態（初期はtrue）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
