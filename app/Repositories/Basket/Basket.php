<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 22/08/2017
 * Time: 6:38 PM
 */

namespace App\Repositories\Basket;

use App\Models\Portion;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Session;


class Basket {


    private $key = "basket_key";
    public function createOrder()
    {
        session([$this->key => []]);
        return true;
    }

    public function isOrderCreated(Request $request)
    {
        if (new Session()) {
            return true;
        }
        return false;
    }

    public function addTo($portionId, $unit)
    {

    }

    public function removeFromOrder($portionId)
    {

    }

    /*
     * return an array list of PortionId and units by the user
     */
    public function getOrder()
    {

    }

    public function destroyOrder()
    {

    }

    /*
     * use the orderId arrays to build a list
     * @param null
     * @return array..
     */
    public function buildBasketContent()
    {
        $orders = $this->getOrder();
        $basketArray = [];

        foreach($orders as $order){
            $portionId = $order['portionId'];
            $portion = Portion::where('id',$portionId)->get();
            $basketArray[] = [['portion'=>$portion], ['units'=> $order['unit']]];
        }
        return $basketArray;
    }

}