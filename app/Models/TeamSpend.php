<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class TeamSpend extends Authenticatable
{
    protected $fillable = [
        'sender_id','reciver_id','amount','created_at'
    ];
    public static function calculateDonation($user_id,$rec_id) {
        return TeamSpend::where('sender_id',$user_id)->where('reciver_id',$rec_id)->sum('amount');
    }
  
}
