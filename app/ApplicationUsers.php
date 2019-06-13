<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;
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
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deleted'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }

}
