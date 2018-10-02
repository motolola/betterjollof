<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 28/08/2017
 * Time: 3:48 PM
 */

namespace App\Http\Controllers\General;


use App\Http\Controllers\Controller;

class AngularController extends Controller {

    public function page()
    {
        return view('angular.page');
    }

}