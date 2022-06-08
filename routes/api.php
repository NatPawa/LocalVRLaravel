<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\UserController;
use App\Models\Device;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
    DEVICES
*/

Route::post('/devices', [DeviceController::class, 'store']);
Route::get('/devices', [DeviceController::class, 'index']);
Route::get('/devices/{deviceName}', [DeviceController::class, 'show']);
Route::get('/devices/{idDevice}/InLobby', [DeviceController::class, 'inLobby']);
Route::get('/devices/{deviceId}/gameSearch', [DeviceController::class, 'searchGamesDevices']);

Route::delete('/device/{id}/game/{gameId}', [DeviceController::class, 'detachGameToDevice']);
Route::get('/device/{id}/game/{gameId}', [DeviceController::class, 'attachGameToDevice']);

/*
    MATCHES
*/

Route::get('/matches/{partidaId}/user/{userId}', [PartidaController::class, 'attachUserToMatch']);
Route::delete('/matches/{partidaId}/user/{userId}', [PartidaController::class, 'detachUserToMatch']);

Route::post('/matches/device/{deviceId}/games/{gameId}', [PartidaController::class, 'store']);
Route::get('/matches', [PartidaController::class, 'index']);

/*
    GAMES
*/

Route::get('/games', [GameController::class, 'index']);
Route::post('/games', [GameController::class, 'store']);

/*
    USER
*/

Route::get('/users/{id}', [UserController::class, 'showById']);
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);