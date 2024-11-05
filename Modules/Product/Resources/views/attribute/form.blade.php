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
                    <h4> Danh mục / Loại thuộc tính </h4>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Danh mục <span class="text-danger">(*)</span></label>
                        </div>

                        <select name="atr_menu_id" class="form-control" required>
                            <option value="">__Chọn danh mục__</option>
                            @if($menus)
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ old('atr_menu_id',isset($product->pro_menu_id) ? $product->pro_menu_id : '' ) == $menu->id ? "selected='selected'" : "" }} ><?php $str = '' ;for($i = 0; $i < $menu->level; $i ++){ echo $str; $str .= '-- '; }?> {{ $menu->m_title }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if($errors->has('atr_menu_id'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('atr_menu_id') }}</em>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company"> Loại thuộc tính </label>
                        </div>

                        <select name="atr_type" class="form-control" id="">
                            <option value="1" {{ old('atr_type') ? "selected='selected'" : "" }}>Thường</option>
                            <option value="2" {{ old('atr_type') ? "selected='selected'" : "" }}>Nổi bật</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h4>Tên thuộc tính / Giá trị thuộc tính </h4>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên thuộc tính <span class="text-danger">(*)</span></label>
                            <span class="float-right"><b>0</b>/70 ký tự</span>
                        </div>
                        <input class="form-control pro_name" required name="atr_name" value="{{ old('atr_name',isset($product->atr_name) ? $product->atr_name : '') }}" type="text" placeholder="VD :  vvv">
                        @if($errors->has('atr_name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('atr_name') }}</em>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="fs-13">
                                    <label for="company"> Giá trị thuộc tính <span class="text-danger">(*)</span><a
                                                href="javascript:void(0)" id="add-input">Thêm nhiều</a></label>
                                    <span class="float-right"><b>0</b>/70 ký tự</span>
                                </div>
                                <div id="list--value">
                                    <input class="form-control pro_name" required name="av_name[]" value="" type="text" placeholder="VD :  xanh, đỏ tím vàng">
                                </div>
                                @if($errors->has('pv_name'))
                                    <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('pv_name') }}</em>
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