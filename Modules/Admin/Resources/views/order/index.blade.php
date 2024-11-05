@extends('admin::layouts.master')
@section('titlePage', 'Danh sách khách hàng')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<!-- link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')

    <main class="main">
        <ol class="breadcrumb">
           <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Danh sách lịch xem xe</li>  -->
        
        </ol>
        @if (Auth::user()->role[0]['id'] === 1)
        <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $donhuytrongngay }} khách hàng hẹn tư vấn nhưng hủy
                mua
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có <span id="soluongkhachhangcanduoctuvan">{{ $dondangxuly }}</span> khách hàng đang cần được tư vấn
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $dondadatcoctrongngay }} khách hàng đã đặt cọc
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $henngaylayxe }} khách hàng đã hẹn ngày lấy xe
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $donhoanthanhtrongngay }} khách hàng đã mua
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @else 
        <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $donhuytrongngaynhanvien }} khách hàng hẹn tư vấn nhưng hủy
                mua
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có <span id="soluongkhachhangcanduoctuvanstaff-{{Auth::user()->id}}">{{ $dondangxulynhanvien }}</span> khách hàng đang cần được tư vấn
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $dondadatcoctrongngaynhanvien }} khách hàng đã đặt cọc
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-light alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $henngaylayxenhanvien }} khách hàng đã hẹn ngày lấy xe
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hôm nay : <?php echo date('Y/m/d'); ?> : </strong> Có {{ $donhoanthanhtrongngaynhanvien }} khách hàng đã mua
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <p style="font-size: 16px ; font-weight:bold">Thông tin trạng thái khách hàng đặt
                            lịch xem xe trong thời gian qua
                        </p>
                        <div class="row">
                            <form action="" class="form-horizontal">
                                <div class="form-group col-sm-2" style="display: inline-block">
                                    <input type="number" name="id" value="{{ Request::query('id') }}"
                                        class="form-control" autocomplete="off" placeholder="nhập ID">
                                </div>
                                <div class="form-group col-sm-2" style="display: inline-block">
                                    <input type="text" name="n" value="{{ Request::query('n') }}"
                                        class="form-control" autocomplete="off" placeholder="Nhập Tên">
                                </div>
                                <div class="form-group col-sm-2" style="display: inline-block">
                                    <input type="text" name="pr" value="{{ Request::query('pr') }}"
                                        class="form-control" autocomplete="off" placeholder="Nhập Tên Ô tô">
                                </div>

                                <div class="form-group col-sm-2" style="display: inline-block">
                                    <input type="date" name="date" value="{{ Request::query('date') }}"
                                        class="form-control" autocomplete="off" placeholder="Nhập ngày muốn tra">
                                </div>

                                @if (Auth::user()->role[0]['id'] === 1)
                                    <div class="form-group col-sm-2" style="display: inline-block">
                                        <select class="form-control" name="us" id="">
                                            <option value="">__Người tư vấn__</option>
                                            @foreach ($admins as $admin)
                                                <option value="{{ $admin->id }}"
                                                    {{ Request::query('us') == $admin->id ? "selected='selected'" : '' }}>
                                                    {{ $admin->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group col-sm-2" style="display: inline-block">
                                    <select name="m" class="form-control" id="">
                                        <option value="">__Trạng thái__</option>
                                        @if ($status)
                                            @foreach ($status as $key => $st)
                                                <option value="{{ $key }}"
                                                    {{ Request::query('m') == $key && $key != 0 ? "selected='selected'" : '' }}>
                                                    {{ $st }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-sm-3" style="display: inline-block">
                                    <button class="btn btn-sm btn-outline-danger mb-3"><i class="fa fa-search"></i> Tìm
                                        kiếm
                                    </button>
                                    <a href="{{ route('get.list.orders') }}" class="btn btn-sm btn-outline-info mb-3"><i
                                            class="fa fa-refresh"></i> Refresh </a>
                                </div>




                            </form>
                            @if (Auth::user()->role[0]['id'] === 1)
                            <div class="form-group col-sm-3" style="display: inline-block">
                                <button class="btn btn-sm btn-outline-danger mb-3" id="chiadontudong"
                                    href="{{ route('post.auto.order') }}">Chia đơn tự động
                                </button>

                            </div>
                            @endif
                         
                            <div class="col-lg-12">
                                <div class="card"
                                    style="overflow-x: scroll;>
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="text-center">
                                                <th>STT</th>
                                                <th>Họ Tên</th>
                                                <th>Email</th>
                                                <th with="10%">Phone</th>
                                                <th>Ô tô</th>
                                                <th>Ngày xem xe</th>
                                                <th>Trạng thái</th>
                                                <th>Người xử lý</th>
                                                <th style="width: 140px;">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($orders as $key =>  $order)

                                                <tr class="text-center">
                                                    <td>{{ $order->id }}</td>
                                                    <td><a href="{{ route('ajax.order.preview.order', isset($order->user) ? $order->user->id : '') }}"
                                                            class=" component--preview--order">
                                                            {{ isset($order->user) ? $order->user->name : $order->name }}</a>
                                                    </td>
                                                    <td
                                                        style=" max-width: 100px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                                                        {{ isset($order->user) ? $order->user->email : $order->email }}
                                                    </td>
                                                    <td>{{ isset($order->user) ? $order->user->phone : $order->phone }}
                                                    </td>
                                                    <td
                                                        style=" max-width: 150px; overflow: hidden; white-space: nowrap;text-overflow: ellipsis;">
                                                        {{ isset($order->product) ? $order->product->pro_name : $order->pro_name }}
                                                    </td>

                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <a data-print={{ route('get.print', $order->id) }}
                                                            data-id={{ $order->id }}
                                                            data-deposit="{{ route('ajax.post.order.deposit') }}"
                                                            href="{{ route('ajax.order.preview.update', $order->id) }}"
                                                            class=" btn btn-outline-success  component--preview--order--update--{{ $order->id }}  component--preview--order--update {{ $order->o_status == 5 || $order->o_status == 6 ? 'disabled' : '' }}">

                                                            @if ($order->o_status == 0)
                                                                Edit
                                                            @else
                                                                {{ $status[$order->o_status] }}
                                                            @endif
                                                        </a>

                                                    </td>
                                                    @if (Auth::user()->role[0]['id'] !== 1)
                                                        <td>
                                                            <select
                                                            @if ($order->admin_id != 0) disabled @endif
                                                            data-id="{{ $order->id }}"
                                                                data-src="{{ route('ajax.post.order.staff') }}"
                                                                @if (Auth::user()->role[0]['id'] !== 1) disabled @endif
                                                                class="form-select px-3 component--select" name=""
                                                                id="">
                                                                <option value="">__Chọn người tư vấn__</option>
                                                                @foreach ($admins as $admin)
                                                                    @if ($admin->id == $order->admin_id)
                                                                        <option value="{{ $admin->id }}" selected>
                                                                            {{ $admin->name }}</option>
                                                                    @else
                                                                        <option value="{{ $admin->id }}">
                                                                            {{ $admin->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endif
                                                    @if (Auth::user()->role[0]['id'] === 1)
                                                        <td>
                                                            <select data-id="{{ $order->id }}"
                                                                @if ($order->admin_id !== 0) disabled @endif
                                                                data-src="{{ route('ajax.post.order.staff') }}"
                                                                class="p-2 px-3 form-select component--select"
                                                                name="" id="nguoituvan-{{ $order->id }}">
                                                                <option value="">__Chọn người tư vấn__</option>
                                                                @foreach ($admins as $admin)
                                                                    @if ($admin->id == $order->admin_id)
                                                                        <option value="{{ $admin->id }}" selected>
                                                                            {{ $admin->name }}</option>
                                                                    @else
                                                                        <option value="{{ $admin->id }}">
                                                                            {{ $admin->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ route('get.edit.order', $order->id) }}"><i
                                                                class="fa fa-edit" style="color:green"></i></a>
                                                        <a data-type='delete' id="delete-{{$order->id}}" class="comfirm_delete_ajax {{$order->o_status !== 0 ? 'd-none' : ''}}"
                                                            href="{{ route('ajax.post.order.delete', $order->id) }}"><i
                                                                class="fa fa-trash-o  " style="color:red"></i></a>


                                                        <a id="print-{{$order->id}}" class="{{$order->o_status !== 5 ? 'd-none' : ''}}" href="{{ route('get.print',$order->id) }}"><i class="fa fa-print "
                                                                style="color:orange"></i></a>
                                                        @if( \Illuminate\Support\Facades\Auth::user()->id == 1)
                                                            <a data-id={{$order->id}}  id="nhantien-{{$order->id}}"
                                                               class="nhantien btn btn-secondary text-white mt-3 mb-3  {{ $order->o_status != 5 ? 'd-none' : 'd-block' }}
                                                            {{$order->get_money === 1 ? 'disabled' : ''}}
                                                            "
                                                            data-url="{{ route('ajax.admin.get.money', isset($order) ? $order->id : '') }}">  {{$order->get_money === 1 ? "Đã nhận tiền" : "Chưa nhận tiền"}} </a>
                                                        @endif
                                                        
                                                        @if( \Illuminate\Support\Facades\Auth::user()->id == 1)
                                                             <a data-id={{$order->id}}  id="xuatxe-{{$order->id}}"
                                                            class="xuatxe btn btn-secondary text-white mt-3 mb-3  {{ $order->o_status != 5 ? 'd-none' : 'd-block' }}     {{ $order->get_money != 1 ? 'd-none' : 'd-block' }} 
                                                            {{$order->export_car_customer === 1 ? 'disabled' : ''}}
                                                            "
                                                            data-url="{{ route('ajax.export.car.customer', isset($order) ? $order->id : '') }}">  {{$order->export_car_customer === 1 ? "Đã xuất xe" : "Xuất xe"}} </a>
                                                            @endif
                                                            @if( \Illuminate\Support\Facades\Auth::user()->id !== 1)
                                                            <a target="_blank" id="xuatkho-{{$order->id}}" href="{{ route('get.print.phieuxuatxe',$order->id) }}" class="{{$order->get_money == 1 ? 'd-block' : 'd-none'}} btn btn-danger mt-3 mb-3">Phiếu xuất xe</a>
                                                            @endif
                                                      
                                                    </td>
                                                </tr>
                                            @empty
                                                <p class="mb-3 p-3"> Dữ liệu đang được cập nhật</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <div id="box--modal"></div>

@endsection
