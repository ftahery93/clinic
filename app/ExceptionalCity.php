<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class ExceptionalCity extends Model
{

  
    protected $table = "exception_cities";
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
       
    

}
