<?php

namespace Modules\Admin\Http\Controllers;

use App\Mail\DemoMail;
use App\Mail\SendEmailCancelAppointmnet;
use App\Mail\SendEmailExportCarCustomer;
use App\Mail\SendEmailStaff;
use App\Mail\SendEmailStaffAuto;
use App\Mail\SendEmailSuccessPayment;
use App\Mail\SendMailRegisterUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Http\Requests\RequestCreateOrder;
use Modules\Admin\Http\Requests\RequestOrder;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Order\Order;
use Modules\Product\Models\Product;
use Pusher\Pusher;

class AdminOrderController extends AdminBaseController
{
    public function index(Request $request)
    {
        $sratDay = Carbon::now()->startOfDay();
        $endDay = Carbon::now()->endOfDay();

        $orderTodays = Order::with(['product', 'user'])->where('created_at', '>=', $sratDay)->where('created_at', '<=', $endDay)->get();

        if (Auth::user()->role[0]->name != 'administrator') {
            $orders = Order::with(['product', 'user'])->where('admin_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);

        } else {
            $orders = Order::with(['product', 'user'])->orderBy('id', 'DESC')->paginate(10);
        }

        $admins = Admin::with([
            'role' => function ($q) {
                $q->select('id', 'name');
            }
        ])->get();


        if ($request->id) {
            $orders = Order::with(['product', 'user'])->where('id', $request->id)->orderBy('id', 'DESC')->paginate(10);
        }

        if ($request->n) {
            $orders = DB::table('orders')
                ->select('*')
                ->where('users.name', 'LIKE', '%' . $request->n . '%')
                ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
                ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
                ->orderBy('orders.id', 'DESC')->paginate(10);
        }

        if ($request->date) {
          
            $orders = DB::table('orders')
                ->select('*')
                ->whereDate('orders.created_at', $request->date )
                ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
                ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
                ->orderBy('orders.id', 'DESC')->paginate(10);
        }


        if ($request->pr) {
            $orders = DB::table('orders')
                ->select('*')
                ->where('products.pro_name', 'LIKE', '%' . $request->pr . '%')
                ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
                ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
                ->orderBy('orders.id', 'DESC')->paginate(10);
        }

        if ($request->m) {
            $orders = DB::table('orders')
                ->select('*')
                ->where('orders.o_status', '=', $request->m)
                ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
                ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
                ->orderBy('orders.id', 'DESC')->paginate(10);
        }

        if ($request->us) {
            $orders = Order::with(['product', 'user'])->where('admin_id', $request->us)->orderBy('id', 'DESC')->paginate(10);
        }


        // lấy đơn đã hoàn thành trong ngày 
        $donhoanthanhtrongngay =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->where("o_status",5)->get());
        $donhoanthanhtrongngaynhanvien  = count( Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereNotIn("o_status",[0,1,2,4,5])->where('admin_id', Auth::user()->id)->get());

        // lấy đơn đã hủy trong ngày 
        $donhuytrongngay =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereNotIn("o_status",[0,1,2,4,5])->get());
        $donhuytrongngaynhanvien = count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereNotIn("o_status",[0,1,2,4,5])->where('admin_id', Auth::user()->id)->get());


         // lấy đơn đã hủy trong ngày 
         $dondadatcoctrongngay =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[2])->get());
        $dondatcoctrongngaynhanvien =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[2])->where('admin_id', Auth::user()->id)->get());


        $henngaylayxe =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[4])->get());
        $henngaylayxenhanvien = count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[4])->where('admin_id', Auth::user()->id)->get());
        // lấy số lượng đơn đang được xử lý trong ngày
        $dondangxuly =  count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[0])->get());
        $dondangxulynhanvien = count(Order::whereDate('created_at',Carbon::now()->format('Y-m-d'))->whereIn("o_status",[0])->where('admin_id', Auth::user()->id)->get());
       

        $viewData = [
            'orders' => $orders,
            'orderTodays' => $orderTodays,
            'status' => $this->getTextIndexAttribute(),
            'statusexportcarcustomer' => $this->getTextExportCarCustomer(),
            'alphabet' => config('bang_chu_cai'),
            'admins' => $admins,
            'donhoanthanhtrongngay' => $donhoanthanhtrongngay,
            'donhuytrongngay' => $donhuytrongngay,
            'dondangxuly' => $dondangxuly,
            'dondadatcoctrongngay' => $dondadatcoctrongngay,
            'henngaylayxe' => $henngaylayxe,
            'donhoanthanhtrongngaynhanvien' => $donhoanthanhtrongngaynhanvien,
            'donhuytrongngaynhanvien' => $donhuytrongngaynhanvien,
            'dondangxulynhanvien' => $dondangxulynhanvien,
            'dondadatcoctrongngaynhanvien' => $dondatcoctrongngaynhanvien,
            'henngaylayxenhanvien' => $henngaylayxenhanvien
        ];

        return view('admin::order.index', $viewData);
    }


    public function getAdvancedFilterData(Request $request)
    {

    }

    public function deleteOrder(Request $request, $id)
    {
        $code = 0;
        if ($request->ajax()) {
            $article = Order::findOrFail($id);
            $article->delete();

            $code = 1;
        }

        \File::deleteDirectory(storage_path('framework/cache'));

        return \response([
            'code' => $code,
        ]);
    }

    public function edit($id)
    {
        $orders = Order::with('product', 'user')->find($id);

        $viewData = [
            'orders' => $orders,
            'status' => $this->getTextIndexAttribute()
        ];

        return view('admin::order.update', $viewData);
    }

    public function update(RequestOrder $requestOrder, $id)
    {

        $order = Order::find($id);
        

        try {
            $order->o_status = $requestOrder->o_status;
            $order->save();

            \Session::flash('toastr', [
                'type' => 'success',
                'message' => 'Cập nhật thành công !!!'
            ]);

            return redirect()->route('get.list.orders');
        } catch (\Exception $e) {
            \Log::error('[Order Error ]' . $e->getMessage());

            \Session::flash('toastr', [
                'type' => 'errors',
                'message' => 'Cập nhật thất bại'
            ]);
            return redirect()->back();
        }
    }


    public function selectStatusOrder(Request $request, $id)
    {

        if ($request->ajax()) {
            $order = Order::find($id);

            $order->o_status = $request->status;


            $order->save();
            $code = 1;

            return \response([
                'code' => $code,
                'active' => $order->o_status
            ]);
        }
    }

    public function staff(Request $request)
    {

        if ($request->ajax()) {
            $email = Admin::where('id', $request->admin_id)->get();

            $order = Order::find($request->id);

            $order_detail = Order::find($request->id);


            $order->admin_id = $request->admin_id;

            $order->save();
            $code = 1;


            //data push notification in staff
            $data['name'] = $order_detail->user->name;
            $data['email'] = $order_detail->user->email;
            $data['phone'] = $order_detail->user->phone;



            //end
            try {

                Mail::to($email[0]->email)->send(new SendEmailStaff(compact('order_detail', 'email')));

            } catch (\Exception $e) {

                \Log::error("[Send Email Errors Guest] " . $e->getMessage());
            }
            ;

            $options = array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $pusher->trigger('NotifyStaff', 'send-message-staff-' . $order->admin_id, $data);

            return \response([
                'code' => $code,
                'active' => $order->admin_id
            ]);
        }
    }

    public function carViewingDay(Request $request)
    {
        if ($request->ajax()) {

            $order = Order::find($request->id);

            $order->o_pick_up_schedule = $request->o_pick_up_schedule;
            $order->o_status = 4;

            $order->save();
            $code = 1;

            return \response([
                'code' => $code,
                'active' => $order->o_pick_up_schedule
            ]);
        }
    }

    public function cancelDoNotBuyAnymore(Request $request)
    {
        if ($request->ajax()) {

            $order = Order::find($request->id);

            $order->cancel_appointment = $request->cancel_appointment;
            $order->o_status = 6;
            $order->save();
            $code = 1;

            return \response([
                'code' => $code,
                'active' => $order->cancel_appointment
            ]);
        }
    }

    public function cancelAppointment(Request $request)
    {
        if ($request->ajax()) {

            $order = Order::find($request->id);

            $order->cancel_appointment = $request->cancel_appointment;
            $order->o_status = 3;
            $order->save();
            $code = 1;


            $data = [
                'lydohuy' => $request->cancel_appointment,
                'name' => $order->user->name,
                'email' => $order->user->email,
            ];


            try {

                Mail::to($order->user->email)
                    ->send(new SendEmailCancelAppointmnet($data));

            } catch (\Exception $e) {
                \Log::error("[Send Email Errors Guest] " . $e->getMessage());
            }
            ;


            return \response([
                'code' => $code,
                'active' => $order->cancel_appointment
            ]);
        }
    }



    public function successPayment(Request $request)
    {
        if ($request->ajax()) {

            $order = Order::find($request->id);

            $order->o_status = 5;
            $order->save();
            $code = 1;


            $data = [
                'name' => $order->user->name,
                'email' => $order->user->email,
            ];


            try {

                Mail::to($order->user->email)
                    ->send(new SendEmailSuccessPayment($data));

            } catch (\Exception $e) {
                \Log::error("[Send Email Errors Guest] " . $e->getMessage());
            }
            ;


            $data_value_pusher = [
            'id_order' => $request->id
            ];

            $options = array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $pusher->trigger('NotifyGetmoney', 'send-message-get-money', $data_value_pusher);



            return \response([
                'code' => $code,
                'active' => $order->o_status
            ]);
        }
    }



    public function deposit(Request $request)
    {
        if ($request->ajax()) {

            $order = Order::find($request->id);

            $order->o_deposit = $request->deposit;
            $order->o_status = 2;

            $order->save();
            $code = 1;

            return \response([
                'code' => $code,
                'active' => $order->o_deposit,
                'o_status' => $order->o_status
            ]);
        }
    }


    public function exportCarCustomer(Request $request,$id)
    {

        $infoOrder = Order::with(['product', 'user'])->where('id', '=', $id)->get();
        try {
            Mail::to($infoOrder[0]->user->email)->send(new SendEmailExportCarCustomer(compact('infoOrder')));


            } catch (\Exception $e) {

                \Log::error("[Send Email Errors Guest] " . $e->getMessage());
        }


        if ($request->ajax()) {

            $order = Order::find($id);

            $order->export_car_customer = 1;

            $order->save();
            $code = 1;

            $options = array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $data['idOrder'] = $id;


            $pusher->trigger('NotifyCarExport', 'send-message-car-export', $data);

            return \response([
                'code' => $code,
            ]);
        }
    }
    public function adminGetMoney(Request $request,$id)
    {
        if ($request->ajax()) {

            $order = Order::find($id);

            $order->get_money = 1;

            $order->save();
            $code = 1;

         

            
            return \response([
                'code' => $code,
            ]);
        }
    }

    public function unifiedPrice(Request $request)
    {

        if ($request->ajax()) {
            $order = Order::find($request->id);
            $product = Product::where('id', $order->o_product_id)->first();
            $order->unified_price = $request->unified_price;
            $order->rose_money = ($product->rose * $request->unified_price) / 100;
            $order->save();
            $code = 1;


            return \response([
                'code' => $code,
                'unified_price' => $order->unified_price,

            ]);
        }
    }

    public function getTextIndexAttribute()
    {
        return config('setting.status');
    }
    public function getTextExportCarCustomer()
    {
        return config('setting.statusExportCarCustomer');
    }

    public function previewOrderUser(Request $request, $id)
    {
        if ($request->ajax()) {

            $orders = Order::with([
                'product' => function ($product) {
                    $product->select('id', 'pro_name');
                },
                'menu' => function ($menu) {
                    $menu->select('id', 'm_title');
                }
            ])->where('o_guest_id', $id)->orderBy('created_at', 'DESC')->get();

            $status = config('setting.status');
            $orderHTML = view('admin::common.modal.preview_order', compact('orders', 'status'))->render();

            return \response([
                'data' => $orderHTML
            ]);

        }

    }

    public function previewPrint(Request $request)
    {

        if ($request->ajax()) {

            $orderHTMLPrint = view('admin::common.modal.preview_info_contract')->render();

            return \response([
                'data' => $orderHTMLPrint
            ]);
        }

    }

    public function previewUpdateOrder(Request $request, $id)
    {
        if ($request->ajax()) {

            $orders = Order::with('product', 'user')->find($id);
            $products = Product::all();
            $status = config('setting.status');
            $link_deposit = $request->deposit_url;
            $link_print = $request->print_url;
            $orderHTML = view('admin::common.modal.preview_order_update', compact('products', 'orders', 'status', 'link_deposit', 'id', 'link_print'))->render();

            return \response([
                'data' => $orderHTML
            ]);
        }


    }

    public function auto(Request $request)
    {
        if ($request->ajax()) {

            

            $admins_order = DB::select(DB::raw("SELECT C.id, C.email, D.total_order_finish FROM admins C LEFT JOIN ( SELECT A.admin_id, count(A.admin_id) AS 'total_order_finish' FROM `orders` A right join `admins` B on A.admin_id = B.id WHERE B.active = 1 and A.o_status = 5 GROUP BY A.admin_id) D ON C.id = D.admin_id WHERE C.id <> 1 ORDER BY `D`.`total_order_finish` DESC"));



            $orders = Order::where('o_status', 0)->where('admin_id', '0')->get();

            $count_admin = count($admins_order);
            $index = 0;

            foreach ($orders as $o) {

             
                $user = User::find($o->o_guest_id);

                $email = $o;
                $email_address = $admins_order[$index]->email;
                
                $order = Order::find($o->id);

                $order->admin_id = $admins_order[$index]->id;

                $order->save();

                   //end
                try {

                    Mail::to($email_address)->send(new SendEmailStaffAuto(compact("email",'email_address')));


                } catch (\Exception $e) {

                    \Log::error("[Send Email Errors Guest] " . $e->getMessage());
                }
                ;

             


                $index++;
                if ($index == $count_admin)
                    $index = 0;
            }


            return \response([
                'data' => true
            ]);
        }
    }

    public function customerBookAppointment(){
        $products = Product::all()->where('pro_active',1)->toArray();
        $status= $this->getTextIndexAttribute();
        return view('admin::order.customer-book-appoinment',compact('products','status'));
    }

    public function customerBookAppointmentInsert(RequestCreateOrder $request){
        
            $request = $request->all();
            
            $flag = true ;
            $email = trim(mb_strtolower($request['email']));
            $phone = $request['phone'];
            $name  = $request['name'];
            $o_product_id  = $request['o_product_id'];
            $car_viewing_day = $request['car_viewing_day'];
            $messages = $request['messages'];
            $admin_id = $request['admin_id'];

            $guest = User::where('email',$email)->first();
    
            if ($guest)  {
                $flag     = false;
                $id_guest = $guest->id;
            }

            if ($flag == true)
            {
                $id_guest = $this->insertGuest($email,$name,$phone);
            }


            $this->insertOrder($id_guest, $o_product_id, $messages, $car_viewing_day,$admin_id);



            $route = 'get.list.orders';

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Thêm dữ liệu thành công'
            ]);
    
            return redirect()->route($route);

    }


        
    public function insertOrder($id_guest,$id=0,$messages='', $car_viewing_day,$admin_id=1)
    {

     
        $ip = ip_user_client();
        Order::insert([
            'o_guest_id'    => $id_guest,
            'o_product_id'  => $id,
            'o_ip'          => $ip,
            'admin_id'      =>  $admin_id,
            'o_messages'    => $messages,
            'car_viewing_day'    => $car_viewing_day,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
    }

    public function insertGuest($email,$name,$phone)
    {
        $pw = $this->randomPassword();
        $data_rg = [
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'password' => $pw
        ];

        try{
            Mail::to($email)
                ->send(new SendMailRegisterUser($data_rg));
        }catch (\Exception $e)
        {
            \Log::error("[Send Email Errors Guest] ".$e->getMessage());
        }
        
        return $id_guest  = User::insertGetId([
                'name'          => $name,
                'email'         => $email,
                'phone'         => $phone,
                'password'      => bcrypt($pw),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
    }



    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


    public function checking_data_product(Request $request){
      
        if ($request->ajax()) {
            $product_detail = Product::find($request->all()['id']);
            
        
            if($product_detail['numbers_of_cars_left'] === 0){
                $status = 0;
            }else{
                $status = 1;
            }
    
            return \response([
                'status' => $status
            ]);
        }
    }

    public function update_number_of_car_left(Request $request){
      
        if ($request->ajax()) {
            $product_detail = Product::find($request->all()['id']);
        
            if($product_detail['numbers_of_cars_left'] < 0){
                $numbers_of_cars_left = 0;
                $x = Product::findOrFail($request->all()['id']);
                $x->numbers_of_cars_left = $numbers_of_cars_left;
                $x->save();
            }else{
                $numbers_of_cars_left = $product_detail['numbers_of_cars_left'] - 1;
                $x = Product::findOrFail($request->all()['id']);
                $x->numbers_of_cars_left = $numbers_of_cars_left;
                $x->save();
            }
    
            return \response([
                'numbers_of_cars_left' => $x->numbers_of_cars_left
            ]);
        }
    }
}