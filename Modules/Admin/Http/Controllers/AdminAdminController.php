<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Order\Order;
use Modules\Admin\Models\Role\Role;
use App\Mail\SendEmailPasswordAdmin;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Http\Requests\AdminAdminRequests;
use Modules\Admin\Http\Requests\RequestAdmin;

class AdminAdminController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getListAdmin()
    {
        $admins = Admin::with([
            'role' => function($q)
            {
                $q->select('id','name');
            }
        ])->paginate(10);

        return view('admin::admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $role_user = [];
        $roles = $this->getListRole();
        return view('admin::admin.create',compact('roles','role_user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RequestAdmin $request)
    {
        $admin = new Admin();

        $admin->name  = $request->name;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->age = $request->age;
        $admin->phone = $request->phone;
        $admin->hard_salary = $request->hard_salary;
        $admin->password = bcrypt('admin12345');
        $admin->save();
        $data = [
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' => 'admin12345'
        ];

        try{
                
            Mail::to($request->email)
            ->send(new SendEmailPasswordAdmin($data));          

        }catch (\Exception $e)
        {
            \Log::error("[Send Email Errors Guest] ".$e->getMessage());
        };


        foreach($request->role as $key => $value)
        {
            $admin->attachRole($value);
        }

        $route = 'get.list.admin';
        if ($request->save == 'add') $route = 'get.create.admin';

     

       
        $this->getMessagesSuccess('Thêm mới thành công');

        return redirect()->route($route);
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $admin = Admin::with([
            'role' => function($q)
            {
                $q->select('id','name');
            }
        ])->find($id);

        $role_user = \DB::table('role_user')->where('user_id',$id)->pluck('role_id')->toArray();

        $roles = $this->getListRole();

        $viewData  = [
            'admin'         => $admin,
            'roles'         => $roles,
            'role_user'     => $role_user
        ];

        return view('admin::admin.update',$viewData);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(AdminAdminRequests $request,$id)
    {
        $admin = Admin::find($id);

        $admin->name = $request->name;
        $admin->address = $request->address;
        $admin->age = $request->age;
        $admin->phone = $request->phone;
        $admin->hard_salary = $request->hard_salary;
        $admin->save();

        \DB::table('role_user')->where('user_id',$id)->delete();

        if ($request->role)
        {
            foreach ($request->role as $value)
            {
                $admin->attachRole($value);
            }
        }

        $this->getMessagesSuccess('Cập nhật thành công');

        return redirect()->route('get.list.admin');
    }

    // public function delete($id)
    // {
    //     Admin::findOrFail($id)->delete();

    //     $this->getMessagesSuccess('Xoá thành công');
    //     return redirect()->route('get.list.admin');

    // }

    public function delete(Request $request,$id)
    {
        $code = 0;
        if ($request->ajax())
        {
            $admin = Admin::findOrFail($id);
            $admin->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code'      => $code,
        ]);
    }


    public function getListRole()
    {
        return Role::select('name','display_name','id')->get();
    }
    public function previewAdmin(Request $request, $id){
        $admins = Admin::find($id);
        $totalDon = Order::where('admin_id',$id)->count('id');
        $totalComplete= Order::where('admin_id',$id)->where('o_status',5)->where('get_money',1)->count('id');
        $roseMoney = Order::whereMonth('updated_at',Carbon::now()->month)
            ->where('admin_id',$id)
            ->where('o_status',5)
            ->where('get_money',1)
            ->sum('rose_money');
        $status = config('setting.status');
        $orderHTML = view('admin::common.modal.preview_admin', compact('totalComplete','totalDon','status','admins','roseMoney'))->render();

        return \response([
            'data' => $orderHTML
        ]);
    }
}
