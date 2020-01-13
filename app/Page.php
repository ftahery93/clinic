<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Page extends Model
{
    //
   protected $guarded = [];

   protected $hidden = [
        'created_at', 'updated_at'
    ];

 public function getMessageAttribute()
    {
        return $this->{'message_' . App::getLocale()};
    }

    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }
}
