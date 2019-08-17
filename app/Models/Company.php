<?php

namespace App\Models;
use App\Models\CompnayView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Authenticatable
{
    use SoftDeletes;
    protected $fillable = [
        'company_name', 'company_views', 'company_views_attempt', 'duration','vidoe',
        'image','view_counter','views_amount','user_amount'
    ];
    
    public function someFunction($user_id) {
        return $user_views = CompanyView::where('user_id',$user_id)->count();
    }
    public function company_views()
    {
        return $this->belongsTo('App\Models\Company');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    protected $dates = ['deleted_at'];
}