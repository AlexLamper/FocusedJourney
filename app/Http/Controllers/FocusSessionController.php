<?php

namespace App\Http\Controllers;

use App\Models\FocusSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class FocusSessionController extends Controller
{
    /**
     * Display a listing of the focus sessions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all focus sessions for the authenticated user
        $focusSessions = Auth::user()->focusSessions()->get();

        return view('focus_session.index', compact('focusSessions'));
    }

    /**
     * Store a newly created focus session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'duration' => 'required|integer|min:1', // Validate duration input
        ]);

        // Calculate the duration in hours:minutes:seconds format
        $durationInSeconds = $validatedData['duration'] * 60;
        $hours = floor($durationInSeconds / 3600);
        $minutes = floor(($durationInSeconds / 60) % 60);
        $seconds = $durationInSeconds % 60;

        // Format the duration based on whether it's more than 60 minutes
        if ($hours > 0) {
            $durationFormatted = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        } else {
            $durationFormatted = sprintf('%02d:%02d', $minutes, $seconds);
        }

        // Redirect to the index page and pass the formatted duration as a parameter
        return view('focus_session.index', ['duration' => $durationFormatted]);
    }


    /**
     * Update the specified focus session in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FocusSession  $focusSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FocusSession $focusSession)
    {
        // Implement update logic as needed
    }

    /**
     * Remove the specified focus session from storage.
     *
     * @param  \App\Models\FocusSession  $focusSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(FocusSession $focusSession)
    {
        // Implement destroy logic as needed
    }
}
