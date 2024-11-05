<div class="modal fade" id="myModal--preview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title" style="font-size: 24px;">{{ $product->pro_name }}</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Title</label>
                <p>{{ $product->pro_title_seo }}</p>
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Keyword</label>
                <p>{{ $product->pro_keyword_seo }}</p>
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Description</label>
                <p>{{ $product->pro_description_seo }}</p>
                <h4>Ảnh kèm theo</h4>
                @if ($product->images)
                    <div class="row">

                        @foreach($product->images as $img)
                            <div class="col-sm-3">
                                <img src="{{ pare_url_file($img->pi_name) }}" alt="" style="width: 100%;height: 180px !important;" class="img img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class=" text-danger">Chưa cập nhật</p>
                @endif
                <div class="content" style="margin-top: 10px">
                    <h4>Nội dung</h4>
                    {!!  $product->pro_content !!}
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>