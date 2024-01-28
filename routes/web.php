<?php

use App\Http\Controllers\Accounts\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    Route::get('logup',[AuthController::class,'logup'])->name('logup');
    Route::post('logup',[AuthController::class,'saveLogup'])->name('logup');
    Route::get('authentic',[AuthController::class,'authentic'])->name('authentic');
    Route::get('changePassword',[AuthController::class,'changePassword'])->name('changePassword');
    Route::post('changePassword',[AuthController::class,'saveChangePassword'])->name('changePassword');
    Route::post('logout',[AuthController::class,'logout'])->name('logout');
    Route::get('forget',[AuthController::class,'forgot'])->name('forget');
    Route::get('search-email',[AuthController::class,'searchEmail'])->name('search-email');
    Route::post('sendMailRePass',[AuthController::class,'sendMailRePass'])->name('sendMailRePass');

    Route::get('facebook', function () {
        return Socialite::driver('facebook')->redirect();
    })->name('facebook');

    Route::get('facebook/callback', function () {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    })->name('facebook-callback');

    Route::get('google', function () {
        return Socialite::driver('google')->redirect();
    })->name('google');

    Route::get('google/callback', function () {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    })->name('google-callback');
});

Route::get('chinh-sach-rieng-tu',function (){
     return "<h1>Chính sách quyền riêng tư</h1>";
});
Route::get('dieu-khoan-bao-mat',function (){
     return "<h1>Điều khoản bảo mật</h1>";
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
        Route::get('/profile/{id}',[AccountController::class,'authorProfile'])->name('profile');
    });

    Route::prefix('friend')->name('friend-')->group(function(){
        Route::get('search',[FriendController::class,'search'])->name('search');
        Route::post('loadData',[FriendController::class,'loadData'])->name('loadData');
        Route::post('add/{id}',[FriendController::class,'add'])->name('add');
        Route::post('select',[FriendController::class,'select'])->name('select');
        Route::get('message/{id}',[FriendController::class,'message'])->name('message');
    });

    Route::prefix('post')->name('post.')->group(function(){
       Route::get('index/{page}',[PostController::class,'index'])->name('index');
       Route::post('store',[PostController::class,'store'])->name('store');
       Route::get('show/{id}',[PostController::class,'show'])->name('show');
    });

    Route::prefix('story')->name('story.')->group(function (){
       Route::get('/{id}',[StoryController::class,'index'])->name('index');
       Route::post('/store',[StoryController::class,'store'])->name('store');
    });
});
