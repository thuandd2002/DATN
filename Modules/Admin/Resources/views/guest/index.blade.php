@extends('admin::layouts.master')
@section('titlePage','Danh sách khách hàng')
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item">Admin</li>
            {{-- <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>  --}}
            <li class="breadcrumb-item active">Danh sách khách hàng</li> -->
           
        </ol>
        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="overflow: scroll;">
                                    <div class="card-body">

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

                                                    <div class="form-group col-sm-3" style="display: inline-block">
                                                        <input type="text" name="em" value="{{ Request::query('em') }}" class="form-control" autocomplete="off" placeholder="Nhập Email">
                                                    </div>

                                                    <div class="form-group col-sm-2" style="display: inline-block">
                                                        <input type="number" name="phone" value="{{ Request::query('phone') }}" class="form-control" autocomplete="off" placeholder="Nhập phone">
                                                    </div>

                                                    <div class="form-group col-sm-3" style="display: inline-block">
                                                        <button class="btn btn-sm btn-outline-danger"><i class="fa fa-search"></i> Tìm kiếm </button>
                                                        <a href="{{ route('get.list.guest') }}" class="btn btn-sm btn-outline-info"><i class="fa fa-refresh"></i> Refresh </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>



                                        <table class="table table-striped table-hover ">
                                        <thead>
                                        <tr>
                                                <th>[id]</th>
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Thời gian</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            @forelse($users as $user)
                                                <tr data-id="{{ $user->id }}" data-url="{{ route('ajax.post.preview.order',$user->id) }}" >
                                                    <td  class="component--guest-item">[{{ $user->id }}]</td>
                                                    <td  class="component--guest-item">{{ $user->name }} </td>
                                                    <td  class="component--guest-item">{{ $user->email }}</td>
                                                    <td  class="component--guest-item">{{ $user->phone }}</td>
                                                    <td  class="component--guest-item">{{ $user->created_at }}</td>
                                                    <td>
                                                        <div class="box--action">
                                                            <div class="form-group">
                                                                <a href="{{ route('get.edit.guest',$user->id) }}" class="btn btn-sm btn-outline-success p-0-10"><i class="fa fa-edit"></i></a>
                                                               
                                                                <a data-type ='delete' href="{{ route('ajax.post.user.delete',$user->id) }}" class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i class="fa fa-trash-o"></i></a>

                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @empty
                                                <p class="mb-3 p-3"> Dữ liệu đang được cập nhật</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {!! $users->links() !!}
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