<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $todayReservations = Reservation::whereDate('reservation_datetime', today())
            ->with('user')
            ->orderBy('reservation_datetime')
            ->get();

        $upcomingReservations = Reservation::whereDate('reservation_datetime', '>', today())
            ->with('user')
            ->orderBy('reservation_datetime')
            ->take(10)
            ->get();

        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $upcomingHolidays = Holiday::where('holiday_date', '>=', today())
            ->orderBy('holiday_date')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'todayReservations',
            'upcomingReservations',
            'totalUsers',
            'totalReservations',
            'upcomingHolidays'
        ));
    }
}
