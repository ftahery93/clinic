<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //otherwise the user_id won't save properly.
    public $incrementing = false;

    // relation with Permissions
    public function permissionsGroup()
    {
        return $this->belongsTo('App\Permissions', 'permissions_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'permissions_id',
        'status',
        'permissions',
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
        'password', 'remember_token',
    ];

    /**
     * The photo attrbute with URL
     *
     * @var array
     */
    public function getPhotoAttribute($value){
        return $value ? url('/uploads/users/' . $value) : "";
    }
}
