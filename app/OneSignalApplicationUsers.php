<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class OneSignalApplicationUsers extends Model
{
    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'application_users_id',
        'player_id',
        'device_type',
        'created_at',
        'updated_at'
    ];
 
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at','updated_at','updated_by','pivot'
    ];
}
