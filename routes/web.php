<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AHC;
use App\Http\Controllers\Admin\StationController as ASC;
use App\Http\Controllers\Admin\SettingController as ASEC;

use App\Http\Controllers\Station\HomeController as SHC;

use App\Http\Controllers\User\HomeController as UHC;
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
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [AHC::class, "index"])->name('admin.dashboard');

    Route::get('/station', [ASC::class, "index"])->name('admin.station');

    Route::get('/fuel-type', [ASEC::class, "fuelType"])->name('admin.fuel-type');
    Route::get('/fuel-type/new', [ASEC::class, "fuelTypeNew"])->name('admin.fuel-type.new');
    Route::post('/fuel-type/store', [ASEC::class, "fuelTypeStore"])->name('admin.fuel-type.store');

});

Route::prefix('/station')->group(function () {
    Route::get('/', [SHC::class, "index"])->name('station.dashboard');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [UHC::class, "index"])->name('user.dashboard');

});
require __DIR__.'/auth.php';
