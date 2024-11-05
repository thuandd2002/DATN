<?php

namespace Modules\Admin\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Models\Role\Role;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class Admin extends Authenticatable
{
	use EntrustUserTrait;

    protected $primaryKey = 'id';
    protected $table = 'admins';
    protected $fillable = ['name','email','address','age','phone','hard_salary'];

    public function role()
    {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id');
    }
}
