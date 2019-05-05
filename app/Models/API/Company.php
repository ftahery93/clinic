<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $hidden = array('created_at', 'updated_at', 'player_id', 'approved','otp');
    protected $fillable = array('name', 'description', 'rating', 'image', 'player_id');
}
