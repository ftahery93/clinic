<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class WalletOut extends Model
{
    protected $table = "wallet_out";
    protected $fillable = array('company_id', 'amount');
    protected $hidden = array('created_at', 'updated_at');
}
