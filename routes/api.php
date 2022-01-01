<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('v0/dynamic/yahoo','yahoo_finance@APIsort')->name('api-dynamic-yahoo-sort');
Route::post('v0/yahoo','yahoo_finance@apiStaticSort')->name('api-static-yahoo-sort');
Route::post('v0/dynamic/alpha','alpha_vantage@APIsort')->name('api-dynamic-alpha-sort');
Route::post('v0/alpha','alpha_vantage@apiStaticSort')->name('api-static-alpha-sort');
