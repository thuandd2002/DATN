<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session\Store;
use Modules\Admin\Models\Information\Information;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\Product;

class FrontendController extends Controller
{
    public function __construct()
    {
        // lấy thông tin website
        $information =  \Cache::store('file')->remember('informations', 600, function (){
            return  Information::first();
        });

        \View::share('information', $information);

        // lấy danh sách menu đã sắp xếp
        $menus =  \Cache::store('file')->remember('menu', 600, function (){
            return  (new  Menu())->getListMenuSort();
        });

        \View::share('menus', $menus);

        //menu san pham

        $menuProduct =  \Cache::store('file')->remember('menuProduct', 600, function (){
            return  (new  Menu())->menuProduct();
        });

        \View::share('menuProduct', $menuProduct);


        // lấy randome danh sách menu
        $menusRan =  \Cache::store('file')->remember('menuRan', 600, function (){
            return  (new  Menu())->getListRanMenu();
        });

        \View::share('menusRan', $menusRan);


        // lay danh sach san pham
        $productAll = \Cache::store('file')->remember('productAll',600, function (){
            return Product::where('pro_active',Product::PRO_ACTIVE)->select('id','pro_name')->get();
        });

        \View::share('productAll',$productAll);


        // lấy google analytics
        $analytics =  \Cache::store('file')->remember('stores.analytics', 6000, function (){
            return  \DB::table('stores')->where('s_type',0)->first();
        });

        \View::share('analytics',$analytics);
    }

}
