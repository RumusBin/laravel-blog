<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Models\Admin\Admin $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $this->checkAccess($admin, 4);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\Admin\Admin $admin

     * @return mixed
     */
    public function update(Admin $admin)
    {
        return $this->checkAccess($admin, 5);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\Admin\Admin $admin
     *
     * @return mixed
     */
    public function delete(Admin $admin)
    {
        return $this->checkAccess($admin, 6);

    }
    public function tags(Admin $admin)
    {
        return $this->checkAccess($admin, 11);
    }
    public function categories(Admin $admin)
    {
        return $this->checkAccess($admin, 12);
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
