<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";
    protected $fillable = ['reference_id', 'track_id', 'payment_gateway', 'transaction_id', 'transaction_status', 'order_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
