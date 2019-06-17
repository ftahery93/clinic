<?php

namespace App;

use App\Country;
use App\Category;
use App\Option;
use App\Comment;
use App\ApplicationUsers;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'name',
        'photo',
        'status',
        'start_datetime',
        'end_datetime',
        'enable_comments',
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
        'created_by', 'created_at','updated_at','updated_by','start_datetime','end_datetime','status','pivot'
    ];

    public function countries() {
        return $this->belongsToMany(Country::class);
    }

    public function favourites() {
        return $this->belongsToMany(ApplicationUsers::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function options() {
        return $this->belongsToMany(Option::class);
    }

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }

}
