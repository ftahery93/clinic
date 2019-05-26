<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = "prices";
    protected $fillable = array('price');
    protected $hidden = array('id', 'created_at', 'updated_at');
}
