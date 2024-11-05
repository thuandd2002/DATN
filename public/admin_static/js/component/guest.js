import SweetAlert2 from  './../plugin/runSweetAlert2';

var Guest = {
    init : function(){
        let __this = this;


        $(".component--guest-item").click(function(){
            
            let $this = $(this);
            let $id   = $this.parents('tr').attr('data-id');
            let $url  = $this.parents('tr').attr('data-url');
            $(".tr-append").remove();

            if ($id)
            {
                $.ajax({
                    url : $url,
                    type : 'POST',
                    dataType: 'html',
                    async: true,
                }).done(function (responsive) {
                    if (responsive)
                    {
                        $this.parents('tr').after(responsive);
                    }

                }).fail(function (XMLHttpRequest, textStatus, thrownError) {
                    SweetAlert2.messagesSwal('warning','Có lỗi xẩy ra và nguyên nhân chưa xác định');
                });
            }
        })

    }
}


$(function () {
    Guest.init();
})