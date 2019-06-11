<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class ApplicationUsers extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    //
    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'age',
        'terms_conditions',
        'notification',
        'status',
        'updated_by',
        'deleted'
    ];
}
