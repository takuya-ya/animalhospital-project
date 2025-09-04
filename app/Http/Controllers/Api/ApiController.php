<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\Reservation;
use Carbon\Carbon;

class ApiController extends Controller
{
  public function holidays()
  {
    return Holiday::where('holiday_date', '>=', now()->toDateString())
      ->pluck('holiday_date')
      ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'));
  }

  public function reservationsByDate($date)
  {
    return Reservation::whereDate('reservation_datetime', $date)
      ->pluck('reservation_datetime')
      ->map(fn($datetime) => Carbon::parse($datetime)->format('H:i'));
  }
}
