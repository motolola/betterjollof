<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * Get the regions for a country.
     */
    public function regions()
    {
        return $this->hasMany('App\Models\City', 'region_id');
    }
}
