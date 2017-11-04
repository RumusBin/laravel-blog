<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create admins.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $this->checkAccess($admin, 8);
    }

    /**
     * Determine whether the user can update the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->checkAccess($admin, 9);
    }

    /**
     * Determine whether the user can delete the admin.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        return $this->checkAccess($admin, 10);
    }

    public function checkAccess($admin, $permId)
    {
        foreach ($admin->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission->id == $permId){
                    return true;
                }
            }
        }
        return false;
    }
}
