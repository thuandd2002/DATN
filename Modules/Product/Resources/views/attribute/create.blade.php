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
                        @include('product::attribute.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')

@stop