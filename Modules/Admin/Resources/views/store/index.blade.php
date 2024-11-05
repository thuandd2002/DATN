@extends('admin::layouts.master')
@section('titlePage','Danh sách Store')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#"></a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li> -->
           {{-- --}}
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.store') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="8%">Type</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($stores as $store)
                                                <tr data-id="{{ $store->id }}">
                                                    <td>[{{ $store->id }}]</td>
                                                    <td>
                                                        @php
                                                            $text = 'analytics';
                                                            if ($store->s_type == 1)
                                                            {
                                                                $text = 'webmaster';
                                                            }
                                                        @endphp

                                                        {{ $text }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('get.edit.store',$store->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                        <a href="{{ route('get.delete.store',$store->id) }}" class="btn btn-sm btn-outline-danger p-0-10 component--delete"><i class="fa fa-trash-o"></i> Xoá</a>
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