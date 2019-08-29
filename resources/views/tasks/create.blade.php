@extends('_layouts.default')

@section('title_prefix')
    タスク登録
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
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
        <form class="form-horizontal" action="{{ route('tasks.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">カテゴリー名
                        <span class="label label-danger">必須</span>
                    </label>
                    <div class="col-md-9">
                        <select class="form-control" name="category_id" required>
                            <option value="" >カテゴリーを選択</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if(isset($category_id)) {{ $category->id == $category_id ? 'selected' : '' }} @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        タスク名
                        <span class="label label-danger">必須</span>
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="name"
                        @if(isset($request)) value="{{ $request->name }}" @endif
                        value="" required>
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
            <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-default">タスク一覧へ戻る</a>
        </div>
    </div>
@endsection
