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
// ————————————————————

// テストメール用の参考ビュー表示用
Route::get('/tests/test_mail', function() {
    return new App\Mail\TestSendMail();
})->name('tests.test_mail');

// ジョブクラスを動かす為のルーティング
Route::get('tests/queues', 'TestController@queues');
//
Route::get('tests/queues/none', 'TestController@queuesNone');
Route::get('tests/queues/database', 'TestController@queuesDatabase');

Route::resource('tests', 'TestController');
