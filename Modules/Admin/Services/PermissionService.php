<?php

namespace Modules\Admin\Services;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Entrust\Role;


class PermissionService
{
    public $admin = null;
    public function __construct()
    {
    }

    private function getPermissions()
    {

        if ($this->admin === null)
        {
        
            $roles = Admin::findOrFail(Auth::user()->id)->roles->pluck('id')->toArray();

            $permissions = [];

            foreach($roles as $role)
                $permissions = array_merge( $permissions,Role::find($role)->perms()->pluck('name')->toArray());
            $this->admin = $permissions;
        }

        return $this->admin;
    }

    public function can($permissions)
    {
        $isTrue = true;
        if (is_array($permissions))
            foreach($permissions as $permission)
            {
                $isInArray = false;
                foreach (explode('|',$permission) as $perm)

                    if(in_array($perm,self::getPermissions())) $isInArray = true;
                if (!$isInArray) $isTrue = false;
            }
        else
            foreach (explode('|',$permissions) as $perm)
                if(in_array($perm,$this->getPermissions()))
                    return true;
        if ($isTrue)
            return true;
        else
            return false;
    }
}