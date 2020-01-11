<?php

namespace App;

use App;
use App\Address;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $fillable = ['name_en', 'name_ar'];
    protected $hidden = ['created_at', 'updated_at', 'state_name', 'name_en', 'name_ar', 'country_code'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function governorate()
    {
        return $this->hasOne(Governorate::class);
    }

    public function getGovernorate()
    {
        return $this->belongsTo(Governorate::class,'governorate_id');
    }
}
