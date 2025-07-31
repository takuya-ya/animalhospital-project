<?php

namespace App\Services;

use App\Models\Holiday;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class ReservationService
{
    // 業務ルール定数
    const CLOSED_DAY_OF_WEEK = Carbon::SUNDAY;
    const CLOSED_DAY_MESSAGE = '日曜日は定休日です。';
    const HOLIDAY_MESSAGE = 'この日は休診日です。';
    const CONFLICT_MESSAGE = 'この時間は既に予約が入っています。';
    const USER_LIMIT_MESSAGE = 'この顧客は既に予約済みです。既存の予約をキャンセルしてから新しい予約を作成してください。';
    /**
     * 業務ルールのバリデーション（一般ユーザー用）
     */
    public function validateBusinessRules(array $data): void
    {
        $datetime = Carbon::parse($data['reservation_datetime']);
        
        $this->ensureIsBusinessDay($datetime);
        $this->ensureNoConflict($datetime, $data['reservation_id'] ?? null);
        
        if (isset($data['user_id'])) {
            $this->ensureUserHasNoFutureReservation($data['user_id'], $data['reservation_id'] ?? null);
        }
    }

    /**
     * 営業日であることを確認
     */
    public function ensureIsBusinessDay(Carbon $datetime): void
    {
        // 日曜日チェック
        if ($datetime->dayOfWeek === self::CLOSED_DAY_OF_WEEK) {
            throw ValidationException::withMessages([
                'reservation_date' => self::CLOSED_DAY_MESSAGE
            ]);
        }

        // 休診日チェック
        $isHoliday = Holiday::where('holiday_date', $datetime->toDateString())->exists();
        if ($isHoliday) {
            throw ValidationException::withMessages([
                'reservation_date' => self::HOLIDAY_MESSAGE
            ]);
        }
    }

    /**
     * 予約の重複がないことを確認
     */
    public function ensureNoConflict(Carbon $datetime, ?int $excludeReservationId = null): void
    {
        $query = Reservation::where('reservation_datetime', $datetime);
        
        if ($excludeReservationId) {
            $query->where('id', '!=', $excludeReservationId);
        }
        
        if ($query->exists()) {
            throw ValidationException::withMessages([
                'reservation_time' => self::CONFLICT_MESSAGE
            ]);
        }
    }

    /**
     * ユーザーが未来の予約を持っていないことを確認
     */
    public function ensureUserHasNoFutureReservation(int $userId, ?int $excludeReservationId = null): void
    {
        $query = Reservation::where('user_id', $userId)
            ->where('reservation_datetime', '>', now());
            
        if ($excludeReservationId) {
            $query->where('id', '!=', $excludeReservationId);
        }
        
        if ($query->exists()) {
            throw ValidationException::withMessages([
                'user_id' => self::USER_LIMIT_MESSAGE
            ]);
        }
    }

    /**
     * 予約を作成（業務ルールバリデーション込み）
     */
    public function createReservation(array $data): Reservation
    {
        // 業務ルールのバリデーション
        $this->validateBusinessRules($data);
        
        // 予約作成
        return Reservation::create([
            'user_id' => $data['user_id'],
            'reservation_datetime' => Carbon::parse($data['reservation_datetime']),
        ]);
    }

    /**
     * 予約を更新（業務ルールバリデーション込み）
     */
    public function updateReservation(Reservation $reservation, array $data): Reservation
    {
        // 業務ルールのバリデーション
        $this->validateBusinessRules($data);
        
        // 予約更新
        $reservation->update([
            'reservation_datetime' => Carbon::parse($data['reservation_datetime']),
        ]);

        return $reservation->refresh();
    }
}
