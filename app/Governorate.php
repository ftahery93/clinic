<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $table = "governorates";

    protected $hidden = ['created_at', 'updated_at', 'country_id', 'code', 'status', 'name_en', 'name_ar'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }
}
