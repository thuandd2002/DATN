<?php

namespace Modules\Admin\Models\Keyword;

use Illuminate\Database\Eloquent\Model;

class KeywordLirary extends Model
{
    protected $fillable = ['kwl_name','kwl_slug','kwl_admin_id','created_at','updated_at','kwl_hit','kwl_active','kwl_count_word'];
    protected $table = 'keyword_librarys';

}
