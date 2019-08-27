@extends('_layouts.default')

@section('title_prefix')
    タスク一覧
@endsection
@section('title', '')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('mock', ['home']) }}">Home</a></li>
        <li>@yield('title_prefix')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">一覧</h3>
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
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">2</td>
                        <td style="vertical-align: middle;">PCセットアップ</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">3</td>
                        <td style="vertical-align: middle;">テレアポ</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">4</td>
                        <td style="vertical-align: middle;">ドラフト作成</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">5</td>
                        <td style="vertical-align: middle;">社内打ち合わせ</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">6</td>
                        <td style="vertical-align: middle;">ミーティング</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">7</td>
                        <td style="vertical-align: middle;">ミーティング</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">8</td>
                        <td style="vertical-align: middle;">ミーティング</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">9</td>
                        <td style="vertical-align: middle;">ミーティング</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle;">10</td>
                        <td style="vertical-align: middle;">ミーティング</td>
                        <td>
{{--                                 <a href="{{ route('mock_tasks', ['show']) }}" class="btn btn-sm btn-success">詳細</a> --}}
                            <a href="{{ route('mock_tasks', ['edit']) }}" class="btn btn-sm btn-primary">編集</a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_number">削除</a>
                        </td>
                    </tr>
                  </tbody>
            </table>
        </div>
        <div class="box-footer text-center">
            {{-- @include('vendor.pagination.default', ['paginator' => []]) --}}
            {{-- ひとまず、コマンドで生成した「pagination/default.blade」の中身を貼りつける --}}
            <ul class="pagination" role="navigation">
                {{-- Previous Page Link --}}
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&lsaquo;</span>
                    </li>

                {{-- Pagination Elements --}}
                @foreach (["1","2","3","4","5"] as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                @endforeach

                {{-- Next Page Link --}}
                    <li>
                        <a href="" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
            </ul>
        </div>
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
