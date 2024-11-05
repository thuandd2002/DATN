<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use MetaSeo\Controllers\MetaSeoController;
use Modules\Admin\Models\Article\Article;
use Modules\Product\Models\Product;

class ArticleController extends FrontendController
{
    public function getArticleDetail(Request $request)
    {
        $id = get_parameter($request->segment(2));

        if ($id)
        {
            $article = Article::query()->findOrFail($id);

            $products = Product::where([
                'pro_active' => 1,
                'pro_position' => 1
            ])->select('id','pro_name','pro_avatar','pro_price')
                ->get();

            $options = [
                'meta_title'      => $article->a_title_seo,
                'meta_desciption' => $article->a_description_seo,
                'meta_keywords'   => $article->a_keyword_seo,
                'meta_image'      => $article->a_avatar
            ];

            $metaSeo = MetaSeoController::MetaSeo($options);

            $viewData = [
                'products' => $products,
                'article'  => $article,
                'metaSeo'  => $metaSeo
            ];

            return view('oto.article_detail',$viewData);
        }
    }


    public function tangView(Request $request){

        $today = Carbon::yesterday()->format('Y-m-d');

        $postView = Article::where('id', $request->id)
            ->first();

        if($postView){
            $postView->a_view += 1;
        }else{
            $postView = new Article();
            $postView->a_view = 1;
        }
        $postView->save();
        return response()->json($postView);

    }

}
