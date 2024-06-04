<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }
}
