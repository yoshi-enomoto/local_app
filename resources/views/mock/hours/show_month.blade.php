@extends('_layouts.default')

@section('title_prefix')
    詳細：
@endsection
@section('title')
    1月
@endsection

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
        <li><a href="{{ route('mock_hours', ['index_month']) }}">月一覧</a></li>
        <li>@yield('title_prefix')@yield('title')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-success">
        <form class="form-horizontal">
            <div class="box-header with-border">
                <h3 class="box-title">@yield('title')</h3>
            </div>
            <div class="box-body">
                {{-- index_this_month.blade.phpでも同じものを使用 --}}
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 10%;">日付</th>
                            <th style="width: 60%;">時間数</th>
                            <th style="width: 30%;"></th>
                        </tr>
                        @for($i=0; $i<5; $i++)
                            <tr>
                                <td style="vertical-align: middle;">1/{{ 7 + $i }}（月）</td>
                                <td style="vertical-align: middle;">{{ rand(80, 100) / 10 }}h</td>
                                <td>
                                    <a href="{{ route('mock_hours', ['show_this_month']) }}" class="btn btn-sm btn-success">詳細</a>
                                    <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                                </td>
                            </tr>
                        @endfor
                        @for($i=0; $i<5; $i++)
                            <tr>
                                <td style="vertical-align: middle;">1/{{ 14 + $i }}（火）</td>
                                <td style="vertical-align: middle;">{{ rand(80, 100) / 10 }}h</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success">詳細</a>
                                    <a href="" class="btn btn-sm btn-primary">編集</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                                </td>
                            </tr>
                        @endfor
                        @for($i=0; $i<5; $i++)
                            <tr>
                                <td style="vertical-align: middle;">1/{{ 21 + $i }}（水）</td>
                                <td style="vertical-align: middle;">{{ rand(80, 100) / 10 }}h</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-success">詳細</a>
                                    <a href="" class="btn btn-sm btn-primary">編集</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                                </td>
                            </tr>
                        @endfor
                        @for($i=0; $i<4; $i++)
                            <tr>
                                <td style="vertical-align: middle;">1/{{ 28 + $i }}（木）</td>
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
            <div class="box-footer">
                <div class="form-group">
                    <label class="col-md-3 control-label">総時間数</label>
                    <div class="col-md-9">
                        <p class="form-control-static">200.0h</p>
                    </div>
                </div>
                <a href="{{ route('mock_hours', ['index_this_month']) }}" class="btn btn-sm btn-default">当月一覧へ戻る</a>
            </div>
        </form>
    </div>
    {{-- 削除モーダル --}}
    <div class="modal fade" id="deleteModal_number">
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
                        <h4 class="modal-title">削除</h4>
                    </div>
                    <div class="modal-body">
                        <p>〜〜〜を一覧から削除します。本当によろしいですか？</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-dissmiss="modal">削除する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
