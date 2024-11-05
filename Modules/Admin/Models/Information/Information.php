<?php

namespace Modules\Admin\Models\Information;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected  $table = 'informations';
    protected $fillable = ['if_company','if_phone','if_fax','if_address','if_email','if_seo','if_social',
        'if_time_job','if_logo','if_facebook','if_google','if_youtobe','if_email_send','if_email_password',
        'if_email_drive','if_email_host','if_email_port','if_google_map','if_meta_title','if_meta_keywords','if_meta_description'
    ];

    const INDEX_FOLLOW      = 0;
    const NOINDEX_NOFOLLOW  = 1;
    const INDEX_NOFOLLOW    = 2;

    private $index = [
        0 => 'INDEX, FOLLOW',
        1 => 'NOINDEX, NOFOLLOW',
        2 => 'INDEX, NOFOLLOW',
    ];

    public function getTextIndexAttribute()
    {
        return array_get($this->index,$this->if_seo,'N\A');
    }
}
