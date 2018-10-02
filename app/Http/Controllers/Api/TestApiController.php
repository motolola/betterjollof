<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 28/08/2017
 * Time: 3:33 PM
 */

namespace App\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Support\Facades\Request;

class TestApiController extends ApiController {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function testApi($id){

        $user = User::find($id);

        return response()->json($user, 200);

    }
    public function test()
    {
        return response()->json(User::all(), 200);
    }

}