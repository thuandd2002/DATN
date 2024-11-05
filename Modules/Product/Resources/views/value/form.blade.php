<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        @if (!isset($product))
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
                    <h4>Meta Seo / Ô tô </h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Meta Title <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/60 - 70 ký tự</span>
                        </div>
                        <textarea name="pro_title_seo" class="form-control max-length" maxlength="70" data-move="a_title" cols="30" rows="2" placeholder="" autocomplete="off">{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}</textarea>
                        @if($errors->has('pro_title_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_title_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="vat">Meta Keyword <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="pro_keyword_seo" class="form-control max-length" maxlength="160"  cols="30" rows="5" placeholder="" autocomplete="off">{{ old('pro_keyword_seo',isset($product->pro_keyword_seo) ? $product->pro_keyword_seo : '') }}</textarea>
                        @if($errors->has('pro_keyword_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_keyword_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Meta Description <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="pro_description_seo" class="form-control max-length" data-move="a_description" maxlength="160" cols="30" rows="5" placeholder="" autocomplete="off">{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}</textarea>
                        @if($errors->has('pro_description_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_description_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Menu <span class="text-danger">(*)</span></label>
                        </div>

                        <select name="pro_menu_id" class="form-control" id="">
                            <option value="">__Chọn menu__</option>
                            @if($menus)
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ old('pro_menu_id',isset($product->pro_menu_id) ? $product->pro_menu_id : '' ) == $menu->id ? "selected='selected'" : "" }} ><?php $str = '' ;for($i = 0; $i < $menu->level; $i ++){ echo $str; $str .= '-- '; }?> {{ $menu->m_title }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('pro_menu_id'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_menu_id') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Vị trí </label>
                        </div>

                        <select name="pro_position" class="form-control" id="">
                            <option value="">__Chọn menu__</option>
                            <option value="1" {{ old('pro_position',isset($product->pro_position) ? $product->pro_position : '') == 1 ? "selected='selected'" : "" }}>Sidebar bài viết</option>
                            <option value="2" {{ old('pro_position',isset($product->pro_position) ? $product->pro_position : '') == 2 ? "selected='selected'" : "" }}>Sidebar ô tô</option>
                        </select>
                        @if($errors->has('pro_position'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_position') }}</em>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <h4>Ảnh đại diện / Tags ô tô</h4>

                    <div class="form-group ">
                        <div class="fs-13">
                            <label for="street">Tags ô tô <span class="text-danger">(*)</span></label>
                        </div>

                        @if(isset($product->keyword) && count($product->keyword) > 0)
                            @foreach($product->keyword as $item)
                                <span class="tm-tag">
                                <span>{{ $item->k_name }}</span><a href="javascript:;void(0)" data-keyword-id="{{ $item->pivot->ak_keyword_id }}" data-post-id="{{ $product->id }}"  class="tm-tag-remove">x</a>
                            </span>
                            @endforeach
                        @endif
                        <input type="text" class="typeahead form-control tm-input" value="" data-role="tagsinput">
                    </div>
                    <div class="form-group ">
                        <div class="fs-13">
                            <label for="street">Ảnh đại diện <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>jpg / png / jpge</b></span>
                        </div>

                        @php
                            $avatar = isset($product) && $product->pro_avatar ? pare_url_file($product->pro_avatar) : asset('images/placeholder.png');
                        @endphp

                        <img class="profile-user-img img-responsive image-preview-upload" id="out_e_avatar"  src="{{ $avatar }}"><br>

                        <label class="input-group-btn">
                            <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar" name="pro_avatar"> </span>
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
                            <label for="company">Tên ô tô <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control pro_name" id="company" name="pro_name" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '') }}" type="text" placeholder="VD :  vvv">
                        @if($errors->has('pro_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_name') }}</em>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Giá ô tô <span class="text-danger">(*)</span></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                <input class="form-control pro_name" id="company" name="pro_price" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" type="text" placeholder="VD :  vvv">
                                @if($errors->has('pro_price'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_price') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Loại ô tô <span class="text-danger">(*)</span></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                <select name="pro_type" class="form-control" id="">
                                    <option value="0" {{ old('pro_type', isset($product->pro_type) ? $product->pro_type : '') == 0 ?  "selected='selected'" : '' }}>__Ô tô thường__</option>
                                    <option value="1" {{ old('pro_type', isset($product->pro_type) ? $product->pro_type : '') == 1 ?  "selected='selected'" : '' }}>__Ô tô nổi bật__</option>
                                </select>
                                @if($errors->has('pro_type'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_type') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Năm sản xuất <span class="text-danger">(*)</span></label>
                                </div>
                                <select name="pro_year_output" class="form-control" id="">
                                    @for($i = 2000 ; $i <= 2030 ; $i ++ )
                                    <option value="{{ $i }}" {{ old('pro_year_output', isset($product->pro_year_output) ? $product->pro_year_output : '') == $i ?  "selected='selected'" : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @if($errors->has('pro_year_output'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_year_output') }}</em>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Xuất xứ  <span class="text-danger">(*)</span></label>
                                </div>
                                <select name="pro_source" class="form-control" id="" required>
                                    @foreach($company as $key => $cpn)
                                    <option value="{{ $key }}" {{ old('pro_source', isset($product->pro_source) ? $product->pro_source : '') == $key ?  "selected='selected'" : '' }}>{{ $cpn }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('pro_source'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_source') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Mô tả ngắn <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/300 ký tự</span>
                        </div>
                        <textarea class="form-control pro_description" id="company" name="pro_description"  placeholder="VD :  được sử dụng rộng rãi ở Việt Nam, mà trên khắp toàn thế giới">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                        @if($errors->has('pro_description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_description') }}</em>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-sm btn-danger" style="margin-bottom: 5px;" id="show-modal-album-image" data-url="{{ route('ajax.get.list.image') }}"><i class="fa fa-picture-o"></i> Tạo Album Ảnh</a>
                        </div>
                        <input type="hidden" name="list_image" value="{{ isset($list_id) ? $list_id  : '' }}" id="list_image">
                        <div class="list-image-modal">
                            @if(isset($product) && $product->images)
                                @foreach($product->images as $img)
                                    <div style="margin-top: 10px;margin-bottom: 10px;display: inline-block" class="col-sm-2">
                                        <a class="modal-image-item-append" style="display: block" data-id-image="{{ $img->id }}">
                                            <img src="{{ pare_url_file($img->im_name) }}" alt="" class="img img-thumbnail" style="width: 100%;height: 120px">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Thông số kỹ thuật <span class="text-danger">(*)</span></label>
                        </div>
                        <textarea class="form-control" id="pro_specifications" name="pro_specifications" type="text" placeholder="VD :  vvv">{!! old('pro_specifications',isset($product->pro_specifications) ? $product->pro_specifications : '') !!}</textarea>
                        @if($errors->has('pro_specifications'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_specifications') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Nội dung ô tô <span class="text-danger">(*)</span></label>
                        </div>
                        <textarea class="form-control" id="pro_content" name="pro_content" type="text" placeholder="VD :  vvv">{!! old('pro_content',isset($product->pro_content) ? $product->pro_content : '') !!}</textarea>
                        @if($errors->has('pro_content'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_content') }}</em>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

@include('admin::common.modal.image_list')