<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'image', 'detail','title'
    ];


    protected $dates = ['deleted_at'];
}
