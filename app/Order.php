<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['shipment_id', 'free_deliveries', 'wallet_amount', 'card_amount', 'status'];
    protected $hidden = ['created_at', 'updated_at'];

    public function shipments()
    {
        return $this->belongsToMany(Shipment::class);
    }
}
