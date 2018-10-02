<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 14/08/2017
 * Time: 8:00 PM
 */

namespace App\Repositories\Email;

use Illuminate\Support\Facades\Mail;


class RegistrationMail {

    public static function send($data)
    {
            Mail::send('email.registration', $data, function($m) use ($data) {
            $m->from(env('CONTACT_FROM_EMAIL'), env('SITE_NAME'));
            $m->to($data['email'])
                ->subject('Registration email');
        });
        return true;
    }

}