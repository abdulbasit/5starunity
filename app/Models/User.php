<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable
{
    // use Notifiable;
    // protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role','email_verified_at',
    ];
    public function userProfile()
    {
        return $this->belongsTo('App\Models\UserProfile','id');
    }
    public function userDocument()
    {
        return $this->belongsTo('App\Models\UserDocument','id');
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
