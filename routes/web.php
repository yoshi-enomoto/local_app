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

// ————————————————————

// サンプル用（samplesフォルダ内）
Route::get('/sample'.'{number?}', function($number = null) {
    if(!empty($number)) {
        return view('samples.sample' . $number);
    } else {
        return view('welcome');
    }
});
// ————————————————————

// vendorフォルダ内ルーティング
// vendorフォルダ内のファイルで構成したページ（@extends('adminlte::page')）
Route::get('/vendor_index', function () {
    return view('vendor.adminlte.vendor_index');
});
// vendor_static_base.blade をベースに、分割し直す。分割ファイルは、viewsフォルダ直下に保存--}}
Route::get('/vendor_base', function () {
    return view('vendor.adminlte.vendor_base');
});
// 1つにまとめたもの
Route::get('/vendor_static_base', function () {
    return view('vendor.adminlte.vendor_static_base');
});
// navのcollapseがdemo同様に閉じるバージョン
Route::get('/vendor_static_base2', function () {
    return view('vendor.adminlte.vendor_static_base2');
});
// 別バージョン
Route::get('/vendor_static_base3', function () {
    return view('vendor.adminlte.vendor_static_base3');
});
// ————————————————————

// mock用ルーティング
Route::get('mock/categories/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.categories.' . $page);
    } else {
        return view('mock.home');
    }
})->name('mock_categories');

Route::get('mock/hours/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.hours.' . $page);
    } else {
        return view('mock.home');
    }
})->name('mock_hours');

Route::get('mock/tasks/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.tasks.' . $page);
    } else {
        return view('mock.home');
    }
})->name('mock_tasks');

Route::get('mock/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.' . $page);
    } else {
        return view('mock.home');
    }
})->name('mock');
