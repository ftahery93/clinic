<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polls extends Model
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

    public function countries() {
        return $this->hasMany('App\PollCountries', 'poll_id');
    }

}
