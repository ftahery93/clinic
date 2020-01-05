<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneSignalCompanyUser extends Model
{
    protected $table = "one_signal_company_users";
    protected $fillable = ['company_id', 'player_id', 'device_type'];
}
