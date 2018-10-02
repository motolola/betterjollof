<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 28/07/2017
 * Time: 10:04 PM
 */

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Portion;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Currency;

class PortionController extends Controller {

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request, $foodId)
    {
        $portion              = new Portion();
        $portion->name        = $request->portionTitle;
        $portion->description = $request->description;
        $portion->price       = $request->portionPrice;
        $portion->currency    = $this->getCurrency(Auth::user()->id);
        $portion->food_id     = $foodId;
        $portion->save();

        $food = Food::find($foodId);

        flash($portion->name.
            ' been added to record to food',
            'Portion Added!', "success");

        return redirect(url('food/'.$food->slug));

    }
    public function update()
    {

    }
    public function deletePortion($id)
    {

        $portion = Portion::find($id);
        if (Auth::user()->id == $portion->food->user_id){
            $portion->delete();
            Flash("Portion ".$portion->name." has been deleted", "success");

            return redirect()->back();
        }

        Flash("You are not authorised to delete this resources", "warning");

        return redirect()->back();

    }
    private function getCurrency($id)
    {
        return '&#8358';
    }


}