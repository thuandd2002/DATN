<div class="modal fade" id="myModal--preview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card-header pb-0">
                    <h6 class="text-center p-3">Thông tin chi tiết nhân viên</h6>
                </div>
                <div class="table-responsive p-0">
                    <table class=" table table-striped table table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr class="text-center">
                            <th scope="col" class="">Họ và tên</th>
                            <th scope="col" class="">Email</th>
                            <th scope="col" class="">Tỉ lệ chốt đơn</th>
                            <th scope="col" class="">Lương cứng</th>
                            <th scope="col" class="">Hoa hồng tháng này</th>
                            <th scope="col" class="">Lương tháng này</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">

                                    <td>{{ isset($admins->name) ? $admins->name : ''  }}</td>
                                    <td>{{ isset($admins->email) ? $admins->email : '' }}</td>
                                    <td>
                                        @if($totalComplete > 0 || $totalDon > 0 )
                                            {{ $totalComplete / $totalDon * 100 }} %
                                        @else
                                            Chưa có dữ liệu
                                        @endif
                                        </td>
                                    <td>{{ isset($admins->hard_salary) ? number_format($admins->hard_salary,0,',','.') : ''}} VNĐ</td>
                                    <td>{{ isset($roseMoney) ?  number_format($roseMoney,0,',','.') : '' }} VNĐ </td>
                                    <td>{{ isset($roseMoney)  && isset($admins->hard_salary) ?  number_format($admins->hard_salary +$roseMoney,0,',','.') : ''}} VNĐ</td>

                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>