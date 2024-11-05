<form action="" method="POST">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <a class="btn btn-sm btn-danger"  href="{{ route('get.list.image') }}"><i class="fa fa-ban"></i> Trở về </a>
    </div>
    <div class="row">

        <div class="col-sm-12">
            <div class="card">

                <div class="card-body">
                    <h4 class="c-p-l-15">Click chọn ảnh</h4>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="dropzone" id="my-dropzone" name="myDropzone"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>