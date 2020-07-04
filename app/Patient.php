<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patient";
    protected $fillable = ['name', 'civil_id', 'phone_number', 'age', 'password', 'address'];
    protected $hidden = ['created_at', 'updated_at', 'password'];
}
