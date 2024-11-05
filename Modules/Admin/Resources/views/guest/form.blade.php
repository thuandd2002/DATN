<form action="" method="POST">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        {{-- <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button> --}}
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">

        <div class="col-sm-8">
            <div class="card">

                <div class="card-body">
                    <h4>Thông Tin Cơ Bản</h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Họ Tên <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" name="name" value="{{ old('name',isset($user->name) ? $user->name : '') }}" type="text" placeholder="VD : Việt Phú Luxury">
                        @if($errors->has('g_name'))
                            <em id="lastg_name-error" class="error invalid-feedback">{{ $errors->first('g_name') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Email <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="email"  value="{{ old('email',isset($user->email) ? $user->email : '') }}" type="email" placeholder="VD : admin@gmail.com">
                        @if($errors->has('g_email'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('g_email') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Số điện thoại </label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" name="phone" value="{{ old('phone',isset($user->phone) ? $user->phone : '') }}" type="text" placeholder="VD :0964864348">
                        @if($errors->has('g_phone'))
                            <em id="lastg_phone-error" class="error invalid-feedback">{{ $errors->first('g_phone') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Địa chỉ </label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" name="address" value="{{ old('address',isset($user->address) ? $user->address : '') }}" type="text" placeholder="VD : Ninh Giang - Hoa Lư - Ninh Bình">
                        @if($errors->has('g_address'))
                            <em id="lastg_address-error" class="error invalid-feedback">{{ $errors->first('g_address') }}</em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>