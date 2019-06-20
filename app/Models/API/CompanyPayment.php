<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class CompanyPayment extends Model
{
    protected $table = "company_payments";
    protected $fillable = array('company_id', 'amount', 'pament_type');
    protected $hidden = array('created_at', 'updated_at');
}
