<?php

namespace Modules\Admin\Models\Menu;


use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Attribute\Attribute;
use Modules\Product\Models\Product;


class Menu extends Model
{
    const M_ACTIVE = 1;
    protected $table = 'menus';
    protected $fillable = ['m_title','m_slug','m_parent_id','m_active','m_hot','m_avatar',
        'm_banner','m_title_seo','m_type_seo','m_keyword_seo','m_type_count','m_description_seo','m_description','m_type','m_sort'
    ];

    const TYPE_POST    = 1;
    const TYPE_PRODUCT = 2;
    const TYPE_ABOUT   = 3;
    const TYPE_JOB     = 4;

    const TYPE_COUNT       = 1;
    const TYPE_COUNT_ALL   = 0;

    private $typeCount = [
        0 => 'Nhiều sản phẩm',
        1 => '1 Sản phẩm'
    ];

    private $typeTextArr = [
        1  => 'Bài viết',
        2  => 'Sản phẩm',
        3  => 'Giới thiệu',
        5  => 'Liên hệ',
        4  => 'Tuyển dụng'
    ];

    private $typeTextArrStatus = [
        1  => 'Hiển Thị ',
        2  => 'Không hiển thị',
    ];

    public function getTypeTextAttribute()
    {   
        return array_get($this->typeTextArr, $this->m_type,'N\A');
    }

    public function getTypeTextAttributeStatus()
    {
        return array_get($this->typeTextArrStatus, $this->m_active,'N\A');
    }

    public function getTypeCountAttribute()
    {
        return array_get($this->typeCount, $this->m_type_count,'N\A');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'pro_menu_id');
    }

    public function attribute()
    {
        return $this->hasMany(Attribute::class ,'atr_menu_id');
    }

    public static function recursive($listMenu ,$parents = 0 ,$level = 1 ,&$listMenuSort)
    {
        if(count($listMenu) > 0 )
        {
            foreach ($listMenu as $key => $value) {

                if($value->m_parent_id  == $parents)
                {
                    $value->level = $level;
                    $listMenuSort[] = $value;
                    unset($listMenu[$key]);
                    $newparents = $value->id;

                    self::recursive($listMenu , $newparents ,$level + 1 , $listMenuSort);
                }
            }
        }
    }

    public function getListMenuSort()
    {
        $menus = Menu::where('m_active',1)->orderBy('m_sort','DESC')->select()->get();
        Menu::recursive($menus,$parent = 0,$level = 1,$menusSort);

        return $menusSort;
    }

    public function menuProduct()
    {
        $menu = Menu::where('m_active',1)->where('m_type',2)
                ->select('id','m_title','m_slug')->limit(6)->get();

        return $menu;
    }

    public function getListRanMenu()
    {
        return Menu::where('m_active',1)
                // ->where('m_hot','<>',1)
                ->where('m_parent_id',0)
                ->orderBy('m_sort','DESC')
                ->select('id','m_title')
                ->get();
    }
}
