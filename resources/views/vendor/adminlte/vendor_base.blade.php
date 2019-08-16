{{-- vendor_static_base.blade をベースに分割して、このファイルから呼び出す--}}
@extends('_layouts.default')

@section('content')
    <!-- コンテンツヘッダ -->
    <section class="content-header">
        <h1>ページタイトル</h1>
        <!-- パンくずリスト -->
        <ol class="breadcrumb">
            <li><a href="">Home</a></li>
            <li>現在地</li>
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
