@extends('_layouts.default')

@section('title_prefix')
    カテゴリー一覧
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
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">登録</a>
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
                    @foreach($categories as $category)
                        <tr>
                            <td style="vertical-align: middle;">{{ $category->id }}</td>
                            <td style="vertical-align: middle;">{{ $category->name }}</td>
                            <td style="vertical-align: middle;">
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 100%; background-color: {{ $category->color }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('categories.show', $category ) }}" class="btn btn-sm btn-success">詳細</a>
                                <a href="{{ route('categories.edit', $category ) }}" class="btn btn-sm btn-primary">編集</a>
                                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $category->id }}">削除</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- 削除モーダル --}}
    @include('_components.modal_delete', [
        'array' => $categories,
        'classify' => 'categories.',
        'action' => 'destroy',
        'title' => 'カテゴリー削除',
        'body' => 'を一覧から削除します。本当によろしいですか？',
    ])
@endsection
