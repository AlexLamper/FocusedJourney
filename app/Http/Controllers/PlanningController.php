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
        $user = auth()->user();
        $tasks = $user->tasks()->orderBy('order')->get();

        // Generate timeslots array
        $timeslots = [];
        for ($hour = 0; $hour < 24; $hour++) {
            $timeslots[] = sprintf('%02d:00', $hour);
        }

        // Load the daily view and pass the $tasks and $timeslots variables
        return view('planning.daily', ['tasks' => $tasks, 'timeslots' => $timeslots]);
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
