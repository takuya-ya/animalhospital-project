<?php

namespace App\Http\Requests;

use App\Services\ReservationService;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateReservationRequest extends FormRequest
{
  /**
   * 管理者ガードで認証済みかチェック
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
      'user_id' => 'sometimes|exists:users,id',
      'reservation_date' => 'required|date',
      'reservation_time' => 'required|date_format:H:i',
    ];
  }

  /**
   * バリデーションエラーメッセージをカスタマイズ
   */
  public function messages(): array
  {
    return [
      'user_id.exists' => '指定されたユーザーが存在しません。',
      'reservation_date.required' => '予約日は必須です。',
      'reservation_date.date' => '予約日は有効な日付でなければなりません。',
      'reservation_time.required' => '予約時間は必須です。',
      'reservation_time.date_format' => '予約時間は有効な時間形式（H:i）でなければなりません。'
    ];
  }

  /**
   * 業務ルールのバリデーション（Service層に移譲）
   */
  public function validateBusinessRules(): void
  {
    $reservationService = app(ReservationService::class);
    $reservation = $this->route('reservation');

    $data = [
      'reservation_datetime' => $this->getReservationDateTime(),
      'user_id' => $this->user_id ?? $reservation->user_id,
      'reservation_id' => $reservation->id,
    ];

    $reservationService->validateBusinessRules($data);
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
      'user_id' => $this->user_id,
      'reservation_datetime' => $this->getReservationDateTime(),
    ];
  }
}
