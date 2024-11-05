<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaSeo\Controllers\MetaSeoController;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductValue;

class MenuController extends FrontendController
{
    public function action(Request $request)
    {
        $id = get_parameter($request->segment(2));

        if ($id)
        {
            $type = Menu::where('id',$id)
                ->select('m_type','m_type_count','m_title','m_slug','m_type_seo','id','m_description','m_title_seo','m_keyword_seo','m_description_seo')
                ->first();


            switch ($type['m_type'])
            {
                case 1:
                    // bai viet

                    return $this->menuArticle($type);
                    break;

                case 2:
                    if ($type->m_type_count == 1)
                    {

                        $product = Product::where('pro_active',Product::PRO_ACTIVE)
                                ->where('pro_menu_id',$type->id)
                                ->select('id','pro_name')
                                ->first();

                        if ($product)
                        {
                            return redirect(\URL::action('Frontend\ProductController@getProducDetail',[str_slug_fix($product->pro_name),$product->id]));
                        }

                    }
                    return $this->menuProduct($type, $request);
                    break;

                case 5:
                    // liên hệ
                    return $this->menuContact($type);
                    return $this->about($type);
                    break;

                case 4:

                    // tuyen dung
                    break;
            }
        }
    }

    public function menuProduct($menu, $request)
    {
        $listMenu = [];

        $menus = Menu::where('m_parent_id', $menu['id'])->pluck('id');
        foreach ($menus as $item) {
            array_push($listMenu, $item);
            $childMenus = Menu::where('m_parent_id', $item)->pluck('id');

            if ($childMenus->count() > 0) {
                foreach ($childMenus as $child) {
                    array_push($listMenu, $child);
                }
            }
        }
        array_push($listMenu, $menu['id']);
        $products = Product::query()->with(['productVal'])->whereIn('pro_menu_id', $listMenu)
            ->when($request->origin,function ($query) use ($request){
                $query->whereHas('productVal',function ($q) use ($request){
                    $q->where('origin', $request->origin);
                });
            })
            ->when($request->year_of_manufacturing,function ($query) use ($request){
                $query->whereHas('productVal',function ($q) use ($request){
                    $q->where('year_of_manufacturing', $request->year_of_manufacturing);
                });
            });
        $products = $products->select('id','pro_name','pro_slug','pro_avatar','pro_price')
            ->paginate(9);

        $productsPossionHot = Product::query()->where('pro_position',Product::PRO_POSSION_2)
            ->select('id','pro_name','pro_avatar','pro_price')
            ->limit(4)
            ->get();
        $company = config('setting.company');


        $viewData = [
            'menu'               => $menu,
            'products'           => $products,
            'metaSeo'            => $this->renderMetaSeo($menu),
            'productsPossionHot' => $productsPossionHot,
            'company'  => $company
        ];
        return view('oto.product',$viewData);
    }

    public function menuContact($menu){
        $viewData = [
            'menu'     => $menu,
            'metaSeo'  => $this->renderMetaSeo($menu)
        ];
        return view('oto.contact',$viewData);
    }

    public function menuArticle($menu)
    {
        $articles = Article::query()
            ->where('a_menu_id',$menu['id'])
            ->select('id','a_title','a_slug','a_avatar','a_description','a_description_seo','created_at','a_view')
            ->paginate(9);

        $products = Product::where([
            'pro_active' => 1,
            'pro_position' => 1
        ])->select('id','pro_name','pro_avatar','pro_price')
            ->get();

        $viewData = [
            'menu'      => $menu,
            'articles'  => $articles,
            'products'  => $products,
            'metaSeo'   => $this->renderMetaSeo($menu)
        ];

        return view('oto.article',$viewData);
    }

    public function about($menu)
    {
        $viewData = [
            'menu'     => $menu,
            'metaSeo'  => $this->renderMetaSeo($menu)
        ];

        return view('oto.static.about',$viewData);
    }

    public function renderMetaSeo($menu)
    {
        $robots = 'NOINDEX, NOFOLLOW';

//        if ($menu->m_type_seo == 1)
//        {
//            $robots = 'INDEX, FOLLOW';
//        }

        $options = [
            'meta_title'      => $menu->m_title_seo,
            'meta_desciption' => $menu->m_description_seo,
            'meta_keywords'   => $menu->m_keyword_seo,
            'meta_robots'     => $robots
        ];

        return MetaSeoController::MetaSeo($options);

    }
}
