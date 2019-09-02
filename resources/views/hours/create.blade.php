@extends('_layouts.default')

@section('title_prefix')
    時間入力
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
        <form class="form-horizontal" action="{{ route('hours.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="form-group">
                    <label class="col-md-3 control-label">
                        日付
                    </label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" name="date" value="{{ old('date') }}">
                        {{-- <input class="form-control" type="text" name="date" value="" id="datepicker"> --}}
                    </div>
                </div>
            </div>
            <div class="box-body">
                @for($i=0; $i<10; $i++)
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            カテゴリー/タスク/時間{{ $i+1 }}
                        </label>
                        <div class="col-md-3">
                            <select class="form-control" name="category_id[]">
                                <option value="" selected>カテゴリーを選択</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="task_id[]">
                                <option value="" selected>タスクを選択</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="hour[]" value="">
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
