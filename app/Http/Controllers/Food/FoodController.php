<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 27/07/2017
 * Time: 9:40 PM
 */

namespace App\Http\Controllers\Food;

use App\Models\FoodFavourite;
use App\Repositories\Food\FoodSearch;
use App\Repositories\Rank\UserPoint;
use App\Services\ImageMaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Portion;
use Illuminate\Support\Facades\Auth;
use App\Services\FoodSlug;
use App\Requests\AddFoodRequest;
use App\Requests\UpdateFoodRequest;


class FoodController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //phpinfo();
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Food $food)
    {
        $data['food']     = $food;
        $data['portions'] = Portion::where('food_id', $food->id)->get();
        $data['my_food']  = (isset(Auth::user()->id) && $food->user_id == Auth::user()->id)? true : false;
        $data['isFavourite'] = $this->foodIsFavourite($food->id);
        $data['more_food']   = $this->moreFoodByUser($food->user->id, $food->id);
        return view('food.food-page', $data);
    }

    private function moreFoodByUser($user_id, $food_id)
    {
        return Food::where('user_id', $user_id)
            ->where('id','!=', $food_id)
            ->limit(5)
            ->get();
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function foodList()
    {
        $data['food'] = Food::with('portions')->paginate(5);
        return view('food.food-list', $data);
    }

    public function add()
    {
        if (Auth::user()->country_id === null){
            flash('You must set your Country to be able to add food', 'danger');
            return redirect(url('profile-edit'));
        }
        return view('food.food-add');
    }

    public function addAction(AddFoodRequest $request)
    {
        $slug = new FoodSlug();
        $food              = new Food();
        $food->name        = $request->foodName;
        $food->description = $request->description;
        $food->user_id     = Auth::user()->id;
        $food->slug        = $slug->createSlug($request->foodName);
        $food->save();

        $photoName = $food->id.'.'.$request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('photos/food'), $photoName);

        ImageMaker::thumbFoodImage($photoName);

        $food->photo = $photoName;
        $food->save();

        UserPoint::addPoint(2, 'earned for adding '.$food->name, Auth::user()->id, 1 );
        flash($food->name.
            ' been added successfully, 2 points earned, and you can go ahead to add portions',
            'Food Added!', "success");

        return redirect(url('food/'.$food->slug));
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data['food'] = Food::findOrFail($id);
        return view('food.food-edit', $data);
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function editAction(UpdateFoodRequest $request, $id)
    {
        $food = Food::find($id);

        if ($food->user_id != Auth::user()->id){
            flash("This resources doesn't appear to be yours", "danger");
            return redirect(url('food/'.$food->slug));
        }
        $food->description = $request->description;
        $food->name        = $request->name;
        $food->save();

        if ($request->hasfile('picture')){
            $photoName = $food->id.'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('photos/food'), $photoName);
            $food->photo = $photoName;
            ImageMaker::thumbFoodImage($photoName);
            $food->save();
        }

        flash("Resource data updated", "success");
        return redirect(url('food/'.$food->slug));
    }

    public function searchFood(Request $request)
    {
        //TODO validation of search terms
        //todo get users country/location ....
        $terms        = str_replace(',','', $request->search_terms);
        $terms        = explode(' ', $terms);
        $foodIds      = FoodSearch::foodByTerms($terms);

        $data['food'] = Food::wherein('id', $foodIds)->paginate(10);

        return view('food.food-list', $data);
    }

    public function deleteFood(Request $request)
    {
        $food = Food::find($request->food_id);
        if (Auth::user()->id == $food->user_id){
            $portions = Portion::where('food_id', $food->id)->get();
            foreach($portions as $portion){
                $portion->delete();
            }
            $food->delete();
            UserPoint::addPoint(-2, 'loss from deleting '.$food->name, Auth::user()->id, 1 );

            flash("Food: ".$food->name." and attached portions deleted", "success");
            return redirect(url("profile"));
        }
        flash('Resource deletion not authorised', "danger");
        return redirect()->back();
    }

    public function favouriteFood($food_id)
    {
        if (!Auth::check()){
            Flash("You must be logged in to add food to favourite", "warning");
            return redirect()->back();
        }

        $favourite = new FoodFavourite();
        $favourite->user_id = Auth::user()->id;
        $favourite->food_id = $food_id;
        $favourite->save();

        return redirect()->back();
    }

    public function unFavouriteFood($food_id)
    {
        if (!Auth::check()){
            Flash("You must be logged in to remove food from favourite", "warning");
            redirect()->back();
        }
        $favourite = FoodFavourite::where(['user_id' => Auth::user()->id, 'food_id' => $food_id])->get();

        if (count($favourite) > 0){
            foreach($favourite as $fav){
                $fav->delete();
            }
        }
        return redirect()->back();
    }
    /*
     * This checks whether a user favourite a food
     * @params $food_id
     * @return boolean
     */
    private function foodIsFavourite($food_id)
    {
        if (Auth::check()){
            $favourite = FoodFavourite::where(['user_id' => Auth::user()->id, 'food_id' => $food_id])->get();

            if (count($favourite) > 0){
                return true;
            }
        }

        return false;
    }

}