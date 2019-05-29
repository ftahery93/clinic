<?php
namespace App\Helpers;

class Notification{

    public static function sendNotificationToMultipleUser($playerIds=[]){
        $content = array(
			"en" => 'English Message'
			);
		
		$fields = array(
			'app_id' => "b443cc37-d200-4831-9607-7766687f0e93",
			'include_player_ids' => $playerIds,
			'data' => array("foo" => "bar"),
			'contents' => $content
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
        curl_close($ch);
        //return $response;
	}
}