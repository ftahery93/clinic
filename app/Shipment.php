<?php

namespace App;

use App\Company;
use App\Address;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $fillable = array('address_from_id', 'city_id_from', 'city_id_to', 'is_today', 'pickup_time_from', 'pickup_time_to', 'quantity', 'user_id', 'status', 'company_id', 'price', 'payment_type','is_single');
    protected $hidden = array('name', 'image', 'description', 'updated_at', 'address_from_id', 'company_id', 'city_id_from', 'city_id_to', 'address_to_id');

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot(['quantity', 'address_to_id', 'city_id_to', 'city_id_from']);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }


    public function getIsTodayAttribute($value)
    {
        return $value ? true : false;
    }

    public function getPickupTimeFromAttribute($value)
    {
        return $value == null ? null : substr($value, 0, -3);
    }

    public function getPickupTimeToAttribute($value)
    {
        return $value == null ? null : substr($value, 0, -3);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
}
