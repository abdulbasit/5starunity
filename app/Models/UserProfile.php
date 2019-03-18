<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserProfile extends Authenticatable
{
    // protected $guard = 'admin';

    protected $fillable = [
        'user_id', 'dob', 'address', 'country','state',
        'city','postal_code','profile_picture','user_contact','street','house_number'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function country_name()
    {
        return $this->belongsTo('App\Models\Country','country');
    }
    public function state_name()
    {
        return $this->belongsTo('App\Models\State','state');
    }
}
