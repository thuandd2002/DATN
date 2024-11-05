<?php

namespace Modules\Admin\Http\Controllers;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Http\Requests\RequestMenu;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Menu\Menu;


class AdminMenuController extends AdminBaseController
{
    protected $type;
    public function __construct()
    {
        $this->type = config('setting.menu');
        \File::deleteDirectory(storage_path('framework/cache'));
    }

    public function getListMenu(Request $request)
    {
        $menus = Menu::whereRaw(1);

        $menus = $menus->get();

        Menu::recursive($menus,$parent = 0,$level = 1,$menuSort);

        $viewData = [
            'menus' => $menuSort
        ];

        return view('admin::menu.index',$viewData);
    }

    public function getListMenuSort()
    {
        $menu = Cache::store('file')->remember('menus', 600, function (){
            return Menu::where('m_active',Menu::M_ACTIVE)->select('id','m_parent_id','m_title')->get();
        });

        Menu::recursive($menu,$parent = 0,$level = 1,$menuSort);

        return $menuSort;
    }

    public function create()
    {
        $types = $this->type;
        $menuSort = $this->getListMenuSort();
        return view('admin::menu.create',compact('types','menuSort'));
    }

    /**
     * @param RequestMenu $requestMenu
     */
    public function store(RequestMenu $requestMenu)
    {
        $menus = $requestMenu->except('_token','save');
        $check_avatar = $this->uploadImage('m_avatar');

        if ($check_avatar) $menus['m_avatar'] = $check_avatar;


        try{
            Menu::insert($menus);
        }catch (\Exception $e)
        {
            \Log::info("[Errors Create Menu ]" .$e->getMessage());
        }



        $this->getMessagesSuccess();
        $route = 'get.list.menu';
        if ($requestMenu->save == 'add') $route = 'get.create.menu';

        \File::deleteDirectory(storage_path('framework/cache'));
        return redirect()->route($route);
    }

    /**
     * @param $id
     */
    public function edit($id)
    {
        $types = $this->type;
        $menu = Menu::findOrFail($id);
        $menuSort = $this->getListMenuSort();


        $viewData = [
            'menu'      => $menu,
            'types'     => $types,
            'menuSort'  => $menuSort
        ];

        return view('admin::menu.update',$viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RequestMenu $requestMenu,$id)
    {

       
        $menus        = $requestMenu->except('_token','save','m_avatar');



        $check_avatar = $this->uploadImage('m_avatar');
        if ($check_avatar) $menus['m_avatar'] = $check_avatar;

        try{

            Menu::findOrFail($id)->update($menus);

        }catch (\Exception $e)
        {
            \Log::info("[Errors Create Menu ]" .$e->getMessage());
        }

        $route = 'get.list.menu';
        if ($requestMenu->save == 'add') $route = 'get.create.menu';

        $this->getMessagesSuccess('Cập nhật');
        \File::deleteDirectory(storage_path('framework/cache'));

        return redirect()->route($route);
    }

    public function active(Request $request,$id)
    {
        if ($request->ajax())
        {
            $menu = Menu::findOrFail($id);
            $menu->m_active = !$menu->m_active;
            $menu->save();
            $code = 1;

            return \response([
                'code'      => $code,
                'active'    => $menu->m_active
            ]);
        }
    }

    public function delete(Request $request,$id)
    {
        $code = 0;
        if ($request->ajax())
        {
            $menu = Menu::findOrFail($id);
            $menu->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }

    public function hot(Request $request,$id)
    {
        if ($request->ajax())
        {
            \File::deleteDirectory(storage_path('framework/cache'));

            $menu = Menu::findOrFail($id);
            $menu->m_hot = !$menu->m_hot;
            $menu->save();
            $code = 1;

            return \response([
                'code'      => $code,
                'hot'       => $menu->m_hot
            ]);
        }
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
