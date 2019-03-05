<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','description','seo_title','seo_meta','seo_meta_des',
        'cat_id','post_img','status','allow_cooments','post_author','post_name','short_desc','tags'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product','pro_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\Admin','post_author');
    }
    protected $dates = ['deleted_at'];

}
