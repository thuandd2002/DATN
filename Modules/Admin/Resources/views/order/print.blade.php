
@extends('admin::layouts.master')
@section('titlePage', 'In hợp đồng khách hàng')
@section('content')

<div class="main">
    <div class="container-fluid">
        <h3 class="p-3 text-center">Hợp đồng mua bán xe ô tô
        </h3>
        <form action="{{route('get.order.print')}}" method="POST">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Biển kiểm soát</label>
                        <input type="text" name="bienkiemsoat" class="form-control" id="bienkiemsoat">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Hôm nay ngày/tháng/năm:</label>
                        <input type="date" name="ngaythangnam" class="form-control" id="bienkiemsoat" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Địa điểm</label>
                        <input type="text" name="diadiem" class="form-control" id="bienkiemsoat" value="SHOWROOM Việt Phú Luxury">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Giá: </label>
                        <input type="text" name="gia" class="form-control" id="price">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <fieldset>
                            <legend>Bên bán:</legend>
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1">Họ và tên </label>
                                <input type="text" class="form-control" name="nameA" id="nameA" value="Việt Phú Luxury">
                                <label for="exampleInputEmail1">Ngày tháng năm sinh </label>
                                <input type="date" class="form-control" name="dateA" id="dateA">
                                <label for="exampleInputEmail1">CMND </label>
                                <input type="number" class="form-control" name="cmndA" id="cmndA">
                                <label for="exampleInputEmail1">Nơi cấp </label>
                                <input type="text" class="form-control" name="noicapA" id="noicapA">
                                <label for="exampleInputEmail1">Ngày cấp </label>
                                <input type="date" class="form-control" name="ngaycapA" id="ngaycapA">
                                <label for="exampleInputEmail1">Hộ khẩu thường chú</label>
                                <input type="text" class="form-control" name="hokhauthuongchuA"
                                    id="hokhauthuongchuA">
                                <label for="exampleInputEmail1">Nơi ở hiện tại </label>
                                <input type="text" class="form-control" name="noioA" id="noioA">
                                <label for="exampleInputEmail1">Số điện thoại </label>
                                <input type="number" class="form-control" name="phoneA" id="phoneA">
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group col-6">
                        <fieldset>
                            <legend>Bên mua:</legend>
                            <div class="form-group col-12">
                                <label for="exampleInputEmail1">Họ và tên </label>
                                <input type="text" class="form-control" name="nameB" id="nameB" value="{{$data->user->name}}">
                                <label for="exampleInputEmail1">Ngày tháng năm sinh </label>
                                <input type="date" class="form-control" name="dateB" id="dateB">
                                <label for="exampleInputEmail1">CMND </label>
                                <input type="number" class="form-control" name="cmndB" id="cmndB">
                                <label for="exampleInputEmail1">Nơi cấp </label>
                                <input type="text" class="form-control" name="noicapB" id="noicapB">
                                <label for="exampleInputEmail1">Ngày cấp </label>
                                <input type="date" class="form-control" name="ngaycapB" id="ngaycapB">
                                <label for="exampleInputEmail1">Hộ khẩu thường chú</label>
                                <input type="text" class="form-control" name="hokhauthuongchuB"
                                    id="hokhauthuongchuB">
                                <label for="exampleInputEmail1">Nơi ở hiện tại </label>
                                <input type="text" class="form-control" name="noioB" id="noioB" value="{{$data->user->address}}">
                                <label for="exampleInputEmail1">Số điện thoại </label>
                                <input type="number" class="form-control" name="phoneB" id="phoneB" value="{{$data->user->phone}}">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class=" form-group col-12">
                        <fieldset>
                            <legend>Đặc điểm xe : </legend>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="exampleInputEmail1">Loại xe</label>
                                    <input type="text" class="form-control" name="loaixe" id="loaixe">
                                    <label for="exampleInputEmail1">Nhãn hiệu xe</label>
                                    <input type="text" class="form-control" name="nhanhieuxe" id="loaixe">
                                    <label for="exampleInputEmail1">Màu sơn</label>
                                    <input type="text" class="form-control" name="mauson" id="loaixe">
                                    <label for="exampleInputEmail1">Số máy</label>
                                    <input type="text" class="form-control" name="somay" id="loaixe">
                                    <label for="exampleInputEmail1">Số khung</label>
                                    <input type="text" class="form-control" name="sokhung" id="loaixe">
                                </div>
                                <div class="form-group col-6">
        
                                    <label for="exampleInputEmail1">Biển số đăng kí</label>
                                    <input type="text" class="form-control" name="biensodangki"
                                        id="loaixe">
                                    <label for="exampleInputEmail1">Đăng kí xe số</label>
                                    <input type="text" class="form-control" name="dangkixeso" id="loaixe">
                                    <label for="exampleInputEmail1">Công an tỉnh nào cấp:</label>
                                    <input type="text" class="form-control" name="congantinh" id="loaixe">
                                    <label for="exampleInputEmail1">Cấp ngày</label>
                                    <input type="date" class="form-control" name="capngay" id="loaixe">
                                    <label for="exampleInputEmail1">Giá mua qua thỏa thuận giữa 2 bên </label>
                                    <input type="number" class="form-control" name="giamuaquathoathuan" id="loaixe">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group col-6">
        
                    </div>
                </div>
            </div>
            <div class="form-group p-3">
                <button type="submit" class="btn btn-primary" id="info_hopdong">In hợp đồng</button>
            </div>
        
        </form>
        
    </div>
</div>


@endsection