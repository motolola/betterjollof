<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 19/08/2017
 * Time: 2:15 PM
 */

namespace App\Repositories\Food;

use App\Models\Portion;

class FoodOrder {

    private $cookieName = "o_basket";
    private $cookiValue = [];
    private $cookieTime = 604800;
    private $cookiePath = "/";

    //use session instead ..
    public function createOrder()
    {
        setcookie($this->cookieName,
            serialize($this->cookiValue),
            $this->cookieTime,
            $this->cookiePath
            );

        return true;
    }

    public function isOrderCreated()
    {
        if(isset($_COOKIE[$this->cookieName])){
            return true;
        }
        return false;
    }

    public function addTo($portionId, $unit)
    {
        if (!$this->isOrderCreated()){
            $this->createOrder();
            //dd(__LINE__);

        }
        $order = $this->getOrder();
        $order[] = [$portionId => ['portionId' => $portionId, 'units' => $unit]];
        setcookie($this->cookieName, serialize($order), $this->cookieTime, $this->cookiePath);

        return true;
    }

    public function removeFromOrder($portionId)
    {
        $order = $this->getOrder();
        unset($order[$portionId]);
        setcookie($this->cookieName, serialize($order), $this->cookieTime, $this->cookiePath );
        return false;
    }

    /*
     * return an array list of PortionId and units by the user
     */
    public function getOrder()
    {
        if (isset($_COOKIE[$this->cookieName])){
            return unserialize($_COOKIE[$this->cookieName]);
        }
        //echo $this->cookieName;
        //dd($_COOKIE);
        //dd(isset($_COOKIE[$this->cookieName]));
        return false;
    }

    public function destroyOrder()
    {
        setcookie($this->cookieName, '....', 1);
        return true;
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