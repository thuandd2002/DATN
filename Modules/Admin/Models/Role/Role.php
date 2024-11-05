<?php

namespace Modules\Admin\Models\Role;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Permission\Permission;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [];

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id');
    }

    public function users(){
        return $this->hasMany(User::class);
    }
 
}
