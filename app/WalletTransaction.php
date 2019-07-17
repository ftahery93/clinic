<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $table = "wallet_transactions";
    protected $fillable = array('company_id', 'amount', 'wallet_in', 'order_id');
    protected $hidden = array('updated_at', 'company_id');

    public function getWalletInAttribute($value)
    {
        return $value ? true : false;
    }

    public function getCreatedAtAttribute($value)
    {
        $values = explode(" ", $value);
        return $values[0];
    }

}
