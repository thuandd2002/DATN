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
                    <h2 class="font-weight-bolder mb-0">Dashboard</h2>
                </nav>
            </div>
        </nav>
        <div class="form-group">
            <label>Tùy chọn</label>
            <select id="selectDt" class="form-control">
                <option value="0">Tổng hợp</option>
                <option value="1">Ngày</option>
                <option value="2">Tuần</option>
                <option value="3">Tháng</option>
                <option value="4">Năm</option>
            </select>
        </div>
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
                                    id="doanhThu">{{ isset($totalRevenue) ? number_format($totalRevenue,0,',','.') : '' }}
                                    VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">money</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Lợi nhuận</p>
                                <h4 class="mb-0"
                                    id="loiNhuan">{{ isset($totalLn) ? number_format($totalLn,0,',','.') : '' }}
                                    VND</h4>
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
                                    id="chiPhi">{{ isset($totalCp) ? number_format($totalCp,0,',','.') : '' }} VND</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
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
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
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
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Họ Tên
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Số lượng đơn chốt
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bxhStaff as $index => $staff)
                                        @forelse($soDonChot as $soDonChotn)
                                            @if($staff->id == $soDonChotn->admin_id)
                                                <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        {{$index+1}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"> {{isset($staff->name) ? $staff->name : '' }}</h6>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">  {{ $soDonChotn->soDon }} </span>
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
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Top 5 xe được đặt lịch xem nhiều nhất</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    @foreach($product_view as $index => $view)
                                        @foreach($abc as  $a)
                                            @if($a->o_product_id == $view->id)
                                                <div class="timeline-block mb-3">
                                                    <span class="timeline-step">{{$index+1}}</span>
                                                    <div class="timeline-content">
                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                            {{ $view->pro_name }}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Lượt
                                                            xem: {{$view->pro_view}}</h6>
                                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $a->soluong }}
                                                            Lượt đặt xem <br>
                                                            @foreach($daMua as  $mua)
                                                                @if($mua->o_product_id == $view->id)
                                                                    Mua : {{$mua->soluong}}
                                                                @endif
                                                            @endforeach
                                                            @foreach($daHuy as  $huy)
                                                                @if($mua->o_product_id == $view->id)
                                                                    / Hủy : {{ $huy->soluong }}</p>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Khách hàng
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Số điện thoại
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Trạng thái
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thời gian đặt cọc
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Thời gian hết hạn cọc
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order as $o)

                                        @foreach($user as $u)
                                            @if($u->id == $o->o_guest_id)
                                                @php

                                                    $ngayHethan = \Carbon\Carbon::parse($o->updated_at)->addDay(+15)
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="../assets/img/team-2.jpg"
                                                                     class="avatar avatar-sm me-3 border-radius-lg"
                                                                     alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{$u->name}}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{$u->email}}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{$u->phone}}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-success">Đang chờ lấy xe</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">{{  $o->updated_at  }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">{{   $ngayHethan  }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="api-admin/order"
                                                           class="text-secondary font-weight-bold text-xs"
                                                           data-toggle="tooltip" data-original-title="Edit user">
                                                            Quản lý
                                                        </a>
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
            </div>
        </div>
        {{--        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}

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
                            data: [<?php echo $totalRevenueDay ?>,<?php echo $totalLnDay ?>,<?php echo $totalCpDay ?>],
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
                            data: [<?php echo $totalRevenueMonth ?>,<?php echo $totalLnMonth ?>,<?php echo $totalCpMonth ?>],
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
                            data: [<?php echo $totalRevenueYear ?>,<?php echo $totalLnYear ?>,<?php echo $totalCpYear ?>],
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        var selectDt = $("#selectDt");
        var doanhThu = $("#doanhThu");
        var loiNhuan = $("#loiNhuan");
        var chiPhi = $("#chiPhi");
        selectDt.change(function () {
            if (selectDt.val() == 0) {
                doanhThu.html(<?php echo $totalRevenue ?>);
                loiNhuan.html(<?php echo $totalLn ?>)
                chiPhi.html(<?php echo $totalCp ?>)
            } else if (selectDt.val() == 1) {
                doanhThu.html(<?php echo $totalRevenueDay ?>);
                loiNhuan.html(<?php echo $totalLnDay ?>)
                chiPhi.html(<?php echo $totalCpDay ?>)
            } else if (selectDt.val() == 2) {
                doanhThu.html(<?php echo $totalRevenueWeek ?>);
                loiNhuan.html(<?php echo $totalLnWeek ?>)
                chiPhi.html(<?php echo $totalCpWeek ?>)
            } else if (selectDt.val() == 3) {
                doanhThu.html(<?php echo $totalRevenueMonth ?>);
                loiNhuan.html(<?php echo $totalLnMonth ?>)
                chiPhi.html(<?php echo $totalCpMonth ?>)
            } else if (selectDt.val() == 4) {
                doanhThu.html(<?php echo $totalRevenueYear ?>);
                loiNhuan.html(<?php echo $totalLnYear ?>)
                chiPhi.html(<?php echo $totalCpYear ?>)
            }

        })
    </script>
@endsection()


