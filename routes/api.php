<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RoundController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
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
Broadcast::routes(['middleware' => ['auth:sanctum']]);
Route::post('access-tokens', [AuthController::class, 'create'])->name('access-tokens.create');
Route::delete('access-tokens', [AuthController::class, 'destroy'])->name('access-tokens.destroy');
Route::get('public/games/{game}', [GameController::class, 'showPublic'])->name('public.games.show');
Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user', UserController::class)->name('user');

    Route::resource('games', GameController::class)->only('create', 'update', 'show', 'index');
    Route::get('user/games', [GameController::class, 'indexUser'])->name('games.user.index');
    Route::post('games/{game}/start', [GameController::class, 'start'])->name('games.start');
    Route::post('games/{game}/finish', [GameController::class, 'finish'])->name('games.finish');
    Route::apiResource('rounds', RoundController::class)->only(['update', 'show']);
    Route::get('games/{game}/rounds/create', [RoundController::class, 'create'])->name('rounds.create');
    Route::post('rounds/{round}/publish', [RoundController::class, 'publish'])->name('rounds.publish');
    Route::get('games/{game}/rounds/next', [RoundController::class, 'nextRound'])->name('games.rounds.next');
});

