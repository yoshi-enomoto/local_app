{{-- 「master-page-blade」を「master-blade」にするもの --}}
{{-- practiceの間にpageを挟まない様にする！ --}}

<!-- adminlte::pageを継承 -->
{{-- @extends('adminlte::page') --}}
@extends('adminlte::master')

{{-- pageから移管 --}}
@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

{{-- pageから移管 --}}
@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

<!-- ページタイトルを入力 -->
@section('title', 'adminLTE TEST')

@section('body')
    <div class="wrapper">

        <!-- Main Header -->

        <!-- トップメニュー -->
        @include('_components.header')
        {{-- サイドバー --}}
        @include('_components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                {{-- @yield('content_header') --}}

                <!-- ページの見出しを入力 -->
{{--                 @section('content_header')
                    <h1>ページタイトル</h1>
                @stop --}}

                    <h1>ページタイトル</h1>

            </section>

            <!-- Main content -->
            <section class="content">
                {{-- @yield('content') --}}

                <!-- ページの内容を入力 -->
{{--                 @section('content')
                    <!-- コンテンツ1 -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">ボックスタイトル</h3>
                        </div>
                        <div class="box-body">
                            <p>ボックスボディー</p>
                        </div>
                    </div>
                @stop --}}

                <!-- コンテンツ1 -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">ボックスタイトル</h3>
                    </div>
                    <div class="box-body">
                        <p>ボックスボディー</p>
                    </div>
                </div>

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

<!-- 読み込ませるCSSを入力 -->
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

<!-- 読み込ませるJSを入力 -->
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    {{-- @yield('js') --}}
    {{-- @section('js') --}}
        <script> console.log('Hi!'); </script>
    {{-- @stop --}}
@stop

