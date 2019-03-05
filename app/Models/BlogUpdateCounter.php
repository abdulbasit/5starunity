<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BlogUpdateCounter extends Model
{
    protected $fillable = [
        'blog_id'
    ];
    public function blog()
    {
        return $this->belongsTo('App\Models\BlogCounter','blog_id');
    }



}
