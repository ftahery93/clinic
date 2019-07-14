<?php

namespace App\Models\Admin;

use App;
use Illuminate\Database\Eloquent\Model;

class LanguageManagement extends Model
{
    protected $table = 'language_management';
    protected $guarded = [];

    public static function getLabel($title, $lang)
    {
        App::setLocale($lang);
        return trans('messages.' . $title);
    }

}
