<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = array('name', 'block', 'street', 'country_id', 'city_id', 'governorate_id', 'building', 'notes', 'user_id', 'details', 'status', 'mobile');
    protected $hidden = array('created_at', 'updated_at', 'user_id', 'status', 'country_id', 'governorate_id', 'governorate_id');
    protected $append = ['country','city','governorate'];
    protected 

}
