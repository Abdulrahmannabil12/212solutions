<?php

use Illuminate\Support\Facades\Route;

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


 Route::group(['middleware' => 'auth:admin','prefix'=>'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');

    Route::post('logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin.logout');
    ########################### ADS part routes #####################

    Route::group(['prefix'=>'ads'],function (){
       Route::get('/',[\App\Http\Controllers\Admin\ADSController::class,'AllAds'])->name('ads.all_ads');
        Route::get('/create',[\App\Http\Controllers\Admin\ADSController::class,'create'])->name('admin.ads.create');
        Route::get('/show/{id}',[\App\Http\Controllers\Admin\ADSController::class,'show'])->name('admin.ad.show');

        Route::post('/store',[\App\Http\Controllers\Admin\ADSController::class,'store'])->name('admin.ads.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\ADSController::class,'edit'])->name('admin.ad.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\ADSController::class,'update'])->name('admin.ad.update');
        Route::delete('/delete/{id}',[\App\Http\Controllers\Admin\ADSController::class,'delete'])->name('admin.ad.delete');
        Route::get('/ChangeStatus/{id}',[\App\Http\Controllers\Admin\ADSController::class,'changeStatus'])->name('admin.ad.status');

});
    ########################### ADS part routes #####################

});


Route::prefix('admin')->group(function (){
    Route::get('login', [App\Http\Controllers\Admin\LoginController::class, 'getlogin']);
    Route::post('login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('save', [App\Http\Controllers\Admin\LoginController::class, 'save']);

});

 ########################### test part routes #####################



