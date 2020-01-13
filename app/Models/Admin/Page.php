<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App;

class Page extends Model {
    
   
   protected $guarded = [];

 public function getMessageAttribute()
    {
        return $this->{'message_' . App::getLocale()};
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }

}
