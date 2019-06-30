<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $fillable = array('name', 'block', 'street', 'area', 'building', 'notes', 'user_id', 'details', 'status');
    protected $hidden = array('created_at', 'updated_at', 'user_id', 'status');
}
