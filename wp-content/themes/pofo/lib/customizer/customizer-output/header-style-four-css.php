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
    $pofo_header_submenu_hover_separator_color = !empty( $pofo_header_submenu_hover_color ) ? ' border-color: '.$pofo_header_submenu_hover_color.';' : '';
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
header .sidebar-part2 nav.navbar.bootsnav ul > li > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_menu_text_transform ) ?> }
<?php } ?>

<?php if( !empty( $pofo_header_submenu_text_transform ) ) { ?>
/* Header submenu text transform */
header .sidebar-part2 nav.navbar.bootsnav ul li ul li a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_text_transform ) ?> }
<?php } ?>

<?php if( $pofo_header_background_color ) { ?>
/* Header Background Color */
.sidebar-part2 .right-bg, .sidebar-part2, .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu:before, .left-nav, .left-nav-sidebar header.site-header > .header-mini-cart .widget_shopping_cart { <?php echo esc_html( $pofo_header_background_color ) ?> }
<?php } ?>
    
<?php if( $pofo_menu_text_color || $pofo_header_menu_text_font_size || $pofo_header_menu_text_line_height || $pofo_header_menu_text_letter_spacing || $pofo_header_menu_icon_font_size ) { ?>
    
    /* Menu Color and Font Settings */
    header .sidebar-part2 nav.navbar.bootsnav ul > li > a, header #lang_sel a, header #lang_sel a.lang_sel_sel, .sidebar-part2 .header-sidebar-wrap ul li a, .left-nav-sidebar header.site-header > .header-mini-cart .widget_shopping_cart .widget-title:before, header .sidebar-part2 nav.navbar.bootsnav ul > li > a > i.fa-angle-right, .sidebar-part2 .search-box .add-on i, header .sidebar-part2 nav.navbar.bootsnav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_menu_text_color.$pofo_header_menu_text_font_size.$pofo_header_menu_text_line_height.$pofo_header_menu_text_letter_spacing ) ?> }

    <?php if( $pofo_slide_menu_color ) { ?>
        /* Slide Menu Color */
        .nav-icon span, .sidebar-part2 .right-bg::before, .sidebar-part2::before { <?php echo esc_html( $pofo_slide_menu_color ) ?> }
    <?php } ?>
    <?php if( $pofo_menu_separator_color ) { ?>
        /* Menu Separator Color */
        .sidebar-part2, .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu:before  { <?php echo esc_html( $pofo_menu_separator_color ) ?> }
    <?php } ?>
    <?php if( $pofo_header_menu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        header #lang_sel a, header #lang_sel a.lang_sel_sel, .sidebar-part2 .header-sidebar-wrap ul li a, .left-nav-sidebar header.site-header > .header-mini-cart .widget_shopping_cart .widget-title:before, header .sidebar-part2 nav.navbar.bootsnav ul > li > a > i.fa-angle-right, .sidebar-part2 .search-box .add-on i, header .sidebar-part2 nav.navbar.bootsnav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_header_menu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_menu_hover_text_color ) { ?>
    /* Menu Hover Color */
    header .sidebar-part2 nav.navbar.bootsnav ul.nav > li > a:hover, header .sidebar-part2 nav.navbar.bootsnav ul.nav > li.dropdown.on > a, .sidebar-part2 nav.navbar.bootsnav ul.nav > li.active > a, .sidebar-part2 nav.navbar.bootsnav ul.nav > li.current-menu-ancestor > a, .sidebar-part2 nav.navbar.bootsnav ul.nav > li.current-menu-item > a, .sidebar-part2 .header-sidebar-wrap ul li a:hover, header .sidebar-part2 nav.navbar.bootsnav .navbar-nav li:hover > a, .left-nav-sidebar header.site-header > .header-mini-cart .widget_shopping_cart:hover .widget-title:before { <?php echo esc_html( $pofo_menu_hover_text_color ) ?> }
    <?php if( $pofo_slide_menu_hover_color ) { ?>
        /* Menu Slide Icon Hover Color */
        .nav-icon:hover span, .nav-icon.active span { <?php echo esc_html( $pofo_slide_menu_hover_color ) ?> }
    <?php } ?>
<?php } ?>

<?php if( $pofo_header_submenu_background_color ) { ?>
/* Mega Menu Background Color */
.sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu::before { <?php echo esc_html( $pofo_header_submenu_background_color ) ?> }
<?php } ?>

<?php if( $pofo_header_third_level_menu_background_color ) { ?>
/* Third Level Mega Menu Background Color */
.sidebar-part2 nav.navbar.bootsnav li.dropdown li.dropdown ul.dropdown-menu::before { <?php echo esc_html( $pofo_header_third_level_menu_background_color ) ?> }
<?php } ?>

<?php if( $pofo_header_submenu_separator_color ) { ?>
/* Submenu Separator Color */
header .sidebar-part2 nav.navbar.bootsnav ul li ul li a { <?php echo esc_html( $pofo_header_submenu_separator_color ) ?> }
<?php } ?>

<?php if( $pofo_header_submenu_text_color || $pofo_header_submenu_text_font_size || $pofo_header_submenu_text_line_height || $pofo_header_submenu_text_letter_spacing || $pofo_header_submenu_icon_font_size ) { ?>

    /* Submenu Text Color and Font Settings */
    header .sidebar-part2 nav.navbar.bootsnav ul li ul li a, .sidebar-part2 nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu > li > a, header .sidebar-part2 nav.navbar.bootsnav .navbar-nav > li ul > li > a > i, header .sidebar-part2 nav.navbar.bootsnav ul > li > .second-level > li a i.fa-angle-right { <?php echo esc_html( $pofo_header_submenu_text_color.$pofo_header_submenu_text_font_size.$pofo_header_submenu_text_line_height.$pofo_header_submenu_text_letter_spacing ) ?> }
    
    <?php if( $pofo_header_submenu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        header .sidebar-part2 nav.navbar.bootsnav .navbar-nav > li ul > li > a > i, header .sidebar-part2 nav.navbar.bootsnav ul > li > .second-level > li a i.fa-angle-right { <?php echo esc_html( $pofo_header_submenu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>

<?php if( $pofo_header_submenu_hover_color ) { ?>
    /* Submenu Hover Color */
    header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.active > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-item > a, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li.current-menu-ancestor > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }

    <?php if( $pofo_header_submenu_hover_separator_color ) { ?>
        /* Submenu Hover Separator Color */
        header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li a:hover, header .sidebar-part2 nav.navbar.bootsnav li.dropdown ul.dropdown-menu > li:hover > a { <?php echo esc_html( $pofo_header_submenu_hover_separator_color ) ?> }
    <?php } ?>
<?php } ?>