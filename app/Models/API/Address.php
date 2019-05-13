<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    protected $hidden = array('created_at', 'updated_at');
}
