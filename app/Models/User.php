<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'surname',
        'email',
        'username',
        'password',
        'mobilephone',
        'businessphone',
        'facebook_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the country record associated with the user.
     */
    public function country()
    {
        return $this->hasOne('App\Models\Country', 'id','country_id');
    }
    /**
     * Get the region record associated with the user.
     */
    public function region()
    {
        return $this->hasOne('App\Models\Region', 'id','region_id');
    }
    /**
     * Get the city record associated with the user.
     */
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id','city_id');
    }
}
