var LengthContentSeo = {
    configSelector : {
        'classMaxLength'        : '.max-length',
        'clsasCountLenght'      : '.count-lenght-input'
    },

    init : function()
    {
        let __this = this;
        __this.validatorForm();
    },

    validatorForm()
    {
        let _this = this;
        $(_this.configSelector.classMaxLength).on('input',function(){
            $length     = $(this).val().length;
            $max_lenght = $(this).attr('maxlength');
            $(this).parents('.form-group').find(_this.configSelector.clsasCountLenght).html($(this).val().length);

            $class_move = $(this).attr('data-move');

            if ($class_move)
            {
                $('.'+$class_move).val($(this).val());
            }
        });
    }
};


$(function(){
    LengthContentSeo.init();
})