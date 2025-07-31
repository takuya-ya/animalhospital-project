<?php

namespace App\Http\Requests;

use App\Services\ReservationService;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateReservationRequest extends FormRequest
{
    /**
     * 管理者のみが更新可能
     */
    public function authorize(): bool
    {
        return auth('admin')->check();
    }

    /**
     * 基本的なバリデーションルール（構文チェックのみ）
     */
    public function rules(): array
    {
        return [
            'reservation_date' => 'required|date', // 管理者は過去日時も編集可能
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
            'reservation_time.required' => '予約時間は必須です。',
            'reservation_time.date_format' => '予約時間は有効な時間形式（H:i）でなければなりません。'  
        ];
    }

    /**
     * 業務ルールのバリデーション（Service層に移譲）
     * 管理者用は重複チェックのみ（営業日や1件制限は管理者には適用しない）
     */
    public function validateBusinessRules(): void
    {
        $reservationService = app(ReservationService::class);
        $reservation = $this->route('reservation');
        
        $data = [
            'reservation_datetime' => $this->getReservationDateTime(),
            'reservation_id' => $reservation->id,
        ];
        
        // 管理者用は重複チェックのみ実行
        $reservationService->ensureNoConflict(
            \Carbon\Carbon::parse($data['reservation_datetime']),
            $data['reservation_id']
        );
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
        return [
            'reservation_datetime' => $this->getReservationDateTime(),
        ];
    }
}
