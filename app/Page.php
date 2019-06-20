<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Page extends Model
{

    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'name',
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'status',
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
        'name',
        'created_by', 
        'created_at',
        'updated_at',
        'updated_by',
        'status',
        'pivot'
    ];

}
