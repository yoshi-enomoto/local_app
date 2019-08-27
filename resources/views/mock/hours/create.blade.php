@extends('_layouts.default')

@section('title_prefix')
    時間入力
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <!-- パンくずリスト -->
    <ol class="breadcrumb">
        <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-primary">

        <form class="form-horizontal" action="" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}

            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        日付
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="name" value="">
                        {{-- <input class="form-control" type="text" name="name" value="" id="datepicker"> --}}
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        カテゴリー/タスク/時間0
                    </label>
                    {{-- 仕様案：0.セレクトは連動するタイプ --}}
                    {{-- 仕様案：1.カテゴリーに時間を保存 --}}
                    {{-- 仕様案：2.タスクに時間を保存。カテゴリーで計算。 --}}
                    <div class="col-md-3">
                        <select class="form-control" name="">
                            <option value="" selected>カテゴリーを選択</option>
                            <option value="">新規案件1</option>
                            <option value="">既存案件9</option>
                            <option value="">その他雑務</option>
                            <option value="">新規案件2</option>
                            <option value="">新規案件3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control" name="">
                            <option value="" selected>タスクを選択</option>
                            <option value="">客先ミーティング</option>
                            <option value="">ドラフト作成</option>
                            <option value="">社内打ち合わせ</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input class="form-control" type="text" name="hour" value="">
                    </div>
                </div>

                @for($i = 1; $i <=10; $i++)
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            カテゴリー/タスク/時間{{ $i }}
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" name="">
                                <option value="" selected>カテゴリーを選択</option>
                                <option value="">新規案件1</option>
                                <option value="">既存案件9</option>
                                <option value="">その他雑務</option>
                                <option value="">新規案件2</option>
                                <option value="">新規案件3</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="">
                                <option value="" selected>タスクを選択</option>
                                <option value="">客先ミーティング</option>
                                <option value="">ドラフト作成</option>
                                <option value="">社内打ち合わせ</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="hour" value="">
                        </div>
                    </div>
                @endfor

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-sm btn-primary">登録する</button>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('mock_hours', ['index_this_month']) }}" class="btn btn-sm btn-default">当月一覧へ戻る</a>

            </div>
        </form>
    </div>
@endsection
