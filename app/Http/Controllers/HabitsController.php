<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use Illuminate\Http\Request;

class HabitsController extends Controller
{
    public function index()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Fetch the habits associated with the user
        $habits = $user->habits;

        // Pass the habits to the view
        return view('habits.index', ['habits' => $habits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'habit_type' => 'required|integer',
            'days_tracked' => 'required|integer',
        ]);

        // Create a new habit using the validated data
        $habit = new Habit;
        $habit->name = $request->name;
        $habit->description = $request->description;
        $habit->habit_type = $request->habit_type;
        $habit->days_tracked = $request->days_tracked;

        // Associate the habit with the currently authenticated user
        $habit->user_id = auth()->id();

        // Save the habit to the database
        $habit->save();

        // Redirect the user to the habits index page
        return redirect()->route('habits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the habit from the database
        $habit = Habit::findOrFail($id);

        // Pass the habit to the view
        return view('habits.show', ['habit' => $habit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    public function update(Request $request, Habit $habit)
    {
        $habit->update($request->all());
        return redirect()->route('habits.index');
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();
        return redirect()->route('habits.index');
    }
}
