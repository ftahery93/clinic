<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;

class LanguageManagement extends Model
{
    protected $table = 'language_management';

    protected $guarded = [];

    // Probably on the user model, but pick wherever the data is
    public static function getLabel($title, $lang)
    {
        // $label = LanguageManagement::select('label_en', 'label_ar')
        //     ->where('status', 1)
        //     ->where('title', $title)
        //     ->first();
        App::setLocale($lang);
        return trans('messages.' . $title);
    }

}
