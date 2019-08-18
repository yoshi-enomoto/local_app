@extends('_layouts.default')

@section('title_prefix')
    カテゴリー一覧
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
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">一覧</h3>
                <div class="box-tools">
                    <a href="{{ route('mock_categories', ['create']) }}" class="btn btn-sm btn-primary">登録</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th style="width: 50%;">カテゴリー名</th>
                            <th style="width: 15%;">イメージカラー</th>
                            <th style="width: 30%;"></th>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">新規案件1</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: #ff0000">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;">既存案件9</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: #ffff00">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;">その他雑務</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: #3FD300">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        <tr>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;">新規案件2</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: #ff0000">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;">5</td>
                            <td style="vertical-align: middle;">新規案件3</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: #ff0000">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('mock_categories', ['show']) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('mock_categories', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                            </td>
                        </tr>
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
