@extends('admin::layouts.master')
@section('titlePage','Danh sách Admin')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item">Admin</li>
         
            <li class="breadcrumb-item active">Slide</li>  -->
           
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.slide') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="8%">Hình ảnh</th>
                                                <th width="15%">Tên</th>
                                                <th width="15%">Link</th>
                                                <th width="30%">Mô tả</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($slides as $slide)
                                                <tr data-id="{{ $slide->id }}">
                                                    <td>[{{ $slide->id }}]</td>
                                                    <td><img src="{{ pare_url_file($slide->sl_avatar) }}" alt="" class="w-h-80 "></td>
                                                    <td>{{ $slide->sl_name }} </td>
                                                    <td><a href="{{ $slide->sl_link }}" target="_blank">{{ $slide->sl_link }}</a></td>
                                                    <td>{{ $slide->sl_description }}</td>
                                                    <td>
                                                        <a href="{{ route('get.edit.slide',$slide->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                        <a data-type ='delete' href="{{ route('get.delete.slide',$slide->id) }}" class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i class="fa fa-trash-o"></i> Xoá</a>

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
    <div id="box--modal"></div>
@endsection