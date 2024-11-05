<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RequestPermission;
use Modules\Admin\Models\Permission\Permission;
use Illuminate\Support\Str;

class AdminPermissionController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListPermission()
    {
        $permissions = Permission::orderByDesc('id')->paginate(15);
        $groupPermission = config('setting.permission');
        $viewData = [
            'permissions' => $permissions,
            'groupPermission' => $groupPermission,
            'query' => ''
        ];

        return view('admin::permission.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $groupPermission = config('setting.permission');

        return view('admin::permission.create',compact('groupPermission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RequestPermission $requestPermission)
    { 
        
        $permission = $requestPermission->except('_token','save');
        $permission['created_at'] =  $permission['updated_at'] = Carbon::now();
        $permission['display_name'] = Str::slug($requestPermission->display_name);
        try{
            Permission::insert($permission);
        }catch (\Exception $e )
        {
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => '[Create Permission ]'. $e->getMessage()
            ]);

            return redirect()->back();
        }

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Thêm mới thành công !!!'
        ]);

        $route = 'get.list.permission';
        if ($requestPermission->save == 'add') $route = 'get.create.permission';

        return redirect()->route($route);
    }

    public function edit(Request $request,$id)
    {
        $permission = Permission::find($id);
        $groupPermission = config('setting.permission');

        $viewData = [
            'permission'      => $permission,
            'groupPermission' => $groupPermission
        ];

        return view('admin::permission.create',$viewData);
    }

    public function update(Request $requestPermission,$id)
    {
        $permission = Permission::find($id);

        try{

            $permission->name               = Str::slug($requestPermission->display_name);
            $permission->display_name       = $requestPermission->display_name;
            $permission->description        = $requestPermission->description;
            $permission->group_permission   = $requestPermission->group_permission;
            $permission->save();

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Cập nhật thành công !!!'
            ]);

            return redirect()->route('get.list.permission');
        }catch (\Exception $e)
        {
            \Log::error('[Update Permission ]' .$e->getMessage());

            \Session::flash('toastr', [
                'type'    => 'errors',
                'message' => 'Cập nhật thất bại'
            ]);
            return redirect()->back();
        }
    }

    public function delete(Request $request,$id)
    {
        // try{
        //     Permission::find($id)->delete();
        //     \Session::flash('toastr', [
        //         'type'    => 'success',
        //         'message' => 'Xoá thành công !!!'
        //     ]);

        //     return redirect()->route('get.list.permission');
        // }catch (\Exception $e)
        // {
        //     \Log::error('[Delete Permission ]' .$e->getMessage());

        //     \Session::flash('toastr', [
        //         'type'    => 'errors',
        //         'message' => 'Xoá thất bại'
        //     ]);
        //     return redirect()->route('get.list.permission');
        // }

        $code = 0;
        if ($request->ajax())
        {
            $permission = Permission::findOrFail($id);
            $permission->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);

    }
}