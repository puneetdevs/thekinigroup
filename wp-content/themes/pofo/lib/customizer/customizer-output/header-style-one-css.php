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
    $pofo_header_menu_text_transform            = pofo_option( 'pofo_header_menu_text_transform', '' );
    $pofo_header_submenu_heading_text_transform = pofo_option( 'pofo_header_submenu_heading_text_transform', '' );
    $pofo_header_submenu_text_transform         = pofo_option( 'pofo_header_submenu_text_transform', '' );

    // Header Color Settings
    $pofo_header_background_color               = pofo_option( 'pofo_header_background_color', '' );
    $pofo_menu_text_color                       = pofo_option( 'pofo_menu_text_color', '' );
    $pofo_menu_hover_text_color                 = pofo_option( 'pofo_menu_hover_text_color', '' );

    // Header Menu Text Color
    $pofo_slide_menu_color                      = !empty( $pofo_menu_text_color ) ? ' background-color: '.$pofo_menu_text_color.';' : '';
    $pofo_menu_separator_color                  = !empty( $pofo_menu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_menu_text_color ).';' : '';
    $pofo_menu_text_color                       = !empty( $pofo_menu_text_color ) ? ' color: '.$pofo_menu_text_color.';' : '';

    // Header Menu Hover Text Color
    $pofo_slide_menu_hover_color                = !empty( $pofo_menu_hover_text_color ) ? ' background-color: '.$pofo_menu_hover_text_color.';' : '';
    $pofo_menu_hover_text_color                 = !empty( $pofo_menu_hover_text_color ) ? ' color: '.$pofo_menu_hover_text_color.';' : '';
    
    // Header Font Settings
    $pofo_header_menu_text_font_size            = pofo_option( 'pofo_header_menu_text_font_size', '' );
    $pofo_header_menu_text_line_height          = pofo_option( 'pofo_header_menu_text_line_height', '' );
    $pofo_header_menu_text_letter_spacing       = pofo_option( 'pofo_header_menu_text_letter_spacing', '' );
    $pofo_header_menu_icon_font_size            = pofo_option( 'pofo_header_menu_icon_font_size', '' );

    $pofo_header_menu_text_font_size            = !empty( $pofo_header_menu_text_font_size ) ? ' font-size: '.$pofo_header_menu_text_font_size.';' : '';
    $pofo_header_menu_text_line_height          = !empty( $pofo_header_menu_text_line_height ) ? ' line-height: '.$pofo_header_menu_text_line_height.';' : '';
    $pofo_header_menu_text_letter_spacing       = !empty( $pofo_header_menu_text_letter_spacing ) ? ' letter-spacing: '.$pofo_header_menu_text_letter_spacing.';' : '';
    $pofo_header_menu_icon_font_size            = !empty( $pofo_header_menu_icon_font_size ) ? ' font-size: '.$pofo_header_menu_icon_font_size.';' : '';

    // Sticky Header Color Settings
    $pofo_sticky_header_background_color        = pofo_option( 'pofo_sticky_header_background_color', '#ffffff' );
    $pofo_sticky_menu_text_color                = pofo_option( 'pofo_sticky_menu_text_color', '#232323' );
    $pofo_sticky_menu_hover_text_color          = pofo_option( 'pofo_sticky_menu_hover_text_color', 'rgba(0,0,0,0.6)' );
    
    // Sticky Header Menu Color
    $pofo_sticky_slide_menu_color               = !empty( $pofo_sticky_menu_text_color ) ? ' background-color: '.$pofo_sticky_menu_text_color.';' : '';
    $pofo_sticky_menu_separator_color           = !empty( $pofo_sticky_menu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_sticky_menu_text_color, '0.25' ).' !important;' : '';
    $pofo_sticky_menu_text_color                = !empty( $pofo_sticky_menu_text_color ) ? ' color: '.$pofo_sticky_menu_text_color.';' : '';
    
    // Sticky Header Menu Hover Color
    $pofo_sticky_slide_menu_hover_color         = !empty( $pofo_sticky_menu_hover_text_color ) ? ' background-color: '.$pofo_sticky_menu_hover_text_color.' !important;' : '';
    $pofo_sticky_menu_hover_text_color          = !empty( $pofo_sticky_menu_hover_text_color ) ? ' color: '.$pofo_sticky_menu_hover_text_color.';' : '';
    
    // Header Submenu Color Settings
    $pofo_header_submenu_background_color       = pofo_option( 'pofo_header_submenu_background_color', '' );
    $pofo_header_submenu_heading_color          = pofo_option( 'pofo_header_submenu_heading_color', '' );
    $pofo_header_submenu_text_color             = pofo_option( 'pofo_header_submenu_text_color', '' );
    $pofo_header_submenu_hover_color            = pofo_option( 'pofo_header_submenu_hover_color', '' );

    $pofo_header_submenu_background_color       = !empty( $pofo_header_submenu_background_color ) ? ' background-color: '.$pofo_header_submenu_background_color.';' : '';
    $pofo_header_submenu_heading_color          = !empty( $pofo_header_submenu_heading_color ) ? ' color: '.$pofo_header_submenu_heading_color.' !important;' : '';
    $pofo_header_submenu_separator_color        = !empty( $pofo_header_submenu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_header_submenu_text_color ).';' : '';
    $pofo_header_submenu_text_color             = !empty( $pofo_header_submenu_text_color ) ? ' color: '.$pofo_header_submenu_text_color.';' : '';
    $pofo_header_submenu_hover_color            = !empty( $pofo_header_submenu_hover_color ) ? ' color: '.$pofo_header_submenu_hover_color.';' : '';
    
    // Header Submenu Heading Font Settings
    $pofo_header_submenu_heading_font_size      = pofo_option( 'pofo_header_submenu_heading_font_size', '' );
    $pofo_header_submenu_heading_line_height    = pofo_option( 'pofo_header_submenu_heading_line_height', '' );
    $pofo_header_submenu_heading_letter_spacing = pofo_option( 'pofo_header_submenu_heading_letter_spacing', '' );

    $pofo_header_submenu_heading_font_size      = !empty( $pofo_header_submenu_heading_font_size ) ? ' font-size: '.$pofo_header_submenu_heading_font_size.' !important;' : '';
    $pofo_header_submenu_heading_line_height    = !empty( $pofo_header_submenu_heading_line_height ) ? ' line-height: '.$pofo_header_submenu_heading_line_height.';' : '';
    $pofo_header_submenu_heading_letter_spacing = !empty( $pofo_header_submenu_heading_letter_spacing ) ? ' letter-spacing: '.$pofo_header_submenu_heading_letter_spacing.';' : '';

    // Header Submenu Text Font Settings
    $pofo_header_submenu_text_font_size         = pofo_option( 'pofo_header_submenu_text_font_size', '' );
    $pofo_header_submenu_text_line_height       = pofo_option( 'pofo_header_submenu_text_line_height', '' );
    $pofo_header_submenu_text_letter_spacing    = pofo_option( 'pofo_header_submenu_text_letter_spacing', '' );
    $pofo_header_submenu_icon_font_size         = pofo_option( 'pofo_header_submenu_icon_font_size', '' );

    $pofo_header_submenu_text_font_size         = !empty( $pofo_header_submenu_text_font_size ) ? ' font-size: '.$pofo_header_submenu_text_font_size.';' : '';
    $pofo_header_submenu_text_line_height       = !empty( $pofo_header_submenu_text_line_height ) ? ' line-height: '.$pofo_header_submenu_text_line_height.';' : '';
    $pofo_header_submenu_text_letter_spacing    = !empty( $pofo_header_submenu_text_letter_spacing ) ? ' letter-spacing: '.$pofo_header_submenu_text_letter_spacing.';' : '';
    $pofo_header_submenu_icon_font_size         = !empty( $pofo_header_submenu_icon_font_size ) ? ' font-size: '.$pofo_header_submenu_icon_font_size.';' : '';

    // Mobile Menu Color Settings
    $pofo_header_mobile_menu_background_color   = pofo_option( 'pofo_header_mobile_menu_background_color', '' );
    $pofo_header_mobile_menu_text_color         = pofo_option( 'pofo_header_mobile_menu_text_color', '' );
    $pofo_header_mobile_menu_hover_color        = pofo_option( 'pofo_header_mobile_menu_hover_color', '' );
    $pofo_header_mobile_submenu_background_color= pofo_option( 'pofo_header_mobile_submenu_background_color', '' );
    $pofo_header_mobile_submenu_heading_color   = pofo_option( 'pofo_header_mobile_submenu_heading_color', '' );
    $pofo_header_mobile_submenu_text_color      = pofo_option( 'pofo_header_mobile_submenu_text_color', '' );
    $pofo_header_mobile_submenu_hover_color     = pofo_option( 'pofo_header_mobile_submenu_hover_color', '' );

    $pofo_header_mobile_menu_background_color   = !empty( $pofo_header_mobile_menu_background_color ) ? ' background-color: '.$pofo_header_mobile_menu_background_color.' !important;' : '';
    $pofo_header_mobile_menu_separator_color    = !empty( $pofo_header_mobile_menu_text_color ) ? ' border-color: '.pofo_hex2rgb( $pofo_header_mobile_menu_text_color ).' !important;' : '';
    $pofo_header_mobile_menu_text_color         = !empty( $pofo_header_mobile_menu_text_color ) ? ' color: '.$pofo_header_mobile_menu_text_color.' !important;' : '';
    $pofo_header_mobile_menu_hover_color        = !empty( $pofo_header_mobile_menu_hover_color ) ? ' color: '.$pofo_header_mobile_menu_hover_color.' !important;' : '';

    $pofo_header_mobile_submenu_background_color= !empty( $pofo_header_mobile_submenu_background_color ) ? ' background-color: '.$pofo_header_mobile_submenu_background_color.' !important;' : '';
    $pofo_header_mobile_submenu_heading_color   = !empty( $pofo_header_mobile_submenu_heading_color ) ? ' color: '.$pofo_header_mobile_submenu_heading_color.' !important;' : '';
    $pofo_header_mobile_submenu_text_color      = !empty( $pofo_header_mobile_submenu_text_color ) ? ' color: '.$pofo_header_mobile_submenu_text_color.' !important;' : '';
    $pofo_header_mobile_submenu_hover_color     = !empty( $pofo_header_mobile_submenu_hover_color ) ? ' color: '.$pofo_header_mobile_submenu_hover_color.' !important;' : '';
?>

<?php if( !empty( $pofo_header_menu_text_transform ) ) { ?>
	/* Header menu text transform */
    header nav .navbar-nav > li > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_menu_text_transform ) ?> }
<?php } ?>

<?php if( !empty( $pofo_header_submenu_heading_text_transform ) ) { ?>
	/* Heading text transform */
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a.dropdown-header, .full-width-pull-menu .dropdown ul li.menu-item-has-children > a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_heading_text_transform ) ?> }
<?php } ?>    

<?php if( !empty( $pofo_header_submenu_text_transform ) ) { ?>
	/* Header submenu text transform */
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a { text-transform: <?php echo str_replace( 'text-', '', $pofo_header_submenu_text_transform ) ?> }
<?php } ?>    

<?php if( $pofo_header_background_color ) { ?>
	/* Header Background Color */
    header nav.navbar-default, header nav.navbar.bootsnav { background-color: <?php echo esc_html( $pofo_header_background_color ) ?>; }
<?php } ?>

<?php if( $pofo_menu_text_color || $pofo_header_menu_text_font_size || $pofo_header_menu_text_line_height || $pofo_header_menu_text_letter_spacing || $pofo_header_menu_icon_font_size ) { ?>

    /* Menu Color and Font Settings */
    header nav.navbar.bootsnav ul.nav > li > a, header .header-social-icon a, header .header-social-icon ul li a, header .header-searchbar a, header nav.navbar .header-menu-button a, header nav.navbar .header-mini-cart .widget-title:before, header #lang_sel a, header #lang_sel a.lang_sel_sel, header .navbar-nav > li.dropdown > i, header nav.navbar.bootsnav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_menu_text_color.$pofo_header_menu_text_font_size.$pofo_header_menu_text_line_height.$pofo_header_menu_text_letter_spacing ) ?> }
    
    <?php if( $pofo_slide_menu_color ) { ?>
        /* Slide Menu Color */
        header nav.navbar .header-menu-button span, header nav.navbar .mobile-toggle span, header nav.navbar .navbar-toggle .icon-bar { <?php echo esc_html( $pofo_slide_menu_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_menu_separator_color ) { ?>
        /* Menu Separator Color */
        header .header-searchbar, header .header-social-icon, header .header-menu-button, header.sticky .header-searchbar, header.sticky .header-social-icon, header .widget_shopping_cart { <?php echo esc_html( $pofo_menu_separator_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_header_menu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        header .header-social-icon a, header .header-searchbar a, header nav.navbar .header-menu-button a, header nav.navbar .header-mini-cart .widget-title:before, header #lang_sel a, header #lang_sel a.lang_sel_sel, header .navbar-nav > li.dropdown > i, header nav.navbar.bootsnav .navbar-nav > li > a > i { <?php echo esc_html( $pofo_header_menu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_menu_hover_text_color ) { ?>
    /* Menu Hover Color */
    header nav.navbar.bootsnav ul.nav > li.current-menu-item > a, header nav.navbar.bootsnav ul.nav > li.current-menu-ancestor > a, header nav.navbar.bootsnav ul.nav > li > a:hover, header nav.navbar.bootsnav .header-social-icon a:hover, header nav.navbar.bootsnav .header-searchbar a:hover, header nav.navbar .header-menu-button a:hover, header nav.navbar .header-mini-cart .widget-title:hover:before, header #lang_sel a.lang_sel_sel:hover, header nav.navbar.bootsnav ul.nav > li.dropdown.on > a, .navbar-nav > li a.active, header nav.navbar .navbar-nav > li > a.active, nav.navbar.bootsnav ul.nav > li > a.active, header.sticky nav.navbar .navbar-nav > li > a.active, header.sticky nav.navbar.navbar-default.navbar-fixed-top ul.nav > li > a.active, header.sticky nav.navbar ul.nav > li > a.active, header nav.navbar.bootsnav .header-searchbar a:focus { <?php echo esc_html( $pofo_menu_hover_text_color ) ?> }
    
    <?php if( $pofo_slide_menu_hover_color ) { ?>
        /* Menu Slide Hover Color */
        header nav.navbar.bootsnav .header-menu-button:hover span, header nav.navbar.bootsnav .header-menu-button span:hover, header nav.navbar.bootsnav .mobile-toggle:hover span { <?php echo esc_html( $pofo_slide_menu_hover_color ) ?> }
    <?php } ?>
<?php } ?>

<?php if( $pofo_sticky_header_background_color ) { ?>
    /* Sticky Header Background Color */
    header.sticky nav.navbar-default, header.sticky nav.navbar.bootsnav { background-color: <?php echo esc_html( $pofo_sticky_header_background_color ) ?> !important; }
<?php } ?>

<?php if( $pofo_sticky_menu_text_color ) { ?>
    /* Sticky Menu Color */
    header.sticky nav.navbar .navbar-nav > li > a, header.sticky nav.navbar.navbar-default.navbar-fixed-top ul.nav > li > a, header.sticky nav.navbar .header-social-icon a, header.sticky nav.navbar .header-searchbar a, header.sticky nav.navbar ul.nav > li > a, header.sticky nav.navbar .header-menu-button a, header.sticky nav.navbar .header-mini-cart .widget-title:before, header.sticky nav.navbar .header-menu-button span, header.sticky #lang_sel a, header.sticky #lang_sel a.lang_sel_sel, header.sticky .navbar-nav > li.dropdown > i { <?php echo esc_html( $pofo_sticky_menu_text_color ) ?> }
    
    <?php if( $pofo_sticky_slide_menu_color ) { ?>
        /* Sticky Slide Menu Color */
        header.sticky nav.navbar .header-menu-button span, header.sticky nav.navbar .navbar-toggle .icon-bar { <?php echo esc_html( $pofo_sticky_slide_menu_color ) ?> }
    <?php } ?>
    
    <?php if( $pofo_sticky_menu_separator_color ) { ?>
        /* Sticky Menu Separator Color */
        header.sticky .header-searchbar, header.sticky .header-social-icon, header.sticky .header-menu-button, header.sticky .widget_shopping_cart { <?php echo esc_html( $pofo_sticky_menu_separator_color ) ?> }
    <?php } ?>
<?php } ?>
<?php if( $pofo_sticky_menu_hover_text_color ) { ?>
    /* Sticky Menu Hover Color */
    header.sticky nav.navbar.bootsnav ul.nav > li.current-menu-item > a, header.sticky nav.navbar.bootsnav ul.nav > li.current-menu-ancestor > a, header.sticky nav.navbar.bootsnav ul.nav > li > a:hover, header.sticky nav.navbar.bootsnav .header-social-icon a:hover, header.sticky nav.navbar.bootsnav .header-searchbar a:hover, header.sticky nav.navbar .header-menu-button a:hover, header.sticky nav.navbar .header-mini-cart .widget-title:hover:before, header.sticky #lang_sel a.lang_sel_sel:hover, header.sticky nav.navbar.bootsnav ul.nav > li.dropdown.on > a, header.sticky nav.navbar ul.nav > li > a.active, header.sticky nav.navbar .navbar-nav > li > a.active, header.sticky nav.navbar.navbar-default.navbar-fixed-top ul.nav > li > a.active, header.sticky nav.navbar ul.nav > li > a.active, header.sticky nav.navbar.bootsnav .header-searchbar a:focus { <?php echo esc_html( $pofo_sticky_menu_hover_text_color ) ?> }
    
    <?php if( $pofo_sticky_slide_menu_hover_color ) { ?>
        /* Sticky Slide Menu Hover Color */
        header.sticky nav.navbar .header-menu-button:hover span, header.sticky nav.navbar .header-menu-button span:hover { <?php echo esc_html( $pofo_sticky_slide_menu_hover_color ) ?> }
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
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a.dropdown-header, nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li .dropdown-header, .navbar-nav > li .mega-menu-full ul > li > .dropdown-header > i { <?php echo esc_html( $pofo_header_submenu_heading_color.$pofo_header_submenu_heading_font_size.$pofo_header_submenu_heading_line_height.$pofo_header_submenu_heading_letter_spacing ) ?> }
<?php } ?>

/* Header Submenu Separator Color */
<?php if( $pofo_header_submenu_separator_color ) { ?>
    /* Mega Menu Heading Color */
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul > li { <?php echo esc_html( $pofo_header_submenu_separator_color ) ?> }
<?php } ?>

/* Header Submenu Text Color */
<?php if( $pofo_header_submenu_text_color || $pofo_header_submenu_text_font_size || $pofo_header_submenu_text_line_height || $pofo_header_submenu_text_letter_spacing || $pofo_header_submenu_icon_font_size ) { ?>

    /* Mega Menu Text Color and Font Settings */
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a, nav.navbar.bootsnav .navbar-nav > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_text_color.$pofo_header_submenu_text_font_size.$pofo_header_submenu_text_line_height.$pofo_header_submenu_text_letter_spacing ) ?> }
    /* Simple Menu Text Color */
    .simple-dropdown .dropdown-menu > li > a, .simple-dropdown .dropdown-menu > li.dropdown > ul li a, nav.navbar.navbar-default ul.nav li.dropdown ul.dropdown-menu > li > a { <?php echo esc_html( $pofo_header_submenu_text_color.$pofo_header_submenu_text_font_size.$pofo_header_submenu_text_line_height.$pofo_header_submenu_text_letter_spacing ) ?> }

    <?php if( $pofo_header_submenu_icon_font_size ) { ?>
        /* Icon Font Size Color */
        nav.navbar.bootsnav .navbar-nav > li ul > li > a > i { <?php echo esc_html( $pofo_header_submenu_icon_font_size ) ?> }
    <?php } ?>
<?php } ?>

/* Header Submenu Hover Color */
<?php if( $pofo_header_submenu_hover_color ) { ?>
    /* Mega Menu Hover Color */
    nav.navbar.bootsnav li.dropdown .mega-menu-full > ul li a:hover { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
    /* Simple Menu Hover Color */
    .simple-dropdown .dropdown-menu > li > a:hover, .simple-dropdown .dropdown-menu > li.dropdown > ul li a:hover, nav.navbar.bootsnav ul li.dropdown .dropdown-menu li > a:hover, nav.navbar.bootsnav ul.nav li.dropdown ul.dropdown-menu  > li:hover > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
    /* Mega Menu Active Color */
    nav.navbar.navbar-default ul li.dropdown .dropdown-menu li.active > a, nav.navbar.navbar-default ul li.dropdown .dropdown-menu li.current-menu-item > a, nav.navbar.navbar-default ul li.dropdown .dropdown-menu li.current-menu-ancestor > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
    /* Simple Menu Active Color */
    nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a, nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-ancestor > a, nav.navbar.bootsnav ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a { <?php echo esc_html( $pofo_header_submenu_hover_color ) ?> }
<?php } ?>

<?php if( $pofo_header_mobile_menu_background_color ) { ?>
    /* Header Mobile Menu Background Color */
    nav.mobile-menu.navbar.bootsnav .navbar-nav { <?php echo esc_html( $pofo_header_mobile_menu_background_color ) ?> }
<?php } ?>

<?php if( $pofo_header_mobile_menu_separator_color ) { ?>
    /* Header Mobile Menu Separator Color */
    nav.mobile-menu.navbar.bootsnav .navbar-nav li, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul > li > ul, nav.mobile-menu.navbar.bootsnav ul.nav .simple-dropdown ul.dropdown-menu li.dropdown ul.dropdown-menu { <?php echo esc_html( $pofo_header_mobile_menu_separator_color ) ?> }
<?php } ?>

<?php if( $pofo_header_mobile_menu_text_color ) { ?>
    /* Header Mobile Menu Text Color */
    nav.mobile-menu ul.nav > li > a, nav.mobile-menu ul.nav > li i.dropdown-toggle { <?php echo esc_html( $pofo_header_mobile_menu_text_color ) ?> }
<?php } ?>

/* Header Mobile Menu Hover Color */
<?php if( $pofo_header_mobile_menu_hover_color ) { ?>
    header nav.navbar.bootsnav.mobile-menu ul.nav > li.current-menu-ancestor > a, header nav.navbar.bootsnav.mobile-menu ul.nav > li.current-menu-item > a, header nav.navbar.bootsnav.mobile-menu ul.nav > li.active > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-ancestor > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a, nav.navbar.bootsnav.mobile-menu li.dropdown .mega-menu-full > ul li.current-menu-item > a, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.current-menu-ancestor a.dropdown-header, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.current-menu-item a.dropdown-header, nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li.active a.dropdown-header, header nav.navbar.mobile-menu .navbar-nav > li > a.active, nav.navbar.bootsnav.mobile-menu ul.nav > li > a.active { <?php echo esc_html( $pofo_header_mobile_menu_hover_color ) ?> }
<?php } ?>

/* Header Mobile Submenu Background Color */
<?php if( $pofo_header_mobile_submenu_background_color ) { ?>
    /* Mobile Mega Menu Background Color */
    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown > .dropdown-menu { <?php echo esc_html( $pofo_header_mobile_submenu_background_color ) ?> }
<?php } ?>

/* Header Mobile Submenu Heading Color */
<?php if( $pofo_header_mobile_submenu_heading_color ) { ?>
    /* Mobile Mega Menu Heading Color */
    nav.mobile-menu.navbar.bootsnav li.dropdown .mega-menu-full > ul li a.dropdown-header { <?php echo esc_html( $pofo_header_mobile_submenu_heading_color ) ?> }
<?php } ?>

/* Header Mobile Submenu Text Color */
<?php if( $pofo_header_mobile_submenu_text_color ) { ?>
    /* Mobile Mega Menu Text Color */
    nav.mobile-menu ul > li > ul > li > a, nav.mobile-menu ul > li.simple-dropdown > ul > li > ul > li > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown > ul > li > a { <?php echo esc_html( $pofo_header_mobile_submenu_text_color ) ?> }
<?php } ?>

/* Header Mobile Submenu Hover Color */
<?php if( $pofo_header_mobile_submenu_hover_color ) { ?>
    /* Mobile Mega Menu Hover Color */
    nav.navbar.bootsnav.mobile-menu li.dropdown .mega-menu-full > ul li.current-menu-ancestor > a, nav.navbar.bootsnav.mobile-menu li.dropdown .mega-menu-full > ul li.current-menu-item > a, nav.navbar.bootsnav.mobile-menu li.dropdown .mega-menu-full > ul li.active > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-ancestor > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.current-menu-item > a, nav.navbar.bootsnav.mobile-menu ul.nav li.dropdown.simple-dropdown ul.dropdown-menu > li.active > a { <?php echo esc_html( $pofo_header_mobile_submenu_hover_color ) ?> }
<?php } ?>