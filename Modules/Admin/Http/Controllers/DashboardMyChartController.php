<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Order\Order;
use Modules\Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardMyChartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //doanh thu của tôi
        $RevenueOfMeDay = Order::whereDate('updated_at', Carbon::now()
            ->format('Y-m-d'))
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
        $RevenueOfMeMonth = Order::whereMonth('updated_at', Carbon::now()->month)
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
        $RevenueOfMeYear = Order::whereYear('updated_at', Carbon::now()->year)
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
        $RevenueOfMe = Order::where('o_status', 5)->where('admin_id', Auth::user()->id)->where('get_money', 1)->sum('unified_price');
        // * giá nhập
        $cpNhapXeDay = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereDate('products.created_at', Carbon::now()->format('Y-m-d'))
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_import');
        $cpNhapXeMonth = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereMonth('products.created_at', Carbon::now()->month)
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_import');
        $cpNhapXeYear = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereYear('products.created_at', Carbon::now()->format('Y-m-d'))
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_import');
        $cpTotalNhap = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_import');
        // gias sua chua
        $spScXeDay = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereDate('products.created_at', Carbon::now()->format('Y-m-d'))
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_repair');
        $spScXeMonth = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereMonth('products.created_at', Carbon::now()->month)
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_repair');
        $spScXeYear = DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->whereYear('products.created_at', Carbon::now()->year)
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_repair');
        $cpTotalSc =  DB::table("products")
            ->join('orders', 'products.id', '=', 'orders.o_product_id')
            ->where('orders.admin_id', Auth::user()->id)
            ->sum('products.pro_price_repair');
        //Cpofmy
        $totalCp = $cpTotalSc + $cpTotalNhap;
        $myCpDay = $cpNhapXeDay + $spScXeDay;
        $myCpMonth = $cpNhapXeMonth + $spScXeMonth;
        $myCpYear = $cpNhapXeYear + $spScXeYear;
        //myLn
        $myLnDay = $RevenueOfMeDay - $myCpDay;
        $myLnMonth = $RevenueOfMeMonth - $myCpMonth;
        $myLnYear = $RevenueOfMeYear - $myCpYear;
        $totalLn = $RevenueOfMe - $totalCp;


        // Tổng đơn được giaO
        $totalDon = Order::where('admin_id', Auth::user()->id)->count('id');

        //
        $totalComplete = Order::where('admin_id', Auth::user()->id)->where('o_status', 5)->count('id');
        $totalCancel = Order::where('admin_id', Auth::user()->id)->where('o_status', 6)->count('id');
        $totalDonHoanThanh = $totalComplete + $totalCancel;
        if (isset($totalDon) && $totalDon > 0) {
            $completeRatio =   round((($totalDonHoanThanh / $totalDon) * 100), 2);
        } else {
            $completeRatio  = 0;
        }
       
        //
        $totalDonXuly = Order::where('admin_id', Auth::user()->id)->where('o_status', 0)->count('id');
        $luongRose = Order::whereMonth('updated_at', Carbon::now()->month)
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('rose_money');
        $luongCung = Admin::where('id', Auth::user()->id)->sum('hard_salary');



                // khách hàng hẹn xem xe trong ngày hôm đấy

                if (Auth::user()->role[0]->id != 1) {
                    $order_customer_today =    Order::with(['product', 'user'])
                    ->where('admin_id', Auth::user()->id)
                    ->where('o_pick_up_schedule',Carbon::now('Asia/Ho_Chi_Minh')->toDateString())
                    ->get();
                }else{
                    $order_customer_today =    Order::with(['product', 'user'])
                    // ->where('admin_id', Auth::user()->id)
                    ->where('o_pick_up_schedule',Carbon::now('Asia/Ho_Chi_Minh')->toDateString())
                    ->get();
                }
            
        $day_today = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        return view('admin::dashboard.myvisitor', compact([
            'day_today',
            'order_customer_today',
            'luongRose',
            'luongCung',
            'totalDonXuly',
            'completeRatio',
            'totalDon',
            'totalDonHoanThanh',
            'RevenueOfMeDay',
            'RevenueOfMeMonth',
            'RevenueOfMeYear',
            'RevenueOfMe',
            'myCpDay',
            'myCpMonth',
            'myCpYear',
            'myLnDay',
            'myLnMonth',
            'myLnYear',
            'totalCp',
            'totalLn'
        ]));
    }

    public function filter_date_select(Request $request)
    {

        $data = $request->all();

        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $tomorrow =  Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
        $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
        $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(15)->format('d-m-Y H:i:s');
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc =  Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();

        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {
            $RevenueOfMeDay = Order::whereBetWeen('orders.created_at', [$sub7days . ' 00:00:00', $now . ' 23:59:59'])
                ->where('admin_id', Auth::user()->id)
                ->where('o_status', 5)
                ->where('get_money', 1)
                ->sum('unified_price');

                // Tổng đơn được giaO
                $totalDon = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$sub7days . ' 00:00:00', $now . ' 23:59:59'])->count('id');

                //
                $totalComplete = Order::where('admin_id', Auth::user()->id)->where('o_status', 5)->whereBetWeen('orders.created_at', [$sub7days . ' 00:00:00', $now . ' 23:59:59'])->count('id');
                if (isset($totalDon) && $totalDon > 0) {
                    $completeRatio = ($totalComplete / $totalDon) * 100;
                } else {
                    $completeRatio  = 0;
                }

        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $RevenueOfMeDay = Order::whereBetWeen('orders.created_at', [$dauthangtruoc,$cuoithangtruoc])
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');

             // Tổng đơn được giaO
             $totalDon = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$dauthangtruoc,$cuoithangtruoc])->count('id');

             //
             $totalComplete = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$dauthangtruoc,$cuoithangtruoc])->count('id');
             if (isset($totalDon) && $totalDon > 0) {
                 $completeRatio = ($totalComplete / $totalDon) * 100;
             } else {
                 $completeRatio  = 0;
             }

        } elseif ($data['dashboard_value'] == 'thangnay') {
            $RevenueOfMeDay = Order::whereBetWeen('orders.created_at', [$dauthangnay,$now])
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');

             // Tổng đơn được giaO
             $totalDon = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$dauthangnay,$now])->count('id');

             //
             $totalComplete = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$dauthangnay,$now])->count('id');
             if (isset($totalDon) && $totalDon > 0) {
                 $completeRatio = ($totalComplete / $totalDon) * 100;
             } else {
                 $completeRatio  = 0;
             }

        } else {
            $RevenueOfMeDay = Order::whereBetWeen('orders.created_at', [$sub365days,$now])
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');

             // Tổng đơn được giaO
             $totalDon = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$sub365days,$now])->count('id');

             //
             $totalComplete = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$sub365days,$now])->count('id');
             if (isset($totalDon) && $totalDon > 0) {
                 $completeRatio = ($totalComplete / $totalDon) * 100;
             } else {
                 $completeRatio  = 0;
             }
        }
        return \response([
            'data'      => $RevenueOfMeDay,
            'tongdon'   => $totalDon,
            'donhoanthanh' => $totalComplete,
            'tylehoanthanh' => $completeRatio
        ]);
    }



    public function filter_data(Request $request)
    {
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc =  Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();

        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        //doanh thu của tôi

        $tungay = $data['tungay'];
        $denngay = $data['denngay'];

        $RevenueOfMeDay = Order::whereBetWeen('orders.created_at', [$tungay . ' 00:00:00', $denngay . ' 23:59:59'])
            ->where('admin_id', Auth::user()->id)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');

               // Tổng đơn được giaO
            $totalDon = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$tungay . ' 00:00:00', $denngay . ' 23:59:59'])->count('id');

               //
            $totalComplete = Order::where('admin_id', Auth::user()->id)->whereBetWeen('orders.created_at', [$tungay . ' 00:00:00', $denngay . ' 23:59:59'])->count('id');
            if (isset($totalDon) && $totalDon > 0) {
                   $completeRatio = ($totalComplete / $totalDon) * 100;
            } else {
                $completeRatio  = 0;
            }

        if (isset($RevenueOfMeDay) && $RevenueOfMeDay) {
            return \response([
                'data'      => $RevenueOfMeDay,
                'tongdon'   => $totalDon,
                'donhoanthanh' => $totalComplete,
                'tylehoanthanh' => $completeRatio
            ]);
        } else {
            return \response([
                "status" => false,
                'error'      => "không có dữ liệu"
            ]);
        }
    }
}
