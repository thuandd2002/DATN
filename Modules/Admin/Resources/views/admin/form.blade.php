<form action="" method="POST">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">

        <div class="col-sm-8">
            <div class="card">

                <div class="card-body">
                    <h4>Thông Tin Cơ Bản</h4>
                    @if (session('email-exits'))
                    <em id="lastname-error" class="error invalid-feedback">{{ session('email-exits') }}</em>
                @endif
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Email <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="email" {{ isset($admin) ? "disabled" : '' }} value="{{ old('email',isset($admin->email) ? $admin->email : '') }}" type="text" placeholder="VD : admin@gmail.com">
                        @if($errors->has('email'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('email') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Họ Tên <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="name" value="{{ old('name',isset($admin->name) ? $admin->name : '') }}" type="text" placeholder="VD : Nguyễn Văn A">
                        @if($errors->has('name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('name') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Địa chỉ <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="address" value="{{ old('address',isset($admin->address) ? $admin->address : '') }}" type="text" placeholder="VD : Tym sơn">
                        @if($errors->has('address'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('address') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Số điện thoại <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="phone" value="{{ old('phone',isset($admin->phone) ? $admin->phone : '') }}" type="number" min="0" placeholder="VD : 0123456789">
                        @if($errors->has('phone'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('phone') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tuổi <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="age" value="{{ old('age',isset($admin->age) ? $admin->age : '') }}" type="number" min="0" placeholder="VD : 19">
                        @if($errors->has('age'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('age') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">lương cứng <span class="text-danger"></span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="hard_salary" value="{{ old('hard_salary',isset($admin->hard_salary) ? $admin->hard_salary : '') }}" type="number" min="0" placeholder="VD : 10000000">
                    </div>

                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            @foreach($roles as $role)
                                <div class="checkbox" style="display: inline-block;padding-top: 5px;padding-bottom: 5px;"  data-toggle="tooltip" title="{{ $role['description'] }}">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="role[]"  {{ in_array($role->id,$role_user) ? 'checked="checked"' : '' }} value="{{ $role['id'] }}"> {{ $role['display_name'] }}
                                    </label>
                                </div>
                            @endforeach
                            <br>
                            @if($errors->has('role'))
                                <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('role') }}</em>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>