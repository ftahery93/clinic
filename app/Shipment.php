<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $fillable = array('address_from_id', 'address_to_id', 'pickup_time', 'quantity', 'user_id', 'status', 'company_id', 'price', 'payment_type');
    protected $hidden = array('name', 'image', 'description', 'created_at', 'updated_at', 'address_from_id', 'address_to_id', 'company_id');

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('quantity');
    }
}
