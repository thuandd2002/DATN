<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MetaSeo\Controllers\MetaSeoController;
use Modules\Product\Models\Rating\Rating;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductValue;


class ProductController extends FrontendController
{
    public function getProducDetail(Request $request)
    {
        $url = preg_split("/(-)/i", $request->segment(2));
        $id  = array_pop($url);

        // lấy sản phẩm đc active trang chủ
        $productHome = Product::where('pro_type', 1)
            ->limit(8)
            ->orderBy('id', 'DESC')
            ->select('id', 'pro_name', 'pro_menu_id', 'pro_active', 'pro_avatar', 'pro_price', 'pro_slug')
            ->get();

        if ($id) {

            $product = Product::with([
                'menu' => function ($menu) {
                    $menu->select('id', 'm_title');
                },
                'images'
            ])
                ->where('pro_active', 1)
                ->find($id);

            if (!$product) abort(404);

            $image = '';
            if (isset($product->images) && count($product->images) > 0) {
                $list_image_product = $product->images->toArray();
                $image = array_pop($list_image_product)['pi_name'];
            }
            //danh gia san pham
            $rating = Rating::Where('products_id', $id)->avg('rating');

            // // lay san pham cung danh muc

            $productValue = ProductValue::where('product_id', $id)->first();
            // lay san pham cung danh muc
            $proView = Product::find($id);
            $proViews = [
                'pro_view' => $proView['pro_view'] + 1
            ];
            $proView->update($proViews);
            $productMenu = Product::with('images')
                ->where([
                    'pro_type'    => 1,
                    'pro_active'  => 1,
                    'pro_menu_id' => $product->pro_menu_id
                ])->limit(8)
                ->orderBy('id', 'DESC')
                ->select('id', 'pro_name', 'pro_menu_id', 'pro_active', 'pro_avatar', 'pro_price', 'pro_slug')
                ->get();

            $options = [
                'meta_title'      => $product->pro_title_seo,
                'meta_desciption' => $product->pro_description_seo,
                'meta_keywords'   => $product->pro_keyword_seo,
                'meta_image'      => $image
            ];

            $metaSeo = MetaSeoController::MetaSeo($options);

            $comments = Comment::with('user:id,name,avatar')->with('subComments')
                ->where('com_source_id', $id)
                ->where('com_type', Comment::TYPE_PRODUCT)
                ->where('com_parent_id', 0)
                ->get();

            $viewData = [
                'product'     => $product,
                'productValue' => $productValue,
                'productHome' => $productHome,
                'productMenu' => $productMenu,
                'metaSeo'     => $metaSeo,
                'comments'    => $comments,
                'getFuel'   => $this-> getFuel(),
                'getOrigin' => $this-> getCompany(),
                'rating'    => $rating
            ];

            if (\Auth::check()) {
                $user = \Auth::user();
                $viewData['user'] = $user;
            }

            return view('oto.product_detail', $viewData);
        }
    }
    // public function insertRating(Request $request )
    // {

    //     $data = $request ->all();

    //     $rating = new Rating();
    //     $rating->products_id = $data['products_id'];
    //     $rating->rating = $data['index'];
    //     $rating->save();
    //     return response()->json([
    //         'status' => 'true',
    //         'code' => 1
    //     ]);
    // }

    public function getProducList(Request $request)
    {
        $products = Product::query()
            ->select('id', 'pro_name', 'pro_slug', 'pro_avatar', 'pro_price')
            ->paginate(9);


        $productsPossionHot = Product::query()->where('pro_position', Product::PRO_POSSION_2)
            ->select('id', 'pro_name', 'pro_avatar', 'pro_price')
            ->limit(4)
            ->get();
        $menu = [];

        $viewData = [
            'menu'               => [],
            'products'           => $products,
            'metaSeo'            => $this->renderMetaSeo($menu),
            'productsPossionHot' => $productsPossionHot
        ];


        return view('oto.product', $viewData);
    }

    public function tangView(Request $request)
    {

        $today = Carbon::yesterday()->format('Y-m-d');
        $productView = Product::where('id', $request->id)
            ->first();

            if($productView){
                $productView->pro_view += 1;
            }else{
                $productView = new Product();
                $productView->pro_view = 1;
            }
            $productView->save();
            return response()->json($productView);
    }
    public function getCompany()
    {
        return config('setting.company');
    }

    public function getFuel()
    {
        return config('setting.fuel');
    }
}
