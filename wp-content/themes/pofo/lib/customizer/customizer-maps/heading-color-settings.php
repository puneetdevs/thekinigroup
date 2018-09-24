<?php
	
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/*
	 * For General Settings
	 */

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_h1_logo_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h1_logo_separator', array(
        'label'             => esc_attr__( 'H1 Logo', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h1_logo_separator',     
    ) ) );

    /* End Separator Settings */

    /* H1 in logo in front page setting */

    $wp_customize->add_setting( 'pofo_h1_logo_font_page', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_h1_logo_font_page', array(
        'label'             => esc_attr__( 'H1 in logo in front / home page?', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h1_logo_font_page',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'pofo' ),
                                    '0' => esc_html__( 'Off', 'pofo' ),
                               ),
    ) ) );

    /* End H1 in logo in front page setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_h1_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h1_setting_separator', array(
	    'label'      		=> esc_attr__( 'H1 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_heading_color_section',
	    'settings'   		=> 'pofo_h1_setting_separator',	    
	) ) );

	/* End Separator Settings */

	/* H1 font size setting */

	$wp_customize->add_setting( 'pofo_h1_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_h1_font_size', array(
	    'label'      		=> esc_attr__( 'H1 Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_heading_color_section',
	    'settings'	 		=> 'pofo_h1_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
	) );

	/* End H1 font size setting */

	/* H1 Font Line Height Setting */

	$wp_customize->add_setting( 'pofo_h1_font_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_h1_font_line_height', array(
	    'label'      		=> esc_attr__( 'H1 Font Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_heading_color_section',
	    'settings'	 		=> 'pofo_h1_font_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
	) );

	/* End H1 Font Line Height Setting */

	/* H1 Font Letter Spacing Setting */

	$wp_customize->add_setting( 'pofo_h1_font_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_h1_font_letter_spacing', array(
	    'label'      		=> esc_attr__( 'H1 Font Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_heading_color_section',
	    'settings'	 		=> 'pofo_h1_font_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
	) );

	/* End H1 Font Letter Spacing Setting */

	/* H1 Color Setting */

	$wp_customize->add_setting( 'pofo_heading_h1_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h1_color', array(
	    'label'      		=> esc_attr__( 'H1 Color', 'pofo' ),
	    'section'    		=> 'pofo_add_heading_color_section',
	    'settings'	 		=> 'pofo_heading_h1_color',
	) ) );

	/* End H1 Color Setting */

	/* Separator Settings */
    $wp_customize->add_setting( 'pofo_h2_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h2_setting_separator', array(
        'label'             => esc_attr__( 'H2 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h2_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H2 font size setting */

    $wp_customize->add_setting( 'pofo_h2_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h2_font_size', array(
        'label'             => esc_attr__( 'H2 Font Size', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h2_font_size',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
    ) );

    /* End H2 font size setting */

    /* H2 Font Line Height Setting */

    $wp_customize->add_setting( 'pofo_h2_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h2_font_line_height', array(
        'label'             => esc_attr__( 'H2 Font Line Height', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h2_font_line_height',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
    ) );

    /* End H2 Font Line Height Setting */

    /* H2 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'pofo_h2_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h2_font_letter_spacing', array(
        'label'             => esc_attr__( 'H2 Font Character Spacing', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h2_font_letter_spacing',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
    ) );

    /* End H2 Font Letter Spacing Setting */

    /* H2 Color Setting */

    $wp_customize->add_setting( 'pofo_heading_h2_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h2_color', array(
        'label'             => esc_attr__( 'H2 Color', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_heading_h2_color',
    ) ) );

    /* End H2 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_h3_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h3_setting_separator', array(
        'label'             => esc_attr__( 'H3 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h3_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H3 font size setting */

    $wp_customize->add_setting( 'pofo_h3_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h3_font_size', array(
        'label'             => esc_attr__( 'H3 Font Size', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h3_font_size',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
    ) );

    /* End H3 font size setting */

    /* H3 Font Line Height Setting */

    $wp_customize->add_setting( 'pofo_h3_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h3_font_line_height', array(
        'label'             => esc_attr__( 'H3 Font Line Height', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h3_font_line_height',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
    ) );

    /* End H3 Font Line Height Setting */

    /* H3 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'pofo_h3_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h3_font_letter_spacing', array(
        'label'             => esc_attr__( 'H3 Font Character Spacing', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h3_font_letter_spacing',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
    ) );

    /* End H3 Font Letter Spacing Setting */

    /* H3 Color Setting */

    $wp_customize->add_setting( 'pofo_heading_h3_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h3_color', array(
        'label'             => esc_attr__( 'H3 Color', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_heading_h3_color',
    ) ) );

    /* End H3 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_h4_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h4_setting_separator', array(
        'label'             => esc_attr__( 'H4 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h4_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H4 font size setting */

    $wp_customize->add_setting( 'pofo_h4_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h4_font_size', array(
        'label'             => esc_attr__( 'H4 Font Size', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h4_font_size',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
    ) );

    /* End H4 font size setting */

    /* H4 Font Line Height Setting */

    $wp_customize->add_setting( 'pofo_h4_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h4_font_line_height', array(
        'label'             => esc_attr__( 'H4 Font Line Height', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h4_font_line_height',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
    ) );

    /* End H4 Font Line Height Setting */

    /* H4 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'pofo_h4_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h4_font_letter_spacing', array(
        'label'             => esc_attr__( 'H4 Font Character Spacing', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h4_font_letter_spacing',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
    ) );

    /* End H4 Font Letter Spacing Setting */

    /* H4 Color Setting */

    $wp_customize->add_setting( 'pofo_heading_h4_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h4_color', array(
        'label'             => esc_attr__( 'H4 Color', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_heading_h4_color',
    ) ) );

    /* End H4 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_h5_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h5_setting_separator', array(
        'label'             => esc_attr__( 'H5 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h5_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H5 font size setting */

    $wp_customize->add_setting( 'pofo_h5_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h5_font_size', array(
        'label'             => esc_attr__( 'H5 Font Size', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h5_font_size',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
    ) );

    /* End H5 font size setting */

    /* H5 Font Line Height Setting */

    $wp_customize->add_setting( 'pofo_h5_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h5_font_line_height', array(
        'label'             => esc_attr__( 'H5 Font Line Height', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h5_font_line_height',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
    ) );

    /* End H5 Font Line Height Setting */

    /* H5 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'pofo_h5_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h5_font_letter_spacing', array(
        'label'             => esc_attr__( 'H5 Font Character Spacing', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h5_font_letter_spacing',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
    ) );

    /* End H5 Font Letter Spacing Setting */

    /* H5 Color Setting */

    $wp_customize->add_setting( 'pofo_heading_h5_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h5_color', array(
        'label'             => esc_attr__( 'H5 Color', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_heading_h5_color',
    ) ) );

    /* End H5 Color Setting */

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_h6_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_h6_setting_separator', array(
        'label'             => esc_attr__( 'H6 Font and Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h6_setting_separator',     
    ) ) );

    /* End Separator Settings */

    /* H6 font size setting */

    $wp_customize->add_setting( 'pofo_h6_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h6_font_size', array(
        'label'             => esc_attr__( 'H6 Font Size', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h6_font_size',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font size like 14px.', 'pofo' ),
    ) );

    /* End H6 font size setting */

    /* H6 Font Line Height Setting */

    $wp_customize->add_setting( 'pofo_h6_font_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h6_font_line_height', array(
        'label'             => esc_attr__( 'H6 Font Line Height', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h6_font_line_height',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font line height like 24px.', 'pofo' ),
    ) );

    /* End H6 Font Line Height Setting */

    /* H6 Font Letter Spacing Setting */

    $wp_customize->add_setting( 'pofo_h6_font_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_h6_font_letter_spacing', array(
        'label'             => esc_attr__( 'H6 Font Character Spacing', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_h6_font_letter_spacing',
        'type'              => 'text',
        'description'       => esc_attr__( 'Add font letter spacing like 2px.', 'pofo' ),
    ) );

    /* End H6 Font Letter Spacing Setting */

    /* H6 Color Setting */

    $wp_customize->add_setting( 'pofo_heading_h6_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_heading_h6_color', array(
        'label'             => esc_attr__( 'H6 Color', 'pofo' ),
        'section'           => 'pofo_add_heading_color_section',
        'settings'          => 'pofo_heading_h6_color',
    ) ) );

    /* End H6 Color Setting */