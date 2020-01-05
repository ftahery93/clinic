<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExceptionCity extends Model
{
    protected $table = "exception_cities";
    protected $fillable = ['city_id', 'price'];
    protected $hidden = ['city_id', 'created_at', 'updated_at'];
}
