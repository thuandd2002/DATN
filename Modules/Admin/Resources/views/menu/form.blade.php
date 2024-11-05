<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        {{-- <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button> --}}
        <a class="btn btn-sm btn-danger" href="{{ route('get.list.menu') }}"><i class="fa fa-ban"></i> Huỷ bỏ </a>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4>Meta Seo</h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Meta Title </label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/60 - 70 ký tự</span>
                        </div>
                        <input class="form-control max-length" maxlength="70" id="company" type="text" name="m_title_seo" value="{{ old('m_title_seo',isset($menu->m_title_seo) ? $menu->m_title_seo : '') }}" placeholder="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="vat">Meta Keyword </label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/130 - 160 ký tự</span>
                        </div>
                        <textarea name="m_keyword_seo" maxlength="160" class="form-control max-length" autocomplete="off" id="" cols="30" rows="3" placeholder="Ô tô mới, ô tô nổi bật">{{ old('m_keyword_seo',isset($menu->m_keyword_seo) ? $menu->m_keyword_seo : '') }}</textarea>

                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Meta Description </label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/130 - 160 ký tự</span>
                        </div>
                        <textarea name="m_description_seo" class="form-control max-length" id="" cols="30" maxlength="160" rows="3" placeholder="" autocomplete="off">{{ old('m_description_seo',isset($menu->m_description_seo) ? $menu->m_description_seo : '') }}</textarea>

                    </div>
                    <div class="form-group ">
                        <div class="fs-13">
                            <label for="street">Ảnh đại diện <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>jpg / png / jpge</b></span>
                        </div>
                        @php
                            $avatar = isset($menu) && $menu->m_avatar ? pare_url_file($menu->m_avatar) : asset('images/placeholder.png');
                        @endphp
                        
                        <img class="profile-user-img img-responsive image-preview-upload" id="out_e_avatar"  src="{{ $avatar }}"><br>
                        <label class="input-group-btn">
                            <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar" name="m_avatar"> </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">__Số lượng__ <span class="text-danger">(*)</span></label>
                        </div>
                        <select name="m_type_count" class="form-control" id="">
                            <option value="0" {{ old('m_type_count', isset($menu) ? $menu->m_type_count : '') == 0 ? "selected='selected'" : "" }}>Nhiều Ô tô</option>
                            <option value="1" {{ old('m_type_count', isset($menu) ? $menu->m_type_count : '') == 1 ? "selected='selected'" : "" }}>1 Ô tô</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">__Seo Menu__ </label>
                        </div>

                        <select name="m_type_seo" class="form-control" id="">
                            <option value="1" {{ old('m_type_seo', isset($menu) ? $menu->m_type_seo : '') == 1 ? "selected='selected'" : "" }}>Có</option>
                            <option value="0" {{ old('m_type_seo', isset($menu) ? $menu->m_type_seo : '') == 0 ? "selected='selected'" : "" }}>Không</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h4>Thông Tin Cơ Bản</h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên menu <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/60 - 70 ký tự</span>
                        </div>
                        
                        <input class="form-control max-length component--create--url" id="company" maxlength="70"  name="m_title" value="{{ old('m_title',isset($menu->m_title) ? $menu->m_title : '') }}" type="text" placeholder="VD :  vvv">
                        @if($errors->has('m_title'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('m_title') }}</em>
                        @endif
                    </div>


                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Trang thái</label>
                        </div>

                        <select name="m_active" class="form-control" id="">
                            <option value="1" {{ old('m_active', isset($menu) ? $menu->m_active : '') == 1 ? "selected='selected'" : "" }}>Hiển thị </option>
                            <option value="2" {{ old('m_active', isset($menu) ? $menu->m_active : '') == 2 ? "selected='selected'" : "" }}>Không hiển thị </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> URL </label>
                        </div>
                        <input class="form-control component--output--url" readonly id="company" style="width: 400px;display: inline-block" maxlength="70"  name="m_slug" value="{{ old('m_slug',isset($menu->m_slug) ? $menu->m_slug : '') }}" type="text" placeholder="">
                        <a href="" class="btn btn-sm btn-info component--edit-slug" style="margin-top: -4px;"><i class="fa fa-edit"></i>Chỉnh sửa</a>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Thứ tự hiển thị</label>
                        </div>
                        <input class="form-control max-length" id="company" maxlength="70"  min="0" name="m_sort" value="{{ old('m_sort',isset($menu->m_sort) ? $menu->m_sort : '') }}" type="number" placeholder="VD : 1,2,3,4 ...">
                        @if($errors->has('m_sort'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('m_sort') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">__Loại menu__ <span class="text-danger">(*)</span></label>
                        </div>
                        <select name="m_type" class="form-control" id="">
                            <option value="">__Click chọn__</option>
                            @foreach($types as $key => $type)
                                <option value="{{ $key }}" {{ old('m_type', isset($menu) ? $menu->m_type : '')  == $key ? "selected='selected'" : "" }}>{{ $type }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('m_type'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('m_type') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Menu cha </label>
                        </div>
                        <select name="m_parent_id" class="form-control" id="">
                            <option value="0">__ROOT__</option>
                            @if(isset($menuSort))
                                @foreach($menuSort as $menus)
                                    <option value="{{  $menus->id }}" {{ old('m_parent_id', isset($menu) ? $menu->m_parent_id : '') == $menus->id ? "selected='selected'" : "" }}><?php $str = '' ;for($i = 0; $i < $menus->level; $i ++){ echo $str; $str .= '-- '; }?>{{  $menus->m_title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="vat">Giới thiệu</label>
                        </div>
                        <textarea name="m_description" maxlength="160" class="form-control max-length" autocomplete="off" id="m_description" cols="30" rows="10" placeholder="Ô tô mới, ô tô nổi bật">{{ old('m_description',isset($menu->m_description) ? $menu->m_description : '') }}</textarea>
                        @if($errors->has('m_description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('m_description') }}</em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>