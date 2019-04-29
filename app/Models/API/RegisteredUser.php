<?php

namespace App\Models\API;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RegisteredUser extends Authenticatable {

    use HasApiTokens,
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'original_password', 'civilid', 'mobile', 'permission_id', 'status', 'user_role_id', 'otp'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// Probably on the user model, but pick wherever the data is
    public static function tokenExpired($expires_at) {
        if (Carbon::parse($expires_at) < Carbon::now()) {
            return true;
        }
        return false;
    }

    public static function checkLanguage($lang) {
        if ($lang == '') {
            return false;
        } else {
            return true;
        }
    }

}
