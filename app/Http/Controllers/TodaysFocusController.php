<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodaysFocus;

class TodaysFocusController extends Controller
{

    /**
     * Display the form to update the daily focus.
     */
    public function edit()
    {
        $todaysFocus = auth()->user()->todaysFocus;
        return view('todays_focus.edit', compact('todaysFocus'));
    }

    /**
     * Update the daily focus.
     */
    public function update(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        // Update or create the todays_focus for the authenticated user
        $user->todaysFocus()->updateOrCreate([], ['text' => $request->text]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Daily focus updated successfully.');
    }
}
