<?php
/**
 * Generate css.
 *
 * @package Pofo
 */
?>
<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

    // Header menu / submenu text transform
    $pofo_header_menu_text_transform        = pofo_option( 'pofo_header_menu_text_transform', '' );
    $pofo_header_submenu_text_transform     = pofo_option( 'pofo_header_submenu_text_transform', '' );

    // Header Color Settings
    $pofo_header_background_color           = pofo_option( 'pofo_header_background_color', '' );
    $pofo_menu_text_color                   = pofo_option( 'pofo_menu_text_color', '' );
    $pofo_menu_hover_text_color             = pofo_option( 'pofo_menu_hover_text_color', '' );

    // Header Background Color
    $pofo_header_background_color           = !empty( $pofo_header_background_color ) ? ' background-color: '.$pofo_header_background_color.';' : '';

    // Header Menu Text Color
    $pofo_slide_menu_color                  = !empty( $pofo_menu_text_color ) ? ' background-color: '.$pofo_menu_text_color.';' : '';
    $pofo_menu_separator_color              = !empty( $pofo_menu_text_color ) ? ' border-color: '.$pofo_menu_text_color.';' : '';
    $pofo_menu_text_color                   = !empty( $pofo_menu_text_color ) ? ' color: '.$pofo_menu_text_color.';' : '';

    // Header Menu Hover Text Color
    $pofo_slide_menu_hover_color            = !empty( $pofo_menu_hover_text_color ) ? ' background-color: '.$pofo_menu_hover_text_color.';' : '';
    $pofo_menu_hover_text_color             = !empty( $pofo_menu_hover_text_color ) ? ' color: '.$pofo_menu_hover_text_color.';' : '';
    
    // Header Font Settings
    $pofo_header_menu_text_font_size        = pofo_option( 'pofo_header_menu_text_font_size', '' );
    $pofo_header_menu_text_line_height      = pofo_option( 'pofo_header_menu_text_line_height', '' );
    $pofo_header_menu_text_letter_spacing   = pofo_option( 'pofo_header_menu_text_letter_spacing', '' );
    $pofo_header_menu_icon_font_size        = pofo_option( 'pofo_header_menu_icon_font_size', '' );

    $pofo_header_menu_text_font_size        = !empty( $pofo_header_menu_text_font_size ) ? ' font-size: '.$pofo_header_menu_text_font_size.';' : '';
    $pofo_header_menu_text_line_height      = !empty( $pofo_header_menu_text_line_height ) ? ' line-height: '.$pofo_header_menu_text_line_height.';' : '';
    $pofo_header_menu_text_letter_spacing   = !empty( $pofo_header_menu_text_letter_spacing ) ? ' letter-spacing: '.$pofo_header_menu_text_letter_spacing.';' : '';
    $pofo_header_menu_icon_font_size        = !empty( $pofo_header_menu_icon_font_size ) ? ' font-size: '.$pofo_header_menu_icon_font_size.';' : '';

    // Header Submenu Color Settings
    $pofo_header_submenu_background_color   = pofo_option( 'pofo_header_submenu_background_color', '' );
    $pofo_header_submenu_text_color         = pofo_option( 'pofo_header_submenu_text_color', '' );
    $pofo_header_submenu_hover_color        = pofo_option( 'pofo_header_submenu_hover_color', '' );
    $pofo_header_third_level_menu_background_color = pofo_option( 'pofo_header_third_level_menu_background_color', '' );

    $pofo_header_submenu_background_color   = !empty( $pofo_header_submenu_background_color ) ? ' background-color: '.$pofo_header_submenu_background_color.';' : '';
    $pofo_header_submenu_separator_color    = !empty( $pofo_header_submenu_text_color ) ? ' border-color: '.$pofo_header_submenu_text_color.';' : '';
    $pofo_header_submenu_text_color         = !empty( $pofo_header_submenu_text_color ) ? ' color: '.$pofo_header_submenu_text_color.';' : '';
    $pofo_header_submenu_hover_color        = !empty( $pofo_header_submenu_hover_color ) ? ' color: '.$pofo_header_submenu_hover_color.';' : '';
    $pofo_header_third_level_menu_background_color = !empty( $pofo_header_third_level_menu_background_color ) ? ' background-color: '.$pofo_header_third_level_menu_background_color.';' : '';
    
    // Header Submenu Text Font Settings
    $pofo_header_submenu_text_font_size     = pofo_option( 'pofo_header_submenu_text_font_size', '' );
    $pofo_header_submenu_text_line_height   = pofo_option( 'pofo_header_submenu_text_line_height', '' );
    $pofo_header_submenu_text_letter_spacing= pofo_option( 'pofo_header_submenu_text_letter_spacing', '' );
    $pofo_header_submenu_icon_font_size     = pofo_option( 'pofo_header_submenu_icon_font_size', '' );

    $pofo_header_submenu_text_font_size     = !empty( $pofo_header_submenu_text_font_size ) ? ' font-size: '.$pofo_header_submenu_text_font_size.';' : '';
    $pofo_header_submenu_text_line_height   = !empty( $pofo_header_submenu_text_line_height ) ? ' line-height: '.$pofo_header_submenu_text_line_height.';' : '';
    $pofo_header_submenu_text_letter_spacing= !empty( $pofo_header_submenu_text_letter_spacing ) ? ' letter-spacing: '.$pofo_header_submenu_text_letter_spacing.';' : '';
    $pofo_header_submenu_icon_font_size     = !empty( $pofo_header_submenu_icon_font_size ) ? ' font-size: '.$pofo_header_submenu_icon_font_size.';' : '';
?>

<?php if( !empty( $pofo_header_menu_text_transform ) ) { ?>
/* Header menu text transform */
nav.navbar.bootsnav ul.nav > li > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_menu_text_transform ) ?> }
<?php } ?>

<?php if( !empty( $pofo_header_submenu_text_transform ) ) { ?>
/* Header submenu text transform */
.nav.navbar-left-sidebar li a, nav.navbar.bootsnav.navbar-left-sidebar ul.nav > li > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_text_transform ) ?> }
<?php } ?>

<?php if( $pofo_header_background_color ) { ?>
/* Header Background Color */
nav.navbar.sidebar-nav, nav.navbar.sidebar-nav.sidebar-nav-style-1 .sidenav-header, nav.navbar.sidebar-nav .search-box input[type="text"], nav.navbar.sidebar-nav .search-box input[type="search"], nav.navbar.sidebar-nav .search-box input[type="email"], nav.navbar.sidebar-nav .search-box .add-on .input-group-btn > .btn, nav.navbar.sidebar-nav.sidebar-nav-style-1.mobile-menu .sidenav-header, header.site-header > .header-mini-cart .widget_shopping_cart { <?php echo esc_html( $pofo_header_background_color ) ?> }
<?php } ?>
    
<?php if( $pofo_menu_text_color || $pofo_header_menu_text_font_size || $pofo_header_menu_text_line_height || $pofo_header_menu_text_letter_spacing || $pofo_header_menu_icon_font_size ) { ?>
/* Menu Color and Font Settings */
nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li > a, nav.navbar.sidebar-nav .search-box input[type="text"], nav.navbar.sidebar-nav .search-box input[type="search"], nav.navbar.sidebar-nav .search-box input[type="email"], .sidebar-nav-style-1 .copyright-wrap, .sidebar-nav-style-1 .copyright-wrap a, .sidebar-nav-style-1 .header-sidebar-wrap ul li a, nav.navbar.bootsnav.sidebar-nav .search-box .add-on i, header.site-header > .header-mini-cart .widget_shopping_cart .widget-title:before, nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar > li.dropdown > a > i.fa-angle-right, nav.navbar.bootsnav.sidebar-nav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_menu_text_color.$pofo_header_menu_text_font_size.$pofo_header_menu_text_line_height.$pofo_header_menu_text_letter_spacing ) ?> }

/* Search Placeholder Color */
nav.navbar .search-box input[type="text"]::-webkit-input-placeholder { <?php echo esc_html( $pofo_menu_text_color ) ?> }
nav.navbar .search-box input[type="text"]::-moz-placeholder { <?php echo esc_html( $pofo_menu_text_color ) ?> }
nav.navbar .search-box input[type="text"]::-ms-input-placeholder { <?php echo esc_html( $pofo_menu_text_color ) ?> }
nav.navbar .search-box input[type="text"]::-o-placeholder { <?php echo esc_html( $pofo_menu_text_color ) ?> }

    <?php if( $pofo_slide_menu_color ) { ?>
        /* Slide Menu Color */
        .mobile-menu .mobile-toggle span { <?php echo esc_html( $pofo_slide_menu_color ) ?> }
    <?php } ?>

    <?php if( $pofo_menu_separator_color ) { ?>
        /* Menu Separator Color */
        nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li > a, nav.navbar.sidebar-nav .search-box input[type="text"], nav.navbar.sidebar-nav .search-box input[type="search"], nav.navbar.sidebar-nav .search-box input[type="email"], nav.navbar.sidebar-nav .search-box .add-on .input-group-btn > .btn, nav.navbar.sidebar-nav .copyright-wrap, nav.sidebar-nav-style-1.navbar.bootsnav ul.nav > li:last-child { <?php echo esc_html( $pofo_menu_separator_color ) ?> }
    <?php } ?>

    <?php if( $pofo_header_menu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        .sidebar-nav-style-1 .header-sidebar-wrap ul li a, nav.navbar.bootsnav.sidebar-nav .search-box .add-on i, header.site-header > .header-mini-cart .widget_shopping_cart .widget-title:before, nav.navbar.bootsnav.sidebar-nav .nav.navbar-left-sidebar > li.dropdown > a > i.fa-angle-right, nav.navbar.bootsnav.sidebar-nav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_header_menu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_menu_hover_text_color ) { ?>
/* Menu Hover Color */
nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li.on > a, nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li.dropdown.on > a, nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li > a:hover, nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li.current-menu-ancestor > a, nav.navbar.bootsnav.sidebar-nav .navbar-left-sidebar > li.current-menu-item > a, .sidebar-nav-style-1 .header-sidebar-wrap ul li a:hover, .sidebar-nav-style-1 .copyright-wrap a:hover, header nav.navbar .navbar-nav > li.dropdown.on > a, header nav.navbar.bootsnav ul.nav > li.dropdown.on > a, header.site-header > .header-mini-cart .widget_shopping_cart:hover .widget-title:before { <?php echo esc_html( $pofo_menu_hover_text_color ) ?> }
<?php } ?>

<?php if( $pofo_header_submenu_background_color ) { ?>
/* Submenu Background Color */
.sidebar-nav-style-1 .dropdown .second-level { <?php echo esc_html( $pofo_header_submenu_background_color ) ?> }
<?php } ?>

<?php if( $pofo_header_third_level_menu_background_color ) { ?>
/* Submenu Third Level Background Color */
.sidebar-nav-style-1 .dropdown .third-level { <?php echo esc_html( $pofo_header_third_level_menu_background_color ) ?> }
<?php } ?>

<?php if( $pofo_header_submenu_separator_color ) { ?>
/* Mega Menu Heading Color */
nav.navbar.bootsnav.navbar-left-sidebar ul.nav > li > a, nav.sidebar-nav-style-1.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, nav.sidebar-nav-style-1.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a, nav.navbar.bootsnav.sidebar-nav ul.nav li.dropdown.open ul.dropdown-menu > li > a { <?php echo esc_html( $pofo_header_submenu_separator_color ) ?> }
<?php } ?>
    
<?php if( $pofo_header_submenu_text_color || $pofo_header_submenu_text_font_size || $pofo_header_submenu_text_line_height || $pofo_header_submenu_text_letter_spacing || $pofo_header_submenu_icon_font_size ) { ?>
/* Submenu Text Color and Font Settings */
nav.navbar.bootsnav.navbar-left-sidebar ul.nav > li > a, nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu > li > a, nav.navbar.bootsnav.sidebar-nav .navbar-nav > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_text_color.$pofo_header_submenu_text_font_size.$pofo_header_submenu_text_line_height.$pofo_header_submenu_text_letter_spacing ) ?> }

    <?php if( $pofo_header_submenu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        nav.navbar.bootsnav.sidebar-nav .navbar-nav > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>

<?php if( $pofo_header_submenu_hover_color ) { ?>
/* Submenu Hover Color */
nav.navbar.bootsnav.sidebar-nav ul.nav.navbar-left-sidebar li.dropdown ul.dropdown-menu li > a:hover, nav.navbar.bootsnav.sidebar-nav ul.nav.navbar-left-sidebar li.dropdown ul.dropdown-menu li:hover > a, nav.navbar.bootsnav.sidebar-nav ul.nav.navbar-left-sidebar li.dropdown ul.dropdown-menu li.active > a, nav.navbar.bootsnav.sidebar-nav ul.nav.navbar-left-sidebar li.dropdown ul.dropdown-menu li.current-menu-item > a, nav.navbar.bootsnav.sidebar-nav ul.nav.navbar-left-sidebar li.dropdown ul.dropdown-menu li.current-menu-ancestor > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
<?php } ?>