<?php
namespace App\Helpers;

class Notification
{

    public static function sendNotificationToMultipleUser($playerIds, $message_en, $message_ar)
    {
        $content = array(
            "en" => $message_en,
            "ar" => $message_ar,
        );

        $fields = array(
            'app_id' => env('ONE_SIGNAL_APP_ID', ''),
            'include_player_ids' => $playerIds == null ? [] : $playerIds,
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
        //return $response;
    }

    public static function sendNotificationBasedOnSegments($segmentName = [], $message)
    {
        $content = array(
            "en" => $message,
        );

        $fields = array(
            'app_id' => env('ONE_SIGNAL_APP_ID', ''),
            'included_segments' => $segmentName,
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
    }
}
