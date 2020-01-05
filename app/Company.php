<?php

namespace App;

use App\Notifications\CompanyResetPassword;
use App\Shipment;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App;

class Company extends Authenticatable
{

    use
        Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'mobile', 'status', 'approved', 'country_id', 'rating','description_en','description_ar'];
        protected $appends = ['description'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at', 'approved', 'country_id', 'status','description_en','description_ar'
    ];

    // Probably on the user model, but pick wherever the data is
    public static function tokenExpired($expires_at)
    {
        if (Carbon::parse($expires_at) < Carbon::now()) {
            return true;
        }
        return false;
    }

    public function getImageAttribute($value)
    {
        return $value ? url('/public/uploads/company_images/' . $value) : null;
    }

    public function shipments()
    {
        return $this->belongsToMany(Shipment::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CompanyResetPassword($token));
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . App::getLocale()};
    }

}
