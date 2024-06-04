<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return view('chapters.show', compact('chapter'));
    }
}
