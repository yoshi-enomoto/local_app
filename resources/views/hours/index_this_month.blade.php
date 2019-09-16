@extends('_layouts.default')

@section('title_prefix')
    当月一覧（未）
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <!-- パンくずリスト -->
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection
{{-- {{ dd($hours) }} --}}
<!-- メインコンテンツ -->
@section('content-body')
    <form class="form-horizontal">
        <!-- コンテンツ1-a -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">当月トータル時間数</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">総時間数</label>
                            <div class="col-md-9">
                                <p class="form-control-static">{{ $thisMonthCategoryHourSum }}h</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($thisMonthCategoryHours as $hour)
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $hour->category->name }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">総時間数</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">{{ $hour->sum_hour }}h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- コンテンツ1-b -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">カテゴリー/総時間数当月一覧</h3>
            </div>
            <div class="box-body">
                @foreach ($thisMonthCategoryHours as $hour)
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ $hour->category->name }}</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ $hour->sum_hour }}h</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <label class="col-md-3 control-label">トータル時間数</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{ $thisMonthCategoryHourSum }}h</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- コンテンツ2 -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">当月一覧</h3>
                <div class="box-tools">
                    <a href="{{ route('hours.create') }}" class="btn btn-sm btn-primary">時間入力</a>
                </div>
            </div>
            <div class="box-body">
                {{-- show_month.blade.phpでも同じものを使用 --}}
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 10%;">日付</th>
                            <th style="width: 60%;">総時間数</th>
                            <th style="width: 30%;"></th>
                        </tr>
                            @foreach($thisMonthHours as $key => $hour)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $hour->date->format('m/d') }}（{{ config('const.week')[$hour->date->format('w')] }}）</td>
                                    <td style="vertical-align: middle;">{{ $hour->sum_hour }}h</td>
                                    {{-- <td style="vertical-align: middle;">{{ number_format($hour->hour, 2) }}h</td> --}}
                                    <td>
                                        <a href="{{ route('hours.show', $hour->date->format('Y-m-d')) }}" class="btn btn-sm btn-success">詳細</a>
                                        {{-- <a href="{{ route('hours.edit', $hour) }}" class="btn btn-sm btn-primary">編集</a> --}}
                                        <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $key }}">削除</a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    {{-- 削除モーダル --}}
                            @foreach($thisMonthHours as $key => $hour)
    <div class="modal fade" id="deleteModal_{{ $key }}" data-keyboard="true" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('hours.destroy') }}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                {{-- {{ method_field('DELETE') }} --}}
                <input type="hidden" name="date_target" value="{{ $hour->date }}" placeholder="">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4 class="modal-title">削除</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ $hour->date->format('m/d') }}（{{ config('const.week')[$hour->date->format('w')] }}）の総時間数を削除します。本当によろしいですか？</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-dissmiss="modal">削除する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection
