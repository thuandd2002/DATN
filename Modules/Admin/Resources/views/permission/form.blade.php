<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="card">

                <div class="card-body">
                    <h4>Thông Tin Cơ Bản</h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên quyền <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control" id="company" name="display_name" value="{{ old('display_name',isset($permission->display_name) ? $permission->display_name : '') }}" type="text" placeholder="VD : Quản lý bài viết" autocomplete="off">
                        @if($errors->has('display_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('display_name') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Group quyền </label>
                        </div>

                        <select name="group_permission" class="form-control" id="">
                            <option value="">__Nhóm quyền__</option>

                            @foreach($groupPermission as $key =>  $grp)
                                <option value="{{ $key }}" {{ old('group_permission',isset($permission->group_permission) ? $permission->group_permission : '') == $key ? "selected='selected'" : "" }}>{{ $grp }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('group_permission'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('group_permission') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Mô tả <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/160 ký tự</span>
                        </div>
                        <textarea name="description" class="form-control" id="" cols="30" rows="4" placeholder="Có chức năng quản lý bài viết" autocomplete="off">{{ old('description',isset($permission->description) ? $permission->description : '') }}</textarea>
                        @if($errors->has('description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('description') }}</em>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>