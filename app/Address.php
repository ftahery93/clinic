<?php

namespace App;

use App\City;
use App\Country;
use App\Governorate;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = array('name', 'block', 'street', 'country_id', 'city_id', 'governorate_id', 'building', 'notes', 'user_id', 'details', 'status', 'mobile');
    protected $hidden = array('created_at', 'updated_at', 'user_id', 'status', 'country_id', 'governorate_id', 'city_id','area');
    protected $appends = ['country', 'city', 'governorate'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getCOuntryAttribute()
    {
        $country = Country::find($this->{'country_id'});
        return $country->name;
    }

    public function getCityAttribute()
    {
        $city = City::find($this->{'city_id'});
        return $city->name;
    }

    public function getGovernorateAttribute()
    {
        $governorate = Governorate::find($this->{'governorate_id'});
        return $governorate->name;
    }

}
