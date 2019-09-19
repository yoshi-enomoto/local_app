<form class="form-horizontal" action="{{ $action }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}
    @if(isset($category)) {{ method_field('PUT') }} @endif
    {{-- @if(isset($category)) {{ $method }} @endif --}}
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
    <div class="form-group" style="margin-bottom: 30px;">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn btn-sm btn-primary">{{ $button }}</button>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="color">
            <a href="https://ironodata.info/directory/">イメージカラー例1</a><br>
            {{-- <a href="https://www.colordic.org">イメージカラー例2</a> --}}
        </label>
        @foreach(config('const.colorList1') as $color)
            <div class="col-md-2">
                <button type="button" class="btn btn-default btn-block" style="background-color:{{ $color }}; color: #000000;">{{ $color }}</button>
            </div>
        @endforeach
    </div>
    @foreach(config('const.colorList2') as $key => $color)
        @if($key == 0 || $key == 4)
            <div class="form-group">
        @endif
            <div class="col-md-2 {{ $key == 0 || $key == 4 ? 'col-md-offset-3' : '' }}">
                <button type="button" class="btn btn-default btn-block" style="background-color:{{ $color }}; color: #000000;">{{ $color }}</button>
            </div>
        @if($key == 3 || $key == 7)
            </div>
        @endif
    @endforeach
</form>
