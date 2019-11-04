<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PromotionPartner extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'type', 'price','start_date',
        'cat_id','end_date','reference_website','short_description',
        'discount_amount','category_id'
    ];
    public function product_images()
    {
        return $this->hasMany('App\Models\PromotionImage','promotinos_id');
    }
    protected $dates = ['deleted_at'];
}
