{{-- フラッシュメッセージ用エリア --}}
@if (session('success'))
{{-- @if(session()->has('success')) --}}
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
    </div>
@endif
