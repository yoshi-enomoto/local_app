{{-- webから参照 --}}
{{-- https://daiki-sekiguchi.com/2018/08/18/laravel-adminlte-install/ --}}
<!-- adminlte::pageを継承 -->
@extends('adminlte::page')
    {{-- 別レイアウトが見たかったが、上記の解読ができず断念 --}}

<!-- ページタイトルを入力 -->
@section('title', 'Dashboard')

<!-- ページの見出しを入力 -->
@section('content_header')
    <h1>Dashboard</h1>
@stop

<!-- ページの内容を入力 -->
@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <!-- コンテンツ1 -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ボックスタイトル</h3>
        </div>
        <div class="box-body">
            <p>ボックスボディー</p>
        </div>
    </div>
@stop

<!-- 読み込ませるCSSを入力 -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

<!-- 読み込ませるJSを入力 -->
@section('js')
    <script> console.log('Hi!'); </script>
@stop
