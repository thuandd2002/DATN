<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountSocial extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table    = 'account_social';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
