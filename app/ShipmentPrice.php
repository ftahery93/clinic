<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentPrice extends Model
{
    protected $table = "shipment_price";
    protected $fillable = ['shipment_id', 'city_from_id', 'city_to_id', 'governorate_from_id', 'governorate_to_id', 'price'];
    protected $hidden = ['created_at', 'updated_at', 'city_from_id', 'city_to_id'];
    protected $appends = ['city_from_name', 'city_to_name'];

    public function getCityFromNameAttribute()
    {
        return (City::find($this->{'city_from_id'}))->name;
    }

    public function getCityToNameAttribute()
    {
        return (City::find($this->{'city_to_id'}))->name;
    }
}
