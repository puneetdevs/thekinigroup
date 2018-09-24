<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Sidebar List. */
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_header_logo_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_header_logo_separator', array(
	    'label'      		=> esc_attr__( 'Logo', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_logo_section',
	    'settings'   		=> 'pofo_general_header_logo_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Logo */

    $wp_customize->add_setting( 'pofo_disable_header_logo', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_header_logo', array(
		'label'       		=> esc_attr__( 'Logo', 'pofo' ),
		'section'     		=> 'pofo_add_logo_section',
		'settings'			=> 'pofo_disable_header_logo',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
									'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Header */

	/* Logo */

    $wp_customize->add_setting( 'pofo_logo', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_logo', array(
		'label'       		=> esc_attr__( 'Logo', 'pofo' ),
		'description'       => esc_attr__( 'Upload the logo image which will be displayed in the website header.', 'pofo' ),
		'section'     		=> 'pofo_add_logo_section',
		'settings'			=> 'pofo_logo',
	) ) );

	/* End Logo */

	/* Light Logo */

    $wp_customize->add_setting( 'pofo_logo_light', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_logo_light', array(
		'label'       		=> esc_attr__( 'Logo &#40;Light&#41;', 'pofo' ),
		'description'       => esc_attr__( 'Upload the logo light image which will be displayed in the website header in scrolled version header.', 'pofo' ),
		'section'     		=> 'pofo_add_logo_section',
		'settings'			=> 'pofo_logo_light',
	) ) );

	/* End Light Logo */

    /* Logo Retina */

    $wp_customize->add_setting( 'pofo_logo_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_logo_ratina', array(
		'label'       		=> esc_attr__( 'Retina Logo', 'pofo' ),
		'description'       => esc_attr__( 'Upload the double size logo image which will be displayed in the website header of retina devices.', 'pofo' ),
		'section'     		=> 'pofo_add_logo_section',
		'settings'			=> 'pofo_logo_ratina',
	) ) );

	/* End Logo Ratina */

	/* Light Logo Retina */

    $wp_customize->add_setting( 'pofo_logo_light_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_logo_light_ratina', array(
		'label'       		=> esc_attr__( 'Retina Logo &#40;Light&#41;', 'pofo' ),
		'description'       => esc_attr__( 'Upload the logo light image which will be displayed in the website header of retina devices in scrolled version header.', 'pofo' ),
		'section'     		=> 'pofo_add_logo_section',
		'settings'			=> 'pofo_logo_light_ratina',
	) ) );

	/* End Light Logo Ratina */

	/* SVG Width */

	$wp_customize->add_setting( 'pofo_header_svg_width', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_svg_width', array(
		'label'      		=> esc_attr__( 'SVG Width', 'pofo' ),
		'section'    		=> 'pofo_add_logo_section',
		'settings'	 		=> 'pofo_header_svg_width',
		'type'              => 'text',
	    'description'       => esc_attr__( 'Add font size like 200px.', 'pofo' ),
	) ) );

	/* End SVG Width */

	/* Site Icon Separator Settings */
	
	$wp_customize->add_setting( 'pofo_favicon_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_favicon_separator', array(
	    'label'      		=> esc_attr__( 'Site / Favicon Icon', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'description'       => esc_attr__( 'This icon will be used as a browser favicon and app icon for your website. Icon must be square, and at least 512 pixels wide and tall.', 'pofo' ),
	    'section'    		=> 'pofo_add_logo_section',
	    'settings'   		=> 'pofo_favicon_separator',	    
	) ) );

	/* End Site Icon Separator Settings */

	/* Separator Header General Settings */
	$wp_customize->add_setting( 'pofo_general_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_header_separator', array(
	    'label'      		=> esc_attr__( 'Header', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_header_section',
	    'settings'   		=> 'pofo_general_header_separator',	    
	) ) );

	/* End Separator Header General Settings */

 	/* Enable Header */

    $wp_customize->add_setting( 'pofo_disable_header', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_header', array(
		'label'       		=> esc_attr__( 'Header', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_disable_header',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Header */

	/* Select Container Style */

	$wp_customize->add_setting( 'pofo_header_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_header_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
								    'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_header_container_style_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_container_style_callback' ) ) {
		function pofo_header_container_style_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Select Container Style */

	/* Select Header Type */

    $wp_customize->add_setting( 'pofo_header_type', array(
		'default' 			=> 'headertype1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_type', array(
		'label'       		=> esc_attr__( 'Header Style', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_header_type',
		'type'              => 'radio',
		'choices'           => array(
								    'headertype1' => esc_html__( 'Standard', 'pofo' ),
								    'headertype2' => esc_html__( 'Hamburger', 'pofo' ),
								    'headertype3' => esc_html__( 'Left Classic', 'pofo' ),
								    'headertype4' => esc_html__( 'Left Modern', 'pofo' ),
							       ),
	) ) );

	/* End Header Type */

	/* Menu Vertical Image */

    $wp_customize->add_setting( 'pofo_menu_vertical_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_menu_vertical_image', array(
		'label'       		=> esc_attr__( 'Menu Vertical Image', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_menu_vertical_image',
		'active_callback'	=> 'pofo_menu_vertical_image_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_vertical_image_callback' ) ) {
		function pofo_menu_vertical_image_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Vertical Image */

	/* Main Menu */

	$wp_customize->add_setting( 'pofo_header_menu', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Pofo_Customize_Menu_Control( $wp_customize, 'pofo_header_menu', array(
	    'label'      		=> esc_attr__( 'Menu', 'pofo' ),
	    'section'    		=> 'pofo_add_header_section',
	    'settings'	 		=> 'pofo_header_menu',
	    'type'              => 'pofo_menu',
	    'choices'           => array(
								    '' => esc_html__( '&mdash; Select Menu &mdash;', 'pofo' ),
							   ),
	    'description'       => esc_attr__( 'You can manage menu using Appearance &#62; Menus.', 'pofo' ),
	) ) );

	/* End Main Menu */

	/* Secondary Menu */

	$wp_customize->add_setting( 'pofo_header_secondary_menu', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new Pofo_Customize_Menu_Control( $wp_customize, 'pofo_header_secondary_menu', array(
	    'label'      		=> esc_attr__( 'Secondary Menu', 'pofo' ),
	    'section'    		=> 'pofo_add_header_section',
	    'settings'	 		=> 'pofo_header_secondary_menu',
	    'type'              => 'pofo_menu',
	    'choices'           => array(
								    '' => esc_html__( '&mdash; Select Menu &mdash;', 'pofo' ),
							   ),
	    'description'       => esc_attr__( 'Select secondary menu when you have set center logo within menu. You can manage center logo using Appearance &#62; Theme Settings &#62; Header. Also you can manage menu using Appearance &#62; Menus', 'pofo' ),
	    'active_callback'	=> 'pofo_header_secondary_menu_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_secondary_menu_callback' ) ) {
		function pofo_header_secondary_menu_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' && $control->manager->get_setting( 'pofo_logo_position' )->value() == 'center' ) {
			    return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Secondary Menu */

	/* Select Sticky Type */

    $wp_customize->add_setting( 'pofo_header_nav_type', array(
		'default' 			=> 'navbar-top',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_nav_type', array(
		'label'       		=> esc_attr__( 'Sticky Type', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_header_nav_type',
		'type'              => 'radio',
		'choices'           => array(
								    'navbar-top' => esc_html__( 'Appear on Up Scroll', 'pofo' ),
								    'navbar-fixed-top' => esc_html__( 'Appear on Down Scroll', 'pofo' ),
								    'navbar-non-sticky-top' => esc_html__( 'Non Sticky', 'pofo' ),
							       ),
		'active_callback'	=> 'pofo_header_nav_type_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_nav_type_callback' ) ) {
		function pofo_header_nav_type_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Sticky Type */

	/* Center Menu */

    $wp_customize->add_setting( 'pofo_menu_position_center', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_menu_position_center', array(
		'label'       		=> esc_attr__( 'Center Menu', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_menu_position_center',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_menu_position_center_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_position_center_callback' ) ) {
		function pofo_menu_position_center_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' && $control->manager->get_setting( 'pofo_logo_position' )->value() != 'center' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Center Menu */

	/* Logo Position Center */

	$wp_customize->add_setting( 'pofo_logo_position', array(
		'default' 			=> 'left',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_logo_position', array(
		'label'       		=> esc_attr__( 'Logo Position', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_logo_position',
		'type'              => 'select',
		'choices'           => array(
								    'left' => esc_html__( 'Left', 'pofo' ),
								    'top' => esc_html__( 'Top', 'pofo' ),
								    'center' => esc_html__( 'Center', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_logo_position_callback',
	) ) );

	if ( ! function_exists( 'pofo_logo_position_callback' ) ) {
		function pofo_logo_position_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Logo Position Center */

	/* Enable Header Search */

    $wp_customize->add_setting( 'pofo_disable_header_search', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_header_search', array(
		'label'       		=> esc_attr__( 'Search', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_disable_header_search',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_disable_header_search_callback',
	) ) );

	if ( ! function_exists( 'pofo_disable_header_search_callback' ) ) {
		function pofo_disable_header_search_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Enable Header Search */

	/* Enable Header Sidebar */

    $wp_customize->add_setting( 'pofo_disable_header_sidebar', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_header_sidebar', array(
		'label'       		=> esc_attr__( 'Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_disable_header_sidebar',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_disable_header_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_disable_header_sidebar_callback' ) ) {
		function pofo_disable_header_sidebar_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Enable Header Sidebar */

	/* Header Sidebar */

	$wp_customize->add_setting( 'pofo_header_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_sidebar', array(
		'label'       		=> esc_attr__( 'Select Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_header_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'	=> 'pofo_header_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_sidebar_callback' ) ) {
		function pofo_header_sidebar_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_disable_header_sidebar' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Header Sidebar */

	/* Header Sidebar Position Left Right */

	$wp_customize->add_setting( 'pofo_header_sidebar_position', array(
		'default' 			=> 'right',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_sidebar_position', array(
		'label'       		=> esc_attr__( 'Sidebar Position', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_header_sidebar_position',
		'type'              => 'select',
		'choices'           => array(
								    'left' => esc_html__( 'Left', 'pofo' ),
								    'right' => esc_html__( 'Right', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_header_sidebar_position_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_sidebar_position_callback' ) ) {
		function pofo_header_sidebar_position_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' && $control->manager->get_setting( 'pofo_disable_header_sidebar' )->value() == '1' && $control->manager->get_setting( 'pofo_logo_position' )->value() == 'center' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Sidebar Position Center */

	/* Enable Slide Menu */

    $wp_customize->add_setting( 'pofo_disable_slide_menu', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_slide_menu', array(
		'label'       		=> esc_attr__( 'Slide Menu', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_disable_slide_menu',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_disable_slide_menu_callback',
	) ) );

	if ( ! function_exists( 'pofo_disable_slide_menu_callback' ) ) {
		function pofo_disable_slide_menu_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Enable Slide Menu */

	/* Slide Menu Sidebar */

	$wp_customize->add_setting( 'pofo_slide_menu_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_slide_menu_sidebar', array(
		'label'       		=> esc_attr__( 'Slide Menu Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_slide_menu_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'	=> 'pofo_slide_menu_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_slide_menu_sidebar_callback' ) ) {
		function pofo_slide_menu_sidebar_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_disable_slide_menu' )->value() == '1' && $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Slide Menu Sidebar */

	/* if WooCommerce plugin is activated */
	if( class_exists( 'WooCommerce' ) ) {

		/* Enable Mini Cart */
	
	    $wp_customize->add_setting( 'pofo_enable_header_mini_cart', array(
			'default' 			=> '1',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_header_mini_cart', array(
			'label'       		=> esc_attr__( 'Mini Cart', 'pofo' ),
			'section'     		=> 'pofo_add_header_section',
			'settings'			=> 'pofo_enable_header_mini_cart',
			'type'              => 'pofo_switch',
			'choices'           => array(
										'1' => esc_html__( 'On', 'pofo' ),
									  	'0' => esc_html__( 'Off', 'pofo' ),
								   ),
			'active_callback'	=> 'pofo_enable_header_mini_cart_callback',
		) ) );

		if ( ! function_exists( 'pofo_enable_header_mini_cart_callback' ) ) {
			function pofo_enable_header_mini_cart_callback( $control ) {
				if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
			        return true;
			    } else {
			    	return false;
			    }
			}
		}

		/* End Enable Mini Cart */

		/* Mini Cart Sidebar */

		$wp_customize->add_setting( 'pofo_header_mini_cart_sidebar', array(
			'default' 			=> 'pofo-mini-cart',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_mini_cart_sidebar', array(
			'label'       		=> esc_attr__( 'Mini Cart Sidebar', 'pofo' ),
			'section'     		=> 'pofo_add_header_section',
			'settings'			=> 'pofo_header_mini_cart_sidebar',
			'type'              => 'select',
			'choices'           => $pofo_sidebar_array,
			'active_callback'	=> 'pofo_header_mini_cart_sidebar_callback',
		) ) );

		if ( ! function_exists( 'pofo_header_mini_cart_sidebar_callback' ) ) {
			function pofo_header_mini_cart_sidebar_callback( $control ) {
				if ( $control->manager->get_setting( 'pofo_enable_header_mini_cart' )->value() == '1' ) {
			        return true;
			    } else {
			    	return false;
			    }
			}
		}

		/* End Mini Cart Sidebar */
	}

	/* Enable Header Copyright */

    $wp_customize->add_setting( 'pofo_disable_header_copyright', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_header_copyright', array(
		'label'       		=> esc_attr__( 'Copyright', 'pofo' ),
		'section'     		=> 'pofo_add_header_section',
		'settings'			=> 'pofo_disable_header_copyright',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_disable_header_copyright_callback',
	) ) );

	if ( ! function_exists( 'pofo_disable_header_copyright_callback' ) ) {
		function pofo_disable_header_copyright_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Enable Header Copyright */

	/* Footer Footer Bottom Right Text setting */

	$wp_customize->add_setting( 'pofo_header_copyright_text', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_copyright_text', array(
		'label'      		=> esc_attr__( 'Copyright Text', 'pofo' ),
		'section'    		=> 'pofo_add_header_section',
		'settings'	 		=> 'pofo_header_copyright_text',
		'type'              => 'textarea',
		'active_callback'	=> 'pofo_disable_header_copyright_callback',
	) ) );

	/* End Footer Footer Bottom Right Text setting */

	/* Footer Bottom Right Text Color setting */

	$wp_customize->add_setting( 'pofo_header_copyright_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_copyright_text_color', array(
	    'label'      		=> esc_attr__( 'Copyright Text Color', 'pofo' ),
		'section'    		=> 'pofo_add_header_section',
		'settings'	 		=> 'pofo_header_copyright_text_color',
	    'type'              => 'alpha_color',
	    'show_opacity'  	=> true, // Optional.
		'active_callback'	=> 'pofo_disable_header_copyright_callback',
	) ) );

	/* End Footer Footer Bottom Right Text Color setting */

	/* Hamburger Menu Separator Setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_hamburger_menu_separator', array(
	    'label'      		=> esc_attr__( 'Hamburger Menu', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'   		=> 'pofo_hamburger_menu_separator',
	    'description'		=> '',
	    'active_callback'   => 'pofo_hamburger_menu_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_hamburger_menu_separator_callback' ) ) {
		function pofo_hamburger_menu_separator_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Hamburger Menu Separator Setting */

	/* Menu Background Image */

    $wp_customize->add_setting( 'pofo_menu_background_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_menu_background_image', array(
		'label'       		=> esc_attr__( 'Background Image', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_menu_background_image',
		'active_callback'	=> 'pofo_menu_background_image_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_background_image_callback' ) ) {
		function pofo_menu_background_image_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Background Image */

	/* Menu Background Logo */

        $wp_customize->add_setting( 'pofo_menu_background_logo', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_menu_background_logo', array(
		'label'       		=> esc_attr__( 'Logo', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_menu_background_logo',
		'active_callback'	=> 'pofo_menu_background_logo_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_background_logo_callback' ) ) {
		function pofo_menu_background_logo_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Background Logo */

	/* Menu Background Ratina Logo */

        $wp_customize->add_setting( 'pofo_menu_background_logo_ratina', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_menu_background_logo_ratina', array(
		'label'       		=> esc_attr__( 'Ratina Logo', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_menu_background_logo_ratina',
		'active_callback'	=> 'pofo_menu_background_logo_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_background_logo_callback' ) ) {
		function pofo_menu_background_logo_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Background Ratina Logo */

	/* Menu Background Overlay Color Setting */

	$wp_customize->add_setting( 'pofo_menu_background_overlay_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_menu_background_overlay_color', array(
	    'label'      		=> esc_attr__( 'Background Overlay Color', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_menu_background_overlay_color',
	    'active_callback'	=> 'pofo_menu_background_overlay_color_callback',
	) ) );

	if ( ! function_exists( 'pofo_menu_background_overlay_color_callback' ) ) {
		function pofo_menu_background_overlay_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Background Overlay Color Setting */

	/* Menu BG Overlay Zindex */

	$wp_customize->add_setting( 'pofo_menu_background_overlay_opacity', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_menu_background_overlay_opacity', array(
	    'label'      		=> esc_attr__( 'Background Overlay Opacity', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_menu_background_overlay_opacity',
	    'type'       		=> 'select',
		'choices'    		=> array(
								'0.0' => esc_html__( 'No Opacity', 'pofo' ),
							    '0.1'  => '0.1',
							    '0.2'  => '0.2',
							    '0.3'  => '0.3',
							    '0.4'  => '0.4',
							    '0.5'  => '0.5',
							    '0.6'  => '0.6',
							    '0.7'  => '0.7',
							    '0.8'  => '0.8',
							    '0.9'  => '0.9',
							    '1.0'  => '1.0',
				   			 ),
	    'active_callback'	=> 'pofo_menu_background_overlay_opacity_callback',
	) );

	if ( ! function_exists( 'pofo_menu_background_overlay_opacity_callback' ) ) {
		function pofo_menu_background_overlay_opacity_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu BG Overlay Zindex */

	/* Enable Hamburger Menu Sidebar */

    $wp_customize->add_setting( 'pofo_disable_hamburger_menu_sidebar', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_hamburger_menu_sidebar', array(
		'label'       		=> esc_attr__( 'Hamburger Menu Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_disable_hamburger_menu_sidebar',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_hamburger_menu_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_hamburger_menu_sidebar_callback' ) ) {
		function pofo_hamburger_menu_sidebar_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Enable Hamburger Menu Sidebar */

	/* Hamburger Menu Sidebar */

	$wp_customize->add_setting( 'pofo_hamburger_menu_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_hamburger_menu_sidebar', array(
		'label'       		=> esc_attr__( 'Select Hamburger Menu Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_hamburger_menu_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'	=> 'pofo_hamburger_menu_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_hamburger_menu_sidebar_callback' ) ) {
		function pofo_hamburger_menu_sidebar_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_disable_header_sidebar' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Hamburger Menu Sidebar */

	/* Hamburger Menu Separator Setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_font_color_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_hamburger_menu_font_color_separator', array(
	    'label'      		=> esc_attr__( 'Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'   		=> 'pofo_hamburger_menu_font_color_separator',
	    'description'		=> '',
	    'active_callback'   => 'pofo_hamburger_menu_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_hamburger_menu_separator_callback' ) ) {
		function pofo_hamburger_menu_separator_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Hamburger Menu Separator Setting */

  	/* Hamburger Menu Text Transform setting */

    $wp_customize->add_setting( 'pofo_hamburger_menu_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_hamburger_menu_text_transform', array(
		'label'       		=> esc_attr__( 'Menu Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_hamburger_menu_section',
		'settings'			=> 'pofo_hamburger_menu_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Menu Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-inherit'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	) ) );

	/* End Hamburger Menu Text Transform setting */

	/* Hamburger Menu Text font size setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_hamburger_menu_text_font_size', array(
	    'label'      		=> esc_attr__( 'Menu Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	) );

	/* End Hamburger Menu Text font size setting */

	/* Hamburger Menu Text line height setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_hamburger_menu_text_line_height', array(
	    'label'      		=> esc_attr__( 'Menu Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	) );

	/* End Hamburger Menu Text line height setting */

	/* Hamburger Menu Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_hamburger_menu_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Menu Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	) );

	/* End Hamburger Menu Text letter spacing setting */

	/* Hamburger Menu Icon font size setting */

	$wp_customize->add_setting( 'pofo_hamburger_menu_icon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_hamburger_menu_icon_font_size', array(
	    'label'      		=> esc_attr__( 'Icon Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_icon_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	) );

	/* End Hamburger Menu Icon font size setting */

	/* Menu Background Color Setting */

	$wp_customize->add_setting( 'pofo_menu_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_menu_background_color', array(
	    'label'      		=> esc_attr__( 'Menu Background Color', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_menu_background_color',
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	if ( ! function_exists( 'pofo_menu_background_color_callback' ) ) {
		function pofo_menu_background_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Menu Background Color Setting */

	/* Select Menu Text Color */

	$wp_customize->add_setting( 'pofo_hamburger_menu_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hamburger_menu_text_color', array(
	    'label'      		=> esc_attr__( 'Menu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_text_color',
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Menu Text Color */

	/* Select Menu Hover Text Color */

	$wp_customize->add_setting( 'pofo_hamburger_menu_hover_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_hamburger_menu_hover_text_color', array(
	    'label'      		=> esc_attr__( 'Menu Text Hover', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_hamburger_menu_section',
	    'settings'	 		=> 'pofo_hamburger_menu_hover_text_color',
	    'active_callback'	=> 'pofo_menu_background_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* Color Separator Setting */

	$wp_customize->add_setting( 'pofo_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_header_separator', array(
	    'label'      		=> esc_attr__( 'Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'   		=> 'pofo_header_separator',
	    'description'		=> '',
	    //'active_callback'           => 'pofo_header_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_separator_callback' ) ) {
		function pofo_header_separator_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Color Separator Setting */

  	/* Menu Text Transform setting */

    $wp_customize->add_setting( 'pofo_header_menu_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_menu_text_transform', array(
		'label'       		=> esc_attr__( 'Menu Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_header_color_section',
		'settings'			=> 'pofo_header_menu_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Menu Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-inherit'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
	    'active_callback'	=> 'pofo_header_menu_text_settings_callback',
	) ) );

	/* End Menu Text Transform setting */

	/* Header Text font size setting */

	$wp_customize->add_setting( 'pofo_header_menu_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_menu_text_font_size', array(
	    'label'      		=> esc_attr__( 'Menu Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_header_menu_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_menu_text_settings_callback',
	) );

	/* End Header Text font size setting */

	/* Header Text line height setting */

	$wp_customize->add_setting( 'pofo_header_menu_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_menu_text_line_height', array(
	    'label'      		=> esc_attr__( 'Menu Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_header_menu_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_menu_text_settings_callback',
	) );

	/* End Header Text line height setting */

	/* Header Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_header_menu_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_menu_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Menu Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_header_menu_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_menu_text_settings_callback',
	) );

	/* End Header Text letter spacing setting */

	if ( ! function_exists( 'pofo_header_menu_text_settings_callback' ) ) {
		function pofo_header_menu_text_settings_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* Header Icon font size setting */

	$wp_customize->add_setting( 'pofo_header_menu_icon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_menu_icon_font_size', array(
	    'label'      		=> esc_attr__( 'Icon Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_header_menu_icon_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Header Text font size setting */

	/* Select Header Background Color */

	$wp_customize->add_setting( 'pofo_header_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_background_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_header_background_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Header Background Color */

	/* Select Menu Text Color */

	$wp_customize->add_setting( 'pofo_menu_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_menu_text_color', array(
	    'label'      		=> esc_attr__( 'Menu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_menu_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Menu Text Color */

	/* Select Menu Hover Text Color */

	$wp_customize->add_setting( 'pofo_menu_hover_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_menu_hover_text_color', array(
	    'label'      		=> esc_attr__( 'Menu Text Hover', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_menu_hover_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Menu Hover Text Color */

	/* Select Sticky Header Background Color */

	$wp_customize->add_setting( 'pofo_sticky_header_background_color', array(
		'default'     => '#ffffff',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_sticky_header_background_color', array(
	    'label'      		=> esc_attr__( 'Sticky Header Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_sticky_header_background_color',
	    'active_callback'	=> 'pofo_sticky_header_bg_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	if ( ! function_exists( 'pofo_sticky_header_bg_color_callback' ) ) {
		function pofo_sticky_header_bg_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Sticky Header Background Color */

	/* Select Sticky Menu Text Color */

	$wp_customize->add_setting( 'pofo_sticky_menu_text_color', array(
		'default'     => '#232323',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_sticky_menu_text_color', array(
	    'label'      		=> esc_attr__( 'Sticky Header Menu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_sticky_menu_text_color',
	    'active_callback'	=> 'pofo_sticky_menu_text_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	if ( ! function_exists( 'pofo_sticky_menu_text_color_callback' ) ) {
		function pofo_sticky_menu_text_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Sticky Menu Text Color */

	/* Select Sticky Menu Hover Text Color */

	$wp_customize->add_setting( 'pofo_sticky_menu_hover_text_color', array(
		'default'     => 'rgba(0,0,0,0.6)',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_sticky_menu_hover_text_color', array(
	    'label'      		=> esc_attr__( 'Sticky Header Menu Text Hover', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_header_color_section',
	    'settings'	 		=> 'pofo_sticky_menu_hover_text_color',
	    'active_callback'	=> 'pofo_sticky_menu_hover_text_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	if ( ! function_exists( 'pofo_sticky_menu_hover_text_color_callback' ) ) {
		function pofo_sticky_menu_hover_text_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Sticky Menu Hover Text Color */

	/* Submenu Color Separator Setting */

	$wp_customize->add_setting( 'pofo_header_submenu_color_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_header_submenu_color_separator', array(
	    'label'      		=> esc_attr__( 'Submenu Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'   		=> 'pofo_header_submenu_color_separator',
	    'description'		=> '',
	    //'active_callback'   => 'pofo_header_separator_callback',
	) ) );

	/* End Submenu Color Separator Setting */

  	/* Heading Text Transform setting */

    $wp_customize->add_setting( 'pofo_header_submenu_heading_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_submenu_heading_text_transform', array(
		'label'       		=> esc_attr__( 'Heading Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_submenu_color_section',
		'settings'			=> 'pofo_header_submenu_heading_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Heading Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-inherit'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
	    'active_callback'	=> 'pofo_header_submenu_heading_color_callback',
	) ) );

	/* End Heading Text Transform setting */

	/* Heading font size setting */

	$wp_customize->add_setting( 'pofo_header_submenu_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_heading_font_size', array(
	    'label'      		=> esc_attr__( 'Heading Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_heading_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_submenu_heading_color_callback',
	) );

	/* End Heading font size setting */

	/* Heading line height setting */

	$wp_customize->add_setting( 'pofo_header_submenu_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_heading_line_height', array(
	    'label'      		=> esc_attr__( 'Heading Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_heading_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_submenu_heading_color_callback',
	) );

	/* End Heading line height setting */

	/* Heading letter spacing setting */

	$wp_customize->add_setting( 'pofo_header_submenu_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_heading_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Heading Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_heading_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	    'active_callback'	=> 'pofo_header_submenu_heading_color_callback',
	) );

	/* End Heading letter spacing setting */

  	/* Header Submenu Text Transform setting */

    $wp_customize->add_setting( 'pofo_header_submenu_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_header_submenu_text_transform', array(
		'label'       		=> esc_attr__( 'Submenu Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_submenu_color_section',
		'settings'			=> 'pofo_header_submenu_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Submenu Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-inherit'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
	) ) );

	/* End Header Submenu Text Transform setting */

	/* Header Submenu Text font size setting */

	$wp_customize->add_setting( 'pofo_header_submenu_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_text_font_size', array(
	    'label'      		=> esc_attr__( 'Submenu Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Header Submenu Text font size setting */

	/* Header Submenu Text line height setting */

	$wp_customize->add_setting( 'pofo_header_submenu_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_text_line_height', array(
	    'label'      		=> esc_attr__( 'Submenu Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Header Submenu Text line height setting */

	/* Header Submenu Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_header_submenu_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Submenu Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Header Submenu Text letter spacing setting */

	/* Header Submenu Icon font size setting */

	$wp_customize->add_setting( 'pofo_header_submenu_icon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_submenu_icon_font_size', array(
	    'label'      		=> esc_attr__( 'Icon Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_icon_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Header Submenu Text font size setting */

	/* Select Submenu Background Color */

	$wp_customize->add_setting( 'pofo_header_submenu_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_submenu_background_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_background_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Submenu Background Color */

	/* Select Submenu Heading Color */

	$wp_customize->add_setting( 'pofo_header_submenu_heading_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
		//'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_submenu_heading_color', array(
	    'label'      		=> esc_attr__( 'Heading', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_heading_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'	=> 'pofo_header_submenu_heading_color_callback',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	if ( ! function_exists( 'pofo_header_submenu_heading_color_callback' ) ) {
		function pofo_header_submenu_heading_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype2' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Submenu Heading Color */

	/* Select Submenu Text Color */

	$wp_customize->add_setting( 'pofo_header_submenu_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_submenu_text_color', array(
	    'label'      		=> esc_attr__( 'Submenu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_text_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Submenu Text Color */

	/* Select Submenu Hover Color */

	$wp_customize->add_setting( 'pofo_header_submenu_hover_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_submenu_hover_color', array(
	    'label'      		=> esc_attr__( 'Submenu Text Hover', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_submenu_hover_color',
	    'show_opacity'  	=> true, // Optional.
	) ) );

	/* End Submenu Hover Color */

	/* Select Third Level Menu Background Color */

	$wp_customize->add_setting( 'pofo_header_third_level_menu_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_third_level_menu_background_color', array(
	    'label'      		=> esc_attr__( 'Third Level Menu Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_submenu_color_section',
	    'settings'	 		=> 'pofo_header_third_level_menu_background_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_third_level_menu_background_color_color_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_third_level_menu_background_color_color_separator_callback' ) ) {
		function pofo_header_third_level_menu_background_color_color_separator_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype3' || $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype4' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Third Level Menu Background Color */

	/* Mobile Menu Color Separator Setting */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_header_mobile_menu_separator', array(
	    'label'      		=> esc_attr__( 'Breakpoint', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'   		=> 'pofo_header_mobile_menu_separator',
	    'description'		=> '',
	    //'active_callback'   => 'pofo_header_mobile_menu_color_separator_callback',
	) ) );

	/* End Mobile Menu Color Separator Setting */

	/* Mobile Menu Breakpoint setting */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_breakpoint', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_header_mobile_menu_breakpoint', array(
	    'label'      		=> esc_attr__( 'Breakpoint', 'pofo' ),
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_menu_breakpoint',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add breakpoint like 767, By default breakpoint is 991.', 'pofo' ),
	    //'active_callback'	=> 'pofo_header_mobile_menu_color_separator_callback',
	) );

	/* End Mobile Menu Breakpoint setting */

	/* Mobile Menu Color Separator Setting */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_color_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_header_mobile_menu_color_separator', array(
	    'label'      		=> esc_attr__( 'Mobile Menu Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'   		=> 'pofo_header_mobile_menu_color_separator',
	    'description'		=> '',
	    'active_callback'   => 'pofo_header_mobile_menu_color_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_mobile_menu_color_separator_callback' ) ) {
		function pofo_header_mobile_menu_color_separator_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Mobile Menu Color Separator Setting */

	/* Select Mobile Menu Background Color */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_menu_background_color', array(
	    'label'      		=> esc_attr__( 'Menu Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_menu_background_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	if ( ! function_exists( 'pofo_header_mobile_menu_color_callback' ) ) {
		function pofo_header_mobile_menu_color_callback( $control ) {
			if ( $control->manager->get_setting( 'pofo_header_type' )->value() == 'headertype1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	}

	/* End Mobile Menu Background Color */

	/* Select Mobile Menu Text Color */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_menu_text_color', array(
	    'label'      		=> esc_attr__( 'Menu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_menu_text_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Mobile Menu Text Color */

	/* Select Mobile Menu Hover Color */

	$wp_customize->add_setting( 'pofo_header_mobile_menu_hover_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_menu_hover_color', array(
	    'label'      		=> esc_attr__( 'Menu Hover Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_menu_hover_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Mobile Menu Hover Color */

	/* Select Submenu Background Color */

	$wp_customize->add_setting( 'pofo_header_mobile_submenu_background_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_submenu_background_color', array(
	    'label'      		=> esc_attr__( 'Submenu Background', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_submenu_background_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Submenu Background Color */

	/* Select Submenu Heading Color */

	$wp_customize->add_setting( 'pofo_header_mobile_submenu_heading_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_submenu_heading_color', array(
	    'label'      		=> esc_attr__( 'Submenu Heading', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_submenu_heading_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Submenu Heading Color */

	/* Select Submenu Text Color */

	$wp_customize->add_setting( 'pofo_header_mobile_submenu_text_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_submenu_text_color', array(
	    'label'      		=> esc_attr__( 'Submenu Text', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_submenu_text_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Submenu Text Color */

	/* Select Submenu Hover Color */

	$wp_customize->add_setting( 'pofo_header_mobile_submenu_hover_color', array(
		'default'     => '',
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_control( new Pofo_Alpha_Color_Control( $wp_customize, 'pofo_header_mobile_submenu_hover_color', array(
	    'label'      		=> esc_attr__( 'Submenu Text Hover', 'pofo' ),
	    'type'              => 'alpha_color',
	    'section'    		=> 'pofo_add_mobile_menu_color_section',
	    'settings'	 		=> 'pofo_header_mobile_submenu_hover_color',
	    'show_opacity'  	=> true, // Optional.
	    'active_callback'   => 'pofo_header_mobile_menu_color_callback',
	) ) );

	/* End Submenu Hover Color */