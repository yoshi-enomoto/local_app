<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'color',
      'name',
    ];

    protected $dates = [
      'deleted_at',
    ];

    public function Tasks()
    {
        return $this->hasMany('App\Models\Task');
          // 定義することで、
          // メソッドで繋げるとHasManyクラス、
          // プロパティで繋げるとCollectionクラスが取得できる。
    }

    public function hours()
    {
        return $this->hasMany('App\Models\Hours');
    }
}
