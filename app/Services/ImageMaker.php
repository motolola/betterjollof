<?php
/**
 * Created by PhpStorm.
 * User: motolola
 * Date: 08/10/2017
 * Time: 10:01 PM
 */

namespace App\Services;
use Intervention\Image\Facades\Image;


class ImageMaker {

    public static function thumbUserImage($imageName)
    {
        Image::make(public_path('photos/user/'.$imageName))
            ->resize(300, 300)
            ->save(public_path('photos/user').'/'.'standard_'.$imageName);

        Image::make(public_path('photos/user/'.$imageName))
            ->resize(100, 100)
            ->save(public_path('photos/user').'/'.'thumbnail_'.$imageName);

        unlink(public_path('photos/user/'.$imageName));
        return true;
    }

    public static function thumbFoodImage($imageName)
    {
        Image::make(public_path('photos/food/'.$imageName))
            ->resize(300, 300)
            ->save(public_path('photos/food').'/'.'standard_'.$imageName);

        Image::make(public_path('photos/food/'.$imageName))
            ->resize(100, 100)
            ->save(public_path('photos/food').'/'.'thumbnail_'.$imageName);

        unlink(public_path('photos/food/'.$imageName));
        return true;
    }

}