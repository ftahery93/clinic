<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompanyFavorite extends Model
{
    protected $table = "company_user_favorites";
    protected $fillable = ['company_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
