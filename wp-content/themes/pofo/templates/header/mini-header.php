<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    $pofo_mini_header_extra_class = '';
    $pofo_mini_header_container_style = pofo_option( 'pofo_mini_header_container_style', 'container' );
    
    // sidebar settings
    $pofo_disable_mini_header_left_sidebar = pofo_option( 'pofo_disable_mini_header_left_sidebar', '1' );
    $pofo_mini_header_left_sidebar = pofo_option( 'pofo_mini_header_left_sidebar', '' );
    $pofo_disable_mini_header_right_sidebar = pofo_option( 'pofo_disable_mini_header_right_sidebar', '1' );
    $pofo_mini_header_right_sidebar = pofo_option( 'pofo_mini_header_right_sidebar', '' );
    
    $pofo_header_layout = pofo_option( 'pofo_header_type', 'headertype1' );
    if( $pofo_header_layout == 'headertype3' ) {
        $pofo_mini_header_extra_class .= ' sidebar-wrapper';
    }

    if( $pofo_mini_header_container_style == 'container-fluid' ) {
        $pofo_mini_header_extra_class .= ' nav-box-width';
    }

    if( pofo_check_mini_header_enable() ) {
        
        echo '<!-- topbar -->';
        echo '<div class="top-header-area bg-black padding-5px-tb'.esc_attr( $pofo_mini_header_extra_class ).'">';
            echo '<div class="'.esc_attr( $pofo_mini_header_container_style ).'">';
                echo '<div class="row">';
                    echo '<div class="col-md-6 col-sm-6 col-xs-12 alt-font xs-no-padding-lr xs-text-center mini-header-left">';
                        if ( $pofo_disable_mini_header_left_sidebar == '1' && is_active_sidebar( $pofo_mini_header_left_sidebar ) ) {
                            dynamic_sidebar( $pofo_mini_header_left_sidebar );
                        }
                    echo '</div>';
                    echo '<div class="col-md-6 col-sm-6 col-xs-12 hidden-xs xs-no-padding-lr text-right mini-header-right">';
                        if ( $pofo_disable_mini_header_right_sidebar == '1' && is_active_sidebar( $pofo_mini_header_right_sidebar ) ) {
                            dynamic_sidebar( $pofo_mini_header_right_sidebar );
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- end topbar -->';
    }