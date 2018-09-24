<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    $pofo_sticky_mini_header            = get_theme_mod( 'pofo_sticky_mini_header', '0' ) == '1' ? ' sticky-mini-header': '';
    $pofo_search_placeholder_text       = get_theme_mod( 'pofo_search_placeholder_text', 'Enter your keywords...' );
    $pofo_disable_header_logo           = pofo_option( 'pofo_disable_header_logo', '1' );
    $pofo_h1_logo_font_page             = pofo_option( 'pofo_h1_logo_font_page', '1' );
    $pofo_logo                          = pofo_option( 'pofo_logo', '' );
    $pofo_logo_light                    = pofo_option( 'pofo_logo_light', '' );
    $pofo_logo_ratina                   = pofo_option( 'pofo_logo_ratina', '' );
    $pofo_logo_light_ratina             = pofo_option( 'pofo_logo_light_ratina', '' );
    $pofo_header_bg_color               = pofo_option( 'pofo_header_bg_color', 'header-light' );
    $pofo_big_hamburger_menu            = pofo_option( 'pofo_big_hamburger_menu', 'no' );
    $pofo_header_container_style        = pofo_option( 'pofo_header_container_style', 'container' );
    $pofo_header_menu                   = pofo_option( 'pofo_header_menu', '' );
    $pofo_logo_position                 = pofo_option( 'pofo_logo_position', 'left' );
    $pofo_menu_background_logo          = pofo_option( 'pofo_menu_background_logo', '' );
    $pofo_menu_background_logo_ratina   = pofo_option( 'pofo_menu_background_logo_ratina', '' );
    $pofo_disable_header_copyright      = pofo_option( 'pofo_disable_header_copyright', '1' );
    $pofo_header_copyright_text         = pofo_option( 'pofo_header_copyright_text', '' );

    $pofo_disable_header_sidebar        = pofo_option( 'pofo_disable_header_sidebar', '1' );
    $pofo_header_sidebar                = pofo_option( 'pofo_header_sidebar', '' );
    $pofo_disable_header_search         = pofo_option( 'pofo_disable_header_search', '1' );
    $pofo_header_sidebar_position       = pofo_option( 'pofo_header_sidebar_position', 'right' );
    $pofo_disable_hamburger_menu_sidebar= pofo_option( 'pofo_disable_hamburger_menu_sidebar', '1' );
    $pofo_hamburger_menu_sidebar        = pofo_option( 'pofo_hamburger_menu_sidebar', '' );
    $pofo_enable_header_mini_cart       = pofo_option( 'pofo_enable_header_mini_cart', '1' );
    $pofo_header_mini_cart_sidebar      = pofo_option( 'pofo_header_mini_cart_sidebar', 'pofo-mini-cart' );
    $pofo_header_nav_type               = pofo_option( 'pofo_header_nav_type', 'navbar-top' );
    $pofo_header_nav_type               = ( $pofo_header_nav_type ) ? ' '.$pofo_header_nav_type : '';
    
    $pofo_menu_background_overlay_opacity= pofo_option( 'pofo_menu_background_overlay_opacity', '' );
    $pofo_menu_background_overlay_color = pofo_option( 'pofo_menu_background_overlay_color', '' );
    $pofo_menu_background_color         = pofo_option( 'pofo_menu_background_color', '' );
    $pofo_menu_background_image         = pofo_option( 'pofo_menu_background_image', '' );

    $pofo_menu_background_color         = !empty( $pofo_menu_background_color ) ? ' style="background:'.$pofo_menu_background_color.';"' : '';
    $pofo_menu_background_image         = !empty( $pofo_menu_background_image ) ? ' style="background-image:url('.esc_url($pofo_menu_background_image).')"' : '';
    $pofo_menu_background_overlay_opacity= !empty( $pofo_menu_background_overlay_opacity ) ? 'opacity: '.$pofo_menu_background_overlay_opacity.';' : '';
    $pofo_menu_background_overlay_color = !empty( $pofo_menu_background_overlay_color ) ? 'background-color: '.$pofo_menu_background_overlay_color.';' : '';

    $pofo_menu_background_style = '';
    if( !empty( $pofo_menu_background_overlay_opacity ) || !empty( $pofo_menu_background_overlay_color ) ) {
       $pofo_menu_background_style = ' style="'.$pofo_menu_background_overlay_opacity.$pofo_menu_background_overlay_color.'"';
    }

    $pofo_menu_wrapper_class = $pofo_logo_position == 'center' ? ' hamburger-menu-logo-center' : ' hamburger-menu-logo-normal';

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
        echo '<nav class="navbar full-width-pull-menu hamburger-wp-menu nav-top-scoll no-border-top header-img '.esc_attr( $pofo_header_bg_color ).esc_attr( $pofo_menu_wrapper_class ).esc_attr( $pofo_header_nav_type ).'">';
            echo '<!-- navigation panel -->';
            echo '<div class="'.esc_attr( $pofo_header_container_style ).' nav-header-container height-100px padding-three-half-lr xs-height-70px xs-padding-15px-lr">';
                echo '<div class="row">';

                    if( $pofo_logo_position == 'center' ) {

                        echo '<div class="col-md-4 col-sm-4 col-xs-6 hidden-xs center-col text-left menu-left-part">';

                            if( $pofo_header_sidebar_position == 'left' ) {

                                if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
                                    echo '<div class="header-social-icon header-sidebar-social-icon border-none no-padding-left no-margin-left">';
                                        dynamic_sidebar( $pofo_header_sidebar );
                                    echo '</div>';
                                }
                                if( $pofo_disable_header_search == '1' ) {
                                    echo '<div class="header-searchbar">';
                                        echo '<a href="#search-header" class="header-search-form text-white"><i class="fas fa-search search-button"></i></a>';
                                        echo '<!-- search input-->';
                                        $unique_id = esc_attr( uniqid( 'search-form-' ) );

                                        echo '<form id="search-header" method="get" action="'.esc_url( home_url('/') ).'" name="search-header" class="mfp-hide search-form-result">';
                                            echo '<div class="search-form position-relative">';
                                                echo '<button type="submit" class="fas fa-search close-search search-button"></button>';
                                                echo '<input name="s" id="'. esc_attr( $unique_id ).'" class="search-input" placeholder="'.esc_html( $pofo_search_placeholder_text ).'" autocomplete="off" type="text">';
                                            echo '</div>';
                                        echo '</form>';
                                    echo '</div>';
                                }
                                if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
                                    echo '<div class="header-mini-cart">';
                                        dynamic_sidebar( $pofo_header_mini_cart_sidebar );
                                    echo '</div>';
                                }
                            }

                        echo '</div>';

                        echo '<div class="col-md-4 col-sm-4 col-xs-6 center-col text-center xs-text-left menu-center-part">';

                            if( $pofo_disable_header_logo == '1' ) {

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
                            }

                        echo '</div>';

                        echo '<!-- main menu -->';
                        echo '<div class="col-md-4 col-sm-4 col-xs-6 center-col text-right menu-right-part">';

                            echo '<div class="menu-wrap full-screen no-padding">';
                                echo '<div class="col-sm-6 no-padding hidden-xs">';
                                    echo '<div class="cover-background full-screen"'.$pofo_menu_background_image.'>';

                                        echo '<div class="opacity-medium bg-extra-dark-gray"'.$pofo_menu_background_style.'></div>';
                                        echo '<div class="position-absolute height-100 width-100 text-center">';
                                            echo '<div class="display-table height-100 width-100">';
                                                echo '<div class="display-table-cell height-100 width-100 vertical-align-middle position-relative">';
                                                    if( $pofo_menu_background_logo || $pofo_menu_background_logo_ratina ) {
                                                        echo '<a class="hamburger-logo" href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'">';
                                                            if( $pofo_menu_background_logo ) {
                                                                echo '<img class="logo" alt="'.get_bloginfo("name").'" src="'.esc_url( $pofo_menu_background_logo ).'">';
                                                            }
                                                            if( $pofo_menu_background_logo_ratina ) {
                                                                echo '<img class="retina-logo" src="'.esc_url( $pofo_menu_background_logo_ratina ).'" alt="'.get_bloginfo("name").'">';
                                                            }
                                                        echo '</a>';
                                                    }
                                                    if( $pofo_disable_header_copyright == '1' && $pofo_header_copyright_text ) {
                                                        echo '<div class="position-absolute bottom-50 text-center width-100 margin-30px-bottom">';
                                                            echo '<div class="text-small text-extra-medium-gray">';
                                                                echo wp_kses_post( $pofo_header_copyright_text );
                                                            echo '</div>';
                                                        echo '</div>';
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                                
                                echo '<div class="col-sm-6 no-padding bg-white full-screen"'.$pofo_menu_background_color.'>';
                                    echo '<div class="position-absolute height-100 width-100 overflow-auto no-transition">';
                                        echo '<div class="display-table height-100 width-100">';
                                            echo '<div class="display-table-cell height-100 width-100 vertical-align-middle padding-fourteen-lr alt-font link-style-2 sm-padding-seven-lr xs-padding-15px-lr" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                                if( $pofo_header_menu != 1 ) {
                                                    $pofo_header_menu_default = array(
                                                                    'menu'       => $pofo_header_menu,
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );
                                                    
                                                } elseif( has_nav_menu('pofomegamenu') ) {

                                                    $pofo_header_menu_default = array(
                                                                    'theme_location'  => 'pofomegamenu',
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );

                                                } else {

                                                    $pofo_header_menu_default = array(
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'items_wrap' => '<ul id="%1$s" class="%2$s" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );
                                                }
                                                if ( $pofo_disable_hamburger_menu_sidebar == '1' && is_active_sidebar( $pofo_hamburger_menu_sidebar ) ) {
                                                    echo '<div class="margin-fifteen-top xs-margin-seven-top">';
                                                        dynamic_sidebar( $pofo_hamburger_menu_sidebar );
                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<button class="close-button-menu" id="close-button"></button>';
                                echo '</div>';
                            echo '</div>';
                            echo '<!-- end main menu -->';
                            
                            if( $pofo_header_sidebar_position == 'right' ) {

                                if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
                                    echo '<div class="header-social-icon header-sidebar-social-icon xs-display-none">';
                                        dynamic_sidebar( $pofo_header_sidebar );
                                    echo '</div>';
                                }
                                if( $pofo_disable_header_search == '1' ) {
                                    echo '<div class="header-searchbar">';
                                        echo '<a href="#search-header" class="header-search-form text-white"><i class="fas fa-search search-button"></i></a>';
                                        echo '<!-- search input-->';
                                        $unique_id = esc_attr( uniqid( 'search-form-' ) );

                                        echo '<form id="search-header" method="get" action="'.esc_url( home_url("/") ).'" name="search-header" class="mfp-hide search-form-result">';
                                            echo '<div class="search-form position-relative">';
                                                echo '<button type="submit" class="fas fa-search close-search search-button"></button>';
                                                echo '<input name="s" id="'. esc_attr( $unique_id ).'" class="search-input" placeholder="'.esc_html( $pofo_search_placeholder_text ).'" autocomplete="off" type="text">';
                                            echo '</div>';
                                        echo '</form>';
                                    echo '</div>';
                                }
                                if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
                                    echo '<div class="header-mini-cart">';
                                        dynamic_sidebar( $pofo_header_mini_cart_sidebar );
                                    echo '</div>';
                                }
                            }
                            
                            echo '<button class="navbar-toggle mobile-toggle" type="button" id="open-button" data-toggle="collapse" data-target=".navbar-collapse">';
                                echo '<span></span>';
                                echo '<span></span>';
                                echo '<span></span>';
                            echo '</button>';

                        echo '</div>';

                    } else {

                        if( $pofo_disable_header_logo == '1' ) {
                            echo '<!-- logo -->';
                            echo '<div class="col-md-2 col-sm-3 col-xs-6 pull-left brand-logo">';

                                if( is_front_page() ) {
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
                                if( is_front_page() ) {
                                    echo '</h1>';
                                }

                            echo '</div>';
                            echo '<!-- end logo -->';
                        }
                        echo '<!-- main menu -->';
                        echo '<div class="col-md-10 col-sm-9 col-xs-6 xs-padding-15px-right">';
                            echo '<div class="menu-wrap full-screen no-padding">';
                                echo '<div class="col-sm-6 no-padding hidden-xs">';
                                    echo '<div class="cover-background full-screen"'.$pofo_menu_background_image.'>';

                                        echo '<div class="opacity-medium bg-extra-dark-gray"'.$pofo_menu_background_style.'></div>';
                                        echo '<div class="position-absolute height-100 width-100 text-center">';
                                            echo '<div class="display-table height-100 width-100">';
                                                echo '<div class="display-table-cell height-100 width-100 vertical-align-middle position-relative">';
                                                    if( $pofo_menu_background_logo || $pofo_menu_background_logo_ratina ) {
                                                        echo '<a class="hamburger-logo" href="'.esc_url( home_url("/") ).'" title="'.get_bloginfo("name").'">';
                                                            if( $pofo_menu_background_logo ) {
                                                                echo '<img class="logo" alt="'.get_bloginfo("name").'" src="'.esc_url( $pofo_menu_background_logo ).'">';
                                                            }
                                                            if( $pofo_menu_background_logo_ratina ) {
                                                                echo '<img class="retina-logo" src="'.esc_url( $pofo_menu_background_logo_ratina ).'" alt="'.get_bloginfo("name").'">';
                                                            }
                                                        echo '</a>';
                                                    }
                                                    if( $pofo_disable_header_copyright == '1' && $pofo_header_copyright_text ) {
                                                        echo '<div class="position-absolute bottom-50 text-center width-100 margin-30px-bottom">';
                                                            echo '<div class="text-small text-extra-medium-gray pofo-copyright-text">';
                                                                echo wp_kses_post( $pofo_header_copyright_text );
                                                            echo '</div>';
                                                        echo '</div>';
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';

                                echo '<div class="col-sm-6 no-padding bg-white full-screen"'.$pofo_menu_background_color.'>';
                                    echo '<div class="position-absolute height-100 width-100 overflow-auto no-transition">';
                                        echo '<div class="display-table height-100 width-100">';
                                            echo '<div class="display-table-cell height-100 width-100 vertical-align-middle padding-fourteen-lr alt-font link-style-2 sm-padding-seven-lr xs-padding-15px-lr" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';
                                                if( $pofo_header_menu != 1 ) {
                                                    $pofo_header_menu_default = array(
                                                                    'menu'       => $pofo_header_menu,
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );

                                                } elseif( has_nav_menu('pofomegamenu') ) {

                                                    $pofo_header_menu_default = array(
                                                                    'theme_location'  => 'pofomegamenu',
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );

                                                } else {

                                                    $pofo_header_menu_default = array(
                                                                    'menu_id'    => '',
                                                                    'container'  => 'ul',
                                                                    'menu_class' => 'font-weight-500 xs-no-padding-left hamburger-menu-style1',
                                                                    'fallback_cb'=> false,
                                                                    'walker'     => new Pofo_Hamburger_Menu_Walker(),
                                                                );
                                                    
                                                    wp_nav_menu( $pofo_header_menu_default );
                                                }
                                                if ( $pofo_disable_hamburger_menu_sidebar == '1' && is_active_sidebar( $pofo_hamburger_menu_sidebar ) ) {
                                                    echo '<div class="margin-fifteen-top xs-margin-seven-top">';
                                                        dynamic_sidebar( $pofo_hamburger_menu_sidebar );
                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                    echo '<button class="close-button-menu" id="close-button"></button>';
                                echo '</div>';
                            echo '</div>';
                            echo '<!-- end main menu -->';
                            if ( $pofo_enable_header_mini_cart == '1' && is_active_sidebar( $pofo_header_mini_cart_sidebar ) && class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */
                                echo '<div class="header-mini-cart">';
                                    dynamic_sidebar( $pofo_header_mini_cart_sidebar );
                                echo '</div>';
                            }
                            if ( $pofo_disable_header_sidebar == '1' && is_active_sidebar( $pofo_header_sidebar ) ) {
                                echo '<div class="header-social-icon header-sidebar-social-icon xs-display-none">';
                                    dynamic_sidebar( $pofo_header_sidebar );
                                echo '</div>';
                            }
                            if( $pofo_disable_header_search == '1' ) {
                                echo '<div class="header-searchbar">';
                                    echo '<a href="#search-header" class="header-search-form text-white"><i class="fas fa-search search-button"></i></a>';
                                    echo '<!-- search input-->';
                                    $unique_id = esc_attr( uniqid( 'search-form-' ) );

                                    echo '<form id="search-header" method="get" action="'.home_url("/").'" name="search-header" class="mfp-hide search-form-result">';
                                        echo '<div class="search-form position-relative">';
                                            echo '<button type="submit" class="fas fa-search close-search search-button"></button>';
                                            echo '<input name="s" id="'. esc_attr( $unique_id ).'" class="search-input" placeholder="'.esc_html( $pofo_search_placeholder_text ).'" autocomplete="off" type="text">';
                                        echo '</div>';
                                    echo '</form>';
                                echo '</div>';
                            }
                            echo '<button class="navbar-toggle mobile-toggle" type="button" id="open-button" data-toggle="collapse" data-target=".navbar-collapse">';
                                echo '<span></span>';
                                echo '<span></span>';
                                echo '<span></span>';
                            echo '</button>';
                        echo '</div>';
                    }
                echo '</div>';
                echo '<!-- end navigation panel -->';
            echo '</div>';
            echo '<!-- end navigation -->';
        echo '</nav>';
        echo '<!-- end navigation -->';

    echo '</header>';
    echo '<!-- end header -->';