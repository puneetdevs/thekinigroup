<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();
	
	/*
	 * Post layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_post_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'   		=> 'pofo_single_post_separator',	    
	) ) );

	/* End Separator Settings */

	/* General Layout For Post */

	$wp_customize->add_setting( 'pofo_single_post_layout_setting', array(
		'default' 			=> 'pofo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_single_post_layout_setting', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_single_post_layout_setting',
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
		'pofo_columns'    	=> '4',
	) ) );

	/* End General Layout For Post */

	/* Post Left Sidebar */

	$wp_customize->add_setting( 'pofo_single_post_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_post_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_single_post_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_left_sidebar_layout_callback',
	) ) );

	/* End Post Left Sidebar */

	/* Post Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_single_post_right_sidebar', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_post_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_single_post_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_right_sidebar_layout_callback',
	) ) );

	/* End Post Right Sidebar */

	/* Post Container Setting */

	$wp_customize->add_setting( 'pofo_single_post_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_post_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_single_post_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Post Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_post_style_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_post_style_separator', array(
	    'label'      		=> esc_attr__( 'Post Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'   		=> 'pofo_single_post_style_separator',	    
	) ) );

	/* End Separator Settings */

	/* Post Style Setting */

	$wp_customize->add_setting( 'pofo_post_layout_style', array(
		'default' 			=> 'post-layout-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_layout_style', array(
		'label'       		=> esc_attr__( 'Post Style', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_post_layout_style',
		'type'              => 'select',
		'choices'           => array(
								    'post-layout-style-1' => esc_html__( 'Single Post Layout Style 1', 'pofo' ),
									'post-layout-style-2' => esc_html__( 'Single Post Layout Style 2', 'pofo' ),
									'post-layout-style-3' => esc_html__( 'Single Post Layout Style 3', 'pofo' ),
							   ),
	) ) );

	/* End Post Style Setting */

	/* Hide Feature Image */

    $wp_customize->add_setting( 'pofo_featured_image', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_featured_image', array(
		'label'       		=> esc_attr__( 'Featured Image', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_featured_image',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Feature Image */

	/* Hide Date */

    $wp_customize->add_setting( 'pofo_hide_date', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_date', array(
		'label'       		=> esc_attr__( 'Date', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_date',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Date */

	/* Post Date Format */

	$wp_customize->add_setting( 'pofo_post_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_date_format', array(
		'label'       		=> esc_attr__( 'Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_post_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_post_date_callback',
	) ) );

	/* End Post Date Format */

	/* Hide Author */

    $wp_customize->add_setting( 'pofo_hide_author', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_author', array(
		'label'       		=> esc_attr__( 'Author', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_author',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Author */

	/* Hide Category */

    $wp_customize->add_setting( 'pofo_hide_category', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_category', array(
		'label'       		=> esc_attr__( 'Category', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_category',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Category */

	/* Hide Tags */

    $wp_customize->add_setting( 'pofo_hide_tags', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_tags', array(
		'label'       		=> esc_attr__( 'Tags', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_tags',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Tags */

	/* Hide Like */

	$wp_customize->add_setting( 'pofo_hide_like', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_like', array(
		'label'       		=> esc_attr__( 'Like', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_like',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Like */

	/* Hide Share */

	$wp_customize->add_setting( 'pofo_hide_share', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_share', array(
		'label'       		=> esc_attr__( 'Share', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_share',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Share */

	/* Hide Post Author Box */

	$wp_customize->add_setting( 'pofo_hide_post_author_box', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_post_author_box', array(
		'label'       		=> esc_attr__( 'Author Box', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_post_author_box',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Post Author Box */

	/* Author Button Title */

    $wp_customize->add_setting( 'pofo_author_box_button_title', array(
		'default' 			=> 'All author posts',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_author_box_button_title', array(
		'label'       		=> esc_attr__( 'Author Box Button Title', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_author_box_button_title',
		'type'              => 'text',
		'active_callback'   => 'pofo_author_box_callback',
	) ) );

	/* End Author Button Title */

	/* Hide Comment */

	$wp_customize->add_setting( 'pofo_hide_comment', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_comment', array(
		'label'       		=> esc_attr__( 'Comment', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_comment',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Comment */

	/* Single Post Meta Text Transform setting */

    $wp_customize->add_setting( 'pofo_single_post_meta_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_single_post_meta_text_transform', array(
		'label'       		=> esc_attr__( 'Post Meta Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_single_post_meta_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Single Post Meta Text Transform setting */

	/* Main Section Top Space */

    $wp_customize->add_setting( 'pofo_main_top_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_main_top_section_space', array(
		'label'       		=> esc_attr__( 'Main Section Top Space ( In pixel )', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_main_top_section_space',
		'type'              => 'text',
	) ) );

	/* End Main Section Top Space */

	/* Main Section Bottom Space */

    $wp_customize->add_setting( 'pofo_main_bottom_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_main_bottom_section_space', array(
		'label'       		=> esc_attr__( 'Main Section Bottom Space ( In pixel )', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_main_bottom_section_space',
		'type'              => 'text',
	) ) );

	/* End Main Section Bottom Space */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_single_post_related_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_single_post_related_separator', array(
	    'label'      		=> esc_attr__( 'Related Posts', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'   		=> 'pofo_single_post_related_separator',	    
	) ) );

	/* End Separator Settings */

	/* Hide Related Posts */

	$wp_customize->add_setting( 'pofo_hide_related_posts', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_related_posts', array(
		'label'       		=> esc_attr__( 'Related Posts', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_hide_related_posts',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Hide Related Posts */

	/*  No. of Columns  */

	$wp_customize->add_setting( 'pofo_no_of_related_posts_columns', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_no_of_related_posts_columns', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_no_of_related_posts_columns',
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
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End No. of Columns */

	/* Featured Image Size */

    $wp_customize->add_setting( 'pofo_related_post_feature_image_size', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_related_post_feature_image_size', array(
		'label'       		=> esc_attr__( 'Post Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_post_feature_image_size',
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Featured Image Size */

    /* Related Post Block Title */

    $wp_customize->add_setting( 'pofo_related_posts_title', array(
		'default' 			=> 'Related Posts',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_posts_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_title',
		'type'              => 'text',
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Block Title */

	/*  No. of related post  */

	$wp_customize->add_setting( 'pofo_no_of_related_posts', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_no_of_related_posts', array(
		'label'       		=> esc_attr__( 'Number of Posts', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_no_of_related_posts',
		'type'      		=> 'select',
		'choices'    		=> array(
							    '1' => '1',
							    '2' => '2',
							    '3' => '3',
							    '4' => '4',
							    '5' => '5',
							    '6' => '6',
							 	),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End No. of related post */

	/* Hide Related Block Thumbnail */

    $wp_customize->add_setting( 'pofo_related_posts_hide_post_thumbnail', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_posts_hide_post_thumbnail', array(
		'label'       		=> esc_attr__( 'Post Thumbnail', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_hide_post_thumbnail',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Hide Related Block Thumbnail */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'pofo_related_posts_hide_date', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_posts_hide_date', array(
		'label'       		=> esc_attr__( 'Post Date', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_hide_date',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Related Post Block Date */

    $wp_customize->add_setting( 'pofo_related_posts_date_format', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_posts_date_format', array(
		'label'       		=> esc_attr__( 'Related Post Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_date_format',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_related_posts_date_callback',
	) ) );

	/* End Related Post Block Date */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'pofo_related_posts_hide_author', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_posts_hide_author', array(
		'label'       		=> esc_attr__( 'Post Author', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_hide_author',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Hide Separator */

    $wp_customize->add_setting( 'pofo_related_posts_separator', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_posts_separator', array(
		'label'       		=> esc_attr__( 'Post Separator', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_separator',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Hide Separator */

	/* Hide Related Block Date */

    $wp_customize->add_setting( 'pofo_related_post_excerpt', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_post_excerpt', array(
		'label'       		=> esc_attr__( 'Post Excerpt', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_post_excerpt',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Hide Related Block Date */

	/* Excerpt Length */

	$wp_customize->add_setting( 'pofo_related_post_excerpt_length', array(
		'default' 			=> '15',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_related_post_excerpt_length', array(
	    'label'      		=> esc_attr__( 'Excerpt Length', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_excerpt_length',
	    'type'       		=> 'text',
	    'active_callback'   => 'pofo_related_posts_excerpt_callback',
	) );

	/* End Excerpt Length  */

	/* Related Post Title Border */

	$wp_customize->add_setting( 'pofo_related_post_title_border', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_post_title_border', array(
		'label'       		=> esc_attr__( 'Border', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_post_title_border',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Title Border */

	/* Hide Zoom Effect */

    $wp_customize->add_setting( 'pofo_related_posts_zoom_effect', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_related_posts_zoom_effect', array(
		'label'       		=> esc_attr__( 'Zoom Effect On Hover', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_zoom_effect',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_related_posts_post_thumbnail_callback',
	) ) );

	/* End Hide Zoom Effect */

	/* Page Title Opacity */

    $wp_customize->add_setting( 'pofo_related_posts_opacity', array(
		'default' 			=> '0.5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_related_posts_opacity', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_post_layout_panel',
		'settings'			=> 'pofo_related_posts_opacity',
		'type'              => 'select',
		'choices'           => array(
									'0.0'   => esc_html__( 'No Opacity', 'pofo' ),
								    '0.1'   => 0.1,
								    '0.2'   => 0.2,
								    '0.3'   => 0.3,
								    '0.4'   => 0.4,
								    '0.5'   => 0.5,
								    '0.6'   => 0.6,
								    '0.7'   => 0.7,
								    '0.8'   => 0.8,
								    '0.9'   => 0.9,
								    '1.0'   => 1.0,
							   ),
		'active_callback' 	=> 'pofo_related_posts_callback',
	) ) );
   
  	/* End Page Title Opacity */

	/* Related Post Overlay Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_overlay_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_overlay_color', array(
	    'label'      		=> esc_attr__( 'Overlay', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_overlay_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Overlay Color Setting */

	/* Related Post Title Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_general_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_general_title_color', array(
	    'label'      		=> esc_attr__( 'Related Title', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_general_title_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Title Color Setting */

	/* Related Post Title Border Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_general_title_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_general_title_border_color', array(
	    'label'      		=> esc_attr__( 'Related Post Border', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_general_title_border_color',
		'active_callback'   => 'pofo_related_post_general_title_border_callback',
	) ) );

	/* End Related Post Title Border Color Setting */

	/* Related Post Title Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_title_color', array(
	    'label'      		=> esc_attr__( 'Title', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_title_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Title Color Setting */

	/* Related Post Title Hover Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Title Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_title_hover_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Title Hover Color Setting */

	/* Related Post Meta Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_meta_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_meta_color', array(
	    'label'      		=> esc_attr__( 'Meta', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_meta_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Meta Color Setting */

	/* Related Post Meta Hover Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_meta_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_meta_hover_color', array(
	    'label'      		=> esc_attr__( 'Meta Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_meta_hover_color',
	    'active_callback'   => 'pofo_related_posts_callback',
	) ) );

	/* End Related Post Meta Hover Color Setting */

	/* Related Post Content Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_content_color', array(
	    'label'      		=> esc_attr__( 'Content', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_content_color',
	    'active_callback'   => 'pofo_related_posts_excerpt_callback',
	) ) );

	/* End Related Post Content Color Setting */

	/* Related Post Separator Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_separator_color', array(
	    'label'      		=> esc_attr__( 'Separator', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_separator_color',
	    'active_callback'   => 'pofo_related_posts_separator_callback',
	) ) );

	/* End Related Post Separator Color Setting */

	/* Color Separator Setting */

	$wp_customize->add_setting( 'pofo_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_post_separator', array(
	    'label'      		=> esc_attr__( 'Font and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'   		=> 'pofo_post_separator',
	) ) );

	/* End Color Separator Setting */

	/* Related Post Background Color Setting */

	$wp_customize->add_setting( 'pofo_related_post_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_related_post_bg_color', array(
	    'label'      		=> esc_attr__( 'Related Post Background', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_related_post_bg_color',
	    'active_callback'   => 'pofo_related_posts_background_callback',
	) ) );

	/* End Related Post Background Color Setting */

	/* Title Text Color Setting */

	$wp_customize->add_setting( 'pofo_post_tag_like_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_tag_like_color', array(
	    'label'      		=> esc_attr__( 'Tag, Like, Social Icon', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_tag_like_color',
	) ) );

	/* End Title Text Color Setting */

	/* Title Text Hover Color Setting */

	$wp_customize->add_setting( 'pofo_post_tag_like_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_tag_like_hover_color', array(
	    'label'      		=> esc_attr__( 'Tag, Like, Social Icon Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_tag_like_hover_color',
	) ) );

	/* End Title Text Hover Color Setting */

	/*
	 * Author Box
	 */

	/* Author Box Background Color Setting */

	$wp_customize->add_setting( 'pofo_post_author_box_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_author_box_bg_color', array(
	    'label'      		=> esc_attr__( 'Author Box Background', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_author_box_bg_color',
	) ) );

	/* End Author Box Background Color Setting */

	/* Author Box Title Text Color Setting */

	$wp_customize->add_setting( 'pofo_post_author_title_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_author_title_text_color', array(
	    'label'      		=> esc_attr__( 'Author Box Title', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_author_title_text_color',
	) ) );

	/* End Author Box Title Text Color Setting */

	/* Author Box Title Text Hover Color Setting */

	$wp_customize->add_setting( 'pofo_post_author_title_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_author_title_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Author Box Title Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_author_title_text_hover_color',
	) ) );

	/* End Author Box Title Text Hover Color Setting */

	/* Author Box Content Color Setting */

	$wp_customize->add_setting( 'pofo_post_author_content_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_author_content_color', array(
	    'label'      		=> esc_attr__( 'Author Box Content', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_post_author_content_color',
	) ) );

	/* End Author Box Content Color Setting */

	/* Post Meta Color Setting */

	$wp_customize->add_setting( 'pofo_single_post_meta_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_post_meta_text_color', array(
	    'label'      		=> esc_attr__( 'Post Meta', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_single_post_meta_text_color',
	) ) );

	/* End Post Meta Color Setting */

	/* Post Meta Hover Color Setting */

	$wp_customize->add_setting( 'pofo_single_post_meta_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_single_post_meta_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Post Meta Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_post_layout_panel',
	    'settings'	 		=> 'pofo_single_post_meta_text_hover_color',
	) ) );

	/* End Post Meta Hover Color Setting */

	/* Custom Callback Functions */

	if ( ! function_exists( 'pofo_post_left_sidebar_layout_callback' ) ) :
		function pofo_post_left_sidebar_layout_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_single_post_layout_setting' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_single_post_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_excerpt_callback' ) ) :
		function pofo_related_posts_excerpt_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_related_post_excerpt' )->value() == '1' && $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_post_right_sidebar_layout_callback' ) ) :
		function pofo_post_right_sidebar_layout_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_single_post_layout_setting' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_single_post_layout_setting' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_post_date_callback' ) ) :
	   	function pofo_post_date_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_hide_date' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_callback' ) ) :
	   	function pofo_related_posts_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_post_thumbnail_callback' ) ) :
	   	function pofo_related_posts_post_thumbnail_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_related_posts_hide_post_thumbnail' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_date_callback' ) ) :
	   	function pofo_related_posts_date_callback( $control )	{
	        if( $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' && $control->manager->get_setting( 'pofo_related_posts_hide_date' )->value() == '1' ) {
		    	return true;
		    }else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_background_callback' ) ) :
	   	function pofo_related_posts_background_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_post_layout_style' )->value() != 'post-layout-style-1' && $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_posts_separator_callback' ) ) :
	   	function pofo_related_posts_separator_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_related_posts_separator' )->value() == '1' && $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_related_post_general_title_border_callback' ) ) :
		function pofo_related_post_general_title_border_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_related_post_title_border' )->value() == '1' && $control->manager->get_setting( 'pofo_hide_related_posts' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_author_box_callback' ) ) :
		function pofo_author_box_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_hide_post_author_box' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;
	
	/* End Custom Callback Functions */