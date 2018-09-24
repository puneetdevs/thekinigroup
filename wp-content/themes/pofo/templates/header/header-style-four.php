<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    $pofo_sticky_mini_header        = get_theme_mod( 'pofo_sticky_mini_header', '0' ) == '1' ? ' sticky-mini-header': '';
    $pofo_disable_header_logo       = pofo_option( 'pofo_disable_header_logo', '1' );
    $pofo_h1_logo_font_page         = pofo_option( 'pofo_h1_logo_font_page', '1' );
    $pofo_logo                      = pofo_option( 'pofo_logo', '' );
    $pofo_logo_light                = pofo_option( 'pofo_logo_light', '' );
    $pofo_logo_ratina               = pofo_option( 'pofo_logo_ratina', '' );
    $pofo_logo_light_ratina         = pofo_option( 'pofo_logo_light_ratina', '' );
    $pofo_header_menu               = pofo_option( 'pofo_header_menu', '1' );
    $pofo_disable_header_sidebar    = pofo_option( 'pofo_disable_header_sidebar', '1' );
    $pofo_header_sidebar            = pofo_option( 'pofo_header_sidebar', '' );
    $pofo_disable_header_search     = pofo_option( 'pofo_disable_header_search', '1' );
    $pofo_menu_vertical_image       = pofo_option( 'pofo_menu_vertical_image', '' );
    $pofo_enable_header_mini_cart   = pofo_option( 'pofo_enable_header_mini_cart', '1' );
    $pofo_header_mini_cart_sidebar  = pofo_option( 'pofo_header_mini_cart_sidebar', 'pofo-mini-cart' );

    /* Check mini header status */
    $pofo_mini_header_class = '';
    
    if( pofo_check_mini_header_enable() ) {
        $pofo_mini_header_class .= ' header-with-topbar'.$pofo_sticky_mini_header;
    }
    
    echo '<!-- header -->';
    echo '<header id="masthead" class="site-header '.esc_attr( $pofo_mini_header_class ).'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';
    
    if( pofo_check_mini_header_enable() ) {
        get_template_part( 'templates/header/mini', 'header' );
    }

        echo '<div class="left-nav">';
            if( $pofo_disable_header_logo == '1' ) {
                echo '<div class="sidebar-part1">';
                    if( is_front_page() && $pofo_h1_logo_font_page == '1' ) {
                        echo '<h1>';
                    }
                    if( $pofo_logo ) {
                        if( $pofo_logo_ratina ) {
                            if( $pofo_logo ) {
                                echo '<a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-light display-inline-block">';
                                    echo '<img class="logo" src="'.esc_url( $pofo_logo ).'" alt="'.get_bloginfo("name").'">';
                                    echo '<img class="retina-logo" src="'.esc_url( $pofo_logo_ratina ).'" alt="'.get_bloginfo("name").'">';
                                echo '</a>';
                            }
                        } else {
                            if( $pofo_logo ) {
                                echo '<a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-light">';
                                    echo '<img class="logo" src="'.esc_url( $pofo_logo ).'" alt="'.get_bloginfo("name").'">';
                                    echo '<img class="retina-logo" src="'.esc_url( $pofo_logo ).'" alt="'.get_bloginfo("name").'">';
                                echo '</a>';
                            }
                        }
                        
                    } else {
                        echo '<span class="site-title"><a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'">'.get_bloginfo( "name" ).'</a></span>';
                    }
                    if( is_front_page() && $pofo_h1_logo_font_page == '1' ) {
                        echo '</h1>';
                    }
                echo '</div>';
            }
            
            if( ( $pofo_header_menu != 1 ) || is_active_sidebar( $pofo_header_sidebar ) || $pofo_menu_vertical_image || ( $pofo_disable_header_search == '1') ) {

                if( $pofo_header_menu != 1 ) {
                    echo '<div class="sidebar-part2">';
                } else {
                    echo '<div class="sidebar-part2 without-menu">';
                }
                    echo '<div class="sidebar-middle">';
                        echo '<div class="sidebar-middle-menu alt-font font-weight-600">';
                            if( $pofo_header_menu != 1 ) {
                                echo '<nav class="navbar bootsnav alt-font">';
                                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                        $pofo_header_menu_default = array(
                                                        'menu'       => $pofo_header_menu,
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav margin-80px-bottom',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );
                                        
                                        wp_nav_menu( $pofo_header_menu_default );
                                    echo '</div>';
                                echo '</nav>';

                            } elseif( has_nav_menu('pofomegamenu') ) {

                                echo '<nav class="navbar bootsnav alt-font">';
                                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                        $pofo_header_menu_default = array(
                                                        'theme_location'  => 'pofomegamenu',
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav margin-80px-bottom',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );
                                        
                                        wp_nav_menu( $pofo_header_menu_default );
                                    echo '</div>';
                                echo '</nav>';

                            } else {

                                echo '<nav class="navbar bootsnav alt-font">';
                                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                        $pofo_header_menu_default = array(
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav margin-80px-bottom',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );
                                        
                                        wp_nav_menu( $pofo_header_menu_default );
                                    echo '</div>';
                                echo '</nav>';
                            }
                            if( $pofo_disable_header_search == '1' ) {
                                get_search_form();
                            }
                            if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
                                echo '<div class="header-sidebar-wrap">';    
                                    dynamic_sidebar( $pofo_header_sidebar );
                                echo '</div>';
                            }
                            echo '<div class="right-bg header-img">';
                                /* Header Image */
                                if( $pofo_menu_vertical_image ) {
                                    echo wp_get_attachment_image( pofo_get_image_id_by_url( esc_url( $pofo_menu_vertical_image ) ), 'full');
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="sidebar-part3">';
                    echo '<div class="bottom-menu-icon">';
                        echo '<a href="javascript:void(0);" class="right-menu-button text-extra-dark-gray nav-icon" id="headerShowRightPush">';
                            echo '<span></span>';
                            echo '<span></span>';
                            echo '<span></span>';
                            echo '<span></span>';
                        echo '</a>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
        echo '<div class="header-over-layer"></div>';
        if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
            echo '<div class="header-mini-cart">';
                dynamic_sidebar( $pofo_header_mini_cart_sidebar );
            echo '</div>';
        }
    echo '</header>';
    echo '<!-- end header -->';