<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BallotController;
use App\Http\Controllers\DivisionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WhiteListController;
use App\Models\Division;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', [UserController::class, 'store']);


Route::prefix('event')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/show', [EventController::class, 'show']);
    Route::post('/store', [EventController::class, 'store']);
    Route::put('/openElection/{id}', [EventController::class, 'OpenElection']);
    Route::put('/closeElection/{id}', [EventController::class, 'CloseElection']);
    Route::delete('/delete/{id}', [EventController::class, 'deleteEvent']);
});

Route::prefix('division')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/{id}/event/show', [DivisionController::class, 'show']);
    Route::post('/{id}/event/store', [DivisionController::class, 'store']);
    Route::delete('/delete/{id}', [DivisionController::class, 'delete']);
});

Route::prefix('whitelist')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/{id}/event/show', [WhiteListController::class, 'show']);
    Route::post('/{id}/event/store', [WhitelistController::class, 'store']);
    Route::delete('/delete/{id}', [WhitelistController::class, 'delete']);
});

Route::prefix('ballot')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/{id}/event/show', [BallotController::class, 'show']);
    Route::post('/submisson/usernpm/{npm}/event/{id}', [BallotController::class, 'store']);
    Route::delete('/delete/{id}', [BallotController::class, 'delete']);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/callback', [AuthController::class, 'callback']);
});
