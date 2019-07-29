<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'page_name','page_content','page_title','page_slug'
    ];

    protected $dates = ['deleted_at'];
}
