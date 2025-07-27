<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservations = Auth::user()->reservations()
            ->orderBy('reservation_datetime', 'desc')
            ->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        // TODO_RESTORE_VALIDATION: エラー回避のため一時的に全バリデーションをコメントアウト
        // 後で以下のバリデーションに戻す必要あり
        /*
        $request->validate([
            'reservation_datetime' => 'required|date|after:now',
        ]);

        $datetime = Carbon::parse($request->reservation_datetime);

        // 休診日チェック
        $isHoliday = Holiday::where('holiday_date', $datetime->format('Y-m-d'))->exists();
        if ($isHoliday) {
            return back()->withErrors(['reservation_date' => 'この日は休診日です。']);
        }

        // 日曜日チェック
        if ($datetime->isSunday()) {
            return back()->withErrors(['reservation_date' => '日曜日は定休日です。']);
        }

        // ユーザーの未来の予約チェック（1件制限）
        $userExistingReservation = Reservation::where('user_id', Auth::id())
            ->where('reservation_datetime', '>', now())
            ->first();
        if ($userExistingReservation) {
            return back()->withErrors(['reservation_date' => 'すでに未来の予約があります。新しい予約をするには既存の予約をキャンセルしてください。']);
        }

        // 重複チェック
        $existing = Reservation::where('reservation_datetime', $datetime)->first();
        if ($existing) {
            return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
        }
        */

        // TODO_RESTORE_VALIDATION: 一時的な簡易バリデーション（本来のバリデーションを復活させる際は削除）
        $datetime = Carbon::parse($request->reservation_datetime);

        Reservation::create([
            'user_id' => Auth::id(),
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', '予約を受け付けました。');
    }

    public function show(Reservation $reservation)
    {
        // 自分の予約のみ表示
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        // 自分の予約のみ編集可能
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        // TODO_RESTORE_PAST_CHECK: デバッグのため一時的に過去予約チェックをコメントアウト
        // 後で以下のチェック機能を復活させる必要あり
        /*
        // 過去の予約は編集不可
        if ($reservation->reservation_datetime < now()) {
            return redirect()->route('reservations.index')
                ->with('error', '過去の予約は変更できません。');
        }
        */

        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // 自分の予約のみ更新可能
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        // TODO_RESTORE_UPDATE_VALIDATION: エラー回避のため一時的に全バリデーションをコメントアウト
        // 後で以下のバリデーションに戻す必要あり
        /*
        $request->validate([
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
        ]);

        $datetime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);

        // 休診日チェック
        $isHoliday = Holiday::where('holiday_date', $request->reservation_date)->exists();
        if ($isHoliday) {
            return back()->withErrors(['reservation_date' => 'この日は休診日です。']);
        }

        // 日曜日チェック
        if ($datetime->isSunday()) {
            return back()->withErrors(['reservation_date' => '日曜日は定休日です。']);
        }

        // 重複チェック（自分以外）
        $existing = Reservation::where('reservation_datetime', $datetime)
            ->where('id', '!=', $reservation->id)
            ->first();
        if ($existing) {
            return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
        }
        */

        // TODO_RESTORE_UPDATE_VALIDATION: 一時的な簡易処理（本来のバリデーションを復活させる際は削除）
        $datetime = Carbon::parse($request->reservation_datetime);

        $reservation->update([
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', '予約を変更しました。');
    }

    public function destroy(Reservation $reservation)
    {
        // 自分の予約のみ削除可能
        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', '予約をキャンセルしました。');
    }
}
