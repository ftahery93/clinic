<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = "authentication";
    protected $fillable = array('access_token', 'user_id', 'type', 'mobile');
    protected $hidden = array('created_at', 'updated_at');
}
