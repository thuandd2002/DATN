@inject('mobiledetect','Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/home_insight.min.css') }}">

@endsection
@if (!$mobiledetect->isMobile())
    @section('slide')
        @include('oto.blocks.slide')
    @endsection
@endif
@section('content')
@if (!$mobiledetect->isMobile())

<style>
      /* @media screen and (max-width: 425px) {
        .product-title{
            font-size: 12px;
        }
        } */
    @media screen and (max-width: 663px) {
        .text-h1{
            font-size: 14px !important;

        }
    } 

        
    @media (max-width: 480px) {
    
        .post-title{
            margin-left: 130px;
        }
        .post-date{
            margin-left: 130px;
        }
        .post-excerpt{
            margin-left: 130px;
        }
    }
        @media (max-width: 425px) {
            .size-content-1{
                font-size: 10px !important;
            }
       
    }


</style>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div style="width: 60%;margin:0 auto;padding: 20px">
                        <h1 style="text-transform: uppercase;font-size: 30px;font-weight: 600" class="text-h1"><strong>{{ isset($information->if_meta_title) ? $information->if_meta_title : 'Đang cập nhật' }}</strong></h1>
                        <!-- <p style="color: #666;line-height: 20px;">{{ isset($information->if_meta_description) ? $information->if_meta_description : 'Đang cập nhật' }}</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<section class="price-car">
    <div class="container">
        <h2 class="box-title" style="margin-top: 10px">
            <strong>Ô TÔ nổi bật</strong>
        </h2>
        <div class="slider-car">
            <div class="our-product-gird tab-content">
                <div class="tab-pane fade in active">
                    <div class="owl-carousel">
                        @if ($productHome)
                            @foreach($productHome as $product)
                        
                            @php
                                $image = 'images/placeholder.png';
                                if (isset($product->pro_avatar))
                                {
                                    $image = pare_url_file($product->pro_avatar ?? '');
                                }
                                $product_slug_h = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                            @endphp
                            <div class="item-col-product">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}">
                                            <img src="{{ asset('/images/preloader.gif') }}" class="lazy" data-src="{{$image}}" alt="{{ $product->pro_name }}" onerror="this.onerror=null;this.src='images/placeholder.png';" style="height: 200px">
                                        </a>
                                    </div>
                                    <div class="product-text">
                                        <div class="product-name">
                                           <div style="height: 10px" >
                                            <h3 class="product-title">
                                                    <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}" class="size-content-1 color-setting" >{{ $product->pro_name }}</a> -     @if ($product->numbers_of_cars_left === 0)
                                                    <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                                                    @else
                                                    <span class="badge badge-success" style="background: green;">Còn hàng</span>
                                                    @endif
                                                </h3>
                                           </div>
                                            <div class="product-price-one" style="margin-top: 30px">
                                                <span class="size-content-1  color-setting" style="color: red;">{{ number_format($product->pro_price,0,',','.') }} VNĐ </span>
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
<section class="price-car">
    <div class="container">
        <h2 class="box-title" style="margin-top: 10px">
            <strong>Ô tô mới nhất</strong>
        </h2>
        <div class="slider-car">
            <div class="our-product-gird tab-content">
                <div class="tab-pane fade in active">
                    <div class="owl-carousel">
                        @if ($productNews)
                            @foreach($productNews as $product)

                                @php
                                    $image = 'images/placeholder.png';
                                    if (isset($product['pro_avatar']))
                                    {
                                        $image = pare_url_file($product['pro_avatar'] ?? '');
                                    }
                                    $product_slug_h = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                                @endphp
                                <div class="item-col-product">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}">
                                                <img src="{{ asset('/images/preloader.gif') }}" class="lazy" data-src="{{$image}}" alt="{{ $product->pro_name }}" onerror="this.onerror=null;this.src='images/placeholder.png';" style="height: 200px">
                                            </a>
                                        </div>
                                        <div class="product-text">
                                            <div class="product-name">
                                               <div style="height: 10px">
                                                <h3 class="product-title">
                                                        <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}" class=" size-content-1 color-setting">{{ $product->pro_name }}</a> -     @if ($product->numbers_of_cars_left === 0)
                                                        <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                                                        @else
                                                        <span class="badge badge-success" style="background: green;">Còn hàng</span>
                                                        @endif
                                                    </h3>
                                               </div>
                                                <div class="product-price-one " style="margin-top: 30px">
                                                    <span class="size-content-1 color-setting" style="color: red;">{{ number_format($product->pro_price,0,',','.') }} VNĐ </span>
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
<section class="price-car">
    <div class="container">
        <h2 class="box-title" style="margin-top: 10px">
            <strong>Ô tô được xem nhiều nhất</strong>
        </h2>
        <div class="slider-car">
            <div class="our-product-gird tab-content">
                <div class="tab-pane fade in active">
                    <div class="owl-carousel">
                        @if ($productView)
                            @foreach($productView as $product)
                                @php
                                    $image = 'images/placeholder.png';
                                    if (isset($product['pro_avatar']))
                                    {
                                        $image = pare_url_file($product['pro_avatar'] ?? '');
                                    }
                                    $product_slug_h = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                                @endphp
                                <div class="item-col-product">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}">
                                                <img src="{{ asset('/images/preloader.gif') }}" class="lazy" data-src="{{$image}}" alt="{{ $product->pro_name }}" onerror="this.onerror=null;this.src='images/placeholder.png';" style="height: 200px">
                                            </a>
                                        </div>
                                        <div class="product-text" >
                                            <div class="product-name" >
                                                <div style="height: 10px">
                                                    <h3 class="product-title"  >
                                                        <a href="{{ route('get.product.detail',[$product_slug_h,$product->id]) }}" title="{{ $product->pro_name }}" class="size-content-1 color-setting">{{ $product->pro_name }}</a> -     @if ($product->numbers_of_cars_left === 0)
                                                        <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                                                        @else
                                                        <span class="badge badge-success" style="background: green;">Còn hàng</span>
                                                        @endif
                                                    </h3>
                                                </div>
                                                <div class="product-price-one" style="margin-top: 30px"  >
                                                    <span class="size-content-1 color-setting" style="color: red;">{{ number_format($product->pro_price,0,',','.') }} VNĐ </span>
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
@if($productMenu)
<section class="main-content">
    <div class="container">
            @foreach($productMenu as $proMenu)
                <!-- <div class="home-box clearfix">
                    <h2 class="tax-title clearfix" style="margin-top: 40px">
                        <strong>{{ $proMenu->m_title }}</strong>
                        <a class="detail" href="{{ route('get.menu.action',[str_slug_fix($proMenu->m_title),$proMenu->id]) }}">Xem thêm</a>
                    </h2>
                </div> -->

                @if ($proMenu->product)
                    <div class="slider-car">
                        <div class="our-product-gird tab-content">
                            <div class="tab-pane fade in active">
                                <div class="owl-carousel">
                                    @foreach($proMenu->product->take(8) as $product)

                                        @php
                                            $image = 'images/placeholder.png';

                                               if (isset($product->images))
                                               {
                                                   $list_image_product = $product->images->toArray();
                                                   $image = pare_url_file(array_pop($list_image_product)['pi_name']);
                                               }
                                               $product_slug_mn = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                                        @endphp

                                        <div class="item-col-product">
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('get.product.detail',[$product_slug_mn,$product->id]) }}" title="{{ $product->pro_name }}">
{{--                                                        @php $avatar =  $product->pro_avatar ? pare_url_file($product->pro_avatar) : asset('images/placeholder.png'); @endphp--}}
                                                        <img src="{{ asset('/images/preloader.gif') }}" class="lazy" data-src="{{ $image }}" alt="{{ $product->pro_name }}"  style="height: 200px">
                                                    </a>
                                                </div>
                                                <div class="product-text">
                                                    <div class="product-name">
                                                        <h3 class="product-title product-title-2">
                                                            <a href="{{ route('get.product.detail',[$product_slug_mn,$product->id]) }}" title="{{ $product->pro_name }}" class="size-content-1 color-setting ">{{ $product->pro_name }}</a>
                                                        </h3>
                                                        <div class="product-price-one">
                                                            <span class="color-setting" style="color: #dc0000;">{{ number_format($product->pro_price,0,',','.') }} VNĐ</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
    </div>

</section>

@endif

@if (!$mobiledetect->isMobile())
<div class="home-post">
    <div class="container">
        <div class="zing-tab clearfix">
            <div class="tab-header">
                <ul class="clearfix nav nav-tabs">
                    <li><a data-toggle="tab" title="Bài viết mới nhất" href="javascript:;void(0)">Bài viết mới nhất</a></li>
                </ul>
            </div>
            <div class="tab-content">

                <div id="tab149" class="tab-pane fade in active">
                    <div class="post-list">
                        @foreach($articleNews as $new)
                            <?php
                            $article_slug_n = $new->a_slug ? $new->a_slug : str_slug_fix($new->a_title);
                            ?>
                        <div class="post-item-box">
                            <div class="post-item">
                                <a href="{{ route('get.article.detail',[$article_slug_n,$new->id]) }}" title="Danh Sách Địa Chỉ Đại Lý Ô Tô Nằm Trên Đường Phạm Văn Đồng Hà Nội">
                                    @php $avatar =  $new->a_avatar ? pare_url_file($new->a_avatar) : asset('images/placeholder.png'); @endphp
                                    <img src="{{ asset('/images/preloader.gif') }}" data-src="{{ $avatar }}"  alt="{{ $new->a_title }}" class="lazy">
                                </a>
                                <h3 class="post-title"><a href="{{ route('get.article.detail',[$article_slug_n,$new->id]) }}" title="{{ $new->a_title }}">{{ $new->a_title }}</a></h3>
                                <p class="post-date" style="font-size: 12px;"><span><i class="fa fa-user"></i> {{ $new->admin->name ?? "" }}</span> | <span><i class="fa fa-clock-o"></i> {{ $new->created_at }}</span></p>
                                <p class="post-excerpt">{{ $new->a_description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/home.min.css') }}"</script>
@endsection
