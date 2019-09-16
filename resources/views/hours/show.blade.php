@extends('_layouts.default')

@section('title_prefix')
    詳細：
@endsection
@section('title', $date)

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <!-- パンくずリスト -->
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('hours.index_this_month') }}">当月一覧</a></li>
        <li class="active">@yield('title_prefix')@yield('title')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-success">
        <form class="form-horizontal">
            <div class="box-header with-border">
                <h3 class="box-title">@yield('title')</h3>
{{--                 <div class="box-tools">
                    <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                </div> --}}
            </div>
            <div class="box-body">
{{--                 <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <p style="font-weight: 100;">※カテゴリー表示か、タスク表示か未解決！</p>
                    </div>
                </div> --}}
                @foreach ($targetHours as $hour)
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ $hour->category->name }}</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $hour->hour }}h</p>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('hours.edit', $hour) }}" class="btn btn-sm btn-primary">編集</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <label class="col-md-3 control-label">総時間数</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{ $sum_hour }}h</p>
                    </div>
                </div>
                <a href="{{ route('hours.index_this_month') }}" class="btn btn-sm btn-default">当月一覧へ戻る</a>
            </div>
        </form>
    </div>
@endsection
