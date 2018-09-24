<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_body_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_body_setting_separator', array(
	    'label'      		=> esc_attr__( 'Font Size and Line Height', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'   		=> 'pofo_body_setting_separator',	    
	) ) );

	/* End Separator Settings */

	/* Body font size setting */

	$wp_customize->add_setting( 'pofo_body_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_body_font_size', array(
	    'label'      		=> esc_attr__( 'Body Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_body_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
	) );

	/* End Body font size setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_body_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_body_font_line_height', array(
	    'label'      		=> esc_attr__( 'Body Font Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_body_font_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_body_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_body_font_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Body Font Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_body_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font letter spacing like 24px.', 'pofo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Content font size setting */

	$wp_customize->add_setting( 'pofo_content_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_content_font_size', array(
	    'label'      		=> esc_attr__( 'Content Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_content_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Content font size setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_content_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_content_font_line_height', array(
	    'label'      		=> esc_attr__( 'Content Font Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_content_font_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
	) );

	/* End Body Font Line Height Setting */

	/* Body Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_content_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_content_font_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Content Font Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_general_color_section',
	    'settings'	 		=> 'pofo_content_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font letter spacing like 24px.', 'pofo' ),
	) );

	/* End Body Font Line Height Setting */

	/*
	 * For Content Settings
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_content_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_content_setting_separator', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_content_color_section',
	    'settings'   		=> 'pofo_general_content_setting_separator',	    
	) ) );

	/* End Separator Settings */

	/* Body Background Color Setting */

	$wp_customize->add_setting( 'pofo_body_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_body_background_color', array(
	    'label'      		=> esc_attr__( 'Body Background', 'pofo' ),
	    'section'    		=> 'pofo_add_content_color_section',
	    'settings'	 		=> 'pofo_body_background_color',
	) ) );

	/* End Body Background Color Setting */

	/* Body Text Color Setting */

	$wp_customize->add_setting( 'pofo_body_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_body_text_color', array(
	    'label'      		=> esc_attr__( 'Body Text', 'pofo' ),
	    'section'    		=> 'pofo_add_content_color_section',
	    'settings'	 		=> 'pofo_body_text_color',
	) ) );

	/* End Body Text Color Setting */

	/* Content Link Color Setting */

	$wp_customize->add_setting( 'pofo_content_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_content_link_color', array(
	    'label'      		=> esc_attr__( 'Link', 'pofo' ),
	    'section'    		=> 'pofo_add_content_color_section',
	    'settings'	 		=> 'pofo_content_link_color',
	) ) );

	/* End Content Link Color Setting */

	/* Content Link Hover Color Setting */

	$wp_customize->add_setting( 'pofo_content_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_content_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_content_color_section',
	    'settings'	 		=> 'pofo_content_link_hover_color',
	) ) );

	/* End Content Link Hover Color Setting */