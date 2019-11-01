<?php

namespace App\Models;
use App\Models\RolePermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function getPermission($class_name)
    {
        
        // if($this->is_super==1){
        //     $permission  = new RolePermission; 
        //     $permission->add = true;
        //     $permission->edit = true;
        //     $permission->view = true;
        //     $permission->delete = true;
        //     $permission->list = true;
        //      $permission->all = true;
        //     return $permission;
        // }
       if(!$this->role)
            return new RolePermission;
       
         return $permissionsModel = $this->role->permissions()->
                        leftJoin('permissions','permissions.id','=','role_permissions.permission_id')->
                        where('permissions.class',$class_name)
                        ->select("role_permissions.*")
                        ->first(); 
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];
}
