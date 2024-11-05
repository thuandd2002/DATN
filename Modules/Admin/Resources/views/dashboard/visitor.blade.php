<style>
    .main {
        background: white;
        padding: 30px;
    }
    @media screen and (max-width: 425px){
        .size-top{
            font-size: 12px;
        }
        .top-name{
            font-size: 12px;
        }
    }
</style>
@extends('admin::layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" />


    <main class="main">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h2 class="font-weight-bolder mb-0">Dashboard</h2>
                </nav>
            </div>
        </nav>
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
        <div class="container-fluid mb-5">
            <div class="morris-chart">
                <div>
                    <h4>Doanh thu của từng xe theo ngày</h4>
                    <div id="myfirstchart" style="height:250px"></div>
                </div>
                <div>
                    <h4>Doanh thu của từng xe đã trừ hết chi phí</h4>
                    <div id="myfirstchart2" style="height:250px"></div>
                </div>
            </div>
        </div>
        {{-- <div class="container-fluid">
            <div class="form-group">
                <label>Tùy chọn theo ngày tháng năm hiện tại</label>
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
                {{-- <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Tổng doanh thu bán xe ra</p>
                                <h4 class="mb-0" id="doanhThu">
                                    {{ isset($totalRevenue) ? number_format($totalRevenue, 0, ',', '.') : '' }}
                                    VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Lợi nhuận</p>
                                <h4 class="mb-0" id="loiNhuan">
                                    {{ isset($totalLn) ? number_format($totalLn, 0, ',', '.') : '' }}
                                    VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Chi phí (giá nhập +  giá sửa chữa)</p>
                                <h4 class="mb-0" id="chiPhi">
                                    {{ isset($totalCp) ? number_format($totalCp, 0, ',', '.') : '' }} VND</h4>
                            </div>
                        </div>
                    </div>
                </div> --}}
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
                </div>
                <div class="col-lg-4 mt-4 mb-3">
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
            </div>
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>BXH NHÂN VIÊN</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">Từ trước đến nay</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STT
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Họ Tên
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Số lượng đơn chốt
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bxhStaff as $index => $staff)
                                            @forelse($soDonChot as $soDonChotn)
                                                @if ($staff->id == $soDonChotn->admin_id)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    {{ $index + 1 }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">
                                                                    {{ isset($staff->name) ? $staff->name : '' }}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="text-xs font-weight-bold"> {{ $soDonChotn->soDon }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card h-100" style="overflow: scroll;">
                        <div class="card-header pb-0">
                            <h6 style="margin-bottom: 53px;">Top 5 xe được đặt lịch xem nhiều nhất</h6>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" style="min-width: 80px" class="size-top">STT</th>
                                    <th scope="col" style="min-width: 200px" class="size-top">Name</th>
                                    <th scope="col" style="min-width: 130px" class="size-top">Lượt Xem</th>
                                    <th scope="col" style="min-width: 130px" class="size-top">Lượt Đặt</th>
                                    <th scope="col" style="min-width: 100px" class="size-top">Mua</th>
                                    <th scope="col" style="min-width: 100px" class="size-top">Hủy</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">


                                @foreach ($product_view as $index => $view)
                                    @foreach ($abc as $a)
                                        @if ($a->o_product_id == $view->id)
                                            <tr>
                                                <td scope="row" style="text-align: center;"  class="top-name">{{ $index + 1 }}</td>
                                                <td style="text-align: left;" class="top-name">{{ $view->pro_name }}</td>
                                                <td  class="top-name">{{ $view->pro_view }}</td>
                                                <td  class="top-name">{{ $a->soluong }}</td>
                                                <td  class="top-name">
                                                    @foreach ($daMua as $mua)
                                                        @if ($mua->o_product_id == $view->id)
                                                            {{ $mua->soluong }}
                                                        @endif
                                                    @endforeach

                                                </td>
                                                <td class="text-danger top-name">
                                                    @foreach ($daHuy as $huy)
                                                        @if ($huy->o_product_id == $view->id)
                                                            {{ $huy->soluong }}</p>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <footer class="footer py-4  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">

                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Khách hàng đang chờ lấy xe</h6>
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
                                                Trạng thái
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Thời gian đặt cọc
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Thời gian hết hạn cọc
                                            </th>
                                            <!-- <th class="text-secondary opacity-7"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $o)

                                            @foreach ($user as $u)
                                                @if ($u->id == $o->o_guest_id)
                                                    @php
                                                        
                                                        $ngayHethan = \Carbon\Carbon::parse($o->updated_at)->addDay(+15);
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                            
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $u->name }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">
                                                                        {{ $u->email }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $u->phone }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">Đang chờ lấy
                                                                xe</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-bold">{{ $o->updated_at }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-bold">{{ $ngayHethan }}</span>
                                                        </td>
                                                        <!-- <td class="align-middle">
                                                            <a href="api-admin/order"
                                                                class="text-secondary font-weight-bold text-xs"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Quản lý
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
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
        </div>
        {{--        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

        <div class="container-fluid">
            <div>
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                const ctx = document.getElementById('chart-bars');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Doanh thu', 'Lợi nhuận', 'Chi phí'],
                        datasets: [{
                            label: 'Tổng doanh thu theo ngày',
                            data: [<?php echo $totalRevenueDay; ?>, <?php echo $totalLnDay; ?>, <?php echo $totalCpDay; ?>],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                const cl = document.getElementById('chart-line');

                new Chart(cl, {
                    type: 'line',
                    data: {
                        labels: ['Doanh thu', 'Lợi nhuận', 'Chi phí'],
                        datasets: [{
                            label: 'Tổng doanh thu theo tháng',
                            data: [<?php echo $totalRevenueMonth; ?>, <?php echo $totalLnMonth; ?>, <?php echo $totalCpMonth; ?>],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                const clt = document.getElementById('chart-line-tasks');

                new Chart(clt, {
                    type: 'bar',
                    data: {
                        labels: ['Doanh thu', 'Lợi nhuận', 'Chi phí'],
                        datasets: [{
                            label: 'Tổng doanh thu theo năm',
                            data: [<?php echo $totalRevenueYear; ?>, <?php echo $totalLnYear; ?>, <?php echo $totalCpYear; ?>],
                            borderWidth: 1,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 205, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(201, 203, 207, 0.2)'
                            ],
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </main>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var selectDt = $("#selectDt");
        var doanhThu = $("#doanhThu");
        var loiNhuan = $("#loiNhuan");
        var chiPhi = $("#chiPhi");
        selectDt.change(function() {
            if (selectDt.val() == 0) {
                doanhThu.html("{{ number_format($totalRevenueDay, 0, ',', '.') }} VND");
                loiNhuan.html("{{ number_format($totalLnDay, 0, ',', '.') }} VND");
                chiPhi.html("{{ number_format($totalCpDay, 0, ',', '.') }} VND");
            } else if (selectDt.val() == 1) {
                doanhThu.html("{{ number_format($totalRevenueDay, 0, ',', '.') }} VND");
                loiNhuan.html("{{ number_format($totalLnDay, 0, ',', '.') }} VND");
                chiPhi.html("{{ number_format($totalCpDay, 0, ',', '.') }} VND");
            } else if (selectDt.val() == 2) {
                doanhThu.html("{{ number_format($totalRevenueMonth, 0, ',', '.') }} VND");
                loiNhuan.html("{{ number_format($totalLnMonth, 0, ',', '.') }} VND");
                chiPhi.html("{{ number_format($totalCpMonth, 0, ',', '.') }} VND");
            } else if (selectDt.val() == 3) {
                doanhThu.html("{{ number_format($totalRevenueYear, 0, ',', '.') }} VND");
                loiNhuan.html("{{ number_format($totalLnYear, 0, ',', '.') }} VND");
                chiPhi.html("{{ number_format($totalCpYear, 0, ',', '.') }} VND");
            }

        })
    </script>

    <script>
        var chart_filter = Morris.Bar({
    
            element: 'myfirstchart',
            lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
            parseTime:false,
            xkey: 'previod',
            hideHover:'auto',
            ykeys: ['revenue_excluding_expenses','quantity','the_amount_of_car_sales_received'],
            labels: ['Tổng tiền xe bán ra','Số lượng xe đã bán được','Đã nhận đủ số tiền bán xe']
        });

        var chart_filter_doanh_thu = Morris.Bar({
    
    element: 'myfirstchart2',
    lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
    parseTime:false,
    xkey: 'name',
    hideHover:'auto',
    ykeys: ['count','doanhthubanra','gianhap','giasuachua','lai'],
    labels: ['Số lượng xe bán ra','Doanh thu bán ra','Giá nhập','Giá sửa chữa','Lãi thu về']
});

        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: '{{ route("ajax.dashboard.filter") }}',
                    type: 'POST',
                    dataType: 'json',
                    data:{dashboard_value:dashboard_value,_token:_token},
                })
                .done(function (result) {
                    if(result.data.length < 1){
                        alert("Không có dữ liệu");
                        $(".morris-chart").hide();
                        return false;
                    }else{
                        $(".morris-chart").show();
                    chart_filter.setData(result.data);
                    chart_filter_doanh_thu.setData(result.doanhthutungxe);
                    }
                  
                })

            
        })

        
        $("#btn-dashboard-filter").click(function(){
            var tungay = $(".tungay").val();
            var denngay = $(".denngay").val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: '{{ route("ajax.dashboard.filter.day") }}',
                    type: 'POST',
                    dataType: 'json',
                    data:{tungay:tungay,denngay:denngay,_token:_token},
                })
                .done(function (result) {
                    console.log(result);
                    if(result.error){
                        $(".morris-chart").hide();
                        alert("Không tồn tại dữ liệu");
                    }else{
                        $(".morris-chart").show();
                        chart_filter.setData(result.data);
                        chart_filter_doanh_thu.setData(result.doanhthutungxe);
                    }
                  
                })

            
        })

        function filter30Days(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: '{{ route("ajax.dashboard.filter") }}',
                    type: 'POST',
                    dataType: 'json',
                    data:{dashboard_value:'thangnay',_token:_token},
                })
                .done(function (result) {
                    // console.log(result);
                    chart_filter.setData(result.data);
                    chart_filter_doanh_thu.setData(result.doanhthutungxe);
                })
        };
        filter30Days();
    </script>
@endsection()
