<form action="{{ route('post.create.keyword') }}" method="POST">
    @csrf
    <div class="form-group">
        <div class="fs-13">
            <label for="company">Tên từ khoá <span class="text-danger">(*)</span></label>
            <span class="float-right"><b>5</b>/70 ký tự</span>
        </div>
        <input class="form-control" id="company" type="text" name="k_name" value="{{ old('k_name',isset($menu->m_title_seo) ? $menu->m_title_seo : '') }}" placeholder="" autocomplete="off">
        @if($errors->has('k_name'))
            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('k_name') }}</em>
        @endif
    </div>
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu </button>
        <button class="btn btn-sm btn-danger" type="reset">
            <i class="fa fa-ban"></i> Reset</button>
    </div>
</form>