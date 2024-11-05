import SweetAlert2 from  './../plugin/runSweetAlert2';
var Accept = {
    configSelect : {
        'iconLoading' : 'fa fa-spinner fa-spin',
    },

    init : function () {
        let __this = this;

        $(".component--accept").click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let $url  = $this.attr('href');

            $this.removeClass('btn-outline-success').html('<i class="'+__this.configSelect.iconLoading+'"></i> Đang xử lý');

            $.ajax({
                url : $url,
                type : 'POST',
                dataType: 'json',
                async: true,
            }).done(function (responsive) {

                if (responsive)
                {
                    switch (responsive.code)
                    {
                        case 0 :
                            SweetAlert2.messagesSwal('error',' Thêm thất bại hoạc dữ liệu trùng');
                            break;
                        case 1:
                            SweetAlert2.messagesSwal('success',' Thêm dữ liệu thành công ');
                            break
                    }

                    $this.parents('tr').remove();
                }

            }).fail(function (XMLHttpRequest, textStatus, thrownError) {
                SweetAlert2.messagesSwal('warning','Có lỗi xẩy ra và nguyên nhân chưa xác định');
            });
        })
    }
}

$(function () {
    Accept.init();
})