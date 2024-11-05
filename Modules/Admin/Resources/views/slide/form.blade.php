<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary"  type="submit"><i class="fa fa-save"></i> Cập nhật </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Chuyển trang <span class="text-danger">(*)</span></label>
                        </div>
                        <select class="form-control" name="sl_type" >
                            <option value="">__Click chọn__</option>
                            <option value="1" {{ old('sl_type',isset($slide) && $slide->sl_type)  == 1 ? "selected='selected'" : ""}}>_blank</option>
                            <option value="2" {{ old('sl_type',isset($slide) && $slide->sl_type)  == 2 ? "selected='selected'" : ""}}>_self</option>
                            <option value="3" {{ old('sl_type',isset($slide) && $slide->sl_type)  == 3 ? "selected='selected'" : ""}}>_parent</option>
                            <option value="4" {{ old('sl_type',isset($slide) && $slide->sl_type)  == 4 ? "selected='selected'" : ""}}>_top</option>
                        </select>
                        @if($errors->has('sl_type'))
                        <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('sl_type') }}</em>
                    @endif
                    </div>
                    <div class="form-group ">
                        <div class="fs-13">
                            <label for="street"> Hình Ảnh <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>jpg / png / jpge</b></span>
                        </div>
                        @php
                            $avatar = isset($slide) && $slide->sl_avatar ? pare_url_file($slide->sl_avatar) : asset('images/placeholder.png');
                        @endphp
                        <img class="profile-user-img img-responsive image-preview-upload" id="out_e_avatar"  src="{{ $avatar }}"><br>
                        <label class="input-group-btn">
                            <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar"  name="sl_avatar" accept="image/*"> </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tiêu đề slide<span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control a_title"  id="company" name="sl_name" value="{{ old('sl_name',isset($slide->sl_name) ? $slide->sl_name : '') }}" type="text" placeholder="Công ty cổ phần ....">
                        @if($errors->has('sl_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('sl_name') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Link liên kết<span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control a_title" id="company" name="sl_link" autocomplete="off" value="{{ old('sl_link',isset($slide->sl_link) ? $slide->sl_link : '') }}" type="url" placeholder="Công ty cổ phần ....">
                        @if($errors->has('sl_link'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('sl_link') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Mô tả <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <textarea name="sl_description" id="" class="form-control" cols="30" rows="5">{{ old('sl_description',isset($slide) ? $slide->sl_description : '') }}</textarea>
                        @if($errors->has('sl_description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('sl_description') }}</em>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>