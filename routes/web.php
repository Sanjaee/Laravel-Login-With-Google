<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
