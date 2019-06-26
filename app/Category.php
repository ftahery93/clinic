<?php

namespace App;

use App\Poll;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'title_ar',
        'title_en',
        'photo',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
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
        'created_by','created_at','updated_at','updated_by','status','pivot'
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
        return $value ? url('/uploads/categories/' . $value) : null;
    }
}
