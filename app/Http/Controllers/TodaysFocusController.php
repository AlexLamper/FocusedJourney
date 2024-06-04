<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodaysFocus;

class TodaysFocusController extends Controller
{
    public function show()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the today's focus for the authenticated user
        $todaysFocus = $user->todaysFocus;

        // Pass the retrieved todaysFocus to the view
        return $todaysFocus;
    }

    public function update(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the today's focus for the authenticated user
        $todaysFocus = $user->todaysFocus;

        // If today's focus exists, update the text; otherwise, create a new one
        if ($todaysFocus) {
            $todaysFocus->update(['text' => $request->text]);
        } else {
            $user->todaysFocus()->create(['text' => $request->text]);
        }

        return response()->json(['message' => 'Today\'s focus updated successfully']);
    }
}
