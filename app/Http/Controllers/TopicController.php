<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        return view('topics.show', compact('topic'));
    }
}
