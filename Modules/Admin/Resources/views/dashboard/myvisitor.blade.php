<style>
    .main {
        background: white;
        padding: 30px;
    }

</style>
@extends('admin::layouts.master')
@section('content')
    <main class="main">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur"
             data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h2 class="font-weight-bolder mb-0">Số liệu thống kê của tôi</h2>
                </nav>
            </div>
        </nav>
            @if(isset($totalDonXuly) && $totalDonXuly>0)
                <div class="alert alert-primary alert-dismissible text-white" role="alert">
                    <span class="text-sm">Bạn có {{$totalDonXuly}} đơn chờ xử lý</span>
                </div>
            @endif

            <div class="container-fluid">
                <form autocomplete="off">
                    @csrf 
                    <div class="row">
                        <div class="col-md-3">
                            <p>Từ ngày : <input type="date" id="datepicker" class="form-control tungay"></p>
                            <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                        </div>
                        <div class="col-md-3">
                            <p>Đến ngày: <input type="date" id="datepicker" class="form-control denngay"></p>
                        </div>
                        <div class="col-md-3">
                            <p>Lọc theo: 
                                <select name="" id="" class="dashboard-filter form-control">
                                    <option>--Chọn--</option>
                                    <option value="7ngay">7 ngày qua</option>
                                    <option value="thangtruoc">Tháng trước</option>
                                    <option value="thangnay">Tháng này</option>
                                    <option value="365ngayqua">365 ngày qua</option>
                                </select>
                            </p>
                        </div>
                    </div>
                </form>
            </div>

        {{-- <div class="container-fluid">
            <div class="form-group">
                <label>Tùy chọn</label>
                <select id="selectDt" class="form-control">
                    <option value="0">Tổng hợp</option>
                    <option value="1">Ngày</option>
                    <option value="2">Tháng</option>
                    <option value="3">Năm</option>
                </select>
            </div>
        </div> --}}
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Tổng doanh thu</p>
                                <h4 class="mb-0"
                                    id="doanhThu">{{ isset($RevenueOfMe) ? number_format($RevenueOfMe,0,',','.') : '' }}VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role[0]['id'] === 1)
                <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Lợi nhuận</p>
                                <h4 class="mb-0"
                                    id="loiNhuan">{{ isset($totalLn) ? number_format($totalLn,0,',','.') : '' }}VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Chi phí</p>
                                <h4 class="mb-0"
                                    id="chiPhi">{{ isset($totalCp) ? number_format($totalCp,0,',','.') : '' }}VND</h4>
                            </div>
                        </div>
                    </div>

                    
                </div>

                @endif
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                           Tổng đơn được giao: <span class="tongdonduocgiao">
                            {{isset($totalDon) ? $totalDon : ''}}</span> / Hoàn thành: <span class="tongdonhoanthanh">{{isset($totalDonHoanThanh) ? $totalDonHoanThanh : ''}}</span><br>
                            Tỉ lệ hoàn thành: <span class="tylehoanthanh"> {{isset($completeRatio) ? $completeRatio : ''}}</span> %
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                {{-- <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="212" width="450"
                                            style="display: block; box-sizing: border-box; height: 170px; width: 360.7px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transpmb-3arent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="212" width="450"
                                            style="display: block; box-sizing: border-box; height: 170px; width: 360.7px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-tasks" class="chart-canvas" height="212" width="450"
                                            style="display: block; box-sizing: border-box; height: 170px; width: 360.7px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
               
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">money</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Lương cứng</p>
                                    <h4 class="mb-0"
                                        id="doanhThu">{{ isset($luongCung) ? number_format($luongCung,0,',','.') : '' }}VND</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">money</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Hoa hồng tháng này</p>
                                    <h4 class="mb-0"
                                        id="doanhThu">{{ isset($luongRose) ? number_format($luongRose,0,',','.') : '' }}VND</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">money</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Tổng lương tháng này</p>
                                    <h4 class="mb-0"
                                        id="doanhThu">{{ isset($luongCung) ? number_format($luongCung + $luongRose,0,',','.') : '' }}VND</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Khách hàng hẹn lấy xe trong ngày hôm nay  ({{ date('d-m-Y', strtotime($day_today))}})</h6>
                               
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Khách hàng
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Số điện thoại
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Ô tô
                                            </th>
                                            <!-- <th class="text-secondary opacity-7"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_customer_today as $o_item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $o_item->user->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{  $o_item->user->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{  $o_item->user->phone }}</span>
                                            </td>

                                            <td class="">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{  $o_item->product->pro_name }}</span>
                                            </td>

                                        </tr>
                
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection()

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var selectDt = $("#selectDt");
        var doanhThu = $("#doanhThu");
        var loiNhuan = $("#loiNhuan");
        var chiPhi = $("#chiPhi");
        selectDt.change(function () {
            if (selectDt.val() == 0) {
                doanhThu.html("{{number_format($RevenueOfMe,0,',','.')}} VND");
                loiNhuan.html("{{number_format($totalLn,0,',','.')}} VND");
                chiPhi.html("{{number_format($totalCp,0,',','.')}} VND");
            } else if (selectDt.val() == 1) {
                doanhThu.html("{{number_format($RevenueOfMeDay,0,',','.')}} VND");
                loiNhuan.html("{{number_format($myLnDay,0,',','.')}} VND");
                chiPhi.html("{{number_format($myCpDay,0,',','.')}} VND");
            } else if (selectDt.val() == 2) {
                doanhThu.html("{{number_format($RevenueOfMeMonth,0,',','.')}} VND");
                loiNhuan.html("{{number_format($myLnMonth,0,',','.')}} VND");
                chiPhi.html("{{number_format($myCpMonth,0,',','.')}} VND");
            } else if (selectDt.val() == 3) {
                doanhThu.html("{{number_format($RevenueOfMeYear,0,',','.')}} VND");
                loiNhuan.html("{{number_format($myLnYear,0,',','.')}} VND");
                chiPhi.html("{{number_format($myCpYear,0,',','.')}} VND");
            }

        })
    </script>


    <script>

        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: '{{ route("get.my-chart.current") }}',
                    type: 'POST',
                    dataType: 'json',
                    data:{dashboard_value:dashboard_value,_token:_token},
                })
                .done(function (resultss) {
                   
                    let price_doanh_thu = resultss.data;
                      doanhThu.html(price_doanh_thu.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                    $(".tongdonduocgiao").html(resultss.tongdon)
                    $(".tongdonhoanthanh").html(resultss.donhoanthanh)
                    $(".tylehoanthanh").html(resultss.tylehoanthanh)
                    
                })

            
        });

        

        $("#btn-dashboard-filter").click(function(){
            var tungay = $(".tungay").val();
            var denngay = $(".denngay").val();
            var _token = $('input[name="_token"]').val();
            var doanhThus = $("#doanhThu");
            $.ajax({
                    url: '{{ route("get.my-chart.filter") }}',
                    type: 'POST',
                    dataType: 'json',
                    data:{tungay:tungay,denngay:denngay,_token:_token},
                })
                .done(function (results) { 
                    if(results.error){
                        let price_doanh_thu = 0;
                        doanhThu.html(price_doanh_thu.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                        $(".tongdonduocgiao").html(0)
                    $(".tongdonhoanthanh").html(0)
                    $(".tylehoanthanh").html(0)
                    }else{
                        let price_doanh_thu = results.data;
                      doanhThu.html(price_doanh_thu.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                      $(".tongdonduocgiao").html(results.tongdon)
                    $(".tongdonhoanthanh").html(results.donhoanthanh)
                     $(".tylehoanthanh").html(results.tylehoanthanh)
                    }
                    
                  

                })

            
        })
    </script>
@endsection()
