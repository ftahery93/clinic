<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Poll;

class Country extends Model
{
    public function polls()
    {
        return $this->belongsToMany(Poll::class);
    }
}
