<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

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
    return Inertia::render('Home', ['test' => 'working']);
});

Route::post('/game', [GameController::class, 'storelogo']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/about-us', function () {
    return Inertia::render('About', ['about_us' =>"a"]);
});

Route::get('/game/edit', function () {
    return Inertia::render('UpdateGame', ['about_us' =>"a"]);
});

Route::get('/me', function () {
    return Auth::user();
});

Route::get('/token', function () {
    return csrf_token();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
