<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Product;

class Comment extends Model
{
    const TYPE_PRODUCT = 1;
    const TYPE_POST    = 2;

    const TYPE_USER = 0;
    const TYPE_ADMIN = 1;

    protected $table = 'comments';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'com_user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'com_source_id','id');
    }

    public function subComments()
    {
        return $this->hasMany(self::class, 'com_parent_id');
    }
}
