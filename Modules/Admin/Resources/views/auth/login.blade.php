<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titlePage', 'Hệ Thống Admin')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="{{ asset('css/backend.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('frontend_static/toastr/toastr.min.css') !!}">
</head>

<body>

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập</h4>
                                  
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($errors) > 0)
                                <div class="">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <form action="" method="POST" role="form" class="text-start">
                                    {{ csrf_field() }}
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Tài khoản</label>
                                        <input name="email" type="email" class="form-control" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input name="password" type="password" class="form-control" onfocus="focused(this)"
                                            onfocusout="defocused(this)">
                                    </div>
                                    <div class="input-group input-group-outline">
                                   
                                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                       
        
                                     
                                    </div>
                                    
                                  
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Đăng nhập</button>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </main>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/backend.min.js') }}"></script>
</body>

</html>
