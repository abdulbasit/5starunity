<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Vallet extends Model
{
    use SoftDeletes;
    // protected $guard = 'admin';
    protected $casts = [
        'options' => 'array'
    ];
    protected $fillable = [
        'user_id', 'credit', 'balance','total_available_balance','pre_balance','status','options','type'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    protected $dates = ['deleted_at'];
}
