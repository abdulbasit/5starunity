<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'pro_name', 'pro_detail', 'pro_status', 'pro_price',
    ];

    public function product_images()
    {
        return $this->belongsTo('App\Models\Product_images');
    }
    protected $dates = ['deleted_at'];
}
