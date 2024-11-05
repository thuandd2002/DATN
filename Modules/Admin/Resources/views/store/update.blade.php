@extends('admin::layouts.master')
@section('titlePage','Cập nhật Store')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Store</a>
            </li>
            <li class="breadcrumb-item active">Update</li> -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::store.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection