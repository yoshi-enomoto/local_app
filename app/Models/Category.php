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
        return $this->hasMany('App\Models\Hour');
    }

    public static function boot()
    {
        // laravel-cascade-soft-deletesパッケージをcomposer経由で使う手もある。
        parent::boot();
        static::deleting(function ($category) {
            $category->tasks()->delete();
            $category->hours()->delete();
        });
    }
}
