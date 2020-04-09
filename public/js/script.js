/*-----------------------------------------------------------------------------------

 Template Name:Multikart
 Template URI: themes.pixelstrap.com/multikart
 Description: This is E-commerce website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
// 01.Pre loader
// 02.Tap on Top
// 03.Age verify modal
// 04.Mega menu js
// 05.Image to background js
// 06.Filter js
// 07.Left offer toggle
// 08.Toggle nav
// 09.Footer according
// 10.Add to cart quantity Counter
// 11.Product page Quantity Counter
// 12.Full slider
// 13.Slick slider
// 14.Header z-index js
// 15.Tab js
// 16.Category page
// 17.Filter sidebar js
// 18.Add to cart
// 19.Add to wishlist
// 20.Color Picker
// 21.RTL & Dark-light
// 22.Menu js
// 23.Theme-setting
// 24.Add to cart sidebar js
// 25.Tooltip


(function($) {
    "use strict";

    /*=====================
     01.Pre loader
     ==========================*/
    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });
    $('#preloader').fadeOut('slow', function() {
        $(this).remove();
    });


    /*=====================
     02.Tap on Top
     ==========================*/
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('.tap-top').fadeIn();
        } else {
            $('.tap-top').fadeOut();
        }
    });
    $('.tap-top').on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /*=====================
     03. Age verify modal
     ==========================*/
    $(window).on('load',function(){
        $('#ageModal').modal('show');
    });



    /*=====================
     04. Mega menu js
     ==========================*/
    if ($(window).width() > '1200') {
        $('#hover-cls').hover(
            function () {
                    $('.sm').addClass('hover-unset');
            }
        )

    }
    if ($(window).width() > '1200') {
        $('#sub-menu > li').hover(
            function () {
                if($(this).children().hasClass('has-submenu')) {
                    $(this).parents().find('nav').addClass('sidebar-unset');
                }
            },
            function(){
                $(this).parents().find('nav').removeClass('sidebar-unset');
            }
        )
    }


    /*=====================
     05. Image to background js
     ==========================*/
    $(".bg-top" ).parent().addClass('b-top');
    $(".bg-bottom" ).parent().addClass('b-bottom');
    $(".bg-center" ).parent().addClass('b-center');
    $(".bg_size_content").parent().addClass('b_size_content');
    $(".bg-img" ).parent().addClass('bg-size');
    $(".bg-img.blur-up" ).parent().addClass('blur-up lazyload');

    jQuery('.bg-img').each(function() {

        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();

        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display' : 'block'
        });

        el.hide();
    });


    /*=====================
     06. Filter js
     ==========================*/
    $(".filter-button").click(function(){
        $(this).addClass('active').siblings('.active').removeClass('active');
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
    });

    $("#formButton").click(function(){
        $("#form1").toggle();
    });

    /*=====================
     07. left offer toggle
     ==========================*/
    $(".heading-right h3").click(function(){
        $(".offer-box").toggleClass("toggle-cls");
    });


    /*=====================
     08. toggle nav
     ==========================*/
    $('.toggle-nav').on('click', function () {
        $('.sm-horizontal').css("right","0px");
    });
    $(".mobile-back").on('click', function (){
        $('.sm-horizontal').css("right","-410px");
    });


    /*=====================
     09. footer according
     ==========================*/
    var contentwidth = jQuery(window).width();
    if ((contentwidth) < '750') {
        jQuery('.footer-title h4').append('<span class="according-menu"></span>');
        jQuery('.footer-title').on('click', function () {
            jQuery('.footer-title').removeClass('active');
            jQuery('.footer-contant').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });
        jQuery('.footer-contant').hide();
    } else {
        jQuery('.footer-contant').show();
    }

    if ($(window).width() < '1183') {
        jQuery('.menu-title h5').append('<span class="according-menu"></span>');
        jQuery('.menu-title').on('click', function () {
            jQuery('.menu-title').removeClass('active');
            jQuery('.menu-content').slideUp('normal');
            if (jQuery(this).next().is(':hidden') == true) {
                jQuery(this).addClass('active');
                jQuery(this).next().slideDown('normal');
            }
        });
        jQuery('.menu-content').hide();
    } else {
        jQuery('.menu-content').show();
    }


    /*=====================
     10. Add to cart quantity Counter
     ==========================*/
    $("button.add-button").click(function(){
        $(this).next().addClass("open");
        $(".qty-input").val('1');
    });
    $('.quantity-right-plus').on('click',function(){
        var $qty = $(this).siblings(".qty-input");
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('.quantity-left-minus').on('click',function(){
        var $qty = $(this).siblings(".qty-input");
        var _val =  $($qty).val();
        if(_val == '1') {
            var _removeCls = $(this).parents('.cart_qty');
            $(_removeCls).removeClass("open");
        }
        var currentVal = parseInt($qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            $qty.val(currentVal - 1);
        }
    });


    /*=====================
     11. Product page Quantity Counter
     ==========================*/
    $('.collection-wrapper .qty-box .quantity-right-plus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal)) {
            $qty.val(currentVal + 1);
        }
    });
    $('.collection-wrapper .qty-box .quantity-left-minus').on('click', function () {
        var $qty = $('.qty-box .input-number');
        var currentVal = parseInt($qty.val(), 10);
        if (!isNaN(currentVal) && currentVal > 1) {
            $qty.val(currentVal - 1);
        }
    });


    /*=====================
     12. Full slider
     ==========================*/
    if ($(window).width() > 767){
        var $slider = $(".full-slider");
        $slider.
        on('init', function () {
            mouseWheel($slider);
        }).
        slick({
            dots: true,
            nav: false,
            vertical: true,
            infinite: false });

        function mouseWheel($slider) {
            $(window).on('wheel', { $slider: $slider }, mouseWheelHandler);
        }
        function mouseWheelHandler(event) {
            event.preventDefault();
            var $slider = event.data.$slider;
            var delta = event.originalEvent.deltaY;
            if (delta > 0) {
                $slider.slick('slickNext');
            } else
            {
                $slider.slick('slickPrev');
            }
        }
    }
    else{
        var $slider = $(".full-slider");
        $slider.
        on('init', function () {
            mouseWheel($slider);
        }).
        slick({
            dots: true,
            nav: false,
            vertical: false,
            infinite: false });

        function mouseWheel($slider) {
            $(window).on('wheel', { $slider: $slider }, mouseWheelHandler);
        }
        function mouseWheelHandler(event) {
            event.preventDefault();
            var $slider = event.data.$slider;
            var delta = event.originalEvent.deltaY;
            if (delta > 0) {
                $slider.slick('slickNext');
            } else
            {
                $slider.slick('slickPrev');
            }
        }
    }


    /*=====================
     13. slick slider
     ==========================*/
    $('.slide-1').slick({
        // autoplay: true,
        // autoplaySpeed: 5000
    });

    $('.slide-2').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-3').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.team-4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 586,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-4').slick({
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 586,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.product-4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.tools-product-4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.product_4').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1430,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow:2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.product-3').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint:991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });

    $('.slide-6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }

        ]
    });

    $('.brand-6').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 6,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 360,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });

    $('.product-slider-5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 420,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.product-5').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-7').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 7,
        slidesToScroll: 7,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    infinite: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slide-8').slick({
        infinite: true,
        slidesToShow: 8,
        slidesToScroll: 8,
        responsive: [

            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6
                }
            }
        ]
    });

    $('.center').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.product-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
        vertical: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.product-slick',
        arrows: false,
        dots: false,
        focusOnSelect: true
    });

    $('.product-right-slick').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.slider-right-nav'
    });
    if ($(window).width() > 575) {
        $('.slider-right-nav').slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    }else{
        $('.slider-right-nav').slick({
            vertical: false,
            verticalSwiping: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-right-slick',
            arrows: false,
            infinite: true,
            centerMode: false,
            dots: false,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }


    /*=====================
     14.Header z-index js
     ==========================*/
    if ($(window).width() < 1199) {
        $('.header-2 .navbar .sidebar-bar, .header-2 .navbar .sidebar-back, .header-2 .mobile-search img').on('click', function () {
            if ($('#mySidenav').hasClass('open-side')) {
                $('.header-2 #main-nav .toggle-nav').css('z-index', '99');
            } else {
                $('.header-2 #main-nav .toggle-nav').css('z-index', '1');
            }
        });
        $('.sidebar-overlay').on('click', function () {
            $('.header-2 #main-nav .toggle-nav').css('z-index', '99');
        });
        $('.header-2 #search-overlay .closebtn').on('click', function () {
            $('.header-2 #main-nav .toggle-nav').css('z-index', '99');
        });
        $('.layout3-menu .mobile-search .ti-search, .header-2 .mobile-search .ti-search').on('click', function () {
            $('.layout3-menu #main-nav .toggle-nav, .header-2 #main-nav .toggle-nav').css('z-index', '1');
        });
    }


    /*=====================
     15.Tab js
     ==========================*/
    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-4').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-4").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint:991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-5').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        var slider_class = $(this).parent().parent().parent().find(".tab-content").children().attr("class").split(' ').pop();
        $(".product-5").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1367,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });
    });



    $("#tab-1").css("display", "Block");
    $(".default").css("display", "Block");
    $(".tabs li a").on('click', function () {
        event.preventDefault();
        $('.tab_product_slider').slick('unslick');
        $('.product-3').slick('unslick');
        $(this).parent().parent().find("li").removeClass("current");
        $(this).parent().addClass("current");
        var currunt_href = $(this).attr("href");
        $('#' + currunt_href).show();
        $(this).parent().parent().parent().parent().find(".tab-content").not('#' + currunt_href).css("display", "none");
        $(".product-3").slick({
            arrows: true,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint:991,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });


    /*=====================
     16 .category page
     ==========================*/
    $('.collapse-block-title').on('click', function(e) {
        e.preventDefault;
        var speed = 300;
        var thisItem = $(this).parent(),
            nextLevel = $(this).next('.collection-collapse-block-content');
        if (thisItem.hasClass('open')){
            thisItem.removeClass('open');
            nextLevel.slideUp(speed);
        }
        else {
            thisItem.addClass('open');
            nextLevel.slideDown(speed);
        }
    });
    $('.color-selector ul li').on('click', function(e) {
        $(".color-selector ul li").removeClass("active");
        $(this).addClass("active");
    });
//list layout view
    $('.list-layout-view').on('click', function(e) {
        $('.collection-grid-view').css('opacity', '0');
        $(".product-wrapper-grid").css("opacity","0.2");
        $('.shop-cart-ajax-loader').css("display","block");
        $('.product-wrapper-grid').addClass("list-view");
        $(".product-wrapper-grid").children().children().removeClass();
        $(".product-wrapper-grid").children().children().addClass("col-lg-12");
        setTimeout(function(){
            $(".product-wrapper-grid").css("opacity","1");
            $('.shop-cart-ajax-loader').css("display","none");
        }, 500);
    });
//grid layout view
    $('.grid-layout-view').on('click', function(e) {
        $('.collection-grid-view').css('opacity', '1');
        $('.product-wrapper-grid').removeClass("list-view");
        $(".product-wrapper-grid").children().children().removeClass();
        $(".product-wrapper-grid").children().children().addClass("col-lg-3");

    });
    $('.product-2-layout-view').on('click', function(e) {
        if($('.product-wrapper-grid').hasClass("list-view")) {}
        else{
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-6");
        }
    });
    $('.product-3-layout-view').on('click', function(e) {
        if($('.product-wrapper-grid').hasClass("list-view")) {}
        else{
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-4");
        }
    });
    $('.product-4-layout-view').on('click', function(e) {
        if($('.product-wrapper-grid').hasClass("list-view")) {}
        else{
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-3");
        }
    });
    $('.product-6-layout-view').on('click', function(e) {
        if($('.product-wrapper-grid').hasClass("list-view")) {}
        else{
            $(".product-wrapper-grid").children().children().removeClass();
            $(".product-wrapper-grid").children().children().addClass("col-lg-2");
        }
    });


    /*=====================
     17.filter sidebar js
     ==========================*/
    $('.sidebar-popup').on('click', function(e) {
        $('.open-popup').toggleClass('open');
        $('.collection-filter').css("left","-15px");
    });
    $('.filter-btn').on('click', function(e) {
        $('.collection-filter').css("left","-15px");
    });
    $('.filter-back').on('click', function(e) {
        $('.collection-filter').css("left","-365px");
        $('.sidebar-popup').trigger('click');
    });

    $('.account-sidebar').on('click', function(e) {
        $('.dashboard-left').css("left","0");
    });
    $('.filter-back').on('click', function(e) {
        $('.dashboard-left').css("left","-365px");
    });

    /*=====================
     18.ADD TO CART
     ==========================*/
     var config = {
        decrementButton: "<strong>-</strong>", // button text
        incrementButton: "<strong>+</strong>", // ..
        groupClass: "", // css class of the resulting input-group
        buttonsClass: "btn-outline-secondary",
        buttonsWidth: "2.5rem",
        textAlign: "center",
        autoDelay: 700, // ms holding before auto value change
        autoInterval: 600, // speed of auto value change
        boostThreshold: 10, // boost after these steps
        boostMultiplier: "auto" // you can also set a constant number as multiplier
    }
    $("input[type='number']").inputSpinner(config);

    $('body').delegate('.cart-button','click', function () {
        var _productSlug = $(this).attr('data-target');
        var _route = laroute.route('addtocart');
        $.ajax({
            url: _route,
            type:'get',
            dataType:'json',
            data:{
                slug:_productSlug
            },
            success:function(){
                var _badgeValue = $("#cartbadge").text();
                if(_badgeValue != '')
                {
                    $("#cartbadge").text(parseInt(_badgeValue, 10) + 1);
                }
                else
                {
                    $("#cartbadge").text('1');
                }
                $.notify({
                    icon: 'fa fa-check',
                    title: 'Succes!',
                    message: 'Produsul a fost adaugat in cos.'
                },{
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });
            }
        });
    });
    /*=====================
     19. Remove From Cart
     ==========================*/
     $('table').delegate('.icon','click', function () {
        var _itemToBeDeleted = $(this).attr('data-target');
        var _route = laroute.route('removefromcart');
        $.ajax({
            url: _route,
            type:'get',
            dataType:'json',
            data:{
                id:_itemToBeDeleted
            },
            success:function(response){
                //remove item from cart page
                $("#carttable tbody").empty();
                var base_url = window.location.origin;
                if($.trim(response))
                {
                    var _html='';
                    var total = 0;
                    var elements = 0;
                    $.each(response,function(index,value){
                        elements++;
                        var product_details_url = laroute.route('productdetails', { slug : ''+value.associatedModel.Slug+'' });
                        var productPrice = (value.associatedModel.DiscountPrice != null) ? value.associatedModel.DiscountPrice : value.price;
                        var subtotal = productPrice*value.quantity;
                        total+= subtotal;
                        //build html elements
                        _html+='<tbody>'
                            _html+= '<tr>'
                                _html+= '<td><a href="'+ product_details_url +'"><img src="'+base_url+'/images/uploads/'+value.associatedModel.images[0].Path+'/'+value.associatedModel.images[0].Filename+'" alt=""></a></td>';
                                _html+= '<td>';
                                    _html+= '<a href="'+ product_details_url +'">'+value.name+'</a>';
                                    _html+= '<div class="mobile-cart-content row"><div class="col-xs-3"><div class="qty-box"><div class="input-group">';
                                    _html+= '<input type="number" min="1" max="10" name="quantity" data-target="'+ value.id +'" value="'+ value.quantity +'">';
                                    _html+= '</div></div></div>'
                                    _html+= '<div class="col-xs-3">';
                                    _html+= '<h2 class="td-color"> '+ productPrice +' Lei</h2></div>';
                                    _html+= '<div class="col-xs-3">';
                                    _html+= '<h2 class="td-color"><a class="icon" id="removeItemFromCartM-'+ value.id +'" data-target="'+ value.id +'"><i class="ti-close"></i></a></div></div>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<h2>'+ productPrice +' Lei</h2>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<div class="qty-box">';
                                    _html+= '<div class="input-group">';
                                    _html+= '<input type="number" min="1" max="10" name="quantity" data-target="'+ value.id +'" value="'+ value.quantity +'">';
                                    _html+= '</div></div>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<a class="icon" id="removeItemFromCart-'+ value.id +'" data-target="'+ value.id +'"><i class="ti-close"></i></as>';
                                _html+= '</td>';
                                _html+= '<td>';
                                _html+= '<h3>'+ subtotal.toFixed(2) +' Lei</h3>';
                                _html+= '</td>';
                             _html+= '</tr>'
                        _html+='</tbody>'
                    });
                    //append html elements
                    $("#carttotal").text(total.toFixed(2) + ' Lei');
                    $("#carttable").append(_html);
                    $("input[type='number']").inputSpinner(config);
                    //set cart badge
                    $("#cartbadge").text(elements);
                }else{
                    var _html='';
                    var _cartItemHtml='';
                    //clear elements
                    $("#totalRow").empty();
                    $(".cart-buttons").empty();
                    //build html elements
                    _html+= '<div class="col-12"><a href="'+base_url+'" class="btn btn-solid">continua cumparaturile</a></div>';
                    _cartItemHtml+= '<tbody><td>Nu exista produse in cos.</td></tbody>';
                    //append html elements
                    $(".cart-buttons").append(_html);
                    $("#carttable").append(_cartItemHtml);
                    $("input[type='number']").inputSpinner(config);
                    //set cart badge
                    $("#cartbadge").text('');
                }
                //show notification
                $.notify({
                    icon: 'fa fa-check',
                    title: 'Succes!',
                    message: 'Produsul a fost sters din cos.'
                },{
                    element: 'body',
                    position: null,
                    type: "success",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });
            }
        });
    });
    /*==============================
     20. Update Cart Item Quantity
    ================================*/
    $('table').delegate("input[name='quantity']","change", function () {
        var newValue = $(this).val();
        var itemId = $(this).attr('data-target');
        var _route = laroute.route('updatecartquantity');
        $.ajax({
            url: _route,
            type:'get',
            dataType:'json',
            data:{
                id:itemId,
                quantity:newValue
            },
            success:function(response){
                console.log(response);
                //update item from cart page
                $("#carttable tbody").empty();
                var base_url = window.location.origin;
                if($.trim(response))
                {
                    var _html='';
                    var total = 0;
                    $.each(response,function(index,value){
                        var product_details_url = laroute.route('productdetails', { slug : ''+value.associatedModel.Slug+'' });
                        var productPrice = (value.associatedModel.DiscountPrice != null) ? value.associatedModel.DiscountPrice : value.price;
                        var subtotal = productPrice*value.quantity;
                        total+= subtotal;
                        //build html elements
                        _html+='<tbody>'
                            _html+= '<tr>'
                                _html+= '<td><a href="'+ product_details_url +'"><img src="'+base_url+'/images/uploads/'+value.associatedModel.images[0].Path+'/'+value.associatedModel.images[0].Filename+'" alt=""></a></td>';
                                _html+= '<td>';
                                    _html+= '<a href="'+ product_details_url +'">'+value.name+'</a>';
                                    _html+= '<div class="mobile-cart-content row"><div class="col-xs-3"><div class="qty-box"><div class="input-group">';
                                    _html+= '<input type="number" min="1" max="10" name="quantity" data-target="'+ value.id +'" value="'+ value.quantity +'">';
                                    _html+= '</div></div></div>'
                                    _html+= '<div class="col-xs-3">';
                                    _html+= '<h2 class="td-color"> '+ productPrice +' Lei</h2></div>';
                                    _html+= '<div class="col-xs-3">';
                                    _html+= '<h2 class="td-color"><a class="icon" id="removeItemFromCartM-'+ value.id +'" data-target="'+ value.id +'"><i class="ti-close"></i></a></div></div>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<h2>'+ productPrice +' Lei</h2>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<div class="qty-box">';
                                    _html+= '<div class="input-group">';
                                    _html+= '<input type="number" min="1" max="10" name="quantity" data-target="'+ value.id +'" value="'+ value.quantity +'">';
                                    _html+= '</div></div>';
                                _html+= '</td>';
                                _html+= '<td>';
                                    _html+= '<a class="icon" id="removeItemFromCart-'+ value.id +'" data-target="'+ value.id +'"><i class="ti-close"></i></as>';
                                _html+= '</td>';
                                _html+= '<td>';
                                _html+= '<h3>'+ subtotal.toFixed(2) +' Lei</h3>';
                                _html+= '</td>';
                             _html+= '</tr>'
                        _html+='</tbody>'
                    });
                    //append html elements
                    $("#carttotal").text(total.toFixed(2) + ' Lei');
                    $("#carttable").append(_html);
                    $("input[type='number']").inputSpinner(config);
                }
            }
        });
    })

    /*=====================
     19.Add to wishlist
     ==========================*/
    $('.product-box a .ti-heart , .product-box a .fa-heart').on('click', function () {

        $.notify({
            icon: 'fa fa-check',
            title: 'Success!',
            message: 'Item Successfully added in wishlist'
        },{
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
    });


    /*=====================
     20. Color Picker
     ==========================*/
    var body_event = $("body");
    body_event.on("click", ".color1", function() {
        $("#color" ).attr("href", "../assets/css/color1.css" );
        return false;

    });
    body_event.on("click", ".color2", function() {
        $("#color" ).attr("href", "../assets/css/color2.css" );
        return false;
    });
    body_event.on("click", ".color3", function() {
        $("#color" ).attr("href", "../assets/css/color3.css" );
        return false;
    });
    body_event.on("click", ".color4", function() {
        $("#color" ).attr("href", "../assets/css/color4.css" );
        return false;
    });
    body_event.on("click", ".color5", function() {
        $("#color" ).attr("href", "../assets/css/color1.css" );
        return false;
    });
    body_event.on("click", ".color6", function() {
        $("#color" ).attr("href", "../assets/css/color6.css" );
        return false;
    });
    body_event.on("click", ".color7", function() {
        $("#color" ).attr("href", "../assets/css/color7.css" );
        $("#color-admin" ).attr("href", "../assets/css/color7.css" );
        return false;
    });
    body_event.on("click", ".color8", function() {
        $("#color" ).attr("href", "../assets/css/color8.css" );
        return false;
    });
    body_event.on("click", ".color9", function() {
        $("#color" ).attr("href", "../assets/css/color9.css" );
        return false;
    });
    body_event.on("click", ".color10", function() {
        $("#color" ).attr("href", "../assets/css/color10.css" );
        return false;
    });
    body_event.on("click", ".color11", function() {
        $("#color" ).attr("href", "../assets/css/color11.css" );
        return false;
    });
    body_event.on("click", ".color12", function() {
        $("#color" ).attr("href", "../assets/css/color12.css" );
        return false;
    });
    body_event.on("click", ".color13", function() {
        $("#color" ).attr("href", "../assets/css/color13.css" );
        return false;
    });
    body_event.on("click", ".color14", function() {
        $("#color" ).attr("href", "../assets/css/color14.css" );
        return false;
    });
    body_event.on("click", ".color15", function() {
        $("#color" ).attr("href", "../assets/css/color15.css" );
        return false;
    });
    body_event.on("click", ".color16", function() {
        $("#color" ).attr("href", "../assets/css/color16.css" );
        return false;
    });
    body_event.on("click", ".color17", function() {
        $("#color" ).attr("href", "../assets/css/color17.css" );
        return false;
    });
    body_event.on("click", ".color18", function() {
        $("#color" ).attr("href", "../assets/css/color18.css" );
        return false;
    });


})(jQuery);

/*=====================
 22. Menu js
 ==========================*/
function openNav() {
    document.getElementById("mySidenav").classList.add('open-side');
}
function closeNav() {
    document.getElementById("mySidenav").classList.remove('open-side');
}
$(function() {
    $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
    $('#sub-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});


/*=====================
 23. theme-setting
 ==========================*/
function openSetting() {
    document.getElementById("setting_box").classList.add('open-setting');
    document.getElementById("setting-icon").classList.add('open-icon');
}
function closeSetting() {
    document.getElementById("setting_box").classList.remove('open-setting');
    document.getElementById("setting-icon").classList.remove('open-icon');
}
jQuery('.setting-title h4').append('<span class="according-menu"></span>');
jQuery('.setting-title').on('click', function () {
    jQuery('.setting-title').removeClass('active');
    jQuery('.setting-contant').slideUp('normal');
    if (jQuery(this).next().is(':hidden') == true) {
        jQuery(this).addClass('active');
        jQuery(this).next().slideDown('normal');
    }
});
jQuery('.setting-contant').hide();


/*=====================
 24. add to cart sidebar js
 ==========================*/
function openCart() {
    document.getElementById("cart_side").classList.add('open-side');
}
function closeCart() {
    document.getElementById("cart_side").classList.remove('open-side');
}


/*=====================
 25.Tooltip
 ==========================*/
$(window).on('load', function() {
    $('[data-toggle="tooltip"]').tooltip()
});



/*=====================
 26. Category page
 ==========================*/
//LOAD MORE BUTTON ACTION
$(document).ready(function(){
    $(".load-More").on('click',function(){
        var _sortValue=$("#products-sort option:selected").val();
        var _totalCurrentResult=$("div #product-item").length;
        var _totalShownSet=$("#products-shown option:selected").val();
        var _categorySlug=$(".load-More").attr('data-category');
        // Ajax Reuqest
        $.ajax({
            url: laroute.route('fetchproducts'),
            type:'get',
            dataType:'json',
            data:{
                skip:_totalCurrentResult,
                take:_totalShownSet,
                slug:_categorySlug,
                sort:_sortValue
            },
            beforeSend:function(){
                $(".load-More").html('Se incarca...');
            },
            success:function(response){
                var _html='';
                var base_url = window.location.origin;
                $.each(response,function(index,value){
                    var product_details_url = laroute.route('productdetails', { slug : ''+value.slug+'' });
                    _html+='<div class="col-xl-3 col-md-6 col-grid-box" id="product-item">';
                        _html+='<div class="product-box">';
                            _html+='<div class="img-wrapper">';
                            if (value.discountPrice != null) {
                                _html+= ' <div class="lable-block"><span class="lable4">discount</span></div>'
                            }
                                _html+='<div class="front">';
                                _html+='<a href="'+ product_details_url +'"><img src="'+base_url+'/images/uploads/'+value.images[0].path+'/'+value.images[0].filename+'" class="img-fluid blur-up lazyload bg-img" alt=""></a></div>';
                        _html+='<div class="cart-info cart-wrap">';
                        _html+='<button class="cart-button" data-target="'+ value.slug +'" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Adauga in Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="'+ product_details_url +'" title="Vizualizare"><i class="ti-search" aria-hidden="true"></i></a></div></div>';
                        _html+='<div class="product-detail"><div>';
                        _html+='<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>';
                        _html+='<a href="'+ product_details_url +'"><h6>'+value.name+'</h6></a>';
                        if (value.discountPrice != null) {
                            _html+= '<h4>'+value.discountPrice+' Lei <del>'+value.price+' Lei</del></h4>'
                        }
                        else
                        {
                            _html+='<h4>'+value.price+' Lei</h4>';
                        }
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                });
                $("#product-list-collection").append(_html);
                // Change Load More When No Further result
                var _totalCurrentResult=$("div #product-item").length;
                var _totalResult=parseInt($(".load-More").attr('data-totalResult'));
                if(_totalCurrentResult==_totalResult){
                    $(".load-More").hide();
                }else{
                    $(".load-More").html('Incarca mai multe');
                    $(".load-More").show();
                }
            }
        });
    });
    //SORTING ACTIONS
    $( "#products-sort" ).change(function() {
        var _sortValue=$("#products-sort option:selected").val();
        var _totalShownSet=$("#products-shown option:selected").val();
        var _categorySlug=$(".load-More").attr('data-category');
        var _totalCurrentResult = 0;
        $.ajax({
            url: laroute.route('fetchproducts'),
            type:'get',
            dataType:'json',
            data:{
                skip:_totalCurrentResult,
                take:_totalShownSet,
                slug:_categorySlug,
                sort:_sortValue
            },
            beforeSend:function(){
                $('#loader').show();
            },
            success:function(response){
                $("#product-list-collection").empty();
                var _html='';
                var base_url = window.location.origin;
                $.each(response,function(index,value){
                    var product_details_url = laroute.route('productdetails', { slug : ''+value.slug+'' });
                    _html+='<div class="col-xl-3 col-md-6 col-grid-box" id="product-item">';
                        _html+='<div class="product-box">';
                            _html+='<div class="img-wrapper">';
                            if (value.discountPrice != null) {
                                _html+= ' <div class="lable-block"><span class="lable4">discount</span></div>'
                            }
                                _html+='<div class="front">';
                                _html+='<a href="'+ product_details_url +'"><img src="'+base_url+'/images/uploads/'+value.images[0].path+'/'+value.images[0].filename+'" class="img-fluid blur-up lazyload bg-img" alt=""></a></div>';
                        _html+='<div class="cart-info cart-wrap">';
                        _html+='<button class="cart-button" data-target="'+ value.slug +'" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Adauga in Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="'+ product_details_url +'" title="Vizualizare"><i class="ti-search" aria-hidden="true"></i></a></div></div>';
                        _html+='<div class="product-detail"><div>';
                        _html+='<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>';
                        _html+='<a href="'+ product_details_url +'"><h6>'+value.name+'</h6></a>';
                        if (value.discountPrice != null) {
                            _html+= '<h4>'+value.discountPrice+' Lei <del>'+value.price+' Lei</del></h4>'
                        }
                        else
                        {
                            _html+='<h4>'+value.price+' Lei</h4>';
                        }
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                });
                $('#loader').hide();
                $("#product-list-collection").append(_html);
                // Change Load More When No Further result
                var _totalCurrentResult=$("div #product-item").length;
                var _totalResult=parseInt($(".load-More").attr('data-totalResult'));
                if(_totalCurrentResult==_totalResult){
                    $(".load-More").hide();
                }else{
                    $(".load-More").html('Incarca mai multe');
                    $(".load-More").show();
                }
            }
        });
    });
    //PRODUCT NUMBER SHOWN ACTION
    $( "#products-shown" ).change(function() {
        var _sortValue=$("#products-sort option:selected").val();
        var _totalShownSet=$("#products-shown option:selected").val();
        var _categorySlug=$(".load-More").attr('data-category');
        var _totalCurrentResult = 0;
        $.ajax({
            url: laroute.route('fetchproducts'),
            type:'get',
            dataType:'json',
            data:{
                skip:_totalCurrentResult,
                take:_totalShownSet,
                slug:_categorySlug,
                sort:_sortValue
            },
            beforeSend:function(){
                $('#loader').show();
            },
            success:function(response){
                $("#product-list-collection").empty();
                var _html='';
                var base_url = window.location.origin;
                $.each(response,function(index,value){
                    var product_details_url = laroute.route('productdetails', { slug : ''+value.slug+'' });
                    _html+='<div class="col-xl-3 col-md-6 col-grid-box" id="product-item">';
                        _html+='<div class="product-box">';
                            _html+='<div class="img-wrapper">';
                            if (value.discountPrice != null) {
                                _html+= ' <div class="lable-block"><span class="lable4">discount</span></div>'
                            }
                                _html+='<div class="front">';
                                _html+='<a href="'+ product_details_url +'"><img src="'+base_url+'/images/uploads/'+value.images[0].path+'/'+value.images[0].filename+'" class="img-fluid blur-up lazyload bg-img" alt=""></a></div>';
                        _html+='<div class="cart-info cart-wrap">';
                        _html+='<button class="cart-button" data-target="'+ value.slug +'" title="Add to cart"><i class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Adauga in Wishlist"><i class="ti-heart" aria-hidden="true"></i></a> <a href="'+ product_details_url +'" title="Vizualizare"><i class="ti-search" aria-hidden="true"></i></a></div></div>';
                        _html+='<div class="product-detail"><div>';
                        _html+='<div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>';
                        _html+='<a href="'+ product_details_url +'"><h6>'+value.name+'</h6></a>';
                        if (value.discountPrice != null) {
                            _html+= '<h4>'+value.discountPrice+' Lei <del>'+value.price+' Lei</del></h4>'
                        }
                        else
                        {
                            _html+='<h4>'+value.price+' Lei</h4>';
                        }
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                        _html+='</div>';
                });
                $('#loader').hide();
                $("#product-list-collection").append(_html);
                // Change Load More When No Further result
                var _totalCurrentResult=$("div #product-item").length;
                var _totalResult=parseInt($(".load-More").attr('data-totalResult'));
                if(_totalCurrentResult==_totalResult){
                    $(".load-More").hide();
                }else{
                    $(".load-More").html('Incarca mai multe');
                    $(".load-More").show();
                }
            }
        });
    });
});
