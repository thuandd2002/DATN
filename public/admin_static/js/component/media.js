import SweetAlert2 from  './../plugin/runSweetAlert2';
import $ from 'jquery';

var Media = {
    init : function()
    {
        let __this = this;
        __this.clickItemImage();
        __this.clickRemoveItemImage();

        $("#show-modal-album-image").click(function (event) {
            event.preventDefault();
            let $this = $(this);
            $.ajax({
                url : $this.attr("data-url"),
                type : 'get',
                dataType: 'html',
                async: false,
                data : { id : $(this).attr('data-id')},
                success : function (responsive) {

                    $("#modal-body-image").html(responsive)
                    // let $item = $(responsive).find('#modal-box-album-image .modal-image-item');

                    // __this.clickItemImage($item);
                },
                errors : function () {
                    Toastr.error(' Lỗi xử lý rồi');
                }
            })

            $("#modal-album-image").modal({'show' :  true})
        })

        $(document).ready(function() {

            $(document).on('click', '#modal-box-album-image .pagination a',function(event)
            {
                event.preventDefault();

                console.log(1212);

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');

                $.ajax({
                    url : myurl,
                    type : 'get',
                    dataType: 'html',
                    async: true,
                    success : function (responsive) {
               
                        $("#modal-box-album-image").html(responsive)
                    },
                    errors : function () {
                        Toastr.error(' Lỗi xử lý rồi');
                    }
                })
            });
        })

    },

    clickItemImage : function()
    {
        $(document).ready(function() {

            $(document).on('click', '.modal-image-item',function(event) {
                event.preventDefault();
                let $this  = $(this);

                let $id    = $this.attr('data-id-image');
                let $image = $this.find('img').attr('src');
                let $box_image = '';

                $box_image = '<div style="margin-top: 10px;margin-bottom: 10px;display:inline-block" class="col-sm-2">\n' +
                    '                                <a class="modal-image-item-append" style="display: block" data-id-image="'+$id+'">\n' +
                    '                                    <img src="'+$image+'" alt="" class="img img-thumbnail" style="width: 100%;height: 120px">\n' +
                    '                                </a>\n' +
                    '                            </div>'

                $(".list-image-modal").append($box_image);
                $("#list_image").val($("#list_image").val()+$id+',');
                SweetAlert2.messagesSwal('success',' Cập nhật thành công');

            });
        })

    },

    clickRemoveItemImage : function()
    {
        $(document).ready(function() {
            $(document).on('click','.modal-image-item-append', function (event) {
                let $this = $(this);
                let $id = $this.attr('data-id-image');
                let $list_id = $("#list_image").val();

                $list_id = $list_id.replace($id+',','');
                $("#list_image").val($list_id);
                SweetAlert2.messagesSwal('success',' Xoá thành công ');
                $this.parents('.image-item').remove();
            })
        })
    }
}


$(function(){
    Media.init();
})