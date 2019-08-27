@extends('_layouts.default')

@section('title_prefix')
    カテゴリー登録
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">登録</h3>
        </div>
        <form class="form-horizontal" action="" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        カテゴリー名
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        イメージカラー
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="color" name="color" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-sm btn-primary">登録する</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="box-footer">
            <a href="{{ route('mock_categories', ['index']) }}" class="btn btn-sm btn-default">カテゴリー一覧へ戻る</a>
        </div>
    </div>
@endsection
