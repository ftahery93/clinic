<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $table = "wallet_transactions";
    protected $fillable = array('company_id', 'amount');
    protected $hidden = array('created_at', 'updated_at');
}
