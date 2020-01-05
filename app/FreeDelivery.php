<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeDelivery extends Model
{
    protected $table = "free_deliveries";
    protected $fillable = array('company_id', 'quantity');
    protected $hideen = array('created_at', 'updated_at');
}
