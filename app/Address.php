<?php

namespace App;

use App\City;
use App\Country;
use App\Governorate;
use Illuminate\Database\Eloquent\Model;
use DB;
use App;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = array('name', 'block', 'street', 'country_id', 'city_id', 'governorate_id', 'building', 'notes', 'user_id', 'details', 'status', 'mobile', 'save', 'jeddah','title_id');
    protected $hidden = array('created_at', 'updated_at', 'user_id', 'status', 'country_id', 'governorate_id', 'city_id', 'area', 'save');
    protected $appends = ['country', 'city', 'governorate', 'title'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getCountryAttribute()
    {
        return Country::find($this->{'country_id'});
        //return $country->name;
    }

    public function getCityAttribute()
    {
        return City::find($this->{'city_id'});
        //return $city->name;
    }

    public function getGovernorateAttribute()
    {
        return Governorate::find($this->{'governorate_id'});
        //return $governorate->name;
    }

    public function getTitleAttribute()
    {
        $name = 'name_en';
        if(App::getLocale() == 'ar'){
            $name = 'name_ar';
        }
        $return = DB::table('address_titles')
        ->select('id',$name.' AS name')
        ->where('id',$this->{'title_id'})
        ->first(); 

        return $return;    
    }

    public static function titles()
    {
        $name = 'name_en';
        if(App::getLocale() == 'ar'){
            $name = 'name_ar';
        }
        return DB::table('address_titles')->select('id',$name.' AS name')->get();
    }

}
