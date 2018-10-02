<?php

namespace App\Repositories\Email;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class OrderMail {
    /*
     * This is the email the buyer gets when they place an order
     */

    public static function buyerMail($sellerId, array $data = [])
    {
        $data['email'] = Auth::user()->email;
        $data['seller'] = User::find($sellerId);
        Mail::send('email.orderBuyer', $data, function($m) use ($data) {
            $m->from(env('CONTACT_FROM_EMAIL'), env('SITE_NAME'));
            $m->to($data['email'])
                ->subject('About your Order');
        });

        return true;
    }
    /*
     * This is an email get by the seller when a buyer placed an order.
     */

    public static function sellerMail($sellerId, array $data = [])
    {
        $data['seller'] = User::find($sellerId);
        $data['email']  = $data['seller']->email;
        $data['buyer']  = Auth::user();
        Mail::send('email.orderSeller', $data, function($m) use ($data) {
            $m->from(env('CONTACT_FROM_EMAIL'), env('SITE_NAME'));
            $m->to($data['email'])
                ->subject('Order from a buyer');
        });

        return true;
    }

    /*
     * This is an email the buyer get when the seller dispatch
     * an order
     */
    public static function orderDispatchEmail(array $data =[])
    {
        $data['email'] = 'motolola@icloud.com';
        Mail::send('email.orderDispatch', $data, function($m) use ($data) {
            $m->from(env('CONTACT_FROM_EMAIL'), env('SITE_NAME'));
            $m->to($data['email'])
                ->subject('Order Dispatched');
        });

        return true;
    }
    /*
     * This is an email a buyer get when an Order is cancelled
     */
    public static function orderCancelEmail(array $data =[])
    {
        $data['email'] = 'motolola@icloud.com';
        Mail::send('email.orderCancel', $data, function($m) use ($data) {
            $m->from(env('CONTACT_FROM_EMAIL'), env('SITE_NAME'));
            $m->to($data['email'])
                ->subject('Order Cancelled');
        });

        return true;
    }

}