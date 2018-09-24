"use strict";

var isMobile = false;
var isiPhoneiPad = false;

if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    isMobile = true;
}

if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
    isiPhoneiPad = true;
}

/* For remove conflict */
( function( $ ) {

    $(window).load(function () {
        /* ===================================
         set full screen height
         ====================================== */

        SetResizeContent();

        SetMegamenuPosition();

        /* ===================================
         START Page Load
         ====================================== */
        var hash = window.location.hash.substr(1);
        if (hash != "") {
            setTimeout(function () {
                $(window).imagesLoaded(function () {
                    var scrollAnimationTime = 1200,
                            scrollAnimation = 'easeInOutExpo';
                    var target = '#' + hash;
                    if ($(target).length > 0) {

                        $('html, body').stop()
                                .animate({
                                    'scrollTop': $(target).offset().top
                                }, scrollAnimationTime, scrollAnimation, function () {
                                    window.location.hash = target;
                                });
                    }
                });
            }, 500);
        }
        /* ===================================
         END Page Load
         ====================================== */
    });

    function SetMegamenuPosition() {
        
        $("ul.navbar-nav li.megamenu-fw").each(function () {
            var offset = $(this).offset();
            var totalHeight = offset.top + $(this).outerHeight(true);
            $(this).find('ul.mega-menu').css({top: totalHeight});
        });
    }

    function pad(d) {
        return (d < 10) ? '0' + d.toString() : d.toString();
    }

    function isIE() {

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
        {
            return true;
        }
        else  // If another browser, return 0
        {
            return false;
        }

        return false;
    }

    function setMobileHeight(){
        if( isMobile ) {
            if( $('.vc_row-o-full-height').length > 0 ) {
                setTimeout(function () {
                    var windowHeight = $(window).height();
                    $('.vc_row-o-full-height').css('min-height', windowHeight);
                }, 500);
            }
        }
    }

    //page title space
    function setPageTitleSpace() {
        if( $('.navbar').hasClass('navbar-top') || $('nav').hasClass('navbar-fixed-top') || $('nav').hasClass('navbar-non-sticky-top') || $('nav').hasClass('full-width-pull-menu') ) {
            if ($('.top-space').length > 0) {
                var top_space_height = $('.navbar').outerHeight();
                if( $('.top-header-area').length > 0 ) {
                    top_space_height = top_space_height + $('.top-header-area').outerHeight();
                }
                $('.top-space').css('margin-top', top_space_height + "px");
            }
        }        
        if( $('.sidebar-nav-style-1 .sidenav-header').length > 0 ) {
            if( $('.sidebar-nav-style-1').hasClass('mobile-left-menu') ) {
                if ($('.top-space').length > 0) {
                    var top_space_height = $('.mobile-left-menu .sidenav-header').outerHeight();
                    if( $('.top-header-area').length > 0 ) {
                        top_space_height = top_space_height + $('.top-header-area').outerHeight();
                    }
                    $('.top-space').css('margin-top', top_space_height + "px");
                }
            } else {
                var top_space_height = 0;
                top_space_height = top_space_height + $('.top-header-area').outerHeight();
                $('.top-space').css('margin-top', top_space_height + "px");
            }
        }
        if( $('.left-nav').length > 0 ) {
            if( $('.left-nav').hasClass('mobile-left-menu') ) {
                if ($('.top-space').length > 0) {
                    var top_space_height = $('.mobile-left-menu').outerHeight();
                    if( $('.top-header-area').length > 0 ) {
                        top_space_height = top_space_height + $('.top-header-area').outerHeight();
                    }
                    $('.top-space').css('margin-top', top_space_height + "px");
                }
            } else {
                var top_space_height = 0;
                top_space_height = top_space_height + $('.top-header-area').outerHeight();
                $('.top-space').css('margin-top', top_space_height + "px");
            }
        }
    }

    $(document).ready(function () {
        
        // Stop click event for input field into bootstrap menu
        $( '.bootsnav input' ).bind( 'click', function (e) {e.stopPropagation() });

        /* For Stretch Effect */
        $( 'body' ).addClass('pofo-ready');

        if( $( '.pofo-featurebox' ).length > 0 ) {
            if( $( '.pofo-featurebox' ).parents( '.vc_row' ).hasClass( 'vc_inner' ) ) {
                $( '.pofo-featurebox' ).parents( '.vc_inner' ).addClass( 'pofo-featurebox-equal-height' );
            } else {
                $( '.pofo-featurebox' ).parents( '.vc_row' ).addClass( 'pofo-featurebox-equal-height' );
            }
        }

        SetResizeContent();

        stellarParallax();

        feature_dynamic_font_line_height();

        setButtonPosition();

        init_scroll_navigate();

        CenterLogoHeight();

        /* Add Clear both class in VC front editor column */
        
        $( '.wpb_column' ).each(function () {
            var CurrentColumn = $(this);
            var DataClearBoth = $(this).attr( 'data-clear-both' );
            if( DataClearBoth && $( 'body').hasClass( 'vc_editor' ) ){
                CurrentColumn.parent().addClass( DataClearBoth );
                CurrentColumn.removeClass( DataClearBoth );
            }
            CurrentColumn.removeAttr( 'data-clear-both' );
        });
        

        // If page has no section
        if( $("body.page > .type-page").find(".entry-content section.vc_row").length == 0 ){
            $("body.page > .type-page").addClass("default-page-space");
        }else{
            $("body.page > .type-page").removeClass("default-page-space");
        }

        //blog page header animation
        $(".blog-header-style1 li").on('mouseover', function () {
            $('.blog-header-style1 li.blog-column-active').removeClass('blog-column-active');
            $(this).addClass('blog-column-active');
        }).on('mouseleave', function () {
            $(this).removeClass('blog-column-active');
            $('.blog-header-style1 li:first-child').addClass('blog-column-active');
        });

        // Bootsnav menu work with eualize height
        $("nav.navbar.bootsnav ul.nav").each(function () {
            $("li.dropdown", this).on("mouseenter", function () {
                equalizeHeight();
                return false;
            });
        });

        // Bootsnav tab work with eualize height
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            equalizeHeight();
            return false;
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 150)
                $('.scroll-top-arrow').fadeIn('slow');
            else
                $('.scroll-top-arrow').fadeOut('slow');
        });

        //Click event to scroll to top
        $('.scroll-top-arrow').on('click', function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // Add sidebar class to widgetized sidebar vc
        var sidebar_widget = $(".wpb_column").find("div");
        if( sidebar_widget.hasClass("wpb_widgetised_column") ){
            $(".wpb_widgetised_column").addClass("sidebar");
        }

        /* ===================================
         swiper slider
         ====================================== */
        
        var swiperThreeSlides = new Swiper('.swiper-three-slides', {
            pagination: '.swiper-pagination-three-slides',
            paginationClickable: true,
            slidesPerView: 3,
            keyboardControl: true,
            mousewheelControl: false,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                480: {
                    slidesPerView: 1
                },
                650: {
                    slidesPerView: 2
                },
                850: {
                    slidesPerView: 3
                }
            }
        });

        var swiperFourSlides = new Swiper('.swiper-four-slides', {
            pagination: '.swiper-pagination-four-slides',
            slidesPerView: 4,
            paginationClickable: true,
            keyboardControl: true,
            mousewheelControl: false,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                767: {
                    slidesPerView: 1
                },
                991: {
                    slidesPerView: 2
                },
                1199: {
                    slidesPerView: 3
                }
            }
        });

        var swiperFull = new Swiper('.swiper-full-screen', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            loop: true,
            autoplay: 5000,
            slidesPerView: 1,
            keyboardControl: true,
            preventClicks: false,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });

        var swiperAutoFade = new Swiper('.swiper-auto-fade', {
            pagination: '.swiper-pagination',
            loop: true,
            autoplay: 5000,
            slidesPerView: 1,
            paginationClickable: true,
            keyboardControl: true,
            effect: 'fade',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev'
        });

        /*==============================================================
         smooth scroll
         ==============================================================*/

        var scrollAnimationTime = 1200, scrollAnimation = 'easeInOutExpo';
        $(document).on('click.smoothscroll', 'a.scrollto', function (event) {
            event.preventDefault();
            var target = this.hash;
            if ($(target).length != 0) {
                $('html, body').stop()
                        .animate({
                            'scrollTop': $(target)
                                    .offset()
                                    .top
                        }, scrollAnimationTime, scrollAnimation, function () {
                            window.location.hash = target;
                        });
            }
        });

        // Inner links
        if ($('.navbar-top').length > 0 || $('.navbar-scroll-top').length > 0 || $('.nav-top-scroll').length > 0) {
            $('.inner-link').smoothScroll({
                speed: 900,
                offset: 0,
                beforeScroll: function() { $( '#close-button' ).trigger( 'click' ); }
            });
        } else {
            $('.inner-link').smoothScroll({
                speed: 900,
                offset: -59,
                beforeScroll: function() { $( '#close-button' ).trigger( 'click' ); }
            });
        }


        // Down section links
        if ($('.navbar-fixed-top').length > 0) {
            $('.down-section-link').smoothScroll({
                speed: 900,
                offset: -59
            });
        } else {
            $('.down-section-link').smoothScroll({
                speed: 900,
                offset: 0
            });
        }

        $('.section-link').smoothScroll({
            speed: 900,
            offset: 1
        });

        /*==============================================================
         portfolio filter
         ==============================================================*/
         
        var hidedefault = true;

        var $portfolio_filter = $('.portfolio-grid');
        $portfolio_filter.imagesLoaded(function () {
            $portfolio_filter.isotope({
                layoutMode: 'masonry',
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
            $portfolio_filter.isotope();
        });

        var arr_uniqueid = [];
        var arr_dataid = [];
        $('.portfolio-grid, .justified-gallery').each(function() {
            arr_uniqueid.push($(this).attr('data-uniqueid'));
        });

        var $grid_selectors = $('.portfolio-filter > li > a');

        $('.portfolio-filter > li.active > a').each(function( index ) {
            var selector = $(this).attr('data-filter');
            if( selector != '*'){
                hidedefault = false;
                if( $.inArray( $(this).attr( 'data-id' ), arr_dataid ) == -1 ){
                    arr_dataid.push($(this).attr( 'data-id' ));
                }
                $(this).parent().parent().attr( 'data-infinite', 'false' );
            }else{
                hidedefault = true;
                var idx = arr_dataid.indexOf($(this).attr( 'data-id' ));
                if( idx >= 0 ){
                    arr_dataid.splice(idx, 1);
                }
                $(this).parent().parent().attr( 'data-infinite', 'true' );
            }
            default_selector(hidedefault);
        });

        function default_selector(hidedefault){
            if( !hidedefault ) {
                $portfolio_filter.imagesLoaded(function () {
                    $('.portfolio-filter').each(function() {
                        if( $('#'+ $(this).attr( 'data-id' )+' > li.active > a').attr( 'data-id' ) != '' ){
                            var portfolio_filter = $('.'+$(this).find('li.nav.active a').attr( 'data-id' ));
                            var data_id = $('#'+ $(this).find('li.nav.active a').attr( 'data-id' )).find('li.nav.active a').attr('data-filter');
                            var portfolio_selector = data_id;
                            portfolio_filter.isotope({
                                layoutMode: 'masonry',
                                itemSelector: '.grid-item',
                                percentPosition: true,
                                masonry: {
                                    columnWidth: '.grid-sizer'
                                },
                                filter: portfolio_selector
                            }); 
                        }
                    });
                });
            }
        }

        $grid_selectors.on('click', function () {        
            var selector = $(this).attr('data-filter');

            if( selector != '*'){
                if( $.inArray( $(this).attr( 'data-id' ), arr_dataid ) == -1 ){
                    arr_dataid.push($(this).attr( 'data-id' ));
                }
                $(this).parent().parent().attr( 'data-infinite', 'false' );
                $( '.'+$(this).attr( 'data-id' ) ).infinitescroll('unbind');
            }else{
                var idx = arr_dataid.indexOf($(this).attr( 'data-id' ));
                if( idx >= 0 ){
                    arr_dataid.splice(idx, 1);
                }
                $(this).parent().parent().attr( 'data-infinite', 'true' );
                $(window).bind(".infscr");
                $( '.'+$(this).attr( 'data-id' ) ).infinitescroll('bind');
            }
            $portfolio_filter.find('.grid-item').removeClass('animated').css("visibility", ""); // avoid problem to filter after sorting
            $portfolio_filter.find('.grid-item').each(function () {
                /* remove perticular element from WOW array when you don't want animation on element after DOM lead */
                wow.removeBox(this);
                $(this).css("-webkit-animation", "none");
                $(this).css("-moz-animation", "none");
                $(this).css("-ms-animation", "none");
                $(this).css("animation", "none");
            });

            if( $(this).attr( 'data-id' ) != '' ){
                $grid_selectors = $('#'+ $(this).attr( 'data-id' )+' > li > a');
                $grid_selectors.parent().removeClass('active');
                $(this).parent().addClass('active');

                // Check justified gallery otherwise isotope portfolio
                if ($('.'+$(this).attr( 'data-id' )).length > 0 && $('.'+$(this).attr( 'data-id' )).hasClass('justified-gallery') ) {
                    $('.'+$(this).attr( 'data-id' )).justifiedGallery({ filter: selector });
                } else {
                    $('.' + $(this).attr( 'data-id' )).isotope({filter: selector});
                }

            }else{
                $grid_selectors.parent().removeClass('active');
                $(this).parent().addClass('active');
                $portfolio_filter.isotope({filter: selector});
            } 

            portfolio_infinite_arr(arr_dataid);
            return false;
        });

        portfolio_infinite_arr(arr_dataid);
        
        function portfolio_infinite_arr(arr_dataid){
            $(arr_uniqueid).each(function(key,value){
                var hideinfinite = $('#'+value).attr('data-infinite');
                if( $.inArray( value, arr_dataid ) == -1 && ( hideinfinite || typeof(hideinfinite) == "undefined" ) ){
                    portfolioinfinite(value);
                    $( '.'+value ).infinitescroll('bind');
                }
            });
        }
        // Portfolio Infinite Scroll
        function portfolioinfinite(portfolio_val) {
            var pagesNum = $("div.pofo-portfolio-infinite-scroll").attr('data-pagination');
            $('.'+portfolio_val).infinitescroll({
                nextSelector: 'div.pofo-portfolio-infinite-scroll a',
                loading: {
                    img: pofoMain.loading_image,
                    msgText: '<div class="paging-loader" style="transform:scale(0.35);"><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div></div>',
                    finishedMsg: '<div class="finish-load">' + pofo_infinite_scroll_message.message + '</div>',
                    speed: 'fast',
                },
                navSelector: 'div.pofo-portfolio-infinite-scroll',
                contentSelector: '.'+portfolio_val,
                itemSelector: '.'+portfolio_val+' .portfolio-single-post',
                maxPage: pagesNum,
            }, function (newElements) {
            
                $('#infscr-loading').remove();
                /* For new element set masonry */

                var $newportfoliopost = $(newElements);
                $newportfoliopost.imagesLoaded( function() {
                    if ( !$('.'+portfolio_val).hasClass('justified-gallery') ) {
                        $('.'+portfolio_val).append( $newportfoliopost ).isotope( 'appended', $newportfoliopost );
                    }
                });

                if ($('.'+portfolio_val).length > 0 && $('.'+portfolio_val).hasClass('justified-gallery') ) {
                    $('.'+portfolio_val).justifiedGallery({
                        rowHeight: $(this).attr("data-height"),
                        maxRowHeight: false,
                        captions: true,
                        margins: $(this).attr("data-spacing"),
                        waitThumbnailsLoad: true
                    });
                }

                equalizeHeight();
            });
        }

        /*=================================
        //justified Gallery
        =================================*/
        $(document).imagesLoaded(function () {
            if ($(".justified-gallery-portfolio").length > 0) {
                var data_height = $(".justified-gallery-portfolio").attr("data-height");
                var data_margin = $(".justified-gallery-portfolio").attr("data-spacing");
                if( ! data_height ){
                    data_height = 400;
                }
                if( ! data_margin ){
                    data_margin = 10;
                }
                $(".justified-gallery-portfolio").justifiedGallery({
                    rowHeight: data_height,
                    maxRowHeight: false,
                    captions: true,
                    margins: data_margin,
                    waitThumbnailsLoad: true
                });
            }
        });

        $(window).resize(function () {
            if (!isMobile && !isiPhoneiPad) {
                setTimeout(function () {
                    $portfolio_filter.find('.grid-item').removeClass('animated').css("visibility", ""); // avoid problem to filter after sorting
                    $portfolio_filter.imagesLoaded().progress( function() {
                      $portfolio_filter.isotope('layout');
                    });
                }, 300);
            }
        });
        
        var $blog_filter = $('.blog-grid');
        $blog_filter.imagesLoaded(function () {
            $blog_filter.isotope({
                layoutMode: 'masonry',
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });

        $(window).resize(function () {
            setTimeout(function () {
                $blog_filter.find('.grid-item').removeClass('animated').css("visibility", ""); // avoid problem to filter after sorting
                $blog_filter.imagesLoaded().progress( function() {
                  $blog_filter.isotope('layout');
                });
            }, 300);
        });

        /*==============================================================*/
        // Slider Integrate into Tab - START CODE
        /*==============================================================*/

        $('.nav-tabs a[data-toggle="tab"]').each(function () {
            var $this = $(this);
            $this.on('shown.bs.tab', function () {
                if( $portfolio_filter.length > 0 ) {
                    $portfolio_filter.imagesLoaded( function () {
                        $portfolio_filter.isotope({
                            layoutMode: 'masonry',
                            itemSelector: '.grid-item',
                            percentPosition: true,
                            masonry: {
                                columnWidth: '.grid-sizer'
                            }
                        });
                    });
                }
                if( $blog_filter.length > 0 ) {
                    $blog_filter.imagesLoaded(function () {
                        $blog_filter.isotope({
                            layoutMode: 'masonry',
                            itemSelector: '.grid-item',
                            percentPosition: true,
                            masonry: {
                                columnWidth: '.grid-sizer'
                            }
                        });
                    });
                }
            });
        });

        /*==============================================================*/
        // Slider Integrate into Tab - END CODE
        /*==============================================================*/

        /*==============================================================
         lightbox gallery
         ==============================================================*/

        $('.lightbox-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-fade',
            fixedContentPos: true,
            closeBtnInside: false,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                titleSrc: function (item) {
                    var title = '';
                    var lightbox_caption = '';
                    if( item.el.attr('title') ){
                        title = item.el.attr('title');
                    }
                    if( item.el.attr('data-lightbox-caption') ){
                        lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                    }
                    return title + lightbox_caption;
                }
            }
        });

        /* for group gallery */
        var lightboxgallerygroups = {};
        $('.lightbox-group-gallery-item').each(function () {
            var id = $(this).attr('data-group');
            if (!lightboxgallerygroups[id]) {
                lightboxgallerygroups[id] = [];
            }
            lightboxgallerygroups[id].push(this);
        });
        $.each(lightboxgallerygroups, function () {
            $(this).magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                gallery: { enabled: true },
                image: {
                    titleSrc: function (item) {
                        var title = '';
                        var lightbox_caption = '';
                        if( item.el.attr('title') ){
                            title = item.el.attr('title');
                        }
                        if( item.el.attr('data-lightbox-caption') ){
                            lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                        }
                        return title + lightbox_caption;
                    }
                }
            });
        });

        $('.lightbox-portfolio').magnificPopup({
            delegate: '.gallery-link',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-fade',
            fixedContentPos: true,
            closeBtnInside: false,
            gallery: {
                enabled: true,
                navigateByImgClick: false,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                titleSrc: function (item) {
                    var title = '';
                    var lightbox_caption = '';
                    if( item.el.attr('title') ){
                        title = item.el.attr('title');
                    }
                    if( item.el.attr('data-lightbox-caption') ){
                        lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                    }
                    return title + lightbox_caption;
                }
            }
        });

        /* for group gallery */
        var lightboxgallery = {};
        $('.lightbox-portfolio').each(function () {
            var id = $(this).attr('data-group');
            if (!lightboxgallery[id]) {
                lightboxgallery[id] = [];
            }
            lightboxgallery[id].push(this);
        });
        $.each(lightboxgallery, function () {
            $(this).magnificPopup({
                delegate: '.gallery-link',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-fade',
                fixedContentPos: true,
                closeBtnInside: false,
                gallery: {
                    enabled: true,
                    navigateByImgClick: false,
                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    titleSrc: function (item) {
                        var title = '';
                        var lightbox_caption = '';
                        if( item.el.attr('title') ){
                            title = item.el.attr('title');
                        }
                        if( item.el.attr('data-lightbox-caption') ){
                            lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                        }
                        return title + lightbox_caption;
                    }
                }
            });
        });

        /*==============================================================
         single image lightbox - zoom animation
         ==============================================================*/
        $('.single-image-lightbox').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            fixedContentPos: true,
            closeBtnInside: false,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    var title = '';
                    var lightbox_caption = '';
                    if( item.el.attr('title') ){
                        title = item.el.attr('title');
                    }
                    if( item.el.attr('data-lightbox-caption') ){
                        lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                    }
                    return title + lightbox_caption;
                }
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

        //fit videos
        if( $(".fit-videos").length > 0 ) {
            $(".fit-videos").fitVids();
        }

        /*==============================================================
         zoom gallery
         ==============================================================*/

        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            fixedContentPos: true,
            closeBtnInside: false,
            image: {
                verticalFit: true,
                titleSrc: function (item) {
                    var title = '';
                    var lightbox_caption = '';
                    if( item.el.attr('title') ){
                        title = item.el.attr('title');
                    }
                    if( item.el.attr('data-lightbox-caption') ){
                        lightbox_caption = '<span class="pofo-lightbox-caption">'+item.el.attr('data-lightbox-caption')+'</span>';
                    }
                    return title + lightbox_caption;
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function (element) {
                    return element.find('img');
                }
            }
        });

        /*==============================================================*/
        //Modal popup - START CODE
        /*==============================================================*/

        $('.modal-popup').magnificPopup({
            type: 'inline',
            preloader: false,
            // modal: true,
            blackbg: true,
        });

        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

        /*==============================================================*/
        //Modal popup - END CODE
        /*==============================================================*/

        /*==============================================================*/
        //Modal popup - zoom animation - START CODE
        /*==============================================================*/
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            blackbg: true,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            blackbg: true,
            mainClass: 'my-mfp-slide-bottom'
        });
        /*==============================================================*/
        //Modal popup - zoom animation - END CODE
        /*==============================================================*/

        /*==============================================================
         popup with form
         ==============================================================*/
        $('.popup-with-form').magnificPopup({
            type: 'inline',
            preloader: false,
            closeBtnInside: false,
            fixedContentPos: true,
            focus: '#name',
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeOpen: function () {
                    if ($(window).width() < 700) {
                        this.st.focus = false;
                    } else {
                        this.st.focus = '#name';
                    }
                }
            }
        });

        /*==============================================================
         video magnific popup
         ==============================================================*/
        $('.popup-youtube, .popup-vimeo, .popup-googlemap').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true,
            closeBtnInside: false
        });

        /*==============================================================
         ajax magnific popup for onepage portfolio
         ==============================================================*/
        $('.ajax-popup').magnificPopup({
            type: 'ajax',
            alignTop: true,
            fixedContentPos: true,
            overflowY: 'scroll', // as we know that popup content is tall we set scroll overflow by default to avoid jump
            callbacks: {
                open: function () {
                    $('.navbar .collapse').removeClass('in');
                    $('.navbar a.dropdown-toggle').addClass('collapsed');
                }
            }
        });

        /*==============================================================
         wow animation - on scroll
         ==============================================================*/
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });

        $(window).imagesLoaded(function () {
            wow.init();
        });

        /*==============================================================
         counter
         ==============================================================*/

        function animatecounters(element) {

            var getCounterNumber = $(element).attr('data-to');
            var getCounterSpeed = $(element).attr('data-speed');
            getCounterSpeed = ( getCounterSpeed != '' && getCounterSpeed != undefined ) ? getCounterSpeed : 2000;
            
             $({ ValuerHbcO: 0 }).delay(0).animate({ ValuerHbcO: getCounterNumber },
             {
                 duration: parseInt(getCounterSpeed),
                 easing: "swing",
                 step: function (currentLeft) {
                     var roundNumber = Math.ceil( currentLeft );
                     $(element).text( roundNumber );
                 }
             });
        }

        /* ===================================
         counter number reset while scrolling
         ====================================== */
        $('.timer').appear();
        $(document.body).on('appear', '.timer', function (e) {
            // this code is executed for each appeared element
            var element = $(this);
            if (!$(this).hasClass('appear')) {
                animatecounters(element);
                $(this).addClass('appear');
            }
        });

        $('.chart1').appear();
        $(document.body).on('appear', '.chart1', function (e) {
            // this code is executed for each appeared element
            if (!$(this).hasClass('appear')) {
                $(this).addClass('appear');
                $(this).data('easyPieChart').update(0).update($(this).data('percent'));
            }
        });

        $('.chart3').appear();
        $(document.body).on('appear', '.chart3', function (e) {
            // this code is executed for each appeared element
            if (!$(this).hasClass('appear')) {
                $(this).addClass('appear');
                $(this).data('easyPieChart').update(0).update($(this).data('percent'));
            }
        });

        if( $('#counter-coming-soon').length > 0 ) {
            $('#counter-coming-soon').countdown($('#counter-coming-soon').attr("data-enddate")).on('update.countdown', function (event) {
                var $this = $(this).html(event.strftime('' + '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span>Day%!d</span></div>' + '<div class="counter-box"><div class="number">%H</div><span>Hours</span></div>' + '<div class="counter-box"><div class="number">%M</div><span>Minutes</span></div>' + '<div class="counter-box last"><div class="number">%S</div><span>Seconds</span></div></div>'))
            });
        }

        /*==============================================================*/
        //    hamburger menu 
        /*==============================================================*/

        $(document).on('click', '.btn-hamburger', function () {
            $('.hamburger-menu').toggleClass('show-menu');
            $('body').removeClass('show-menu');
        });
        
        //search form open close code
        $( document ).on( 'click', '.search-icon', function () {
            $(".search-block").addClass('open');
        });

        $( document ).on( 'click', '.search-collapse', function () {
            $(".search-block").removeClass('open');
        });

        /*==============================================================*/
        //parralex text - START CODE
        /*==============================================================*/

        $('.swiper-auto-width .swiper-slide').mousemove(function (e) {
            var positionX = e.clientX;
            var positionY = e.clientY;
            positionX = Math.round(positionX / 10) - 80;
            positionY = Math.round(positionY / 10) - 40;
            $(this).find('.parallax-text').css({'transform': 'translate(' + positionX + 'px,' + positionY + 'px)', 'transition-duration': '0s'});
        });
        
        $('.swiper-auto-width .swiper-slide').mouseout(function (e) {
            $('.parallax-text').css({'transform': 'translate(0,0)', 'transition-duration': '0.5s'});
        });

        /*==============================================================*/
        //parralex text - END CODE
        /*==============================================================*/
        
        $( document ).on( 'click', '.atr-nav', function () {
            $(".atr-div").append("<a class='close-cross' href='#'>X</a>");
            $(".atr-div").animate({
                width: "toggle"
            });
        });
        $( document ).on( 'click', '.close-cross', function () {
            $(".atr-div").hide();
        });

        var menuRight = document.getElementById('cbp-spmenu-s2'),
            showRightPush = document.getElementById('showRightPush');
                
        if( menuRight && showRightPush ) {
            showRightPush.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(menuRight, 'cbp-spmenu-open');
            };
        }

        /* For Header Type 4 */
        var headerShowRightPush = document.getElementById('headerShowRightPush');

        if( headerShowRightPush ) {
            headerShowRightPush.onclick = function () {
                classie.toggle(this, 'active');
                return false;
            };
        }

        var closePushMenu = document.getElementById('close-pushmenu');
        if (closePushMenu) {
            closePushMenu.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(menuRight, 'cbp-spmenu-open');
                return false;
            };
        }

        $(document).on('click', '.navbar-collapse [data-toggle="dropdown"]', function (event) {

            var $innerLinkLI = $(this).parents('ul.navbar-nav').find('li.dropdown a.inner-link').parent('li.dropdown');
            if (!$(this).hasClass('inner-link') && !$(this).hasClass('dropdown-toggle') && $innerLinkLI.hasClass('open')) {
                $innerLinkLI.removeClass('open');
            }
            var target = $(this).attr('target');
            if ($(window).width() <= 991 && $(this).attr('href') && $(this).attr('href').indexOf("#") <= -1 && !$(event.target).is('i')) {
                if (event.ctrlKey || event.metaKey) {
                    window.open($(this).attr('href'), "_blank");
                    return false;
                } else if (!target)
                    window.location = $(this).attr('href');
                else
                    window.open($(this).attr('href'), target);

            } else if ($(window).width() > 991 && $(this).attr('href') && $(this).attr('href').indexOf("#") <= -1) {
                if (event.ctrlKey || event.metaKey) {
                    window.open($(this).attr('href'), "_blank");
                    return false;
                } else if (!target)
                    window.location = $(this).attr('href');
                else
                    window.open($(this).attr('href'), target);

            } else if ($(window).width() <= 991 && $(this).attr('href') && $(this).attr('href').length > 1 && $(this).attr('href').indexOf("#") >= 0 && $(this).hasClass('inner-link')) {
                $(this).parents('ul.navbar-nav').find('li.dropdown').not($(this).parent('.dropdown')).removeClass('open');
                if ($(this).parent('.dropdown').hasClass('open')) {
                    $(this).parent('.dropdown').removeClass('open');
                } else {
                    $(this).parent('.dropdown').addClass('open');
                }
                $(this).toggleClass('active');
            }
        });
        
        /* ===================================
         skillbar
         ====================================== */
        $('.skillbar').appear();
        $('.skillbar').skillBars({
            from: 0,
            speed: 4000,
            interval: 100,
            decimals: 0
        });

        $(document.body).on('appear', '.skillbar', function (e) {
            // this code is executed for each appeared element
            if (!$(this).hasClass('skillbar-appear')) {
                $(this).addClass('skillbar-appear');
                $(this).find('.skillbar-bar').css("width", "0%");
                $(this).skillBars({
                    from: 0,
                    speed: 4000,
                    interval: 100,
                    decimals: 0
                });
            }
        });

        /* ===================================
         touchstart click
         ====================================== */

        $( document ).on('touchstart click', 'body', function (e) {
            if ($(window).width() < 992) {
                if (!$('.navbar-collapse').has(e.target).is('.navbar-collapse') && $('.navbar-collapse').hasClass('in') && !$(e.target).hasClass('navbar-toggle')) {
                    $('.navbar-collapse').collapse('hide');
                }
            } else {
                if (!$('.navbar-collapse').has(e.target).is('.navbar-collapse') && $('.navbar-collapse ul').hasClass('in')) {
                    $('.navbar-collapse').find('a.dropdown-toggle').addClass('collapsed');
                    $('.navbar-collapse').find('ul.dropdown-menu').removeClass('in');
                    $('.navbar-collapse a.dropdown-toggle').removeClass('active');
                }
            }
        });

        /* ===================================
        blog hover box
        ====================================== */

        $(".blog-post-style4 .grid-item").hover(function () {
            $(this).find("figcaption .blog-hover-text").slideDown(300);
        }, function () {
            $(this).find("figcaption .blog-hover-text").slideUp(300);
        });

        /*==============================================================*/
        //Set Resize Header Menu - START CODE
        /*==============================================================*/

        $( document ).on( 'click', 'nav.full-width-pull-menu ul.panel-group li.dropdown a.dropdown-toggle', function () {
            if ($(this).parent('li').find('ul.dropdown-menu').length > 0) {
                if ($(this).parent('li').hasClass('open')) {
                    $(this).parent('li').removeClass('open');
                }
                else {
                    $(this).parent('li').addClass('open');
                }
            }
        });

        /*==============================================================*/
        //accordion  - START CODE
        /*==============================================================*/

        $( document ).on( 'click', '.nav.navbar-nav a.inner-link', function (e) {
            $(this).parents('ul.navbar-nav').find('a.inner-link').removeClass('active');
            $(this).addClass('active');
            //if ($('.navbar-header .navbar-toggle').is(':visible')) {
                $(this).parents('.navbar-collapse').collapse('hide');
            //}
        });

        $('.accordion-style1 .collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="ti-minus"></i>');
        });

        $('.accordion-style1 .collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="ti-plus"></i>');
        });

        $('.accordion-style2 .collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title').find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
        });

        $('.accordion-style2 .collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
        });

        $('.accordion-style3 .collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title').find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
        });

        $('.accordion-style3 .collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
        });

        /*==============================================================*/
        //accordion - END CODE
        /*==============================================================*/

        /*==============================================================*/
        //toggles  - START CODE
        /*==============================================================*/

        $('.toggles .collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="ti-minus"></i>');
        });

        $('.toggles .collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="ti-plus"></i>');
        });

        $('.toggles-style2 .collapse').on('show.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fas fa-angle-up"></i>');
        });

        $('.toggles-style2 .collapse').on('hide.bs.collapse', function () {
            var id = $(this).attr('id');
            $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-accordion');
            $('a[href="#' + id + '"] .panel-title span').html('<i class="fas fa-angle-down"></i>');
        });

        /*==============================================================*/
        //toggles  - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Header Search Magnific Popup - START CODE
        /*==============================================================*/

        $('.header-search-form').magnificPopup({
            mainClass: 'mfp-fade',
            closeOnBgClick: true,
            preloader: false,
            // for white backgriund
            fixedContentPos: false,
            closeBtnInside: false,
            callbacks: {
                open: function () {
                    setTimeout(function () {
                        $('.search-input').focus();
                    }, 500);
                    $('#search-header').parent().addClass('search-popup');
                    if (!isMobile) {
                        $('body').addClass('overflow-hidden');
                        //$('body').addClass('position-fixed');
                        $('body').addClass('width-100');
                        document.onmousewheel = ScrollStop;
                    } else {
                        $('body, html').on('touchmove', function (e) {
                            e.preventDefault();
                        });
                    }
                },
                close: function () {
                    if (!isMobile) {
                        $('body').removeClass('overflow-hidden');
                        //$('body').removeClass('position-fixed');
                        $('body').removeClass('width-100');
                        $('#search-header input[type=text]').each(function (index) {
                            if (index == 0) {
                                $(this).val('');
                                $("#search-header").find("input:eq(" + index + ")").css({ "border": "none", "border-bottom": "2px solid rgba(255,255,255,0.5)" });
                            }
                        });
                        document.onmousewheel = ScrollStart;
                    } else {
                        $('body, html').unbind('touchmove');
                    }
                }
            }
        });

        // Click event to review to scroll 
        if($('.woocommerce-review-link').length > 0) {
            $('.woocommerce-review-link').on('click', function () { 
                $( "#tab-title-reviews a" ).trigger( "click" ); 
                $('html, body').animate({ 
                    scrollTop: $(".woocommerce-tabs").offset().top 
                }, 800); 
                return false; 
            });
        }
 
    }); //end ready

    $( document ).on( 'click', '.navbar .navbar-collapse a.dropdown-toggle, .accordion-style1 .panel-heading a, .accordion-style2 .panel-heading a, .accordion-style3 .panel-heading a, .toggles .panel-heading a, .toggles-style2 .panel-heading a, .toggles-style3 .panel-heading a, a.carousel-control, .nav-tabs a[data-toggle="tab"], a.shopping-cart', function (e) {
        e.preventDefault();
    });

    var lastScroll = 0;
    $(window).on("scroll", init_scroll_navigate);
    function init_scroll_navigate() {

        /*==============================================================
         One Page Main JS - START CODE
         =============================================================*/

        var menu_links = $(".navbar-nav li a");
        var scrollPos = $(document).scrollTop();
        scrollPos = scrollPos + 60;
        menu_links.each(function () {
            var currLink = $(this);
            var hasPos  = currLink.attr("href").indexOf("#");
            if( hasPos > -1 ) {
                var res = currLink.attr("href").substring( hasPos );
                if ( $( res ).length > 0) {
                    var refElement = $( res );
                    if (refElement.offset().top <= scrollPos && refElement.offset().top + refElement.height() > scrollPos) {
                        menu_links.not( currLink ).removeClass("active");
                        currLink.addClass("active");
                    } else {
                        currLink.removeClass("active");
                    }
                }
            }
        });

        /*==============================================================
         One Page Main JS - END CODE
         =============================================================*/

        /*==============================================================
         background color slider Start
         ==============================================================*/

        // selectors
        var $window = $(window),
            $body   = $('body'),
            $panel  = $('.color-code');
        var scroll  = $window.scrollTop() + ($window.height() / 2);
        $panel.each(function () {
            var $this = $(this);
            if ($this.position().top <= scroll && $this.position().top + $this.height() > scroll) {
                $body.css('background-color', $(this).data('color'));
            }
        });

        /*==============================================================
         background color slider End
         ==============================================================*/

        /* ===================================
         sticky nav Start
         ====================================== */

        if( $( '.left-nav .sidebar-part1' ).length > 0 ) {
            var topHeaderHeight = $('.top-header-area' ).outerHeight();
            var headerHeight = $('.left-nav .sidebar-part1').outerHeight();
            var headerHeight = headerHeight + topHeaderHeight;
        } else if( $( '.sidenav-header' ).length > 0 ) {
            var topHeaderHeight = $('.top-header-area' ).outerHeight();
            var headerHeight = $('.sidenav-header').outerHeight();
            var headerHeight = headerHeight + topHeaderHeight;
        } else {
            var headerHeight = $('nav').outerHeight();
        }
        if (!$('header').hasClass('no-sticky')) {
            if ($(document).scrollTop() >= headerHeight) {
                $('header').addClass('sticky');
            } else if ($(document).scrollTop() <= headerHeight) {
                $('header').removeClass('sticky');
            }
            SetMegamenuPosition();
        } else if( $( 'header' ).hasClass( 'sticky-mini-header' ) ) {
            if ($(document).scrollTop() >= headerHeight) {
                $('header').addClass('min-header-appear');
            } else if ($(document).scrollTop() <= headerHeight) {
                $('header').removeClass('min-header-appear');
            }
        }

        /* ===================================
         header appear on scroll up
         ====================================== */

        var st = $(this).scrollTop();
        if (st > lastScroll) {
            $('header.sticky').removeClass('header-appear');
        } else {
            $('header.sticky').addClass('header-appear');
        }
        lastScroll = st;
        if (lastScroll == 0) {
            $('header.header-main-wrapper').removeClass('header-appear');
        }

        CenterLogoHeight();

        /* ===================================
         sticky nav End
         ====================================== */

        if( $(window).width() <= pofoMain.menu_breakpoint ) {
            $('nav.pofo-standard-menu').addClass( 'mobile-menu' );
        } else {
            $('nav.pofo-standard-menu').removeClass( 'mobile-menu' );
        }
    }

    function ScrollStop() {
        return false;
    }
    function ScrollStart() {
        return true;
    }

    function feature_dynamic_font_line_height() {

        if($('.dynamic-font-size').length > 0) {
            var site_width = 1170;
            var window_width = $(window).width();

            if(window_width < site_width) {
                var window_site_width_ratio = window_width / site_width;
            }

            $('.dynamic-font-size').each(function ( index ) {
                var font_size = $(this).attr('data-fontsize');
                var line_height = $(this).attr('data-lineheight');

                if(font_size != '' && font_size != undefined) {
                    font_size = font_size.replace("px", "");
                    if(window_width < site_width) {
                        font_size = Math.round(font_size * window_site_width_ratio * 1000) / 1000;
                    }
                    $(this).css('font-size', font_size + 'px');
                }
                if(line_height != '' && line_height != undefined) {
                    line_height = line_height.replace("px", "");
                    if(window_width < site_width) {
                        line_height = Math.round(line_height * window_site_width_ratio * 1000) / 1000;
                    }
                    $(this).css('line-height', line_height + 'px');
                }
            });
        }
    }

    /*==============================================================
     center logo container height
     ==============================================================*/

    function CenterLogoHeight(){
        if( $(".navbar").hasClass("header-center-logo") ){
            var centerLogoHeight = $(".pofo-header-logo.center-logo").outerHeight();
            var menuHeight = $(".accordion-menu").outerHeight();
            if( centerLogoHeight || menuHeight ){
                var navContainerHeight = ( menuHeight > centerLogoHeight ) ? menuHeight : centerLogoHeight;
                $(".navbar").find(".nav-header-container").css('cssText', 'height: ' + navContainerHeight + 'px;');
            }
        }
    }

    /*==============================================================
     equalize
     ==============================================================*/

    function equalizeHeight() {
        if( $('.equalize').length > 0 ) {
            
            $('.equalize').equalize({equalize: 'outerHeight', reset: true});

            if( $('.inner-match-height').length > 0 ) {
                $('.equalize').equalize({equalize: 'outerHeight', children: '.inner-match-height', reset: true});
            }
        }
    }

    /*==============================================================
     Resize Content
     ==============================================================*/

    function SetResizeContent() {

        var element = $(".full-screen");
        element.parents('section').imagesLoaded(function () {
            var minheight = $(window).height();
            element.children( '.vc_column-inner' ).css('min-height', minheight);
            element.css('min-height', minheight);
        });

        var minwidth = $(window).width();
        var winheight = $(window).height();
        $(".full-screen-width").css('min-width', minwidth);

        var sidebarNavHeight = $('.sidebar-nav-style-1').height() - $('.logo-holder').parent().height() - $('.footer-holder').parent().height() - 10;
        $(".sidebar-nav-style-1 .nav").css('height', (sidebarNavHeight));

        var style2NavHeight = parseInt($('.sidebar-part2').height() - parseInt($('.sidebar-part2 .sidebar-middle').css('padding-top')) - parseInt($('.sidebar-part2 .sidebar-middle').css('padding-bottom')) - parseInt($(".sidebar-part2 .sidebar-middle .sidebar-middle-menu .nav").css('margin-bottom')));
        $(".sidebar-part2 .sidebar-middle .sidebar-middle-menu .nav").css('height', (style2NavHeight));

        if( $(window).width() <= pofoMain.menu_breakpoint ) {
            $('.left-nav').addClass( 'mobile-left-menu' );
            $('.sidebar-nav-style-1').addClass( 'mobile-left-menu' );

            // Left menu classic
            if( $('.sidebar-wrapper').length > 0 ) {
                var left_menu_width = $( 'nav.sidebar-nav' ).width();
                $( '.sidebar-wrapper div.container section.pofo-stretch-content').each(function () {
                    if( !$( this ).hasClass( 'pofo-stretch-row-container' ) ) {
                        this.style.setProperty( 'padding-left', 'inherit', 'important' );
                    }
                });
            }
            // Left menu modern
            if( $('.left-nav-sidebar .sidebar-part3').length > 0 ) {
                var left_menu_width = $( '.left-nav-sidebar .sidebar-part3' ).width();
                $( '.left-nav-sidebar div.container .entry-content section.pofo-stretch-content').each(function () {
                    if( !$( this ).hasClass( 'pofo-stretch-row-container' ) ) {
                        this.style.setProperty( 'padding-left', 'inherit', 'important' );
                    }
                });
            }

        } else {
            $('.left-nav').removeClass( 'mobile-left-menu' );
            $('.sidebar-nav-style-1').removeClass( 'mobile-left-menu' );

            // Left menu classic
            if( $('.sidebar-wrapper').length > 0 ) {
                var left_menu_width = $( 'nav.sidebar-nav' ).width();
                $( '.sidebar-wrapper div.container section.pofo-stretch-content').each(function () {
                    if( !$( this ).hasClass( 'pofo-stretch-row-container' ) ) {
                        this.style.setProperty( 'padding-left', left_menu_width + 'px', 'important' );
                    }
                });
            }
            // Left menu modern
            if( $('.left-nav-sidebar .sidebar-part3').length > 0 ) {
                var left_menu_width = $( '.left-nav-sidebar .sidebar-part3' ).width();
                $( '.left-nav-sidebar div.container .entry-content section.pofo-stretch-content').each(function () {
                    if( !$( this ).hasClass( 'pofo-stretch-row-container' ) ) {
                        this.style.setProperty( 'padding-left', left_menu_width + 'px', 'important' );
                    }
                });
            }
        }

        equalizeHeight();
        setPageTitleSpace();
        setMobileHeight();
    }

    /*==============================================================
     set parallax
     ==============================================================*/
    function stellarParallax() {
        if ($(window).width() > 1024) {
            $.stellar();
        } else {
            $.stellar('destroy');
            $('.parallax').css('background-position', '');
        }

        if( $( 'body').hasClass( 'vc_editor' ) ) {
            $.stellar('refresh');
        }
    }

    //swiper button position in auto height slider
    function setButtonPosition() {
        
        if( $(window).width() > 767 && $(".swiper-auto-height-container").length > 0 ) {

            setTimeout(function () {

                var leftPosition = parseInt($('.swiper-auto-height-container .swiper-slide').css('padding-left'));
                var bottomPosition = parseInt($('.swiper-auto-height-container .swiper-slide').css('padding-bottom'));
                var bannerWidth = parseInt($('.swiper-auto-height-container .slide-banner').outerWidth());
                $('.navigation-area').css({'left': bannerWidth + leftPosition + 'px', 'bottom': bottomPosition + 'px'});
            }, 300);
        }
    }

    $(window).resize(function (event) {

        feature_dynamic_font_line_height();
        setButtonPosition();
        init_scroll_navigate();
        CenterLogoHeight();
        
        // Bootsnav menu work with eualize height
        $("nav.navbar.bootsnav ul.nav").each(function () {
            $("li.dropdown", this).on("mouseenter", function () {
                equalizeHeight();
                return false;
            });
        });

        // Bootsnav tab work with eualize height
        $('a[data-toggle="tab"]').on('shown.bs.tab', function () {
            equalizeHeight();
            return false;
        });

        setTimeout(function () {
            SetResizeContent();
        }, 500);
        event.preventDefault();

    });

    /*==============================================================*/
    // Comment Validation - START CODE
    /*==============================================================*/

    $(".pofo-comment-button").on("click", function () {
        var fields;
        fields = "";
        if ($(this).parent().parent().find('#author').length == 1) {
            if ($(".comment-form").find("#author").val().length == 0 || $(".comment-form").find("#author").val().value == '') {
                fields = '1';
                $(".comment-form").find("#author").addClass("inputerror");
            }
        }
        if ($(this).parent().parent().find('#comment').length == 1) {
            if ($(".comment-form").find("#comment").val().length == 0 || $(".comment-form").find("#comment").val().value == '') {
                fields = '1';
                $(".comment-form").find("#comment").addClass("inputerror");
            }
        }
        if ($(this).parent().parent().find('#email').length == 1) {
            if ($(".comment-form").find("#email").val().length == 0 || $(".comment-form").find("#email").val().length == '') {
                fields = '1';
                $(".comment-form").find("#email").addClass("inputerror");
            } else {
                var re = new RegExp();
                re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var sinput;
                sinput = "";
                sinput = $(".comment-form").find("#email").val();
                if (!re.test(sinput)) {
                    fields = '1';
                    $(".comment-form").find("#email").addClass("inputerror");
                }
            }
        }
        if (fields != "") {
            return false;
        } else {
            return true;
        }
    });

    /*==============================================================*/
    // Comment Validation - END CODE
    /*==============================================================*/

    $('.comment-fields').on('focus', function () {
      $(this).removeClass('inputerror');
    });

    /*==============================================================*/
    // Infinite Scroll jQuery - START CODE
    /*==============================================================*/

    // Blog Infinite Scroll
    var pagesNum = $("div.pofo-infinite-scroll").attr('data-pagination');
    $('.infinite-scroll-pagination').infinitescroll({
        nextSelector: 'div.pofo-infinite-scroll a',
        loading: {
            img: pofoMain.loading_image,
            msgText: '<div class="paging-loader" style="transform:scale(0.35);"><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div></div>',
            finishedMsg: '<div class="finish-load">' + pofo_infinite_scroll_message.message + '</div>',
            speed: 'fast',
        },
        navSelector: 'div.pofo-infinite-scroll',
        contentSelector: '.infinite-scroll-pagination',
        itemSelector: '.infinite-scroll-pagination .blog-single-post',
        maxPage: pagesNum,
    }, function (newElements) {

        $('#infscr-loading').remove();
        /* For new element set masonry */
        var $newblogpost = $(newElements);
        $newblogpost.imagesLoaded( function() {
        $('.blog-grid').append( $newblogpost )
          .isotope( 'appended', $newblogpost );
        });
        equalizeHeight();
        feature_dynamic_font_line_height();
    });

    /*==============================================================*/
    // Infinite Scroll jQuery - END CODE
    /*==============================================================*/

    /*==============================================================*/
    // Post Like Dislike Button JQuery - START CODE
    /*==============================================================*/
    $(document).on('click', '.sl-button', function() {
        var button = $(this);
        var post_id = button.attr('data-post-id');
        var security = button.attr('data-nonce');
        var iscomment = button.attr('data-iscomment');
        var allbuttons;
        if ( iscomment === '1' ) { /* Comments can have same id */
            allbuttons = $('.sl-comment-button-'+post_id);
        } else {
            allbuttons = $('.sl-button-'+post_id);
        }
        var loader = allbuttons.next('#sl-loader');
        if (post_id !== '') {
            $.ajax({
                type: 'POST',
                url: simpleLikes.ajaxurl,
                data : {
                    action : 'process_simple_like',
                    post_id : post_id,
                    nonce : security,
                    is_comment : iscomment
                },
                beforeSend:function(){
                },  
                success: function(response){
                    var icon = response.icon;
                    var count = response.count;
                    allbuttons.html(icon+count);
                    if(response.status === 'unliked') {
                        var like_text = simpleLikes.like;
                        allbuttons.prop('title', like_text);
                        allbuttons.removeClass('liked');
                    } else {
                        var unlike_text = simpleLikes.unlike;
                        allbuttons.prop('title', unlike_text);
                        allbuttons.addClass('liked');
                    }
                    loader.empty();                 
                }
            });
            
        }
        return false;
    });
    /*==============================================================*/
    // Post Like Dislike Button JQuery - END CODE
    /*==============================================================*/

})( jQuery );