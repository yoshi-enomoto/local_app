@extends('_layouts.default')

@section('title_prefix')
    月一覧
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
    <form class="form-horizontal">
        <!-- コンテンツ1 -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">一覧</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 10%;">月</th>
                            <th style="width: 60%;">総時間数</th>
                            <th style="width: 30%;"></th>
                        </tr>
                        @for($i=1; $i<8; $i++)
                            <tr>
                                <td style="vertical-align: middle;">{{ $i }}月</td>
                                <td style="vertical-align: middle;">{{ rand(1700, 2000) / 10 }}h</td>
                                <td>
                                    <a href="{{ route('mock_hours', ['show_month']) }}" class="btn btn-sm btn-success">詳細</a>
                                    <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
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
