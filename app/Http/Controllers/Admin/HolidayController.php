<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $holidays = Holiday::orderBy('holiday_date', 'desc')->paginate(15);
        return view('admin.holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('admin.holidays.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'holiday_date' => 'required|date|unique:holidays,holiday_date',
            'description' => 'nullable|string|max:255',
        ]);

        Holiday::create($request->only(['holiday_date', 'description']));

        return redirect()->route('admin.holidays.index')
            ->with('success', '休診日を登録しました。');
    }

    public function show(Holiday $holiday)
    {
            // $holiday->holiday_date = Carbon::parse($holiday->holiday_date);

        return view('admin.holidays.show', compact('holiday'));
    }
    
    public function edit(Holiday $holiday)
    {
        return view('admin.holidays.edit', compact('holiday'));
    }

    public function update(Request $request, Holiday $holiday)
    {
        $request->validate([
            'holiday_date' => 'required|date|unique:holidays,holiday_date,' . $holiday->id,
            'description' => 'nullable|string|max:255',
        ]);

        $holiday->update($request->only(['holiday_date', 'description']));

        return redirect()->route('admin.holidays.index')
            ->with('success', '休診日を更新しました。');
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('admin.holidays.index')
            ->with('success', '休診日を削除しました。');
    }
}