$(function() {
    //User Trict
    "user strict";
    /*Preloader animsition*/
    $(window).on('load', function () {
        $('.page-loader').fadeOut('slow', function () {
            $(this).remove();
        });
    });
    /*Navigation control*/
    var hamburgerAnimation = $(".hamburger.has-animation");
    var hamburgerNoAnimation = $(".hamburger");
    var navbar = $('.nav-right');
    var navbarVertical = $('.navbar-vertical .navbar-main');
    var navbarV3 = $('.navbar-center .navbar-menu');
    hamburgerAnimation.on("click", function () {
        hamburgerAnimation.toggleClass("is-active");
    });
    hamburgerNoAnimation.on("click", function () {
        navbar.toggleClass('opened');
        navbarV3.toggleClass('opened');
        navbarVertical.toggleClass('opened');
    });

    // Navbar menu caret
    $('.dropdown i').on('click', function (e) {
        $(this).siblings('.dropdown-menu').toggleClass('open');
        $(this).toggleClass('fa-rotate-180');
        e.stopPropagation();
    });



    // BUTTON SEARCH
    $('.ic-search').on('click', function () {
        $('.search').toggle(500);
    });

    

    // categories li active sidebar
    $(".filters-button-group li").on('click', function () {
        $(".filters-button-group li").removeClass("active");
        $(this).addClass("active");
    });

    

    // categories li active sidebarV2
    $(".filters-button-groupV2 li").on('click', function() {
        $(".filters-button-groupV2 li").removeClass("active");
        $(this).addClass("active");
    });


    
  
    // slide button filter
    $(document).ready(function(){
        $("button.filter").on('click', function(){
            $("div.box-filter").toggle(500);

        });
    });
    // BUTTON SEARCHV2
    $(function () {
         $('.fa-search').stop().click( function(){
            $check = $(".searchV2");
            if($check.hasClass("add-transitions"))
            {
                $check.removeClass("add-transitions");
            }
            else 
            {
                $check.addClass("add-transitions");
            }
        })
    });


   
     // Back to top
    $(window).on('scroll', function() {
        if ($(this).scrollTop() != 0) {
          $('#bttop').fadeIn();
        } else {
          $('#bttop').fadeOut();
        }
    });

    $('#bttop').on('click', function() {
         $('body,html').animate({
            scrollTop: 0
         }, 800);
    });

    //
    
   
    // scrollTop
      var nav = $('.aaaa');
      $(window).scroll(function () {
        if ($(this).scrollTop() > 140) {
          nav.addClass("fixed");
          // $('.nav__product').addClass('fixed')
         
        } else {
          nav.removeClass("fixed");
            // $('.nav__product').removeClass('fixed')
        }
      });





     
});





//slide zoom product detail

;(function($){

    'use strict';

    $.mad_core = $.mad_core || {};

    $.mad_core = {

        setUp: function (options) {
            var base = this;

            var animEndEventNames = {
                'WebkitAnimation' : 'webkitAnimationEnd',
                'OAnimation' : 'oAnimationEnd',
                'msAnimation' : 'MSAnimationEnd',
                'animation' : 'animationend'
            },
            transEndEventNames = {
                'WebkitTransition': 'webkitTransitionEnd',
                'MozTransition': 'transitionend',
                'OTransition': 'oTransitionEnd',
                'msTransition': 'MSTransitionEnd',
                'transition': 'transitionend'
            }

            base.$window = $(window);
            base.SUPPORT = {

            };
            base.XHRLEVEL2 = !!window.FormData;
            base.event = base.SUPPORT.ISTOUCH ? 'touchstart' : 'click';

            // Refresh elements
            base.refresh();
        },

        DOMLoaded: function(options) {

            var base = this;

            // set up
            base.setUp(options);

            // counters
            if($('.counter').length) base.counters();
            
            // responsive menu
            if($('#header').length) base.navInit.init(this);

            // search
            if($('.search-holder').length) base.searchHolder();

            // background load
            if($('[data-bg]').length) base.bg();

            // sync carousel
            if($('.owl-carousel[data-sync]').length) base.syncOwlCarousel.init();

            // hidden elements init
            if($('.hidden-section').length) base.hiddenSections();

            // dropdown elements init
            if($('.dropdown-invoker').length) base.dropdown();

            // close btn init
            if($('.item-close').length) base.closeBtn();
            if($('.shopping-cart-full').length) base.removeProduct();

        },

        elements: {
            '.main-navigation, .topbar:not(.no-mobile-advanced)': 'navMain',
            '#mobile-advanced': 'navMobile',
            '#wrapper': 'wrapper',
            '#header' : 'header'
        },

        /*
        Plugin Name:    Refresh
        */
        $: function (selector) {
            return $(selector);
        },

        refresh: function() {
            for (var key in this.elements) {
                this[this.elements[key]] = this.$(key);
            }
        },


        /**
         * Emulates single accordion item
         * @param Function callback
         * @return jQuery collection;
         **/
        hiddenSections: function(callback){

            var collection = $('.hidden-section');
            if(!collection.length) return;

            collection.each(function(i, el){
                $(el).find('.content').hide();
            });

            collection.on('click.hidden', '.invoker', function(e){

                e.preventDefault();

                var content = $(this).closest('.hidden-section').find('.content');

                content.slideToggle({
                    duration: 500,
                    easing: 'easeOutQuint',
                    complete: callback ? callback : function(){}
                });

            });

            return collection;

        },

      

        /**
        Sync Owl Carousel
        **/
        syncOwlCarousel: {

            init: function(){

                this.collection = $('.owl-carousel[data-sync]');
                if(!this.collection.length) return false;

                this.bindEvents();

            },

            bindEvents: function(){

                var self = this;

                this.collection.each(function(i, el){

                    var $this = $(el),
                        sync = $($this.data('sync'));

                    if(!sync.length){
                        console.log('Not found carousel with selector ' + $this.data('sync'));
                        return;
                    }

                    // nav
                    $this.on('click', '.owl-prev', function(e){
                        sync.trigger('prev.owl.carousel');
                    });
                    $this.on('click', '.owl-next', function(e){
                        sync.trigger('next.owl.carousel');
                    });

                    sync.on('click', '.owl-prev', function(e){
                        $this.trigger('prev.owl.carousel');
                    });
                    sync.on('click', '.owl-next', function(e){
                        $this.trigger('next.owl.carousel');
                    });

                    // // drag 
                    $this.on('dragged.owl.carousel', function(e){

                        if(e.relatedTarget.state.direction == 'left'){
                            sync.trigger('next.owl.carousel');
                        }
                        else{
                            sync.trigger('prev.owl.carousel');
                        }
                        
                    });

                    sync.on('dragged.owl.carousel', function(e){

                        if(e.relatedTarget.state.direction == 'left'){
                            $this.trigger('next.owl.carousel');
                        }
                        else{
                            $this.trigger('prev.owl.carousel');
                        }

                    });

                });

            }

        },

        /**
         Adds background image
         * @return undefined;
        **/
        bg: function(collection){

            var collection = collection ? collection : $('[data-bg]');

            collection.each(function(){

                var $this = $(this),
                    bg = $this.data('bg');

                if(bg) $this.css('background-image', 'url('+bg+')');

            });

        },

        navInit : {

            init : function (base) {

                this.createResponsiveButtons.call(base);
                this.navProcess(base);

                if ( base.SUPPORT.ISTOUCH ) {
                    this.touchNavEvent(base);
                }
            },

            touchNavEvent: function (base) {
                var clicked = false;

                $("li.menu-item-has-children > a, li.cat-parent > a, li.page-item-has-children > a").on(base.event, function (e) {
                    if (clicked != this) {
                        e.preventDefault();
                        clicked = this;
                    }
                });
            },

            navProcess: function (base) {

                base.navInit.touchNav(base, base.$window);

                $(window).resize(function (e) {
                    setTimeout(function () {
                        base.navInit.touchNav(base, e.currentTarget);
                    }, 30);
                });

            },

            touchNav: function (base, target) {

                if (base.SUPPORT.ISTOUCH || $(target).width() < 992) {

                    if (!base.navMobile.children('ul').length) {
                        base.navMobile.append(base.navMain.html());
                    }

                    base.navButton.on(base.event, function (e) {
                        e.preventDefault();

                        if (!base.wrapper.is('.active')) {
                            $('html, body').animate({ scrollTop: 0 }, 0, function () {
                                base.wrapper.css({
                                    height: base.navMobile.children('ul').outerHeight(true)
                                }).addClass('active');
                            });
                        }
                    });

                    base.navHide.on(base.event, function (e) {
                        e.preventDefault();
                        if (base.wrapper.is('.active')) {
                            base.wrapper.css({ height: 'auto' }).removeClass('active');
                        }
                    });

                } else {
                    base.navMobile.children('ul').remove();
                }
            },

            createResponsiveButtons : function () {

                this.navButton = $('<button></button>', {
                    id: 'responsive-nav-button',
                    'class': 'responsive-nav-button'
                }).insertBefore(this.navMain);

                this.navHide = $('<a></a>', {
                    id: 'advanced-menu-hide',
                    'href' : '#'
                }).insertBefore(this.navMobile); 

            },

        }

    }

    $(function(){

        $.mad_core.DOMLoaded();

        $(".nav__product li a").click( function () {

            $('html, body').stop().animate({
                scrollTop : $($(this).attr('href')).offset().top - 100
            },1000)
        })

    });

})(jQuery);

