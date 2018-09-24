<?php
/**
 * This file use for define custom function
 * Also include required files.
 *
 * @package Pofo
 */

/*
 *	Pofo Theme namespace.
 */

define( 'POFO_THEME_VERSION', '1.1.5' );
define( 'POFO_ADDONS_VERSION', '1.1.5' );

/*
 *	Pofo Theme Folders
 */

define( 'POFO_THEME_DIR',         				get_template_directory());
define( 'POFO_THEME_TEMPLATE',         			POFO_THEME_DIR . '/templates' );	
define( 'POFO_THEME_LANGUAGES',   				POFO_THEME_DIR . '/languages' );
define( 'POFO_THEME_ASSETS',      				POFO_THEME_DIR . '/assets' );
define( 'POFO_THEME_JS',         				POFO_THEME_ASSETS . '/js' );
define( 'POFO_THEME_CSS',        				POFO_THEME_ASSETS . '/css' );
define( 'POFO_THEME_IMAGES',      				POFO_THEME_ASSETS . '/images' );
define( 'POFO_THEME_ADMIN_JS',    				POFO_THEME_JS . '/admin' );
define( 'POFO_THEME_ADMIN_CSS',    				POFO_THEME_CSS . '/admin' );
define( 'POFO_THEME_LIB',         				POFO_THEME_DIR . '/lib' );
define( 'POFO_THEME_CUSTOMIZER',     			POFO_THEME_LIB . '/customizer' );
define( 'POFO_THEME_CUSTOMIZER_MAPS',     		POFO_THEME_CUSTOMIZER . '/customizer-maps' );
define( 'POFO_THEME_CUSTOMIZER_CONTROLS',     	POFO_THEME_CUSTOMIZER . '/customizer-control' );
define( 'POFO_THEME_MEGA_MENU',      			POFO_THEME_LIB . '/mega-menu' );
define( 'POFO_THEME_TGM',         				POFO_THEME_LIB . '/tgm' );

/*
 *  Pofo Theme Folder URI
 */
define( 'POFO_THEME_URI',             			get_template_directory_uri());
define( 'POFO_THEME_TEMPLATE_URI',         		POFO_THEME_URI . '/templates' );
define( 'POFO_THEME_LANGUAGES_URI',   			POFO_THEME_URI . '/languages' );
define( 'POFO_THEME_ASSETS_URI',      			POFO_THEME_URI     . '/assets' );
define( 'POFO_THEME_JS_URI',          			POFO_THEME_ASSETS_URI . '/js' );
define( 'POFO_THEME_CSS_URI',         			POFO_THEME_ASSETS_URI . '/css' );
define( 'POFO_THEME_IMAGES_URI',      			POFO_THEME_ASSETS_URI . '/images' );
define( 'POFO_THEME_ADMIN_JS_URI',    			POFO_THEME_JS_URI . '/admin' );
define( 'POFO_THEME_ADMIN_CSS_URI',    			POFO_THEME_CSS_URI . '/admin' );
define( 'POFO_THEME_LIB_URI',         			POFO_THEME_URI . '/lib' );
define( 'POFO_THEME_CUSTOMIZER_URI',     		POFO_THEME_LIB_URI . '/customizer' );
define( 'POFO_THEME_CUSTOMIZER_MAPS_URI',    	POFO_THEME_CUSTOMIZER_URI . '/customizer-maps' );
define( 'POFO_THEME_MEGA_MENU_URI',  			POFO_THEME_LIB_URI . '/mega-menu' );
define( 'POFO_THEME_TGM_URI',        			POFO_THEME_LIB_URI . '/tgm' );


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'pofo_theme_setup' ) ) :
	function pofo_theme_setup() {
		
		/*
		 *   Text Domain
		 */

		load_theme_textdomain( 'pofo', get_template_directory() . '/languages' );

		/*
		 * To add default posts and comments RSS feed links to theme head.
		 */

		add_theme_support( 'automatic-feed-links' );
	    
	    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */

		add_theme_support( 'title-tag' );


		/**
		 * Custom image sizes for posts, pages, gallery, slider.
		 */

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 771 );
		add_image_size( 'pofo-related-post-thumb', 360, 257, true );
		add_image_size( 'pofo-popular-posts-thumb', 81, '', true );

		// Set Custom Header
		add_theme_support( 'custom-header', apply_filters( 'pofo_custom_header_args', array(
			'width'                  => 1920,
			'height'                 => '',
		) ) );

		// Set Custom Body Background
		add_theme_support( 'custom-background' );
		/*
		 * Register menu for Pofo theme.
		 */

		register_nav_menus( array(
			'pofomegamenu' => esc_html__( 'Pofo Mega Menu', 'pofo' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		 
		add_theme_support( 'post-formats', array(
			'image', 'gallery', 'video', 'audio', 'quote', 'link',
		) );

		/* This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();

		/*
		 * woocommerce support
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * product gallery features (zoom, swipe, lightbox) 
		 */
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif;
add_action( 'after_setup_theme', 'pofo_theme_setup' );

/*
 *  Content Width (Set the content width based on the theme's design and stylesheet.)
 */
if ( ! function_exists( 'pofo_content_width' ) ) :
	function pofo_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'pofo_content_width', 1200 );
	}
endif;
add_action( 'after_setup_theme', 'pofo_content_width', 0 );

/**
 * Register Pofo theme required widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 */
if ( ! function_exists( 'pofo_widgets_init' ) ) :
	function pofo_widgets_init() {

		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'pofo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'pofo' ),
			'before_widget' => '<div class="widget %2$s margin-50px-bottom xs-margin-25px-bottom" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>',
			'after_title'   => '</span></div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Mini Header Left Sidebar', 'pofo' ),
			'id'            => 'mini-header-left-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your mini header left side.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Mini Header Right Sidebar', 'pofo' ),
			'id'            => 'mini-header-right-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your mini header right side.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		/* if WooCommerce plugin is activated */
		if( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Shop Sidebar', 'pofo' ),
				'id'            => 'pofo-shop-1',
				'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'pofo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title">',
				'after_title'   => '</div>',
			) );
			register_sidebar( array(
				'name'          => esc_html__( 'Mini Cart', 'pofo' ),
				'id'            => 'pofo-mini-cart',
				'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title">',
				'after_title'   => '</div>',
			) );
		}
		
		register_sidebar( array(
			'name'          => esc_html__( 'Menu Icon', 'pofo' ),
			'id'            => 'menu-icon-1',
			'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Header Button', 'pofo' ),
			'id'            => 'header-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your menu.', 'pofo' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Slide Menu Sidebar', 'pofo' ),
			'id'            => 'slide-menu-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your slide menu.', 'pofo' ),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Mega Menu Sidebar', 'pofo' ),
			'id'            => 'mega-menu-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your mega menu column.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Hamburger Menu Sidebar', 'pofo' ),
			'id'            => 'hamburger-menu-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your mega menu column.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', 'pofo' ),
			'id'            => 'footer-sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', 'pofo' ),
			'id'            => 'footer-sidebar-2',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', 'pofo' ),
			'id'            => 'footer-sidebar-3',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 4', 'pofo' ),
			'id'            => 'footer-sidebar-4',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 5', 'pofo' ),
			'id'            => 'footer-sidebar-5',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 6', 'pofo' ),
			'id'            => 'footer-sidebar-6',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 7', 'pofo' ),
			'id'            => 'footer-sidebar-7',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 8', 'pofo' ),
			'id'            => 'footer-sidebar-8',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 9', 'pofo' ),
			'id'            => 'footer-sidebar-9',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 10', 'pofo' ),
			'id'            => 'footer-sidebar-10',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 11', 'pofo' ),
			'id'            => 'footer-sidebar-11',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 12', 'pofo' ),
			'id'            => 'footer-sidebar-12',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 13', 'pofo' ),
			'id'            => 'footer-sidebar-13',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 14', 'pofo' ),
			'id'            => 'footer-sidebar-14',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 15', 'pofo' ),
			'id'            => 'footer-sidebar-15',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 16', 'pofo' ),
			'id'            => 'footer-sidebar-16',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 17', 'pofo' ),
			'id'            => 'footer-sidebar-17',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 18', 'pofo' ),
			'id'            => 'footer-sidebar-18',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 19', 'pofo' ),
			'id'            => 'footer-sidebar-19',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 20', 'pofo' ),
			'id'            => 'footer-sidebar-20',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 21', 'pofo' ),
			'id'            => 'footer-sidebar-21',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 22', 'pofo' ),
			'id'            => 'footer-sidebar-22',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'pofo' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">',
			'after_title'   => '</div>',
		) );
	}
endif;
add_action( 'widgets_init', 'pofo_widgets_init' );

if( file_exists( POFO_THEME_LIB . '/pofo-require-files.php' ) ) :
	require_once( POFO_THEME_LIB . '/pofo-require-files.php');
endif;