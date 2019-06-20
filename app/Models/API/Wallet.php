<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = "wallet";
    protected $fillable = array('company_id', 'balance');
    protected $hidden = array('created_at', 'updated_at');
}
