<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'pro_name', 'pro_detail', 'pro_status', 'pro_price','pro_class','cat_id'
    ];
    public function product_images()
    {
        return $this->hasMany('App\Models\Product_images','pro_id');
    }

    public function pro_classification()
    {
        return $this->belongsTo('App\Models\ProClassification');
    }

    protected $dates = ['deleted_at'];
}
