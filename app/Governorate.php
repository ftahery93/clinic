<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = "governorates";

    protected $hidden = ['created_at', 'updated_at', 'country_id', 'code', 'status', 'name_en', 'name_ar','price'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function getCities()
    {
        return $this->hasMany(City::class, 'governorate_id');
    }
}
