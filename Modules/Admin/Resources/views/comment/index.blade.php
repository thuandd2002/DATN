@extends('admin::layouts.master')
@section('titlePage', 'Danh sách ')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

@section('content')
    <main class="main">
        <ol class="breadcrumb">
         <!-- <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item">
                <a href="#">Bình luận</a>
            </li> -->
           
        </ol>

        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body" >
                                        
                                        <p style="font-size: 16px">Trong ngày hôm nay có <strong><?php echo  count($view_comment_day); ?></strong> comment cần bạn phê duyệt trước khi hiển thị ra cho người dùng xem : 
                                        
                                        </p>
                                        <div style="overflow: scroll;">
                                            <table class="table table-responsive-sm datatable" id="example2" class="display"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Họ tên</th>
                                                    <th width="15%">Email</th>
                                                    <th width="30%">Nội dung</th>
                                                    <th width="30%">Ô tô</th>
                                                    <th width="10%">Thời gian</th>
                                                    <th width="10%">Trạng thái</th>
                                                    <th width="9%">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($view_comment_day)
                                                    @foreach ($view_comment_day as $comment)
                                                        <tr>
                                                            <td>{{ isset($comment['user']) ? $comment['user']['name'] : '' }}</td>
                                                            <td>{{ isset($comment['user']) ? $comment['user']['email'] : '' }}
                                                            </td>
                                                            <td>{{ $comment['com_message'] }}</td>
                                                            <td>{{ $comment['product']['pro_name'] }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-success">{{ $comment['created_at'] }}</span>
                                                            </td>
                                                            <td >
                                                                @php
                                                                    $class = 'btn-outline-danger';
                                                                    $text = 'Hiển thị';
                                                                    if (!$comment['com_type']) {
                                                                        $class = 'btn-outline-secondary';
                                                                        $text = 'Ẩn';
                                                                    }
                                                                @endphp
                                                                <a id="btn-status" href="{{ route('ajax.post.comment.active', $comment['id']) }}"
                                                                    class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                            </td>
                                                            <td>
                                                                <a data-type='delete'
                                                                    href="{{ route('ajax.post.comment.delete', $comment['id']) }}"
                                                                    class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i
                                                                        class="fa fa-trash-o"></i> Xoá</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
        </div>


        <div class="container-fluid">
            <div id="ui-view" style="font-size: 13px;">
                <div>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                              
                                        <p style="font-size: 16px">Tất cả comment</p>
                                        <div style="overflow: scroll;">
                                            <table class="table table-responsive-sm datatable" id="example" class="display"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="15%">Họ tên</th>
                                                    <th width="15%">Email</th>
                                                    <th width="30%">Nội dung</th>
                                                    <th width="30%">Ô tô</th>
                                                    <th width="10%">Thời gian</th>
                                                    <th width="10%">Trạng thái</th>
                                                    <th width="9%">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($comments)
                                                    @foreach ($comments as $comment)
                                                   
                                                        <tr>
                                                            <td>{{ isset($comment['user']) ? $comment['user']['name'] : '' }}</td>
                                                            <td>{{ isset($comment['user']) ? $comment['user']['email'] : '' }}
                                                        </td>
                                                            <td>{{ $comment['com_message'] }}</td>
                                                            <td>{{ $comment['product']['pro_name'] }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-success">{{ $comment['created_at'] }}</span>
                                                            </td>
                                                          
                                                            <td>
                                                                @php
                                                                    $class = 'btn-outline-danger';
                                                                    $text = 'Hiển thị';
                                                                    if (!$comment['com_type']) {
                                                                        $class = 'btn-outline-secondary';
                                                                        $text = 'Ẩn';
                                                                    }
                                                                @endphp
                                                                <a id="btnAll" href="{{ route('ajax.post.comment.active', $comment['id']) }}"
                                                                    class="btn btn-sm {{ $class }} p-0-10 component--active">{{ $text }}</a>
                                                            </td>
                                                            <td>
                                                                <a data-type='delete'
                                                                    href="{{ route('ajax.post.comment.delete', $comment['id']) }}"
                                                                    class="ropdown-item btn btn-sm btn-outline-danger comfirm_delete_ajax p-0-10"><i
                                                                        class="fa fa-trash-o"></i> Xoá</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>
                                     
                                        {{-- {!! $comments->links() !!} --}}
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


    <script>

        $(document).ready(function () {
            var table = $('#example').DataTable();
            var table = $('#example2').DataTable();
        });
    </script>

    <script>


            $(document).ready(function(){

            $("#example2").on('click','#btn-status',function(){
                $(this).closest('tr').remove();
                location.reload(true);
                });

                $("#example").on('click','#btnAll',function(){
                    $(this).closest('tr').remove();
                    location.reload(true);
                });
                

            });

            

    </script>
@endsection
