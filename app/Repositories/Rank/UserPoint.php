<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 31/08/2017
 * Time: 10:30 PM
 */

namespace App\Repositories\Rank;




use App\Models\Point;
use App\Models\Rank;
use App\Models\User;

class UserPoint {

    public static function addPoint($value, $description,$user_id, $given_by = 1)
    {
        $point = new Point();
        $point->value       = $value;
        $point->description = $description;
        $point->given_by    = $given_by;
        $point->user_id     = $user_id;
        $point->save();

        return true;
    }

    public static function deductPoint($value, $description, $user_id, $given_by = 1)
    {
        $point = new Point();
        $point->value       = $value * -1;
        $point->description = $description;
        $point->given_by    = $given_by;
        $point->user_id     = $user_id;
        $point->save();

        return true;
    }

    public static function getUserPoint($user_id)
    {
        return Point::where('user_id', $user_id)->sum('value');
    }

    public static function addDailyPoint(){
        //TODO: check if the user has had a point today ...
        //TODO:if not call $this->addPoint value 1,
        return true;
    }
    public static function profileSetPoint($user_id)
    {
        $user = User::find($user_id);
        if ($user->profile_set == 1){
            return false;
        }

        $point = new Point();
        $point->value       = 3;
        $point->description = "Initial profile set";
        $point->given_by    = 1;
        $point->user_id     = $user_id;
        $point->save();

        $user->profile_set = 1;
        $user->save();

        return true;
    }

    public static function getUserRank($user_id)
    {
        $point = Point::where('user_id', $user_id)->sum('value');
        $rank  = Rank::where('points','<=',$point)->orderBy('id', 'desc')->first();

        return isset($rank->name) ? $rank->name: 'Cadet';
    }

}