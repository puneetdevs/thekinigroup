<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/*
	 * Product layout setting panel.
	 */
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_product_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_separator',	    
	) ) );

	/* End Separator Settings */

	/* Product General Layout */

	$wp_customize->add_setting( 'pofo_single_product_layout_setting', array(
		'default' 			=> 'pofo_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_product_layout_setting', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_layout_setting',
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

	/* End Product General Layout */

	/* Product Left Sidebar */

	$wp_customize->add_setting( 'pofo_single_product_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_single_product_left_sidebar_layout_callback',
	) ) );

	/* End Product Left Sidebar */

	/* Product Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_single_product_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_single_product_right_sidebar_layout_callback',
	) ) );

	/* End Product Right Sidebar */

	/* Product Container Setting */

	$wp_customize->add_setting( 'pofo_single_product_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),
	) ) );

	/* End Product Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_product_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_style_separator', array(
	    'label'      		=> esc_attr__( 'Product Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_style_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Product Title */

	$wp_customize->add_setting( 'pofo_single_product_enable_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_title',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product Title */

	/* Enable Product Short Description */

	$wp_customize->add_setting( 'pofo_single_product_enable_short_description', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_short_description', array(
		'label'       		=> esc_attr__( 'Short Description', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_short_description',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product Short Description */

	/* Enable Product SKU */

	$wp_customize->add_setting( 'pofo_single_product_enable_sku', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_sku', array(
		'label'       		=> esc_attr__( 'SKU', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_sku',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product SKU */

	/* Enable Product Share */

	$wp_customize->add_setting( 'pofo_single_product_enable_social_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_social_share', array(
		'label'       		=> esc_attr__( 'Share', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_social_share',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product Share */

	/* Product Share Title */

	$wp_customize->add_setting( 'pofo_single_product_share_title', array(
		'default' 			=> __( 'Share', 'pofo' ),
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_share_title', array(
		'label'       		=> esc_attr__( 'Share Heading', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_share_title',
		'type'              => 'text',
		'active_callback'   => 'pofo_single_product_share_title_callback',
	) ) );

	/* End Product Share Title */

	/* Enable Product Tab Content Heading */

	$wp_customize->add_setting( 'pofo_single_product_enable_tab_content_heading', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_tab_content_heading', array(
		'label'       		=> esc_attr__( 'Tab Content Heading', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_tab_content_heading',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Product Tab Content Heading */

	/* Product Sale Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_sale_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_sale_typography', array(
	    'label'      		=> esc_attr__( 'Sale Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_sale_typography',
	) ) );

	/* End Product Sale Typography Separator setting */

	/* Product Sale Font Size */

    $wp_customize->add_setting( 'pofo_single_product_sale_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Sale Font Size */

	/* Product Sale Line Height */

    $wp_customize->add_setting( 'pofo_single_product_sale_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Sale Line Height */

	/* Product Sale Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_sale_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_font_weight',
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

	/* End Product Sale Font Weight */

	/* Product Sale Color */

	$wp_customize->add_setting( 'pofo_single_product_sale_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_sale_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_sale_color',
	) ) );

	/* End Product Sale Color */

	/* Product Sale Background Color setting */

	$wp_customize->add_setting( 'pofo_single_product_sale_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_sale_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_sale_bg_color',
	) ) );

	/* Product Sale Background Color setting */

	/* Product Show Box Sale Border setting */

	$wp_customize->add_setting( 'pofo_single_product_sale_enable_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_sale_enable_border', array(
		'label'       		=> esc_attr__( 'Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_enable_border',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* Product Show Box Sale Border setting */

	/* Product Sale Border Size setting */

	$wp_customize->add_setting( 'pofo_single_product_sale_border_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_border_size', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_border_size',
		'type'              => 'text',
		'active_callback'	=> 'pofo_single_product_sale_border_callback',
	) ) );

	/* End Product Sale Border Size setting */

	/* Product Sale Border Type setting */

    $wp_customize->add_setting( 'pofo_single_product_sale_border_type', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_border_type', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_border_type',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_single_product_sale_border_callback',
	) ) );

	/* End Product Sale Border Type setting */

	/* Product Sale Border Color */

	$wp_customize->add_setting( 'pofo_single_product_sale_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_sale_border_color', array(
	    'label'      		=> esc_attr__( 'Box Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_sale_border_color',
		'active_callback'	=> 'pofo_single_product_sale_border_callback',
	) ) );

	/* End Product Sale Border Color */

	/* Product Sale Border Radius setting */

	$wp_customize->add_setting( 'pofo_single_product_sale_border_radius', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_sale_border_radius', array(
		'label'       		=> esc_attr__( 'Box Border Radius', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_sale_border_radius',
		'type'              => 'text',
		'active_callback'	=> 'pofo_single_product_sale_border_callback',
	) ) );

	/* End Product Sale Border Radius setting */

	/* Product Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_page_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_page_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_page_title_typography',
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Typography Separator setting */

	/* Product Title Font Size */

    $wp_customize->add_setting( 'pofo_single_product_page_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_title_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Font Size */

	/* Product Title Line Height */

    $wp_customize->add_setting( 'pofo_single_product_page_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_title_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Line Height */

	/* Product Title Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_page_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_title_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Letter Spacing */

	/* Product Title Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_page_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_title_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_font_weight',
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
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Font Weight */

	/* Product Font Italic */

	$wp_customize->add_setting( 'pofo_single_product_page_title_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_page_title_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Font Italic */

	/* Product Font Underline */

	$wp_customize->add_setting( 'pofo_single_product_page_title_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_page_title_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_title_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Font Underline */

	/* Product Title Color */

	$wp_customize->add_setting( 'pofo_single_product_page_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_title_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_title_color',
		'active_callback'	=> 'pofo_single_product_page_title_callback',
	) ) );

	/* End Product Title Color */

	/* Product Rating Star Color Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_rating_star_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_rating_star_typography', array(
	    'label'      		=> esc_attr__( 'Rating Star Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_rating_star_typography',
	) ) );

	/* End Product Rating Star Color Separator setting */

	/* Product Rating Star Color */

	$wp_customize->add_setting( 'pofo_single_product_rating_star_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_rating_star_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_rating_star_color',
	) ) );

	/* End Product Rating Star Color */

	/* Product Price Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_price_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_price_typography', array(
	    'label'      		=> esc_attr__( 'Price Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_price_typography',
	) ) );

	/* End Product Price Typography Separator setting */

	/* Product Price Font Size */

    $wp_customize->add_setting( 'pofo_single_product_price_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_price_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_price_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Price Font Size */

	/* Product Price Line Height */

    $wp_customize->add_setting( 'pofo_single_product_price_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_price_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_price_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Price Line Height */

	/* Product Price Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_price_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_price_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_price_font_weight',
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

	/* End Product Price Font Weight */

	/* Product Price Color */

	$wp_customize->add_setting( 'pofo_single_product_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_price_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_price_color',
	) ) );

	/* End Product Price Color */

	/* Product Main Price Color */

	$wp_customize->add_setting( 'pofo_single_product_regular_price_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_regular_price_color', array(
	    'label'      		=> esc_attr__( 'Main Price Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_regular_price_color',
	) ) );

	/* End Product Main Price Color */

	/* Product Short Description Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_short_description_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_short_description_typography', array(
	    'label'      		=> esc_attr__( 'Short Description Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_short_description_typography',
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Typography Separator setting */

	/* Product Short Description Font Size */

    $wp_customize->add_setting( 'pofo_single_product_short_description_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_short_description_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_short_description_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Font Size */

	/* Product Short Description Line Height */

    $wp_customize->add_setting( 'pofo_single_product_short_description_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_short_description_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_short_description_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Line Height */

	/* Product Short Description Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_short_description_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_short_description_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_short_description_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Letter Spacing */

	/* Product Short Description Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_short_description_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_short_description_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_short_description_font_weight',
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
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Font Weight */

	/* Product Short Description Color */

	$wp_customize->add_setting( 'pofo_single_product_short_description_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_short_description_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_short_description_color',
		'active_callback'	=> 'pofo_single_product_short_description_callback',
	) ) );

	/* End Product Short Description Color */

	/* Product Stock Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_stock_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_stock_typography', array(
	    'label'      		=> esc_attr__( 'Stock Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_stock_typography',
	) ) );

	/* End Product Stock Typography Separator setting */

	/* Product Stock Font Size */

    $wp_customize->add_setting( 'pofo_single_product_stock_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Stock Font Size */

	/* Product Stock Line Height */

    $wp_customize->add_setting( 'pofo_single_product_stock_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Stock Line Height */

	/* Product Stock Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_stock_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Stock Letter Spacing */

	/* Product Stock Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_stock_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_font_weight',
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

	/* End Product Stock Font Weight */

	/* Product In Stock Color */

	$wp_customize->add_setting( 'pofo_single_product_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_stock_color', array(
	    'label'      		=> esc_attr__( 'In Stock Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_stock_color',
	) ) );

	/* End Product In Stock Color */

	/* Product Out Of Stock Color */

	$wp_customize->add_setting( 'pofo_single_product_out_of_stock_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_out_of_stock_color', array(
	    'label'      		=> esc_attr__( 'Out Of Stock Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_out_of_stock_color',
	) ) );

	/* End Product Out Of Stock Color */

	/* Product Stock Background Color setting */

	$wp_customize->add_setting( 'pofo_single_product_stock_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_stock_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_stock_bg_color',
	) ) );

	/* Product Stock Background Color setting */

	/* Product Show Box Stock Border setting */

	$wp_customize->add_setting( 'pofo_single_product_stock_enable_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_stock_enable_border', array(
		'label'       		=> esc_attr__( 'Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_enable_border',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* Product Show Box Stock Border setting */

	/* Product Stock Border Size setting */

	$wp_customize->add_setting( 'pofo_single_product_stock_border_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_border_size', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_border_size',
		'type'              => 'text',
		'active_callback'	=> 'pofo_single_product_stock_border_callback',
	) ) );

	/* End Product Stock Border Size setting */

	/* Product Stock Border Type setting */

    $wp_customize->add_setting( 'pofo_single_product_stock_border_type', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_stock_border_type', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_stock_border_type',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_single_product_stock_border_callback',
	) ) );

	/* End Product Stock Border Type setting */

	/* Product In Stock Border Color */

	$wp_customize->add_setting( 'pofo_single_product_stock_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_stock_border_color', array(
	    'label'      		=> esc_attr__( 'In Stock Box Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_stock_border_color',
		'active_callback'	=> 'pofo_single_product_stock_border_callback',
	) ) );

	/* End Product In Stock Border Color */

	/* Product Out Of Stock Border Color */

	$wp_customize->add_setting( 'pofo_single_product_out_of_stock_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_out_of_stock_border_color', array(
	    'label'      		=> esc_attr__( 'Out Of Stock Box Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_out_of_stock_border_color',
		'active_callback'	=> 'pofo_single_product_stock_border_callback',
	) ) );

	/* End Product Out Of Stock Border Color */

	/* Product Button Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_button_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_button_typography', array(
	    'label'      		=> esc_attr__( 'Button Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_button_typography',
	) ) );

	/* End Product Button Separator setting */

	/* Product Button color setting */

	$wp_customize->add_setting( 'pofo_single_product_button_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_button_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_button_color',
	) ) );

	/* End Product Button color setting */

	/* Product Button BG color setting */

	$wp_customize->add_setting( 'pofo_single_product_button_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_button_bg_color', array(
	    'label'      		=> esc_attr__( 'Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_button_bg_color',
	) ) );

	/* End Product Button BG color setting */

	/* Product Button Border color setting */

	$wp_customize->add_setting( 'pofo_single_product_button_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_button_border_color', array(
	    'label'      		=> esc_attr__( 'Border Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_button_border_color',
	) ) );

	/* End Product Button Border color setting */

	/* Product Button Hover color setting */

	$wp_customize->add_setting( 'pofo_single_product_button_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_button_hover_color', array(
	    'label'      		=> esc_attr__( 'Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_button_hover_color',
	) ) );

	/* End Product Button Hover color setting */

	/* Product Button Hover BG color setting */

	$wp_customize->add_setting( 'pofo_single_product_button_hover_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_button_hover_bg_color', array(
	    'label'      		=> esc_attr__( 'Hover Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_button_hover_bg_color',
	) ) );

	/* End Product Button Hover BG color setting */

	/* Product Meta Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_page_meta_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_page_meta_typography', array(
	    'label'      		=> esc_attr__( 'Product Meta Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_page_meta_typography',
	) ) );

	/* End Product Meta Typography Separator setting */

	/* Product Meta Font Size */

    $wp_customize->add_setting( 'pofo_single_product_page_meta_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_meta_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_meta_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Meta Font Size */

	/* Product Meta Line Height */

    $wp_customize->add_setting( 'pofo_single_product_page_meta_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_meta_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_meta_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Meta Line Height */

	/* Product Meta Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_page_meta_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_meta_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_meta_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Meta Letter Spacing */

	/* Product Meta Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_page_meta_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_meta_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_meta_font_weight',
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

	/* End Product Meta Font Weight */

	/* Product Meta Color */

	$wp_customize->add_setting( 'pofo_single_product_page_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_meta_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_meta_color',
	) ) );

	/* End Product Meta Color */

	/* Product Meta Link Hover Color */

	$wp_customize->add_setting( 'pofo_single_product_page_meta_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_meta_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_meta_link_hover_color',
	) ) );

	/* End Product Meta Link Hover Color */

	/* Product Meta Heading Color */

	$wp_customize->add_setting( 'pofo_single_product_page_meta_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_meta_heading_color', array(
	    'label'      		=> esc_attr__( 'Heading Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_meta_heading_color',
	) ) );

	/* End Product Meta Heading Color */

	/* Product Meta Social Icon Color */

	$wp_customize->add_setting( 'pofo_single_product_page_meta_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_meta_social_icon_color', array(
	    'label'      		=> esc_attr__( 'Social Icon Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_meta_social_icon_color',
	) ) );

	/* End Product Meta Social Icon Color */

	/* Product Tab Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_page_tab_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_page_tab_typography', array(
	    'label'      		=> esc_attr__( 'Product Tab Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_page_tab_typography',
	) ) );

	/* End Product Tab Typography Separator setting */

	/* Product Tab Font Size */

    $wp_customize->add_setting( 'pofo_single_product_page_tab_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_tab_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_tab_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
	) ) );

	/* End Product Tab Font Size */

	/* Product Tab Line Height */

    $wp_customize->add_setting( 'pofo_single_product_page_tab_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_tab_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_tab_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Tab Line Height */

	/* Product Tab Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_page_tab_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_tab_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_tab_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
	) ) );

	/* End Product Tab Letter Spacing */

	/* Product Tab Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_page_tab_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_page_tab_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_page_tab_font_weight',
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

	/* End Product Tab Font Weight */

	/* Product Tab Color */

	$wp_customize->add_setting( 'pofo_single_product_page_tab_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_tab_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_tab_color',
	) ) );

	/* End Product Tab Color */

	/* Product Active Tab Color */

	$wp_customize->add_setting( 'pofo_single_product_page_tab_active_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_page_tab_active_color', array(
	    'label'      		=> esc_attr__( 'Active Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_page_tab_active_color',
	) ) );

	/* End Product Active Tab Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_product_related_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_related_separator', array(
	    'label'      		=> esc_attr__( 'Related Product', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_related_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Related Product */

	$wp_customize->add_setting( 'pofo_single_product_enable_related', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_related', array(
		'label'       		=> esc_attr__( 'Related Product', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_related',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Related Product */

	/*  No. of related Product Column  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_columns_related', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_product_no_of_columns_related', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_columns_related',
		'type'              => 'pofo_preview_image',
		'choices'    		=> array(
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '6' => '6',
							 	),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'pofo_columns'    	=> '4',
		'active_callback'   => 'pofo_single_product_related_callback',
	) ) );

	/* End No. of related Product Column */

	/*  No. of related Product  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_products_related', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_no_of_products_related', array(
		'label'       		=> esc_attr__( 'No. of Products', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_products_related',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'pofo_single_product_related_callback',
	) ) );

	/* End No. of related Product */

	/* Related Product Heading Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_related_product_heading_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_related_product_heading_typography', array(
	    'label'      		=> esc_attr__( 'Related Product Heading Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_related_product_heading_typography',
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Typography Separator setting */

	/* Related Product Heading Font Size */

    $wp_customize->add_setting( 'pofo_single_product_related_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_related_product_heading_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Font Size */

	/* Related Product Heading Line Height */

    $wp_customize->add_setting( 'pofo_single_product_related_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_related_product_heading_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Line Height */

	/* Related Product Heading Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_related_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_related_product_heading_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Letter Spacing */

	/* Related Product Heading Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_related_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_related_product_heading_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_font_weight',
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
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Font Weight */

	/* Related Product Heading Font Italic */

	$wp_customize->add_setting( 'pofo_single_product_related_product_heading_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_related_product_heading_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Font Italic */

	/* Related Product Heading Font Underline */

	$wp_customize->add_setting( 'pofo_single_product_related_product_heading_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_related_product_heading_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_related_product_heading_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Font Underline */

	/* Related Product Heading Color */

	$wp_customize->add_setting( 'pofo_single_product_related_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_related_product_heading_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_related_product_heading_color',
		'active_callback'	=> 'pofo_single_product_related_callback',
	) ) );

	/* End Related Product Heading Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_product_up_sells_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_up_sells_separator', array(
	    'label'      		=> esc_attr__( 'Up Sells Product', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_up_sells_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Up Sells Product */

	$wp_customize->add_setting( 'pofo_single_product_enable_up_sells', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_up_sells', array(
		'label'       		=> esc_attr__( 'Up Sells Product', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_up_sells',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Up Sells Product */

	/*  No. of Up Sells Product Column  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_columns_up_sells', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_product_no_of_columns_up_sells', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_columns_up_sells',
		'type'              => 'pofo_preview_image',
		'choices'    		=> array(
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '6' => '6',
							 	),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'pofo_columns'    	=> '4',
		'active_callback'   => 'pofo_single_product_up_sells_callback',
	) ) );

	/* End No. of Up Sells Product Column */

	/*  No. of Up Sells Product  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_products_up_sells', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_no_of_products_up_sells', array(
		'label'       		=> esc_attr__( 'No. of Products', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_products_up_sells',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'pofo_single_product_up_sells_callback',
	) ) );

	/* End No. of Up Sells Product */

	/* Up Sells Product Heading Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_typography', array(
	    'label'      		=> esc_attr__( 'Up Sells Heading Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_up_sells_product_heading_typography',
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Typography Separator setting */

	/* Up Sells Product Heading Font Size */

    $wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Font Size */

	/* Up Sells Product Heading Line Height */

    $wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Line Height */

	/* Up Sells Product Heading Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Letter Spacing */

	/* Up Sells Product Heading Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_font_weight',
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
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Font Weight */

	/* Up Sells Product Heading Font Italic */

	$wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Font Italic */

	/* Up Sells Product Heading Font Underline */

	$wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_up_sells_product_heading_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Font Underline */

	/* Up Sells Product Heading Color */

	$wp_customize->add_setting( 'pofo_single_product_up_sells_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_up_sells_product_heading_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_up_sells_product_heading_color',
		'active_callback'	=> 'pofo_single_product_up_sells_callback',
	) ) );

	/* End Up Sells Product Heading Color */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_product_cross_sells_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_cross_sells_separator', array(
	    'label'      		=> esc_attr__( 'Cross Sells Product', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_cross_sells_separator',	    
	) ) );

	/* End Separator Settings */

	/* Enable Cross Sells Product */

	$wp_customize->add_setting( 'pofo_single_product_enable_cross_sells', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_enable_cross_sells', array(
		'label'       		=> esc_attr__( 'Cross Sells Product On Cart', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_enable_cross_sells',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Enable Cross Sells Product */

	/*  No. of Cross Sells Product Column  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_columns_cross_sells', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_product_no_of_columns_cross_sells', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_columns_cross_sells',
		'type'              => 'pofo_preview_image',
		'choices'    		=> array(
							    '2' => '2',
							    '3' => '3',
							 	),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
							   ),
		'pofo_columns'    	=> '2',
		'active_callback'   => 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End No. of Cross Sells Product Column */

	/*  No. of Cross Sells Product  */

	$wp_customize->add_setting( 'pofo_single_product_no_of_products_cross_sells', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_no_of_products_cross_sells', array(
		'label'       		=> esc_attr__( 'No. of Products', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_no_of_products_cross_sells',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End No. of Cross Sells Product */

	/* Cross Sells Product Heading Typography Separator setting */

	$wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_typography', array(
	    'label'      		=> esc_attr__( 'Cross Sells Heading Typography', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'   		=> 'pofo_single_product_cross_sells_product_heading_typography',
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Typography Separator setting */

	/* Cross Sells Product Heading Font Size */

    $wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Size */

	/* Cross Sells Product Heading Line Height */

    $wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Line Height */

	/* Cross Sells Product Heading Letter Spacing */

    $wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Letter Spacing */

	/* Cross Sells Product Heading Font Weight */

    $wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_font_weight',
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
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Weight */

	/* Cross Sells Product Heading Font Italic */

	$wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Italic */

	/* Cross Sells Product Heading Font Underline */

	$wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_product_layout_panel',
		'settings'			=> 'pofo_single_product_cross_sells_product_heading_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Font Underline */

	/* Cross Sells Product Heading Color */

	$wp_customize->add_setting( 'pofo_single_product_cross_sells_product_heading_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_product_cross_sells_product_heading_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_product_layout_panel',
	    'settings'	 		=> 'pofo_single_product_cross_sells_product_heading_color',
		'active_callback'	=> 'pofo_single_product_cross_sells_callback',
	) ) );

	/* End Cross Sells Product Heading Color */

	/* Custom Callback Functions */

	if ( ! function_exists( 'pofo_single_product_sale_border_callback' ) ) :
		function pofo_single_product_sale_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_single_product_sale_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_page_title_callback' ) ) :
		function pofo_single_product_page_title_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_single_product_enable_title' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_short_description_callback' ) ) :
		function pofo_single_product_short_description_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_single_product_enable_short_description' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_stock_border_callback' ) ) :
		function pofo_single_product_stock_border_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_single_product_stock_enable_border' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_left_sidebar_layout_callback' ) ) :
		function pofo_single_product_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_single_product_layout_setting' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_single_product_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_right_sidebar_layout_callback' ) ) :
		function pofo_single_product_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_single_product_layout_setting' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_single_product_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_related_callback' ) ) :
	   	function pofo_single_product_related_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_single_product_enable_related' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_up_sells_callback' ) ) :
	   	function pofo_single_product_up_sells_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_single_product_enable_up_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_cross_sells_callback' ) ) :
	   	function pofo_single_product_cross_sells_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_single_product_enable_cross_sells' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_single_product_share_title_callback' ) ) :
	   	function pofo_single_product_share_title_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_single_product_enable_social_share' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Custom Callback Functions */