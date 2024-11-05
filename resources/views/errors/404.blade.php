@inject('mobiledetect','Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/home_insight.min.css') }}">

@endsection

@section('content')
    <section id="main-content" style="margin-top: 20px; min-height: 513px">
        <div class="container">
            <div class="row">
                <p style="display: block;text-align: center;padding: 20px" >Trang này không tồn tại. Trở về trang chủ <a href="/" title="trang chủ">tại đây</a></p>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/home.min.css') }}"</script>
@endsection
