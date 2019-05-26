<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class WalletIn extends Model
{
    protected $table = "wallet_in";
    protected $fillable = array('company_id', 'amount');
    protected $hidden = array('created_at', 'updated_at');
}
