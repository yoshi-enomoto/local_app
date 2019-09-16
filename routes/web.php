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

Route::get('/hours/index_this_month', 'HourController@indexThisMonth')->name('hours.index_this_month');
Route::post('/hours/destory', 'HourController@destroy')->name('hours.destroy');
Route::resource('/hours', 'HourController', ['except' => 'destroy']);
