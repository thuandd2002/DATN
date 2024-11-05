@extends('admin::layouts.master')
@section('titlePage','Danh sách nhóm quyền')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
                <a href="#">Phân quyền quản trị</a>
            </li> -->

           
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.role') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="15%">Tên vai trò </th>
                                                <th width="20%">Mô tả</th>
                                                <th width="20%">Danh sách quyền</th>
                                                <th width="10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($roles as $role)
                                                <tr data-id="{{ $role->id }}">
                                                    <td>[{{ $role->id }}]</td>
                                                    <td>{{ $role->display_name }}</td>
                                                    <td>{{ $role->description }}</td>
                                                    <td>
                                                        <div style="height: 100px;padding: 10px;overflow: hidden">
                                                            @foreach($role->permission as $p)
                                                                <lable class="badge badge-danger">{{ $p->name }}</lable>
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="box--action">
                                                            <a href="{{ route('get.edit.role',$role->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                            <a href="{{ route('ajax.post.delete.role',$role->id) }}" class="btn btn-sm btn-outline-danger p-0-10  comfirm_delete_ajax"><i class="fa fa-trash-o"></i> Xoá </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p class="mb-3 p-3"> Dữ liệu đang được cập nhật</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection