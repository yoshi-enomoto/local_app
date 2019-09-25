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

// category
Route::resource('/categories', 'CategoryController');
    // resourceで生成していると、nameメソッドなくても付与されている？
// task
Route::resource('/tasks', 'TaskController', ['except' => 'show']);
// hour
Route::get('/hours/list_months', 'HourController@listMonths')->name('hours.list_months');
Route::get('/hours/list_months/{month}', 'HourController@listDates')->name('hours.list_dates');
Route::get('/hours/list_this_month', 'HourController@listThisMonth')->name('hours.list_this_month');
Route::get('/hours/list_months/{month}/{date}', 'HourController@showDate')->name('hours.show_date');

Route::post('/hours/destory_date', 'HourController@destroyDate')->name('hours.destroy_date');
Route::post('/hours/destory_month', 'HourController@destroyMonth')->name('hours.destroy_month');
Route::resource('/hours', 'HourController', ['except' => ['index', 'show']]);
