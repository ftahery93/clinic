<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\PaymentDetail;

class RegisteredUser extends Model {

    use SoftDeletes;

    protected $table = 'registered_users';
    protected $guarded = ['password_confirmation','uploaded_image_removed'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];
    
    public function paymentdetail($id) {
        $PaymentDetail = PaymentDetail::
                where(array('subscriber_id'=>$id))
                ->count();
        return $PaymentDetail;        
    }

}
