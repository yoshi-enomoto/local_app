<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'category_id',
      'name',
    ];

    protected $dates = [
      'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
