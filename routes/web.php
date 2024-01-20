<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\Accounts\AccountController;

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
Route::prefix('auth')->name('auth.')->group(function (){
    Route::get('/',[AuthController::class,'login'])->name('login');
    Route::post('/',[AuthController::class,'saveLogin'])->name('login');
    Route::get('/logup',[AuthController::class,'logup'])->name('logup');
    Route::post('/logup',[AuthController::class,'saveLogup'])->name('logup');
    Route::get('/authentic',[AuthController::class,'authentic'])->name('authentic');
    Route::get('/changePassword',[AuthController::class,'changePassword'])->name('changePassword');
    Route::post('/changePassword',[AuthController::class,'saveChangePassword'])->name('changePassword');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/forget',[AuthController::class,'forgot'])->name('forget');
    Route::get('/search-email',[AuthController::class,'searchEmail'])->name('search-email');
    Route::post('/sendMailRePass',[AuthController::class,'sendMailRePass'])->name('sendMailRePass');
});


Route::middleware('auth')->group(function (){

//    Home
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/group', [HomeController::class,'group'])->name('group');
    Route::get('/settings', [HomeController::class,'settings'])->name('settings');

    Route::view('/sorry',"errors.#");


    Route::prefix('/account')->name('account-')->group(function(){
        Route::get('/',[AccountController::class,'information'])->name('information');
        Route::post('/',[AccountController::class,'saveInformation'])->name('information');
        Route::get('/profile',[AccountController::class,'authorProfile'])->name('profile');
    });

    Route::prefix('/friend')->name('friend-')->group(function(){
        Route::get('/search',[FriendController::class,'search'])->name('search');
        Route::post('/loadData',[FriendController::class,'loadData'])->name('loadData');
        Route::post('/add',[FriendController::class,'add'])->name('add');
    });

});
