<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Dream;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        $year = $request->query('year', Carbon::now()->year);

        $monthlyData = array_fill(0, 12, 0);

        $dreams = Dream::whereYear('created_at', $year)->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->month - 1;
            });


        foreach ($dreams as $month => $group) {
            $monthlyData[$month] = $group->sum('views');
        }

        $dreamYears = Dream::selectRaw('YEAR(created_at) as year')->distinct()->latest()->get();

        $languageData = Language::pluck('view','language')->all();
        $languages = array_keys($languageData);
        $languageViews = array_values($languageData);

        return view('backend.dashboard', compact('monthlyData', 'dreamYears','year','languages','languageViews'));
    }
}
