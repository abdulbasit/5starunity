<?php

namespace App\Models;
use App\Models\CompnayView;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Authenticatable
{
    use SoftDeletes;
    // protected $casts = [
    //     'options' => 'array'
    // ];
    protected $fillable = [
        'company_name', 'company_views', 'company_views_attempt', 'duration','vidoe',
        'image','view_counter','views_amount','user_amount','category_id','options'
    ];
    
    public function promotionViwes($user_id,$company_id) 
    {
        $user_views = CompanyView::where('company_id',$company_id);
        if($user_id>0)
            $user_views = $user_views->where('user_id',$user_id);

        $user_views = $user_views->count();   
        return $user_views;
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