<style>
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    /*Also */
    .btn-success {
        border: 1px solid #c5dbec;
        background: #D0E5F5;
        font-weight: bold;
        color: #2e6e9e;
    }
    /* This is copied from https://github.com/blueimp/jQuery-File-Upload/blob/master/css/jquery.fileupload.css */
    .fileinput-button {
        position: relative;
        overflow: hidden;
    }

    .fileinput-button input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
        direction: ltr;
        cursor: pointer;
    }

    .thumb {
        height: 80px;
        width: 100px;
        border: 1px solid #f2f2f2;
        border-radius: 5px;
    }

    ul.thumb-Images li {
        width: 120px;
        float: left;
        display: inline-block;
        vertical-align: top;
        height: 120px;
    }

    .img-wrap {
        position: relative;
        display: inline-block;
        font-size: 0;
    }

    .img-wrap .close,.close {
        position: absolute;
        top: 2px;
        right: 2px;
        z-index: 100;
        background-color: #D0E5F5;
        color: #000;
        font-weight: bolder;
        cursor: pointer;
        opacity: .5;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        border: 1px solid #f2f2f2;
        font-size: 15px;
        text-align: center;
        line-height: 17px;
    }

    .img-wrap:hover .close,.close:hover {
        opacity: 1;
        background-color: #ff0000;
    }

    .FileNameCaptionStyle {
        font-size: 12px;
    }
</style>
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        @if (!isset($product))
            <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
            <button class="btn btn-sm btn-success" name="save" value="add" type="submit"><i class="fa fa-save"></i> Lưu && Thêm mới </button>
        @else
            <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Cập nhật </button>
        @endif
        <a class="btn btn-sm btn-danger" href="{{ route('get.list.product') }}">
            <i class="fa fa-ban"></i> Reset</a>
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
                        <textarea name="pro_title_seo" class="form-control max-length component--create--url" maxlength="70" data-move="a_title" cols="30" rows="2" placeholder="VD: Kia morning" autocomplete="off">{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}</textarea>

                        @if($errors->has('pro_title_seo') && request('pro_title_seo') == '')
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_title_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="vat">Meta Keyword <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="pro_keyword_seo" class="form-control max-length" maxlength="160"  cols="30" rows="5" placeholder="Kia morning giá rẻ, thu mua xe cũ" autocomplete="off">{{ old('pro_keyword_seo',isset($product->pro_keyword_seo) ? $product->pro_keyword_seo : '') }}</textarea>
                        @if($errors->has('pro_keyword_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_keyword_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="street">Meta Description <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b class="count-lenght-input">0</b>/ 130 - 160 ký tự</span>
                        </div>
                        <textarea name="pro_description_seo" class="form-control max-length" data-move="a_description" maxlength="160" cols="30" rows="5" placeholder="Kia là 1 chiếc xe tuyệt vời có thể đưa bạn đi bất cứ đâu" autocomplete="off">{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}</textarea>
                        @if($errors->has('pro_description_seo'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_description_seo') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Menu <span class="text-danger">(*)</span></label>
                        </div>

                        <select name="pro_menu_id" class="form-control">
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
                            <option value="0" {{ old('pro_position',isset($product->pro_position) ? $product->pro_position : '') == 0 ? "selected='selected'" : "" }}>__Mặc Định__</option>
                            <option value="1" {{ old('pro_position',isset($product->pro_position) ? $product->pro_position : '') == 1 ? "selected='selected'" : "" }}>Sidebar bài viết</option>
                            <option value="2" {{ old('pro_position',isset($product->pro_position) ? $product->pro_position : '') == 2 ? "selected='selected'" : "" }}>Sidebar sản phẩm</option>
                        </select>
                        @if($errors->has('pro_position'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_position') }}</em>
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
                        @php
                            $avatar = isset($product) && $product->pro_avatar ? pare_url_file($product->pro_avatar) : asset('images/placeholder.png');
                        @endphp

                            <img class="profile-user-img img-responsive image-preview-upload" id="out_e_avatar"  src="{{ $avatar }}"><br>

                            <label class="input-group-btn">
                                <span class="btn btn-primary"><i class="nav-icon icon-picture icons"></i> Chọn ảnh từ máy <input type="file" style="display: none;" multiple="" id="e_avatar" name="pro_avatar"></span>
                            </label>
                        <br>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Mô tả</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Kiểu dáng <span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="companys" name="designs" placeholder="VD: Sedan" value="{{ old('designs',isset($productValue->designs) ? $productValue->designs : '') }}" type="text" >
                                @if($errors->has('designs'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('designs') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Màu nội thất <span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="interior_color" placeholder="VD: Xanh" value="{{ old('interior_color',isset($productValue->interior_color) ? $productValue->interior_color : '') }}" type="text" >
                                @if($errors->has('interior_color'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('interior_color') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Dung tích động cơ<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="engine_capacity" step="0.1" placeholder="VD: 4" value="{{ old('engine_capacity',isset($productValue->engine_capacity) ? $productValue->engine_capacity : '') }}" type="text" >
                                @if($errors->has('engine_capacity'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('engine_capacity') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Xuất xứ<span class="text-danger">(*)</span></label>
                                </div>
                                <select name="origin" id="" class="form-control" style="height: 34px;padding: 0 !important;">
                                    @foreach($company as $key => $cpn)
                                        <option value="{{ $key }}" {{ old('origin', isset($productValue->origin) ? $productValue->origin : '') == $key ?  "selected='selected'" : '' }}>{{ $cpn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Nhiên liệu<span class="text-danger">(*)</span></label>
                                </div>
                                <select name="fuel" id="" class="form-control" style="height: 34px;padding: 0 !important;">
                                    @foreach($fuel as $key => $cpn)
                                        <option value="{{ $key }}" {{ old('fuel', isset($productValue->fuel) ? $productValue->fuel : '') == $key ?  "selected='selected'" : '' }}>{{ $cpn }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Năm SX<span class="text-danger">(*)</span></label>
                                </div>
                                <select name="year_of_manufacturing" class="form-control" id="">
                                    @foreach( range(\Carbon\Carbon::now()->year, 2000) as $i)
                                        <option value="{{ $i }}" @if(request('year_of_manufacturing') == $i) selected @endif >{{ $i }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Hộp số<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="gear" placeholder="VD: Số tự động" value="{{ old('gear',isset($productValue->gear) ? $productValue->gear : '') }}" type="text" >
                                @if($errors->has('gear'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('gear') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Số chỗ ngồi<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="number_of_seats" placeholder="VD: 5" value="{{ old('number_of_seats',isset($productValue->number_of_seats) ? $productValue->number_of_seats : '') }}" type="number" >
                                @if($errors->has('number_of_seats'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('number_of_seats') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">KM đã đi<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="went" placeholder="VD: 1000000" value="{{ old('went',isset($productValue->went) ? $productValue->went : '') }}" type="number" >
                                @if($errors->has('went'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('went') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Dẫn động<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="drive" placeholder="VD: AWD - 4 Bánh Toàn thời gian" value="{{ old('drive',isset($productValue->drive) ? $productValue->drive : '') }}" type="text" >
                                @if($errors->has('drive'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('drive') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Màu xe<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="car_color" placeholder="VD: Đỏ" value="{{ old('car_color',isset($productValue->car_color) ? $productValue->car_color : '') }}" type="text" >
                                @if($errors->has('car_color'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('car_color') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Số cửa<span class="text-danger">(*)</span></label>
                                </div>
                                <input class="form-control pro_name" id="company" name="door_number" placeholder="VD: 4" value="{{ old('door_number',isset($productValue->door_number) ? $productValue->door_number : '') }}" type="number" >
                                @if($errors->has('door_number'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('door_number') }}</em>
                                @endif
                            </div>
                        </div>
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
                        <input class="form-control pro_name component--create--url" id="company" name="pro_name" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '') }}" type="text" placeholder="VD : KIA Sportage 2.0G Premium">
                        @if($errors->has('pro_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_name') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> URL </label>
                        </div>
                        <input class="form-control component--output--url" readonly id="company" style="width: 80%;display: inline-block" maxlength="70"  name="pro_slug" value="{{ old('pro_slug',isset($product->pro_slug) ? $product->pro_slug : '') }}" type="text" placeholder="">
                        <a href="" class="btn btn-sm btn-info component--edit-slug" style="margin-top: -4px;"><i class="fa fa-edit"></i>Chỉnh sửa</a>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Giá nhập ô tô <span class="text-danger">(*)</span></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                @if(isset($product) && $product->pro_import == 0)
                                    <input class="form-control pro_price_import" id="company" name="pro_price_import" value="{{ old('pro_price_import',isset($product->pro_price_import) ? $product->pro_price_import  : '') }}" type="number" placeholder="Giá ô tô">
                                @elseif(isset($product) && $product->pro_import == 1)
                                    <input class="form-control pro_price_import" disabled id="company" name="pro_price_import" value="{{ old('pro_price_import',isset($product->pro_price_import) ? $product->pro_price_import : '') }}" type="number" placeholder="Giá sản ô tô">
                                @else
                                    <input class="form-control pro_price_import"  id="company" name="pro_price_import" value="{{ old('pro_price_import',isset($product->pro_price_import) ? $product->pro_price_import : '') }}" type="number" placeholder="Giá sản ô tô">
                                @endif
                                @if($errors->has('pro_price_import'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_price_import') }}</em>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Giá xuất ô tô<span class="text-danger"></span></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                @if(isset($product) && $product->pro_import == 0)
                                    <input class="form-control pro_name" id="company" disabled name="pro_price" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" type="number" placeholder="Giá ô tô">
                                @elseif(isset($product) && $product->pro_import == 1)
                                    <input class="form-control pro_name" id="company" name="pro_price" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" type="number" placeholder="Giá sản phẩm">
                                @else
                                    <input class="form-control pro_name" id="company" disabled name="pro_price" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" type="number" placeholder="Giá ô tô">
                                @endif
                                @if($errors->has('pro_price'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_price') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company">Chi phí sửa chữa<span class="text-danger"></span></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                @if(isset($product) && $product->pro_import == 0)
                                    <input class="form-control pro_price_repair" id="company" name="pro_price_repair" value="{{ old('pro_price_repair',isset($product->pro_price_repair) ? $product->pro_price_repair : '') }}" type="number" placeholder="Giá ô tô">
                                @elseif(isset($product) && $product->pro_import == 1)
                                    <input class="form-control pro_price_repair" disabled id="company" name="pro_price_repair" value="{{ old('pro_price_repair',isset($product->pro_price_repair) ? $product->pro_price_repair : '') }}" type="number" placeholder="Giá ô tô">
                                @else
                                    <input class="form-control pro_price_repair" id="company" name="pro_price_repair" value="{{ old('pro_price_repair',isset($product->pro_price_repair) ? $product->pro_price_repair : '') }}" type="number" placeholder="Giá ô tô">
                                @endif
                                @if($errors->has('pro_price_repair'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_price_repair') }}</em>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Mô tả ngắn <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/300 ký tự</span>
                        </div>
                        <textarea class="form-control pro_description" id="company"  name="pro_description"  placeholder="VD : KIA Sportage trở lại Việt Nam vào tháng 6 tới đây với 8 phiên bản, giá từ 899-1,099 triệu đồng">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                        @if($errors->has('pro_description'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_description') }}</em>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-sm-12">
                            <span class="btn btn-success fileinput-button">
                                <span>Tạo Album Ảnh</span>
                                <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
                            </span>
                        </div>
                        <div class="col-sm-12" style="margin-left: 38px;">
                            @if(isset($product) && $product->images)
                                @foreach($product->images as $img)
                                    <div style="margin-top: 10px;margin-bottom: 10px;display: inline-block;padding: 0;margin-right: 18px;position: relative" class="image-item">
                                        <a class="" style="display: block" modal-image-item="{{ $img->id }}">
                                            <img src="{{ pare_url_file($img->pi_name) }}" alt="" class="img " style="width: 100px !important;height: 80px !important;border: 1px solid #f2f2f2;border-radius: 5px;">
                                        </a>
                                        <span class="close modal-image-item-append" data-id-image="{{ $img->id }}">×</span>
                                    </div>
                                @endforeach
                            @endif
                                <input type="hidden" name="list_image" value="{{ isset($list_id) ? $list_id  : '' }}" id="list_image">
                        </div>
                        <div class="col-sm-12">

                            <output id="Filelist" style="margin-top: 20px"></output>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Thông số kỹ thuật <span class="text-danger">(*)</span></label>
                        </div>
                        <textarea class="form-control" id="pro_specifications" name="pro_specifications" required type="text" placeholder="VD : KIA Sportage 2.0G Premium">{!! old('pro_specifications',isset($product->pro_specifications) ? $product->pro_specifications : '') !!}</textarea>
                        @if($errors->has('pro_specifications'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_specifications') }}</em>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Nội dung ô tô <span class="text-danger">(*)</span></label>
                        </div>
                        <textarea class="form-control" id="pro_content" required name="pro_content" type="text" placeholder="VD : KIA Sportage 2.0G Premium">{!! old('pro_content',isset($product->pro_content) ? $product->pro_content : '') !!}</textarea>
                        @if($errors->has('pro_content'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pro_content') }}</em>
                        @endif
                    </div>
                   <div class="row">
                       <div class="col-sm-6">
                           <div class="form-group">
                               <div class="fs-13">
                                   <label for="company">Hoa hồng cho xe<span class="text-danger">(*)</span></label>
                                   <span class="float-right"><b>0</b>/70 ký tự</span>
                                   <input class="form-control" id="rose" name="rose" placeholder="VD: 10%" value="{{old('rose',isset($product->rose) ? $product->rose : '')}}" type="number"   >
                                   @if($errors->has('rose'))
                                       <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('rose') }}</em>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-sm-6">
                           <div class="form-group">
                               <div class="fs-13">
                                   <label for="company">Tỉ lệ đặt cọc<span class="text-danger">(*)</span></label>
                                   <span class="float-right"><b>0</b>/70 ký tự</span>
                                   <input class="form-control" id="maximum_deposit" name="maximum_deposit" placeholder="VD: 10%" value="{{old('maximum_deposit',isset($product->maximum_deposit) ? $product->maximum_deposit : '')}}" type="number"   >
                                   @if($errors->has('maximum_deposit'))
                                       <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('maximum_deposit') }}</em>
                                   @endif
                               </div>
                           </div>
                       </div>
                       <div class="col-md-6">
                        <div class="fs-13">
                            <label for="company">Số lượng xe còn<span class="text-danger">(*)</span></label>
                            <input class="form-control" id="numbers_of_cars_left" name="numbers_of_cars_left" placeholder="VD: 1" value="{{old('numbers_of_cars_left',isset($product->numbers_of_cars_left) ? $product->numbers_of_cars_left : '')}}" type="number"   >
                            @if($errors->has('numbers_of_cars_left'))
                                <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('numbers_of_cars_left') }}</em>
                            @endif
                        </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('admin::common.modal.image_list')