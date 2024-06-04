<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\FocusSessionController;
use Illuminate\Support\Facades\Route;

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

Route::resource('topics', TopicController::class);
Route::resource('sections', SectionController::class);
Route::resource('chapters', ChapterController::class);

Route::prefix('topics')->group(function () {
    Route::get('/', [TopicController::class, 'index'])->name('topics.index');
    Route::get('/{topic}', [TopicController::class, 'show'])->name('topics.show');

    Route::prefix('{topic}/sections')->group(function () {
        Route::get('/{section}', [SectionController::class, 'show'])->name('sections.show');

        Route::prefix('{section}/chapters')->group(function () {
            Route::get('/{chapter}', [ChapterController::class, 'show'])->name('chapters.show');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo');
    Route::post('/todo', [TodoController::class, 'store']);
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('/todo/update-order', [TodoController::class, 'updateOrder']);
    Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::put('/todo/{todo}', [TodoController::class, 'updatePriority'])->name('todo.updatePriority');
    Route::put('/todos/{todo}/toggle-completed', [TodoController::class, 'toggleCompleted'])->name('todos.toggleCompleted');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('focus-sessions', FocusSessionController::class);
    Route::get('/start-focus', [FocusSessionController::class, 'start'])->name('start-focus');
    Route::get('/planning', function () {
        return view('planning');
    })->name('planning');
    Route::get('/habits', function () {
        return view('habits.index');
    })->name('habits.index');

});

require __DIR__.'/auth.php';
