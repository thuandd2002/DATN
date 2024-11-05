@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/article_detail_insight.min.css') }}">
@endsection
@section('content')
<style>
    
</style>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="wrapper clearfix">
                <div class="breadcrumb-box">
                    <i class="fa fa-home" aria-hidden="true" style=""></i>
                    <ul class="breadcrumb" style="">
                        <li><a href="/" >Trang chủ</a></li>
                        <li><a href="{{ route('get.menu.action',[str_slug_fix($article->menu->m_title),$article->a_menu_id]) }}" >{{ $article->menu->m_title }}</a></li>
                        <li><a href="#" >{{ $article->a_title }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="main-content" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="post-first zing-content">
                        <h1 class="page-title single-post-title">{{ $article->a_title }}</h1>
                        <p style="text-align: justify;">{{ $article->a_description }} - <span style="font-size: 12px"><i class="fa fa-eye"></i> {{ $article->a_view ?? 0 }}</span></p>
                       
                        <div class="div--content">{!! $article->a_content !!}</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sidebar-widget widget-gia-xe">
                        @include('oto.common.product_position')
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

<script>
    let increaseViewUrl = "{{route('post.tangView')}}";
    const data = {
        id: {{$article->id}},
        _token: "{{csrf_token()}}"
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

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/article_detail.min.css') }}"</script>
@endsection