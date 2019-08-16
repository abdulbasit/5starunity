<?php

namespace App\Models;

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
    
    protected $dates = ['deleted_at'];
}