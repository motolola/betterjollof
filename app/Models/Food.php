<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food';
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id'
    ];

    /**
     * Get the portion for a food.
     */
    public function portions()
    {
        return $this->hasMany('App\Models\Portion', 'food_id');
    }

    /**
     * Get the user that owns the food.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
