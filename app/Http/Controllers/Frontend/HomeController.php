<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use MetaSeo\Controllers\MetaSeoController;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Menu\Menu;
use Modules\Admin\Models\Slide\Slide;
use Modules\Admin\Models\Information\Information;
use Modules\Product\Models\Product;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // lấy sản phẩm đc active trang chủ
        // $productHome = Product::with('images')
        // ->where('pro_type',1)
        //     ->where('pro_active', 1)
        //     ->limit(8)
        //     ->orderBy('id','DESC')
        //     ->select('id','pro_name','pro_menu_id','pro_active','pro_avatar','pro_price','pro_slug')
        //     ->get();

          
            $productHome = DB::table('orders')
            ->select('products.id','products.pro_name','products.pro_menu_id','products.pro_active','products.pro_avatar','products.pro_price','products.pro_slug','products.numbers_of_cars_left',DB::raw('count(orders.o_product_id) as product_count'))
            ->where('orders.o_status', '=',5)
            ->where('products.pro_active', 1)
            ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
            ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
            ->groupBy('orders.o_product_id')
            ->orderBy('product_count', 'DESC')->get();


        // lấy sản phẩm mới nhất vào trang chủ
        $productNew = Product::with('images')
            ->where('pro_active', 1)
            ->where('pro_type',1)
            ->orderBy('id','DESC') ->get();
        // lấy sản phẩm có lượt xem cao nhất
        $productView = Product::with('images')
            ->where('pro_active', 1)
            ->orderBy('pro_view','DESC')->get();
//        dd( $productView);
        //menu sản phẩm được hiển thị ở trang chủ
        $productMenu = Menu::with([
            'product' => function($product)
            {
                $product->with('images')
                    ->select('id','pro_name','pro_menu_id','pro_active','pro_avatar','pro_price','pro_slug')->where('pro_active',1);
            }
        ])->where([
            'm_type'  => Menu::TYPE_PRODUCT,
            'm_hot'   => 1
        ])->select('id','m_title')->get();

        //lay danhs sach slide
        $slides =  \Cache::store('file')->remember('slides', 600, function (){
            return  Slide::all();
        });


        //bai viet moi nhat
        $articleNews = Article::with([
            'admin' => function($admin){
                $admin->select('id','name');
            }
        ])->where('a_active',1)
            ->select('a_title','a_avatar','a_description','created_at','a_admin_id','id')
            ->limit(6)
            ->get();

        $information =  \Cache::store('file')->remember('informations', 600, function (){
            return  Information::first();
        });

        $options = [
            'meta_title'      => isset($information->if_meta_title)       ? $information->if_meta_title : '21',
            'meta_keywords' => isset($information->if_meta_keywords)    ? $information->if_meta_keywords : '',
            'meta_desciption'   => isset($information->if_meta_description) ? $information->if_meta_description : '',
            'meta_image'      => isset($information->if_social) ? ( $information->if_social) : ''
        ];

        $metaSeo = MetaSeoController::MetaSeo($options);

        $viewData = [
            'productHome' => $productHome,
            'productMenu' => $productMenu,
            'productView' => $productView,
            'productNews' => $productNew,
            'slides'      => $slides,
            'articleNews' => $articleNews,
            'metaSeo'     => $metaSeo
        ];

        return view('oto.home',$viewData);
    }
}
