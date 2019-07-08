<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserDocument extends Authenticatable
{
    use SoftDeletes;
    // protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'res_proof', 'identity_doc', 'status','notes','type','id_front','id_back'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    protected $dates = ['deleted_at'];
}
