<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'pro_id','pro_image'
    ];

    protected $dates = ['deleted_at'];
}
