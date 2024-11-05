<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Modules\Admin\Models\Guest\Guest;
use Modules\Admin\Models\Order\Order;

class AdminGuestController extends AdminBaseController
{
    public function getListGuest(Request $request)
    {
        $users = User::whereRaw(1);

        if ($request->id)    $users->where('id',$request->id);
        if ($request->n)     $users->where('name','like','%'.$request->n.'%');
        if ($request->alpha) $users->where('name','like',mb_strtolower($request->alpha).'%');
        if ($request->em)    $users->where('email','like','%'.mb_strtolower($request->em).'%');
        if ($request->phone) $users->where('phone','like','%'.mb_strtolower($request->phone).'%');

        $status = config('setting.status');
      
        $users = $users->paginate(10);

        $viewData = [
            'users'     => $users,
            'alphabet'   => config('bang_chu_cai')
        ];

        return view('admin::guest.index',$viewData);
    }





    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('admin::guest.update',compact('user'));
    }

    public function update(Request $request,$id)
    {
        User::findOrFail($id)->update($request->except('_token','save'));

        $this->getMessagesSuccess('Cập nhật thành công');
        return redirect()->route('get.list.guest');
    }

    public function previewOrder(Request $request, $id)
    { 
        if ($request->ajax())
        {
            $orders = Order::with([
                'product' => function($product)
                {
                    $product->select('id','pro_name');
                },
                'menu' => function($menu)
                {
                    $menu->select('id','m_title');
                }
            ])->where('o_guest_id',$id)->orderBy('id','DESC')->get();


            $status = config('setting.status');
            return view('admin::blocks.inc_list_order',compact('orders','status'));
        }

    }

    public function activeOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $order = Order::findOrFail($id);

            $order->o_status = !$order->o_status;
            $order->save();

            return \response([
                'code'      => 1,
                'active'    => $order->o_status
            ]);

        }
    }


    public function deleteOrder(Request $request,$id)
    {
        if ($request->ajax())
        {
            $user = User::findOrFail($id);
            if ($user) {
                $user->delete();
            }
            return \response([
                'code'      => 1,
            ]);

        }
    }

}
