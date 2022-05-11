jQuery(document).ready(function ($) {
    'use-strict';

    var stickyHeader, stickyNavTop, mobileTrigger, mobileNavContainer, mobileNav, fsLoopItem, ajaxAddToCart,
        testimonialsContainer, ajaxEnabled;
    ajaxEnabled = fashionable_store_vars.isAjaxEnabled;


    var animationEnd = (function (el) {
        var animations = {
            "animation": "animationend",
            "OAnimation": "oAnimationEnd",
            "MozAnimation": "mozAnimationEnd",
            "WebkitAnimation": "webkitAnimationEnd"
        }

        for (var t in animations) {
            if (el.style[t] !== undefined) {
                return animations[t]
            }
        }
    })(document.createElement("fakeelement"));

    fsLoopItem = $('.fs-loop-item');


    if (ajaxEnabled === 'yes') {
        if ($(window).width() >= 1024) {

            $(fsLoopItem).on('mouseenter', function () {
                var price = $(this).find('span.price');
                var addToCart = $(this).find('.button');
                //price.removeClass('animated FadeInLeft');
                price.addClass('animated fadeOutDown').one(animationEnd, function () {
                    price.css('display', 'none');
                    price.removeClass('animated fadeOutDown');
                    addToCart.addClass('animated fadeInUp').css('display', 'inline-block');
                    addToCart.removeClass('animated fadeInUp');
                });
            });
            $(fsLoopItem).on('mouseleave', function () {
                var price = $(this).find('span.price');
                var addToCart = $(this).find('.button');
                //price.removeClass('animated FadeInLeft');
                addToCart.addClass('animated fadeOutDown').one(animationEnd, function () {
                    addToCart.css('display', 'none');
                    addToCart.removeClass('animated fadeOutDown');
                    price.addClass('animated fadeInUp').css('display', 'inline-block');
                    price.removeClass('animated fadeInUp');
                });
            });

        }
    } else {
        fsLoopItem.each(function () {
            var addToCart = $(this).find('a.button');
            addToCart.css('display', 'block');
        });
    }
    mobileNavContainer = $('.mobile-nav-container');
    mobileTrigger = $('.mob-trigger');
    var header = $('#header');
    stickyNavTop = header.offset().top;

    var stickyNav = function () {
        var scrollTop = $(window).scrollTop(); // our current vertical position from the top
        if (scrollTop > stickyNavTop) {
            header.addClass('justwp-sticky box-shadow-bottom');
            if (header.hasClass('transparent-header')) {
                header.removeClass('transparent-header');
                header.addClass('no-transparent-header');
            }
        } else {
            header.removeClass('justwp-sticky box-shadow-bottom');
            if (header.hasClass('no-transparent-header')) {
                header.removeClass('no-transparent-header');
                header.addClass('transparent-header');
            }
        }
    };

    mobileTrigger.sidr({
        name: 'sidr-mobile',
        source: '#main-navigation',
        displace: false

    });
    var html = '<a href="#" class="close-mobile-menu"><span class="fa fa-times"></span></a>';
    $('.sidr-inner').prepend(html);

    $('.close-mobile-menu').on('click',function(){
       // Closes the mobile menu
       $.sidr('close','sidr-mobile');
    });
    /*
    * Impose some same height
    */
    $('.sameHeightDiv').matchHeight();

    $(window).scroll(function () {
        if (header.hasClass('sticky-header')) {
            stickyNav();
        }
    });
    /* Overlay =*/
    $('#close-btn').click(function () {
        $('#search-overlay').fadeOut();
        $('.search-btn').show();
    });
    $('.search-btn').click(function () {
        $(this).hide();
        $('#search-overlay').fadeIn();
        return false;
    });


    /*= Overlay for cart =*/
    $('a#open-minicart').on('click', function () {
        if (ajaxEnabled !== 'yes') {
            window.location = fashionable_store_vars.cartPage;
            return false;
        } else {
            $('#cart-overlay').css("display", "flex").addClass('center-flex')
                .hide()
                .fadeIn();
            return false;
        }
    });

    $('a#cart-close-button').click(function () {
        $('#cart-overlay').fadeOut();
        return false;
    });

    /*= Slider at the front page =*/
    var sliderWrapper = $('.fs-slider-wrapper');
    sliderWrapper.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true
    });

    /*
     Izitoast -> Add To Cart
     */
    ajaxAddToCart = $('.ajax_add_to_cart');
    ajaxAddToCart.on('click', function () {

        if (ajaxEnabled !== 'yes') {
            return;
        }

        var productID = $(this).attr('data-product_id');
        jQuery.ajax({
            type: 'POST',
            url: fashionable_store_vars.ajax_url,
            data: {
                'action': 'fashionable_store_create_izi',
                'productID': productID
            },
            dataType: 'json',
            success: function (data) {
                iziToast.show({
                    title: data.productTitle,
                    message: fashionable_store_vars.added_to_cart_msg,
                    imageWidth: 100,
                    image: data.thumbSrc,
                    backgroundColor: '#FF5911',
                    titleColor: '#ffffff',
                    messageColor: '#ffffff',
                    messageLineHeight: '40px',
                    position: 'topRight',
                    layout: 2,
                    timeout: 3500,
                });
            },
            error: function (request, status, error) {
                console.log(request.statusText);
            }
        });
    });

    /*
    If ajax is not enabled and also not the redirects to cart are set up
    there should be a notification when you add something to the cart.
    */

    testimonialsContainer = $('.fs-testimonials-container');
    testimonialsContainer.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1,
                    dots: true
                }
            },

        ]
    });


});

