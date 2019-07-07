<?php

namespace App\Models\API;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $fillable = array('address_from_id', 'address_to_id', 'is_today', 'pickup_time_from', 'pickup_time_to', 'quantity', 'user_id', 'status', 'company_id', 'price', 'payment_type');
    protected $hidden = array('name', 'image', 'description', 'created_at', 'updated_at', 'address_from_id', 'address_to_id', 'company_id');

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quantity');
    }

    public function getIsTodayAttribute($value)
    {
        return $value ? true : false;
    }
}
