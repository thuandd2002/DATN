@extends('admin::layouts.master')
@section('titlePage','Danh sách thuộc tính')
@section('content')
    <main class="main">
        {{-- <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Danh sách ô tô xuất</li> 
          -->
        </ol> --}}
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.attribute') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="form--search">
                                            <form action="" class="form-horizontal">
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <input type="number" name="id" value="{{ Request::query('id') }}" class="form-control" autocomplete="off" placeholder="nhập ID">
                                                </div>
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <input type="text" name="n" value="{{ Request::query('n') }}" class="form-control" autocomplete="off" placeholder="Nhập Tên">
                                                </div>
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <select name="m" class="form-control" id="">
                                                        <option value="">__Menu__</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-3" style="display: inline-block">
                                                    <button class="btn btn-sm btn-outline-danger"><i class="fa fa-search"></i> Tìm kiếm </button>
                                                    <a href="{{ route('get.list.product') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-refresh"></i> Refresh </a>
                                                </div>
                                            </form>
                                        </div>
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="15%">Tiêu đề</th>
                                                <th width="15%">Menu</th>
                                                <th width="20%">Giá trị</th>
                                                <th width="10%">Trạng thái</th>
                                                <th width="5%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @forelse($attributes as $attribute)
                                                <tr data-id="{{ $attribute->id }}" >
                                                    <td>[{{ $attribute->id }}]</td>
                                                    <td><a target="_blank" href="#">{{ $attribute->atr_name }}</a></td>
                                                    <td><span class="badge badge-danger">{{ $attribute->menu->m_title }}</span></td>
                                                    <td>
                                                        @foreach($attribute->value as $value)
                                                            <span class="badge badge-success">{{ $value->av_name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$attribute->pro_active)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Ẩn';
                                                            }
                                                        @endphp
                                                        <a href="{{ route('ajax.post.active.product',$attribute->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="box--action">
                                                            <div class="form-group">
                                                                <a href="{{ route('get.edit.product',$attribute->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="" role="alert">Không có dữ liệu nào !</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12">
                                        {{ $attributes->links() }}
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