<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = "appointments";
    protected $fillable = ['doctor_id', 'start_time', 'end_time'];
    protected $hidden = ['created_at', 'updated_at'];
}
