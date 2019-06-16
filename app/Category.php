<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'photo',
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
