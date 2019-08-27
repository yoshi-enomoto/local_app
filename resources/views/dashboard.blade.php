@extends('_layouts.default')

@section('title_prefix')
    ダッシュボード
@endsection
@section('title', '')

<!-- コンテンツヘッダエリア -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    body
@endsection
