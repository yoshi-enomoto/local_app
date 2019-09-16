@extends('_layouts.default')

@section('title_prefix')
    月一覧（未）
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
                        @foreach($hours as $key => $hour)
                            <tr>
                                <td style="vertical-align: middle;">{{ $hour->everyMonth }}月</td>
                                <td style="vertical-align: middle;">{{ $hour->sum_hour }}h</td>
                                <td>
                                    {{-- wip --}}
                                    <a href="{{ route('mock_hours', ['show_month']) }}" class="btn btn-sm btn-success">詳細</a>
{{--                                     <a href="{{ route('mock_hours', ['edit']) }}" class="btn btn-sm btn-primary">編集</a> --}}
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
    @foreach($hours as $key => $hour)
    {{-- {{ dd($hour->everyMonth) }} --}}
        <div class="modal fade" id="deleteModal_{{ $key }}" data-keyboard="true" tabindex="-1">
            <div class="modal-dialog">
                {{-- wip --}}
                <form action="{{ route('hours.destroy_month') }}" method="POST" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{-- {{ method_field('DELETE') }} --}}
                    <input type="hidden" name="target" value="{{ $hour->everyMonth }}" placeholder="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title">削除</h4>
                        </div>
                        <div class="modal-body">
                            <p>{{ $hour->everyMonth }}月の総時間数を削除します。本当によろしいですか？</p>
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
