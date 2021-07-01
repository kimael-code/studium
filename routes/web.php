<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Home
Route::get('/', function ()
{
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => false,
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

// Activities Logs
Route::get('historial-de-actividades', [ActivityLogController::class, 'index'])
    ->name('activities-logs')
    ->middleware(['auth', 'verified']);

// Auth
require __DIR__.'/auth.php';
