@extends('_layouts.default')

@section('title_prefix')
    詳細：
@endsection
@section('title')
    新規案件1
@endsection

@section('content')
    <!-- コンテンツヘッダ -->
    <section class="content-header">
        <h1>@yield('title_prefix')</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
            <li><a href="{{ route('mock_categories', ['index']) }}">カテゴリー一覧</a></li>
            <li>@yield('title_prefix')：新規案件1</li>
        </ol>
    </section>

    <!-- メインコンテンツ -->
    <section class="content">
        <!-- コンテンツ1 -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@yield('title')</h3>
                <div class="box-tools">
                    <a href="{{ route('mock_tasks', ['create']) }}" class="btn btn-sm btn-primary">登録</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 5%;" class="text-center">#</th>
                            <th style="width: 50%;">タスク名</th>
                            <th style="width: 30%;"></th>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">客先ミーティング</td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;">ドラフト作成</td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;">社内打ち合わせ</td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                      </tbody>
                </table>
            </div>
        </div>
    </section>

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
