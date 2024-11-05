@extends('admin::layouts.master')
@section('titlePage','Danh sách Admin')
@section('content')
    <main class="main">
       <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
           
            <li class="breadcrumb-item active">Quản lý admin</li> -->
          
        </ol> 
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.admin') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="15%">Tên</th>
                                                <th width="20%">Vai trò</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($admins as $index => $admin)

                                                <tr data-id="{{ $admin->id }}">
                                                    <td>[{{ $index+1 }}]</td>
                                                    <td><a href="{{ route('ajax.preview.admin', isset($admin) ? $admin->id : '') }}"
                                                           class=" component--preview--order">
                                                            {{ isset($admin) ? $admin->name : $admin->name }}</a></td>
                                                    <td>
                                                        @foreach($admin->role as $role)
                                                            <lable class="badge badge-danger p-1">{{ $role->name }}</lable>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('get.edit.admin',$admin->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>

                                                        <a data-type ='delete' href="{{ route('ajax.post.delete.admin',$admin->id) }}" class="comfirm_delete_ajax btn btn-sm btn-outline-danger p-0-10"><i class="fa fa-trash-o"></i> Xoá</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p class="mb-3 p-3"> Dữ liệu đang được cập nhật</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class=" col-sm-12 pull-right">
                                        {{ $admins->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="box--modal"></div>
@endsection