<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	// Get All Product Attribute List.
	$pofo_product_attribute_array = pofo_product_attribute_customizer_array();

	/*
	 * Archive layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_archive_layout_container_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_layout_container_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_layout_container_separator',	    
	) ) );

	/* End Separator Settings */

	/* Archive Layout For Post */

	$wp_customize->add_setting( 'pofo_product_archive_layout_setting', array(
		'default' 			=> 'pofo_layout_left_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_product_archive_layout_setting', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_layout_setting',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'pofo_layout_full_screen_12col' => esc_html__( 'One Column', 'pofo' ),
								  	'pofo_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'pofo' ),
								  	'pofo_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'pofo' ),
								  	'pofo_layout_both_sidebar' 	   => esc_html__( 'Three Columns', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/1col.png',
								  	POFO_THEME_IMAGES_URI . '/2cl.png',
								  	POFO_THEME_IMAGES_URI . '/2cr.png',
								  	POFO_THEME_IMAGES_URI . '/3cm.png',
							   ),	
		'pofo_columns'    		=> '4',
	) ) );

	/* End Archive Layout For Post */

	/* Archive Left Sidebar */

	$wp_customize->add_setting( 'pofo_product_archive_left_sidebar', array(
		'default' 			=> 'pofo-shop-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_product_left_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_product_archive_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_product_right_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'pofo_product_archive_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Archive Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_archive_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Product Lists Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Product Archive Column Type Setting */

	$wp_customize->add_setting( 'pofo_product_archive_page_column', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_product_archive_page_column', array(
		'label'       		=> esc_attr__( 'Column Type', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_page_column',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
								    '2' => esc_html__( '2 Columns', 'pofo' ),
									'3' => esc_html__( '3 Columns', 'pofo' ),
									'4' => esc_html__( '4 Columns', 'pofo' ),
									'5' => esc_html__( '5 Columns', 'pofo' ),
									'6' => esc_html__( '6 Columns', 'pofo' ),
							   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/5-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'pofo_columns'    	=> '3',
	) ) );

	/* End Product Archive Column Type Setting */

	/*  No. of Product Per Page  */

	$wp_customize->add_setting( 'pofo_product_archive_page_per_page', array(
		'default' 			=> '12',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_page_per_page', array(
		'label'       		=> esc_attr__( 'Products Per Page', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_page_per_page',
		'type'      		=> 'text',
	) ) );

	/* End No. of Product Per Page */

	/* Enable Product Star Rating */

	$wp_customize->add_setting( 'pofo_product_archive_enable_star_rating', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_product_archive_enable_star_rating', array(
		'label'       		=> esc_attr__( 'Star Rating', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_enable_star_rating',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product Star Rating */

	/* Product Archive Sale Typography Separator setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_product_sale_typography', array(
	    'label'      		=> esc_attr__( 'Sale Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_product_sale_typography',
	) ) );

	/* End Product Archive Sale Typography Separator setting */

	/* Product Archive Sale Font Size */

    $wp_customize->add_setting( 'pofo_product_archive_product_sale_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Sale Font Size */

	/* Product Archive Sale Line Height */

    $wp_customize->add_setting( 'pofo_product_archive_product_sale_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Sale Line Height */

	/* Product Archive Sale Font Weight */

    $wp_customize->add_setting( 'pofo_product_archive_product_sale_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_font_weight',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Font Weight', 'pofo'),
									'100' => esc_html__( 'Font weight 100', 'pofo'),
									'200' => esc_html__( 'Font weight 200', 'pofo'),
									'300' => esc_html__( 'Font weight 300', 'pofo'),
									'400' => esc_html__( 'Font weight 400', 'pofo'),
									'500' => esc_html__( 'Font weight 500', 'pofo'),
									'600' => esc_html__( 'Font weight 600', 'pofo'),
									'700' => esc_html__( 'Font weight 700', 'pofo'),
									'800' => esc_html__( 'Font weight 800', 'pofo'),
									'900' => esc_html__( 'Font weight 900', 'pofo'),
							   ),
	) ) );

	/* End Product Archive Sale Font Weight */

	/* Product Archive Sale Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_sale_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_sale_color',
	) ) );

	/* End Product Archive Sale Color */

	/* Product Archive Sale Background Color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_sale_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_sale_bg_color',
	) ) );

	/* Product Archive Sale Background Color setting */

	/* Product Archive Show Box Sale Border setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_enable_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_product_archive_product_sale_enable_border', array(
		'label'       		=> esc_attr__( 'Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_enable_border',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* Product Archive Show Box Sale Border setting */

	/* Product Archive Sale Border Size setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_border_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_border_size', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_border_size',
		'type'              => 'text',
		'active_callback'	=> 'pofo_product_archive_product_sale_border_callback',
	) ) );

	/* End Product Archive Sale Border Size setting */

	/* Product Archive Sale Border Type setting */

    $wp_customize->add_setting( 'pofo_product_archive_product_sale_border_type', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_border_type', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_border_type',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_product_archive_product_sale_border_callback',
	) ) );

	/* End Product Archive Sale Border Type setting */

	/* Product Archive Sale Border Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_sale_border_color', array(
	    'label'      		=> esc_attr__( 'Box Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_sale_border_color',
		'active_callback'	=> 'pofo_product_archive_product_sale_border_callback',
	) ) );

	/* End Product Archive Sale Border Color */

	/* Product Archive Sale Border Radius setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_sale_border_radius', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_sale_border_radius', array(
		'label'       		=> esc_attr__( 'Box Border Radius', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_sale_border_radius',
		'type'              => 'text',
	) ) );

	/* End Product Archive Sale Border Radius setting */

	/* Product Archive Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_product_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_product_title_typography',
	) ) );

	/* End Product Archive Title Typography Separator setting */

	/* Product Archive Title Font Size */

    $wp_customize->add_setting( 'pofo_product_archive_product_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_title_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Title Font Size */

	/* Product Archive Title Line Height */

    $wp_customize->add_setting( 'pofo_product_archive_product_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_title_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Title Line Height */

	/* Product Archive Title Letter Spacing */

    $wp_customize->add_setting( 'pofo_product_archive_product_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_title_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Title Letter Spacing */

	/* Product Archive Title Font Weight */

    $wp_customize->add_setting( 'pofo_product_archive_product_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_title_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_font_weight',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Font Weight', 'pofo'),
									'100' => esc_html__( 'Font weight 100', 'pofo'),
									'200' => esc_html__( 'Font weight 200', 'pofo'),
									'300' => esc_html__( 'Font weight 300', 'pofo'),
									'400' => esc_html__( 'Font weight 400', 'pofo'),
									'500' => esc_html__( 'Font weight 500', 'pofo'),
									'600' => esc_html__( 'Font weight 600', 'pofo'),
									'700' => esc_html__( 'Font weight 700', 'pofo'),
									'800' => esc_html__( 'Font weight 800', 'pofo'),
									'900' => esc_html__( 'Font weight 900', 'pofo'),
							   ),
	) ) );

	/* End Product Archive Title Font Weight */

	/* Product Archive Font Italic */

	$wp_customize->add_setting( 'pofo_product_archive_product_title_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_product_archive_product_title_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Product Archive Font Italic */

	/* Product Archive Font Underline */

	$wp_customize->add_setting( 'pofo_product_archive_product_title_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_product_archive_product_title_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_title_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Product Archive Font Underline */

	/* Product Archive Title Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_title_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_title_color',
	) ) );

	/* End Product Archive Title Color */

	/* Product Archive Hover Title Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_title_hover_color',
	) ) );

	/* End Product Archive Hover Title Color */

	/* Product Archive Rating Star Color Separator setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_rating_star_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_product_rating_star_typography', array(
	    'label'      		=> esc_attr__( 'Rating Star Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_product_rating_star_typography',
		'active_callback'	=> 'pofo_product_archive_product_rating_star_color_callback',
	) ) );

	/* End Product Archive Rating Star Color Separator setting */

	/* Product Archive Rating Star Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_rating_star_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_rating_star_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_rating_star_color',
		'active_callback'	=> 'pofo_product_archive_product_rating_star_color_callback',
	) ) );

	/* End Product Archive Rating Star Color */

	/* Product Archive Price Typography Separator setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_product_price_typography', array(
	    'label'      		=> esc_attr__( 'Price Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_product_price_typography',
	) ) );

	/* End Product Archive Price Typography Separator setting */

	/* Product Archive Price Font Size */

    $wp_customize->add_setting( 'pofo_product_archive_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_price_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_price_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Price Font Size */

	/* Product Archive Price Line Height */

    $wp_customize->add_setting( 'pofo_product_archive_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_price_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_price_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Archive Price Line Height */

	/* Product Archive Price Font Weight */

    $wp_customize->add_setting( 'pofo_product_archive_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_product_archive_product_price_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_archive_layout_panel',
		'settings'			=> 'pofo_product_archive_product_price_font_weight',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Font Weight', 'pofo'),
									'100' => esc_html__( 'Font weight 100', 'pofo'),
									'200' => esc_html__( 'Font weight 200', 'pofo'),
									'300' => esc_html__( 'Font weight 300', 'pofo'),
									'400' => esc_html__( 'Font weight 400', 'pofo'),
									'500' => esc_html__( 'Font weight 500', 'pofo'),
									'600' => esc_html__( 'Font weight 600', 'pofo'),
									'700' => esc_html__( 'Font weight 700', 'pofo'),
									'800' => esc_html__( 'Font weight 800', 'pofo'),
									'900' => esc_html__( 'Font weight 900', 'pofo'),
							   ),
	) ) );

	/* End Product Archive Price Font Weight */

	/* Product Archive Price Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_price_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_price_color',
	) ) );

	/* End Product Archive Price Color */

	/* Product Archive Main Price Color */

	$wp_customize->add_setting( 'pofo_product_archive_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_regular_price_color', array(
	    'label'      		=> esc_attr__( 'Main Price Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_regular_price_color',
	) ) );

	/* End Product Archive Main Price Color */

	/* Product Archive Button Separator setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_archive_product_button_typography', array(
	    'label'      		=> esc_attr__( 'Button Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'   		=> 'pofo_product_archive_product_button_typography',
	) ) );

	/* End Product Archive Button Separator setting */

	/* Product Archive Button color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_button_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_button_color',
	) ) );

	/* End Product Archive Button color setting */

	/* Product Archive Button BG color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_button_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_button_bg_color',
	) ) );

	/* End Product Archive Button BG color setting */

	/* Product Archive Button Border color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_button_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_button_border_color',
	) ) );

	/* End Product Archive Button Border color setting */

	/* Product Archive Button Hover color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_button_hover_color',
	) ) );

	/* End Product Archive Button Hover color setting */

	/* Product Archive Button Hover BG color setting */

	$wp_customize->add_setting( 'pofo_product_archive_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_product_archive_product_button_hover_bg_color', array(
	    'label'      		=> esc_attr__( 'Hover Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_archive_layout_panel',
	    'settings'	 		=> 'pofo_product_archive_product_button_hover_bg_color',
	) ) );

	/* End Product Archive Button Hover BG color setting */

	if ( ! function_exists( 'pofo_product_archive_product_rating_star_color_callback' ) ) :
		function pofo_product_archive_product_rating_star_color_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_product_archive_enable_star_rating' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_product_archive_product_sale_border_callback' ) ) :
		function pofo_product_archive_product_sale_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_product_archive_product_sale_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_product_left_sidebar_layout_archive_callback' ) ) :
		function pofo_product_left_sidebar_layout_archive_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_product_archive_layout_setting' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_product_archive_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_product_right_sidebar_layout_archive_callback' ) ) :
		function pofo_product_right_sidebar_layout_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_product_archive_layout_setting' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_product_archive_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;