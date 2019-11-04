<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PromotionImage extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'promotinos_id', 'image'
    ];

    // public function promotions()
    // {
    //     return $this->belongsTo('App\Models\PromotinoPartner','promotinos_id');
    // }

    // public function pro_classification()
    // {
    //     return $this->belongsTo('App\Models\ProClassification');
    // }

    protected $dates = ['deleted_at'];
}
