<?php

namespace App\Helpers;

use Mail;

class MailSender
{
    public static function sendMail($toMail, $subject, $body)
    {
        $data = array('name' => 'Fakhruddin Tahery', 'email' => $toMail, 'subject' => $subject, 'body' => $body);
        Mail::send([], $data, function ($message) use ($data) {
            $message->to($data['email'])->subject($data['subject']);
            $message->from('fakhriwild@gmail.com', 'Fakhruddin Tahery');
        });
    }
}
