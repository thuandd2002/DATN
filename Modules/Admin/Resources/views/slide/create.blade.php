@extends('admin::layouts.master')
@section('titlePage','Thêm mới slide')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item ">Slide</li> 
              <li class="breadcrumb-item active">Thêm mới</li>  -->
          </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::slide.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection