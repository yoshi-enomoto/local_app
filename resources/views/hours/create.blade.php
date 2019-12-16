@extends('_layouts.default')

@section('title_prefix')
    時間入力
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
        <form class="form-horizontal" action="{{ route('hours.store') }}" method="POST" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label class="col-md-4 control-label">
                        日付
                        <span class="label label-danger">必須</span>
                    </label>
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="date" value="{{ old('date') }}" min="2000-01-01" max="2999-12-31" required>
                        {{-- <input class="form-control" type="text" name="date" value="" id="datepicker"> --}}
                        @if ($errors->has('date'))
                            <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-body">
                @for($i=0; $i<1; $i++)
                {{-- @for($i=0; $i<10; $i++) --}}
                    <div class="form-group {{ $errors->has('hours.'.$i.'.category_id') || $errors->has('hours.'.$i.'.task_id') || $errors->has('hours.'.$i.'.hour') ? 'has-error' : '' }}">
                        <label class="col-md-4 control-label">
                            カテゴリー
                            <span class="label label-danger">必須</span>
                            /
                            タスク
                            /
                            時間{{ $i+1 }}
                            <span class="label label-danger">必須</span>
                        </label>
                        <div class="col-md-3">
                            <select class="form-control parent" name="hours[{{ $i }}][category_id]" required>
                            {{-- <select class="form-control parent-{{ $i }}" name="hours[{{ $i }}][category_id]"> --}}
                                <option value="" selected>カテゴリーを選択</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(!is_null(old('hours.'.$i.'.category_id'))) {{ old('hours.'.$i.'.category_id') == $category->id ? 'selected' : '' }} @endif >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('hours.'.$i.'.category_id'))
                                <span class="help-block"><strong>{{ $errors->first('hours.'.$i.'.category_id') }}</strong></span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <select class="form-control children" name="hours[{{ $i }}][task_id]" disabled>
                            {{-- <select class="form-control children-{{ $i }}" name="hours[{{ $i }}][task_id]" disabled> --}}
                                <option value="" selected>タスクを選択</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" data-val="{{ $task->category->id }}" @if(!is_null(old('hours.'.$i.'.task_id'))) {{ old('hours.'.$i.'.task_id') == $task->id ? 'selected' : '' }} @endif>{{ $task->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('hours.'.$i.'.task_id'))
                                <span class="help-block"><strong>{{ $errors->first('hours.'.$i.'.task_id') }}</strong></span>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <input class="form-control" type="number" name="hours[{{ $i }}][hour]" value="{{ old('hours.'.$i.'.hour') }}" min="0" max="24" step="0.01" required>
                            @if ($errors->has('hours.'.$i.'.hour'))
                                <span class="help-block"><strong>{{ $errors->first('hours.'.$i.'.hour') }}</strong></span>
                            @endif
                        </div>
                    </div>
                @endfor
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-8">
                        {{-- <button type="submit" class="btn btn-sm btn-primary">登録する</button> --}}
                        <input class="btn btn-sm btn-primary" type="submit" name="register" value="連続登録する">
                        <input class="btn btn-sm btn-primary" type="submit" name="register" value="登録する">
                            {{-- 異なるname属性値にして、その属性値によって処理をさせる手もある --}}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{-- <a href="javascript:history.back()" class="btn btn-sm btn-default">前に戻る</a> --}}
                {{-- <a href="{{ route('hours.list_months') }}" class="btn btn-sm btn-default">月一覧へ戻る</a> --}}
                <a href="{{ route('hours.list_this_month') }}" class="btn btn-sm btn-default">当月一覧へ戻る</a>
            </div>
        </form>
    </div>
@endsection

@section('unique_js')
    <script type="text/javascript">
        var $children = $('.children');  // カテゴリーの要素を変数に入れる
        var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく

        // カテゴリーのselect要素が変更になるとイベントが発生
        $('.parent').change(function() {
            // カテゴリーのvalueを取得して変数に入れる
            var val1 = $(this).val();
            // 削除された要素をもとに戻すため.html(original)を入れておく
            $children.html(original).find('option').each(function() {
                var val2 = $(this).data('val'); // data-valの値を取得
                // valueと異なるdata-valを持つ要素を削除
                if (val1 != val2) {
                    $(this).not(':first-child').remove();
                }
            });

            // カテゴリーのselect要素が未選択の場合、タスクをdisabledにする
            if ($(this).val() == "") {
                $children.attr('disabled', 'disabled');
            } else {
                $children.removeAttr('disabled');
            }
        });

//         未完成の複数input
//         for(var i = 0; i < 10; i++) {
// 　　eval("var children" + i);

//             console.log('.children-'+i);
//             console.log($('children'+i));
//         // var $children = $('.children-(i)');  // カテゴリーの要素を変数に入れる
//         eval("var children" + i) = $('.children-'+i);  // カテゴリーの要素を変数に入れる
//         var original = $('children'+i).html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく

//         // カテゴリーのselect要素が変更になるとイベントが発生
//         // $('.parent-(i)').change(function() {
//         $('.parent-'+i).change(function() {
//             // カテゴリーのvalueを取得して変数に入れる
//             var val1 = $(this).val();
//             // 削除された要素をもとに戻すため.html(original)を入れておく
//             $('children'+i).html(original).find('option').each(function() {
//                 var val2 = $(this).data('val'); // data-valの値を取得
//                 // valueと異なるdata-valを持つ要素を削除
//                 if (val1 != val2) {
//                     $(this).not(':first-child').remove();
//                 }
//             });

//             // カテゴリーのselect要素が未選択の場合、タスクをdisabledにする
//             if ($(this).val() == "") {
//                 $('children'+i).attr('disabled', 'disabled');
//             } else {
//                 $('children'+i).removeAttr('disabled');
//             }
//         });
//         }

    </script>
@endsection
