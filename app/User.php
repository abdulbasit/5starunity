<?php

namespace App;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\RolePermission;
class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','status','verification','middle_name','last_name','reset_password_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function userProfile()
    {
        return $this->belongsTo('App\Models\UserProfile','id');
    }
    public function userDocument()
    {
        return $this->belongsTo('App\Models\UserDocument','id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function getPermission($class_name)
    {
        if(!$this->role)
        return new RolePermission;
         return $permissionsModel = $this->role->permissions()->
                         leftJoin('permissions','permissions.id','=','role_permissions.permission_id')->
                         where('permissions.class',$class_name)
                         ->select("role_permissions.*")
                         ->first();
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];
}
