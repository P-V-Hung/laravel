<?php

use App\Http\Controllers\API\FriendController;
use App\Http\Controllers\API\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('friend')->name('api-friend-')->group(function(){
    Route::get('/{id}/{status}',[FriendController::class,'select'])->name('select');
    Route::post('/confirm/{user1}/{user2}',[FriendController::class,'confirm'])->name('confirm');
    Route::delete('/delete/{user1}/{user2}',[FriendController::class,'delete'])->name('delete');
});

Route::prefix('message')->name('api-message-')->group(function(){
    Route::get('/{user}/{withUser}/{page}',[MessageController::class,'select'])->name('select');
    Route::post('send/{user}/{toUser}/{message}',[MessageController::class,'send'])->name('send');
});


