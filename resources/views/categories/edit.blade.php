@extends('_layouts.default')

@section('title_prefix')
    カテゴリー編集
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

<!-- メインコンテンツエリア -->
@section('content-body')
    <!-- コンテンツ1 -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">編集</h3>
        </div>
        <div class="box-body">
            @include('categories._components.form', [
                'category' => $category,
                // 'method' => method_field('PUT'),
                'action' => route('categories.update', $category->id),
                'button' => '更新する',
            ])
        </div>
        <div class="box-footer">
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-default">カテゴリー一覧へ戻る</a>
        </div>
    </div>
@endsection
