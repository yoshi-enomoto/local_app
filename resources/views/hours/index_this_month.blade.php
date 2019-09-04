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
        <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
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
                                <p class="form-control-static">190h</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $array = ['新規案件1', '既存案件9', 'その他雑務', '新規案件2', '新規案件3']
            @endphp
            @foreach($array as $var)
                <div class="col-md-6">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ $var }}</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">総時間数</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">38h</p>
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
                @foreach ($array as $var)
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{ $var }}</label>
                        <div class="col-md-9">
                            <p class="form-control-static">{{ rand(30, 40) }}h</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <label class="col-md-3 control-label">トータル時間数</label>
                    <div class="col-md-9">
                        <p class="form-control-static">190h</p>
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
                            <th style="width: 60%;">時間数</th>
                            <th style="width: 30%;"></th>
                        </tr>
                        @foreach($hours as $hour)

                            <tr>
                                <td style="vertical-align: middle;">{{ $hour->date->format('Y/m/d') }}（木）</td>
                                <td style="vertical-align: middle;">{{ $hour->hour }}h</td>
                                <td>
                                    <a href="{{ route('hours.show', $hour) }}" class="btn btn-sm btn-success">詳細</a>
                                    <a href="{{ route('hours.edit', $hour) }}" class="btn btn-sm btn-primary">編集</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $hour->id }}">削除</a>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td style="vertical-align: middle;">8/1（木）</td>
                            <td style="vertical-align: middle;">10.0h</td>
                            <td>
                                <a href="{{ route('mock_hours', ['show_this_month']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">8/2（金）</td>
                            <td style="vertical-align: middle;">9.8h</td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">詳細</a>
                                <a href="" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        @for($i=0; $i<5; $i++)
                            <tr>
                                <td style="vertical-align: middle;">8/{{ 5 + $i }}（月）</td>
                                <td style="vertical-align: middle;">{{ rand(80, 100) / 10 }}h</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success">詳細</a>
                                    <a href="" class="btn btn-sm btn-primary">編集</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                                </td>
                            </tr>
                        @endfor
                      </tbody>
                </table>
            </div>
        </div>
    </form>

    {{-- 削除モーダル --}}
    @foreach($hours as $hour)
        <div class="modal fade" id="deleteModal_{{ $hour->id }}">
            <div class="modal-dialog">
                {{-- <form action="#" method="POST" accept-charset="utf-8"> --}}
                <form>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title">???削除</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $hour->date }}の入力時間を一覧から削除します。本当によろしいですか？</p>
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
