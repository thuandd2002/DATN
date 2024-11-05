<?php

namespace Modules\Admin\Models\Guest;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Guest extends Authenticatable
{
    protected $fillable = ['g_email','g_name','g_phone','g_address',''];
}
