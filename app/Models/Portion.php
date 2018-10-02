<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'portions';

    /**
     * Get the user that owns the food.
     */
    public function food()
    {
        return $this->belongsTo('App\Models\Food');
    }
}
