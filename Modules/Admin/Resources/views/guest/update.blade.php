@extends('admin::layouts.master')
@section('titlePage','Cập nhật thông tin khách hàng')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
           <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
                <a href="#">Danh sách khách hàng</a>
            </li>
            <li class="breadcrumb-item active">Cập nhật thông tin</li>  -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::guest.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection