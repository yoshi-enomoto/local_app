<form class="form-horizontal" action="{{ $action }}" method="POST" accept-charset="utf-8">
    {{ csrf_field() }}
    @if(isset($task)) {{ method_field('PUT') }} @endif
        <div class="form-group">
            <label class="col-md-3 control-label">カテゴリー名
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <select class="form-control" name="category_id" required>
                    <option value="" >カテゴリーを選択</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @if(isset($category_id)) {{ $category->id == $category_id ? 'selected' : '' }} @endif
                        >{{ $category->name }}</option>

{{--                         <option value="{{ $category->id }}"
                            @if(isset($task)) {{ $category->id == $task->category_id ? 'selected' : '' }} @endif
                            @elseif(isset($category_id)) {{ $category->id == $category_id ? 'selected' : '' }} @endif
                        >{{ $category->name }}</option> --}}

                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">
                タスク名
                <span class="label label-danger">必須</span>
            </label>
            <div class="col-md-9">
                <input class="form-control" type="text" name="name"
                {{-- @if(isset($request)) value="{{ $request->name }}" @endif --}}
                    @if(isset($task)) value="{{ old('name', $task->name) }}"
                    @else value="{{ old('name') }}"
                    @endif
                 required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn btn-sm btn-primary">{{ $button }}</button>
            </div>
        </div>
</form>
