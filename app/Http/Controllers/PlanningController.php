<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user, if any
        $user = auth()->user();

        // If user is not logged in, return a message prompting them to log in
        if (!$user) {
            return view('auth.login');
        }

        // Logic for fetching overall planning data (if needed)
        return view('planning.index');
    }

    public function daily()
    {
//        $dailyPlanning = Planning::where('type', 'daily')->get();
        return view('planning.daily');
    }

    public function weekly()
    {
//        $weeklyPlanning = Planning::where('type', 'weekly')->get();
//        return view('planning.weekly')->with('weeklyPlanning', $weeklyPlanning);
        return view('planning.weekly');
    }

    public function monthly()
    {
//        $monthlyPlanning = Planning::where('type', 'monthly')->get();
//        return view('planning.monthly')->with('monthlyPlanning', $monthlyPlanning);
        return view('planning.monthly');
    }

    public function yearly()
    {
//        $yearlyPlanning = Planning::where('type', 'yearly')->get();
//        return view('planning.yearly')->with('yearlyPlanning', $yearlyPlanning);
        return view('planning.yearly');
    }
}
