<?php

namespace App\Http\Requests;

use App\Services\ReservationService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateReservationRequest extends FormRequest
{
    /**
     * 予約の所有者のみが更新可能
     */
    public function authorize(): bool
    {
        $reservation = $this->route('reservation');
        return Auth::check() &&
            $reservation &&
            $reservation->user_id === Auth::id();
    }

    /**
     * 基本的なバリデーションルール（構文チェックのみ）
     */
    public function rules(): array
    {
        return [
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
        ];
    }

    /**
     * バリデーションエラーメッセージをカスタマイズ
     */
    public function messages(): array
    {
        return [
            'reservation_date.required' => '予約日は必須です。',
            'reservation_date.date' => '予約日は有効な日付でなければなりません。',
            'reservation_date.after_or_equal' => '予約日は今日以降の日付でなければなりません。',
            'reservation_time.required' => '予約時間は必須です。',
            'reservation_time.date_format' => '予約時間は有効な時間形式（H:i）でなければなりません。'
        ];
    }

    /**
     * バリデーション済の予約日時を文字列で取得
     */
    public function getReservationDateTime(): string
    {
        return $this->reservation_date . ' ' . $this->reservation_time;
    }

    /**
     * Serviceで使用するためのデータを取得
     */
    public function getServiceData(): array
    {
        $reservation = $this->route('reservation');
        return [
            'user_id' => $reservation->user_id,
            'reservation_id' => $reservation->id,
            'reservation_datetime' => $this->getReservationDateTime(),
        ];
    }
}
