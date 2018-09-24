!function($) {
    "use strict";
    $( document ).ready(function() {
        var pofo_customize = wp.customize;
        var $pofo_default_mini_header_text_color = '';
        var $pofo_hide_scroll_to_top_button_color = '';
        var $pofo_hide_scroll_to_top_button_bg_color = '';
        var $pofo_default_title_breadcrumb_color = '';
        var $pofo_single_post_title_breadcrumb_color = '';
        var $pofo_single_portfolio_title_breadcrumb_color = '';
        var $pofo_single_product_title_breadcrumb_color = '';
        var $pofo_archive_title_breadcrumb_color = '';
        var $pofo_default_post_title_breadcrumb_color = '';
        var $pofo_portfolio_archive_title_breadcrumb_color = '';
        var $pofo_product_archive_title_breadcrumb_color = '';
        var $pofo_archive_post_meta_color = '';
        var $pofo_archive_button_color = '';
        var $pofo_archive_button_text_color = '';
        var $pofo_archive_title_color = '';
        var $pofo_footer_icon_color = '';
        var $pofo_footer_link_color = '';
        var $pofo_footer_bottom_link_color = '';
        var $pofo_post_tag_like_color = '';
        var $pofo_post_author_title_text_color = '';
        var $pofo_single_post_meta_text_color = '';
        var $pofo_sticky_post_meta_color = '';
        var $pofo_sticky_button_color = '';
        var $pofo_sticky_button_text_color = '';
        var $pofo_sticky_title_color = '';
        var $pofo_default_post_meta_color = '';
        var $pofo_default_button_color = '';
        var $pofo_default_button_text_color = '';
        var $pofo_default_title_color = '';
        var $pofo_default_content_text_color = '';
        var $pofo_box_bg_color_archive = '';
        var $pofo_box_bg_color_default = '';
        var $pofo_related_post_title_color = '';
        var $pofo_related_post_meta_color = '';
        var $pofo_navigation_single_portfolio_link_color = '';
        var $pofo_single_portfolio_meta_text_color = '';
        var $pofo_portfolio_archive_page_title_color = '';
        var $pofo_product_archive_page_title_color = '';
        var $pofo_product_archive_product_title_color = '';
        var $pofo_product_archive_product_button_color = '';
        var $pofo_product_archive_product_button_bg_color = '';
        var $pofo_single_product_button_color = '';
        var $pofo_single_product_button_bg_color = '';
        var $pofo_single_product_page_meta_color = '';

        //Get Hover Values
        var $pofo_default_mini_header_text_hover_color = '';
        var $pofo_hide_scroll_to_top_button_hover_color = '';
        var $pofo_hide_scroll_to_top_button_hover_bg_color = '';
        var $pofo_default_title_breadcrumb_text_hover_color = '';
        var $pofo_single_post_title_breadcrumb_text_hover_color = '';
        var $pofo_single_portfolio_title_breadcrumb_text_hover_color = '';
        var $pofo_single_product_title_breadcrumb_text_hover_color = '';
        var $pofo_archive_title_breadcrumb_text_hover_color = '';
        var $pofo_default_post_title_breadcrumb_text_hover_color = '';
        var $pofo_portfolio_archive_title_breadcrumb_text_hover_color = '';
        var $pofo_product_archive_title_breadcrumb_text_hover_color = '';
        var $pofo_archive_post_meta_hover_color = '';
        var $pofo_archive_button_hover_color = '';
        var $pofo_archive_button_text_hover_color = '';
        var $pofo_archive_title_hover_color = '';
        var $pofo_footer_icon_hover_color = '';
        var $pofo_footer_link_hover_color = '';
        var $pofo_footer_bottom_link_hover_color = '';
        var $pofo_post_tag_like_hover_color = '';
        var $pofo_post_author_title_text_hover_color = '';
        var $pofo_single_post_meta_text_hover_color = '';
        var $pofo_sticky_post_meta_hover_color = '';
        var $pofo_sticky_button_hover_color = '';
        var $pofo_sticky_button_text_hover_color = '';
        var $pofo_sticky_title_hover_color = '';
        var $pofo_default_post_meta_hover_color = '';
        var $pofo_default_button_hover_color = '';
        var $pofo_default_button_text_hover_color = '';
        var $pofo_default_title_hover_color = '';
        var $pofo_default_content_text_hover_color = '';
        var $pofo_box_bg_hover_color_archive = '';
        var $pofo_box_bg_hover_color_default = '';
        var $pofo_related_post_title_hover_color = '';
        var $pofo_related_post_meta_hover_color = '';
        var $pofo_hide_navigation_single_portfolio_link_hover_color = '';
        var $pofo_single_portfolio_meta_text_hover_color = '';
        var $pofo_portfolio_archive_page_title_hover_color = '';
        var $pofo_product_archive_page_title_hover_color = '';
        var $pofo_product_archive_product_title_hover_color = '';
        var $pofo_product_archive_product_button_hover_color = '';
        var $pofo_product_archive_product_button_hover_bg_color = '';
        var $pofo_single_product_button_hover_color = '';
        var $pofo_single_product_button_hover_bg_color = '';
        var $pofo_single_product_page_meta_link_hover_color = '';


        /* For Body Background Color */
        pofo_customize( 'pofo_body_background_color', function( value ) { 
            value.bind( function( to ) {
                $( 'body' ).css( 'background', to );
            });
        });

        /* For Body Text Color */
        pofo_customize( 'pofo_body_text_color', function( value ) { 
            value.bind( function( to ) {
                $( 'body' ).css( 'color', to );
            });
        });

        /* For Mini Header Background Color */
        pofo_customize( 'pofo_mini_header_background_color', function( value ) { 
            value.bind( function( to ) {
                $( 'header .top-header-area' ).css( 'background', to );
            });
        });

        /* For Mini Header Text Color */
        pofo_customize( 'pofo_mini_header_text_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_mini_header_text_color = to;
                $( 'header .top-header-area .separator-line-verticle-extra-small' ).css( 'background-color', to );
                $( 'header .top-header-area, header .top-header-area a, header .top-header-area a i' ).css( 'color', to );
                if( !$pofo_default_mini_header_text_hover_color ){
                    pofo_customize( 'pofo_mini_header_text_hover_color', function( value ) { 
                        $( 'header .top-header-area a' ).hover(function(){
                            $(this).css( 'color', '' );
                            $(this).find('i').css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_mini_header_text_color );
                            $(this).find('i').css( 'color', $pofo_default_mini_header_text_color );
                        });
                    });
                }
            });
        });

        /* For Mini Header Text Hover Color */
        pofo_customize( 'pofo_mini_header_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_mini_header_text_hover_color = to;
                $( 'header .top-header-area a' ).hover(function(){
                    $(this).css( 'color', to );
                    $(this).find('i').css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_mini_header_text_color );
                    $(this).find('i').css( 'color', $pofo_default_mini_header_text_color );
                });
            });
        });

        /* For Content Text Color */
        pofo_customize( 'pofo_content_link_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_content_text_color = to;
                $( 'a' ).css( 'color', to );
                if( !$pofo_default_content_text_hover_color ){
                    pofo_customize( 'pofo_content_link_hover_color', function( value ) { 
                        $( 'a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_content_text_color );
                        });
                    });
                }
            });
        });

        /* For Content Text Hover Color */
        pofo_customize( 'pofo_content_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_content_text_hover_color = to;
                $( 'a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_content_text_color );
                });
            });
        });

        /* Page Opacity Color */
        pofo_customize( 'pofo_page_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Page Title BG Color */
        pofo_customize( 'pofo_page_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-title-bg' ).css( 'background-color', to );
            });
        });

        /* Page Title Color */
        pofo_customize( 'pofo_page_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-title' ).css( 'color', to );
            });
        });

        /* Page Subtitle Color */
        pofo_customize( 'pofo_page_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-subtitle' ).css( 'color', to );
            });
        });

        /* Page Breadcrumb BG Color */
        pofo_customize( 'pofo_page_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-breadcrumb' ).css( 'background', to );
            });
        });

        /* Page Breadcrumb Border Color */
        pofo_customize( 'pofo_page_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Page Title Breadcrumb Color */
        pofo_customize( 'pofo_page_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_title_breadcrumb_color = to;
                $( '.pofo-page-title-breadcrumb a, .pofo-page-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_default_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_page_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-page-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Page Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_page_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_title_breadcrumb_text_hover_color = to;
                $( '.pofo-page-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_title_breadcrumb_color );
                });
            });
        });

        /* Page Icon BG Color */
        pofo_customize( 'pofo_page_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Page Icon Color */
        pofo_customize( 'pofo_page_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-page-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Related Post Title Color */
        pofo_customize( 'pofo_related_post_general_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.related-post-general-title' ).css( 'color', to );
            });
        });

        /* Related Post Background Color */
        pofo_customize( 'pofo_related_post_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-posts-background' ).css( 'background-color', to );
            });
        });

        /* Related Post Overlay Color */
        pofo_customize( 'pofo_related_post_overlay_color', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-related .blog-post-images' ).css( 'background-color', to );
            });
        });

        /* Related Post Title Color */
        pofo_customize( 'pofo_related_post_title_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_related_post_title_color = to;
                $( '.pofo-related-post-title' ).css( 'color', to );
                if( !$pofo_related_post_title_hover_color ){
                    pofo_customize( 'pofo_related_post_title_hover_color', function( value ) { 
                        $( '.pofo-related-post-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_related_post_title_color );
                        });
                    });
                }
            });
        });

        /* Related Post Title Hover Color */
        pofo_customize( 'pofo_related_post_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_related_post_title_hover_color = to;
                $( '.pofo-related-post-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_related_post_title_color );
                });
            });
        });

        /* Related Post Meta Color */
        pofo_customize( 'pofo_related_post_meta_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_related_post_meta_color = to;
                $( '.pofo-related-post-meta, .pofo-related-post-meta a' ).css( 'color', to );
                if( !$pofo_related_post_meta_hover_color ){
                    pofo_customize( 'pofo_related_post_meta_hover_color', function( value ) { 
                        $( '.pofo-related-post-meta a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_related_post_meta_color );
                        });
                    });
                }
            });
        });

        /* Related Post Meta Hover Color */
        pofo_customize( 'pofo_related_post_meta_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_related_post_meta_hover_color = to;
                $( '.pofo-related-post-meta a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_related_post_meta_color );
                });
            });
        });

        /* Related Post Content Color */
        pofo_customize( 'pofo_related_post_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-post-content' ).css( 'color', to );
            });
        });

        /* Related Post Separator Color */
        pofo_customize( 'pofo_related_post_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-post-separator' ).css( 'background-color', to );
            });
        });

        /* Single Post Opacity Color */
        pofo_customize( 'pofo_single_post_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-single-post-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Single Post Title BG Color */
        pofo_customize( 'pofo_single_post_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-title-bg' ).css( 'background-color', to );
            });
        });

        /* Single Post Title Color */
        pofo_customize( 'pofo_single_post_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-title' ).css( 'color', to );
            });
        });

        /* Single Post Subtitle Color */
        pofo_customize( 'pofo_single_post_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-subtitle' ).css( 'color', to );
            });
        });

        /* Single Post Title Breadcrumb Color */
        pofo_customize( 'pofo_single_post_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_post_title_breadcrumb_color = to;
                $( '.pofo-single-post-title-breadcrumb a, .pofo-single-post-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_single_post_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_single_post_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-single-post-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_post_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Single Post Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_single_post_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_post_title_breadcrumb_text_hover_color = to;
                $( '.pofo-single-post-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_post_title_breadcrumb_color );
                });
            });
        });

        /* Single Post Breadcrumb BG Color */
        pofo_customize( 'pofo_single_post_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-breadcrumb' ).css( 'background', to );
            });
        });

        /* Single Post Breadcrumb Border Color */
        pofo_customize( 'pofo_single_post_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Single Post Icon BG Color */
        pofo_customize( 'pofo_single_post_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Single Post Icon Color */
        pofo_customize( 'pofo_single_post_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-post-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Single Portfolio Opacity Color */
        pofo_customize( 'pofo_single_portfolio_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-single-portfolio-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Single Portfolio Title BG Color */
        pofo_customize( 'pofo_single_portfolio_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-title-bg' ).css( 'background-color', to );
            });
        });

        /* Single Portfolio Title Color */
        pofo_customize( 'pofo_single_portfolio_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-title' ).css( 'color', to );
            });
        });

        /* Single Portfolio Subtitle Color */
        pofo_customize( 'pofo_single_portfolio_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-subtitle' ).css( 'color', to );
            });
        });

        /* Single Portfolio Breadcrumb BG Color */
        pofo_customize( 'pofo_single_portfolio_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-breadcrumb' ).css( 'background', to );
            });
        });

        /* Single Portfolio Breadcrumb Border Color */
        pofo_customize( 'pofo_single_portfolio_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Single Portfolio Title Breadcrumb Color */
        pofo_customize( 'pofo_single_portfolio_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_portfolio_title_breadcrumb_color = to;
                $( '.pofo-single-portfolio-title-breadcrumb a, .pofo-single-portfolio-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_single_portfolio_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_single_portfolio_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-single-portfolio-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_portfolio_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Single Portfolio Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_single_portfolio_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_portfolio_title_breadcrumb_text_hover_color = to;
                $( '.pofo-single-portfolio-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_portfolio_title_breadcrumb_color );
                });
            });
        });

        /* Single Portfolio Icon BG Color */
        pofo_customize( 'pofo_single_portfolio_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Single Portfolio Icon Color */
        pofo_customize( 'pofo_single_portfolio_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-portfolio-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Single Product Opacity Color */
        pofo_customize( 'pofo_single_product_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-single-product-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Single Product Title BG Color */
        pofo_customize( 'pofo_single_product_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-title-bg' ).css( 'background-color', to );
            });
        });

        /* Single Product Title Color */
        pofo_customize( 'pofo_single_product_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-title' ).css( 'color', to );
            });
        });

        /* Single Product Subtitle Color */
        pofo_customize( 'pofo_single_product_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-subtitle' ).css( 'color', to );
            });
        });

        /* Single Product Breadcrumb BG Color */
        pofo_customize( 'pofo_single_product_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-breadcrumb' ).css( 'background', to );
            });
        });

        /* Single Product Breadcrumb Border Color */
        pofo_customize( 'pofo_single_product_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Single Product Title Breadcrumb Color */
        pofo_customize( 'pofo_single_product_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_title_breadcrumb_color = to;
                $( '.pofo-single-product-title-breadcrumb a, .pofo-single-product-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_single_product_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_single_product_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-single-product-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_product_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Single Product Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_single_product_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_title_breadcrumb_text_hover_color = to;
                $( '.pofo-single-product-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_product_title_breadcrumb_color );
                });
            });
        });

        /* Single Product Icon BG Color */
        pofo_customize( 'pofo_single_product_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Single Product Icon Color */
        pofo_customize( 'pofo_single_product_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-single-product-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Archive Page Opacity Color */
        pofo_customize( 'pofo_archive_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-archive-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Archive Page Title BG Color */
        pofo_customize( 'pofo_archive_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-title-bg' ).css( 'background-color', to );
            });
        });

        /* Archive Page Title Color */
        pofo_customize( 'pofo_archive_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-title' ).css( 'color', to );
            });
        });

        /* Archive Page Subtitle Color */
        pofo_customize( 'pofo_archive_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-subtitle' ).css( 'color', to );
            });
        });

        /* Archive Breadcrumb BG Color */
        pofo_customize( 'pofo_archive_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-breadcrumb' ).css( 'background', to );
            });
        });

        /* Archive Breadcrumb Border Color */
        pofo_customize( 'pofo_archive_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Archive Page Title Breadcrumb Color */
        pofo_customize( 'pofo_archive_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_title_breadcrumb_color = to;
                $( '.pofo-archive-title-breadcrumb a, .pofo-archive-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_archive_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_archive_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-archive-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_archive_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Archive Page Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_archive_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_title_breadcrumb_text_hover_color = to;
                $( '.pofo-archive-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_archive_title_breadcrumb_color );
                });
            });
        });

        /* Archive Icon BG Color */
        pofo_customize( 'pofo_archive_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Archive Icon Color */
        pofo_customize( 'pofo_archive_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-archive-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Default Page Opacity Color */
        pofo_customize( 'pofo_default_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-default-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Default Page Title BG Color */
        pofo_customize( 'pofo_default_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-title-bg' ).css( 'background-color', to );
            });
        });

        /* Default Page Title Color */
        pofo_customize( 'pofo_default_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-title' ).css( 'color', to );
            });
        });

        /* Default Page Subtitle Color */
        pofo_customize( 'pofo_default_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-subtitle' ).css( 'color', to );
            });
        });

        /* Default Breadcrumb BG Color */
        pofo_customize( 'pofo_default_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-breadcrumb' ).css( 'background', to );
            });
        });

        /* Default Breadcrumb Border Color */
        pofo_customize( 'pofo_default_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Default Icon BG Color */
        pofo_customize( 'pofo_default_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Default Icon Color */
        pofo_customize( 'pofo_default_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Default Page Title Breadcrumb Color */
        pofo_customize( 'pofo_default_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_post_title_breadcrumb_color = to;
                $( '.pofo-default-title-breadcrumb a, .pofo-default-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_default_post_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_default_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-default-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_post_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Default Page Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_default_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_post_title_breadcrumb_text_hover_color = to;
                $( '.pofo-default-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_post_title_breadcrumb_color );
                });
            });
        });

        /* Portfolio Archive Page Opacity Color */
        pofo_customize( 'pofo_portfolio_archive_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-portfolio-archive-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Portfolio Archive Page Title BG Color */
        pofo_customize( 'pofo_portfolio_archive_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-title-bg' ).css( 'background-color', to );
            });
        });

        /* Portfolio Archive Page Title Color */
        pofo_customize( 'pofo_portfolio_archive_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-title' ).css( 'color', to );
            });
        });

        /* Portfolio Archive Page Subtitle Color */
        pofo_customize( 'pofo_portfolio_archive_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-subtitle' ).css( 'color', to );
            });
        });

        /* Portfolio archive Breadcrumb BG Color */
        pofo_customize( 'pofo_portfolio_archive_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-breadcrumb' ).css( 'background', to );
            });
        });

        /* Portfolio archive Breadcrumb Border Color */
        pofo_customize( 'pofo_portfolio_archive_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Portfolio Archive Page Title Breadcrumb Color */
        pofo_customize( 'pofo_portfolio_archive_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_portfolio_archive_title_breadcrumb_color = to;
                $( '.pofo-portfolio-archive-title-breadcrumb a, .pofo-portfolio-archive-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_portfolio_archive_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_portfolio_archive_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-portfolio-archive-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_portfolio_archive_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Portfolio Archive Page Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_portfolio_archive_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_portfolio_archive_title_breadcrumb_text_hover_color = to;
                $( '.pofo-portfolio-archive-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_portfolio_archive_title_breadcrumb_color );
                });
            });
        });

        /* Portfolio Archive Icon BG Color */
        pofo_customize( 'pofo_portfolio_archive_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio_archive-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Portfolio Archive Icon Color */
        pofo_customize( 'pofo_portfolio_archive_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio_archive-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Product Archive Page Opacity Color */
        pofo_customize( 'pofo_product_archive_title_opacity_color', function( value ) { 
            value.bind( function( to ) {
               $( '.bg-product-archive-opacity-color' ).css( 'background-color', to );
            });
        });

        /* Product Archive Page Title BG Color */
        pofo_customize( 'pofo_product_archive_title_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-title-bg' ).css( 'background-color', to );
            });
        });

        /* Product Archive Page Title Color */
        pofo_customize( 'pofo_product_archive_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-title' ).css( 'color', to );
            });
        });

        /* Product Archive Page Subtitle Color */
        pofo_customize( 'pofo_product_archive_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-subtitle' ).css( 'color', to );
            });
        });

        /* Product archive Breadcrumb BG Color */
        pofo_customize( 'pofo_product_archive_title_breadcrumb_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-breadcrumb' ).css( 'background', to );
            });
        });

        /* Product archive Breadcrumb Border Color */
        pofo_customize( 'pofo_product_archive_title_breadcrumb_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-breadcrumb' ).css( 'border-color', to );
            });
        });

        /* Product Archive Page Title Breadcrumb Color */
        pofo_customize( 'pofo_product_archive_title_breadcrumb_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_title_breadcrumb_color = to;
                $( '.pofo-product-archive-title-breadcrumb a, .pofo-product-archive-title-breadcrumb li' ).css( 'color', to );
                if( !$pofo_product_archive_title_breadcrumb_text_hover_color ){
                    pofo_customize( 'pofo_product_archive_title_breadcrumb_text_hover_color', function( value ) { 
                        $( '.pofo-product-archive-title-breadcrumb > li > a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_product_archive_title_breadcrumb_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Page Title Breadcrumb Hover Color */
        pofo_customize( 'pofo_product_archive_title_breadcrumb_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_title_breadcrumb_text_hover_color = to;
                $( '.pofo-product-archive-title-breadcrumb > li > a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_product_archive_title_breadcrumb_color );
                });
            });
        });

        /* Product Archive Icon BG Color */
        pofo_customize( 'pofo_product_archive_title_icon_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-title-bg .down-section i' ).css( 'background-color', to );
            });
        });

        /* Product Archive Icon Color */
        pofo_customize( 'pofo_product_archive_title_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-product-archive-title-bg .down-section i' ).css( 'color', to );
            });
        });

        /* Footer Copyright Text Color */
        pofo_customize( 'pofo_header_copyright_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-copyright-text' ).css( 'color', to );
            });
        });

        /* Footer Wrapper Padding Settings */
        pofo_customize( 'pofo_footer_wrapper_padding_setting', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-wrapper' ).css( 'padding', to );
            });
        });

        /* Footer Wrapper BG Color */
        pofo_customize( 'pofo_footer_wrapper_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-wrapper' ).css( 'background-color', to );
            });
        });

        /* Footer Wrapper text Color */
        pofo_customize( 'pofo_footer_wrapper_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-wrapper-text' ).css( 'color', to );
            });
        });

        /* Footer Padding Settings */
        pofo_customize( 'pofo_footer_padding_setting', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-widget-area' ).css( 'padding', to );
            });
        });

        /* Footer BG Color */
        pofo_customize( 'pofo_footer_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-widget-area' ).css( 'background-color', to );
            });
        });

        /* Footer Text Color */
        pofo_customize( 'pofo_footer_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-widget-area' ).css( 'color', to );
            });
        });

        /* Footer Link Color */
        pofo_customize( 'pofo_footer_link_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_link_color = to;
                $( '.footer-widget-area a' ).css( 'color', to );
                if( !$pofo_footer_link_hover_color ){
                    pofo_customize( 'pofo_footer_link_hover_color', function( value ) { 
                        $( '.footer-widget-area a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_footer_link_color );
                        });
                    });
                }
            });
        });

        /* Footer Link Hover Color */
        pofo_customize( 'pofo_footer_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_link_hover_color = to;
                $( '.footer-widget-area a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_footer_link_color );
                });
            });
        });

        /* Footer Border Color */
        pofo_customize( 'pofo_footer_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-widget-area .pofo-right-border-style' ).css( 'border-color', to );
            });
        });

        /* Footer Widget Title color */
        pofo_customize( 'pofo_footer_widget_title_color', function( value ) { 
            value.bind( function( to ) {
               $( 'footer .widget-title' ).css( 'color', to );
            });
        });

        /* Footer Padding Settings */
        pofo_customize( 'pofo_footer_bottom_padding_setting', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-bottom' ).css( 'padding', to );
            });
        });

        /* Footer Bottom BG Color */
        pofo_customize( 'pofo_footer_bottom_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-bottom' ).css( 'background-color', to );
            });
        });

        /* Footer Bottom Text Color */
        pofo_customize( 'pofo_footer_bottom_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-bottom' ).css( 'color', to );
            });
        });

        /* Footer Bottom Link Color */
        pofo_customize( 'pofo_footer_bottom_link_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_bottom_link_color = to;
                $( '.pofo-footer-bottom a' ).css( 'color', to );
                if( !$pofo_footer_bottom_link_hover_color ){
                    pofo_customize( 'pofo_footer_bottom_link_hover_color', function( value ) { 
                        $( '.footer-widget-area a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_footer_bottom_link_color );
                        });
                    });
                }
            });
        });

        /* Footer Bottom Link Hover Color */
        pofo_customize( 'pofo_footer_bottom_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_bottom_link_hover_color = to;
                $( '.pofo-footer-bottom a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_footer_bottom_link_color );
                });
            });
        });

        /* Footer Bottom Border Color */
        pofo_customize( 'pofo_footer_bottom_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-footer-bottom .footer-bottom' ).css( 'border-color', to );
            });
        });

        /* Footer Before Text Color */
        pofo_customize( 'pofo_footer_before_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.footer-before-text' ).css( 'color', to );
            });
        });

        
        /* Footer Social Icon Color */
        pofo_customize( 'pofo_footer_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_icon_color = to;
                $( '.social-icon-style-8 a.text-link-white i, .footer-social-icon a.text-link-white i' ).css( 'color', to );
                if( !$pofo_footer_icon_hover_color ){
                    pofo_customize( 'pofo_footer_social_icon_hover_color', function( value ) { 
                        $( '.social-icon-style-8 a.text-link-white, .footer-social-icon a.text-link-white' ).hover(function(){
                            $(this).find('i').css( 'color', '' );
                        }, function(){
                            $(this).find('i').css( 'color', $pofo_footer_icon_color );
                        });
                    });
                }
            });
        });

        /* Footer Social Icon Hover Color */
        pofo_customize( 'pofo_footer_social_icon_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_footer_icon_hover_color = to;
                $( '.social-icon-style-8 a.text-link-white, .footer-social-icon a.text-link-white' ).hover(function(){
                    $(this).find('i').css( 'color', to );
                }, function(){
                    $(this).find('i').css( 'color', $pofo_footer_icon_color );
                });
            });
        });

        /* Archive Box BG Color */
        pofo_customize( 'pofo_box_bg_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_box_bg_color_archive = to;
                $( '.pofo-box-background-color' ).css( 'background-color', to );
                if( !$pofo_box_bg_hover_color_archive ){
                    pofo_customize( 'pofo_box_bg_hover_color_archive', function( value ) { 
                        $( '.pofo-box-background-color' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_box_bg_color_archive );
                        });
                    });
                }
            });
        });

        /* Archive Box BG Hover Color */
        pofo_customize( 'pofo_box_bg_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_box_bg_hover_color_archive = to;
                $( '.pofo-box-background-color' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_box_bg_color_archive );
                });
            });
        });

        /* Archive Meta Color */
        pofo_customize( 'pofo_post_meta_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_post_meta_color = to;
                $( '.pofo-post-description .author .name a, .pofo-post-description .blog-separator, .pofo-post-description .pofo-blog-post-meta, .pofo-post-description .pofo-blog-post-meta a' ).css( 'color', to );
                if( !$pofo_archive_post_meta_hover_color ){
                    pofo_customize( 'pofo_post_meta_hover_color', function( value ) { 
                        $( '.pofo-post-description .author .name a, .pofo-post-description a.pofo-blog-post-meta, .pofo-post-description .pofo-blog-post-meta a, .pofo-post-description a.pofo-blog-post-meta' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_archive_post_meta_color );
                        });
                    });
                    $( '.pofo-post-description .author .name a, .pofo-post-description .blog-like-comment a' ).hover(function(){
                        $(this).find('i').css( 'color', to );
                    }, function(){
                        $(this).find('i').css( 'color', $pofo_archive_post_meta_color );
                    });
                }
            });
        });

        /* Archive Meta Hover Color */
        pofo_customize( 'pofo_post_meta_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_post_meta_hover_color = to;
                $( '.pofo-post-description .author .name a, .pofo-post-description a.pofo-blog-post-meta, .pofo-post-description .pofo-blog-post-meta a, .pofo-post-description a.pofo-blog-post-meta' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_archive_post_meta_color );
                });
                $( '.pofo-post-description .author .name a, .pofo-post-description .blog-like-comment a' ).hover(function(){
                    $(this).find('i').css( 'color', to );
                }, function(){
                    $(this).find('i').css( 'color', $pofo_archive_post_meta_color );
                });
            });
        });

        /* Archive Button Color */
        pofo_customize( 'pofo_button_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_button_color = to;
                $( '.pofo-post-description a.btn' ).css( 'background-color', to );
                if( !$pofo_archive_button_hover_color ){
                    pofo_customize( 'pofo_button_hover_color_archive', function( value ) { 
                        $( '.pofo-post-description a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_archive_button_color );
                        });
                    });
                }
            });
        });

        /* Archive Button Hover Color */
        pofo_customize( 'pofo_button_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_button_hover_color = to;
                $( '.pofo-post-description a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_archive_button_color );
                });
            });
        });

        /* Archive Button Text Color */
        pofo_customize( 'pofo_button_text_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_button_text_color = to;
                $( '.pofo-post-description a.btn' ).css( 'color', to );
                if( !$pofo_archive_button_text_hover_color ){
                    pofo_customize( 'pofo_button_hover_text_color_archive', function( value ) { 
                        $( '.pofo-post-description a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_archive_button_text_color );
                        });
                    });
                }
            });
        });

        /* Archive Button Text Hover Color */
        pofo_customize( 'pofo_button_hover_text_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_button_text_hover_color = to;
                $( '.pofo-post-description a.btn' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_archive_button_text_color );
                });
            });
        });

        /* Archive Button Border Color */
        pofo_customize( 'pofo_button_border_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description a.btn' ).css( 'border-color', to );
            });
        });

        /* Archive Title Color */
        pofo_customize( 'pofo_title_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_title_color = to;
                $( '.pofo-post-description .entry-title' ).css( 'color', to );
                if( !$pofo_archive_title_hover_color ){
                    pofo_customize( 'pofo_title_hover_color_archive', function( value ) { 
                        $( '.pofo-post-description .entry-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_archive_title_color );
                        });
                    });
                }
            });
        });

        /* Archive Title Hover Color */
        pofo_customize( 'pofo_title_hover_color_archive', function( value ) { 
            value.bind( function( to ) {
                $pofo_archive_title_hover_color = to;
                $( '.pofo-post-description .entry-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_archive_title_color );
                });
            });
        });

        /* Archive Content Color */
        pofo_customize( 'pofo_content_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description .entry-content' ).css( 'color', to );
            });
        });

        /* Archive Separator Color */
        pofo_customize( 'pofo_separator_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description .pofo-post-sepataror' ).css( 'background-color', to );
               $( '.pofo-list-border-archive' ).css( 'border-color', to );
            });
        });

        /* Archive Border Color */
        pofo_customize( 'pofo_box_border_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description' ).css( 'border-color', to );
            });
        });

        /* Archive Border Type */
        pofo_customize( 'pofo_box_border_type_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description' ).css( 'border-style', to );
            });
        });

        /* Archive Border Size */
        pofo_customize( 'pofo_box_border_size_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-post-description' ).css( 'border-width', to );
            });
        });

        /* Archive Overlay Color */
        pofo_customize( 'pofo_overlay_color_archive', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-archive .blog-post-images, .grid-item.blog-post-style-archive .blog-img' ).css( 'background-color', to );
            });
        });

        /* Single Page Tag, Like Color */
        pofo_customize( 'pofo_post_tag_like_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_post_tag_like_color = to;
                $( '.pofo-post-detail-icon a, .tag-cloud a' ).css( 'color', to );
                $( '.pofo-post-detail-icon a, .tag-cloud a' ).css( 'border-color', to );
                if( !$pofo_post_tag_like_hover_color ){
                    pofo_customize( 'pofo_post_tag_like_hover_color', function( value ) { 
                        $( '.pofo-post-detail-icon a, .tag-cloud a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_post_tag_like_color );
                            $(this).css( 'border-color', $pofo_post_tag_like_color );
                        });
                    });
                }
            });
        });

        /* Single Page Tag, Like Hover Color */
        pofo_customize( 'pofo_post_tag_like_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_post_tag_like_hover_color = to;
                $( '.pofo-post-detail-icon a, .tag-cloud a' ).hover(function(){
                    $(this).css( 'color', to );
                    $(this).css( 'border-color', to );
                }, function(){
                    $(this).css( 'color', $pofo_post_tag_like_color );
                    $(this).css( 'border-color', $pofo_post_tag_like_color );
                });
            });
        });

        /* Author Box Background Color */
        pofo_customize( 'pofo_post_author_box_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-author-box' ).css( 'background', to );
            });
        });

        /* Author Title Color */
        pofo_customize( 'pofo_post_author_title_text_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_post_author_title_text_color = to;
                $( 'a.pofo-author-title' ).css( 'color', to );
                if( !$pofo_post_author_title_text_hover_color ){
                    pofo_customize( 'pofo_post_author_title_text_hover_color', function( value ) { 
                        $( 'a.pofo-author-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_post_author_title_text_color );
                        });
                    });
                }
            });
        });

        /* Author Title Hover Color */
        pofo_customize( 'pofo_post_author_title_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_post_author_title_text_hover_color = to;
                $( 'a.pofo-author-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_post_author_title_text_color );
                });
            });
        });

        /* Author Box Content Color */
        pofo_customize( 'pofo_post_author_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-author-content' ).css( 'color', to );
            });
        });

        /* Post Meta Color */
        pofo_customize( 'pofo_single_post_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_post_meta_text_color = to;
                $( '.pofo-single-post-title-breadcrumb-single li, .pofo-single-post-title-breadcrumb-single span, .pofo-single-post-title-breadcrumb-single li span, .pofo-single-post-title-breadcrumb-single li a' ).css( 'color', to );
                if( !$pofo_single_post_meta_text_hover_color ){
                    pofo_customize( 'pofo_single_post_meta_text_hover_color', function( value ) { 
                        $( '.pofo-single-post-title-breadcrumb-single li a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_post_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Post Meta Hover Color */
        pofo_customize( 'pofo_single_post_meta_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_post_meta_text_hover_color = to;
                $( '.pofo-single-post-title-breadcrumb-single li a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_post_meta_text_color );
                });
            });
        });

        /* Default Box BG Color */
        pofo_customize( 'pofo_box_bg_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_box_bg_color_default = to;
                $( '.pofo-default-box-background-color' ).css( 'background-color', to );
                if( !$pofo_box_bg_hover_color_default ){
                    pofo_customize( 'pofo_box_bg_hover_color_default', function( value ) { 
                        $( '.pofo-default-box-background-color' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_box_bg_color_default );
                        });
                    });
                }
            });
        });

        /* Default Box BG Hover Color */
        pofo_customize( 'pofo_box_bg_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_box_bg_hover_color_default = to;
                $( '.pofo-default-box-background-color' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_box_bg_color_default );
                });
            });
        });

        /* Default Meta Color */
        pofo_customize( 'pofo_post_meta_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_post_meta_color = to;
                $( '.pofo-default-post-description .author .name a, .pofo-default-post-description .blog-separator, .pofo-default-post-description .pofo-blog-post-meta, .pofo-default-post-description .pofo-blog-post-meta a' ).css( 'color', to );
                if( !$pofo_default_post_meta_hover_color ){
                    pofo_customize( 'pofo_post_meta_hover_color', function( value ) { 
                        $( '.pofo-default-post-description .author .name a, .pofo-default-post-description a.pofo-blog-post-meta, .pofo-default-post-description .pofo-blog-post-meta a, .pofo-default-post-description a.pofo-blog-post-meta' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_post_meta_color );
                        });
                    });
                    $( '.pofo-default-post-description .author .name a, .pofo-default-post-description .blog-like-comment a' ).hover(function(){
                        $(this).find('i').css( 'color', to );
                    }, function(){
                        $(this).find('i').css( 'color', $pofo_default_post_meta_color );
                    });
                }
            });
        });

        /* Default Meta Hover Color */
        pofo_customize( 'pofo_post_meta_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_post_meta_hover_color = to;
                $( '.pofo-default-post-description .author .name a, .pofo-default-post-description a.pofo-blog-post-meta, .pofo-default-post-description .pofo-blog-post-meta a, .pofo-default-post-description a.pofo-blog-post-meta' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_post_meta_color );
                });
                $( '.pofo-default-post-description .author .name a, .pofo-default-post-description .blog-like-comment a' ).hover(function(){
                    $(this).find('i').css( 'color', to );
                }, function(){
                    $(this).find('i').css( 'color', $pofo_default_post_meta_color );
                });
            });
        });

        /* Default Button Color */
        pofo_customize( 'pofo_button_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_button_color = to;
                $( '.pofo-default-post-description a.btn' ).css( 'background-color', to );
                if( !$pofo_default_button_hover_color ){
                    pofo_customize( 'pofo_button_hover_color_default', function( value ) { 
                        $( '.pofo-default-post-description a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_default_button_color );
                        });
                    });
                }
            });
        });

        /* Default Button Hover Color */
        pofo_customize( 'pofo_button_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_button_hover_color = to;
                $( '.pofo-default-post-description a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_default_button_color );
                });
            });
        });

        /* Default Button Text Color */
        pofo_customize( 'pofo_button_text_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_button_text_color = to;
                $( '.pofo-default-post-description a.btn' ).css( 'color', to );
                if( !$pofo_default_button_text_hover_color ){
                    pofo_customize( 'pofo_button_hover_text_color_default', function( value ) { 
                        $( '.pofo-default-post-description a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_button_text_color );
                        });
                    });
                }
            });
        });

        /* Default Button Text Hover Color */
        pofo_customize( 'pofo_button_hover_text_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_button_text_hover_color = to;
                $( '.pofo-default-post-description a.btn' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_button_text_color );
                });
            });
        });

        /* Default Button Border Color */
        pofo_customize( 'pofo_button_border_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description a.btn' ).css( 'border-color', to );
            });
        });

        /* Default Title Color */
        pofo_customize( 'pofo_title_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_title_color = to;
                $( '.pofo-default-post-description .entry-title' ).css( 'color', to );
                if( !$pofo_default_title_hover_color ){
                    pofo_customize( 'pofo_title_hover_color_default', function( value ) { 
                        $( '.pofo-default-post-description .entry-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_default_title_color );
                        });
                    });
                }
            });
        });

        /* Default Title Hover Color */
        pofo_customize( 'pofo_title_hover_color_default', function( value ) { 
            value.bind( function( to ) {
                $pofo_default_title_hover_color = to;
                $( '.pofo-default-post-description .entry-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_default_title_color );
                });
            });
        });

        /* Default Content Color */
        pofo_customize( 'pofo_content_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description .entry-content' ).css( 'color', to );
            });
        });

        /* Default Separator Color */
        pofo_customize( 'pofo_separator_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description .pofo-post-sepataror' ).css( 'background-color', to );
               $( '.pofo-list-border-default' ).css( 'border-color', to );
            });
        });

        /* Default Border Color */
        pofo_customize( 'pofo_box_border_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description' ).css( 'border-color', to );
            });
        });

        /* Default Border Type */
        pofo_customize( 'pofo_box_border_type_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description' ).css( 'border-style', to );
            });
        });

        /* Default Border Size */
        pofo_customize( 'pofo_box_border_size_default', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-default-post-description' ).css( 'border-width', to );
            });
        });

        /* Default Overlay Color */
        pofo_customize( 'pofo_overlay_color_default', function( value ) { 
            value.bind( function( to ) {
               $( '.blog-post.blog-post-style-default .blog-post-images, .grid-item.blog-post-style-default .blog-img' ).css( 'background-color', to );
            });
        });

        /* Sticky Post Bg Color */
        pofo_customize( 'pofo_box_bg_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-box-background-color' ).css( 'background-color', to );
            });
        });

        /* Sticky Meta Color */
        pofo_customize( 'pofo_post_meta_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_post_meta_color = to;
                $( '.pofo-sticky-post-description .author .name a, .pofo-sticky-post-description .blog-separator, .pofo-sticky-post-description .pofo-blog-post-meta, .pofo-sticky-post-description .pofo-blog-post-meta a' ).css( 'color', to );
                if( !$pofo_sticky_post_meta_hover_color ){
                    pofo_customize( 'pofo_post_meta_hover_color', function( value ) { 
                        $( '.pofo-sticky-post-description .author .name a, .pofo-sticky-post-description a.pofo-blog-post-meta, .pofo-sticky-post-description .pofo-blog-post-meta a, .pofo-sticky-post-description a.pofo-blog-post-meta' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_sticky_post_meta_color );
                        });
                    });
                    $( '.pofo-sticky-post-description .author .name a, .pofo-sticky-post-description .blog-like-comment a' ).hover(function(){
                        $(this).find('i').css( 'color', to );
                    }, function(){
                        $(this).find('i').css( 'color', $pofo_sticky_post_meta_color );
                    });
                }
            });
        });

        /* Sticky Meta Hover Color */
        pofo_customize( 'pofo_post_meta_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_post_meta_hover_color = to;
                $( '.pofo-sticky-post-description .author .name a, .pofo-sticky-post-description a.pofo-blog-post-meta, .pofo-sticky-post-description .pofo-blog-post-meta a, .pofo-sticky-post-description a.pofo-blog-post-meta' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_sticky_post_meta_color );
                });
                $( '.pofo-sticky-post-description .author .name a, .pofo-sticky-post-description .blog-like-comment a' ).hover(function(){
                    $(this).find('i').css( 'color', to );
                }, function(){
                    $(this).find('i').css( 'color', $pofo_sticky_post_meta_color );
                });
            });
        });

        /* Sticky Button Color */
        pofo_customize( 'pofo_button_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_button_color = to;
                $( '.pofo-sticky-post-description a.btn' ).css( 'background-color', to );
                if( !$pofo_sticky_button_hover_color ){
                    pofo_customize( 'pofo_button_hover_color_sticky', function( value ) { 
                        $( '.pofo-sticky-post-description a.btn' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_sticky_button_color );
                        });
                    });
                }
            });
        });

        /* Sticky Button Hover Color */
        pofo_customize( 'pofo_button_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_button_hover_color = to;
                $( '.pofo-sticky-post-description a.btn' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_sticky_button_color );
                });
            });
        });

        /* Sticky Button Text Color */
        pofo_customize( 'pofo_button_text_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_button_text_color = to;
                $( '.pofo-sticky-post-description a.btn' ).css( 'color', to );
                if( !$pofo_sticky_button_text_hover_color ){
                    pofo_customize( 'pofo_button_hover_text_color_sticky', function( value ) { 
                        $( '.pofo-sticky-post-description a.btn' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_sticky_button_text_color );
                        });
                    });
                }
            });
        });

        /* Sticky Button Text Hover Color */
        pofo_customize( 'pofo_button_hover_text_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_button_text_hover_color = to;
                $( '.pofo-sticky-post-description a.btn' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_sticky_button_text_color );
                });
            });
        });

        /* Sticky Button Border Color */
        pofo_customize( 'pofo_button_border_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description a.btn' ).css( 'border-color', to );
            });
        });

        /* Sticky Title Color */
        pofo_customize( 'pofo_title_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_title_color = to;
                $( '.pofo-sticky-post-description .entry-title' ).css( 'color', to );
                if( !$pofo_sticky_title_hover_color ){
                    pofo_customize( 'pofo_title_hover_color_sticky', function( value ) { 
                        $( '.pofo-sticky-post-description .entry-title' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_sticky_title_color );
                        });
                    });
                }
            });
        });

        /* Sticky Title Hover Color */
        pofo_customize( 'pofo_title_hover_color_sticky', function( value ) { 
            value.bind( function( to ) {
                $pofo_sticky_title_hover_color = to;
                $( '.pofo-sticky-post-description .entry-title' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_sticky_title_color );
                });
            });
        });

        /* Sticky Content Color */
        pofo_customize( 'pofo_content_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description .entry-content' ).css( 'color', to );
            });
        });

        /* Sticky Separator Color */
        pofo_customize( 'pofo_separator_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description .pofo-post-sepataror' ).css( 'background-color', to );
            });
        });

        /* Sticky Border Color */
        pofo_customize( 'pofo_box_border_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description' ).css( 'border-color', to );
            });
        });

        /* Sticky Border Type */
        pofo_customize( 'pofo_box_border_type_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description' ).css( 'border-style', to );
            });
        });

        /* Sticky Border Size */
        pofo_customize( 'pofo_box_border_size_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description' ).css( 'border-width', to );
            });
        });

        /* Sticky Meta Border Color */
        pofo_customize( 'pofo_meta_border_color_sticky', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-sticky-post-description .border-color-medium-gray' ).css( 'border-color', to );
            });
        });

        /* 404 Page content BG Color */
        pofo_customize( 'pofo_404_content_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-404-content-bg' ).css( 'background-color', to );
            });
        });

        /* 404 Page Title Color */
        pofo_customize( 'pofo_404_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-404-title' ).css( 'color', to );
            });
        });

        /* 404 Page Subtitle Color */
        pofo_customize( 'pofo_404_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-404-subtitle' ).css( 'color', to );
            });
        });

        /* 404 Page Content Color */
        pofo_customize( 'pofo_404_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-404-content' ).css( 'color', to );
            });
        });

        /* 404 Page Content Color */
        pofo_customize( 'pofo_404_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-404-bg-color' ).css( 'background-color', to );
            });
        });

        /* For Scroll to Top Button Start */

        /* Scroll to Top Button Color */
        pofo_customize( 'pofo_hide_scroll_to_top_button_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_hide_scroll_to_top_button_color = to;
                $( '.scroll-top-arrow' ).css( 'color', to );

                if( !$pofo_hide_scroll_to_top_button_hover_color ){
                    pofo_customize( 'pofo_hide_scroll_to_top_button_hover_color', function( value ) { 
                        $( '.scroll-top-arrow' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_hide_scroll_to_top_button_color );
                        });
                    });
                }
            });
        });

        /* Scroll to Top Button Hover Color */
        pofo_customize( 'pofo_hide_scroll_to_top_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_hide_scroll_to_top_button_hover_color = to;
                $( '.scroll-top-arrow' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_hide_scroll_to_top_button_color );
                });
            });
        });

        /* Scroll to Top Button BG Color */
        pofo_customize( 'pofo_hide_scroll_to_top_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_hide_scroll_to_top_button_bg_color = to;
                $( '.scroll-top-arrow' ).css( 'background-color', to );

                if( !$pofo_hide_scroll_to_top_button_hover_bg_color ){
                    pofo_customize( 'pofo_hide_scroll_to_top_button_hover_bg_color', function( value ) { 
                        $( '.scroll-top-arrow' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_hide_scroll_to_top_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Scroll to Top Button BG Hover Color */
        pofo_customize( 'pofo_hide_scroll_to_top_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_hide_scroll_to_top_button_hover_bg_color = to;
                $( '.scroll-top-arrow' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_hide_scroll_to_top_button_bg_color );
                });
            });
        });

        /* For Comment Title Color */
        pofo_customize( 'pofo_general_comment_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.comment-title' ).css( 'color', to );
            });
        });

        /* For H1 Color */
        pofo_customize( 'pofo_heading_h1_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h1' ).css( 'color', to );
            });
        });

        /* For H2 Color */
        pofo_customize( 'pofo_heading_h2_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h2' ).css( 'color', to );
            });
        });

        /* For H3 Color */
        pofo_customize( 'pofo_heading_h3_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h3' ).css( 'color', to );
            });
        });

        /* For H4 Color */
        pofo_customize( 'pofo_heading_h4_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h4' ).css( 'color', to );
            });
        });

        /* For H5 Color */
        pofo_customize( 'pofo_heading_h5_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h5' ).css( 'color', to );
            });
        });

        /* For H6 Color */
        pofo_customize( 'pofo_heading_h6_color', function( value ) { 
            value.bind( function( to ) {
               $( 'h6' ).css( 'color', to );
            });
        });

        /* Portfolio Single Share Box BG Color */
        pofo_customize( 'pofo_single_portfolio_share_box_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-sharebox' ).css( 'background-color', to );
            });
        });

        /* Portfolio Single Share Box Title Color */
        pofo_customize( 'pofo_single_portfolio_share_box_title_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-sharebox-title' ).css( 'color', to );
            });
        });

        /* Portfolio Single Related BG Color */
        pofo_customize( 'pofo_related_single_portfolio_box_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-single-portfolio' ).css( 'background-color', to );
            });
        });

        /* Portfolio Single Related Title Color */
        pofo_customize( 'pofo_related_single_portfolio_title_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-portfolio-title' ).css( 'color', to );
            });
        });

        /* Portfolio Single Related Content Color */
        pofo_customize( 'pofo_related_single_portfolio_content_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-related-portfolio-content' ).css( 'color', to );
            });
        });

        /* Portfolio Single Navigation BG Color */
        pofo_customize( 'pofo_navigation_single_portfolio_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.portfolio-navigation-wrapper' ).css( 'background-color', to );
            });
        });

        /* Portfolio Single Navigation Text Color */
        pofo_customize( 'pofo_navigation_single_portfolio_text_color', function( value ) { 
            value.bind( function( to ) {
               $( '.portfolio-navigation-text' ).css( 'color', to );
            });
        });

        /* Portfolio Single Navigation Link Color */
        pofo_customize( 'pofo_navigation_single_portfolio_link_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_navigation_single_portfolio_link_color = to;
                $( '.portfolio-navigation-wrapper a' ).css( 'color', to );
                if( !$pofo_hide_navigation_single_portfolio_link_hover_color ){
                    pofo_customize( 'pofo_hide_navigation_single_portfolio_link_hover_color', function( value ) { 
                        $( '.portfolio-navigation-wrapper a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_navigation_single_portfolio_link_color );
                        });
                    });
                }
            });
        });

        /* Portfolio Single Navigation Link Hover Color */
        pofo_customize( 'pofo_hide_navigation_single_portfolio_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_hide_navigation_single_portfolio_link_hover_color = to;
                $( '.portfolio-navigation-wrapper a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_navigation_single_portfolio_link_color );
                });
            });
        });

        /* Portfolio Meta Color */
        pofo_customize( 'pofo_single_portfolio_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_portfolio_meta_text_color = to;
                $( '.pofo-single-portfolio-title-breadcrumb-single li, .pofo-single-portfolio-title-breadcrumb-single span, .pofo-single-portfolio-title-breadcrumb-single li span, .pofo-single-portfolio-title-breadcrumb-single li a' ).css( 'color', to );
                if( !$pofo_single_portfolio_meta_text_hover_color ){
                    pofo_customize( 'pofo_single_portfolio_meta_text_hover_color', function( value ) { 
                        $( '.pofo-single-portfolio-title-breadcrumb-single li a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_portfolio_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Portfolio Meta Hover Color */
        pofo_customize( 'pofo_single_portfolio_meta_text_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_portfolio_meta_text_hover_color = to;
                $( '.pofo-single-portfolio-title-breadcrumb-single li a' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_portfolio_meta_text_color );
                });
            });
        });

        pofo_customize( 'pofo_single_portfolio_meta_text_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_portfolio_meta_text_color = to;
                $( '.pofo-single-portfolio-title-breadcrumb-single li, .pofo-single-portfolio-title-breadcrumb-single span, .pofo-single-portfolio-title-breadcrumb-single li span, .pofo-single-portfolio-title-breadcrumb-single li a' ).css( 'color', to );
                if( !$pofo_single_portfolio_meta_text_hover_color ){
                    pofo_customize( 'pofo_single_portfolio_meta_text_hover_color', function( value ) { 
                        $( '.pofo-single-portfolio-title-breadcrumb-single li a' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_portfolio_meta_text_color );
                        });
                    });
                }
            });
        });

        /* Portfolio Archive Title Color */
        pofo_customize( 'pofo_portfolio_archive_page_title_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_portfolio_archive_page_title_color = to;
                $( '.pofo-portfolio-archive-page-title' ).css( 'color', to );
                if( !$pofo_portfolio_archive_page_title_hover_color ){
                    pofo_customize( 'pofo_portfolio_archive_page_title_hover_color', function( value ) { 
                        $( '.hover-option11 .grid-item > a' ).hover(function(){
                            $(this).find('.pofo-portfolio-archive-page-title').css( 'color', '' );
                        }, function(){
                            $(this).find('.pofo-portfolio-archive-page-title').css( 'color', $pofo_portfolio_archive_page_title_color );
                        });
                    });
                }
            });
        });

        /* Portfolio Archive Title Hover Color */
        pofo_customize( 'pofo_portfolio_archive_page_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_portfolio_archive_page_title_hover_color = to;
                $( '.hover-option11 .grid-item > a' ).hover(function(){
                    $(this).find('.pofo-portfolio-archive-page-title').css( 'color', to );
                }, function(){
                    $(this).find('.pofo-portfolio-archive-page-title').css( 'color', $pofo_portfolio_archive_page_title_color );
                });
            });
        });

        /* Portfolio Archive Subtitle Color */
        pofo_customize( 'pofo_portfolio_archive_page_subtitle_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-page-subtitle' ).css( 'color', to );
            });
        });

        /* Portfolio Archive Separator Color */
        pofo_customize( 'pofo_portfolio_archive_page_separator_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-page-separator' ).css( 'background-color', to );
            });
        });

        /* Portfolio Archive Box Background Color */
        pofo_customize( 'pofo_portfolio_archive_page_box_hover_background_color', function( value ) { 
            value.bind( function( to ) {
                $( '.pofo-portfolio-archive-page-background' ).css( 'background-color', to );
                $( '.hover-option5 .grid-item' ).hover(function(){
                    $(this).find('.pofo-portfolio-archive-page-background').css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', '' );
                });
                $( '.hover-option8 .grid-item figure' ).hover(function(){
                    $(this).find('figcaption .pofo-portfolio-archive-page-background').css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', '' );
                });
            });
        });

        /* Portfolio Archive Icon Color */
        pofo_customize( 'pofo_portfolio_archive_page_icon_color', function( value ) { 
            value.bind( function( to ) {
               $( '.pofo-portfolio-archive-page-icon' ).css( 'color', to );
            });
        });

        /* Product Archive Product Sale Color */
        pofo_customize( 'pofo_product_archive_product_sale_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .onsale' ).css( 'color', to );
            });
        });

        /* Product Archive Product Sale Background Color */
        pofo_customize( 'pofo_product_archive_product_sale_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .onsale' ).css( 'background-color', to );
            });
        });

        /* Product Archive Product Sale Border Color */
        pofo_customize( 'pofo_product_archive_product_sale_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .onsale' ).css( 'border-color', to );
            });
        });

        /* Product Archive Product Title Color */
        pofo_customize( 'pofo_product_archive_product_title_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_title_color = to;
                $( '.woocommerce ul.products li.product .woocommerce-loop-product__title' ).css( 'color', to );
                if( !$pofo_product_archive_product_title_hover_color ){
                    pofo_customize( 'pofo_product_archive_product_title_hover_color', function( value ) { 
                        $( '.woocommerce ul.products li.product a' ).hover(function(){
                            $(this).find('.woocommerce-loop-product__title').css( 'color', '' );
                        }, function(){
                            $(this).find('.woocommerce-loop-product__title').css( 'color', $pofo_product_archive_product_title_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Title Hover Color */
        pofo_customize( 'pofo_product_archive_product_title_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_title_hover_color = to;
                $( '.woocommerce ul.products li.product a' ).hover(function(){
                    $(this).find('.woocommerce-loop-product__title').css( 'color', to );
                }, function(){
                    $(this).find('.woocommerce-loop-product__title').css( 'color', $pofo_product_archive_product_title_color );
                });
            });
        });

        /* Product Archive Product Rating Star Color */
        pofo_customize( 'pofo_product_archive_product_rating_star_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .star-rating span' ).css( 'color', to );
            });
        });

        /* Product Archive Product Price Color */
        pofo_customize( 'pofo_product_archive_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins' ).css( 'color', to );
            });
        });

        /* Product Archive Product Price Color */
        pofo_customize( 'pofo_product_archive_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product .price del' ).css( 'color', to );
            });
        });

        /* Product Archive Product Button Color */
        pofo_customize( 'pofo_product_archive_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_button_color = to;
                $( '.woocommerce ul.products li.product a.button' ).css( 'color', to );

                if( !$pofo_product_archive_product_button_hover_color ){
                    pofo_customize( 'pofo_product_archive_product_button_hover_color', function( value ) { 
                        $( '.woocommerce ul.products li.product a.button' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_product_archive_product_button_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Button Hover Color */
        pofo_customize( 'pofo_product_archive_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_button_hover_color = to;
                $( '.woocommerce ul.products li.product a.button' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_product_archive_product_button_color );
                });
            });
        });

        /* Product Archive Product Button BG Color */
        pofo_customize( 'pofo_product_archive_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_button_bg_color = to;
                $( '.woocommerce ul.products li.product a.button' ).css( 'background-color', to );

                if( !$pofo_product_archive_product_button_hover_bg_color ){
                    pofo_customize( 'pofo_product_archive_product_button_hover_bg_color', function( value ) { 
                        $( '.woocommerce ul.products li.product a.button' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_product_archive_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Product Archive Product Button BG Hover Color */
        pofo_customize( 'pofo_product_archive_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_product_archive_product_button_hover_bg_color = to;
                $( '.woocommerce ul.products li.product a.button' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_product_archive_product_button_bg_color );
                });
            });
        });

        /* Product Archive Product Button Border Color */
        pofo_customize( 'pofo_product_archive_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.woocommerce ul.products li.product a.button' ).css( 'border-color', to );
            });
        });

        /* Single Product Sale Color */
        pofo_customize( 'pofo_single_product_sale_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product > .onsale' ).css( 'color', to );
            });
        });

        /* Single Product Sale Background Color */
        pofo_customize( 'pofo_single_product_sale_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product > .onsale' ).css( 'background-color', to );
            });
        });

        /* Single Product Sale Border Color */
        pofo_customize( 'pofo_single_product_sale_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product > .onsale' ).css( 'border-color', to );
            });
        });

        /* Single Product Title Color */
        pofo_customize( 'pofo_single_product_page_title_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .product_title' ).css( 'color', to );
            });
        });

        /* Single Product Rating Star Color */
        pofo_customize( 'pofo_single_product_rating_star_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .star-rating span' ).css( 'color', to );
            });
        });

        /* Single Product Price Color */
        pofo_customize( 'pofo_single_product_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .price, .single-product .product .summary .price ins' ).css( 'color', to );
            });
        });

        /* Single Product Price Color */
        pofo_customize( 'pofo_single_product_regular_price_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .price del' ).css( 'color', to );
            });
        });

        /* Single Product Short Description Color */
        pofo_customize( 'pofo_single_product_short_description_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .woocommerce-product-details__short-description' ).css( 'color', to );
            });
        });

        /* Single Product Stock Color */
        pofo_customize( 'pofo_single_product_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.in-stock' ).css( 'color', to );
            });
        });

        /* Single Product Out Of Stock Color */
        pofo_customize( 'pofo_single_product_out_of_stock_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.out-of-stock' ).css( 'color', to );
            });
        });

        /* Single Product Stock Background Color */
        pofo_customize( 'pofo_single_product_stock_bg_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock' ).css( 'background-color', to );
            });
        });

        /* Single Product Stock Border Color */
        pofo_customize( 'pofo_single_product_stock_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.in-stock' ).css( 'border-color', to );
            });
        });

        /* Single Product Out Of Stock Border Color */
        pofo_customize( 'pofo_single_product_out_of_stock_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .stock.out-of-stock' ).css( 'border-color', to );
            });
        });

        /* Single Product Button Color */
        pofo_customize( 'pofo_single_product_button_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_button_color = to;
                $( '.single-product .product .summary .button' ).css( 'color', to );

                if( !$pofo_single_product_button_hover_color ){
                    pofo_customize( 'pofo_single_product_button_hover_color', function( value ) { 
                        $( '.single-product .product .summary .button' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_product_button_color );
                        });
                    });
                }
            });
        });

        /* Single Product Button Hover Color */
        pofo_customize( 'pofo_single_product_button_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_button_hover_color = to;
                $( '.single-product .product .summary .button' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_product_button_color );
                });
            });
        });

        /* Single Product Button BG Color */
        pofo_customize( 'pofo_single_product_button_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_button_bg_color = to;
                $( '.single-product .product .summary .button' ).css( 'background-color', to );

                if( !$pofo_single_product_button_hover_bg_color ){
                    pofo_customize( 'pofo_single_product_button_hover_bg_color', function( value ) { 
                        $( '.single-product .product .summary .button' ).hover(function(){
                            $(this).css( 'background-color', '' );
                        }, function(){
                            $(this).css( 'background-color', $pofo_single_product_button_bg_color );
                        });
                    });
                }
            });
        });

        /* Single Product Button BG Hover Color */
        pofo_customize( 'pofo_single_product_button_hover_bg_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_button_hover_bg_color = to;
                $( '.single-product .product .summary .button' ).hover(function(){
                    $(this).css( 'background-color', to );
                }, function(){
                    $(this).css( 'background-color', $pofo_single_product_button_bg_color );
                });
            });
        });

        /* Single Product Button Border Color */
        pofo_customize( 'pofo_single_product_button_border_color', function( value ) { 
            value.bind( function( to ) {
               $( '.single-product .product .summary .button' ).css( 'border-color', to );
            });
        });

        /* Single Product Meta Heading Color */
        pofo_customize( 'pofo_single_product_page_meta_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .product_meta' ).css( 'color', to );
            });
        });

        /* Single Product Meta Social Icon Color */
        pofo_customize( 'pofo_single_product_page_meta_social_icon_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .product_meta .products-social-icon a' ).css( 'color', to );
            });
        });

        /* Single Product Meta Color */
        pofo_customize( 'pofo_single_product_page_meta_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .summary .product_meta .sku, , .woocommerce div.product form.cart .variations label' ).css( 'color', to );
            });
        });

        /* Single Product Meta Color */
        pofo_customize( 'pofo_single_product_page_meta_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_page_meta_color = to;
                $( '.single-product .product .summary .product_meta a, .woocommerce div.product form.cart .reset_variations' ).css( 'color', to );

                if( !$pofo_single_product_page_meta_link_hover_color ){
                    pofo_customize( 'pofo_single_product_page_meta_link_hover_color', function( value ) { 
                        $( '.single-product .product .summary .product_meta a, .woocommerce div.product form.cart .reset_variations' ).hover(function(){
                            $(this).css( 'color', '' );
                        }, function(){
                            $(this).css( 'color', $pofo_single_product_page_meta_color );
                        });
                    });
                }
            });
        });

        /* Single Product Meta Link Hover Color */
        pofo_customize( 'pofo_single_product_page_meta_link_hover_color', function( value ) { 
            value.bind( function( to ) {
                $pofo_single_product_page_meta_link_hover_color = to;
                $( '.single-product .product .summary .product_meta a, .woocommerce div.product form.cart .reset_variations' ).hover(function(){
                    $(this).css( 'color', to );
                }, function(){
                    $(this).css( 'color', $pofo_single_product_page_meta_color );
                });
            });
        });

        /* Single Product Tab Color */
        pofo_customize( 'pofo_single_product_page_tab_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .woocommerce-tabs ul.tabs li a' ).css( 'color', to );
            });
        });

        /* Single Product Active Tab Color */
        pofo_customize( 'pofo_single_product_page_tab_active_color', function( value ) { 
            value.bind( function( to ) {
                $( '.single-product .product .woocommerce-tabs ul.tabs li.active a' ).css( 'color', to );
                $( '.single-product .product .woocommerce-tabs ul.tabs li.active' ).css( 'border-top-color', to );
            });
        });

        /* Single Product Related Product Heading Color */
        pofo_customize( 'pofo_single_product_related_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce .related > h2' ).css( 'color', to );
            });
        });

        /* Single Product Up Sells Product Heading Color */
        pofo_customize( 'pofo_single_product_up_sells_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce .up-sells > h2' ).css( 'color', to );
            });
        });

        /* Single Product Cross Sells Product Heading Color */
        pofo_customize( 'pofo_single_product_cross_sells_product_heading_color', function( value ) { 
            value.bind( function( to ) {
                $( '.woocommerce .cross-sells > h2' ).css( 'color', to );
            });
        });

    });

}(jQuery);