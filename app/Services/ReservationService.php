<?php

namespace App\Services;

use App\Models\Holiday;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class ReservationService
{
  /**
   * 予約の業務ルールを検証する
   *
   * @param array $data
   * @throws ValidationException
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
   * 営業日かどうかを確認する（日曜日・祝日チェック）
   *
   * @param Carbon $datetime
   * @throws ValidationException
   */
  public function ensureIsBusinessDay(Carbon $datetime): void
  {
    // 日曜日チェック
    if ($datetime->isSunday()) {
      throw ValidationException::withMessages([
        'reservation_date' => '日曜日は定休日です。'
      ]);
    }

    // 休診日チェック
    $isHoliday = Holiday::where('holiday_date', $datetime->format('Y-m-d'))->exists();
    if ($isHoliday) {
      throw ValidationException::withMessages([
        'reservation_date' => 'この日は休診日です。'
      ]);
    }
  }

  /**
   * 予約時間の重複がないことを確認する
   *
   * @param Carbon $datetime
   * @param int|null $excludeReservationId 更新時は自分のIDを除外
   * @throws ValidationException
   */
  public function ensureNoConflict(Carbon $datetime, ?int $excludeReservationId = null): void
  {
    $query = Reservation::where('reservation_datetime', $datetime);

    if ($excludeReservationId) {
      $query->where('id', '!=', $excludeReservationId);
    }

    $existing = $query->first();

    if ($existing) {
      throw ValidationException::withMessages([
        'reservation_time' => 'この時間は既に予約が入っています。'
      ]);
    }
  }

  /**
   * ユーザーが未来の予約を1件以上持っていないことを確認する
   *
   * @param int $userId
   * @param int|null $excludeReservationId 更新時は自分のIDを除外
   * @throws ValidationException
   */
  public function ensureUserHasNoFutureReservation(int $userId, ?int $excludeReservationId = null): void
  {
    $query = Reservation::where('user_id', $userId)
      ->where('reservation_datetime', '>', now());

    if ($excludeReservationId) {
      $query->where('id', '!=', $excludeReservationId);
    }

    $existingReservation = $query->first();

    if ($existingReservation) {
      throw ValidationException::withMessages([
        'reservation_date' => 'すでに未来の予約があります。新しい予約をするには既存の予約をキャンセルしてください。'
      ]);
    }
  }

  /**
   * 新しい予約を作成する
   *
   * @param array $data
   * @return Reservation
   */
  public function createReservation(array $data): Reservation
  {
    // 業務ルールの検証
    $this->validateBusinessRules($data);

    // 予約を作成
    return Reservation::create([
      'user_id' => $data['user_id'],
      'reservation_datetime' => $data['reservation_datetime'],
    ]);
  }

  /**
   * 既存の予約を更新する
   *
   * @param Reservation $reservation
   * @param array $data
   * @return Reservation
   */
  public function updateReservation(Reservation $reservation, array $data): Reservation
  {
    // 更新データに予約IDを追加（重複チェック用）
    $data['reservation_id'] = $reservation->id;
    $data['user_id'] = $reservation->user_id;

    // 業務ルールの検証
    $this->validateBusinessRules($data);

    // 予約を更新
    $reservation->update([
      'reservation_datetime' => $data['reservation_datetime'],
    ]);

    return $reservation->refresh();
  }

  /**
   * 管理者用の予約作成（業務ルールが若干異なる場合）
   *
   * @param array $data
   * @return Reservation
   */
  public function createReservationAsAdmin(array $data): Reservation
  {
    // 管理者の場合も同じ業務ルールを適用
    $this->validateBusinessRules($data);

    return Reservation::create([
      'user_id' => $data['user_id'],
      'reservation_datetime' => $data['reservation_datetime'],
    ]);
  }

  /**
   * 管理者用の予約更新
   *
   * @param Reservation $reservation
   * @param array $data
   * @return Reservation
   */
  public function updateReservationAsAdmin(Reservation $reservation, array $data): Reservation
  {
    // 更新データに予約IDを追加
    $data['reservation_id'] = $reservation->id;

    // ユーザーIDが変更されている場合は新しいユーザーIDを使用
    if (!isset($data['user_id'])) {
      $data['user_id'] = $reservation->user_id;
    }

    // 業務ルールの検証（管理者の場合、一部制限を緩和する可能性もある）
    $this->validateBusinessRules($data);

    $reservation->update([
      'user_id' => $data['user_id'] ?? $reservation->user_id,
      'reservation_datetime' => $data['reservation_datetime'],
    ]);

    return $reservation->refresh();
  }
}
