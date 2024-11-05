<?php

namespace Modules\Admin\Models\Permission;

use Modules\Admin\Models\Role\Role;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    public $timestamps = true;
    public function role()
    {
        return $this->belongsToMany(Role::class,'permission_role','role_id','permission_id');
    }
}
