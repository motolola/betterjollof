<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 15/08/2017
 * Time: 2:10 PM
 */

namespace App\Repositories\Food;

use App\Models\Food;
use App\Models\Portion;
use Torann\GeoIP\GeoIP;

class FoodSearch {

    public static function foodByTerms(array $terms)
    {
        $foodIds = [];
        foreach($terms as $term){
            $foodIds[] = Food::where('name', 'like', '%'.$term.'%')
                ->orWhere('description', 'like', '%'.$term.'%')->pluck('id');
        }

        foreach($terms as $term){
            $foodIds[] = Portion::where('name', 'like','%'.$term.'%')
                ->orWhere('description', 'like', '%'.$term.'%')->pluck('food_id');
        }

        $foodIds = collect($foodIds)->unique();
        foreach($foodIds as $key=>$id){
            if ($id->isEmpty()){
                unset($foodIds[$key]);
            }
        }
        return $foodIds->toArray()[0];
    }

}