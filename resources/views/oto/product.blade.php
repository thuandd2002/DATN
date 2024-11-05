@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/product_insight.min.css') }}">
    <style>
        .search-btn {
            background-color: #4267b2;
            border-color: #4267b2;
            padding: 0.1rem 1.5rem;
            line-height: 2.2;
            border-radius: 0.2rem;
            width: 200px;
            margin: 0 auto;
            display: block;
            font-size: 13px;
            clear: both;
            color: #FFF;
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
                        <li><a href="/" title="Trang Chủ">Trang chủ</a></li>
                        <li><a href="{{ route('get.menu.action',[str_slug_fix($menu->m_title),$menu->id]) }}" title="{{ $menu->m_title }}" >{{ $menu->m_title }}</a></li>
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
                            <h1 class="tax-title"><strong>{{ $menu->m_title }}</strong></h1>
                            {{--<div class="tax-description"  style="overflow: hidden">--}}
                                {{--<p class="tax-desc">{!! $menu->m_description_seo !!} <a href="javascript:void(0)" class="load_more" style="color: #0083d5;">Xem thêm</a></p>--}}
                                {{--<div class="tax-m_description">{!! $menu->m_description !!}</div>--}}
                            {{--</div>--}}
                            <div class="form-search" style="margin-bottom: 65px; display: block">
                                <form action="" method="GET" )>
                                    <div class="col-md-3" style="padding-left: 0px !important;">
                                        <select name="pro_type" id="selector-product" style="height: 34px;padding: 0 !important;">
                                            <option value="">Loại ô tô</option>
                                            <option value="0" @if(request('pro_type') == 0) selected @endif>__Ô tô thường__</option>
                                            <option value="1" @if(request('pro_type') == 1) selected @endif>__Ô tô nổi bật__</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"  style="padding-left: 0px !important;">
                                        <select name="year_of_manufacturing" id="selector-product" style="height: 34px;padding: 0 !important;">
                                            <option value="">Năm sản xuất</option>
                                            @foreach( range(\Carbon\Carbon::now()->year, 1950) as $i)
                                                <option value="{{ $i }}" @if(request('year_of_manufacturing') == $i) selected @endif >{{ $i }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3"  style="padding-left: 0px !important;">
                                        <select name="origin" id="selector-product" style="height: 34px;padding: 0 !important;">
                                            <option value="">Xuất xứ</option>
                                            @foreach($company as $key => $cpn)
                                                <option value="{{ $key }}" @if(request('origin') == $key) selected @endif >{{ $cpn }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-info search-btn" ><span class="fa fa-search"></span> Tìm kiếm</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="product-list" style="padding-top: 10px;">
                            <div class="row">
                                @foreach($products as $product)

                                    @php
                                        $product_slug = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                                    @endphp
                                    <div class="col-md-4 col-xs-6 product-item" style="margin-bottom: 10px;margin-left: 0;">
                                        <div class="product-img">
                                            <a href="{{ route('get.product.detail',[$product_slug,$product->id]) }}" title="{{ $product->pro_name }}">
                                                <img data-src="{{ pare_url_file($product->pro_avatar) }}" src="{{ asset('images/preloader.gif') }}" alt="{{ $product->pro_name }}" class="img-responsive lazy" style="height: 180px;width: 100%">
                                            </a>
                                        </div>
                                        <h3 class="product-title" style="height: 20px !important"><a href="{{ route('get.product.detail',[$product_slug,$product->id]) }}" >{{ $product->pro_name }}</a> - 
                                            @if ($product->numbers_of_cars_left === 0)
                                            <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                                            @else
                                            <span class="badge badge-success" style="background: green;">Còn hàng</span>
                                            @endif
                                        </h3>
                                        <p class="product-price" style="margin-top: 10px">{{ number_format($product->pro_price,0,',','.') }} VNĐ </p>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                            @if (!empty($products))
                                <div class="row text-center">
                                    {{ (new \App\Service\MyPagination($products))->appends(['k' => Request::query('k')])->render() }}
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