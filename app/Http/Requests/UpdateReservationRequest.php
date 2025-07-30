<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth; 

class UpdateReservationRequest extends FormRequest
{
    // 他のユーザーの予約操作を防止する
    public function authorize():bool
    {
        // 予約の所有者のみが更新可能
        $reservation = $this->route('reservation');
        return Auth::check() && 
                $reservation &&
                $reservation->user_id === Auth::id();
    }

    public function rules():array
    {
         return [
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
         ];
    }

    // バリデーションエラーメッセージをカスタマイズし、bladeで表示
    public function messages(): array
    {
        return [
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