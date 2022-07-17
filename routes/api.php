<?php

use App\Http\Controllers\GameController;
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

Route::middleware(['auth:sanctum'])->group(function (){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('games', GameController::class)->only('create', 'update');
    Route::post('games/{game}/start}', [GameController::class, 'start'])->name('games.start');
    Route::post('games/{game}/finish}', [GameController::class, 'finish'])->name('games.finish');
});

