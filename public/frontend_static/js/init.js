import { default as swal } from 'sweetalert2'
import lazyloading  from './../library/lazyload.min'
import { setCookie, checkCookie } from './helpers/browser'
import './../js/component/comment';

import { loadCss }  from './helpers/loadCssJs'

var Init  = {

    configSelect : {
        'iconLoading' : 'fa fa-spinner fa-spin',
    },

    init : function()
    {

        // check lai url  menu

        $('.tab_menu_replate').click( function(){
            let id = $(this).attr('data-href');
            $(".tab-pane").removeClass('active');

            $(".tab_menu_replate").parent('li').removeClass('active');
            $(this).parent('li').addClass('active');

            $(id).addClass('active');
        })

        $("#main-menu-top .dropdown").find('ul').each(function(index, value){
            $(this).prev('a').attr('href','#');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $("#top-form-search").click(function(event){
            event.preventDefault();

            let form = $(this).parents('form');

            let $keyword = form.children('input').val();

            // kiem tra ton tai chua
            let $list_keyword = localStorage.getItem('keyword');

        });


        $(".load_more").click(function(){
            $(".tax-m_description").slideToggle("slow");
        });


        let __this = this;

        __this.pupopInfo();
        __this.saveInfoPopup();
        __this.lazyLoadingImage();
        __this.lazyLoadingCss();
        __this.saveInfoFooter();

    },

    messagesSwal : function($type='success',$messages='Dữ liệu đã được xử lý thành công! !')
    {
        swal({
            title: $messages,
            type: $type,
            timer: 200000,
            showCancelButton:false,
            showConfirmButton:false,
            position: 'top-right',
        })
    },

    saveInfoFooter : function()
    {
        let __this = this;
        $("#success--footer").click(function (event) {
            event.preventDefault();

            let $this = $(this);
            let $flag = true;
            $(".errors").remove();

            $.each($("#form--footer-info .validate") , function(index,value){
                if ($(this).val().length == 0)
                {
                    $flag = false;
                    $(this).after('<span class="errors">Mời bạn điền thông tin</span>')
                }
            });

            if ($('#selector-product option:selected').val().length == 0)
            {
                $flag = false;
                $('#selector-product').after('<span class="errors">Mời bạn điền thông tin</span>')
            }


            if ($flag == true)
            {
                let $url = $this.attr('data-url');
                if ($url) {
                    let $name     = $("#form--footer-info").find("input[name=name]").val();
                    let $email    = $("#form--footer-info").find("input[name=email]").val();
                    let $phone    = $("#form--footer-info").find("input[name=phone]").val();
                    let $product  = $('#selector-product option:selected').val();

                    let $element = $this.html();

                    $this.removeClass('btn-outline-danger').html('<i class="'+__this.configSelect.iconLoading+'"></i> Đang xử lý');

                    if ($name, $phone,$email,$product) {

                        $.ajax({
                            url: $url,
                            type: 'POST',
                            async: true,
                            dataType: 'json',
                            data: {email: $email,name : $name,phone : $phone,product : $product}
                        })
                        .done(function (result) {

                            if (result && result.code == 1) {
                                $('.cookie-popup-wrap-form').fadeOut();
                                $("#form--footer-info")[0].reset();
                                setCookie('popup', 1,100);

                                $this.html($element);
                                __this.messagesSwal('success', 'Cảm ơn bạn đã đăng ký xác nhận, chúng tôi sẽ sớm liên hệ với bạn')
                            }
                        })
                    } else
                    {
                        __this.messagesSwal('warning','Mời bạn nhập đầy đủ thông tin')
                    }
                }
            }
        })
    },

    saveInfoPopup : function()
    {
        let __this = this;

        $("#save-info-guard").click(function (event) {
            event.preventDefault();

            let $this = $(this);
            let $flag = true;
            $(".errors").remove();

            $.each($("#cookie-popup-form .validate") , function(index,value){
                if ($(this).val().length == 0)
                {
                    $flag = false;
                    $(this).after('<span class="errors">Mời bạn điền thông tin</span>')
                }
            });


            if ($flag == true)
            {
                let $url = $this.attr('data-url');

                if ($url) {
                    let $name     = $(".cookie-popup").find("input[name=name]").val();
                    let $email    = $(".cookie-popup").find("input[name=email]").val();
                    let $phone    = $(".cookie-popup").find("input[name=phone]").val();
                    let $messages = $(".cookie-popup").find("textarea[name=messages]").val();

                    if ($name, $phone) {

                        $.ajax({
                            url: $url,
                            type: 'POST',
                            async: true,
                            dataType: 'json',
                            data: {email: $email,name : $name,phone : $phone,messages : $messages}
                        })
                        .done(function (result) {

                            if (result && result.code == 1) {
                                $('.cookie-popup-wrap-form').fadeOut();
                                $("#cookie-popup-form")[0].reset();
                                setCookie('popup', 1,100);
                                __this.messagesSwal('success', 'Cảm ơn bạn đã đăng ký xác nhận, chúng tôi sẽ sớm liên hệ với bạn')
                            }
                        }).fail(function (XMLHttpRequest, textStatus, thrownError) {
                            __this.messagesSwal('warning','Có lỗi xử lý từ hệ thống Xin hãy liên lạc theo sđt mà chúng tôi đã cung cấp ở website');
                        });
                    } else
                    {
                        __this.messagesSwal('warning','Mời bạn nhập đầy đủ thông tin')
                    }
                }
            }
        })
    },

    pupopInfo : function()
    {
        // check isset cookie
        if (!checkCookie('popup'))
        {
            setTimeout(function(){ $(".cookie-popup-wrap").fadeIn() }, 5000);
        }

        $('#closepopup').click(function () {
            $(this).parents('.cookie-popup-wrap').fadeOut();
            setCookie('popup', 1,50);
        })
    },

    lazyLoadingImage : function () {
        (function () {
            function logElementEvent(eventName, element) {
                Date.now(), eventName, element.getAttribute("data-src")
            }

            let ll = new lazyloading({
                elements_selector: 'body .lazy',
                load_delay: 150,
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
                    element.src = "/images/placeholder.png";
                }
            });
        }());
    },

    lazyLoadingCss : function()
    {
        if (typeof HREF_CSS != 'undefined') {
            loadCss(HREF_CSS);
        }
    }

}


$(function () {
    Init.init();
})