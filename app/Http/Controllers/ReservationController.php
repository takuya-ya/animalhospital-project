<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservation_datetime' => 'required|date',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'reservation_datetime' => $validated['reservation_datetime'],
        ]);

        return redirect()->route('reservations.index')
            ->with('message', '予約が完了しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'reservation_datetime' => 'required|date',
        ]);

        $reservation = Reservation::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // 予約一覧の「どこ」どこを指すのがID
        $reservation = Reservation::where('id', $id)
            // IDだけでは不安なので（ほかの人でも操作できるため）USER=IDも追加
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('message', '予約をキャンセルしました');
    }
}
