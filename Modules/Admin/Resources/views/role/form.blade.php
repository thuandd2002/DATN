<form action="" method="POST">
    {{--<input type="hidden" value="{{ csrf_token() }}" name="_token">--}}
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <h4>Thông Tin Cơ Bản</h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên vai trò <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="display_name" value="{{ old('display_name',isset($role->display_name) ? $role->display_name : '') }}" type="text" placeholder="VD : editor" autocomplete="off">
                        @if($errors->has('display_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('display_name') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Mô tả <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/160 ký tự</span>
                        </div>
                        <textarea name="description" class="form-control" id="" cols="30" rows="2" placeholder="Admin có các chức năng gì " autocomplete="off">{{ old('description',isset($role->description) ? $role->description : '') }}</textarea>
                        @if($errors->has('description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('description') }}</em>
                        @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('permission') ? 'has-error' : '' }}">
                        <div class="row p-4">
                            @php  isset($role->permission) ?  $permission = $role->permission->pluck('id')->toArray() : $permission = []  @endphp

                        @foreach($sortPermission as $key => $pms)
                            <div class="col-sm-2 text-left ">
                                <h5 class="text-left ">{{ get_name_group_permission($key) }}</h5>
                                @foreach($pms as $item)
                                    <div class="checkbox"   data-toggle="tooltip" title="{{ $item['description'] }}!">
                                        <label class="label-checkbox">
                                            <input type="checkbox" name="permission[]" {{ ( in_array($item['id'],$permission) ? "checked='checked'" : "") }}  value="{{ $item['id'] }}"> {{ $item['display_name'] }}
                                        </label>
                                    </div>
                                @endforeach
                                {{--{{ array_key_exists(old('permission'),$sortPermission) ? 'checked="checked"' : '' }}--}}
                            </div>
                        @endforeach
                        </div>
                        @if($errors->first('permission'))
                            <span class="alert-error-p-ab">{{ $errors->first('permission') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>