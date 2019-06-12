<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'name', 'email', 'phone', 'betreff','msg'
    ];

}
