<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LotteryContestent extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'lottery_id','user_id','lot_number','status'
    ];

    protected $dates = ['deleted_at'];
}
