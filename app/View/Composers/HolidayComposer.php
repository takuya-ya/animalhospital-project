<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Holiday;

class HolidayComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $holydaysNews = Holiday::orderBy('holiday_date', 'desc')->get();
        $view->with('holydaysNews', $holydaysNews);
    }
}
