@extends('_layouts.default')

@section('title_prefix')
    詳細：
@endsection
@section('title')
    8/1（木）
@endsection

@section('content')
    <!-- コンテンツヘッダ -->
    <section class="content-header">
        <h1>@yield('title_prefix')</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
            <li><a href="{{ route('mock_hours', ['index_this_month']) }}">当月一覧</a></li>
            <li>@yield('title_prefix')@yield('title')</li>
        </ol>
    </section>

    <!-- メインコンテンツ -->
    <section class="content">
        <!-- コンテンツ1 -->
        <div class="box box-success">
            <form class="form-horizontal">
                <div class="box-header with-border">
                    <h3 class="box-title">@yield('title')</h3>
                    <div class="box-tools">
                        <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <p style="font-weight: 100;">※カテゴリー表示か、タスク表示か未解決！</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">新規案件1</label>
                        <div class="col-md-9">
                            <p class="form-control-static">3.75h</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">既存案件9</label>
                        <div class="col-md-9">
                            <p class="form-control-static">2.5h</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">新規案件3</label>
                        <div class="col-md-9">
                            <p class="form-control-static">2.75h</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">その他雑務</label>
                        <div class="col-md-9">
                            <p class="form-control-static">1h</p>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <label class="col-md-3 control-label">総時間数</label>
                        <div class="col-md-9">
                            <p class="form-control-static">10.0h</p>
                        </div>
                    </div>
                    <a href="{{ route('mock_hours', ['index_this_month']) }}" class="btn btn-sm btn-default">当月一覧へ戻る</a>
                </div>
            </form>
        </div>
    </section>
@endsection
