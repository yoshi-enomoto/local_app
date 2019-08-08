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

Route::get('/', function () {
    // starter.htmlのコピー（不十分）
    // return view('mock.adminlte');
    // vendor内のpage（パッケージから）
    return view('vendor.adminlte.page');
});

Route::get('/other', function () {
    // starter.htmlのコピー（不十分）
    // return view('mock.adminlte');
    // vendor内のpage（パッケージから）
    return view('_layouts.default');
});
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
