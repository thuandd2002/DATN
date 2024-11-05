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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{-- <link href="{{ asset('js/notifi.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{!! asset('frontend_static/toastr/toastr.min.css') !!}">
    {{--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <!--[if lt IE 9]>
    <script src="https://code.highcharts.com/modules/oldie-polyfills.js"></script>
    <![endif]-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!--[if lt IE 9]>
    <script src="https://code.highcharts.com/modules/oldie.js"></script>
    <![endif]-->

    @if (session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif
    @yield('style')
</head>

<style>
#overlay{	
  position: fixed;
  top: 0;
  z-index: 9999999;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/" target="_blank">VIET PHU ADMIN</a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">

        </ul>
        <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button"
            data-toggle="aside-menu-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <div class="app-body">
        @include('admin::blocks.inc_sidebar')
        @yield('content')
        @include('admin::blocks.inc_aside_menu')
    </div>

    <div id="overlay">
        <div class="cv-spinner">
          <span class="spinner"></span>
        </div>
      </div>

    <script src="{{ asset('js/backend.min.js') }}"></script>
</body>

</html>
@yield('script')




<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript">
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

console.log({{Auth::user()->id == 1 ? 1 : 0}});

    var channel = pusher.subscribe('Notify');
    var notify_staff = pusher.subscribe('NotifyStaff');
    var notify_export_car = pusher.subscribe('NotifyCarExport');
    var notify_get_money = pusher.subscribe('NotifyGetmoney');

    notify_get_money.bind('send-message-get-money', function(data) {
        let value = data;
        // $(`#xuatxe-${value.id_order}`).removeClass("d-none");
        $(`#nhantien-${value.id_order}`).removeClass("d-none");
    });



    channel.bind('send-message-{{Auth::user()->id == 1 ? 1 : 0}}', function(data) {
        let value = data;
        let count_customer = +$("#soluongkhachhangcanduoctuvan").text();

        count_customer += 1;

        $("#soluongkhachhangcanduoctuvan").html(count_customer);

        toastr["info"](
            `${value.name} - ${value.email} - ${ value.phone } đã đặt lịch xem xe , bạn vui lòng hãy check trong danh sách lịch xem xe. `,
            "Lịch hẹn xem xe")
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 3600000,
            "hideDuration": 3600000,
            "timeOut": 3600000,
            "extendedTimeOut": 3600000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    });

    notify_staff.bind(`send-message-staff-{{Auth::user()->id}}`, function(data) {
        let value = data;

        let count_customer_staff = +$("#soluongkhachhangcanduoctuvanstaff-{{Auth::user()->id}}").text();

        count_customer_staff += 1;

        $("#soluongkhachhangcanduoctuvanstaff-{{Auth::user()->id}}").html(count_customer_staff);

        toastr["info"](
            `Bạn đã được quản lý giao cho tư vấn khách hàng : ${data.name} - ${data.email} - ${ data.phone } đã đặt lịch xem xe `,
            "Lịch hẹn xem xe")
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "hideAfter": 3600000, 
            "stack": 10, 
            "showDuration": 3600000,
            "onclick": null,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

    });

    notify_export_car.bind(`send-message-car-export`, function(data) {
        let value = data;

        let id_order = value.idOrder;

        $(`#xuatkho-${id_order}`).removeClass("d-none");
        
        console.log(data);


    });
</script>
