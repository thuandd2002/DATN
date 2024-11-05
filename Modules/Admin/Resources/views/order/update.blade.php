@extends('admin::layouts.master')
@section('titlePage','Cập nhật thông tin khách hàng')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
               Danh sách lịch xem xe
            </li> 
            <li class="breadcrumb-item active">Chi tiết</li>  -->
        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::order.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection