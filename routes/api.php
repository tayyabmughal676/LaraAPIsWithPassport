<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('Api')->group(function () {

    Route::prefix('auth')->group(function () {

//        http://192.168.10.10:8000/api/auth/login?
//        http://192.168.10.10:8000/api/auth/signup?

        Route::post('login', [AuthController::class, 'login']);
        Route::post('signup', [AuthController::class, 'signup']);

    });

    Route::group([
        'middleware' => 'auth:api'
    ], function () {

//        http://192.168.10.10:8000/api/helloworld?
//        http://192.168.10.10:8000/api/logout?

        Route::get('helloworld', [AuthController::class, 'index']);
        Route::post('logout', [AuthController::class, 'logout']);

    });

});
