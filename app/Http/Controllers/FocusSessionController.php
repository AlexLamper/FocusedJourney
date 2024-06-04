<?php

namespace App\Http\Controllers;

use App\Models\FocusSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'duration' => 'required|integer|min:1', // Validate duration input
        ]);

        // Create a new focus session instance
        $focusSession = new FocusSession();

        // Set the attributes
        $focusSession->user_id = Auth::id();
        $focusSession->start_time = now();
        $focusSession->duration = $validatedData['duration'];

        // Save the focus session to the database
        $focusSession->save();

        // Fetch all focus sessions for the authenticated user
        $focusSessions = Auth::user()->focusSessions()->get();

        // Redirect to the index page and pass the focus sessions as a parameter
        return view('focus_session.index', compact('focusSessions'));
    }

    public function start()
    {
        $focusSessions = FocusSession::all();

        return view('focus_session.start', ['focusSessions' => $focusSessions]);
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
