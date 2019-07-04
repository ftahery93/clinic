<?php

namespace App\Models\API;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class RegisteredUser extends Authenticatable
{

    use HasApiTokens,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'mobile', 'status', 'otp', 'country_id', 'fullname', 'image'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'delete_at', 'otp', 'original_password',
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
        return $value ? url('/uploads/user_images/' . $value) : null;
    }

}
