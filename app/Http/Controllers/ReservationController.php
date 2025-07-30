<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->middleware('auth');
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $reservations = $user->reservations()
            ->orderBy('reservation_datetime', 'desc')
            ->paginate(10);

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(StoreReservationRequest $request)
    {
        $data = $request->getServiceData();

        // 業務ルールのバリデーション
        $this->reservationService->validateBusinessRules($data);

        // 予約作成
        $reservation = $this->reservationService->createReservation($data);

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

        // 過去の予約は編集不可
        if ($reservation->reservation_datetime < now()) {
            return redirect()->route('reservations.index')
                ->with('error', '過去の予約は変更できません。');
        }

        return view('reservations.edit', compact('reservation'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $data = $request->getServiceData();
        $data['user_id'] = $reservation->user_id;
        $data['reservation_id'] = $reservation->id;

        // 業務ルールのバリデーション
        $this->reservationService->validateBusinessRules($data);

        // 予約更新
        $this->reservationService->updateReservation($reservation, $data);
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
