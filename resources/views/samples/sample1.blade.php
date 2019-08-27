{{-- 手本--}}
@extends('samples._layouts.default')

@section('title_prefix')
    title_prefix |
@endsection
@section('title')
    main_title |
@endsection
@section('title_postfix')
    title_postfix
@endsection

@section('content-header')
    <!-- コンテンツヘッダ -->
    {{-- <h1>ページタイトル</h1> --}}
    <h1>@yield('title_postfix')</h1>
    <!-- パンくずリスト -->
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        {{-- <li>現在地</li> --}}
        <li>@yield('title_postfix')</li>
    </ol>
@endsection

@section('content-body')
    <!-- メインコンテンツ（同階層で上にフラッシュメッセージエリアがくる -->
    <!-- コンテンツ1 -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ボックスタイトル</h3>
        </div>
        <div class="box-body">
            <p>ボックスボディー</p>
        </div>
    </div>
    <!-- コンテンツ2 -->
    <div class="row">
        <!-- col -->
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">ボックスタイトル左</h3>
                </div>
                <div class="box-body">
                    <p>ボックスボディ</p>
                </div>
            </div>
        </div>

        <!-- col -->
        <div class="col-xs-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">ボックスタイトル右</h3>
                </div>
                <div class="box-body">
                    <p>ボックスボディ</p>
                </div>
            </div>
        </div>
    </div>
@endsection
