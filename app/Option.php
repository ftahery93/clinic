<?php

namespace App;

use App\Poll;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'title_ar',
        'title_en',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_by', 'created_at','updated_by','updated_at','pivot'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }

    public function polls() {
        return $this->belongsToMany(Poll::class);
    }

    

}