<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationUsers extends Model
{
    //
    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'age',
        'terms_conditions',
        'notification',
        'status'
    ];
}
