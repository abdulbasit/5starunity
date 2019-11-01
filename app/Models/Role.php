<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Stripe\Error\Permission;
class Role extends Model
{
    protected $table = 'admin_roles';
    use SoftDeletes;
    protected $fillable = [
        'name', 'slug'
    ];
    // public function product_images()
    // {
    //     return $this->hasMany('App\Models\Product_images','pro_id');
    // }

    // public function pro_classification()
    // {
    //     return $this->belongsTo('App\Models\ProClassification');
    // }
    public function permissions()
    {
        return $this->hasMany(RolePermission::class);
    }
    protected $dates = ['deleted_at'];
}
