<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctor";
    protected $fillable = ['name', 'civil_id', 'phone_number', 'age', 'password', 'address', 'speciality', 'image','status'];
    protected $hidden = ['created_at', 'updated_at', 'password'];


    public function getImageAttribute($value)
    {
        return $value ? url('/public/uploads/doctor_images/' . $value) : null;
    }
}
