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

Route::get('/', function () {
    return redirect('/yahoo-finance');
});

Route::get('/index',function (){
    return view('table-datatable');
});

Route::get('/yahoo-finance','yahoo_finance@index')->name('yahoo_index');
Route::post('/yahoo-finance','yahoo_finance@sort')->name('yahoo_sort');

Route::get('/alpha-vantage','alpha_vantage@index')->name('alpha_index');
Route::post('/alpha-vantage','alpha_vantage@sort')->name('alpha_sort');

Route::get('/api-page-yahoo',function (){
    return view('api-page');
})->name('yahoo-api-page');
Route::get('/api-page-alphavantage',function (){
    return view('api-page-alpha');
})->name('alpha-api-page');
