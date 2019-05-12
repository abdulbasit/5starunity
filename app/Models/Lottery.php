<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Lottery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','description','pro_id','lot_amount','min_lot_amount',
        'max_lot_amount','start_date','end_date','one_lot_amount','factor_amount','total_lots'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','pro_id');
    }
    public function lottery_contestent()
    {
        return $this->hasMany('App\Models\LotteryContestent','lottery_id');
    }
    public function getTotalLotsAttribute($id)
    {
        return $count = LotteryContestent::where('lottery_id',  $id)->count();

    }
    public function getTotalContestentsAttribute($id)
    {
        return $count = LotteryContestent::where('lottery_id',  $id)->groupBy('user_id')->count();
    }
    protected $dates = ['deleted_at'];

}
