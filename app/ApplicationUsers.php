<?php

namespace App;

use App\Poll;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApplicationUsers extends Authenticatable
{
    use HasApiTokens, Notifiable;

    //otherwise the user_id won't save properly.
    public $incrementing = false;

    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
        'age',
        'terms_conditions',
        'notification',
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

    public function favourites() {
        return $this->belongsToMany(Poll::class);
    }

}
