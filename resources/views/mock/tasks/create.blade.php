@extends('_layouts.default')

@section('title_prefix')
    タスク登録
@endsection
@section('title', '')

@section('content')
    <!-- コンテンツヘッダ -->
    <section class="content-header">
        <h1>@yield('title_prefix')</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
            <li>@yield('title_prefix')</li>
        </ol>
    </section>

    <!-- メインコンテンツ -->
    <section class="content">
        <!-- コンテンツ1 -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">登録</h3>
            </div>
            <form class="form-horizontal" action="" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">カテゴリー名</label>
                        <div class="col-md-9">
                            <select class="form-control" name="">
                                <option value="" selected>カテゴリーを選択</option>
                                <option value="">新規案件1</option>
                                <option value="">既存案件9</option>
                                <option value="">その他雑務</option>
                                <option value="">新規案件2</option>
                                <option value="">新規案件3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            タスク名
                        </label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="name" value="">
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
                <a href="{{ route('mock_tasks', ['index']) }}" class="btn btn-sm btn-default">タスク一覧へ戻る</a>
            </div>
        </div>
    </section>
@endsection
