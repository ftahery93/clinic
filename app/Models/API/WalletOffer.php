<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class WalletOffer extends Model
{
    protected $table = "wallet_offers";
    protected $fillable = array('amount', 'offer_amount');
    protected $hidden = array('created_at', 'updated_at');
}
