<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_comment_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_comment_setting_separator', array(
	    'label'      		=> esc_attr__( 'Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'   		=> 'pofo_comment_setting_separator',	    
	) ) );

	/* End Separator Settings */

	/* Comment Border */

	$wp_customize->add_setting( 'pofo_general_comment_title_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_general_comment_title_border', array(
		'label'       		=> esc_attr__( 'Border', 'pofo' ),
		'section'     		=> 'pofo_add_comment_color_section',
		'settings'			=> 'pofo_general_comment_title_border',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Comment Border */

	/* Comment font size setting */

	$wp_customize->add_setting( 'pofo_comment_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_comment_title_font_size', array(
	    'label'      		=> esc_attr__( 'Comment Title Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'	 		=> 'pofo_comment_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
	) );

	/* End Comment font size setting */

	/* Comment Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_comment_title_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_comment_title_font_line_height', array(
	    'label'      		=> esc_attr__( 'Comment Title Font Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'	 		=> 'pofo_comment_title_font_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
	) );

	/* End Comment Font Line Height Setting */

	/* Comment Font Letter Spacing Setting */

	$wp_customize->add_setting( 'pofo_comment_title_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_comment_title_font_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Comment Title Font Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'	 		=> 'pofo_comment_title_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font letter spacing like 24px.', 'pofo' ),
	) );

	/* End Comment Font Letter Spacing Setting */

	/* Comment Title Color Setting */

	$wp_customize->add_setting( 'pofo_general_comment_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_general_comment_title_color', array(
	    'label'      		=> esc_attr__( 'Comment Title', 'pofo' ),
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'	 		=> 'pofo_general_comment_title_color',
	) ) );

	/* End Comment Title Color Setting */

	/* Comment Title Color Setting */

	$wp_customize->add_setting( 'pofo_general_comment_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_general_comment_border_color', array(
	    'label'      		=> esc_attr__( 'Comment Border', 'pofo' ),
	    'section'    		=> 'pofo_add_comment_color_section',
	    'settings'	 		=> 'pofo_general_comment_border_color',
		'active_callback'   => 'pofo_general_comment_border_callback',
	) ) );

	/* End Comment Title Color Setting */

	if ( ! function_exists( 'pofo_general_comment_border_callback' ) ) :
		function pofo_general_comment_border_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_general_comment_title_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;