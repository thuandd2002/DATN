@extends('admin::layouts.master')
@section('titlePage','Cập nhật sản phẩm')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Product</a>
            </li>
            <li class="breadcrumb-item active">Update</li> -->

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