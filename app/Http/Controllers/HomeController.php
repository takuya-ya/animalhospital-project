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
    // created_at降順で最新の投稿が上に来るように並び替え
    $holidays = Holiday::where('holiday_date', '>=', now()->toDateString())
      ->orderBy('created_at', 'desc')
      ->limit(5)
      ->get();

    return view('pages.home', compact('holidays'));
  }
}
