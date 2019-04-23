<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LotteryContestent extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'lottery_id','user_id','lot_number','status','vallet_id'
    ];
    public function lottery()
    {
        return $this->belongsTo('App\Models\Lottery','lottery_id');
    }
    protected $dates = ['deleted_at'];
}
