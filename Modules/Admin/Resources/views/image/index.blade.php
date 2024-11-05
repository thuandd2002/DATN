@extends('admin::layouts.master')
@section('titlePage','Danh sách hình ảnh')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin_static/library/progressive-image.min.css') }}">
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Image</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li> -->
           {{-- --}}
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.image') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                        <a href="{{ route('post.image.delete.all') }}" class="btn btn-sm btn-sm btn-danger"><i class="fa fa-trash-o"></i>Xoá hết ảnh</a>
                                    </div>
                                    <div class="box-header c-p-l-t-10"> <strong>Tổng : {{ $images->total() }}</strong>  Hình Ảnh <br> </div>
                                    <div class="row">
                                        @foreach($images as $image)
                                            <div class="col-sm-3 image_item">
                                                <div class="item p-3 ">
                                                    <a data-srcset="{{ pare_url_file($image->im_name) }} 400w, {{ pare_url_file($image->im_name) }} 800w, {{ pare_url_file($image->im_name) }} 1600w" href="{{ route('ajax.post.delete.image',$image->id) }}" data-type="image"  class=" primary progressive replace component--delete d-block background-masker">
                                                        <img src="{{ pare_url_file($image->im_name) }}" alt=""  class="img img-thumbnail image-list-item preview">
                                                    </a>
                                                    <p>{{ $image->im_name }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="c-p-l-t-10">
                                        {{ $images->appends(array())->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{ asset('admin_static/library/progressive-image.min.js') }}"></script>
@endsection