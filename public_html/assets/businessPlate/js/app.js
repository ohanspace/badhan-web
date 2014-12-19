var App = function () {


    function handleBootstrap() {
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });
        jQuery('.tooltips').tooltip();
        jQuery('.popovers').popover();
    }


    function dropdownMobile() {
        $('.dropdown-toggle').click(function(e) {
            //window.scrollTo(0,0);
            e.preventDefault();
            setTimeout($.proxy(function() {
                if ('ontouchstart' in document.documentElement) {
                    $(this).siblings('.dropdown-backdrop').off().remove();
                }
            }, this), 0);
        });
    }

    function stickyMenu () {
        // make main menu sticky
        if ( ! /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $(".header").sticky({topSpacing: 0});
        } else {}
    }

    function myAccordion () {
        // Accordion settings
        $('.accordion').on('show', function (e) {
            $(e.target).prev('.accordion-heading').find('i').removeClass('icon-plus');
            $(e.target).prev('.accordion-heading').find('i').addClass('icon-minus');
            $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        });
        $('.accordion').on('hide', function (e) {
            $(e.target).prev('.accordion-heading').find('i').removeClass('icon-minus');
            $(e.target).prev('.accordion-heading').find('i').addClass('icon-plus');
            $(e.target).prev('.accordion-heading').find('.active').removeClass('active');
        });
    }

    return {
        init: function () {
            handleBootstrap();                                            
            dropdownMobile();
            stickyMenu();
            myAccordion();
        },   

        initFancybox: function () {
            jQuery(".fancybox-button").fancybox({
            groupAttr: 'data-rel',
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: true,
            helpers: {
                title: {
                    type: 'inside'
                    }
                }
            });
        },

        initBxSlider: function () {
            $('.bxslider').bxSlider({
                minSlides: 3,
                maxSlides: 3,
                slideWidth: 360,
                slideMargin: 10
            });            
        },

        initBxSlider1: function () {
            $('.bxslider').bxSlider({
                minSlides: 4,
                maxSlides: 4,
                slideWidth: 360,
                slideMargin: 10
            });            
        }

    };
}();
