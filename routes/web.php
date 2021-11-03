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
Route::get('/','App\Http\Controllers\front\IndexController@index');
Route::get('/randevu-hasta','App\Http\Controllers\front\IndexController@randevuhasta')->name('randevutakip');
Route::get('admin/giris','App\Http\Controllers\Auths@login')->name('admin.login');
Route::post('admin/cikis','App\Http\Controllers\Auths@logout')->name('admin.logout');
Route::post('admin/giris','App\Http\Controllers\Back\Auths@loginpost')->name('admin.login.post');
Route::get('/home','App\Http\Controllers\admin\indexcontroller@index')->middleware('auth')->name('admin.index');
Route::get('/admin/calisma-saatleri','App\Http\Controllers\admin\indexcontroller@calismasaatleri')->middleware('auth')->name('admin.calismasaatleri');

Route::group(['prefix'=>'cron'],function(){
	Route::get('/reminder',function(){
		Artisan::call('Reminder:Start');
	});
});

Auth::routes();


