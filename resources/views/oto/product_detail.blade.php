@inject('mobiledetect', 'Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
<link rel="stylesheet" href="{{ mix('frontend_static/css/product_detail_insight.min.css') }}">
<style>
    .title1{
    font-weight: 700;
    font-size: 14px;
    line-height: 20px;
}
    @media only screen and (max-width: 767px) {
        .content-detail {
            margin-top: 250px;
        }

    }
    @media only screen and (max-width: 425px) {
       .link-client{
        font-size: 10px;
       }
    }

    @media only screen and (max-width: 414px) {
        .comments-container {
            width: 414px !important;
        }
    }

    @media only screen and (max-width: 375px) {
        .comments-container {
            width: 80% !important;
        }
        .breadcrumb-box{
            width: 355px;
        }
        /* .container{
            padding-right: 0px;
        } */

    }

    .rating-box {
        display: inline-block;
    }

    .rating-box .rating-container {
        direction: rtl !important;
    }

    .rating-box .rating-container label {
        display: inline-block;
        margin: 15px 0;
        color: #d4d4d4;
        cursor: pointer;
        font-size: 40px;
        transition: color 0.2s;
    }

    .rating-box .rating-container input {
        display: none;
    }

    .rating-box .rating-container label:hover,
    .rating-box .rating-container label:hover~label,
    .rating-box .rating-container input:checked~label {
        color: gold;
    }
</style>
@endsection
@section('content')
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="wrapper clearfix">
            <div class="breadcrumb-box">
                <i class="fa fa-home" aria-hidden="true" style=""></i>
                <ul class="breadcrumb" style="">
                    <li><a class="link-client" href="/">Trang chủ</a></li>
                    <li>
                        <a class="link-client" href="{{ route('get.menu.action', [str_slug_fix($product->menu->m_title), $product->pro_menu_id]) }}">{{
                            $product->menu->m_title }}</a>
                    </li>
                    <li><a class="link-client" href="#">{{ $product->pro_name }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section id="main-content" style="margin-top: 20px;">
    <div class="container">

        <div class="row main-height">
            <div class="col-md-10">
                <div id="gioi-thieu" class="tab-content-item zing-content">
                    <h1 class="tab-content-title text-left"><strong>{{ $product->pro_name }} - </strong>
                    @if ($product->numbers_of_cars_left === 0)
                    <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                    @else
                    <span class="badge badge-success" style="background: green;">Còn hàng</span>
                    @endif
                    </h1>
                    <div class="image-preview-container">
                        <div class="row" id="info">
                            <div class="col-sm-8">
                                <?php
                                    $productsss = isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/logo.jpg');
                                    ?>
                                @if(isset($product->pro_avatar))
                                @if (!$mobiledetect->isMobile())
                                @if (isset($product->images) && count($product->images) > 0)
                                <div class="list__image__product">
                                    @foreach ($product->images as $image)
                                    <div class="mySlides">
                                        <!-- <div class="numbertext">1 / 6</div> -->
                                        <img data-src="{{ pare_url_file($image->pi_name) }}"
                                            src="{{ asset('images/preloader.gif') }}" class="lazy"
                                            alt="{{ $product->pro_name }}"
                                            style="width:100% !important;height: 350px !important;">
                                    </div>
                                    @endforeach
                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                    <a class="next" onclick="plusSlides(1)">❯</a>
                                    <div class="list__image__product-nav" style="margin-top: 10px;">
                                        @foreach ($product->images as $key => $image)
                                        <div class="column" style="margin-bottom: 5px;">
                                            <img class="demo cursor lazy" src="{{ asset('images/preloader.gif') }}"
                                                data-src="{{ pare_url_file($image->pi_name) }}"
                                                style="width:100% !important;height: 90px !important;"
                                                onclick="currentSlide({{ $key + 1 }})" alt="{{ $product->pro_name }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                <img data-src="{{ $productsss }}" src="{{ asset('images/preloader.gif') }}" class="lazy"
                                    alt="{{ $product->pro_name }}"
                                    style="width:100% !important;height: 350px !important;">
                                @endif
                                @else
                                <img src="" alt="">
                                @endif
                                @endif
                            </div>

                            <div class="content-detail col-sm-4">
                                <div class="info__product">
                                    <h4>Thông tin cơ bản</h4>
                                    <div class="info__product-price" style="padding: 20px;border-radius: 5px;">
                                        <div class="info__product-item">
                                            <!-- <span><i class="fa fa-check"></i> Giá -->
                                            </span><span><b>{{ number_format($product->pro_price, 0, ',', '.') }}
                                                    VNĐ</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info__contact">
                                    <h4>Đặt lịch xem xe <i class="fa fa-phone fa-spin fa-3x fa-fw"></i></h4>
                                    <form action="" id="info__contact-form"
                                        style="background-color: #e0e1e3;padding: 20px;border-radius: 5px;">
                                        <input type="text" name="name" data-name="Tên" value="{{ isset($user) ? $user->name : '' }}"
                                            placeholder="Mời nhập tên" class="form-control">
                                        <input type="text" id="email" name="email" data-name="Email" value="{{ isset($user) ? $user->email : '' }}"
                                            placeholder="Mời nhập email" class="form-control">
                                        <input type="number" data-name="Số điện thoại" placeholder="Số điện thoại"
                                            value="{{ isset($user) ? $user->phone : '' }}" name="number"
                                            class="form-control">
                                        <input type="datetime-local" name="date" data-name="Ngày đặt lịch"
                                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                                        <input type="text" name="messages" data-name="Ghi chú" placeholder="Ghi chú" class="form-control">
                                        <button class="btn btn-default" id="submit--info"
                                            data-url="{{ route('ajax.post.guest.saveinfo') }}"
                                            data-id="{{ $product->id }}">
                                            <i class="fa fa-save"></i> Xác nhận thông tin
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ .image-preview-container -->
                    <div class="row" id="content" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <!-- Nav tabs -->
                            <div class="card">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a data-href="#moTa_tab" class="tab_menu_replate" aria-controls="moTa"
                                            role="tab" data-toggle="tab">Mô tả</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-href="#detail_tab" class="tab_menu_replate" aria-controls="home"
                                            role="tab" data-toggle="tab">Chi tiết ô tô</a>
                                    </li>
                                    <li role="presentation">
                                        <a data-href="#info_tab" class="tab_menu_replate" aria-controls="profile"
                                            role="tab" data-toggle="tab">Thông số kỹ thuật</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content" style="border: 1px solid black;">

                                    <div role="tabpanel" class="tab-pane active" id="moTa_tab">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <ul class="list-group product-desc">
                                                    <li class='d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16"><path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                               Kiểu dáng
                                                            </div>

                                                        </div>
                                                        <div class="">{{$productValue->designs}}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16"><path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                                Màu nội thất
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->interior_color }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16"><path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                               Dung tích động cơ
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->engine_capacity }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16"><path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                                Xuất xứ
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->getOrigin() }}</div>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-group product-desc">
                                                    <li class='d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                                Hộp số
                                                            </div>

                                                        </div>
                                                        <div class="">{{ $productValue->gear }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-universal-access" viewBox="0 0 16 16"><path d="M9.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6 5.5l-4.535-.442A.531.531 0 0 1 1.531 4H14.47a.531.531 0 0 1 .066 1.058L10 5.5V9l.452 6.42a.535.535 0 0 1-1.053.174L8.243 9.97c-.064-.252-.422-.252-.486 0l-1.156 5.624a.535.535 0 0 1-1.053-.174L6 9V5.5Z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                               Số chỗ ngồi
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->number_of_seats }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/><path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                               KM đã đi
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->went }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16"><path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                               Dẫn động
                                                            </div>

                                                        </div>
                                                        <div style="width: 100px;">{{ $productValue->drive }}</div>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="list-group product-desc">

                                                    <li class=d-flex justify-content-between align-items-center'>
                                                        <div style="display: flex; gap: 8px">
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="14" fill="currentColor"
                                                                    class="bi bi-fuel-pump-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081V7.5a.5.5 0 0 1-.5.5H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2.5 0a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5Z" />
                                                                </svg>
                                                            </div>
                                                            <div class="title1">
                                                                Nhiên liệu
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->getFuel() }}</div>
                                                    </li>
                                                    <li class="d-flex justify-content-between align-items-center">
                                                        <div style="display: flex; gap: 8px">
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="14" fill="currentColor"
                                                                    class="bi bi-calendar" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                                                </svg>
                                                            </div>
                                                            <div class="title1">
                                                                Năm sản xuất
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->year_of_manufacturing }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-palette-fill" viewBox="0 0 16 16"><path d="M12.433 10.07C14.133 10.585 16 11.15 16 8a8 8 0 1 0-8 8c1.996 0 1.826-1.504 1.649-3.08-.124-1.101-.252-2.237.351-2.92.465-.527 1.42-.237 2.433.07zM8 5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm4.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                                Màu xe
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->car_color }}</div>
                                                    </li>
                                                    <li class=d-flex justify-content-between align-items-center'>
                                                    <div style="display: flex; gap: 8px">
                                                            <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/></svg>
                                                            </div>
                                                            <div class="title1">
                                                                Số cửa
                                                            </div>

                                                        </div>
                                                        <div>{{ $productValue->door_number }}</div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane " id="detail_tab">{!! $product->pro_content !!}
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="info_tab">{!! $product->pro_specifications
                                        !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="comment">
                        <div class="comments-container">
                            @auth('web')
                            <form style="padding: 20px;" id="cmt_submit" data-url="{{ route('ajax.comment.add') }}">
                                <input type="text" hidden name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="comment">Bình luận của bạn</label>
                                    <br>
                                    <div class="rating-box">
                                        <div class="rating-container">
                                            <input type="radio" name="rating" value="5" id="star-5">
                                            <label for="star-5">&#9733;</label>

                                            <input type="radio" name="rating" value="4" id="star-4">
                                            <label for="star-4">&#9733;</label>

                                            <input type="radio" name="rating" value="3" id="star-3">
                                            <label for="star-3">&#9733;</label>

                                            <input type="radio" name="rating" value="2" id="star-2">
                                            <label for="star-2">&#9733;</label>

                                            <input type="radio" name="rating" value="1" id="star-1">
                                            <label for="star-1">&#9733;</label>
                                        </div>
                                    </div>
                                    <textarea name="comment" id="content--comment" class="form-control"
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" data-id="{{ $product->id }}" data-type="1" data-parent="0"
                                    id="post--comment" class="btn btn-success">Gửi bình luận</button>
                            </form>
                            <h4> Bình luận và đánh giá của khách hàng </h4>
                            @else
                            <a target="_blank" href="{{ route('get.login') }}">Đăng nhập để bình luận tại đây</a>
                            @endauth
                            @if (\Auth::check())
                            <ul class="list-inline" title="Average Rating">
                                @for ($count = 1; $count <= 5; $count++) @php if ($count <=$rating) {
                                    $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <li
                                    title="Đánh giá" {{-- id="{{$product->id}}-{{$count}}" data-index="{{$count}}"
                                    data-products_id="{{$product->id}}" --}} data-rating="{{ $rating }}" class="rating"
                                    style="{{ $color }}; font-size:20px;">
                                    &#9733
                                    </li>
                                    @endfor
                            </ul>

                            <ul id="comments-list" class="comments-list">
                                @foreach ($comments as $item)
                                @if ($item->com_type === 1)
                                <li>
                                    <div class="comment-main-level">
                                        <!-- Avatar -->
                                        <div class="comment-avatar">
                                            <img src="{{ $item->user->avatar }}"
                                                onerror="this.onerror=null;this.src='/images/placeholder.png';" alt="">
                                        </div>
                                        <!-- Contenedor del Comentario -->
                                        <div class="comment-box">
                                            <div class="comment-head">
                                                <h6 class="comment-name by-author">
                                                    <b>{{ $item->user->name }}</b>
                                                </h6>
                                                <span>{{ $item->created_at }}</span>
                                                <i class="fa fa-reply"></i>
                                                <i class="fa fa-heart"></i>
                                            </div>
                                            <div class="comment-content" style="font-size: 14px;">
                                                {{ $item->com_message }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Respuestas de los comentarios -->

                                    <ul class="comments-list reply-list">
                                        <li>
                                            <!-- Avatar -->
                                            <div class="comment-avatar">
                                                <img src="{{ asset('favicon.png') }}" alt="avatar">
                                            </div>
                                            <!-- Contenedor del Comentario -->
                                            <div class="comment-box">
                                                <div class="comment-head">
                                                    <h6 class="comment-name"><b href="#">Admin</b>
                                                    </h6>
                                                    <span>{{ $item->created_at }}</span>
                                                </div>
                                                <div class="comment-content">Cảm ơn bạn đã quan tâm sản
                                                    phẩm. Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn
                                                    hoạc hãy liên hệ với hotline :
                                                    {{ isset($information) ? $information->if_phone : '' }}
                                                    để được tư vấn nhanh nhất</div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endif
                                @endforeach

                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="sidebar-widget widget-gia-xe">
                    <div class="widget-sub">
                        <div class="nav__product clearfix">
                            <ul>
                                <li><a href="#info"><span>1.</span> Thông tin cơ bản</a></li>
                                <li><a href="#content"><span>2.</span> Nội dung</a></li>
                                <li><a href="#comment"><span>3.</span> Comment</a></lit
                                <li><a href="#product_sugget"><span>4.</span>Ô Tô liên quan</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="price-car" id="product_sugget">
    <div class="container">
        <h3 class="box-title">
            <strong>Ô tô liên quan</strong>
        </h3>
        <div class="slider-car">
            <div class="our-product-gird tab-content">
                <div class="tab-pane fade in active">
                    <div class="owl-carousel">
                        @if ($productMenu)
                        @foreach ($productMenu as $product)
                        @php
                        $product_slug_m = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                        @endphp

                        <div class="item-col-product">
                            <div class="product-item">
                                <div class="product-image">
                                    <a href="{{ route('get.product.detail', [$product_slug_m, $product->id]) }}"
                                        title="{{ $product->pro_name }}">
                                        <img data-src="{{ pare_url_file($product->pro_avatar) }}"
                                            src="{{ asset('images/preloader.gif') }}" alt="{{ $product->pro_name }}"
                                            class="img-responsive lazy" style="height: 180px;width: 100%">
                                    </a>
                                </div>
                                <div class="product-text">
                                    <div class="product-name">
                                        <h3 class="product-title">
                                            <a href="{{ route('get.product.detail', [$product_slug_m, $product->id]) }}"
                                                title="{{ $product->pro_name }}" class="color-setting" style="height: 30px">{{
                                                $product->pro_name }}</a>
                                        </h3>
                                        <div class="product-price-one">
                                            <span class="color-setting" style="color: red; margin-top: 10px">{{
                                                number_format($product->pro_price, 0, ',', '.') }}
                                                VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    var HREF_CSS = "{{ mix('frontend_static/css/product_detai.min.css') }}"
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>



<script>
    let increaseViewUrl = "{{ route('product.tangView') }}";
    const data = {
        id: "{{$product->id}}",
        _token: "{{ csrf_token() }}"
};
    setTimeout(() => {
        fetch(increaseViewUrl, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(responseData => responseData.json())
            .then(productObj => {

                // document.querySelector('#viewNumber').innerText = "Lượt xen : "+productObj.view;
            })
    }, 3000);
</script>
@endsection