<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class DiscountCuppon extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category', 'description', 'type', 'price','start_date','end_date','usage','reference_website','cuppon_code'
    ];
    
    protected $dates = ['deleted_at'];
    
}