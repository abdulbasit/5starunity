<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class RolePermission extends Model
{
    // use SoftDeletes;
    protected $fillable = [
        'permission_id','role_id','add','edit','delete','view','list'
    ];
    public function permissions()
    {
        return $this->belongsTo('App\Models\Permission');
    }
    // protected $dates = ['deleted_at'];
}
