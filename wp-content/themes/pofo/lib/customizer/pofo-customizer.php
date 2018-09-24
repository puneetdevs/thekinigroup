<?php
/* Defind Class */
 
if( !class_exists('Pofo_Customizer') ) {
   /* Main plugin class */
  class Pofo_Customizer {

    /* Construct */
    public function __construct() {
		add_action( 'customize_register', array( $this, 'pofo_add_customizer_sections' ), 10 );
		add_action( 'customize_register', array( $this, 'pofo_register_options_settings_and_controls' ), 20 );
    }

    public function pofo_add_customizer_sections( $wp_customize ) {

    	/* General Panels */
		$wp_customize->add_section( 'pofo_add_general_panel', array(
			'title' 	 	=> esc_attr__( 'General Theme Options', 'pofo' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 120
		) );
		
		/* Add Mini Header Section */
	    $wp_customize->add_section( 'pofo_add_mini_header_section', array(
			'title' 	 	=> esc_attr__( 'Mini Header', 'pofo' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 125
		) );

	    /* Add Header Panels */
		$wp_customize->add_panel( 'pofo_add_header_panel', array(
			'title' 	 	=> esc_attr__( 'Header', 'pofo' ),
			'capability' 	=> 'manage_options',
			'priority'	 	=> 130
		) );

		/* Add Logo Sections */
	    $wp_customize->add_section( 'pofo_add_logo_section', array(
			'title' 	 	=> esc_attr__( 'Logo and Favicon', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

		/* Add Header Style and Data Sections */
	    $wp_customize->add_section( 'pofo_add_header_section', array(
			'title' 	 	=> esc_attr__( 'Header Style and Data', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

		/* Add Header Color Sections */
	    $wp_customize->add_section( 'pofo_add_header_color_section', array(
			'title' 	 	=> esc_attr__( 'Header Font and Color', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

		/* Add Hamburger Menu Sections */
	    $wp_customize->add_section( 'pofo_add_hamburger_menu_section', array(
			'title' 	 	=> esc_attr__( 'Hamburger Menu Style', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

		/* Add Submenu Color Sections */
	    $wp_customize->add_section( 'pofo_add_submenu_color_section', array(
			'title' 	 	=> esc_attr__( 'Submenu Font and Color', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

		/* Add Mobile Menu Color Sections */
	    $wp_customize->add_section( 'pofo_add_mobile_menu_color_section', array(
			'title' 	 	=> esc_attr__( 'Mobile Menu', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_header_panel',
		) );

	    /* Add Layout Settings page */
	    $wp_customize->add_panel( 'pofo_add_layout_section', array(
		 	'title' 	 	=> esc_attr__( 'Layout and Content', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 135
		) );

		/* Add Page Layout */
		$wp_customize->add_section( 'pofo_add_page_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Page', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_layout_section',
		) );

		/* Add Post Layout */
		$wp_customize->add_section( 'pofo_add_post_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Post Single', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'			=> 'pofo_add_layout_section',
		) );

		/* Add Archive Layout */
		$wp_customize->add_section( 'pofo_add_archive_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Post Archive', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_layout_section',
		) );

		/* Add Default Posts / Blog Home Layout */
		$wp_customize->add_section( 'pofo_add_default_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Default Posts / Blog Home', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_layout_section',
		) );

		/* Add Sticky Posts Layout */
		$wp_customize->add_section( 'pofo_add_sticky_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Sticky Post', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_layout_section',
		) );

		/* Add Portfolio Layout */
		$wp_customize->add_section( 'pofo_add_portfolio_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Portfolio Single', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'			=> 'pofo_add_layout_section',
		) );

		/* Add Portfolio Archive Layout */
		$wp_customize->add_section( 'pofo_add_portfolio_archive_layout_panel', array(
			'title' 	 	=> esc_attr__( 'Portfolio Archive', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_layout_section',
		) );

		/* if WooCommerce plugin is activated */
		if( class_exists( 'WooCommerce' ) ) {
			
			/* Add Product Layout */
			$wp_customize->add_section( 'pofo_add_product_layout_panel', array(
				'title' 	 	=> esc_attr__( 'Product Single', 'pofo' ),
				'capability' 	=> 'manage_options',
				'panel'			=> 'pofo_add_layout_section',
			) );

			/* Add Product Archive Layout */
			$wp_customize->add_section( 'pofo_add_product_archive_layout_panel', array(
				'title' 	 	=> esc_attr__( 'Product Archive / Shop', 'pofo' ),
				'capability' 	=> 'manage_options',
				'panel'		 	=> 'pofo_add_layout_section',
			) );
		}

		/* Add Page Title page Panel */
	    $wp_customize->add_panel( 'pofo_add_title_wrapper_section', array(
		 	'title' 	 	=> esc_attr__( 'Title Wrapper', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 135
		) );

		/* Add Page Title general */
	    $wp_customize->add_section( 'pofo_add_page_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Page', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* Add Page Title Single Post */
	    $wp_customize->add_section( 'pofo_add_single_post_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Post Single', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* Add Page Title Archive */
	    $wp_customize->add_section( 'pofo_add_archive_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Post Archive', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* Add Page Title Default */
	    $wp_customize->add_section( 'pofo_add_default_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Default Posts / Blog Home', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* Add Page Title Single Portfolio */
	    $wp_customize->add_section( 'pofo_add_single_portfolio_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Portfolio Single', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* Add Portfolio Title Archive */
	    $wp_customize->add_section( 'pofo_add_portfolio_archive_title_section', array(
		 	'title' 	 	=> esc_attr__( 'Portfolio Archive', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_title_wrapper_section',
		) );

		/* if WooCommerce plugin is activated */
		if( class_exists( 'WooCommerce' ) ) {
				
			/* Add Product Title */
		    $wp_customize->add_section( 'pofo_add_single_product_title_section', array(
			 	'title' 	 	=> esc_attr__( 'Product Single', 'pofo' ),
			 	'capability' 	=> 'manage_options',
			 	'panel'		 	=> 'pofo_add_title_wrapper_section',
			) );

			/* Add Product Title Archive */
		    $wp_customize->add_section( 'pofo_add_product_archive_title_section', array(
			 	'title' 	 	=> esc_attr__( 'Product Archive / Shop', 'pofo' ),
			 	'capability' 	=> 'manage_options',
			 	'panel'		 	=> 'pofo_add_title_wrapper_section',
			) );
		}

		/* Add Footer Panel */
		$wp_customize->add_panel( 'pofo_add_footer_panel', array(
			'title' 	 	=> esc_attr__( 'Footer', 'pofo' ),
			'capability' 	=> 'manage_options',
		) );

		/* Add Footer Wrapper Sections */
	    $wp_customize->add_section( 'pofo_add_footer_wrapper_section', array(
			'title' 	 	=> esc_attr__( 'Footer Wrapper', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_footer_panel',
		) );

		/* Add Footer Sections */
	    $wp_customize->add_section( 'pofo_add_footer_section', array(
			'title' 	 	=> esc_attr__( 'Footer', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_footer_panel',
		) );

		/* Add Footer Bottom Sections */
	    $wp_customize->add_section( 'pofo_add_footer_bottom_section', array(
			'title' 	 	=> esc_attr__( 'Footer Bottom', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_footer_panel',
		) );

		/* Add Footer Social Icon Sections */
	    $wp_customize->add_section( 'pofo_add_footer_social_section', array(
			'title' 	 	=> esc_attr__( 'Footer Social Icons', 'pofo' ),
			'capability' 	=> 'manage_options',
			'panel'		 	=> 'pofo_add_footer_panel',
		) );

		/* Add Social Icons Switch Sections */
	    $wp_customize->add_panel( 'pofo_add_social_share_panel', array(
			'title' 	 	=> esc_attr__( 'Social Share', 'pofo' ),
			'capability' 	=> 'manage_options',
		) );

		/* Add Social Icons Post Panel */
	    $wp_customize->add_section( 'pofo_add_social_share_section', array(
		 	'title' 	 	=> esc_attr__( 'Post Single', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_social_share_panel',
		) );

		/* Add Social Icons Portfolio Panel */
	    $wp_customize->add_section( 'pofo_portfolio_add_social_share_section', array(
		 	'title' 	 	=> esc_attr__( 'Portfolio Single', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'		 	=> 'pofo_add_social_share_panel',
		) );

		/* if WooCommerce plugin is activated */
		if( class_exists( 'WooCommerce' ) ) {
			
			/* Add Social Icons Product Panel */
		    $wp_customize->add_section( 'pofo_product_add_social_share_section', array(
			 	'title' 	 	=> esc_attr__( 'Product Single', 'pofo' ),
			 	'capability' 	=> 'manage_options',
			 	'panel'		 	=> 'pofo_add_social_share_panel',
			) );
		}

		/* Add Color Area */
	    $wp_customize->add_panel( 'pofo_add_color_panel', array(
		 	'title' 	 	=> esc_attr__( 'Typography and Color', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		) );

	    /* Add Custom Font Setting */
	    $wp_customize->add_section( 'pofo_add_general_font_family_section', array(
		 	'title' 	 	=> esc_attr__( 'Font Family', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'priority'	 	=> 140,
		 	'panel'		 	=> 'pofo_add_color_panel',
		) );

		/* Add General Color Settings */
	    $wp_customize->add_section( 'pofo_add_general_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Font Size', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'pofo_add_color_panel'
		) );

		/* Add Content Color Settings */
	    $wp_customize->add_section( 'pofo_add_content_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Font Color', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'pofo_add_color_panel'
		) );

		/* Add Comment Color Settings */
	    $wp_customize->add_section( 'pofo_add_comment_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Comment', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'pofo_add_color_panel'
		) );

		/* Add Heading Color Settings */
	    $wp_customize->add_section( 'pofo_add_heading_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Heading', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'pofo_add_color_panel'
		) );

		/* Add Heading Color Settings */
	    $wp_customize->add_section( 'pofo_add_base_color_section', array(
		 	'title' 	 	=> esc_attr__( 'Base Color', 'pofo' ),
		 	'capability' 	=> 'manage_options',
		 	'panel'	 	 	=> 'pofo_add_color_panel'
		) );

    }

    /* Register option settings To Customizer */ 
	 
    public function pofo_register_options_settings_and_controls( $wp_customize ) {
    	global $wp_version;

    	/* Register Custom Social Icons Settings */
        require_once POFO_THEME_CUSTOMIZER_CONTROLS .'/pofo-social-icons.php';

        /* Register Custom Social Icons Settings */
        require_once POFO_THEME_CUSTOMIZER_CONTROLS .'/pofo-post-social-icon.php';

        /* Register Custom Social Icons Settings */
        require_once POFO_THEME_CUSTOMIZER_CONTROLS .'/pofo-multiple-images.php';
        
		// Register Alpha Color Picker control file.
		require_once POFO_THEME_CUSTOMIZER_CONTROLS . '/pofo-alpha-color-picker.php';

		// Register Custom Sidebars control file.
		require_once POFO_THEME_CUSTOMIZER_CONTROLS . '/pofo-custom-sidebars.php';

		/* Register Custom Title For Site Identity, Header Image and Background Image */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/pofo-general-title.php';
		
        /* Register Layout Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/layout-settings.php';

		 /* Register Layout Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-post-layout-settings.php';

		 /* Register Portfolio Layout Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-portfolio-layout-settings.php';

		/* Register Layout Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/post-archive-layout-settings.php';	

		/* Register Portfolio Layout Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/portfolio-archive-layout-settings.php';		

    	/* Register General Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/general-layout-settings.php';

		/* Register Header Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/mini-header-settings.php';

		/* Register Header Settings */
		require_once POFO_THEME_CUSTOMIZER_MAPS .'/header-settings.php';

        /* Register Page Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/page-title-settings.php';

        /* Register Single Post Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-post-title-settings.php';

        /* Register Single Portfolio Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-portfolio-title-settings.php';

        /* Register Archive Page Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/archive-title-settings.php';

        /* Register Default Page Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/default-title-settings.php';

        /* Register Archive Page Title Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/portfolio-archive-title-settings.php';

        /* Register Instagram Feed Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/page-not-found-settings.php';

        /* Register Footer Setting */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/footer-settings.php';

        /* Register Custom Multiple Checkbox control file. */
        require_once POFO_THEME_CUSTOMIZER_CONTROLS . '/pofo-multi-checkbox.php';

        /* Register Custom Font Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/font-settings.php';

        /* Register Custom Color Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/custom-color-settings.php';

        /* Register Comment Color Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/comment-color-settings.php';

        /* Register Heading Color Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/heading-color-settings.php';

        /* Register Base Color Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/base-color-settings.php';

        /* Register Default Post Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/default-layout-settings.php';

        /* Register Sticky Post Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/sticky-layout-settings.php';

        /* Register Posts Page Settings */
        require_once POFO_THEME_CUSTOMIZER_MAPS .'/post-social-share-settings.php';

		/* if WooCommerce plugin is activated */
		if( class_exists( 'WooCommerce' ) ) {
			
			 /* Register Product Layout Settings */
			require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-product-layout-settings.php';
				
			/* Register Product Layout Settings */
			require_once POFO_THEME_CUSTOMIZER_MAPS .'/product-archive-layout-settings.php';

	        /* Register Single Project Title Setting */
	        require_once POFO_THEME_CUSTOMIZER_MAPS .'/single-product-title-settings.php';

	        /* Register Project Archive Page Title Setting */
	        require_once POFO_THEME_CUSTOMIZER_MAPS .'/product-archive-title-settings.php';

		}
    }

} // end of class

$Pofo_Customizer = new Pofo_Customizer();

} // end of class_exists