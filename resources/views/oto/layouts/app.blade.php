@inject('mobiledetect','Mobile_Detect')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {!! isset($metaSeo) ? $metaSeo->renderMetaSeo() : '' !!}
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @yield('style')
    <link rel="stylesheet" href="{!! asset('frontend_static/toastr/toastr.min.css') !!}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{!! asset('frontend_static/bootstrap/dist/css/bootstrap.min.css') !!}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
	<style>
        .navbar-menu > li >  .home-list > li > .home-list {
            position: absolute !important;
            left: 100% !important;
            right: 0 !important;
            opacity: 0 !important;
            visibility: inherit !important;
            top: 0 !important;
        }
        .navbar-menu > li >  .home-list >  li:hover > .home-list {
            position: absolute;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
</head>
<!--onselectstart="return false" oncontextmenu="return false"-->
<body >

<div class="the-garden the-garden-service">

    <header id="header" class="header_service">
        @include('oto.blocks.top_menu')
        @include('oto.blocks.main_menu')
        @yield('slide')
    </header>
    @yield('content')
    @include('oto.blocks.footer')
    <div id="bttop" style="display: block;">
        <i class="fa fa-chevron-up"></i>
    </div>
    <!---PoPup--->
    @if (!$mobiledetect->isMobile())
        @include('common.popup')
    @else
{{--        @include('common.share')--}}
    @endif
</div>

<script src="{{ asset('frontend_static/js/app.min.js') }}"></script>
@yield('script')

@if (isset($analytics))
    {!! $analytics->s_script !!}
@endif
@include('common.facebook')
<script src="{!! asset('frontend_static/toastr/toastr.min.js') !!}"></script>
<script src="{!! asset('frontend_static/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script>
    toastr.options.closeButton = true;
    @if(session('success'))
        var message = "{{ session('success') }}";
        toastr.success(message, {timeOut: 3000});
    @endif
    @if(session('error'))
        var message = "{{ session('error') }}";
        toastr.error(message, {timeOut: 3000});
    @endif
    setTimeout(function(){ toastr.clear() }, 3000);
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
</body>
</html>