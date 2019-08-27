@extends('_layouts.default')

@section('title_prefix')
    カテゴリー登録
@endsection
@section('title', '')

<!-- コンテンツヘッダエリア -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection

<!-- メインコンテンツエリア -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">登録</h3>
        </div>
        <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label" for="name">
                        カテゴリー名
                        <span class="label label-danger">必須</span>
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name" id="name">
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                    <label class="col-md-3 control-label" for="color">
                        イメージカラー
                        <span class="label label-danger">必須</span>
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="color" name="color" id="color">
                        {{-- <input class="form-control" type="text" name="color" id="color"> --}}
                        @if ($errors->has('color'))
                            <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>
                        @endif
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
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">カテゴリー一覧へ戻る</a>
        </div>
    </div>
@endsection
