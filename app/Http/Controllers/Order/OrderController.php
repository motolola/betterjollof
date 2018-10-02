<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 19/08/2017
 * Time: 3:54 PM
 */

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\BasketPortion;
use App\Models\Order;
use App\Models\Portion;
use App\Repositories\Email\OrderMail;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    private $authUser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToOrder(Request $request)
    {
        $basketId = $this->createBasket();

        for ($i = 0; $i < count($request->portion); $i++)
        {
            if ($request->portion[$i] != null && $request->unit[$i] != null){

                $basketPortion             = new BasketPortion();
                $basketPortion->basket_id  = $basketId;
                $basketPortion->portion_id = $request->portion[$i];
                $basketPortion->unit       = $request->unit[$i];
                $basketPortion->save();
            }
        }

        Flash("Food portion(s) added to basket", "success");
        return redirect(url('order/basket'));
    }

    private function createBasket()
    {
        if ($this->checkBasket() === false){
            $basket          = new Basket();
            $basket->user_id = Auth::user()->id;
            $basket->save();

            return $basket->id;
        }
        return $this->checkBasket();
    }

    private function checkBasket()
    {
        $basket = Basket::where(['user_id'=> Auth::user()->id, 'status' =>'open'])->first();
        if (count($basket) > 0 ){
            return $basket->id;
        }
        return false;
    }

    public function removeFromBasket(Request $request)
    {
        //TODO: Validation for post request ...
        $portion = BasketPortion::where([
            'portion_id' => $request->id,
            'basket_id' => $request->basket_id])
            ->get();
        $portion->delete();

        //TODO: flash ...
        return redirect(url('order/basket'));
    }


    public function basketPage()
    {
        $data = $this->getBasketContents();
        return view('order.basket', $data);
    }

    private function getBasketContents()
    {
        $basketId = $this->createBasket();
        $data['basket'] = [];
        $this->mergeBasketPortions($basketId);

        if ($basketId !== false){

            $result = BasketPortion::where('basket_id', $basketId)->get();

            foreach($result as $res){

                $portion  = Portion::find($res->portion_id);
                $portion->unit = $res->unit;
                $portion->basket_id = $basketId;

                $data['basket'][] = $portion;
                //TODO merge similar portion, add units ...
            }
        }

        return $data;
    }
    /*
     * This merges similar portions with different unit in the same basket
     */
    private function mergeBasketPortions($basket_id)
    {
        $basketPortion    = collect(BasketPortion::where('basket_id', $basket_id)->get());
        $portionIds       = $basketPortion->pluck('portion_id');
        $uniquePortionIds = $portionIds->unique();

        foreach($uniquePortionIds as $key => $id)
        {
            $checkCount = collect(BasketPortion::where(
                ['portion_id'=> $id, 'basket_id'=> $basket_id])->get());

            $unitTotal                = $checkCount->sum('unit');
            $firstBasketPortion       = $checkCount->first();
            $firstBasketPortion->unit = $unitTotal;
            $firstBasketPortion->save();

            for ($i = 0; $i < $checkCount->count(); $i++){
                if ($i > 0){
                    $checkCount[$i]->destroy($checkCount[$i]->id);
                }
            }
        }

        return true;
    }

    public function makeOrder(Request $request)
    {
        $basketContents = $this->getBasketContents();
        $basketId = $basketContents['basket'][0]->basket_id;
        $order            = new Order();
        $order->user_id   = Auth::user()->id;
        $order->basket_id = $basketId;
        $order->vendor_id = $request->vendor_id;
        $order->message   = $request->message;
        $order->save();

        $basketObj = Basket::find($basketId);
        $basketObj->status = "closed";
        $basketObj->save();

        OrderMail::buyerMail($request->vendor_id);
        OrderMail::sellerMail($request->vendor_id);

        Flash("You have successfully made an order", "success");

        return redirect(url('profile'));
    }

    private function buyerEmail()
    {

    }

    private function sellerEmail()
    {

    }

    public function editUnit(Request $request)
    {
        $basketId            = $request->basket_id;
        $portionId           = $request->portion_id;
        $basketPortion       = BasketPortion::where(
            ['basket_id' =>$basketId,
            'portion_id' => $portionId])
            ->first();
        $basketPortion->unit = $request->bas_unit;
        $basketPortion->save();

        return redirect(url('order/basket'));
    }

    /*
     * This loads the page
     * where vendors can view lists of the orders
     * @returns view
     */
    public function receivedOrder()
    {
        $data['orders_received'] = Order::where('vendor_id', Auth::user()->id)
            ->where('status', 'Open')
            ->orderBy('created_at','desc')->get();
        return view('order.list', $data);
    }

    public function receivedOrderDetails($orderId)
    {
        //Make sure the order is for the seller ...
        $data['order'] = Order::find($orderId);
        if ($data['order']->vendor_id !== Auth::user()->id){
            //TODO Flash "This resource doesn't belong to your account"
            return redirect('profile');
        }
        $basketId = $data['order']->basket->id;

        if ($basketId !== null){

            $result = BasketPortion::where('basket_id', $basketId)->get();

            foreach($result as $res){

                $portion  = Portion::find($res->portion_id);
                $portion->unit = $res->unit;
                $portion->basket_id = $basketId;

                $data['order_contents'][] = $portion;
            }
        }

        return view('order.vendor_order_details', $data);
    }

    public function receivedOrderHistory()
    {
        $data['orders_received'] = Order::where('vendor_id', Auth::user()->id)
            ->where('status', '!=', 'Open')
            ->orderBy('created_at','desc')
            ->get();
        return view('order.history-list', $data);
    }


}