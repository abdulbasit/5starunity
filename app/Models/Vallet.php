<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Vallet extends Model
{
    // protected $guard = 'admin';

    protected $fillable = [
        'user_id', 'credit', 'balance','total_available_balance','pre_balance','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
