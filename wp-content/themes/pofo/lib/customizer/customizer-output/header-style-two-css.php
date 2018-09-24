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
    $pofo_hamburger_menu_text_transform     = pofo_option( 'pofo_hamburger_menu_text_transform', '' );
    $pofo_header_submenu_heading_text_transform = pofo_option( 'pofo_header_submenu_heading_text_transform', '' );
    $pofo_header_submenu_text_transform     = pofo_option( 'pofo_header_submenu_text_transform', '' );

    // Header Color Settings
    $pofo_header_background_color           = pofo_option( 'pofo_header_background_color', '' );
    $pofo_menu_text_color                   = pofo_option( 'pofo_menu_text_color', '' );
    $pofo_menu_hover_text_color             = pofo_option( 'pofo_menu_hover_text_color', '' );
    $pofo_hamburger_menu_text_color         = pofo_option( 'pofo_hamburger_menu_text_color', '' );
    $pofo_hamburger_menu_hover_text_color   = pofo_option( 'pofo_hamburger_menu_hover_text_color', '' );

    // Header Menu Text Color
    $pofo_slide_menu_color                  = !empty( $pofo_menu_text_color ) ? ' background-color: '.$pofo_menu_text_color.';' : '';
    $pofo_menu_separator_color              = !empty( $pofo_menu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_menu_text_color, 1 ).';' : '';
    $pofo_menu_text_color                   = !empty( $pofo_menu_text_color ) ? ' color: '.$pofo_menu_text_color.';' : '';
    $pofo_hamburger_slide_menu_color        = !empty( $pofo_hamburger_menu_text_color ) ? ' background-color: '.$pofo_hamburger_menu_text_color.';' : '';
    $pofo_hamburger_menu_text_color         = !empty( $pofo_hamburger_menu_text_color ) ? ' color: '.$pofo_hamburger_menu_text_color.';' : '';

    // Header Menu Hover Text Color
    $pofo_slide_menu_hover_color            = !empty( $pofo_menu_hover_text_color ) ? ' background-color: '.$pofo_menu_hover_text_color.';' : '';
    $pofo_menu_hover_text_color             = !empty( $pofo_menu_hover_text_color ) ? ' color: '.$pofo_menu_hover_text_color.';' : '';
    $pofo_hamburger_menu_hover_text_color   = !empty( $pofo_hamburger_menu_hover_text_color ) ? ' color: '.$pofo_hamburger_menu_hover_text_color.';' : '';
    
    // Header Font Settings
    $pofo_header_menu_icon_font_size        = pofo_option( 'pofo_header_menu_icon_font_size', '' );
    $pofo_header_menu_icon_font_size        = !empty( $pofo_header_menu_icon_font_size ) ? ' font-size: '.$pofo_header_menu_icon_font_size.';' : '';

    // Hamburger Menu Font Settings
    $pofo_hamburger_menu_text_font_size     = pofo_option( 'pofo_hamburger_menu_text_font_size', '' );
    $pofo_hamburger_menu_text_line_height   = pofo_option( 'pofo_hamburger_menu_text_line_height', '' );
    $pofo_hamburger_menu_text_letter_spacing= pofo_option( 'pofo_hamburger_menu_text_letter_spacing', '' );
    $pofo_hamburger_menu_icon_font_size     = pofo_option( 'pofo_hamburger_menu_icon_font_size', '' );

    $pofo_hamburger_menu_text_font_size     = !empty( $pofo_hamburger_menu_text_font_size ) ? ' font-size: '.$pofo_hamburger_menu_text_font_size.';' : '';
    $pofo_hamburger_menu_text_line_height   = !empty( $pofo_hamburger_menu_text_line_height ) ? ' line-height: '.$pofo_hamburger_menu_text_line_height.';' : '';
    $pofo_hamburger_menu_text_letter_spacing= !empty( $pofo_hamburger_menu_text_letter_spacing ) ? ' letter-spacing: '.$pofo_hamburger_menu_text_letter_spacing.';' : '';
    $pofo_hamburger_menu_icon_font_size     = !empty( $pofo_hamburger_menu_icon_font_size ) ? ' font-size: '.$pofo_hamburger_menu_icon_font_size.';' : '';
    
    // Sticky Header Color Settings
    $pofo_sticky_header_background_color    = pofo_option( 'pofo_sticky_header_background_color', '#ffffff' );
    $pofo_sticky_menu_text_color            = pofo_option( 'pofo_sticky_menu_text_color', '#232323' );
    $pofo_sticky_menu_hover_text_color      = pofo_option( 'pofo_sticky_menu_hover_text_color', 'rgba(0,0,0,0.6)' );
    
    // Sticky Header Background Color
    $pofo_sticky_header_background_color    = !empty( $pofo_sticky_header_background_color ) ? ' background-color: '.$pofo_sticky_header_background_color.' !important;' : '';
    
    // Sticky Header Menu Color
    $pofo_sticky_slide_menu_color           = !empty( $pofo_sticky_menu_text_color ) ? ' background-color: '.$pofo_sticky_menu_text_color.';' : '';
    $pofo_sticky_menu_separator_color       = !empty( $pofo_sticky_menu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_sticky_menu_text_color, '0.25' ).' !important;' : '';
    $pofo_sticky_menu_text_color            = !empty( $pofo_sticky_menu_text_color ) ? ' color: '.$pofo_sticky_menu_text_color.';' : '';
    
    // Sticky Header Menu Hover Color
    $pofo_sticky_slide_menu_hover_color     = !empty( $pofo_sticky_menu_hover_text_color ) ? ' background-color: '.$pofo_sticky_menu_hover_text_color.' !important;' : '';
    $pofo_sticky_menu_hover_text_color      = !empty( $pofo_sticky_menu_hover_text_color ) ? ' color: '.$pofo_sticky_menu_hover_text_color.';' : '';
    
    // Header Submenu Color Settings
    $pofo_header_submenu_background_color   = pofo_option( 'pofo_header_submenu_background_color', '' );
    $pofo_header_submenu_heading_color      = pofo_option( 'pofo_header_submenu_heading_color', '' );
    $pofo_header_submenu_text_color         = pofo_option( 'pofo_header_submenu_text_color', '' );
    $pofo_header_submenu_hover_color        = pofo_option( 'pofo_header_submenu_hover_color', '' );

    $pofo_header_submenu_background_color   = !empty( $pofo_header_submenu_background_color ) ? ' background-color: '.$pofo_header_submenu_background_color.';' : '';
    $pofo_header_submenu_heading_color      = !empty( $pofo_header_submenu_heading_color ) ? ' color: '.$pofo_header_submenu_heading_color.' !important;' : '';
    $pofo_header_submenu_separator_color    = !empty( $pofo_header_submenu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_header_submenu_text_color, 1 ).';' : '';
    $pofo_header_submenu_text_color         = !empty( $pofo_header_submenu_text_color ) ? ' color: '.$pofo_header_submenu_text_color.';' : '';
    $pofo_header_submenu_hover_color        = !empty( $pofo_header_submenu_hover_color ) ? ' color: '.$pofo_header_submenu_hover_color.';' : '';
    
    // Header Submenu Heading Font Settings
    $pofo_header_submenu_heading_font_size  = pofo_option( 'pofo_header_submenu_heading_font_size', '' );
    $pofo_header_submenu_heading_line_height= pofo_option( 'pofo_header_submenu_heading_line_height', '' );
    $pofo_header_submenu_heading_letter_spacing = pofo_option( 'pofo_header_submenu_heading_letter_spacing', '' );

    $pofo_header_submenu_heading_font_size  = !empty( $pofo_header_submenu_heading_font_size ) ? ' font-size: '.$pofo_header_submenu_heading_font_size.';' : '';
    $pofo_header_submenu_heading_line_height= !empty( $pofo_header_submenu_heading_line_height ) ? ' line-height: '.$pofo_header_submenu_heading_line_height.';' : '';
    $pofo_header_submenu_heading_letter_spacing = !empty( $pofo_header_submenu_heading_letter_spacing ) ? ' letter-spacing: '.$pofo_header_submenu_heading_letter_spacing.';' : '';

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

<?php if( !empty( $pofo_hamburger_menu_text_transform ) ) { ?>
/* Header menu text transform */
.full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 > li > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_hamburger_menu_text_transform ) ?> }
<?php } ?>

<?php if( !empty( $pofo_header_submenu_heading_text_transform ) ) { ?>
/* Heading text transform */
.full-width-pull-menu .dropdown.open ul li a.dropdown-header, .full-width-pull-menu .dropdown ul li.menu-item-has-children > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_heading_text_transform ) ?> }
<?php } ?>    
    
<?php if( !empty( $pofo_header_submenu_text_transform ) ) { ?>
    /* Header submenu text transform */
    .full-width-pull-menu .dropdown.open ul li ul li a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_text_transform ) ?> }
<?php } ?>    

<?php if( $pofo_header_background_color ) { ?>
/* Header Background Color */
header nav.full-width-pull-menu { background-color: <?php echo esc_html( $pofo_header_background_color ) ?>; }
<?php } ?>
    
<?php if( $pofo_menu_text_color || $pofo_header_menu_icon_font_size ) { ?>
    
    /* Menu Color and Font Settings */
    .full-width-pull-menu .header-sidebar-social-icon ul li a, .full-width-pull-menu .header-searchbar a, header nav.navbar .header-menu-button a, header nav.navbar .header-mini-cart .widget-title:before, header #lang_sel a, header #lang_sel a.lang_sel_sel, header .navbar-nav > li.dropdown > i { <?php echo esc_html( $pofo_menu_text_color ) ?> }
    
    <?php if( $pofo_slide_menu_color ) { ?>
        /* Slide Menu Color */
        header nav.navbar .header-menu-button span, header nav.navbar .mobile-toggle span, header nav.navbar .navbar-toggle .icon-bar { <?php echo esc_html( $pofo_slide_menu_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_menu_separator_color ) { ?>
        /* Menu Separator Color */
        .full-width-pull-menu .header-searchbar, .full-width-pull-menu .header-social-icon, header .header-menu-button, .full-width-pull-menu .header-mini-cart .widget_shopping_cart { <?php echo esc_html( $pofo_menu_separator_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_header_menu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        .full-width-pull-menu .header-sidebar-social-icon ul li a, .full-width-pull-menu .header-searchbar a, header nav.navbar .header-menu-button a, header nav.navbar .header-mini-cart .widget-title:before, header #lang_sel a, header #lang_sel a.lang_sel_sel, header .navbar-nav > li.dropdown > i { <?php echo esc_html( $pofo_header_menu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_menu_hover_text_color ) { ?>

    /* Menu Hover Color */
    .full-width-pull-menu .header-sidebar-social-icon ul li a:hover, header #lang_sel a.lang_sel_sel:hover, .full-width-pull-menu .header-searchbar a:hover, .full-width-pull-menu .header-social-icon a:hover, .full-width-pull-menu .widget_shopping_cart .widget-title:hover:before { <?php echo esc_html( $pofo_menu_hover_text_color ) ?> }
    
    <?php if( $pofo_slide_menu_hover_color ) { ?>
        /* Menu Slide Hover Color */
        header nav.navbar.bootsnav .header-menu-button:hover span, header nav.navbar.bootsnav .header-menu-button span:hover, header nav.navbar.full-width-pull-menu .mobile-toggle:hover span { <?php echo esc_html( $pofo_slide_menu_hover_color ) ?> }
    <?php } ?>
<?php } ?>

<?php if( $pofo_hamburger_menu_text_color || $pofo_hamburger_menu_text_font_size || $pofo_hamburger_menu_text_line_height || $pofo_hamburger_menu_text_letter_spacing || $pofo_hamburger_menu_icon_font_size ) { ?>

    /* Menu Color and Font Settings */
    .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 > li > a, .full-width-pull-menu .menu-wrap .widget ul li a, .full-width-pull-menu .hamburger-menu-style1 > li > a > i { <?php echo esc_html( $pofo_hamburger_menu_text_color.$pofo_hamburger_menu_text_font_size.$pofo_hamburger_menu_text_line_height.$pofo_hamburger_menu_text_letter_spacing ) ?> }
    
    <?php if( $pofo_hamburger_slide_menu_color ) { ?>
        /* Slide Menu Color */
        .full-width-pull-menu .dropdown .dropdown-toggle:before, .full-width-pull-menu .dropdown .dropdown-toggle:after, .close-button-menu:after, .close-button-menu:before { <?php echo esc_html( $pofo_hamburger_slide_menu_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_hamburger_menu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        .full-width-pull-menu .menu-wrap .widget ul li a, .full-width-pull-menu .hamburger-menu-style1 > li > a > i { <?php echo esc_html( $pofo_hamburger_menu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_hamburger_menu_hover_text_color ) { ?>
    /* Menu Hover Color */
    .full-width-pull-menu .menu-wrap .widget ul li a:hover, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li a:hover, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li:hover > a, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.open  > a, .full-width-pull-menu .menu-wrap ul li.current-menu-ancestor > a, .full-width-pull-menu .menu-wrap ul li.current-menu-item > a, .full-width-pull-menu .dropdown.open ul li.current-menu-ancestor .dropdown-header a, .full-width-pull-menu .dropdown.open ul li.current-menu-ancestor .dropdown-header, .full-width-pull-menu .dropdown.open ul li.current-menu-item .dropdown-header a, .full-width-pull-menu .dropdown.open ul li.current-menu-item .dropdown-header { <?php echo esc_html( $pofo_hamburger_menu_hover_text_color ) ?> }
<?php } ?>

<?php if( $pofo_sticky_header_background_color ) { ?>
    /* Sticky Header Background Color */
    header.sticky nav.full-width-pull-menu { <?php echo esc_html( $pofo_sticky_header_background_color ) ?> }
<?php } ?>

<?php if( $pofo_sticky_menu_text_color ) { ?>
    /* Menu Color */
    header.sticky .full-width-pull-menu .header-sidebar-social-icon ul li a, header.sticky .full-width-pull-menu .header-searchbar a, header.sticky nav.navbar.full-width-pull-menu .header-menu-button a, header.sticky nav.navbar.full-width-pull-menu .header-mini-cart .widget-title:before, header.sticky #lang_sel a, header.sticky #lang_sel a.lang_sel_sel, header.sticky .navbar-nav.full-width-pull-menu > li.dropdown > i { <?php echo esc_html( $pofo_sticky_menu_text_color ) ?> }

    <?php if( $pofo_sticky_slide_menu_color ) { ?>
        /* Slide Menu Color */
        header.sticky nav.navbar.full-width-pull-menu .header-menu-button span, header.sticky nav.navbar.full-width-pull-menu .mobile-toggle span, header.sticky nav.navbar.full-width-pull-menu .navbar-toggle .icon-bar { <?php echo esc_html( $pofo_sticky_slide_menu_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_sticky_menu_separator_color ) { ?>
        /* Menu Separator Color */
        header.sticky .full-width-pull-menu .header-searchbar, header.sticky .full-width-pull-menu .header-social-icon, header.sticky .full-width-pull-menu .header-menu-button, header.sticky .full-width-pull-menu .header-mini-cart .widget_shopping_cart { <?php echo esc_html( $pofo_sticky_menu_separator_color ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_sticky_menu_hover_text_color ) { ?>
    /* Menu Hover Color */
    header.sticky .full-width-pull-menu .header-sidebar-social-icon ul li a:hover, header.sticky #lang_sel a.lang_sel_sel:hover, header.sticky .full-width-pull-menu .header-searchbar a:hover, header.sticky .full-width-pull-menu .header-social-icon a:hover, header.sticky .full-width-pull-menu .widget_shopping_cart .widget-title:hover:before { <?php echo esc_html( $pofo_sticky_menu_hover_text_color ) ?> }
    
    <?php if( $pofo_sticky_slide_menu_hover_color ) { ?>
        /* Menu Slide Hover Color */
        header.sticky nav.navbar.bootsnav .header-menu-button:hover span, header.sticky nav.navbar.bootsnav .header-menu-button span:hover, header.sticky nav.navbar.full-width-pull-menu .mobile-toggle:hover span { <?php echo esc_html( $pofo_sticky_slide_menu_hover_color ) ?> }
    <?php } ?>
<?php } ?>

/* Header Submenu Background Color */
<?php if( $pofo_header_submenu_background_color ) { ?>
    /* Mega Menu Background Color */
    nav.navbar.bootsnav li.dropdown .mega-menu-full { <?php echo esc_html( $pofo_header_submenu_background_color ) ?> }
    /* Simple Menu Background Color */
    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown .dropdown-menu { <?php echo esc_html( $pofo_header_submenu_background_color ) ?> }
<?php } ?>

/* Header Submenu Heading Color */
<?php if( $pofo_header_submenu_heading_color || $pofo_header_submenu_heading_font_size || $pofo_header_submenu_heading_line_height || $pofo_header_submenu_heading_letter_spacing ) { ?>

    /* Mega Menu Heading Color and Font Settings */
    .full-width-pull-menu .dropdown.open ul li .dropdown-header a, .full-width-pull-menu .dropdown.open ul li .dropdown-header, .full-width-pull-menu .hamburger-menu-style1 > li ul > li > .dropdown-header a > i { <?php echo esc_html( $pofo_header_submenu_heading_color.$pofo_header_submenu_heading_font_size.$pofo_header_submenu_heading_line_height.$pofo_header_submenu_heading_letter_spacing ) ?> }
<?php } ?>

/* Header Submenu Separator Color */
<?php if( $pofo_header_submenu_separator_color ) { ?>
    /* Mega Menu Heading Color */
    .full-width-pull-menu .dropdown ul li { <?php echo esc_html( $pofo_header_submenu_separator_color ) ?> }
<?php } ?>

/* Header Submenu Text Color */
<?php if( $pofo_header_submenu_text_color || $pofo_header_submenu_text_font_size || $pofo_header_submenu_text_line_height || $pofo_header_submenu_text_letter_spacing || $pofo_header_submenu_icon_font_size ) { ?>

    /* Simple and Mega Menu Text Color and Font Settings */
    .full-width-pull-menu .dropdown ul li a, .full-width-pull-menu .dropdown.open ul li ul li a, .full-width-pull-menu .hamburger-menu-style1 > li ul > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_text_color.$pofo_header_submenu_text_font_size.$pofo_header_submenu_text_line_height.$pofo_header_submenu_text_letter_spacing ) ?> }

    <?php if( $pofo_header_submenu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        .full-width-pull-menu .hamburger-menu-style1 > li ul > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>

/* Header Submenu Hover Color */
<?php if( $pofo_header_submenu_hover_color ) { ?>
    /* Simple and Mega Menu Hover Color */
    .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.dropdown ul > li > a:hover, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.dropdown ul > li:hover > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
    /* Simple and Mega Menu Active Color */
    .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.dropdown ul > li.current-menu-ancestor > a, .full-width-pull-menu .menu-wrap ul.hamburger-menu-style1 li.dropdown ul > li.current-menu-item > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
<?php } ?>