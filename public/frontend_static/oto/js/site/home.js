import $ from 'jquery'
import './../owl.carousel'
import lazyloading  from './../../../library/lazyload.min'
var Home = {
    init : function()
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


$(function(){
    Home.init();


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
                // element.src = "https://static.123job.vn/images/loading.gif";
            }
        });
    }());
})