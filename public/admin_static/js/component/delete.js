import SweetAlert2 from  './../plugin/runSweetAlert2';
import './../../../admin_static/js/plugin/jquery-confirm.min'

var Delete = {
    configSelect : {
        'iconLoading' : 'fa fa-spinner fa-spin',
        'itemImage'   : '.image_item'
    },

    init : function()
    {
        let __this = this;

        $(document).ready(function () {
            $(document).on('click','.component--delete', function (event) {
                event.preventDefault();

                let $this = $(this);
                let $url  = $this.attr('href');

                $this.removeClass('btn-outline-danger').html('<i class="'+__this.configSelect.iconLoading+'"></i> Đang xử lý');

                $.ajax({
                    url : $url,
                    type : 'POST',
                    dataType: 'json',
                    async: true,
                }).done(function (responsive) {
                    if (responsive && responsive.code == 1)
                    {
                        let $type = $this.attr('data-type');

                        if ($type)
                        {
                            switch ($type)
                            {
                                case 'image':
                                    $this.parents(__this.configSelect.itemImage).remove();
                                    break;

                                default:
                                    $this.parents('tr').remove();
                            }
                        }else
                        {
                            $this.parents('tr').remove();
                        }

                        SweetAlert2.messagesSwal('success','Xoá dữ liệu thành công ');
                    }

                }).fail(function (XMLHttpRequest, textStatus, thrownError) {
                    SweetAlert2.messagesSwal('warning','Có lỗi xẩy ra và nguyên nhân chưa xác định');
                });
            });
        })
    }
}

var Delete_v2 = {
    init : function()
    {
        $('.comfirm_delete_ajax').click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let url = $(this).attr("href");

            $.confirm({
                title: ' Xoá dữ liệu',
                theme: 'supervan',
                content: ' Bạn có chắc chắn thực hiện thao tác này không !!!',
                type: 'green',
                buttons: {
                    ok: {
                        text: "ok!",
                        btnClass: 'btn-danger',
                        keys: ['enter'],
                        action: function(){
                            $.ajax({
                                url : url,
                                type : 'POST',
                                dataType: 'json',
                                async: true})
                                .done(function (responsive) {
                                    if (responsive && responsive.code == 1)
                                    {
                                        SweetAlert2.messagesSwal('success','Xoá dữ liệu thành công ');
                                        $this.parents('tr').remove();
                                    }else
                                    {
                                        SweetAlert2.messagesSwal('warning','Có lỗi xẩy ra và nguyên nhân chưa xác định');
                                    }
                                }).fail(function (XMLHttpRequest, textStatus, thrownError) {
                                if(thrownError === 'Forbidden')
                                {
                                    SweetAlert2.messagesSwal('warning','Bạn không có quyền truy cập này');
                                }
                            });
                        }
                    },
                    cancel: function(){}
                }
            });
        })
    }
}


$(function () {
    Delete.init();
    Delete_v2.init();
})