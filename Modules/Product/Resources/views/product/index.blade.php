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
           
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form--search">
                                            {{-- <ul style="padding-left: 0" class="ul-alpha">
                                                @foreach($alphabet as $alp)
                                                    <li style="display: inline" class="{{ Request::query('alpha') == $alp ? "active" : ""  }}"><a href="{{ \App\Core\ClassHelpers\UrlHelpers::addParams(['alpha' => $alp]) }}">{{ $alp }}</a></li>
                                                @endforeach
                                            </ul> --}}
                                            <form action="" class="form-horizontal">
                                                <div class="form-group col-sm-1" style="display: inline-block">
                                                    <input type="number" name="id" value="{{ Request::query('id') }}" class="form-control" autocomplete="off" placeholder="ID">
                                                </div>
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <input type="text" name="n" value="{{ Request::query('n') }}" class="form-control" autocomplete="off" placeholder="Nhập Tên">
                                                </div>
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <select name="m" class="form-control" id="">
                                                        <option value="">__Menu__</option>
                                                        @if($menus && !empty($menus))
                                                            @foreach($menus as $menu)
                                                                <option value="{{ $menu->id }}" {{ Request::query('m')  == $menu->id ? "selected='selected'" : "" }} ><?php $str = '' ;for($i = 0; $i < $menu->level; $i ++){ echo $str; $str .= '-- '; }?> {{ $menu->m_title }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-2" style="display: inline-block">
                                                    <select name="po" class="form-control" id="">
                                                        <option value="">__Vị trí__</option>
                                                        <option value="1" {{ Request::query('po') == 1 ? "selected='selected'" : "" }}>Sidebar bài viết</option>
                                                        <option value="2" {{ Request::query('po') == 2 ? "selected='selected'" : "" }}>Sidebar ô tô</option>
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
                                                <th width="10%">Trạng thái</th>
                                                <th width="10%">Tác động</th>
                                                <th width="10%">Vị trí</th>
                                                <th width="7%">Trang chủ</th>
                                                <th width="7%">Thông tin</th>
                                                <th width="15%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            
                                            @forelse($products as $product)
                                                <tr data-id="{{ $product->id }}" >
                                                    <td style="padding: 0.75rem 1.5rem">[{{ $product->id }}]</td>
                                                    
                                                    <td style="padding: 0.75rem 1.5rem">
                                                        <a target="_blank" href="{{ route('get.product.detail',[str_slug_fix($product->pro_slug),$product->id]) }}">{{ $product->pro_name }}</a><br>
                                                        <span style="color: #666">Giá {{ jam_read_num_forvietnamese($product->pro_price ? $product->pro_price : 0) }} </span><br>
                                                        <span class="badge badge-danger">{{ isset($product->menu->m_title) ? $product->menu->m_title : 'Chưa cập nhật' }}</span><br>
                                                    </td>

                                                    <td style="padding: 0.75rem 1.5rem">
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
                                                    <td style="padding: 0.75rem 1.5rem">
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Xuống';
                                                            if (!$product->pro_import)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Lên';
                                                            }
                                                        @endphp
                                                        <a href="{{ route('ajax.post.import.product',$product->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                    </td>
                                                    <td style="padding: 0.75rem 1.5rem"><span class="btn btn-sm btn-outline-success p-0-10">{{ $product->getPossion() }}</span></td>
                                                    <td style="padding: 0.75rem 1.5rem">
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$product->pro_type)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Không';
                                                            }
                                                        @endphp

                                                        <a href="{{ route('ajax.post.hot.product',$product->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--hot">{{ $text }}</a>
                                                    </td>
                                                    <td style="padding: 0.75rem 1.5rem">
                                                    <a href="{{ route('ajax.post.preview.product',$product->id) }}" class="btn btn-sm btn-outline-primary p-0-10 component--preview"><i class="fa fa-link"></i> Xem</a>
                                                    </td>
                                                    <td style="padding: 0.75rem 1.5rem">
                                                        <div class="box--action">
                                                            <div class="form-group">
                                                                <a href="{{ route('get.edit.product',$product->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i></a>
                                                                
                                                                <a data-type ='delete' href="{{ route('ajax.post.delete.product',$product->id) }}" class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i class="fa fa-trash-o"></i></a>
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
                                        {{ $products->appends($query)->links() }}
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