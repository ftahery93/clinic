<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function polls()
    {
        return $this->belongsToMany('App\Poll','poll_id');
    }
}
