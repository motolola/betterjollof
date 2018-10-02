<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';



    /**
     * Get the regions for a country.
     */
    public function regions()
    {
        return $this->hasMany('App\Models\Region', 'country_id');
    }
}
