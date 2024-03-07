<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HabitsController extends Controller
{
    public function index(){
        return view('habits.index');
    }
}
