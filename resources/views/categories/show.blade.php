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
            @include('tasks._components.task_index')
        </div>
        <div class="box-footer">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">カテゴリー一覧へ戻る</a>
        </div>
    </div>
    {{-- 削除モーダル --}}
    @include('_components.modal_delete', [
        'array' => $tasks,
        'classify' => 'tasks.',
        'action' => 'destroy',
        'title' => 'タスク削除',
        'body' => 'を一覧から削除します。本当によろしいですか？',
    ])
@endsection
