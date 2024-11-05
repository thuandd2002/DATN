@extends('admin::layouts.master')
@section('titlePage','Danh sách Menu')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin_static/library/progressive-image.min.css') }}">
    <main class="main">
        <ol class="breadcrumb">
           <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Menu</li>  -->
          
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.menu') }}">
                                            <i class="icon-plus icons"></i> Thêm mới
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive-sm">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="8%">Hình ảnh</th>
                                                <th width="15%">Tên menu</th>
                                                {{-- <th width="10%">Home / Seo</th> --}}
                                                <th width="10%">Loại</th>
                                                {{-- <th width="10%">Sort / SP </th> --}}
                                                <th width="10%">Trạng thái</th>
                                                <th width="8%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @forelse($menus ?? [] as $menu)
                                                <tr data-id="{{ $menu->id }}">
                                                    <td>[{{ $menu->id }}]</td>
                                                    <td>
                                                        <img src="{{ pare_url_file($menu->m_avatar) }}" onerror="this.onerror=null;this.src='{{ asset('images/placeholder.png') }}';" alt="" class="img img-responsive w-h-80 ">
                                                    </td>
                                                    <td>
                                                        <?php $str = '' ;for($i = 0; $i < $menu->level; $i ++){ echo $str; $str .= '|--- '; }?> {{ $menu->m_title }}
                                                        <br><a href="#">{{ ($menu->m_slug) }}</a>
                                                    </td>
                                                    {{-- <td>
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$menu->m_hot)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Không';
                                                            }

                                                        $textSeo = 'Không';
                                                        if ($menu->m_type_seo == 1)
                                                        {
                                                            $textSeo = 'Có';
                                                        }
                                                        @endphp

                                                        <a href="{{ route('ajax.post.hot.menu',$menu->id) }}" class="btn btn-sm p-0-10 component--hot {{ $class }}">{{ $text }}</a>
                                                        <span>{{ $textSeo  }}</span>
                                                    </td> --}}
                                                    <td><span class="btn btn-sm btn-outline-info p-0-10">{{ $menu->getTypeTextAttribute($menu->m_type) }}</span></td>

                                                    <td>
                                                        <?php 
                                                            if($menu->m_active === 1): ?>
                                                            <span class="btn btn-sm btn-outline-info p-0-10">{{ $menu->getTypeTextAttributeStatus($menu->m_active) }}</span>

                                                           <?php  else : ?>
                                                           <span class="btn btn-sm btn-outline-danger p-0-10">{{ $menu->getTypeTextAttributeStatus($menu->m_active) }}</span>

                                                         <?php   endif;
                                                        ?>
                                                       
                                                    </td>

                                                    {{-- <td>{{ $menu->m_sort }} <br>
                                                        @if ($menu->m_type == 2)
                                                        {{ $menu->getTypeCountAttribute($menu->m_type_count) }}
                                                        @endif
                                                    </td> --}}
                                                    {{-- <td>
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$menu->m_active)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Ẩn';
                                                            }
                                                        @endphp
                                                        <a href="{{ route('ajax.post.active.menu',$menu->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                    </td> --}}

                                                    <td>
                                                        <div class="box--action">
                                                            <div class="form-group">
                                                                <a href="{{ route('get.edit.menu',$menu->id) }}" class="btn btn-sm btn-outline-success p-0-10 ropdown-item"><i class="fa fa-edit"></i></a>
                                                                <a data-type ='delete' href="{{ route('ajax.post.delete.menu',$menu->id) }}" class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i class="fa fa-trash-o"></i></a>
                                                            </div>
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

@section('script')
    <script src="{{ asset('admin_static/library/progressive-image.min.js') }}"></script>
@endsection
