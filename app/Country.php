<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";
    protected $fillable = array('id', 'name_en', 'name_ar', 'country_code', 'status');
    protected $hidden = array('created_at', 'updated_at', 'name_en', 'name_ar', 'digits', 'status');
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

    public function governorates()
    {
        return $this->belongsToMany(Governorate::class);
    }
}
