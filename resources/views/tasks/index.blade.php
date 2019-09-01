@extends('_layouts.default')

@section('title_prefix')
    タスク一覧
@endsection
@section('title', '')

<!-- コンテンツヘッダエリア -->
@section('content-header')
    <h1>@yield('title_prefix')</h1>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
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
                <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">登録</a>
            </div>
        </div>
        <div class="box-body">
            @include('tasks._components.task_index')
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
