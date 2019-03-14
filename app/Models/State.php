<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class State extends Authenticatable
{
    protected $guard = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
