<form action="" method="POST">
    {{-- <input type="hidden" value="{{ csrf_token() }}" name="_token"> --}}
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        {{-- <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button> --}}
        {{-- <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button> --}}
        <button class="btn btn-sm btn-danger" type="reset">
            {{-- <i class="fa fa-ban"></i> Trở về</button> --}}

            <a class="btn btn-sm btn-danger" href="{{ route('get.list.orders') }}"> Trở về trang
                trước</a>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Thông Tin Order</h4>
                 

                    <div class="card h-100">
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side active">
                                @foreach ($status as $key => $s)
                                
                                    <div class="timeline-block mb-3"><span class="timeline-step"> <i class="material-icons  {{($orders->o_status == $key) ? 'text-success' : 'text-dark' }} text-gradient">{{ $key == 5 ? 'done_all' : 'radio_button_checked'}}</i> </span>
                                        <div class="timeline-content">
                                            <h6 class="text-dark text-sm font-weight-bold mb-0">{{$s}}</h6>
                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                {{$orders->o_status ==  5 ? $orders->updated_at : '' }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                             
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên khách hàng </label>
                        </div>
                        <input disabled class="form-control" id="o_guest_id" name="o_guest_id"
                            value="{{ $orders->user->name }}" type="text" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Email </label>
                        </div>
                        <input disabled class="form-control" id="email" name="email"
                            value="{{ $orders->user->email }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Phone </label>
                        </div>
                        <input disabled class="form-control" id="phone" name="phone"
                            value="{{ $orders->user->phone }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Ô tô </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value="{{ $orders->product->pro_name }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Thông tin </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value="{{ $orders->o_messages }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Ngày xem xe </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value="{{ $orders->car_viewing_day }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Ngày hẹn lấy xe </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value="{{ $orders->o_pick_up_schedule }}" type="text" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Số tiền đã cọc </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value=" {{ number_format($orders->o_deposit, 0, ',', '.') }} VNĐ" type="text"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Số tiền đã thanh toán hoàn tất </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value=" {{ number_format($orders->unified_price, 0, ',', '.') }} VNĐ" type="text"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Người đem lại doanh thu</label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value=" {{ $orders->user->name }}" type="text"
                            autocomplete="off">
                    </div>


                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Lý do hủy </label>
                        </div>
                        <input disabled class="form-control" id="pro_name" name="pro_name"
                            value="{{ $orders->cancel_appointment }}" type="text" autocomplete="off">
                    </div>


                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Trạng thái </label>
                        </div>

                        <select disabled name="o_status" class="form-control" id="">
                            @foreach ($status as $key => $cpn)
                                <option value="{{ $key }}"
                                    {{ old('o_status', isset($orders->o_status) ? $orders->o_status : '') == $key ? "selected='selected'" : '' }}>
                                    {{ $cpn }}</option>
                            @endforeach
                        </select>

                    </div>

                </div>
            </div>
        </div>
    </div>


</form>
