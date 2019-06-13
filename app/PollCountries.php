<?php

namespace App;

use App\Polls;
use App\Country;
use Illuminate\Database\Eloquent\Model;

class PollCountries extends Model
{
    //
    protected $fillable = [
        'poll_id',
        'country_id',
        'created_at',
        'updated_at',
        'deleted'
    ];

    public function country(){
        return $this->belongsTo('App\Country','id');
    }

}
