@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/product_insight.min.css') }}">
@endsection
@section('content')
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="wrapper clearfix">
                <div class="breadcrumb-box">
                    <i class="fa fa-home" aria-hidden="true" style=""></i>
                    <ul class="breadcrumb" style="">
                        <li><a href="/" title="Trang Chủ">Trang chủ</a></li>
                        <li><span>Tìm kiếm</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content" style="margin-top: 20px; min-height:513px">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="tax-content">
                        <div class="tax-seo">
                            <h1 class="tax-title"><strong>{{ Request::query('k') }}</strong></h1>
                        </div>
                        <div class="product-list" style="padding-top: 10px;">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-4 col-xs-6 product-item"
                                         style="margin-bottom: 10px;margin-left: 0;">
                                        <div class="product-img">
                                            <a href="{{ route('get.product.detail',[str_slug_fix($product->pro_name),$product->id]) }}"
                                               title="{{ $product->pro_name }}">
                                                <img data-src="{{ pare_url_file($product->pro_avatar) }}"
                                                     src="{{ asset('images/preloader.gif') }}"
                                                     alt="{{ $product->pro_name }}" class="img-responsive lazy"
                                                     style="height: 180px;width: 100%">
                                            </a>
                                        </div>
                                        <h3 class="product-title"><a
                                                    href="{{ route('get.product.detail',[str_slug_fix($product->pro_name),$product->id]) }}">{{ $product->pro_name }}</a> -  @if ($product->numbers_of_cars_left === 0)
                                                    <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                                                    @else
                                                    <span class="badge badge-success" style="background: green;">Còn hàng</span>
                                                    @endif
                                        </h3>
                                        <p class="product-price">
                                            Giá: {{ number_format($product->pro_price,0,',','.') }} VNĐ </p>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            @if ($products->count() == 0)
                                <div class="row text-center">
                                   Không tìm thấy ô tô {{ Request::query('k') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-widget widget-gia-xe">
                        <div class="widget-sub">
                            @include('oto.common.product_position_2')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/product.min.css') }}"</script>
@endsection