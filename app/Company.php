<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'mobile', 'status', 'otp', 'approved', 'country_id', 'rating'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'delete_at', 'otp', 'approved', 'country_id', 'status',
    ];

// Probably on the user model, but pick wherever the data is
    public static function tokenExpired($expires_at)
    {
        if (Carbon::parse($expires_at) < Carbon::now()) {
            return true;
        }
        return false;
    }

    public static function checkLanguage($lang)
    {
        if ($lang == '') {
            return false;
        } else {
            return true;
        }
    }

    public function getImageAttribute($value)
    {
        return $value ? url('/uploads/company_images/' . $value) : null;
    }

}
