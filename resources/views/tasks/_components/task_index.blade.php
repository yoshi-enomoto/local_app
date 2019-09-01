<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <th style="width: 5%;">#</th>
            <th style="width: 50%;">タスク名</th>
            <th style="width: 30%;"></th>
        </tr>
        @foreach($tasks as $key => $task)
            <tr>
                <td style="vertical-align: middle;">{{ $key + 1 }}</td>
                    {{-- id値を番号として振ると、削除された時に歯抜けになる！ --}}
                <td style="vertical-align: middle;">{{ $task->name }}</td>
                <td>
                    {{-- <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-success">詳細</a> --}}
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">編集</a>
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{ $task->id }}">削除</a>
                </td>
            </tr>
        @endforeach
      </tbody>
</table>
