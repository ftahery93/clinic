<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class OneSignalUser extends Model
{
    protected $table = "one_signal_users";
    protected $fillable = ['user_id', 'player_id', 'device_type'];
}
