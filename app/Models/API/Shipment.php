<?php

namespace App\Models\API;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $fillable = array('address_from_id', 'address_to_id', 'pickup_time', 'quantity', 'user_id', 'status', 'company_id');
    protected $hidden = array('name', 'image', 'description', 'created_at', 'updated_at', 'status');

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
