
<div class="modal fade" id="modal-album-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <style>
        #modal-box-album-image a:hover { cursor: pointer}
    </style>
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1100px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Danh sách hình ảnh</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-image">
                @include('admin::blocks.inc_list_image')
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button">Save changes</button>
            </div>
        </div>

    </div>

</div>