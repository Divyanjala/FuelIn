<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AHC;
use App\Http\Controllers\Admin\StationController as ASC;
use App\Http\Controllers\Admin\SettingController as ASEC;
use App\Http\Controllers\Admin\DistributionController as ADC;

use App\Http\Controllers\Station\HomeController as SHC;
use App\Http\Controllers\Station\CustomerController as SCC;
use App\Http\Controllers\Station\VehicleController as SVC;
use App\Http\Controllers\Station\DistributionController as SDC;

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
    Route::get('/station/new', [ASC::class, "stationNew"])->name('admin.station.new');
    Route::post('/station/store', [ASC::class, "stationStore"])->name('admin.station.store');

    Route::get('/fuel-type', [ASEC::class, "fuelType"])->name('admin.fuel-type');
    Route::get('/fuel-type/new', [ASEC::class, "fuelTypeNew"])->name('admin.fuel-type.new');
    Route::post('/fuel-type/store', [ASEC::class, "fuelTypeStore"])->name('admin.fuel-type.store');
    Route::get('/fuel-type/get', [ASEC::class, "getfuelType"])->name('admin.fuel-type.get');

    Route::get('/vehical-type', [ASEC::class, "vehicalType"])->name('admin.vehical-type');

    Route::get('/distribution', [ADC::class, "index"])->name('admin.distribution');
    Route::get('/distribution/new', [ADC::class, "newDistribution"])->name('admin.distribution.new');
    Route::post('/distribution/store', [ADC::class, "storeDistribution"])->name('admin.distribution.store');
    Route::get('/distribution/view/{id}', [ADC::class, "viewDistribution"])->name('admin.distribution.view');
    Route::get('/distribution/approve/{id}', [ADC::class, "approveDistribution"])->name('admin.distribution.approve');
});

Route::prefix('station')->group(function () {
    // Manage customers.
    Route::prefix('customer')->group(function () {
        Route::post('store', [SCC::class, "store"])->name('station.customers.store');
        Route::post('edit', [SCC::class, "edit"])->name('station.customers.edit');
        Route::get('edit/{id}', [SCC::class, "editView"]);
        Route::get('new', [SCC::class, "newView"])->name('station.customers.new');
        Route::get('', [SCC::class, "index"])->name('station.customers');
        Route::get('requests', [SCC::class, "customerRequest"])->name('station.request.all');

        // Customer vehicles
//        Route::get('{customer_id}/vehicle', [SVC::class, "index"]);
        Route::prefix('{customer_id}/vehicle')->group(function () {
            Route::post('store', [SVC::class, "store"])->name('station.customers.vehicle.store');
            Route::post('edit', [SVC::class, "edit"])->name('station.customers.vehicle.edit');
            Route::get('edit/{id}', [SVC::class, "editView"]);
            Route::get('new', [SVC::class, "newView"])->name('station.customers.vehicle.new');
            Route::get('', [SVC::class, "index"])->name('station.customers.vehicle');
        });
    });

    Route::get('/distribution', [SDC::class, "index"])->name('station.distribution');
    Route::get('/distribution/new', [SDC::class, "newDistribution"])->name('station.distribution.new');
    Route::post('/distribution/store', [SDC::class, "storeDistribution"])->name('station.distribution.store');
    Route::get('/distribution/view/{id}', [SDC::class, "viewDistribution"])->name('station.distribution.view');
    Route::get('/distribution/approve/{id}', [SDC::class, "approveDistribution"])->name('station.distribution.approve');
    Route::get('/fuel-type/get', [SDC::class, "getfuelType"])->name('station.fuel-type.get');

    Route::get('', [SHC::class, "index"])->name('station.dashboard');

    Route::get('/reshedule', [SDC::class, "reshedule"])->name('station.reshedule');
    Route::get('/notification', [SDC::class, "notification"])->name('station.notification');
    
    Route::post('/send/notification', [SCC::class, "sendEmail"])->name('station.send.notification');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [UHC::class, "index"])->name('user.dashboard');
    Route::post('customerRequest', [UHC::class, "storeRequest"])->name('user.request.store');

});
require __DIR__.'/auth.php';
