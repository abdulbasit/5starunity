<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class AllowedCountry extends Model
{
    protected $fillable = [
        'country_id','status'
    ];
    public function country()
    {
        return $this->belongsTo('App\Models\Country','country_id');
    }

}
