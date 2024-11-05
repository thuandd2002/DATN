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
    <section id="main-content" style="margin-top: 20px; min-height: 505px">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="tax-content">
                        <div class="tax-seo">
                            <h1 class="tax-title"><strong>{{ $menu->m_title }}</strong></h1>
                        </div>

                        <div class="contact__info">

                            <div class="container">
                               
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="row" >
                                            <form action="" method="POST" id="form--footer-info" style="background-color: #e0e1e3;padding: 20px;border-radius: 5px;">
                                                <fieldset>
                                                    <legend style="margin-bottom: 20px;">Đăng ký tư vấn miễn phí:</legend>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <lable>Email</lable>
                                                            <input type="email" class="validate" name="email" placeholder="Mời nhập email">
                                                        </div>
                                                        <div class="form-group">
                                                            <lable>Số điện thoại</lable>
                                                            <input type="number" class="validate" name="phone" placeholder="Mời nhập sđt">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <lable>Họ Tên</lable>
                                                            <input type="text" name="name" class="validate" placeholder="Mời nhập tên">
                                                        </div>

                                                        <div class="form-group">
                                                            <lable>Ô tô</lable>
                                                            <select name="product" id="selector-product" style="height: 34px;padding: 0 !important;">
                                                                <option value="">__Danh mục ô tô__</option>
                                                                @foreach($menuProduct ?? [] as $mp)
                                                                    <option value="{{ $mp->id }}">{{ $mp->m_title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-12" style="margin-top: 20px">
                                                        <button data-url="{{ route('ajax.post.guest.saveinfofooter') }}" class="btn btn-sm btn-info"  id="success--footer"><i class="fa fa-save"></i> Xác nhận thông tin</button>
                                                    </div>
                                                </fieldset>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="sidebar-widget widget-gia-xe">
                        <div class="widget-sub">
                            @include('oto.common.product_position_2')
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/product.min.css') }}"</script>
@endsection
