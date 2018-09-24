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
    $pofo_header_container_style    = pofo_option( 'pofo_header_container_style', 'container' );
    $pofo_header_menu               = pofo_option( 'pofo_header_menu', '1' );
    $pofo_disable_header_copyright  = pofo_option( 'pofo_disable_header_copyright', '1' );
    $pofo_disable_header_sidebar    = pofo_option( 'pofo_disable_header_sidebar', '1' );
    $pofo_header_sidebar            = pofo_option( 'pofo_header_sidebar', '' );
    $pofo_disable_header_search     = pofo_option( 'pofo_disable_header_search', '1' );
    $pofo_header_copyright_text     = pofo_option( 'pofo_header_copyright_text', '' );
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

        echo '<!-- navigation -->';
        echo '<nav class="navbar no-margin-bottom bootsnav alt-font bg-white sidebar-nav sidebar-nav-style-1 header-img">';
            
            echo '<div class="col-md-12 col-sm-12 col-xs-12 sidenav-header">';

                if( $pofo_disable_header_logo == '1' ) {
                    echo '<!-- logo -->';
                    echo '<div class="logo-holder">';

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
                    echo '<!-- end logo -->';
                }

                echo '<button class="navbar-toggle responsive-navbar-toggle mobile-toggle" type="button" id="mobileToggleSidenav">';
                    echo '<span></span>';
                    echo '<span></span>';
                    echo '<span></span>';
                echo '</button>';
            echo '</div>';

            if( $pofo_header_menu != 1 ) {
                echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr">';
                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';

                        $pofo_header_menu_default = array(
                                                        'menu'       => $pofo_header_menu,
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav navbar-left-sidebar font-weight-500',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );

                        wp_nav_menu( $pofo_header_menu_default );

                    echo '</div>';
                echo '</div>';

            } elseif( has_nav_menu('pofomegamenu') ) {

                echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr">';
                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';

                        $pofo_header_menu_default = array(
                                                        'theme_location'  => 'pofomegamenu',
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav navbar-left-sidebar font-weight-500',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );

                        wp_nav_menu( $pofo_header_menu_default );

                    echo '</div>';
                echo '</div>';
                
            } else {

                echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr">';
                    echo '<div id="navbar-menu" class="collapse navbar-collapse no-padding" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';

                        $pofo_header_menu_default = array(
                                                        'menu_id'    => '',
                                                        'container'  => 'ul',
                                                        'menu_class' => 'nav navbar-nav navbar-left-sidebar font-weight-500',
                                                        'fallback_cb'=> false,
                                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li><div class="side-left-menu-close close-side"></div></li></ul>',
                                                        'walker'     => new Pofo_Classic_Menu_Walker(),
                                                    );

                        wp_nav_menu( $pofo_header_menu_default );

                    echo '</div>';
                echo '</div>';
            }
            echo '<div class="col-md-12 position-absolute top-auto bottom-0 left-0 width-100 padding-20px-bottom xs-text-center xs-padding-15px-bottom">';
                echo '<div class="footer-holder">';
                    if( $pofo_disable_header_search == '1' ) {
                        get_search_form();
                    }
                    if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
                        echo '<div class="header-sidebar-wrap margin-eleven-bottom padding-eight-top xs-padding-15px-top xs-margin-15px-bottom sm-text-center">';    
                            dynamic_sidebar( $pofo_header_sidebar );
                        echo '</div>';
                    }
                    if( $pofo_disable_header_copyright == '1' && $pofo_header_copyright_text ) {
                        echo '<div class="copyright-wrap text-medium-gray text-extra-small border-top border-color-extra-light-gray padding-twelve-top xs-padding-15px-top pofo-copyright-text">';
                            echo wp_kses_post( $pofo_header_copyright_text );
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</nav>';
        echo '<!-- end navigation -->';
        if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
            echo '<div class="header-mini-cart">';
                dynamic_sidebar( $pofo_header_mini_cart_sidebar );
            echo '</div>';
        }
    echo '</header>';
    echo '<!-- end header -->';