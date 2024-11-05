<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Image\Image;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\AttributeValue\AttributeValue;
use Modules\Product\Models\Product\ProductImage;

class Product extends Model
{
    const PRO_ACTIVE = 1;
    const PRO_POSSION = 1; // sidebar bài viết
    const PRO_POSSION_2 = 2; // sidebar sản phẩm
    protected $table = 'products';
    protected $fillable = ['pro_name','pro_slug','id','pro_price','pro_menu_id','pro_type','pro_active','pro_description',
        'pro_content','pro_specifications','pro_title_seo','pro_keyword_seo','pro_description_seo','pro_avatar',
        'pro_view','pro_admin_id','pro_point_rating','pro_total_ratings','pro_year_output','pro_position','pro_source','pro_price_import','pro_price_repair'
    ];

    public $timestamps = true;

    private  $company = [
        1 => 'Mỹ',
        2 => 'Hàn Quốc',
        3 => 'Trong Nước',
        4 => 'Ngoài Nước'
    ];

    private $possion = [
        '0' => 'Mặc định',
        '1' => 'Sidebar bài viết',
        '2' => 'Sidebar sản phẩm'
    ];

    public function getCompany()
    {
        return array_get($this->company,$this->pro_source,'N\A');
    }

    public function getPossion()
    {
        return array_get($this->possion,$this->pro_position,'Mặc định');
    }

//    public function images()
//    {
//        return $this->belongsToMany(Image::class,'image_products','ip_product_id','ip_image_id');
//    }

    public function value()
    {
        return $this->belongsToMany( AttributeValue::class,'product_value','pv_product_id','pv_value_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class,'pro_menu_id','id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'pi_product_id');
    }

    public static  function query()
    {
        return Product::with([
            'images' => function(){

            },
            'menu' => function($menu){
                $menu->select('id','m_title');
            }
        ])->where('pro_active',Product::PRO_ACTIVE);
    }
}
