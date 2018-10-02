<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Email\OrderMail;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MessageController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['messages'] = $this->getMessages();
        return view('message.index', $data);
    }

    public function saveMessage(Request $request)
    {
        $msg          = new Message();
        $msg->to_id   = $request->to_id;
        $msg->from_id = Auth::user()->id;
        $msg->subject = $request->msg_subject;
        $msg->body    = $request->msg_body;
        $msg->save();

        flash('your message has been sent!', 'success');

        return redirect()->back();
    }

    public function deleteMessage(Request $request)
    {

    }

    public function getMessages()
    {
        $message = DB::table('messages')
            ->where('to_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $fromIds = $message->pluck('from_id')->unique();

        $messageItems = [];

        foreach($fromIds as $fromId){
            $messageItems[] = Message::where(
                ['from_id' => $fromId,
                    'to_id' => Auth::user()->id]
            )->orderBy('created_at', 'desc')->get();
        }

        return $messageItems;
    }

    public function getMessageBody(Request $request)
    {
        $data['messages'] = Message::where(['from_id'=> $request->from_id, 'to_id' => Auth::user()->id])
            ->orWhere(['from_id'=> Auth::user()->id, 'to_id' => $request->from_id])
                ->get();

        $data['from_id']   = $request->from_id;
        $data['msg_count'] = count($data['messages']);

        return view('message.message-body', $data);
    }

    public function replyMessage(Request $request)
    {
        $msg          = new Message();
        $msg->to_id   = $request->to_id;
        $msg->from_id = Auth::user()->id;
        $msg->subject = $request->msg_body;
        $msg->body    = $request->msg_body;
        $msg->save();

        $data['messages'] = Message::where(['to_id'=> $request->to_id, 'from_id' => Auth::user()->id])
            ->orWhere(['to_id'=> Auth::user()->id, 'from_id' => $request->to_id])
            ->get();

        $data['from_id'] = $request->to_id;
        $data['msg_count'] = count($data['messages']);

        return view('message.message-body', $data);

    }

    public function messageCount(Request $request)
    {
        $data['messages'] = Message::where(['from_id'=> $request->from_id, 'to_id' => Auth::user()->id])
            ->orWhere(['to_id'=> $request->from_id, 'from_id' => Auth::user()->id])
            ->get();

        echo count($data['messages']) == $request->count ? 0 : 1;
    }

    public function dispatchMessage(Request $request)
    {
        $msg          = new Message();
        $msg->to_id   = $request->to_id;
        $msg->from_id = Auth::user()->id;
        $msg->subject = "Dispatch message from ".Auth::user()->username;
        $msg->body    = $request->msg_body;
        $msg->save();

        $order = Order::find($request->order_id);
        $order->status = "Dispatched";
        $order->save();

        $data = [];//todo .. to populate email
        OrderMail::orderDispatchEmail($data);
        flash("Dispatched notice sent to customer.", "success");
        return redirect()->back();
    }

    public function cancelOrderMessage(Request $request)
    {
        $msg          = new Message();
        $msg->to_id   = $request->to_id;
        $msg->from_id = Auth::user()->id;
        $msg->subject = "Order cancelled by ".Auth::user()->username;
        $msg->body    = $request->msg_body;
        $msg->save();

        $order = Order::find($request->order_id);
        $order->status = "Cancelled";
        $order->save();

        $data = [];//todo ...to populate email
        OrderMail::orderCancelEmail($data);

        flash("Order cancelled, notice sent to customer", "success");
        return redirect()->back();
    }

}