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
                Thay đổi mật khẩu
            </a>
            <div style="margin-top: 15px">
                <form action="{{ route('update.change.password') }}" method="POST">
                    @csrf
                    <div class="form-group" style="margin-top: 15px">
                        <lable class="">Mật khẩu hiện tại <span style="color: red">(*)</span></lable>
                        <input type="password" name="current_password" class="form-control">
                        <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('current_password') }}</p></span>
                    </div>

                    <div class="form-group">
                        <lable>Mật khẩu mới <span style="color: red">(*)</span></lable>
                        <input type="password" name="password" class="form-control">
                        <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('password') }}</p></span>
                    </div>

                    <div class="form-group">
                        <lable>Nhập lại mật khẩu <span style="color: red">(*)</span></lable>
                        <input type="password" name="r_password" class="form-control">
                        <span class="text-danger " style="color: red"><p class="mg-t-5" style="color: red">{{ $errors->first('r_password') }}</p></span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/home.min.css') }}"</script>
@endsection
