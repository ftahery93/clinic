<?php

namespace App;

use App;
use App\Address;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $hidden = ['created_at', 'updated_at', 'state_name', 'name_en', 'name_ar', 'country_code', 'governorate_id'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
