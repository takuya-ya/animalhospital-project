<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\Reservation;

class ApiController extends Controller
{
  public function getHolidays()
  {
    return Holiday::where('holiday_date', '>=', today())
      ->get(['holiday_date'])
      ->map(fn($holiday) => $holiday->holiday_date->toDateString());
  }

  public function reservationsByDate($date)
  {
    return Reservation::whereDate('reservation_datetime', $date)
      ->get(['reservation_datetime'])
      ->map(fn($reservation) => $reservation->reservation_datetime->format('H:i'));
  }
}
