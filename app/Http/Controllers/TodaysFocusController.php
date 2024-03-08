<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodaysFocus; // Import the TodaysFocus model

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

    public function show()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the today's focus for the authenticated user
        $todaysFocus = $user->todaysFocus;

        // Pass the retrieved todaysFocus to the view
        return $todaysFocus;
    }


    public function create(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        // Create a new todays_focus for the authenticated user
        $todaysFocus = $user->todaysFocus()->create([
            'text' => $request->text,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Today\'s focus created successfully.');
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
