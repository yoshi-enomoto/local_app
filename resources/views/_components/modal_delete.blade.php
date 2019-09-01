@foreach($array as $var)
    <div class="modal fade" id="deleteModal_{{ $var->id }}" data-keyboard="true" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route($classify.$action, $var) }}" method="POST" accept-charset="utf-8">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4 class="modal-title">{{ $title }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>『{{ $var->name }}』{{ $body}}</p>
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
