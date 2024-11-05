@extends('admin::layouts.master')
@section('titlePage','Thêm mới nhóm quyền')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
                <a href="#">Role</a>
            </li>
            <li class="breadcrumb-item active">Create</li>  -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view">
                <div>
                    <div class="animated fadeIn">
                        @include('admin::role.form')
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection