<?php

namespace App\Policies;

use App\User;
use App\Modles\Lottery;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    private $class_name='Product';

    /**
     * Determine whether the user can view the lottery.
     *
     * @param  \App\User  $user
     * @param  \App\Lottery  $lottery
     * @return mixed
     */
    
    public function list($user,$user1)
    {
        $permissions=$user->getPermission($this->class_name);
        if($permissions->list==true )
        {
            return true;
        }
        return false;
    }
    public function add($user,$clients)
    {
        
        return $user->getPermission($this->class_name)->add;
    }
    public function edit($user,$clients)
    {
        $permissions=$user->getPermission($this->class_name);
        if($permissions->edit==true)
        {
            return true;
        }
        return false;
            
    }
    public function delete($user,$user1)
    {
        $permissions=$user->getPermission($this->class_name);
        if($permissions->delete==true)
        {
            return true;
        }
        return false;
    }
    
    public function belongs_to($user,$user1)
    {
        $permissions=$user->getPermission($this->class_name);
        if($permissions->belongs_to==true)
        {
            return true;
        }
        return false;
    }
    public function view($user,$user1)
    {
        $permissions=$user->getPermission($this->class_name,'edit');
        if($permissions->view)
        {
            return true;
        }
        return false;
    }
    public function all($user,$user1)
    {
        $permissions=$user->getPermission($this->class_name);
        if($permissions->all==true)
        {
            return true;
        }
        return false;
    }
}
