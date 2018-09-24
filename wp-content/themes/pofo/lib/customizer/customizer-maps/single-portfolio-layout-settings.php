<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();
	
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_portfolio_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_portfolio_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'   		=> 'pofo_single_portfolio_separator',	    
	) ) );

	/* End Separator Settings */

	/* Portfolio Layout */

	$wp_customize->add_setting( 'pofo_single_portfolio_layout_setting', array(
		'default' 			=> 'pofo_layout_full_screen_12col',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_portfolio_layout_setting', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_single_portfolio_layout_setting',
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

	/* End Portfolio Layout */

	/* Portfolio Left Sidebar */

	$wp_customize->add_setting( 'pofo_single_portfolio_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_portfolio_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_single_portfolio_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_single_portfolio_left_sidebar_layout_callback',
	) ) );

	/* End Portfolio Left Sidebar */

	/* Portfolio Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_single_portfolio_right_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_portfolio_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_single_portfolio_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_single_portfolio_right_sidebar_layout_callback',
	) ) );

	/* End Portfolio Right Sidebar */

	/* Portfolio Container Setting */

	$wp_customize->add_setting( 'pofo_single_portfolio_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_portfolio_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_single_portfolio_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid Container', 'pofo' ),
									'container' => esc_html__( 'Fixed Container', 'pofo' ),
							   ),
	) ) );

	/* End Portfolio Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_portfolio_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_portfolio_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Post Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'   		=> 'pofo_single_portfolio_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Hide Feature Image */

    $wp_customize->add_setting( 'pofo_portfolio_featured_image', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_featured_image', array(
		'label'       		=> esc_attr__( 'Featured Image', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_featured_image',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Feature Image */

	/* Hide Category */

    $wp_customize->add_setting( 'pofo_portfolio_hide_category', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_hide_category', array(
		'label'       		=> esc_attr__( 'Category', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_hide_category',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Category */

	/* Hide Date */

    $wp_customize->add_setting( 'pofo_portfolio_hide_date', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_hide_date', array(
		'label'       		=> esc_attr__( 'Date', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_hide_date',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Date */

	/* Post Date Format */

	$wp_customize->add_setting( 'pofo_portfolio_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_portfolio_date_callback',
	) ) );

	/* End Post Date Format */

	/* Hide Author */

    $wp_customize->add_setting( 'pofo_portfolio_hide_author', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_hide_author', array(
		'label'       		=> esc_attr__( 'Author', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_hide_author',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Author */

	/* Hide Portfolio Comment */

	$wp_customize->add_setting( 'pofo_hide_single_portfolio_comment', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_single_portfolio_comment', array(
		'label'       		=> esc_attr__( 'Comment', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_single_portfolio_comment',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Portfolio Comment */

	/* Hide Portfolio Share */

	$wp_customize->add_setting( 'pofo_hide_single_portfolio_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_single_portfolio_share', array(
		'label'       		=> esc_attr__( 'Share', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_single_portfolio_share',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Portfolio Share */

	/* Portfolio Share Heading */

    $wp_customize->add_setting( 'pofo_single_portfolio_share_title', array(
		'default' 			=> 'Share Our Work',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_portfolio_share_title', array(
		'label'       		=> esc_attr__( 'Share Heading', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_single_portfolio_share_title',
		'type'              => 'text',
		'active_callback'   => 'pofo_single_portfolio_share_callback',
	) ) );

	/* End Portfolio Share Heading */

	/* Portfolio Share Box Background Color Setting */

	$wp_customize->add_setting( 'pofo_single_portfolio_share_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_portfolio_share_box_bg_color', array(
	    'label'      		=> esc_attr__( 'Share Box Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_single_portfolio_share_box_bg_color',
		'active_callback'   => 'pofo_single_portfolio_share_callback',
	) ) );

	/* End Portfolio Share Box Background Color Setting */

	/* Portfolio Share Box Title Color Setting */

	$wp_customize->add_setting( 'pofo_single_portfolio_share_box_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_portfolio_share_box_title_color', array(
	    'label'      		=> esc_attr__( 'Share Box Title Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_single_portfolio_share_box_title_color',
		'active_callback'   => 'pofo_single_portfolio_share_callback',
	) ) );

	/* End Portfolio Share Box Title Color Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_portfolio_related_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_portfolio_related_separator', array(
	    'label'      		=> esc_attr__( 'Related Portfolio', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'   		=> 'pofo_single_portfolio_related_separator',	    
	) ) );

	/* End Separator Settings */

	/* Hide Related Portfolio */

	$wp_customize->add_setting( 'pofo_hide_related_single_portfolio', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_related_single_portfolio', array(
		'label'       		=> esc_attr__( 'Related Portfolio', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_related_single_portfolio',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Related Portfolio */

	/*  No. of related Portfolio Column  */

	$wp_customize->add_setting( 'pofo_no_of_related_single_portfolio_columns', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_no_of_related_single_portfolio_columns', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_no_of_related_single_portfolio_columns',
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
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End No. of related Portfolio Column */

	/* Portfolio Featured Image Size */

    $wp_customize->add_setting( 'pofo_related_single_portfolio_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_related_single_portfolio_feature_image_size', array(
		'label'       		=> esc_attr__( 'Post Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_related_single_portfolio_feature_image_size',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Portfolio Featured Image Size */

    /* Related Portfolio Block Heading */

    $wp_customize->add_setting( 'pofo_related_single_portfolio_title', array(
		'default' 			=> 'Our Recent Works',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_single_portfolio_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_related_single_portfolio_title',
		'type'              => 'text',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Block Heading */

	/*  No. of related Portfolio  */

	$wp_customize->add_setting( 'pofo_no_of_related_single_portfolio', array(
		'default' 			=> '4',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_no_of_related_single_portfolio', array(
		'label'       		=> esc_attr__( 'Number of Portfolios', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_no_of_related_single_portfolio',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End No. of related Portfolio */

    /* Related Portfolio Block Content */

    $wp_customize->add_setting( 'pofo_related_single_portfolio_content', array(
		'default' 			=> 'New stunning projects for our amazing clients',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_single_portfolio_content', array(
		'label'       		=> esc_attr__( 'Content', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_related_single_portfolio_content',
		'type'              => 'textarea',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Block Content */

	/* Related Portfolio Subtitle Text Transform */

	$wp_customize->add_setting( 'pofo_related_single_portfolio_subtitle_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_single_portfolio_subtitle_text_transform', array(
		'label'       		=> esc_attr__( 'Related Portfolio Subtitle Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_related_single_portfolio_subtitle_text_transform',
		'type'              => 'select',
		'choices'           => array(
								    '' => esc_html__( 'Select', 'pofo' ),
								    'text-lowercase' => esc_html__( 'Lowercase', 'pofo' ),
									'text-uppercase' => esc_html__( 'Uppercase', 'pofo' ),
									'text-capitalize' => esc_html__( 'Capitalize', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Subtitle Text Transform */

	/* Related Portfolio Box Background Color Setting */

	$wp_customize->add_setting( 'pofo_related_single_portfolio_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_single_portfolio_box_bg_color', array(
	    'label'      		=> esc_attr__( 'Related Portfolio Box Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_related_single_portfolio_box_bg_color',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Box Background Color Setting */

	/* Related Portfolio Box Title Text Color Setting */

	$wp_customize->add_setting( 'pofo_related_single_portfolio_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_single_portfolio_title_text_color', array(
	    'label'      		=> esc_attr__( 'Related Portfolio Box Title Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_related_single_portfolio_title_text_color',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Box Title Text Color Setting */

	/* Related Portfolio Box Content Color Setting */

	$wp_customize->add_setting( 'pofo_related_single_portfolio_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_single_portfolio_content_color', array(
	    'label'      		=> esc_attr__( 'Related Portfolio Box Content Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_related_single_portfolio_content_color',
		'active_callback'   => 'pofo_related_single_portfolio_callback',
	) ) );

	/* End Related Portfolio Box Content Color Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_portfolio_navigation_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_portfolio_navigation_separator', array(
	    'label'      		=> esc_attr__( 'Navigation', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'   		=> 'pofo_single_portfolio_navigation_separator',	    
	) ) );

	/* End Separator Settings */

	/* Hide Portfolio Navigation */

	$wp_customize->add_setting( 'pofo_hide_navigation_single_portfolio', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_navigation_single_portfolio', array(
		'label'       		=> esc_attr__( 'Navigation', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_navigation_single_portfolio',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   )
	) ) );

	/* End Hide Portfolio Navigation */

	/* Portfolio Navigation Type*/

	$wp_customize->add_setting( 'pofo_portfolio_navigation_type', array(
		'default' 			=> 'latest',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_navigation_type', array(
		'label'       		=> esc_attr__( 'Navigation Type', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_navigation_type',
		'type'              => 'select',
		'choices'           => array(
								    'latest' => esc_html__( 'Latest Portfolio', 'pofo' ),
									'category' => esc_html__( 'Category', 'pofo' ),
									'tag' => esc_html__( 'Tag', 'pofo' ),

							   ),
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Type*/

	/* Portfolio Navigation Next Link Text*/

	$wp_customize->add_setting( 'pofo_portfolio_navigation_nextlink_text', array(
		'default' 			=> 'Next Project',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_navigation_nextlink_text', array(
		'label'       		=> esc_attr__( 'Next Link Text', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_navigation_nextlink_text',
		'type'              => 'text',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Next Link Text*/

	/* Portfolio Navigation Previous Link Text*/

	$wp_customize->add_setting( 'pofo_portfolio_navigation_priviouslink_text', array(
		'default' 			=> 'Previous Project',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_navigation_priviouslink_text', array(
		'label'       		=> esc_attr__( 'Previous Link Text', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_portfolio_navigation_priviouslink_text',
		'type'              => 'text',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Previous Link Text*/

	/* Hide Portfolio Navigation */

	$wp_customize->add_setting( 'pofo_hide_navigation_middle_link_single_portfolio', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_navigation_middle_link_single_portfolio', array(
		'label'       		=> esc_attr__( 'Navigation Middle Link', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_navigation_middle_link_single_portfolio',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Hide Portfolio Navigation */

	/* Portfolio Navigation Middle Link Type */

	$wp_customize->add_setting( 'pofo_middle_link_type_single_portfolio', array(
		'default' 			=> 'archive_link',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_middle_link_type_single_portfolio', array(
		'label'       		=> esc_attr__( 'Navigation Middle Link Type', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_middle_link_type_single_portfolio',
		'type'              => 'select',
		'choices'           => array(
									'archive_link' => esc_html__( 'Archive Link', 'pofo' ),
								  	'custom_link'  => esc_html__( 'Custom Link', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_navigation_middle_link_type_callback'
	) ) );

	/* End Hide Portfolio Navigation Middle Link Type */

    /* Portfolio Navigation Middle Custom Link */

    $wp_customize->add_setting( 'pofo_middle_custom_link_single_portfolio', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_middle_custom_link_single_portfolio', array(
		'label'       		=> esc_attr__( 'Custom Link', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_middle_custom_link_single_portfolio',
		'type'              => 'text',
		'active_callback'   => 'pofo_portfolio_navigation_middle_custom_link_callback',
	) ) );

	/* End Portfolio Navigation Middle Custom Link */

	/* Hide Portfolio Navigation */

	$wp_customize->add_setting( 'pofo_hide_navigation_border_single_portfolio', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_navigation_border_single_portfolio', array(
		'label'       		=> esc_attr__( 'Navigation Border', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_layout_panel',
		'settings'			=> 'pofo_hide_navigation_border_single_portfolio',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Hide Portfolio Navigation */

	/* Portfolio Navigation Background Color Setting */

	$wp_customize->add_setting( 'pofo_navigation_single_portfolio_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_navigation_single_portfolio_bg_color', array(
	    'label'      		=> esc_attr__( 'Navigation Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_navigation_single_portfolio_bg_color',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Background Color Setting */

	/* Portfolio Navigation Text Color Setting */

	$wp_customize->add_setting( 'pofo_navigation_single_portfolio_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_navigation_single_portfolio_text_color', array(
	    'label'      		=> esc_attr__( 'Navigation Text Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_navigation_single_portfolio_text_color',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Text Color Setting */

	/* Portfolio Navigation Link Color Setting */

	$wp_customize->add_setting( 'pofo_navigation_single_portfolio_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_navigation_single_portfolio_link_color', array(
	    'label'      		=> esc_attr__( 'Navigation Link Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_navigation_single_portfolio_link_color',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Link Color Setting */

	/* Portfolio Navigation Link Hover Color Setting */

	$wp_customize->add_setting( 'pofo_hide_navigation_single_portfolio_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_hide_navigation_single_portfolio_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Navigation Link Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_hide_navigation_single_portfolio_link_hover_color',
		'active_callback'	=> 'pofo_portfolio_navigation_callback'
	) ) );

	/* End Portfolio Navigation Link Hover Color Setting */

	/* Portfolio Meta Color Setting */

	$wp_customize->add_setting( 'pofo_single_portfolio_meta_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_portfolio_meta_text_color', array(
	    'label'      		=> esc_attr__( 'Portfolio Meta', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_single_portfolio_meta_text_color',
	) ) );

	/* End Portfolio Meta Color Setting */

	/* Portfolio Meta Hover Color Setting */

	$wp_customize->add_setting( 'pofo_single_portfolio_meta_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_portfolio_meta_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Portfolio Meta Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_layout_panel',
	    'settings'	 		=> 'pofo_single_portfolio_meta_text_hover_color',
	) ) );

	/* End Portfolio Meta Hover Color Setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'pofo_single_portfolio_left_sidebar_layout_callback' ) ) :
		function pofo_single_portfolio_left_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_single_portfolio_layout_setting' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_single_portfolio_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_single_portfolio_right_sidebar_layout_callback' ) ) :
		function pofo_single_portfolio_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_single_portfolio_layout_setting' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_single_portfolio_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Custom Callback Functions */

	/* Portfolio Navigation Callback Functions */

	if ( ! function_exists( 'pofo_portfolio_navigation_callback' ) ) {
        function pofo_portfolio_navigation_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_hide_navigation_single_portfolio' )->value() == 1 ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* End Portfolio Navigation Callback Functions */

	/* Portfolio Navigation Middle Link Type Callback Functions */

	if ( ! function_exists( 'pofo_portfolio_navigation_middle_link_type_callback' ) ) {
        function pofo_portfolio_navigation_middle_link_type_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_hide_navigation_middle_link_single_portfolio' )->value() == 1 ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* End Portfolio Navigation Middle Link Type Callback Functions */

	/* Portfolio Navigation Middle Custom Link Callback Functions */

	if ( ! function_exists( 'pofo_portfolio_navigation_middle_custom_link_callback' ) ) {
        function pofo_portfolio_navigation_middle_custom_link_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_hide_navigation_middle_link_single_portfolio' )->value() == 1 && $control->manager->get_setting( 'pofo_middle_link_type_single_portfolio' )->value() == 'custom_link' ) {
                return true;
            } else {
                return false;
            }
        }
	}

	/* End Portfolio Navigation Middle Custom Link Callback Functions */

	/* Related Portfolio Callback Functions */

	if ( ! function_exists( 'pofo_related_single_portfolio_callback' ) ) :
	   	function pofo_related_single_portfolio_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_hide_related_single_portfolio' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Related Portfolio Callback Functions */

	/* Portfolio Share Callback Functions */

	if ( ! function_exists( 'pofo_single_portfolio_share_callback' ) ) :
	   	function pofo_single_portfolio_share_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_hide_single_portfolio_share' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Portfolio Share Callback Functions */

	/* Portfolio Date Format Callback Functions */
	if ( ! function_exists( 'pofo_portfolio_date_callback' ) ) :
	   	function pofo_portfolio_date_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_portfolio_hide_date' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;