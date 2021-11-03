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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/calisma-saatleri/{date?}','App\Http\Controllers\api\IndexController@getWorkingHours')->name('dashboard');
Route::post('/randevukaydet','App\Http\Controllers\api\IndexController@randevuKaydet')->name('randevuKaydet');
Route::get('/list','App\Http\Controllers\api\admin\indexController@getList');
Route::get('/today-list','App\Http\Controllers\api\admin\indexController@gettodaylist');
Route::get('/last-list','App\Http\Controllers\api\admin\indexController@getLastList');
Route::get('/bekleyen-list','App\Http\Controllers\api\admin\indexController@onayBekleyen');
Route::post('/randevu-durumu','App\Http\Controllers\api\admin\indexController@status');
Route::get('/iptal-list','App\Http\Controllers\api\admin\indexController@getiptallist');
Route::post('/calisma-saati-ekle','App\Http\Controllers\admin\indexcontroller@store');
Route::get('/calisma-list','App\Http\Controllers\admin\indexcontroller@getcalismalist');
Route::get('/randevu-detay/{id}','App\Http\Controllers\api\admin\indexcontroller@randevudetay');
Route::post('/calisma-not-ekle','App\Http\Controllers\admin\indexcontroller@detaykaydet');
Route::post('/randevu-hasta-ekrani','App\Http\Controllers\api\admin\indexcontroller@randevuhastaekrani');