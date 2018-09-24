<?php
    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check if 404 page image set ot not */
    $pofo_image = pofo_get_image_id_by_url( get_theme_mod( 'pofo_page_not_found_image', '' ) );
    $pofo_title_image_srcset = get_theme_mod('pofo_page_not_found_title_image_srcset', 'full');
    $pofo_srcset = $pofo_srcset_data = $pofo_srcset_classes = '';
    $pofo_srcset = wp_get_attachment_image_srcset( $pofo_image, $pofo_title_image_srcset );
    if( $pofo_srcset ){
        $pofo_srcset_data = ' data-bg-srcset="'.esc_attr( $pofo_srcset ).'"';
        $pofo_srcset_classes = ' bg-image-srcset';
    }
    $pofo_image_url = wp_get_attachment_image_src($pofo_image, $pofo_title_image_srcset);
    $pofo_page_not_found_image = ( $pofo_image_url[0] ) ? ' style="background-image:url('.esc_url( $pofo_image_url[0] ).');"': '';

    $pofo_image_bg_class = ( $pofo_image ) ? ' cover-background': '';
    /* Get 404 page title */
    $pofo_page_not_found_title = get_theme_mod( 'pofo_page_not_found_title', '404!' );
    /* Get 404 page title text transform */
    $pofo_page_not_found_title_text_transform = get_theme_mod( 'pofo_page_not_found_title_text_transform', 'text-uppercase' );
    /* Get 404 page subtitle */
    $pofo_page_not_found_subtitle = get_theme_mod( 'pofo_page_not_found_subtitle', 'Page Not Found' );
    /* Get 404 page subtitle text transform */
    $pofo_page_not_found_subtitle_text_transform = get_theme_mod( 'pofo_page_not_found_subtitle_text_transform', 'text-uppercase' );
    /* Get 404 page content */
    $pofo_page_not_found_content = get_theme_mod( 'pofo_page_not_found_content', '' );
    /* Check if button hide / show */
    $pofo_page_not_found_button = get_theme_mod( 'pofo_page_not_found_button', '1' ); 
    /* Get button text */
    $pofo_page_not_found_button_text = get_theme_mod( 'pofo_page_not_found_button_text', 'Go to home page' );
    /* Get button url */
    $pofo_page_not_found_button_url = get_theme_mod( 'pofo_page_not_found_button_url', home_url('/') );
    /* Check if search hide / show */
    $pofo_page_not_found_search = get_theme_mod( 'pofo_page_not_found_search', '1' );
    /* Check if search placeholder text */
    $pofo_search_placeholder_text = get_theme_mod( 'pofo_search_placeholder_text', 'Enter your keywords...' );

    $pofo_page_not_found_title_text_transform = ( $pofo_page_not_found_title_text_transform ) ? ' '.$pofo_page_not_found_title_text_transform : '';
    $pofo_page_not_found_subtitle_text_transform = ( $pofo_page_not_found_subtitle_text_transform ) ? ' '.$pofo_page_not_found_subtitle_text_transform : '';

    echo '<section id="home" class="no-padding mobile-height wow fadeIn'.$pofo_image_bg_class.$pofo_srcset_classes.'"'.$pofo_page_not_found_image.$pofo_srcset_data.'>';
        echo '<div class="opacity-full bg-extra-dark-gray pofo-404-bg-color"></div>';
        echo '<div class="container position-relative full-screen">';
            echo '<div class="slider-typography text-center padding-85px-tb xs-no-padding-lr">';
                echo '<div class="slider-text-middle-main">';
                    echo '<div class="slider-text-middle">';
                        echo '<div class="bg-black-opacity-light width-50 center-col sm-width-80 pofo-404-content-bg">';
                            echo '<div class="padding-fifteen-all xs-padding-20px-all">';
                                if( $pofo_page_not_found_title ){
                                    echo '<span class="title-extra-large text-white font-weight-600 display-block margin-30px-bottom xs-margin-10px-bottom pofo-404-title'.esc_attr( $pofo_page_not_found_title_text_transform ).'">'.esc_html( $pofo_page_not_found_title ).'</span>';
                                }
                                if( $pofo_page_not_found_subtitle ){
                                    echo '<h6 class="text-deep-pink font-weight-600 alt-font display-block margin-5px-bottom pofo-404-subtitle'.esc_attr( $pofo_page_not_found_subtitle_text_transform ).'">'.esc_html( $pofo_page_not_found_subtitle ).'</h6>';
                                }
                                if( $pofo_page_not_found_content ){
                                    echo '<span class="text-medium-gray width-60 display-block center-col text-large sm-width-100 pofo-404-content">'.wp_kses_post( $pofo_page_not_found_content ).'</span>';
                                }
                                if( $pofo_page_not_found_search == 1 ) {
                                    echo '<form action="'.esc_url( home_url( '/' ) ).'" method="get" class="search-form position-relative margin-50px-top xs-margin-20px-top">';
                                        echo '<div class="input-group-404 input-group">';
                                            echo '<input type="text" id="search" placeholder="'.esc_attr( $pofo_search_placeholder_text ).'" value="'.get_search_query().'" name="s" class="extra-big-input border-none">';
                                            echo '<div class="input-group-btn">';
                                                echo '<button type="submit" class="btn btn-large bg-white text-medium-gray"><i class="ti-search icon-small tz-icon-color no-margin position-raltive top-2"></i></button>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</form>';
                                }
                                if( $pofo_page_not_found_button == 1 ){
                                    echo '<a href="'.esc_url( $pofo_page_not_found_button_url ).'" class="btn btn-transparent-white btn-medium text-extra-small border-radius-4 margin-50px-top xs-margin-20px-top"><i class="ti-arrow-left margin-5px-right no-margin-left" aria-hidden="true"></i> '.esc_attr( $pofo_page_not_found_button_text ).'</a>';
                                }
                            echo '</div>';
                        echo '</div>';                            
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</section>';