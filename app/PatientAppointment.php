<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientAppointment extends Model
{
    protected $table = "patient_appointments";
    protected $fillable = ['patient_id', 'start_time', 'end_time', 'doctor_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
