<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Holiday;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        $query = Reservation::with('user');

        if ($request->filled('date')) {
            $query->whereDate('reservation_datetime', $request->date);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $reservations = $query->orderBy('reservation_datetime', 'desc')->paginate(15);
        $users = User::orderBy('name')->get();

        return view('admin.reservations.index', compact('reservations', 'users'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('admin.reservations.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
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

        // 未来の予約のみ制限チェック
        $userExistingReservation = Reservation::where('user_id', $request->user_id)
            ->where('reservation_datetime', '>', now())
            ->first();
        if ($userExistingReservation) {
            return back()
                ->withErrors(['user_id' => 'この顧客は既に未来の予約があります。既存の予約をキャンセルしてから新しい予約を作成してください。'])
                ->withInput();
        }

        $existing = Reservation::where('reservation_datetime', $datetime)->first();
        if ($existing) {
            return back()->withErrors(['reservation_datetime' => 'この日時は既に予約が入っています。']);
        }

        Reservation::create([
            'user_id' => $request->user_id,
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を作成しました。');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load('user');
        return view('admin.reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $users = User::orderBy('name')->get();
        return view('admin.reservations.edit', compact('reservation', 'users'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
        ]);

        $datetime = Carbon::parse($request->reservation_date . ' ' . $request->reservation_time);

        $existing = Reservation::where('reservation_datetime', $datetime)
            ->where('id', '!=', $reservation->id)
            ->first();
        if ($existing) {
            return back()->withErrors(['reservation_time' => 'この時間は既に予約が入っています。']);
        }

        $reservation->update([
            'reservation_datetime' => $datetime,
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を更新しました。');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')
            ->with('success', '予約を削除しました。');
    }
}