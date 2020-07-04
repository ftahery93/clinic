<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $fillable = ['username', 'password'];
    protected $hidden = ['created_at', 'updated_at', 'password'];
}
