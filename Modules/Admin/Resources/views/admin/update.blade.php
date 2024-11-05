@extends('admin::layouts.master')
@section('titlePage','Cập nhật menu')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item ">Quản lý admin</li>
            <li class="breadcrumb-item active">Cập nhật</li> -->
        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::admin.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection