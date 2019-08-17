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
    return view('welcome');
});
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
// vendorフォルダ内のファイルで構成したページ
Route::get('/vendor_index', function () {
    return view('vendor.adminlte.index');
});
// 1つにまとめたもの
Route::get('/vendor_static_base', function () {
    return view('vendor.adminlte.vendor_static_base');
});
// 静的なベースを用いて各パーツごとに分けたもの
Route::get('/vendor_base', function () {
    return view('vendor.adminlte.vendor_base');
});
// ————————————————————

// mock用ルーティング
Route::get('mock/categories/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.categories.' . $page);
    } else {
        return view('welcome');
    }
})->name('mock_categories');

Route::get('mock/hours/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.hours.' . $page);
    } else {
        return view('welcome');
    }
})->name('mock_hours');

Route::get('mock/tasks/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.tasks.' . $page);
    } else {
        return view('welcome');
    }
})->name('mock_tasks');

Route::get('mock/{page?}', function ($page = null) {
    if(!empty($page)) {
        return view('mock.' . $page);
    } else {
        return view('welcome');
    }
})->name('mock');
