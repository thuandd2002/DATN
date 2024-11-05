<?php

namespace Modules\Admin\Http\Controllers;

use App\HelpersClass\Date;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\Admin\Admin;
use Modules\Admin\Models\Information\Information;
use Modules\Admin\Models\Visitor\Visitor;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Models\Article\Article;
use Modules\Admin\Models\Order\Order;
use Modules\Product\Models\Product;
use PDO;

use function GuzzleHttp\Promise\all;

class DashboardController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->id != 1) {
            return view('errors.404');
        }
        //get ip address 
        $user_id_address = $request->ip();

        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();

        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $early_this_month =  Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();

        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subDay(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        //total visitors
        $visitors_all_count = Visitor::all()->count();
        //current online 
        $visitors_current = Visitor::where('ip', $user_id_address)->get();
        $visitor_count = $visitors_current->count();
        if ($visitor_count < 1) {
            $visitor = new Visitor();
            $visitor->ip = $user_id_address;
            $visitor->date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }

        //total last month 
        $visitor_of_last_month = Visitor::whereBetWeen('date', [$early_last_month, $end_of_last_month])->get();

        $visitor_of_last_month_count = $visitor_of_last_month->count();

        // total this month 
        $visitor_of_this_month = Visitor::whereBetWeen('date', [$early_this_month, $now])->get();

        $visitor_of_this_month_count = $visitor_of_this_month->count();

        //total in one year
        $visitor_of_year = Visitor::whereBetWeen('date', [$oneyears, $now])->get();
        $visitor_of_year_count = $visitor_of_year->count();

        //get visitor
        $visitors = Visitor::select('date', DB::raw('count(*) as total'))->where('date', '>', today()->subMonth())->groupBy('date')->get();
        $chart_data = array();
        foreach ($visitors as $data) {
            array_push($chart_data, array($data->date->format('d.m.Y'), $data->total));
        }


        //product 
        $product = Product::all()->count();
        $article = Article::all()->count();
        $product_view = Product::all();
        $bxhStaff = Admin::all();
        // thống kê 1 xe có bao nhiêu người đặt xe trong 1 tháng
        $orders_month = DB::table('orders')
            ->select('o_product_id', 'products.pro_name', DB::raw('count(o_guest_id) as total_guest'))
            ->whereBetWeen('orders.created_at', [$early_this_month . ' 00:00:00', $now . ' 23:59:59'])
            ->whereIn('orders.o_status', [5])
            ->groupBy('o_product_id')
            ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
            ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
            ->get();

        $orders_day = DB::table('orders')
            ->select('o_product_id', 'products.pro_name', DB::raw('count(o_guest_id) as total_guest'))
            ->where('orders.created_at', '>=', Carbon::today('Asia/Ho_Chi_Minh')->toDateString())
            ->where('orders.o_status', '=', 5)
            ->groupBy('o_product_id')
            ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
            ->rightJoin('users', 'orders.o_guest_id', '=', 'users.id')
            ->get();




        $order_product_name = [];
        $order_total_guest = [];

        $order_product_name_now = [];
        $order_total_guest_now = [];

        foreach ($orders_day as $value_day) {
            if ($value_day->pro_name !== null) {
                array_push($order_product_name_now, $value_day->pro_name);
                array_push($order_total_guest_now, $value_day->total_guest);
            }
        }

        foreach ($orders_month as $value) {
            if ($value->pro_name !== null) {
                array_push($order_product_name, $value->pro_name);
                array_push($order_total_guest, $value->total_guest);
            }
        }
        //
        $listDay = Date::getListDayInMonth();
        // dd($listDay);

        // xe được mua nhiều nhất

        //doanh thu
        // DB::enableQueryLog();
        $totalRevenueDay = Order::where('created_at', '>=' , Carbon::now()->format('Y-m-d'))
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
        // dd(DB::getQueryLog());
        // dd($totalRevenueDay);

        $totalRevenueMonth = Order::whereMonth('created_at', Carbon::now()->month)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
            
        $totalRevenueYear = Order::whereYear('created_at', Carbon::now()->year)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');
        $totalRevenue = Order::where('o_status', 5)
            ->where('get_money', 1)
            ->sum('unified_price');


        // * giá nhập
        // DB::enableQueryLog();
        $totalGnDay = Product::whereDate('created_at', Carbon::now()
            ->format('Y-m-d'))
            ->sum('pro_price_import');
        // dd(DB::getQueryLog());

        $totalGnMonth = Product::whereMonth('created_at', Carbon::now()->month)
            ->sum('pro_price_import');
        $totalGnYear = Product::whereYear('created_at', Carbon::now()->year)
            ->sum('pro_price_import');
        $totalGn = Product::all()
            ->sum('pro_price_import');
    
        // * giá sửa chữa
        $totalGxcDay = Product::whereDate('created_at', Carbon::now()
            ->format('Y-m-d'))
            ->sum('pro_price_repair');

        $totalGxcMonth = Product::whereMonth('created_at', Carbon::now()->month)
            ->sum('pro_price_repair');

        $totalGxcYear = Product::whereYear('created_at', Carbon::now()->year)
            ->sum('pro_price_repair');
            
        $totalGxc = Product::all()
            ->sum('pro_price_repair');

        // chi phí
        $totalCpDay = $totalGnDay + $totalGxcDay ;

        $totalCpMonth = $totalGnMonth + $totalGxcMonth ;
        $totalCpYear = $totalGnYear + $totalGxcYear ;
        $totalCp = $totalGn + $totalGxc ;
        $target = Information::all()->sum('if_target');

        // Lợi nhuận
        $totalLnDay = $totalRevenueDay - $totalCpDay;
        $totalLnMonth = $totalRevenueMonth - $totalCpMonth;
        $totalLnYear = $totalRevenueYear - $totalCpYear;
        $totalLn = $totalRevenue - $totalCp;
    
        // bxh lượt đặt
        // thoong ke kh xem xe
        $abc = Order::selectRaw("count(o_product_id) as soluong ,id,o_product_id")->groupBy('o_product_id')->get();
        $daMua = Order::selectRaw("count(o_product_id) as soluong ,id,o_product_id")->where('o_status', 5)->groupBy('o_product_id')->get();
        $daHuy = Order::selectRaw("count(o_product_id) as soluong ,id,o_product_id")->where('o_status', 6)->groupBy('o_product_id')->get();
        // bhx lượt mua
        $buyCarDay = Order::whereDate('updated_at', Carbon::now()->format('Y-m-d'))->selectRaw("count(o_product_id) as soluong ,id,o_product_id")->where('o_status', 5)->groupBy('o_product_id')->get()->toArray();

        $buyCarMoth = Order::whereMonth('updated_at', Carbon::now()->month)->selectRaw("count(o_product_id) as soluong ,id,o_product_id")->where('o_status', 5)->groupBy('o_product_id')->get()->toArray();
        $buyCarYear = Order::whereYear('updated_at', Carbon::now()->year)->selectRaw("count(o_product_id) as soluong ,id,o_product_id")->where('o_status', 5)->groupBy('o_product_id')->get()->toArray();
        // doanh thu theo tháng
        $revenueTransactionMonth = Order::with(['product'])->select('o_product_id', DB::raw('DATE(orders.created_at) as date'), DB::raw('count(o_product_id) as total_product'))
            ->where('orders.o_status', '=', 5)
            ->whereMonth("orders.created_at", date("m"))
            ->groupBy('o_product_id', 'date')
            ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
            ->get()->toArray();

        $order = Order::where('o_status', 4)->get();
        $user = User::all();
        // echo count($revenueTransactionMonth) - 1;die;
        $data_date_day =  $this->muti_day($revenueTransactionMonth);
        sort($data_date_day);

        $dd_data = [];
        foreach ($data_date_day as $dd) {
            array_push($dd_data, $dd);
        }
        $data_order_day = [];
        foreach ($data_date_day as $d) {


            $data_day_order =  Order::with(['product'])->select('o_product_id', DB::raw('count(o_product_id) as total_product'))
                ->where('orders.created_at', 'like', '%' . $d . '%')
                ->groupBy('o_product_id')
                ->rightJoin('products', 'orders.o_product_id', '=', 'products.id')
                ->get()->toArray();

            array_push($data_order_day, (object)[
                'key' => $d,
                "value" => $data_day_order
            ]);
        }



        $revenueCalculation = [];

        foreach ($data_order_day as $key =>  $result) {
            $totalPro = 0;
            foreach ($result->value as $xx => $j) {
                $totalPro = $totalPro + ($j["total_product"] * $j["product"]["pro_price"]);
            }
            array_push($revenueCalculation, $totalPro);
        }

        $soDonChot =  Order::selectRaw("count(admin_id) as soDon,id,admin_id")
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->groupBy('admin_id')->get();

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
        return view('admin::dashboard.visitor', compact(
            [
                'day_today',
                'soDonChot',
                'daMua',
                'daHuy',
                'buyCarDay',
                'buyCarMoth',
                'buyCarYear',
                'order',
                'user',
                'abc',
                'target',
                'totalCpDay',
                'totalCpMonth',
                'totalCpYear',
                'totalCp',
                'totalLn',
                'totalLnDay',
                'totalLnMonth',
                'totalLnYear',
                'totalRevenueDay',
                'totalRevenueMonth',
                'totalRevenueYear',
                'totalRevenue',
                'bxhStaff',
                'visitors',
                'chart_data',
                'product',
                'article',
                'product_view',
                'visitor_count',
                'visitor_of_last_month_count',
                'visitor_of_this_month_count',
                'visitor_of_year_count',
                'visitors_all_count',
                'order_product_name',
                'order_total_guest',
                'order_product_name_now',
                'order_total_guest_now',
                'dd_data',
                'data_order_day',
                'revenueCalculation',
                'order_customer_today'
            ]
        ));
    }

    public function muti_day($array = NULL)
    {
        $dat = [];


        foreach ($array as $data) {
            $arr_day = $data['date'];
            array_push($dat, $arr_day);
        }
        return array_unique($dat);
    } // end func


    public function dashboard_filter(Request $request)
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

            $doanhthutungxe = $this->doanh_thu_tung_xe([$sub7days . ' 00:00:00', $now . ' 23:59:59']);

            $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
                DB::raw("(DATE_FORMAT(orders.created_at, '%d-%m-%Y')) as my_date"),
                DB::raw("(COUNT(orders.created_at)) as count_product"),
                DB::raw("(SUM(unified_price)) as tong_doanh_thu_ban_xe"),
                DB::raw("(SUM(export_car_customer)) as so_xe_da_lay"),
                DB::raw("(SUM(get_money)) as da_thanh_toan_het_tien")
            )
                ->whereBetWeen('orders.created_at', [$sub7days . ' 00:00:00', $now . ' 23:59:59'])
                ->where('o_status', 5)
                ->where('get_money', 1)
                ->groupBy(DB::raw('Date(orders.created_at)'))
                ->orderBy("orders.created_at")
                ->get();

            foreach ($get as $key => $val) {

                $chart_data[] = array(
                    'previod' =>  $val->my_date,
                    'quantity' => $val->count_product,
                    'revenue_excluding_expenses' => $val->tong_doanh_thu_ban_xe,
                    'the_amount_of_car_sales_received' => $val->da_thanh_toan_het_tien
                );
            };
        }elseif($data['dashboard_value'] == 'thangtruoc'){
            
            $doanhthutungxe = $this->doanh_thu_tung_xe([$dauthangtruoc. ' 00:00:00',$cuoithangtruoc. ' 23:59:59']);
        
            $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
                DB::raw("(DATE_FORMAT(orders.created_at, '%d-%m-%Y')) as my_date"),
                DB::raw("(COUNT(orders.created_at)) as count_product"),
                DB::raw("(SUM(unified_price)) as tong_doanh_thu_ban_xe"),
                DB::raw("(SUM(export_car_customer)) as so_xe_da_lay"),
                DB::raw("(SUM(get_money)) as da_thanh_toan_het_tien")
            )
                ->whereBetWeen('orders.created_at', [$dauthangtruoc. ' 00:00:00',$cuoithangtruoc. ' 23:59:59'])
                ->where('o_status', 5)
                ->where('get_money', 1)
                ->groupBy(DB::raw('Date(orders.created_at)'))
                ->orderBy("orders.created_at")
                ->get();

                
            foreach ($get as $key => $val) {

                $chart_data[] = array(
                    'previod' =>  $val->my_date,
                    'quantity' => $val->count_product,
                    'revenue_excluding_expenses' => $val->tong_doanh_thu_ban_xe,
                    'the_amount_of_car_sales_received' => $val->da_thanh_toan_het_tien
                );
            };
        }elseif($data['dashboard_value'] == 'thangnay'){
            $doanhthutungxe = $this->doanh_thu_tung_xe([$dauthangnay. ' 00:00:00',$now. ' 23:59:59']);

            $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
                DB::raw("(DATE_FORMAT(orders.created_at, '%d-%m-%Y')) as my_date"),
                DB::raw("(COUNT(orders.created_at)) as count_product"),
                DB::raw("(SUM(unified_price)) as tong_doanh_thu_ban_xe"),
                DB::raw("(SUM(export_car_customer)) as so_xe_da_lay"),
                DB::raw("(SUM(get_money)) as da_thanh_toan_het_tien")
            )
                ->whereBetWeen('orders.created_at', [$dauthangnay. ' 00:00:00',$now. ' 23:59:59'])
                ->where('o_status', 5)
                ->where('get_money', 1)
                ->groupBy(DB::raw('Date(orders.created_at)'))
                ->orderBy("orders.created_at")
                ->get();

            foreach ($get as $key => $val) {

                $chart_data[] = array(
                    'previod' =>  $val->my_date,
                    'quantity' => $val->count_product,
                    'revenue_excluding_expenses' => $val->tong_doanh_thu_ban_xe,
                    'the_amount_of_car_sales_received' => $val->da_thanh_toan_het_tien
                );
            };
        }else{
            $doanhthutungxe = $this->doanh_thu_tung_xe([$sub365days. ' 00:00:00',$now. ' 23:59:59']);

            $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
                DB::raw("(DATE_FORMAT(orders.created_at, '%d-%m-%Y')) as my_date"),
                DB::raw("(COUNT(orders.created_at)) as count_product"),
                DB::raw("(SUM(unified_price)) as tong_doanh_thu_ban_xe"),
                DB::raw("(SUM(export_car_customer)) as so_xe_da_lay"),
                DB::raw("(SUM(get_money)) as da_thanh_toan_het_tien")
            )
                ->whereBetWeen('orders.created_at', [$sub365days. ' 00:00:00',$now. ' 23:59:59'])
                ->where('o_status', 5)
                ->where('get_money', 1)
                ->groupBy(DB::raw('Date(orders.created_at)'))
                ->orderBy("orders.created_at")
                ->get();

            foreach ($get as $key => $val) {

                $chart_data[] = array(
                    'previod' =>  $val->my_date,
                    'quantity' => $val->count_product,
                    'revenue_excluding_expenses' => $val->tong_doanh_thu_ban_xe,
                    'the_amount_of_car_sales_received' => $val->da_thanh_toan_het_tien
                );
            };
        }


        return \response([
            'data'      => $chart_data ?? [],
            'doanhthutungxe' =>  $doanhthutungxe ?? []
        ]);
    }


    public function doanh_thu_tung_xe($between = NULL){
        $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
            DB::raw("(COUNT(orders.o_product_id)) as count_product"),
            'o_product_id',
            DB::raw("(SUM(orders.unified_price)) as doanhthu"),
            'o_product_id',
            'pro_name'
        )
            ->whereBetWeen('orders.created_at', $between)
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->groupBy('orders.o_product_id')
            ->orderBy("orders.created_at")
            ->get()->toArray();

        foreach ($get as $key => $value) {
            $dttx[] = array(
                'name' => $value['pro_name'],
                'count' => $value['count_product'],
                'doanhthubanra' => $value['doanhthu'],
                'gianhap' => $value['count_product'] * $value['product']['pro_price_import'],
                'giasuachua' =>  $value['count_product'] * $value['product']['pro_price_repair'],
                'lai' => $value['doanhthu'] - ($value['count_product'] * $value['product']['pro_price_import']) - ($value['count_product'] * $value['product']['pro_price_repair'])
            );
        }
    
        if(isset($dttx) && $dttx){
            return $dttx;
        }else{
            return [];
        }
        
       
    }

    public function dashboard_filter_day(Request $request)
    {
        $data = $request->all();

       $tungay = $data['tungay'];
       $denngay = $data['denngay'];

       $doanhthutungxe = $this->doanh_thu_tung_xe([$tungay . ' 00:00:00', $denngay . ' 23:59:59']);


        $get = Order::with(['product'])->join('products', 'orders.o_product_id', '=', 'products.id')->select(
            DB::raw("(DATE_FORMAT(orders.created_at, '%d-%m-%Y')) as my_date"),
            DB::raw("(COUNT(orders.created_at)) as count_product"),
            DB::raw("(SUM(unified_price)) as tong_doanh_thu_ban_xe"),
            DB::raw("(SUM(export_car_customer)) as so_xe_da_lay"),
            DB::raw("(SUM(get_money)) as da_thanh_toan_het_tien")
        )
            ->whereBetWeen('orders.created_at', [$tungay . ' 00:00:00', $denngay . ' 23:59:59'])
            ->where('o_status', 5)
            ->where('get_money', 1)
            ->groupBy(DB::raw('Date(orders.created_at)'))
            ->orderBy("orders.created_at")
            ->get();

        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'previod' =>  $val->my_date,
                'quantity' => $val->count_product,
                'revenue_excluding_expenses' => $val->tong_doanh_thu_ban_xe,
                'the_amount_of_car_sales_received' => $val->da_thanh_toan_het_tien
            );
        };

        if(isset($chart_data) && $chart_data){
            return \response([
                'data'      => $chart_data,
                'doanhthutungxe' =>  $doanhthutungxe
            ]);
        }else{
            return \response([
                "status" => false,
                'error'      => "không có dữ liệu"
            ]);
        }
    }
}
