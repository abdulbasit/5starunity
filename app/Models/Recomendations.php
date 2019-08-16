<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Recomendations extends Model
{
    protected $fillable = [
        'first_name', 'function', 'company_name', 'email','comments'
    ];
}