<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Route::get('dashboard/index',[DashboardController::class,'index'])->name('dashboard.index')->middleware('authenticate');
Route::get('admin',[AuthController::class,'index'])->name('auth.admin')->middleware('login');
Route::post('login',[AuthController::class,'login'])->name('auth.login');


Route::get('logout',[AuthController::class,'logout'])->name('admin.logout');


// User route



Route::group(['prefix' => 'user'],function(){

    Route::get('index',[UserController::class,'index'])->name('user.index')->middleware('authenticate');

    Route::get('create',[UserController::class,'create'])->name('user.create')->middleware('authenticate');

    Route::post('store',[UserController::class,'store'])->name('user.store')->middleware('authenticate');

    Route::get('{id}/edit',[UserController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.edit')->middleware('authenticate');

    Route::post('{id}/update',[UserController::class,'update'])->where(['id'=>'[0-9]+'])->name('user.update')->middleware('authenticate');

    Route::get('{id}/delete',[UserController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.delete')->middleware('authenticate');

    Route::post('{id}/destroy',[UserController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('user.destroy')->middleware('authenticate');
});



// Ajax

Route::Get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('authenticate');
