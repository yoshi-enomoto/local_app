下記の内容で登録しました。

日付　　　：{{ $sentence->date->format('Y/m/d') }}
カテゴリー：{{ $sentence->category->name }}
タスク　　：{{ is_null($sentence->task_id) ? '関連付け無し' : $sentence->task->name }}
入力時間　：{{ $sentence->hour }}h

以上！
