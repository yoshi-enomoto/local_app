@extends('_layouts.default')

@section('title_prefix')
    {{ $date }}
@endsection
@section('title', 'の詳細')

<!-- コンテンツヘッダ -->
@section('content-header')
    <h1>@yield('title_prefix')@yield('title')</h1>
    <!-- パンくずリスト -->
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li>@yield('title_prefix')@yield('title')</li>
    </ol>
@endsection

<!-- メインコンテンツ -->
@section('content-body')
    @foreach ($targetHours as $hour)
        <br>{{ $hour->date->format('Y-m-d') }}
        <br>{{ $hour->category_id }}
        <br>
            @if(!is_null($hour->task_id))
              {{ $hour->task_id }}
            @else
              none
            @endif
        <br>{{ $hour->hour}}
        <br>
    @endforeach
@endsection
