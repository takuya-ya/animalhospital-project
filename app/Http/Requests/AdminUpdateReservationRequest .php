<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateReservationRequest extends FormRequest
{
    // 管理者ガードで認証済みかチェック
    public function authorize(): bool
    {
        // auth('admin')ガードを使用
        return auth('admin')->check();
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',  // 一般ユーザーから選択
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
        ];
    }

    // バリデーションエラーメッセージをカスタマイズし、bladeで表示
    public function messages(): array
    {
        return [
            'user_id.required' => 'ユーザーを選択してください。',
            'user_id.exists' => '指定されたユーザーが存在しません。',
            'reservation_date.required' => '予約日は必須です。',
            'reservation_date.date' => '予約日は有効な日付でなければなりません。',
            'reservation_date.after_or_equal' => '予約日は今日以降の日付でなければなりません。',
            'reservation_time.required' => '予約時間は必須です。',
            'reservation_time.date_format' => '予約時間は有効な時間形式（H:i)でなければなりません。'
        ];
    }

    // バリデーション済の予約日時を文字列で取得
    public function getReservationDateTime(): string
    {
        return $this->reservation_date . ' ' . $this->reservation_time;
        // 例: '2025-07-31 10:00'
    }
}
