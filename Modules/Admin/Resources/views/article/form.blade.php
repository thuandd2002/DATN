<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        @if (!isset($article))
            <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
            {{-- <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button> --}}
        @else
            <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Cập nhật </button>
            {{-- <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Cập nhật && Thêm mới </button> --}}
        @endif
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4>Meta Seo / Menu </h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Meta Title <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/60 - 70 ký tự</span>
                        </div>
                        <textarea name="a_title_seo" class="form-control max-length component--create--url" maxlength="70" data-move="a_title" cols="30" rows="2" placeholder="" autocomplete="off">{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '') }}</textarea>
                        @if($errors->has('a_title_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_title_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="vat">Meta Keyword <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="a_keyword_seo" class="form-control max-length" maxlength="160"  cols="30" rows="5" placeholder="" autocomplete="off">{{ old('a_keyword_seo',isset($article->a_keyword_seo) ? $article->a_keyword_seo : '') }}</textarea>
                        @if($errors->has('a_keyword_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_keyword_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Meta Description <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="a_description_seo" class="form-control max-length" data-move="a_description" maxlength="160" cols="30" rows="5" placeholder="" autocomplete="off">{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '') }}</textarea>
                        @if($errors->has('a_description_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_description_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Menu <span class="text-danger">(*)</span></label>
                        </div>
                        <select name="a_menu_id" class="form-control" id="" required>
                            <option value="">__Chọn menu__</option>
                            @foreach($menus ?? [] as $menu)
                                <option value="{{ $menu->id }}" {{ old('a_menu_id',isset($article->a_menu_id) ? $article->a_menu_id : '' ) == $menu->id ? "selected='selected'" : "" }} >{{ $menu->m_title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('a_menu_id'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_menu_id') }}</em>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h4>Ảnh đại diện </h4>
                    <div class="form-group ">
                        <div class="fs-13">
                            <label for="street">Ảnh đại diện <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>jpg / png / jpge</b></span>
                        </div>
                        @php $avatar =  isset($article->a_avatar) ? pare_url_file($article->a_avatar) : asset('images/placeholder.png'); @endphp
                        <img class="profile-user-img img-responsive image-preview-upload " id="out_e_avatar"  src="{{ $avatar }}"><br>
                        <label class="input-group-btn">
                            <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar" name="a_avatar"> </span>
                        </label>
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
                            <label for="company">Tên bài viết <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control a_title component--create--url" id="company" name="a_title" value="{{ old('a_title',isset($article->a_title) ? $article->a_title : '') }}" type="text" placeholder="VD :  vvv">
                        @if($errors->has('a_title'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_title') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> URL </label>
                        </div>
                        <input class="form-control component--output--url" readonly id="company" style="width: 80%;display: inline-block" maxlength="70"  name="a_slug" value="{{ old('a_slug',isset($article->a_slug) ? $article->a_slug : '') }}" type="text" placeholder="">
                        <a href="" class="btn btn-sm btn-info component--edit-slug" style="margin-top: -4px;"><i class="fa fa-edit"></i>Chỉnh sửa</a>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Mô tả bài viết <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/300 ký tự</span>
                        </div>
                        <textarea class="form-control a_description" id="company" name="a_description"  placeholder="VD :  được sử dụng rộng rãi ở Việt Nam, mà trên khắp toàn thế giới">{{ old('a_description',isset($article->a_description) ? $article->a_description : '') }}</textarea>
                        @if($errors->has('a_description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_description') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Nội dung bài viết <span class="text-danger">(*)</span></label>
                        </div>
                        <textarea class="form-control" id="a_content" name="a_content" type="text" placeholder="VD :  vvv">{!! old('a_content',isset($article->a_content) ? $article->a_content : '') !!}</textarea>
                        @if($errors->has('a_content'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('a_content') }}</em>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
