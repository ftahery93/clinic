<?php

namespace App\Helpers;

use App\Models\Admin\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Auth;
use Request;

//use App\Models\Admin\TrainerLogActivity as TrainerLogActivityModel;

class LogActivity
{

    public static function addToLog($module, $subject)
    {

        $log = [];

        $username = auth()->check() ? auth()->user()->username : '';

        $log['subject'] = $module . ' has been ' . $subject . ' by ' . $username;
        $log['url'] = Request::fullUrl();

        $log['method'] = Request::method();

        $log['ip'] = Request::ip();

        $log['agent'] = Request::header('user-agent');

        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;

        $log['vendor_id'] = 0;

        $log['trainer_id'] = 0;

        $log['user_type'] = 0;
        LogActivityModel::create($log);

    }

    public static function logActivityLists()
    {

        return LogActivityModel::latest()->get();

    }
}
