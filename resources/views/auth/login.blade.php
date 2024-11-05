@inject('mobiledetect', 'Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ mix('frontend_static/css/home_insight.min.css') }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
@endsection

@section('content')
<style>
    @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");



    .banner-sec {
        background-size: cover;
        min-height: 500px;
        border-radius: 0 10px 10px 0;
        padding: 0;
    }


    .carousel-inner {
        border-radius: 0 10px 10px 0;
    }

    .carousel-caption {
        text-align: left;
        left: 5%;
    }

    .login-sec {
        padding: 50px 30px;
        position: relative;
    }

    .login-sec .copy-text {
        position: absolute;
        width: 80%;
        bottom: 20px;
        font-size: 13px;
        text-align: center;
    }

    .login-sec .copy-text i {
        color: #FEB58A;
    }

    .login-sec .copy-text a {
        color: #E36262;
    }

    .login-sec h2 {
        margin-bottom: 30px;
        font-weight: 800;
        font-size: 30px;
        color:#4267b2;
    }

    .login-sec h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FEB58A;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
        margin-left: auto;
        margin-right: auto
    }

    .btn-login {
        color: #fff;
        font-weight: 600;
    }
    .btn-login:hover{
        background: #4267b2;
    }


    .banner-text {
        width: 70%;
        position: absolute;
        bottom: 40px;
        padding-left: 20px;
    }

    .banner-text h2 {
        color: #fff;
        font-weight: 600;
    }

    .banner-text h2:after {
        content: " ";
        width: 100px;
        height: 5px;
        background: #FFF;
        display: block;
        margin-top: 20px;
        border-radius: 3px;
    }

    .form-check {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .banner-text p {
        color: #fff;
    }
    .carousel-item img {
        min-height:400px;
    }
    @media only screen and (max-width: 991px) and (min-width: 768px)  {
        .carousel-item img{
            min-height:300px;
            margin-top: 90px
        }
    }
</style>







<section class="login-block">
    <div class="container" style="min-height: 578px">
        <div class="row">
            <div class="col-md-6 login-sec">
                <h2 class="text-center">ĐĂNG NHẬP</h2>
                <form class="login-form" method="POST" id="form--footer-info">
                    @csrf
                    <fieldset>
                        <div class="col-12 text-center">
                            @if (session('error'))
                            <p class="login-box-msg text-danger">{{ session('error') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Tài khoản</label>
                            <input type="email" class="validate form-control" name="email"
                                placeholder="quangdo.hyundai@gmail.com">
                            @if ($errors->first('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
                            <input type="password" class="validate form-control" name="password" placeholder="******">
                            @if ($errors->first('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>



                        <div class="">
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                <br />
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" style="display:block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>


                        <div class="form-check">

                            <div>
                                <a href="{{ route('user.forgot.password') }}" class="">Quên mật khẩu</a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-info btn-login"><i class="fa fa-save"></i>
                                    Đăng
                                    nhập</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
                <div class="copy-text">Bạn muốn đăng ký <i class="fa fa-heart"></i><a
                        href="/dang-ky">Bấm vô đây</a></div>
            </div>
            <div class="col-md-6 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <?php
                            $slide_login = isset($information->if_lognin) ? pare_url_file($information->if_lognin) : asset('images/1234.jpg');
                            ?>
                            <img class="d-block img-fluid lazy"  data-src="{{ $slide_login  }}" alt="First slide">

                        </div>
                        <div class="carousel-item">
                            <?php
                            $slide_login = isset($information->if_lognin) ? pare_url_file($information->if_lognin) : asset('images/12345.jpg');
                            ?>
                            <img class="d-block img-fluid lazy" data-src="{{ $slide_login  }}" alt="First slide">

                        </div>
                        <div class="carousel-item">
                            <?php
                            $slide_login = isset($information->if_lognin) ? pare_url_file($information->if_lognin) : asset('images/123456.jpg');
                            ?>
                            <img class="d-block img-fluid lazy"  data-src="{{ $slide_login  }}" alt="First slide">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('script')
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    var HREF_CSS = "{{ mix('frontend_static/css/home.min.css') }}"
</script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection