<?php

namespace App\Http\Controllers\General;

use App\Models\City;
use App\Models\Food;
use App\Models\Region;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use AnthonyMartin\GeoLocation\GeoLocation as GeoLocation;

class UtilityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regions(Request $request)
    {
        $regions = collect(Region::where('country_id', $request->id)->get());
        $regions = $regions->sortBy('name');

        $result = "<option value='"."'>Please select</option>";
        foreach($regions as $region) {
            if ($region->name !== ""){
                $result .= "<option value='"
                    . $region->id . "'>"
                    . $region->name
                    . "</option>";
            }
        }
        echo $result;
    }

    public function cities(Request $request)
    {
        $cities = collect(City::where('region_id', $request->id)->get());
        $cities = $cities->sortBy('name');

        $result = "<option value='"."'>Please select</option>";
        foreach($cities as $city) {
            if ($city->name !== ""){
                $result .= "<option value=' "
                    . $city->id . " '>"
                    . $city->name
                    . "</option>";
            }
        }
        echo $result;
    }

    public function loadCurrency()
    {
        $countries = [
            'Nigeria',
            'Ghana',
            'Brazil',
            'Britain',
            'United States'
        ];

        foreach($countries as $country)
        {
            $currency = Currency::where('country', 'like', '%'.$country.'%')->first();
            $country  = Country::where('name', 'like', '%'.$country.'%')->first();
            //dd(DB::getQueryLog());

            $country->currency_name   = $currency->currency;
            $country->currency_symbol = $currency->symbol;
            $country->currency_code   = $currency->code;

            $country->save();
        }

        echo "Loaded!";
    }
    public function testGeo()
    {
        // Set locations
        $edison_nj = GeoLocation::fromDegrees(40.5187154, -74.4120953);
        $brooklyn_ny = GeoLocation::fromDegrees(40.65, -73.95);

        echo "Distance from Edison, NJ to Brookyln, NY: " .
            $edison_nj->distanceTo($brooklyn_ny, 'miles') . " miles \n";

        # Distance from Edison, NJ to Brookyln, NY: 25.888611494606 miles


        echo "Distance from Edison, NJ to Brooklyn, NY: " .
            $edison_nj->distanceTo($brooklyn_ny, 'kilometers') . " kilometers \n";

        # Distance from Edison, NJ to Brooklyn, NY: 41.663681581973 kilometers

    }
    public function testFood(Food $food)
    {
        return json_encode($food);
    }
}
