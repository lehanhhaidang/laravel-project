<?php

use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\LanguageController;

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

// User Catalogue

Route::group(['prefix' => 'user/catalogue'],function(){

    Route::get('index',[UserCatalogueController::class,'index'])->name('user.catalogue.index')->middleware('authenticate');

    Route::get('create',[UserCatalogueController::class,'create'])->name('user.catalogue.create')->middleware('authenticate');

    Route::post('store',[UserCatalogueController::class,'store'])->name('user.catalogue.store')->middleware('authenticate');

    Route::get('{id}/edit',[UserCatalogueController::class,'edit'])->where(['id'=>'[0-9]+'])->name('user.catalogue.edit')->middleware('authenticate');

    Route::post('{id}/update',[UserCatalogueController::class,'update'])->where(['id'=>'[0-9]+'])->name('user.catalogue.update')->middleware('authenticate');

    Route::get('{id}/delete',[UserCatalogueController::class,'delete'])->where(['id'=>'[0-9]+'])->name('user.catalogue.delete')->middleware('authenticate');

    Route::post('{id}/destroy',[UserCatalogueController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('user.catalogue.destroy')->middleware('authenticate');
});

//language

Route::group(['prefix' => 'language'],function(){

    Route::get('index',[LanguageController::class,'index'])->name('language.index')->middleware('authenticate');

    Route::get('create',[LanguageController::class,'create'])->name('language.create')->middleware('authenticate');

    Route::post('store',[LanguageController::class,'store'])->name('language.store')->middleware('authenticate');

    Route::get('{id}/edit',[LanguageController::class,'edit'])->where(['id'=>'[0-9]+'])->name('language.edit')->middleware('authenticate');

    Route::post('{id}/update',[LanguageController::class,'update'])->where(['id'=>'[0-9]+'])->name('language.update')->middleware('authenticate');

    Route::get('{id}/delete',[LanguageController::class,'delete'])->where(['id'=>'[0-9]+'])->name('language.delete')->middleware('authenticate');

    Route::post('{id}/destroy',[LanguageController::class,'destroy'])->where(['id'=>'[0-9]+'])->name('language.destroy')->middleware('authenticate');
});



// Ajax

Route::Get('ajax/location/getLocation', [LocationController::class, 'getLocation'])->name('ajax.location.index')->middleware('authenticate');

Route::post('ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name('ajax.dashboard.changestatus')->middleware('authenticate');

Route::post('ajax/dashboard/changeStatusAll', [AjaxDashboardController::class, 'changeStatusAll'])->name('ajax.dashboard.changestatusall')->middleware('authenticate');

