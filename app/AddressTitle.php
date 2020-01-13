<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class AddressTitle extends Model
{

  
    protected $table = "address_titles";
    protected $fillable = ['name_en','name_ar'];
    protected $hidden = ['created_at', 'updated_at','name_en','name_ar'];
    protected $appends = ['name'];
       
    public function getNameAttribute()
    {
        return $this->{'name_' . App::getLocale()};
    }


}
