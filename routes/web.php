<?php

use App\Http\Controllers\FocusSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PlanningController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/focus-sessions', [FocusSessionController::class, 'index'])->name('focus-sessions.index');
Route::post('/focus-sessions', [FocusSessionController::class, 'store'])->name('focus-sessions.store');

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/update-order', [TaskController::class, 'updateOrder']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::put('/tasks/{task}', [TaskController::class, 'updatePriority'])->name('tasks.updatePriority');
});

Route::middleware('auth')->group(function () {
    Route::get('/planning', [PlanningController::class, 'index'])->name('planning');
    Route::get('/planning/weekly', [PlanningController::class, 'weekly'])->name('planning.weekly');
    Route::get('/planning/monthly', [PlanningController::class, 'monthly'])->name('planning.monthly');
    Route::get('/planning/yearly', [PlanningController::class, 'yearly'])->name('planning.yearly');
});

Route::middleware('auth')->get('/planning/daily', [PlanningController::class, 'daily'])->name('planning.daily');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
