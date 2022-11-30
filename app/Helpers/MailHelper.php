<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class MailHelper
{

    /**
     * send view mail
     *
     * @param string $data
     * @param string $to
     * @param string $view
     * @param string $subject
     * @return string
     */
    public static function sendViewMail($data, $to, $view, $subject = 'Email Verification Mail')
    {
        if (env('ALLOW_SEND_MAIL')) {
            Mail::send($view, ['data' => $data], function ($message) use ($to, $subject) {
                $message->to($to);
                $message->subject($subject);
            });
            $response = 'success';
            if( count(Mail::failures()) > 0 ){
                return $response = 'fail';
            }
            return $response;
        }
    }

}
