var Slug = {
    configSelect : {
        'btnEditSlug'    : '.component--edit-slug', // chinh sua
        'inputCreateUrl' : '.component--create--url',// dau vao
        'outputUrl'      : '.component--output--url', // dau ra
    },

    init : function () {
        let __this = this;


        // tu dong append vao input url khi nhap tieu de

        $(__this.configSelect.inputCreateUrl).on('input',function(){
            let $this = $(this);
            let slug = $this.val();

            $(__this.configSelect.outputUrl).val(__this.slug(slug));
        });

        $(__this.configSelect.btnEditSlug).click( function (event) {
            event.preventDefault();
            $(__this.configSelect.outputUrl).removeAttr('readonly')
        })


        $(__this.configSelect.outputUrl).change(function(){
            let $this = $(this);
            let slug  = $this.val();
            $(__this.configSelect.outputUrl).val((slug));
        });
    },

    slug : function (str) {
        // Chuyển hết sang chữ thường
        str = str.toLowerCase();

        // xóa dấu
        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');

        // Xóa ký tự đặc biệt
        str = str.replace(/([^0-9a-z-\s])/g, '');

        // Xóa khoảng trắng thay bằng ký tự -
        str = str.replace(/(\s+)/g, '-');

        // xóa phần dự - ở đầu
        str = str.replace(/^-+/g, '');

        // xóa phần dư - ở cuối
        str = str.replace(/-+$/g, '');

        // return
        return str;
    }
}


$(function () {
    Slug.init();
})