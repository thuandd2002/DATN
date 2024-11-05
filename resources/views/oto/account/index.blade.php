@inject('mobiledetect','Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/home_insight.min.css') }}">

@endsection
@section('content')
    <div class="container" style="margin-bottom: 50px; min-height: 548px;">
        <div class="col-md-3">
            @include('oto.account.menu')
        </div>
        <div class="col-md-9">
            <a href="#" class="list-group-item list-group-item-action active" style="color:#FFF !important; ">
                Thông tin tài khoản
            </a>
            <form action="{{ route('update.profile') }}" method="POST">
                @csrf
                <div class="form-group" style="margin-top: 15px">
                    <lable class="">Họ Tên <span style="color: red">(*)</span></lable>
                    <input type="text" name="name" class="form-control" value="{{ isset($user) ? $user->name : '' }}">
                    <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('name') }}</p></span>
                </div>

                <div class="form-group">
                    <lable>Email <span style="color: red">(*)</span></lable>
                    <input type="email" name="email" class="form-control" value="{{ isset($user) ? $user->email  : '' }}">
                    <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('email') }}</p></span>
                </div>

                <div class="form-group">
                    <lable>Phone <span style="color: red">(*)</span></lable>
                    <input type="text" name="phone" class="form-control" value="{{ isset($user) ? $user->phone  : '' }}">
                    <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('phone') }}</p></span>
                </div>

                <div class="form-group">
                    <lable>Địa chỉ </lable>
                    <input type="text" name="address" class="form-control" value="{{ isset($user) ? $user->address  : '' }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/home.min.css') }}"</script>
@endsection
