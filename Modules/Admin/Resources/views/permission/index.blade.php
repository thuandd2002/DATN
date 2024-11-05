@extends('admin::layouts.master')
@section('titlePage','Danh sách nhóm quyền')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
           <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Quyền</li>  -->
           
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.permission') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="15%">Tên quyền </th>
                                                <th width="20%">Mô tả</th>
                                                <th width="10%">Nhóm</th>
                                                <th width="10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($permissions as $permission)
                                                <tr data-id="{{ $permission->id }}">
                                                    <td>[{{ $permission->id }}]</td>
                                                    <td>{{ $permission->display_name }}</td>
                                                    <td>{{ $permission->description }}</td>
                                                    <td>{{ isset($groupPermission[$permission->group_permission]) ? $groupPermission[$permission->group_permission] : '' }}</td>
                                                    <td>
                                                        <div class="box--action">
                                                            <a href="{{ route('get.edit.permission',$permission->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                            <a data-type ='delete'  class=" comfirm_delete_ajax  btn btn-sm btn-outline-danger p-0-10"  href="{{ route('ajax.post.delete.permission',$permission->id) }}"  ><i class="fa fa-trash-o"></i> Xoá </a>
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
                            <div class="col-sm-12">
                                {{ $permissions->appends($query='')->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection