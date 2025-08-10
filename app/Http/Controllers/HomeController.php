<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * ホームページを表示
   */
  public function index()
  {
    // 今日以降の休診日を取得（直近5件）
    $holidays = Holiday::where('holiday_date', '>=', now()->toDateString())
      ->orderBy('holiday_date', 'asc')
      ->limit(5)
      ->get();

    return view('pages.home', compact('holidays'));
  }
}
