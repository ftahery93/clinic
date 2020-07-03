<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{
    protected $table = "authentication";
    protected $fillable = array('access_token', 'user_id', 'type');
    protected $hidden = array('created_at', 'updated_at');
}
