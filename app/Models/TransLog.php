<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TransLog extends Model
{
    protected $fillable = [
        'type', 'payment_method', 'amount','trans_id','state','invoice_number','vallet_id'
    ];


}
