<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserDocument extends Authenticatable
{
    // protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'res_proof', 'identity_doc', 'status','notes','type'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
