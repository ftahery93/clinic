<?php

// This class file to define all general functions

namespace App\Helpers;

use Auth;
use App\Country;
use App\Setting;
use App\Notification;
use App\WebmasterSetting;

class Helper
{
    static function GeneralWebmasterSettings($var)
    {
        $WebmasterSetting = WebmasterSetting::find(1);
        return $WebmasterSetting->$var;
    }

    static function GeneralSiteSettings($var)
    {
        $Setting = Setting::find(1);
        return $Setting->$var;
    }

    // Get Notifications Alerts
    static function notificationAlerts()
    {
        //List of all Notifications
        if (@Auth::user()->permissionsGroup->view_status) {
            $Notifications = Notification::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->where('status', '=',
                0)->where('cat_id', '=', 0)->limit(4)->get();
        } else {
            $Notifications = Notification::orderby('id', 'desc')->where('status', '=', 0)->where('cat_id', '=', 0)->limit(4)->get();
        }
        return $Notifications;
    }

    // Get Notifications Alerts
    static function notificationNewCount()
    {
        //List of all Webmails
        if (@Auth::user()->permissionsGroup->view_status) {
            $Notifications = Notification::where('created_by', '=', Auth::user()->id)->orderby('id', 'desc')->where('status', '=',
                0)->where('cat_id', '=', 0)->get();
        } else {
            $Notifications = Notification::orderby('id', 'desc')->where('status', '=', 0)->where('cat_id', '=', 0)->get();
        }
        return count($Notifications);
    }

    static function GetIcon($path, $file)
    {
        $ext = strrchr($file, ".");
        $ext = strtolower($ext);
        $icon = "<i class=\"fa fa-file-o\"></i>";
        if ($ext == ".pdf") {
            $icon = "<i class=\"fa fa-file-pdf-o\" style='color: red;font-size: 20px'></i>";
        }
        if ($ext == '.png' or $ext == '.jpg' or $ext == '.jpeg' or $ext == '.gif') {
            $icon = "<img src='$path/$file' style='width: auto;height: 20px' title=''>";
        }
        if ($ext == ".xls" or $ext == '.xlsx') {
            $icon = "<i class=\"fa fa-file-excel-o\" style='color: green;font-size: 20px'></i>";
        }
        if ($ext == ".ppt" or $ext == '.pptx' or $ext == '.pptm') {
            $icon = "<i class=\"fa fa-file-powerpoint-o\" style='color: #1066E7;font-size: 20px'></i>";
        }
        if ($ext == ".doc" or $ext == '.docx') {
            $icon = "<i class=\"fa fa-file-word-o\" style='color: #0EA8DD;font-size: 20px'></i>";
        }
        if ($ext == ".zip" or $ext == '.rar') {
            $icon = "<i class=\"fa fa-file-zip-o\" style='color: #C8841D;font-size: 20px'></i>";
        }
        if ($ext == ".txt" or $ext == '.rtf') {
            $icon = "<i class=\"fa fa-file-text-o\" style='color: #7573AA;font-size: 20px'></i>";
        }
        if ($ext == ".mp3" or $ext == '.wav') {
            $icon = "<i class=\"fa fa-file-audio-o\" style='color: #8EA657;font-size: 20px'></i>";
        }
        if ($ext == ".mp4" or $ext == '.avi') {
            $icon = "<i class=\"fa fa-file-video-o\" style='color: #D30789;font-size: 20px'></i>";
        }
        return $icon;
    }

    static function sendOneSignalNotification($playerIds = [], $message)
    {
        $content = array(
            "en" => $message,
        );
        $fields = array(
            'app_id' => env('ONESIGNAL_APP_ID'),
            'include_player_ids' => $playerIds,
            'data' => array("foo" => "bar"),
            'contents' => $content,
        );
        $fields = json_encode($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    static function getAttribute($obj){
        return implode($obj->toArray());
    }

}


?>