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
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header"> Thư viên từ khoá </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="25%">Từ khoá</th>
                                                <th width="5%">Hit</th>
                                                <th width="15%">Trạng thái</th>
                                                <th width="20%">Ngày tạo</th>
                                                <th width="10%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($keywords as $keyword)
                                                    <tr data-id="{{ $keyword->id }}">
                                                        <td>[{{ $keyword->id }}]</td>
                                                        <td>{{ $keyword->k_name }} <br><a href="" class="fs-10">{{ url(str_slug($keyword->k_name_slug)) }}</a></td>
                                                        <td>{{ $keyword->k_hit }}</td>
                                                        <td>
                                                            @php
                                                                $class ='btn-outline-danger';$text = 'Hiển thị';
                                                                if (!$keyword->k_active)
                                                                {
                                                                    $class = 'btn-outline-secondary';
                                                                    $text = 'Ẩn';
                                                                }
                                                            @endphp
                                                            <a href="{{ route('ajax.post.active.menu',$keyword->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                        </td>
                                                        <td>{{ $keyword->created_at }}</td>
                                                        <td>
                                                            <div class="box--action">
                                                                <a href="" class="btn btn-sm btn-outline-primary p-0-10"><i class="fa fa-link"></i> Xem</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Thêm mới từ khoá</h4>
                                        @include('admin::keyword.form')
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