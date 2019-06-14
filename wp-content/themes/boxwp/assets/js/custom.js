jQuery(document).ready(function($) {

    $(".boxwp-nav-secondary .boxwp-secondary-nav-menu").addClass("boxwp-secondary-responsive-menu").before('<div class="boxwp-secondary-responsive-menu-icon"></div>');

    $(".boxwp-secondary-responsive-menu-icon").click(function(){
        $(this).next(".boxwp-nav-secondary .boxwp-secondary-nav-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".boxwp-nav-secondary .boxwp-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".boxwp-secondary-responsive-menu > li").removeClass("boxwp-secondary-menu-open");
        }
    });

    $(".boxwp-secondary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-secondary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-secondary-menu-open");
        });
    });

    $("div.boxwp-secondary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-secondary-menu-open");
        });
    });

    if(boxwp_ajax_object.sticky_menu){
    // grab the initial top offset of the navigation 
    var boxwpstickyNavTop = $('.boxwp-primary-menu-container').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var boxwpstickyNav = function(){
        var boxwpscrollTop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(boxwp_ajax_object.sticky_menu_mobile){
            if (boxwpscrollTop > boxwpstickyNavTop) {
                $('.boxwp-primary-menu-container').addClass('boxwp-fixed');
            } else {
                $('.boxwp-primary-menu-container').removeClass('boxwp-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (boxwpscrollTop > boxwpstickyNavTop) {
                    $('.boxwp-primary-menu-container').addClass('boxwp-fixed');
                } else {
                    $('.boxwp-primary-menu-container').removeClass('boxwp-fixed'); 
                }
            }
        }
    };

    boxwpstickyNav();
    // and run it again every time you scroll
    $(window).scroll(function() {
        boxwpstickyNav();
    });
    }

    $(".boxwp-nav-primary .boxwp-nav-primary-menu").addClass("boxwp-primary-responsive-menu").before('<div class="boxwp-primary-responsive-menu-icon"></div>');

    $(".boxwp-primary-responsive-menu-icon").click(function(){
        $(this).next(".boxwp-nav-primary .boxwp-nav-primary-menu").slideToggle();
    });

    $(window).resize(function(){
        if(window.innerWidth > 1112) {
            $(".boxwp-nav-primary .boxwp-nav-primary-menu, nav .sub-menu, nav .children").removeAttr("style");
            $(".boxwp-primary-responsive-menu > li").removeClass("boxwp-primary-menu-open");
        }
    });

    $(".boxwp-primary-responsive-menu > li").click(function(event){
        if (event.target !== this)
        return;
        $(this).find(".sub-menu:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-primary-menu-open");
        });
        $(this).find(".children:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-primary-menu-open");
        });
    });

    $("div.boxwp-primary-responsive-menu > ul > li").click(function(event) {
        if (event.target !== this)
            return;
        $(this).find("ul:first").slideToggle(function() {
            $(this).parent().toggleClass("boxwp-primary-menu-open");
        });
    });

    /*$(".boxwp-social-search-icon").on('click', function (e) {
        e.preventDefault();
        $('.boxwp-social-search-box').slideToggle(400);
    });*/

    $(".boxwp-social-icon-search").on('click', function (e) {
        e.preventDefault();
        document.getElementById("boxwp-search-overlay-wrap").style.display = "block";
    });

    $(".boxwp-search-closebtn").on('click', function (e) {
        e.preventDefault();
        document.getElementById("boxwp-search-overlay-wrap").style.display = "none";
    });

    $(".post").fitVids();

    $( 'body' ).prepend( '<div class="boxwp-scroll-top"></div>');
    var scrollButtonEl = $( '.boxwp-scroll-top' );
    scrollButtonEl.hide();

    $( window ).scroll( function () {
        if ( $( window ).scrollTop() < 20 ) {
            $( '.boxwp-scroll-top' ).fadeOut();
        } else {
            $( '.boxwp-scroll-top' ).fadeIn();
        }
    } );

    scrollButtonEl.click( function () {
        $( "html, body" ).animate( { scrollTop: 0 }, 300 );
        return false;
    } );

    if(boxwp_ajax_object.sticky_sidebar){
    $('.boxwp-main-wrapper, .boxwp-sidebar-wrapper').theiaStickySidebar({
        containerSelector: ".boxwp-content-wrapper",
        additionalMarginTop: 0,
        additionalMarginBottom: 0,
        minWidth: 785,
    });
    }

});