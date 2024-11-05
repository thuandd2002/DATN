<div id="modal-box-album-image">
    @if(isset($images))
    <div class="row">

        @foreach($images as $image)
            <div class="col-sm-2" style="margin-bottom: 10px;">
                <a data-id-image="{{ $image->id }}" class="modal-image-item" style="display: block">
                    <img src="{{ pare_url_file($image->im_name) }}" alt="" class="img img-thumbnail" style="width: 100%;height: 150px">
                </a>
            </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center">
                {!! $images->links() !!}
            </div>
        </div>
    </div>
    @endif
</div>