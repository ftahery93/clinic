<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\ApplicationUsers;

class Poll extends Model
{
    protected $fillable = [
        'poll_title_ar',
        'poll_title_en',
        'photo',
        'status',
        'start_datetime',
        'end_datetime',
        'enable_comments',
        'favourite',
        'seo_title_ar',
        'seo_title_en',
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

    public function countries() {
        return $this->belongsToMany(Country::class);
    }

    public function favourites() {
        return $this->belongsToMany(ApplicationUsers::class);
    }
}
