<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class PollResult extends Model
{
    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'poll_id',
        'option_id',
        'user_id',
        'created_by',
        'created_at',
        'updated_by',
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
        'created_by', 'created_at','updated_by','updated_at','pivot'
    ];
}
