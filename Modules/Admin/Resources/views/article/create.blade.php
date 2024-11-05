@extends('admin::layouts.master')
@section('titlePage','Thêm mới menu')
@section('content')
    <main class="main">
         <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
                <a href="#">Bài viết</a>
            </li>
            <li class="breadcrumb-item active">Tạo bài viết</li> -->

        </ol> 
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::article.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="{{asset('admin_static')}}/ckeditor/ckeditor.js"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $(document).ready(function() {
            CKEDITOR.replace("a_content",options);
        });
    </script>
@stop