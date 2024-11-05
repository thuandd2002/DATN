import $ from 'jquery'
import './../../../js/component/messages';
import './../owl.carousel'
import lazyloading  from './../../../library/lazyload.min'

import {messagesSwal} from  './../../../js/component/messages'
var ProductDetail = {
    configSelect : {
        'iconLoading' : 'fa fa-spinner fa-spin',
    },
    init : function()
    {
        let __this = this;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })


        window.onscroll = function() {

            let height_main = $('.main-height').height();

            let wScrollTop = ($(this).scrollTop());

            if (wScrollTop >= height_main)
            {
                $(".nav__product").hide();
            }else
            {
                $(".nav__product").show();
            }

        };

        __this.showProduct();

        $("#submit--info").click( function(event){
            event.preventDefault();


            let $this = $(this);

            let $input = $this.parents('#info__contact-form').find("input");

            let $flag = true;
            $(".errors").remove();

            $.each($input , function(index,value){
                let text= '';
                if ($(this).attr('name') == 'email' && !isEmailValid($(this).val())){
                    $flag = false;
                    text = '<span class="errors">Email không đúng định dạng</span>';

                }
                if ($(this).attr('name') == 'number'){
                    if (!isPhoneNumberValid($(this).val())){
                        $flag = false;
                        text = '<span class="errors">Số điện thoại không đúng định dạng</span>';
                    }
                    if($(this).val().length > 10){
                        $flag = false;
                        text = '<span class="errors">Số điện thoại không vượt quá 10 ký tự</span>';
                    }else if ($(this).val().length < 10){
                        $flag = false;
                        text = '<span class="errors">Số điện thoại không nhỏ hơn 10 ký tự</span>';

                    }

                }
                if ($(this).attr('name') == 'name'){
                    if($(this).val() == 0){
                        $flag = false;
                        text = '<span class="errors"> Trường '+ $(this).data('name') +' không được để trống</span>';
                    }
                }
                if ($(this).attr('name') == 'email'){
                    if($(this).val() == 0){
                        $flag = false;
                        text = '<span class="errors"> Trường '+ $(this).data('name') +' không được để trống</span>';
                    }
                }
                if ($(this).attr('name') == 'number'){
                    if($(this).val() == 0){
                        $flag = false;
                        text = '<span class="errors"> Trường '+ $(this).data('name') +' không được để trống</span>';
                    }
                }
                if ($(this).attr('name') == 'date'){
                    if($(this).val() == 0){
                        $flag = false;
                        text = '<span class="errors"> Trường '+ $(this).data('name') +' không được để trống</span>';
                    }
                }
                // if ($(this).val().length == 0)
                // {
                //     $flag = false;
                //     text = '<span class="errors"> Trường '+ $(this).data('name') +' không được để trống</span>';
                // }
                $(this).after(text);
            });
            if ($flag == true)
            {
                let $name  = $("#info__contact-form").find("input[name=name]").val();
                let $email = $("#info__contact-form").find("input[name=email]").val();
                let $phone = $("#info__contact-form").find("input[name=number]").val();
                let $message = $("#info__contact-form").find("input[name=messages]").val();
                let $carDate = $("#info__contact-form").find("input[name=date]").val();
                let $id    = $this.attr('data-id');



                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var HH = String(today.getHours()).padStart(2, '0');
                var MM = String(today.getMinutes()).padStart(2, '0');
                // var SS = String(today.getSeconds()).padStart(2, '0');
                today = mm + '/' + dd + '/' + yyyy + ' ' + HH + ':' + MM ;
                const x = new Date($carDate);
                const y = new Date(today);
                if ($name && $email && $phone && (x >= y))
                {
                    let $element = $this.html();
                    $this.removeClass('btn-outline-danger').html('<i class="'+__this.configSelect.iconLoading+'"></i> Đang xử lý');

                    let $url = $this.attr('data-url');
                    if ($url)
                    {
                        $.ajax({
                            url: $url,
                            type: 'POST',
                            async : true,
                            dataType: 'json',
                            data : { email : $email,name : $name, phone : $phone,id : $id, car_viewing_day: $carDate , messages : $message }
                        })
                            .done(function (result) {
                                if (result)
                                {
                                    if (result.code == 1)
                                    {
                                        $("#info__contact-form")[0].reset();
                                        $this.html($element);
                                        messagesSwal('success','Cảm ơn bạn đã đăng ký xác nhận, chúng tôi sẽ sớm liên hệ với bạn')

                                    }else if (result.code == 0)
                                    {
                                        messagesSwal('warning',' Email đã tồn tại ');
                                    }
                                }
                            })
                    }
                }else{
                    Swal.fire({
                        title: 'Mời bạn chọn ngày xem xe phải lớn hơn hoặc bẳng ngày, giờ hiện tại',
                        icon: 'warning',
                        position: 'center-center',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                }
            }

        });
    },

    showProduct : function()
    {
        $('.slider-car .owl-carousel').owlCarousel({
            autoplay: true,
            lazyLoad: true,
            loop: true,
            margin: 10,
            autoplayTimeout:3500,
            autoplayHoverPause:true,
            nav:true,
            responsive:{
                0:{
                    items:2
                },
                768:{
                    items:3
                },
                1199:{
                    items:4
                },
            }
        })
    }
}
$(function () {
    ProductDetail.init();
    (function () {
        function logElementEvent(eventName, element) {
            Date.now(), eventName, element.getAttribute("data-src")
        }

        let ll = new lazyloading({
            elements_selector: 'body .lazy',
            load_delay: 300,
            threshold: 0,
            callback_enter: function (element) {
                logElementEvent("ENTERED", element);
            },
            callback_load: function (element) {
                logElementEvent("LOADED", element);
            },
            callback_set: function (element) {
                logElementEvent("SET", element);
            },
            callback_error: function (element) {
                logElementEvent("ERROR", element);
                element.src = "https://static.123job.vn/images/loading.gif";
            }
        });
    }());

});
function isEmailValid(email) {
    const emailRegexp = new RegExp(
        /^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i
    );

    return emailRegexp.test(email);
}
function isPhoneNumberValid(number) {
    const emailRegexp = new RegExp(
        /^[0]{1}\d{9}/
    );

    return emailRegexp.test(number);
}