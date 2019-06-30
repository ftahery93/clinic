<?php

namespace App;

use App\Poll;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    //otherwise the user_id won't save properly.
    public $incrementing = false; 

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
        'tel', 'created_at','updated_at','code','pivot'
    ];

    public function polls()
    {
        return $this->belongsToMany(Poll::class);
    }

    /**
     * The photo attrbute with URL
     *
     * @var array
     */
    public function getPhotoAttribute($value){
        return $value ? url('/uploads/countries/' . $value) : "";
    }
}
