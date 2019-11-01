<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RolePermission;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Permission extends Model
{
    // use SoftDeletes;
    // protected $fillable = [
    //     'page_name','page_content','page_title','page_slug'
    // ];

    // protected $dates = ['deleted_at'];
    public static function copyPermissions($id){
        $permissions = Permission::all();
        foreach($permissions as $permissionData)
        {
           RolePermission::create([
                "permission_id"=>$permissionData->id,
                "role_id"=>$id,
                "add"=>0,
                "edit"=>0,
                "delte"=>0,
                "view"=>0,
                "list"=>0
            ]);
        }
        return;
    }
}
