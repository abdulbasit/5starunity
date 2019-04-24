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
    public function wallet()
    {
        return $this->belongsTo('App\Models\Vallet','vallet_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    protected $dates = ['deleted_at'];
}
