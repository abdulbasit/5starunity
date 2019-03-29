<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BlogComment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','comment','user_id','status','helpfull','blog_id'
    ];
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }
    protected $dates = ['deleted_at'];

}
