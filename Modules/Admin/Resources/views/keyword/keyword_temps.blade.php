@extends('admin::layouts.master')
@section('titlePage','Danh sách Từ khoá')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
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
                                    <div class="card-header"> Thư viên từ khoá </div>
                                    <div class="c-p-l-t-10">
                                        <form action="" class="form-inline">
                                            <div class="form-group">
                                                <input class="form-control" name="id" type="number" placeholder="ID = 10">
                                            </div>
                                            <div class="form-group ml-lg-1">
                                                <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{--<div style="padding-right: 15px;padding-top: 15px;" class="text-right">{{ $keywordTemps->currentPage() }} / {{ $keywordTemps->perPage() }} / {{ $keywordTemps->lastPage() }} / {{ $keywordTemps->total() }}</div>--}}
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="20%">Từ khoá</th>
                                                <th width="20%"> Sug </th>
                                                <th width="20%">Ngày tạo</th>
                                                <th width="20%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($keywordTemps as $keyword)
                                                <tr data-id="{{ $keyword->id }}">
                                                    <td>[{{ $keyword->id }}]</td>
                                                    <td>{{ $keyword->kt_name }}</td>
                                                    <td><a href="" class="fs-10">{{ (str_slug($keyword->kt_name)) }}</a></td>
                                                    <td>{{ $keyword->created_at }}</td>
                                                    <td>
                                                        <div class="box--action">
                                                            <a href="{{ route('ajax.post.keyword.temps',$keyword->id) }}" class="btn btn-sm btn-outline-danger p-0-10 component--delete"><i class="fa fa-trash-o"></i> Xoá</a>
                                                            <a href="{{ route('ajax.post.accept.keyword.temps',$keyword->id) }}" class="btn btn-sm btn-outline-success p-0-10 component--accept"><i class="fa fa-plus-circle"></i> Thêm vào Thư viện </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {{ $keywordTemps->appends($query)->links() }}
                                    </div>
                                </div>
                            </div>
                            {{--<div class="col-sm-4">--}}
                                {{--<div class="card">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<h4>Thêm mới từ khoá</h4>--}}
                                        {{--@include('admin::keyword.form')--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection