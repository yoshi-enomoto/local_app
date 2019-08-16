<!-- adminlte::pageを継承 -->
@extends('adminlte::page')

<!-- ページタイトルを入力 -->
@section('title', 'adminLTE TEST')

<!-- ページの見出しを入力 -->
@section('content_header')
    <h1>ページタイトル</h1>
@stop

<!-- ページの内容を入力 -->
@section('content')
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
