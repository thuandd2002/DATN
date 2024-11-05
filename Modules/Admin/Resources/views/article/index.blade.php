@extends('admin::layouts.master')
@section('titlePage','Danh sách bài viết')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Bài viết</li>  -->

        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="btn btn-primary btn-sm" href="{{ route('get.create.article') }}">
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
                                                <div class="form-group col-sm-1" style="display: inline-block">
                                                    <input type="number" name="id" value="{{ Request::query('id') }}" class="form-control" autocomplete="off" placeholder="ID">
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
                                                    <a href="{{ route('get.list.article') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-refresh"></i> Refresh </a>
                                                </div>
                                            </form>
                                        </div>

                                    <div class="card-body">
                                        <table class="table table-responsive-sm" style="text-align: left;">
                                            <thead>
                                            <tr>
                                                <th width="2%">[id]</th>
                                                <th width="5%">Hình ảnh</th>
                                                <th width="10%">Tiêu đề</th>
                                                <!-- <th width="8%">Meta title</th> -->
                                                <th width="5%">Menu</th>
                                                <th width="2%">Trạng thái</th>
                                                <th width="2%">Thông tin</th>
                                                <th width="5%">Thao tác</th>
                                            </tr>
                                            </thead>
                                            <tbody >

                                            @forelse($articles as $article)
                                                <tr data-id="{{ $article->id }}" >
                                                    <td>[{{ $article->id }}]</td>
                                                    <td>
                                                        @php $avatar =  $article->a_avatar ? pare_url_file($article->a_avatar) : asset('images/placeholder.png'); @endphp
                                                        <img src="{{ $avatar  }}" alt="" class="w-h-60">
                                                    </td>
                                                    <td><a href="" target="_blank">{{ $article->a_title }}</a></td>
                                                    <!-- <td>{{ $article->a_title_seo }}</td> -->
                                                    <td>
                                                        <?php
                                                            $menu_cate = isset($article->menu->m_title) ? $article->menu->m_title : "Chưa cập nhật"
                                                        ?>
                                                            <a href="">{{ $menu_cate }}</a>
                                                    </td>
                                                    <td style="padding:0 1.5rem">
                                                        @php
                                                            $class ='btn-outline-danger';$text = 'Hiển thị';
                                                            if (!$article->a_active)
                                                            {
                                                                $class = 'btn-outline-secondary';
                                                                $text = 'Ẩn';
                                                            }
                                                        @endphp
                                                        <a href="{{ route('ajax.post.active.article',$article->id) }}" class="btn btn-sm {{ $class }} p-0-10 component--active" style="    margin-top: 8px;" >{{ $text }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="box--action" style="padding:0 1.5rem">
                                                            <a href="{{ route('ajax.post.preview.article',$article->id) }}" class="btn btn-sm btn-outline-primary p-0-10 component--preview"><i class="fa fa-link"></i></a>
                                                            
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="box--action" style="padding:0 1.5rem">
                                                            <a href="{{ route('get.edit.article',$article->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i></a>
                                                            
                                                            <a data-type ='delete' href="{{ route('ajax.post.delete.article',$article->id) }}" class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i class="fa fa-trash-o"></i></a>
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
                                            {{ $articles->appends($query)->links() }}
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