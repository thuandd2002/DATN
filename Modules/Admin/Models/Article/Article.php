<?php

namespace Modules\Admin\Models\Article;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Keyword\Keyword;
use Modules\Admin\Models\Menu\Menu;

class Article extends Model
{
    protected $fillable = ['id','a_title','a_slug','a_menu_id','a_description','a_avatar',
        'a_content','a_admin_id','a_auth_id','a_view','a_active','a_hot','a_point_rating','a_total_ratings',
        'a_title_seo','a_keyword_seo','a_description_seo'
    ];

    const ACTIVE = 1;

    public $timestamps = true;

    public function keyword()
    {
        return $this->belongsToMany(Keyword::class,'article_keywords','ak_article_id','ak_keyword_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class,'a_menu_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'a_admin_id');
    }

    public static function query()
    {
        return Article::where('a_active',Article::ACTIVE);
    }
}
