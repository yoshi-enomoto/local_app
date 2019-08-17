{{-- 手本--}}
{{-- 1と異なるのは、
　・collapseがアイコンを残して畳まれる（hoverでメニュー名が表示）
　・上記用の別asideファイルを読み込ませている
　・上記用のクラスの付加＆skin用のクラス付加。
　・このファイルからskin用のcssを追記。
 --}}
@extends('samples._layouts.default2')

@section('title_prefix')
    title_prefix |
@endsection
@section('title')
    main_title |
@endsection
@section('title_postfix')
    title_postfix
@endsection

{{-- skin用のcssを追加 --}}
@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-green.min.css')}} ">
@endsection

{{-- クラス追加 --}}
@section('body_class',
     'skin-green' . ' sidebar-mini ' . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('content')
    <!-- コンテンツヘッダ -->
    <section class="content-header">
        {{-- <h1>ページタイトル</h1> --}}
        <h1>@yield('title_postfix')</h1>
        <!-- パンくずリスト -->
        <ol class="breadcrumb">
            <li><a href="">Home</a></li>
            {{-- <li>現在地</li> --}}
            <li>@yield('title_postfix')</li>
        </ol>
    </section>

    <!-- メインコンテンツ -->
    <section class="content">
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
    </section>
@endsection
