<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 08/10/2017
 * Time: 1:35 PM
 */

namespace App\Services;

use App\Models\Country;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;


class UserLocationByIp {

    private $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    private function main()
    {
        try {
            $client = new Client([
                'base_uri' =>url('/'),
            ]);
            $result = $client->request('GET', 'https://usercountry.com/v1.0/json/'.$this->request->ip());
            return $result->getBody()->getContents();
        } catch (ClientException $e){
            //send admin an email with error ...
            return false;
        }

    }

    public function getCountry()
    {
        $result = \GuzzleHttp\json_decode($this->main());
        return (array)$result->country;
    }
    public function getCountryName()
    {
        return $this->getCountry()['name'];
    }
    public function getCountryCode()
    {
        return $this->getCountry()['alpha-2'];
    }
    /*
     * return Country ID from Country Table...
     */
    public function getCountryId()
    {
        return Country::where('code', 'like', '%'.$this->getCountryCode().'%')
            ->pluck('id')
            ->first();
    }
    public function getCurrency()
    {
        $result = \GuzzleHttp\json_decode($this->main());
        return (array)$result->currency;
    }
    public function getCurrencySymbol()
    {
        return $this->getCurrency()['symbol'];
    }
    public function getCurrencyCode()
    {
        return $this->getCurrency()['code'];
    }
    public function getCurrencyName()
    {
        return $this->getCurrency()['name'];
    }
    public function getRegion()
    {
        $result = \GuzzleHttp\json_decode($this->main());
        return (array)$result->region;
    }
    public function getTimezone()
    {
        $result = \GuzzleHttp\json_decode($this->main());
        return (array)$result->timezone;
    }

    public function updateCountry()
    {
        $country = Country::find($this->getCountryId());

        if ($country->currency_code == null) {
            $country->currency_symbol = $this->getCurrencySymbol();
            $country->currency_code = $this->getCurrencyCode();
            $country->currency_name = $this->getCurrencyName();
            $country->save();
        }
        return $country;
    }

}