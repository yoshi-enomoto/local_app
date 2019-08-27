{{-- フラッシュメッセージ用エリア --}}
@if (session('success'))
{{-- @if(session()->has('success')) --}}
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
    </div>
@endif

{{-- 各inputに出したバリデメッセージを上部に出す方法 --}}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
