<?php

use App\Http\Controllers\API\CommonController;
use App\Http\Controllers\API\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::get('fuelType', [CommonController::class, 'types']);
Route::get('vehicalType', [CommonController::class, 'vehicalTypes']);

Route::get('customerQuota/{id}', [CustomerController::class, 'customerQuota']);
Route::get('customer/{id}', [CustomerController::class, 'customer']);
Route::get('station/{id}', [CustomerController::class, 'station']);
Route::post('customerQuotaUpdate', [CustomerController::class, 'customerQuotaUpdate']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group( function () {
    // Route::resource('products', ProductController::class);
});
