<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = "Authentication";
    protected $fillable = array('access_token', 'user_id');
    protected $hidden = array('created_at', 'updated_at');
}
