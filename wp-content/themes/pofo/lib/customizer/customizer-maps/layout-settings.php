<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/*
	 * Page layout setting panel.
	 */
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_page_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_page_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_page_layout_panel',
	    'settings'   		=> 'pofo_single_page_separator',	    
	) ) );

	/* End Separator Settings */

	/* Page General Layout */

	$wp_customize->add_setting( 'pofo_page_layout_setting', array(
		'default' 			=> 'pofo_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_page_layout_setting', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_page_layout_panel',
		'settings'			=> 'pofo_page_layout_setting',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
										'pofo_layout_full_screen_12col' => esc_html__( 'One Column', 'pofo' ),
									  	'pofo_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'pofo' ),
									  	'pofo_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'pofo' ),
									  	'pofo_layout_both_sidebar'     => esc_html__( 'Three Columns Right', 'pofo' ),
								    ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/1col.png',
								  	POFO_THEME_IMAGES_URI . '/2cl.png',
								  	POFO_THEME_IMAGES_URI . '/2cr.png',
								  	POFO_THEME_IMAGES_URI . '/3cm.png',
							   ),
		'pofo_columns'    	=> '4',
	) ) );

	/* End Page General Layout */

	/* Page Left Sidebar */

	$wp_customize->add_setting( 'pofo_page_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_page_layout_panel',
		'settings'			=> 'pofo_page_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_page_left_sidebar_layout_callback',
	) ) );

	/* End Page Left Sidebar */

	/* Page Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_page_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_page_layout_panel',
		'settings'			=> 'pofo_page_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_page_right_sidebar_layout_callback',
	) ) );

	/* End Page Right Sidebar */

	/* Page Container Setting */

	$wp_customize->add_setting( 'pofo_page_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_page_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_page_layout_panel',
		'settings'			=> 'pofo_page_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),
	) ) );

	/* End Page Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_page_comment_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_page_comment_separator', array(
	    'label'      		=> esc_attr__( 'Comments', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_page_layout_panel',
	    'settings'   		=> 'pofo_single_page_comment_separator',	    
	) ) );

	/* End Separator Settings */

	/* Hide Comment */

	$wp_customize->add_setting( 'pofo_hide_page_comment', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_page_comment', array(
		'label'       		=> esc_attr__( 'Comments', 'pofo' ),
		'section'     		=> 'pofo_add_page_layout_panel',
		'settings'			=> 'pofo_hide_page_comment',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'description'       => esc_html__( '( if page comment is off in WordPress then it cannot be switched on here. )', 'pofo' ),
	) ) );

	/* End Hide Comment */

	/* Custom Callback Functions */

	if ( ! function_exists( 'pofo_page_left_sidebar_layout_callback' ) ) :
		function pofo_page_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_page_layout_setting' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_page_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_page_right_sidebar_layout_callback' ) ) :
		function pofo_page_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_page_layout_setting' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_page_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Custom Callback Functions */