<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
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
                            <label for="company">Script</label>
                        </div>
                        <textarea name="s_script" class="form-control " data-move="a_title" cols="30" rows="8" placeholder="" autocomplete="off">{{ old('s_script',isset($store->s_script) ? $store->s_script : '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Html</label>
                        </div>
                        <input class="form-control" id="company" name="s_html" value="{{ old('s_html',isset($store->s_html) ? $store->s_html : '') }}" type="text" placeholder="">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">File</label>
                        </div>
                        <input class="form-control" id="company" name="s_file" value="{{ old('s_file',isset($store->s_file) ? $store->s_file : '') }}" type="file" placeholder="">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Loại Store</label>
                        </div>
                        <select name="s_type" class="form-control" id="">
                            {{--<option value="">__Mời bạn chọn__</option>--}}
                            <option value="0" {{ old('s_type', isset($store) ? $store->s_type : '') == 0 ? "selected='selected'" : "" }}>analytics</option>
                            <option value="1" {{ old('s_type', isset($store) ? $store->s_type : '') == 1 ? "selected='selected'" : "" }}>webmaster</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>