<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_page_not_found_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_page_not_found_separator', array(
	    'label'      		=> esc_attr__( '404 Page', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'   		=> 'pofo_page_not_found_separator',	   
	    'priority'	 		=> 3, 
	) ) );

	/* End Separator Settings */

  	/* Page Not Found Image */

    $wp_customize->add_setting( 'pofo_page_not_found_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_page_not_found_image', array(
		'label'       		=> esc_attr__( 'Background Image ', 'pofo' ),
		'description'		=> esc_attr__( 'Recommended image size is 1920px X 1200px.', 'pofo' ), 
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_image',
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Image */

	/* Page Not Found Image srcset setting */

    $wp_customize->add_setting( 'pofo_page_not_found_title_image_srcset', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_page_not_found_title_image_srcset', array(
		'label'       		=> esc_attr__( 'Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_title_image_srcset',
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Image srcset */

	/* Page Not Found Title */

	$wp_customize->add_setting( 'pofo_page_not_found_title', array(
		'default' 			=> '404!',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_title',
		'type'              => 'text',
		'priority'	 		=> 3,
		
	) ) );

	/* End Page Not Found Title */

	/* Title Text Transform setting */

    $wp_customize->add_setting( 'pofo_page_not_found_title_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_title_text_transform', array(
		'label'       		=> esc_attr__( 'Title Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Title Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-normal'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
		'priority'	 		=> 3,
	) ) );

	/* End Title Text Transform setting */

	/* Page Not Found Subtitle */

	$wp_customize->add_setting( 'pofo_page_not_found_subtitle', array(
		'default' 			=> 'Page Not Found',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_subtitle', array(
		'label'       		=> esc_attr__( 'Subtitle', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_subtitle',
		'type'              => 'text',
		'priority'	 		=> 3,
		
	) ) );

	/* Page Not Found Subtitle */

	/* Page Not Found Subtitle Text Transform setting */

    $wp_customize->add_setting( 'pofo_page_not_found_subtitle_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_subtitle_text_transform', array(
		'label'       		=> esc_attr__( 'Subtitle Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_subtitle_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Subtitle Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-normal'		=> esc_html__( 'Normal', 'pofo' ),
								   ),
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Subtitle Text Transform setting */

	/* Page Not Found Content */

	$wp_customize->add_setting( 'pofo_page_not_found_content', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_content', array(
		'label'       		=> esc_attr__( 'Content', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_content',
		'type'              => 'textarea',
		'priority'	 		=> 3,
		
	) ) );

	/* End Page Not Found Content */

	/* Page Not Found Hide Button */

    $wp_customize->add_setting( 'pofo_page_not_found_button', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_page_not_found_button', array(
		'label'       		=> esc_attr__( 'Home Button', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_button',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Hide Button */

	/* Page Not Found Button Text */

	$wp_customize->add_setting( 'pofo_page_not_found_button_text', array(
		'default' 			=> 'Go to home page',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_button_text', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_button_text',
		'type'              => 'text',
		'active_callback'   => 'pofo_page_not_found_hide_button',
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Button Text */

	/* Page Not Found Button Text Transform setting */

    $wp_customize->add_setting( 'pofo_page_not_found_button_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_button_text_transform', array(
		'label'       		=> esc_attr__( 'Button Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_button_text_transform',
		'type'              => 'select',
		'active_callback'   => 'pofo_page_not_found_hide_button',
		'choices'           => array(
									''		=> esc_html__( 'Select Button Text Transform', 'pofo' ),
								    'uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Button Text Transform setting */

	/* Page Not Found Button URL */

	$wp_customize->add_setting( 'pofo_page_not_found_button_url', array(
		'default' 			=> home_url('/'),
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_not_found_button_url', array(
		'label'       		=> esc_attr__( 'Button URL', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_button_url',
		'type'              => 'text',
		'active_callback'   => 'pofo_page_not_found_hide_button',
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Button URL */

	/* Page Not Found Hide Search */

    $wp_customize->add_setting( 'pofo_page_not_found_search', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_page_not_found_search', array(
		'label'       		=> esc_attr__( 'Search Field', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_page_not_found_search',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'pofo' ),
								  	'0' => esc_html__( 'No', 'pofo' ),
							   ),
		'priority'	 		=> 3,
	) ) );

	/* End Page Not Found Hide Search */

	/* 404 Title color setting */

	$wp_customize->add_setting( 'pofo_404_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_404_title_color', array(
	    'label'      		=> esc_attr__( 'Title Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_404_title_color',
	    'priority'	 		=> 3,
	) ) );

	/* End 404 Title color setting */

	/* 404 Subtitle color setting */

	$wp_customize->add_setting( 'pofo_404_subtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_404_subtitle_color', array(
	    'label'      		=> esc_attr__( 'Subtitle Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_404_subtitle_color',
	    'priority'	 		=> 3,
	) ) );

	/* End 404 Subtitle color setting */

	/* 404 Content color setting */

	$wp_customize->add_setting( 'pofo_404_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_404_content_color', array(
	    'label'      		=> esc_attr__( 'Content Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_404_content_color',
	    'priority'	 		=> 3,
	) ) );

	/* End 404 Content color setting */

	/* 404 Content BG color setting */

	$wp_customize->add_setting( 'pofo_404_content_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_404_content_bg_color', array(
	    'label'      		=> esc_attr__( 'Content Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_404_content_bg_color',
	    'priority'	 		=> 3,
	) ) );

	/* End 404 Content BG color setting */

	/* 404 Title BG color setting */

	$wp_customize->add_setting( 'pofo_404_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_404_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_general_panel',
	    'settings'	 		=> 'pofo_404_bg_color',
	    'priority'	 		=> 3,
	) ) );

	/* End 404 Title color setting */

	/* Default Page Title Opacity */

    $wp_customize->add_setting( 'pofo_404_page_opacity', array(
		'default' 			=> '0.8',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_404_page_opacity', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_general_panel',
		'settings'			=> 'pofo_404_page_opacity',
		'type'              => 'select',
		'choices'           => array(
									'0.0'   => esc_html__( 'No Opacity', 'pofo' ),
								    '0.1'   => esc_html__( '0.1', 'pofo' ),
								    '0.2'   => esc_html__( '0.2', 'pofo' ),
								    '0.3'   => esc_html__( '0.3', 'pofo' ),
								    '0.4'   => esc_html__( '0.4', 'pofo' ),
								    '0.5'   => esc_html__( '0.5', 'pofo' ),
								    '0.6'   => esc_html__( '0.6', 'pofo' ),
								    '0.7'   => esc_html__( '0.7', 'pofo' ),
								    '0.8'   => esc_html__( '0.8', 'pofo' ),
								    '0.9'   => esc_html__( '0.9', 'pofo' ),
								    '1.0'   => esc_html__( '1.0', 'pofo' ),
							   ),
		'priority'	 		=> 3,
	) ) );
   
  	/* End Default Title Opacity */

   	/* Custom Callback Functions */

   	if( ! function_exists( 'pofo_page_not_found_hide_button' ) ) :
	   	function pofo_page_not_found_hide_button( $control )	{
	        if ( $control->manager->get_setting( 'pofo_page_not_found_button' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Custom Callback Functions */