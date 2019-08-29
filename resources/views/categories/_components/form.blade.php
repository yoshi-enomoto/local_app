{{-- <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}
    <div class="box-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="name">
                カテゴリー名
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <input class="form-control" type="text" name="name" id="name" required value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="color">
                イメージカラー
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <input class="form-control" type="color" name="color" id="color" required value="{{ old('color') }}">
                @if ($errors->has('color'))
                    <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-sm btn-primary">登録する</button>
            </div>
        </div>
    </div>
</form> --}}
{{-- {{ dd(isset($category)) }} --}}
{{-- {{ dd($category) }} --}}
<form class="form-horizontal" action="{{ $action }}" method="{{ $method }}" accept-charset="utf-8">
    {{ csrf_field() }}
    @if(isset($category)) {{ method_field('PUT') }} @endif
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="name">
                カテゴリー名
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <input class="form-control" type="text" name="name" id="name" required
                    @if(isset($category)) value="{{ old('name', $category->name) }}"
                    @else value="{{ old('name') }}"
                    @endif
                >
                @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
            <label class="col-md-3 control-label" for="color">
                イメージカラー
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <input class="form-control" type="color" name="color" id="color" required
                    @if(isset($category)) value="{{ old('color', $category->color) }}"
                    @else value="{{ old('color') }}"
                    @endif
                >
                @if ($errors->has('color'))
                    <span class="help-block"><strong>{{ $errors->first('color') }}</strong></span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-sm btn-primary">{{ $button }}</button>
            </div>
        </div>
</form>
