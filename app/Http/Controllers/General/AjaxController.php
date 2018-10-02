<?php

namespace app\Http\Controllers\General;


use App\Http\Controllers\Controller;
use App\Models\City;

class AjaxController extends Controller {

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

}