<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    public static function isNotGet()
    {
        return self::where('is_not_get', 1)->get();
    }
    //
}
