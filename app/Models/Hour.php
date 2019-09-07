<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hour extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'date',
      'hour',
      'category_id',
      'task_id',
    ];

    protected $dates = [
      // 'date',
      'deleted_at',
    ];

    protected $casts = [
        // 'フィールド名' => 'キャストしたい型',
        'date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
