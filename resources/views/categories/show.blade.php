@extends('_layouts.default')

@section('title_prefix')
    カテゴリー詳細：
@endsection
@section('title')
    {{ $category->name }}
@endsection

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('categories.index') }}">カテゴリー一覧</a></li>
        <li>@yield('title_prefix')@yield('title')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">@yield('title')</h3>
            <div class="box-tools">
                <a href="{{ route('tasks.create', ['category_id' => $category->id]) }}" class="btn btn-sm btn-primary">登録</a>
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
                    @foreach($category->tasks as $task)
                        <tr>
                            <td style="vertical-align: middle;">{{ $task->id }}</td>
                            <td style="vertical-align: middle;">{{ $task->name }}</td>
                            <td>
                                {{-- <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-success">詳細</a> --}}
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $task->id }}">削除</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
        <div class="box-footer">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">カテゴリー一覧へ戻る</a>
        </div>
    </div>

    {{-- 削除モーダル --}}
    @foreach($category->tasks as $task)
        <div class="modal fade" id="deleteModal_{{ $task->id }}" data-keyboard="true" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" accept-charset="utf-8">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                            <h4 class="modal-title">タスク削除</h4>
                        </div>
                        <div class="modal-body">
                            <p>『{{ $task->name }}』を一覧から削除します。本当によろしいですか？</p>
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
