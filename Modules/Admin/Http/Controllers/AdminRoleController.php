<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RequestRole;
use Modules\Admin\Models\Permission\Permission;
use Modules\Admin\Models\Role\Role;
use Illuminate\Support\Str;


class AdminRoleController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListRole()
    {
        $roles = Role::with([
            'permission' => function($q)
            {
                $q->select('id','name');
            }
        ])->get();

        $viewData = [
            'roles' => $roles
        ];

        return view('admin::role.index',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $sortPermission = $this->getListPermission();
        return view('admin::role.create',compact('sortPermission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RequestRole $requestRole)
    {
        $role = new Role();
        $role->name         = Str::slug($requestRole->display_name);
        $role->description  = $requestRole->description;
        $role->display_name = $requestRole->display_name;
        $role->save();

        if ($requestRole->permission)
        {
            foreach($requestRole->permission as $item)
            {
                $role->attachPermission($item);
            }
        }

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Thêm mới thành công !!!'
        ]);

        return redirect()->route('get.list.role');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $role           = Role::with('permission')->find($id);
        $sortPermission = $this->getListPermission();

        $viewData = [
            'role'           => $role,
            'sortPermission' => $sortPermission
        ];

        return view('admin::role.update',$viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $requestRole,$id)
    {
        $role = Role::find($id);
        $role->name         =  Str::slug($requestRole->display_name);
        $role->description  = $requestRole->description;
        $role->display_name = $requestRole->display_name;
        $role->save();

        if ($requestRole->permission)
        {
            \DB::table('permission_role')->where('role_id',$id)->delete();
            foreach($requestRole->permission as $item)
            {
                $role->attachPermission($item);
            }
        }

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cập nhập nhóm quyền thành công !!!'
        ]);

        return redirect()->route('get.list.role');
    }

    public function delete(Request $request,$id)
    {
    
        $code = 0;
        if ($request->ajax())
        {
            \DB::table("roles")->where('id',$id)->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }

    public function getListPermission()
    {
        $permission = Permission::all();
        $sortPermission = [];

        foreach ( $permission->toArray() as $key => $value)
        {
            if (!array_key_exists($value['group_permission'],$sortPermission))
            {

                $sortPermission[$value['group_permission']][] = $value;
            }
            else
            {
                $sortPermission[$value['group_permission']][$key] = $value;
            }
        }

        return $sortPermission;
    }
}