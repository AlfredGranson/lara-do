<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Todo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'todos' => Todo::all()
        ]);
    })->name('dashboard');

    Route::post('/todo', function (Request $request) {
        Todo::create(['description' => $request->input('description')]);

        return redirect('dashboard');
    })->name('create_todo');

    Route::post('/check', function (Request $request) {
        $todo = Todo::findOrFail($request->input('id'));
        $todo->done = $request->input('checked');
        $todo->save();

        return redirect('dashboard');
    })->name('check_todo');
});

require __DIR__.'/auth.php';
