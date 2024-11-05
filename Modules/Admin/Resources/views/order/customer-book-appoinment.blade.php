@extends('admin::layouts.master')
@section('titlePage','Thêm thông tin khách hàng đặt lịch xem xe')
@section('content')
    <main class="main">
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::order.form-create')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection