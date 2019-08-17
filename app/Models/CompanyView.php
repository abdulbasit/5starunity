<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class CompanyView extends Authenticatable
{
    protected $fillable = [
        'user_id', 'company_id'
    ];
   
}