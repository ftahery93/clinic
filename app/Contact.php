<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $fillable = ['email','title','subject'];
    protected $hidden = ['created_at', 'updated_at', ];
}
