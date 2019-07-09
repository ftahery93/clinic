<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $table = "wallet_transactions";
    protected $fillable = array('company_id', 'amount', 'type');
    protected $hidden = array('updated_at');

    public function getTypeAttribute($value)
    {
        return $value ? true : false;
    }

}
