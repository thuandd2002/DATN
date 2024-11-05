@extends('admin::layouts.master')
@section('titlePage','Thêm mới sản phẩm')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Product</a>
            </li>
            <li class="breadcrumb-item active">Create</li> -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('product::product.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script src="{{asset('admin_static')}}/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_static/library/tagmanager.min.css') }}">
    <script type="text/javascript" src="{{ asset('admin_static/library/tagmanager.min.js') }}"></script>
    <script src="{{ asset('admin_static/library/bootstrap3-typeahead.min.js') }}"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        $(document).ready(function() {
            CKEDITOR.replace("pro_content",options);
            CKEDITOR.replace("pro_specifications",options);

            var tagApi = $(".typeahead").tagsManager();
            jQuery(".typeahead").typeahead({
                autoSelect: true,
                name: 'tags',
                displayKey: 'kwl_name',
                source: function (query, process) {
                    return $.get('{{ route("ajax.get.search.keyword") }}', { query: query }, function (data) {
                        return process(data);
                    });
                },
                afterSelect :function (item){
                    tagApi.tagsManager("pushTag", item);
                },
                tagClass: 'label label-warning',
            });
        });
    </script>
@stop