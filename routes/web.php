<?php

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

// 通常用
Route::get('/', function () {
    // return view('welcome');
    return view('dashboard');
});

Route::resource('/categories', 'CategoryController');
// resourceで生成していると、nameメソッドなくても付与されている？
Route::resource('/tasks', 'TaskController', ['except' => 'show']);

Route::get('/hours/list_month', 'HourController@listMonth')->name('hours.list_month');
Route::get('/hours/list_date', 'HourController@listDate')->name('hours.list_date');
Route::get('/hours/list_month/{month}', 'HourController@showMonth')->name('hours.show_month');
Route::get('/hours/list_date/{date}', 'HourController@showDate')->name('hours.show_date');
Route::get('/hours/list_select_month/{year}/{month}', 'HourController@listSelectMonth')->name('hours.list_select_month');

Route::post('/hours/destory_date', 'HourController@destroyDate')->name('hours.destroy_date');
Route::post('/hours/destory_month', 'HourController@destroyMonth')->name('hours.destroy_month');
Route::resource('/hours', 'HourController', ['except' => ['index', 'show', 'destroy']]);
