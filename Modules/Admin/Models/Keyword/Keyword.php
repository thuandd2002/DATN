<?php

namespace Modules\Admin\Models\Keyword;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['k_name','k_name_slug','k_hit'];
    public $timestamps  = true;
}
