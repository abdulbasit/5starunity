<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Badge extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','badge_type'
    ];
   
    protected $dates = ['deleted_at'];

}
