<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    $pofo_menu_center_class = $pofo_logo_class = $pofo_menu_class = $pofo_search_class = $pofo_pull_right = $pofo_menu_ul_class = '';

    $pofo_sticky_mini_header            = get_theme_mod( 'pofo_sticky_mini_header', '0' ) == '1' ? ' sticky-mini-header': '';
    $pofo_search_placeholder_text       = get_theme_mod( 'pofo_search_placeholder_text', 'Enter your keywords...' );
    $pofo_disable_header_logo           = pofo_option( 'pofo_disable_header_logo', '1' );
    $pofo_h1_logo_font_page             = pofo_option( 'pofo_h1_logo_font_page', '1' );
    $pofo_logo                          = pofo_option( 'pofo_logo', '' );
    $pofo_logo_light                    = pofo_option( 'pofo_logo_light', '' );
    $pofo_logo_ratina                   = pofo_option( 'pofo_logo_ratina', '' );
    $pofo_logo_light_ratina             = pofo_option( 'pofo_logo_light_ratina', '' );
    $pofo_header_nav_type               = pofo_option( 'pofo_header_nav_type', 'navbar-top' );
    $pofo_menu_position_center          = pofo_option( 'pofo_menu_position_center', '0' );
    $pofo_header_container_style        = pofo_option( 'pofo_header_container_style', 'container' );
    $pofo_header_menu                   = pofo_option( 'pofo_header_menu', '' );
    $pofo_header_secondary_menu         = pofo_option( 'pofo_header_secondary_menu', '' );
    $pofo_logo_position                 = pofo_option( 'pofo_logo_position', 'left' );
    $pofo_disable_header_search         = pofo_option( 'pofo_disable_header_search', '1' );
    $pofo_disable_header_sidebar        = pofo_option( 'pofo_disable_header_sidebar', '1' );
    $pofo_header_sidebar                = pofo_option( 'pofo_header_sidebar', '' );
    $pofo_disable_slide_menu            = pofo_option( 'pofo_disable_slide_menu', '0' );
    $pofo_slide_menu_sidebar            = pofo_option( 'pofo_slide_menu_sidebar', '' );
    $pofo_enable_header_mini_cart       = pofo_option( 'pofo_enable_header_mini_cart', '1' );
    $pofo_header_mini_cart_sidebar      = pofo_option( 'pofo_header_mini_cart_sidebar', 'pofo-mini-cart' );
    $pofo_header_nav_type               = ( $pofo_header_nav_type ) ? ' '.$pofo_header_nav_type : '';

    // Logo & Menu Setup
    if( $pofo_logo_position == 'top' ) { // Logo Position Top
        $pofo_menu_center_class = ' navbar-brand-top nav-box-width';
        $pofo_logo_class = 'col-md-12 col-sm-4 col-xs-6 navbar-brand';
        $pofo_menu_class = 'col-md-12 sm-width-auto accordion-menu';
        $pofo_search_class = 'brand-top-menu-right';
        $pofo_pull_right = ' display-inline-block';
        $pofo_menu_ul_class = '  navbar-left no-margin';
    } else if( $pofo_logo_position == 'center' ) { // Logo Position Center
        $pofo_menu_center_class = ' nav-box-width padding-four-lr menu-logo-center header-center-logo';
        $pofo_logo_class = 'pofo-header-logo center-logo';
        $pofo_menu_class = 'col-md-12 col-sm-12 col-xs-12 accordion-menu'; 
        $pofo_search_class = 'width-auto xs-padding-15px-right';
        $pofo_pull_right = '';
        $pofo_menu_ul_class = ' navbar-left text-right no-margin width-40 sm-width-100 sm-text-left';
    } else { // Logo Position Left
        if( $pofo_menu_position_center == '1' ) { // Menu Position Center
            $pofo_menu_center_class = ' menu-center';
            $pofo_logo_class = 'col-lg-2 col-md-3 col-xs-5';
            $pofo_menu_class = 'col-lg-8 col-md-6 col-xs-2 accordion-menu xs-no-padding-right';
            $pofo_search_class = 'col-lg-2 col-md-3 col-xs-5 sm-width-auto text-right header-right-col';
            $pofo_pull_right = '';
            $pofo_menu_ul_class = ' navbar-center';
        } else { // Menu Position Right
            $pofo_menu_center_class = '';
            $pofo_logo_class = 'col-md-2 col-xs-5';
            $pofo_menu_class = 'col-md-7 col-xs-2 width-auto pull-right accordion-menu'; 
            $pofo_search_class = 'col-md-2 col-xs-5 width-auto header-right';
            $pofo_pull_right = ' pull-right';
            $pofo_menu_ul_class = ' navbar-left no-margin';
        }
    }

    $pofo_menu_extra_class = $pofo_header_container_style == 'container-fluid' ? ' nav-box-width' : '';

    $header_right_flag = false;
    if( $pofo_disable_header_search == '1' || ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) || ( $pofo_disable_slide_menu == '1' && is_active_sidebar( $pofo_slide_menu_sidebar ) ) || ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) || $pofo_menu_position_center == '1' ) {

        $header_right_flag = true;
        if( $pofo_logo_position == 'center' ) { // Logo Position Center

            $pofo_menu_extra_class .= ' center-logo-search-cart-full-width';
        }
    }

    /* Check mini header status */
    $pofo_mini_header_class = '';
    
    if( pofo_check_mini_header_enable() ) {
        $pofo_mini_header_class .= ' header-with-topbar'.$pofo_sticky_mini_header;
    }
    
    if( trim( $pofo_header_nav_type ) == 'navbar-non-sticky-top' ) {
        $pofo_mini_header_class .= ' no-sticky';
    }

    echo '<!-- header -->';
    echo '<header id="masthead" class="site-header header-main-wrapper'.esc_attr( $pofo_mini_header_class ).'" itemscope="itemscope" itemtype="http://schema.org/WPHeader">';

    if( pofo_check_mini_header_enable() ) {
        get_template_part( 'templates/header/mini', 'header' );
    }

        echo '<!-- navigation -->';
        echo '<nav class="navbar navbar-default bootsnav pofo-standard-menu on no-full header-img'.esc_attr( $pofo_menu_extra_class ).esc_attr( $pofo_header_nav_type ).esc_attr( $pofo_menu_center_class ).'">';
            
            echo '<div class="'.esc_attr( $pofo_header_container_style ).' nav-header-container">';
                echo '<div class="row">';
                
                if( $pofo_logo_position == 'center' ) { // Logo Position Center

                    echo '<div class="pofo-center-logo-menu xs-padding-15px-left">';
                }

                    if( $pofo_disable_header_logo == '1' ) {
                        echo '<div class="'.esc_attr( $pofo_logo_class ).'">';
                            if( is_front_page() && $pofo_h1_logo_font_page == '1' ) {
                                echo '<h1>';
                            }
                            if( $pofo_logo || $pofo_logo_light ) {
                                if( $pofo_logo_ratina ) {
                                    if( $pofo_logo ) {
                                        echo '<a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-light">';
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
                                
                                if( $pofo_logo_light_ratina ) {
                                    if( $pofo_logo_light ) {
                                        echo '<a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-dark">';
                                            echo '<img class="logo" src="'.esc_url( $pofo_logo_light ).'" alt="'.get_bloginfo("name").'">';
                                            echo '<img class="retina-logo" src="'.esc_url( $pofo_logo_light_ratina ).'" alt="'.get_bloginfo("name").'">';
                                        echo '</a>';
                                    }
                                } else {
                                    if( $pofo_logo_light ) {
                                        echo '<a href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'" class="logo-dark">';
                                            echo '<img class="logo" src="'.esc_url( $pofo_logo_light ).'" alt="'.get_bloginfo("name").'">';
                                            echo '<img class="retina-logo" src="'.esc_url( $pofo_logo_light ).'" alt="'.get_bloginfo("name").'">';
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
                    
                    echo '<div class="'.esc_attr( $pofo_menu_class ).'">';
                    	if( $pofo_header_menu || ( $pofo_logo_position == 'center' && $pofo_header_secondary_menu ) ) {
                            echo '<button type="button" class="navbar-toggle responsive-navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">';
                                echo '<span class="sr-only">'.esc_html( 'Toggle Navigation', 'pofo' ).'</span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                            echo '</button>';
                            echo '<div class="navbar-collapse collapse'.esc_attr( $pofo_pull_right ).'" id="navbar-collapse-toggle-1" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                if( $pofo_header_menu ) {
                                    $pofo_header_menu_default = array(
                                                    'menu'       => $pofo_header_menu,
                                                    'menu_id'    => 'accordion',
                                                    'container'  => 'ul',
                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                    'menu_class' => 'nav navbar-nav alt-font text-normal'.$pofo_menu_ul_class,
                                                    'fallback_cb'=> false,
                                                    'walker'     => new Pofo_Mega_Menu_Walker(),
                                                );

                                    wp_nav_menu( $pofo_header_menu_default );
                                } else {
                                    $pofo_header_menu_default = array(
                                                    'menu_id'    => 'accordion',
                                                    'container'  => 'ul',
                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                    'menu_class' => 'nav navbar-nav alt-font text-normal'.$pofo_menu_ul_class,
                                                    'fallback_cb'=> false,
                                                    'walker'     => new Pofo_Mega_Menu_Walker(),
                                                );

                                    wp_nav_menu( $pofo_header_menu_default );
                                }
                                if( $pofo_logo_position == 'center' && $pofo_header_secondary_menu ) {
                                    $pofo_header_secondary_menu_default = array(
                                                    'menu'       => $pofo_header_secondary_menu,
                                                    'menu_id'    => 'secondary',
                                                    'container'  => 'ul',
                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                    'menu_class' => 'nav navbar-nav alt-font text-normal navbar-right no-margin width-40 sm-width-100',
                                                    'fallback_cb'=> false,
                                                    'walker'     => new Pofo_Mega_Menu_Walker(),
                                                );
                                    
                                    wp_nav_menu( $pofo_header_secondary_menu_default );
                                }
                            echo '</div>';
                    	} elseif( has_nav_menu('pofomegamenu') ) {
                            echo '<button type="button" class="navbar-toggle responsive-navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">';
                                echo '<span class="sr-only">'.esc_html( 'Toggle Navigation', 'pofo' ).'</span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                            echo '</button>';
                            echo '<div class="navbar-collapse collapse'.esc_attr( $pofo_pull_right ).'" id="navbar-collapse-toggle-1" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                    $pofo_header_menu_default = array(
                                                    'theme_location'  => 'pofomegamenu',
                                                    'menu_id'    => 'accordion',
                                                    'container'  => 'ul',
                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                    'menu_class' => 'nav navbar-nav alt-font text-normal'.$pofo_menu_ul_class,
                                                    'fallback_cb'=> false,
                                                    'walker'     => new Pofo_Mega_Menu_Walker(),
                                                );

                                    wp_nav_menu( $pofo_header_menu_default );
                            echo '</div>';
                        } else {
                            echo '<button type="button" class="navbar-toggle responsive-navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">';
                                echo '<span class="sr-only">'.esc_html( 'Toggle Navigation', 'pofo' ).'</span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                                echo '<span class="icon-bar"></span>';
                            echo '</button>';
                            echo '<div class="navbar-collapse collapse'.esc_attr( $pofo_pull_right ).'" id="navbar-collapse-toggle-1" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                $pofo_header_menu_default = array( 
                                                    'container'       => 'ul',
                                                    'menu_class'      => 'nav navbar-nav alt-font text-normal pofo-normal-menu'.$pofo_menu_ul_class,
                                                    'menu_id'         => '',
                                                    'echo'            => true,
                                                    'items_wrap'      => '<ul id="%1$s" class="simple-dropdown %2$s" data-in="fadeIn" data-out="fadeOut">%3$s</ul>',
                                                );
                                wp_nav_menu($pofo_header_menu_default);
                            echo '</div>';
                        }

                    if( $pofo_logo_position != 'top' ) {
                    	echo '</div>';
                    }

                if( $pofo_logo_position == 'center' ) { // Logo Position Center

                    echo '</div>';
                }

                    if( $header_right_flag ) {
	                    echo '<div class="'.esc_attr( $pofo_search_class ).'">';
	                        if( $pofo_disable_header_search == '1' ) {
	                            echo '<div class="header-searchbar">';
	                                echo '<a href="#search-header" class="header-search-form text-white"><i class="fas fa-search search-button"></i></a>';
	                                echo '<!-- search input-->';
	                                $unique_id = esc_attr( uniqid( 'search-form-' ) );

	                                echo '<form id="search-header" method="get" action="'.home_url('/').'" name="search-header" class="mfp-hide search-form-result">';
	                                    echo '<div class="search-form position-relative">';
	                                        echo '<button type="submit" class="fas fa-search close-search search-button"></button>';
	                                        echo '<input name="s" id="'. esc_attr( $unique_id ).'" class="search-input" placeholder="'.esc_html( $pofo_search_placeholder_text ).'" autocomplete="off" type="text">';
	                                    echo '</div>';
	                                echo '</form>';
	                            echo '</div>';
	                        }
	                        if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
	                            echo '<div class="header-social-icon xs-display-none">';
	                                dynamic_sidebar( $pofo_header_sidebar );
	                            echo '</div>';
	                        }
                            if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
                                echo '<div class="header-mini-cart">';
                                    dynamic_sidebar( $pofo_header_mini_cart_sidebar );
                                echo '</div>';
                            }
	                        if( $pofo_disable_slide_menu == '1' && is_active_sidebar( $pofo_slide_menu_sidebar ) ) {
	                            echo '<div class="header-menu-button sm-display-none">';
	                                echo '<button class="navbar-toggle mobile-toggle right-menu-button" type="button" id="showRightPush">';
	                                    echo '<span></span>';
	                                    echo '<span></span>';
	                                    echo '<span></span>';
	                                echo '</button>';
	                            echo '</div>';
	                        }
	                    echo '</div>';
                    }
                    if( $pofo_logo_position == 'top' ) {
                    	echo '</div>';
                    }

                echo '</div>';
            echo '</div>';
        echo '</nav>';
        echo '<!-- end navigation -->';

        if( $pofo_disable_slide_menu == '1' && is_active_sidebar( $pofo_slide_menu_sidebar ) ) {
            echo '<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">';
                echo '<button class="close-button-menu side-menu-close" id="close-pushmenu"></button>';
                echo '<div class="display-table padding-twelve-all height-100 width-100 text-center xs-padding-six-all">';
                    echo '<div class="display-table-cell vertical-align-top padding-70px-top position-relative">';
                        echo '<div class="row">';
                            dynamic_sidebar( $pofo_slide_menu_sidebar );
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    echo '</header>';
    echo '<!-- end header -->';