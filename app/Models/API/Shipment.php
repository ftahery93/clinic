<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $table = "shipments";
    protected $hidden = array('name', 'image', 'description', 'created_at', 'updated_at');
}
