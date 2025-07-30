<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreReservationRequest;
use App\Http\Requests\AdminUpdateReservationRequest;
use App\Models\Reservation;
use App\Models\User;
use App\Services\ReservationService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->middleware('auth:admin');
        $this->reservationService = $reservationService;
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

    /**
     * 予約を作成（管理者用）
     */
    public function store(AdminStoreReservationRequest $request)
    {
        // 業務ルールのバリデーション
        $request->validateBusinessRules();

        // 予約作成
        $reservation = $this->reservationService->createReservation($request->getServiceData());

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

    /**
     * 予約を更新（管理者用）
     */
    public function update(AdminUpdateReservationRequest $request, Reservation $reservation)
    {
        // 業務ルールのバリデーション
        $request->validateBusinessRules();

        // 予約更新
        $this->reservationService->updateReservation($reservation, $request->getServiceData());

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