<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BetController;

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




Route::get('login',[UserController::class,'login']);
Route::post('loginProcess',[UserController::class,'loginProcess']);



Route::group(['middleware'=>'user_auth'],function(){
    Route::get('/',[UserController::class,'index']);
    Route::get('makeBet/{id}',[BetController::class,'index']);
    Route::post('makeBetProcess',[BetController::class,'makeBetProcess']);
    Route::get('stop/{id}',[BetController::class,'stop']);
    Route::get('result',[BetController::class,'result']);
    Route::get('completed',[BetController::class,'completed']);
    Route::get('logout', function () {
        session()->forget('USER_LOGIN');
        session()->forget('USER_ID');
        session()->flash('error','Logout Successfully');
        return redirect('login');
    });

});
