<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Get All Register Sidebar List. */
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_mini_header_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_mini_header_separator', array(
	    'label'      		=> esc_attr__( 'General', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_mini_header_section',
	    'settings'   		=> 'pofo_mini_header_separator',	    
	) ) );

	/* End Separator Settings */

 	/* Enable Mini Header */

    $wp_customize->add_setting( 'pofo_disable_mini_header', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_mini_header', array(
		'label'       		=> esc_attr__( 'Mini Header', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_disable_mini_header',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Mini Header */

	/* Enable Sticky mini header */

    $wp_customize->add_setting( 'pofo_sticky_mini_header', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_sticky_mini_header', array(
		'label'       		=> esc_attr__( 'Sticky Mini Header', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_sticky_mini_header',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Sticky mini header */

	/* Select Container Style */

	$wp_customize->add_setting( 'pofo_mini_header_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_mini_header_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_mini_header_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
								    'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),
	) ) );

	/* End Select Container Style */

	/* Enable Left Sidebar */

        $wp_customize->add_setting( 'pofo_disable_mini_header_left_sidebar', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_mini_header_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_disable_mini_header_left_sidebar',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Left Sidebar */

	/* Left Sidebar */

	$wp_customize->add_setting( 'pofo_mini_header_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_mini_header_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_mini_header_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'	=> 'pofo_mini_header_left_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_mini_header_left_sidebar_callback' ) ) {
            function pofo_mini_header_left_sidebar_callback( $control ) {
                    if ( $control->manager->get_setting( 'pofo_disable_mini_header_left_sidebar' )->value() == '1' ) {
                    return true;
                } else {
                    return false;
                }
            }
	}

	/* End Left Sidebar */

	/* Enable Right Sidebar */

        $wp_customize->add_setting( 'pofo_disable_mini_header_right_sidebar', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_mini_header_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_disable_mini_header_right_sidebar',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Right Sidebar */

	/* Right Sidebar */

	$wp_customize->add_setting( 'pofo_mini_header_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_mini_header_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_mini_header_section',
		'settings'			=> 'pofo_mini_header_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'	=> 'pofo_mini_header_right_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_mini_header_right_sidebar_callback' ) ) {
            function pofo_mini_header_right_sidebar_callback( $control ) {
                    if ( $control->manager->get_setting( 'pofo_disable_mini_header_right_sidebar' )->value() == '1' ) {
                    return true;
                } else {
                    return false;
                }
            }
	}

	/* End Right Sidebar */

	/* Color Separator Settings */
	$wp_customize->add_setting( 'pofo_mini_header_color_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_mini_header_color_separator', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_mini_header_section',
	    'settings'   		=> 'pofo_mini_header_color_separator',	    
	) ) );

	/* End Color Separator Settings */

	/* Mini Header Background Color */

	$wp_customize->add_setting( 'pofo_mini_header_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_mini_header_background_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'section'    		=> 'pofo_add_mini_header_section',
	    'settings'	 		=> 'pofo_mini_header_background_color',
	) ) );

	/* End Mini Header Background Color */

	/* Mini Header Text Color */

	$wp_customize->add_setting( 'pofo_mini_header_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_mini_header_text_color', array(
	    'label'      		=> esc_attr__( 'Text', 'pofo' ),
	    'section'    		=> 'pofo_add_mini_header_section',
	    'settings'	 		=> 'pofo_mini_header_text_color',
	) ) );

	/* End Mini Header Text Color */

	/* Mini Header Text Hover Color */

	$wp_customize->add_setting( 'pofo_mini_header_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_mini_header_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Text Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_mini_header_section',
	    'settings'	 		=> 'pofo_mini_header_text_hover_color',
	) ) );

	/* End Mini Header Text Hover Color */