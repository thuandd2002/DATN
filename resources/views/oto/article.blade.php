@inject('mobiledetect','Mobile_Detect')
@extends('oto.layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ mix('frontend_static/css/article_detail_insight.min.css') }}">
@endsection

<style>
    .content-bv{
        display: flex;
        gap: 10px;
        align-items: center;
        
    }
    .post-excerpt{
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 25px;
        -webkit-line-clamp: 4;
        height: 100px;
        display: -webkit-box;
        -webkit-box-orient: revert;
    }
    @media screen and (max-width: 480px) {
        .content-bv{
            display: none;
        }
        .post-excerpt {
            display: none;
        }
    }
</style>
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
<section id="main-content" style="margin-top: 20px; min-height: 532px">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="tax-content">
                    <h1 class="page-title"><span>{{ $menu->m_title }}</span></h1>
                    <div class="post-list">
                        @foreach($articles as $article)
                        <div class="post-item">
                            @php
                                $avatar =  $article->a_avatar ? pare_url_file($article->a_avatar) : asset('images/placeholder.png');
                                $article_slug = $article->a_slug ? $article->a_slug : str_slug_fix($article->a_title);
                            @endphp
                            <a href="{{ route('get.article.detail',[$article_slug,$article->id]) }}" title="{{ $article->a_title }}">
                                <img data-src="{{ $avatar }}" src="{{ asset('images/preloader.gif') }}" class="lazy" alt="{{ $article->a_title }}">
                            </a>
                            <div class="article--info">
       
                                <h3 class="post-title"><a href="{{ route('get.article.detail',[$article_slug,$article->id]) }}">{{ $article->a_title }}</a></h3>
                                <p class="post-date"><span style="font-size: 12px"><i class="fa fa-clock-o"></i> {{ $article->created_at }}</span> </p>
                                <div class="content-bv">
                                <p class="post-date" style="padding-top: 4px"><span style="font-size: 12px"><i class="fa fa-eye"></i> {{ $article->a_view ?? 0 }}</span> </p>
                                @if(!$mobiledetect->isMobile())
                                    <p class="post-excerpt">{{ $article->a_description }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if (!empty($articles))
                        <div class="row text-center">
                            {{ (new \App\Service\MyPagination($articles))->render() }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar-widget widget-gia-xe">
                    <div class="widget-sub">
                        @include('oto.common.product_position')
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@section('script')
    <script>var HREF_CSS = "{{  mix('frontend_static/css/article.min.css') }}"</script>
@endsection
