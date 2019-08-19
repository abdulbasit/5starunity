<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class BonusTaler extends Authenticatable
{
    protected $fillable = [
        'user_id', 'credit', 'balance','total_available_balance','pre_balance'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    public static function bonusTalers($user_id) {
        echo $this->total_available_balance;
        // return $user_views = CompanyView::where('user_id',$user_id)
        //                     ->where('company_id',$company_id)
        //                     ->count();
    }
}