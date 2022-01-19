<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified']);

Route::middleware('auth')->post('/task/complete/{task}', [TaskController::class, 'complete'])->name('task.complete');
Route::middleware('auth')->post('/task/incomplete/{task}', [TaskController::class, 'incomplete'])->name('task.incomplete');
Route::middleware('auth')->resource('/task', TaskController::class);
