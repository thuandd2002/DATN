@extends('admin::layouts.master')
@section('titlePage','Trang quản trị Hệ Thống')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li> -->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                    <a class="btn" href="#">
                        <i class="icon-speech"></i>
                    </a>
                    <a class="btn" href="./">
                        <i class="icon-graph"></i> &nbsp;Dashboard</a>
                    {{-- <a class="btn" href="#">
                        <i class="icon-settings"></i> &nbsp;Settings</a> --}}
                </div>
            </li>
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <link rel="stylesheet" href="https://coreui.io/demo/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-header">KHÁCH HÀNG</div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm datatable">
                                            <thead>
                                            <tr>
                                                {{-- <th width="5%">[id]</th> --}}
                                                <th width="5%">Avatar</th>
                                                <th>Họ tên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Thời gian đăng kí</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($guests)

                                                    <?php $image = "https://st4.depositphotos.com/4329009/19956/v/600/depositphotos_199564354-stock-illustration-creative-vector-illustration-default-avatar.jpg"; ?>

                                                @foreach($guests as $guest)
                                                    <tr>
                                                        {{-- <td>[{{ $guest->id }}]</td> --}}
                                                        <td>
                                                            <img src="{{ $guest->avatar ===  NULL ?  $image : $guest->avatar  }}"
                                                                 style="width: 30px;height: 30px;border-radius: 50%"
                                                                 alt=""></td>
                                                        <td>{{ $guest->name }}</td>
                                                        <td>{{ $guest->email }}</td>
                                                        <td>{{ $guest->phone }}</td>
                                                        <td>
                                                            <span class="badge badge-success">{{ $guest->created_at }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Khách hàng comment</div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm datatable">
                                            <thead>
                                            <tr>
                                                <th width="15%">Họ tên</th>
                                                <th width="15%">Email</th>
                                                <th width="30%">Nội dung</th>
                                                <th width="10%">Thời gian</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($comments)
                                                @foreach($comments as $comment)
                                                    @if (isset($comment->user))
                                                        <tr>
                                                            <td>{{ isset($comment->user) ?  $comment->user->name  : ''}}</td>
                                                            <td>{{ isset($comment->user) ? $comment->user->email : ''}}</td>
                                                            <td>{{ $comment->com_message }}</td>
                                                            <td>
                                                                <span class="badge badge-success">{{ $comment->created_at }}</span>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header">Thống kê dữ liệu</div>
                                    <div class="card-body">
                                        <ul>
                                            <li>Khách Hàng : {{ count($guests) }}</li>
                                            <li>Comment : {{ count($comments) }}</li>
                                            <li>Ô tô : {{ ($product) }}</li>
                                            <li>Bài viết : {{ ($posts) }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">Lịch xem hôm nay ngày : {{ $current }} <br> Số lượng : {{ $order->count() }} </div>
                                    <div class="card-body">
                                        <ol>
                                            @foreach($order as $o)
                                                @foreach($user as $u)
                                                    @if($u->id == $o->o_guest_id)
                                                        <li>Khách hàng : {{ $u-> name }} <br> SDT: <a href="tel:{{ $u-> phone }}">{{ $u-> phone }}</a>  <br> Địa chỉ : {{ $u-> address }}</li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @if($order->count()==0)
                                                <span>Không có dữ liệu</span>
                                            @endif
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://coreui.io/demo/vendors/jquery/js/jquery.min.js"></script>
    <script src="https://coreui.io/demo/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="https://coreui.io/demo/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="https://coreui.io/demo/js/datatables.js"></script>
@endsection