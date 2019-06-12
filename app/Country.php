<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function polls()
    {
        return $this->hasManyThrough(
            'App\Polls',
            'App\PollCountries',
            'country_id', // Foreign key on poll_countries table...
            'id', // Foreign key on polls table...
            'id', // Local key on countries table...
            'poll_id' // Local key on poll_countries table...
        );
    }
}
