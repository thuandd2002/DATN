@extends('admin::layouts.master')
@section('titlePage','Thêm mới hình ảnh')
@section('style')
    <link rel="stylesheet" href="{{ asset('admin_static/library/dropzone.min.css') }}">
@endsection
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Image</a>
            </li>
            <li class="breadcrumb-item active">Create</li> -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::image.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ asset('admin_static/library/dropzone.min.js') }}"></script>
    <script>

        $url = window.location.href;
        Dropzone.options.myDropzone= {
            url: $url,
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 20,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is bigger than 5MB',
            addRemoveLinks: true,
            previewsContainer: null,
            hiddenInputContainer: "body",
        }
    </script>
@endsection