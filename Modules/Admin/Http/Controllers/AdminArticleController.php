<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Http\Requests\RequestArticle;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Keyword\ArticleKeywords;
use Modules\Admin\Models\Keyword\Keyword;
use Modules\Admin\Models\Menu\Menu;

class AdminArticleController extends AdminBaseController
{
    public function __construct()
    {
        \File::deleteDirectory(storage_path('framework/cache'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListArticle(Request $request)
    {
        $articles = Article::with([
            'keyword' => function($keyword)
            {
                $keyword->select('k_name','k_hit');
            },
            'menu' => function($menu)
            {
                $menu->select('m_title','id');
            }
        ]);

        if ($request->id) $articles->where('id',$request->id);
        if ($request->n) $articles->where('a_title','like','%'.$request->n.'%');
        if ($request->alpha) $articles->where('a_title','like',mb_strtolower($request->alpha).'%');

        $articles = $articles->paginate(10);

        $viewData = [
            'articles' => $articles,
            'menus'      => $this->getListMenu(),
            'alphabet'   => config('bang_chu_cai'),
            'query'     => $request->query()
        ];

        return view('admin::article.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $viewData = [
            'menus'   => $this->getListMenu()
        ];

        return view('admin::article.create',$viewData);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RequestArticle $requestArticle)
    {
        $article = $requestArticle->except('_token','save','hidden-undefined');
        $article['created_at'] = $article['updated_at'] = Carbon::now();
        $article['a_admin_id'] = get_id_by_user('admins');



        $check_avatar = $this->uploadImage('a_avatar');
        if ($check_avatar) $article['a_avatar'] = $check_avatar;


        try{

            $idArticle = Article::insertGetId($article);
            $keywords = $requestArticle->get('hidden-undefined');

            if ($keywords) $this->insertArticleKeyword($keywords,$idArticle);

        }catch (\Exception $exception)
        {
            \Log::error('[Create Articles ]' .$exception->getMessage());
        }


        \File::deleteDirectory(storage_path('framework/cache'));

        $route = 'get.list.article';
        if ($requestArticle->save == 'add') $route = 'get.create.article';

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Thêm mới thành công'
        ]);

        return redirect()->route($route);
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $article = Article::with([
            'keyword' => function($keyword)
            {
                $keyword->select('k_name','k_hit');
            }
        ])->findOrFail($id);

        $viewData = [
            'article' => $article,
            'menus'   => $this->getListMenu()
        ];

        return view('admin::article.update',$viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RequestArticle $requestArticle,$id)
    {
        $article = $requestArticle->except('_token','save','hidden-undefined');

        $article['updated_at'] = Carbon::now();

        $check_avatar = $this->uploadImage('a_avatar');


        if ($check_avatar) $article['a_avatar'] = $check_avatar;

        try{

            Article::where('id',$id)->update($article);
            $keywords = $requestArticle->get('hidden-undefined');

            if ($keywords) $this->insertArticleKeyword($keywords,$id);

        }catch (\Exception $exception)
        {
            \Log::error('[Update Articles ]' .$exception->getMessage());
        }

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cập nhật thành công !!!'
        ]);

        \File::deleteDirectory(storage_path('framework/cache'));

        $route = 'get.list.article';
        if ($requestArticle->save == 'add') $route = 'get.create.article';

        return redirect()->route($route);
    }

    public function active(Request $request,$id)
    {
        if ($request->ajax())
        {
            $article = Article::findOrFail($id);
            $article->a_active = !$article->a_active;
            $article->save();
            $code = 1;

            return \response([
                'code'      => $code,
                'active'    => $article->a_active
            ]);
        }
    }


    public function previewArticle(Request $request,$id)
    {
        if ($request->ajax())
        {
            $article = Article::findOrFail($id);

            $articleHtml = view('admin::common.modal.preview_article',compact('article'))->render();

            return \response([
                'data' => $articleHtml,
            ]);
        }
    }

    public function getListMenu()
    {
        $menus = Menu::whereNotIn('m_type',[Menu::TYPE_PRODUCT,Menu::TYPE_ABOUT])
            ->where('m_active',Menu::M_ACTIVE)->select('id','m_title','m_parent_id')->get();

        Menu::recursive($menus,$parent = 0, $level = 1 ,$menusSort);

        return $menusSort;
    }

    public function insertArticleKeyword($keywords,$idArticle)
    {
        foreach (explode(',',$keywords) as $keyword)
        {
            $item = Keyword::where('k_name_slug',str_slug($keyword))->first();
            $articleKeyword = [
                'ak_article_id' => $idArticle,
                'ak_keyword_id' => $item->id
            ];

            try{

                ArticleKeywords::insert($articleKeyword);
                Keyword::where('id',$item->id)->increment('k_hit');

            }catch (\Exception $e){}

        }
    }

    public function delete(Request $request,$id)
    {
        $code = 0;
        if ($request->ajax())
        {
            $article = Article::findOrFail($id);
            $article->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }

    public function deleteKeyword(Request $request)
    {
        if ($request->id && $request->idKeyword)
        {
            ArticleKeywords::where([
                'ak_article_id' =>  $request->id,
                'ak_keyword_id' => $request->idKeyword
            ])->delete();

            Keyword::findOrFail($request->idKeyword)->decrement('k_hit');
        }

        return response(['data' => $request->all()]);
    }

    public function uploadImage($name)
    {
        if (Input::hasFile($name))
        {
            $image  = upload_image($name);
            if ($image['code'] != 1 ) return false;

            return $image['name'];
        }
    }
}

