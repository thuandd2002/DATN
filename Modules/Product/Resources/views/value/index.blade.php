@extends('admin::layouts.master')
@section('titlePage','Danh sách sản phẩm')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Product</a>
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
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.product') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="form--search">
                                            {{-- <ul style="padding-left: 0" class="ul-alpha">
                                                @foreach($alphabet as $alp)
                                                    <li style="display: inline" class="{{ Request::query('alpha') == $alp ? "active" : ""  }}"><a href="{{ \App\Core\ClassHelpers\UrlHelpers::addParams(['alpha' => $alp]) }}">{{ $alp }}</a></li>
                                                @endforeach
                                            </ul> --}}
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
                                                        @if($menus)
                                                            @foreach($menus as $menu)
                                                                <option value="{{ $menu->id }}" {{ Request::query('m')  == $menu->id ? "selected='selected'" : "" }} ><?php $str = '' ;for($i = 0; $i < $menu->level; $i ++){ echo $str; $str .= '-- '; }?> {{ $menu->m_title }}</option>
                                                            @endforeach
                                                        @endif
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
                                                <th width="8%">Hình ảnh</th>
                                                <th width="15%">Tiêu đề</th>
                                                <th width="15%">Menu</th>
                                                <th width="10%">Trạng thái</th>
                                                <th width="7%">Trang chủ</th>
                                                <th width="10%">Ngày tạo</th>
                                                <th width="5%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @forelse($products as $product)
                                                <tr data-id="{{ $product->id }}" >
                                                    <td>[{{ $product->id }}]</td>
                                                    <td>
                                                        @php $avatar =  $product->pro_avatar ? pare_url_file($product->pro_avatar) : asset('images/placeholder.png'); @endphp
                                                        <img src="{{ $avatar  }}" alt="" class="w-h-60">
                                                    </td>
                                                    <td><a target="_blank" href="{{ route('get.product.detail',[str_slug_fix($product->pro_name),$product->id]) }}">{{ $product->pro_name }}</a><br><span style="color: #666">Giá {{ jam_read_num_forvietnamese($product->pro_price) }} </span></td>
                                                    <td><span class="badge badge-danger">{{ $product->menu->m_title }}</span></td>
                                                    <td>
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$product->pro_active)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Ẩn';
                                                            }
                                                        @endphp
                                                        <a href="{{ route('ajax.post.active.product',$product->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Có';
                                                            if (!$product->pro_type)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Không';
                                                            }
                                                        @endphp

                                                        <a href="{{ route('ajax.post.hot.product',$product->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--hot">{{ $text }}</a>
                                                    </td>
                                                    <td>{{ $product->created_at }}</td>
                                                    <td>
                                                        <div class="box--action">
                                                            <div class="form-group">
                                                                <a href="{{ route('get.edit.product',$product->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i> Sửa</a>
                                                                <a href="{{ route('ajax.post.preview.product',$product->id) }}" class="btn btn-sm btn-outline-primary p-0-10 component--preview"><i class="fa fa-link"></i> Xem</a>
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
                                        {{ $products->links() }}
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