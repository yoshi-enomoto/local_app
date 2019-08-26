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
        {{-- フラッシュメッセージ --}}
        @include('_components.message')
            {{-- ここに入れないと、コンテンツ目一杯広がってしまう：wip --}}

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
    </section>

    {{-- 削除モーダル --}}
    @foreach($categories as $category)
        <div class="modal fade" id="deleteModal_{{ $category->id }}">
            <div class="modal-dialog">
                <form action="{{ route('categories.destroy', $category) }}" method="POST" accept-charset="utf-8">
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
                            <p>『{{ $category->name }}』を一覧から削除します。本当によろしいですか？</p>
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
