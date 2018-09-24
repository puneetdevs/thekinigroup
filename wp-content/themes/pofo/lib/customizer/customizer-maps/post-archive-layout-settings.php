<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/*
	 * Archive layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_archive_post_layout_container_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_archive_post_layout_container_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_archive_layout_panel',
	    'settings'   		=> 'pofo_archive_post_layout_container_separator',	    
	) ) );

	/* End Separator Settings */

	/* Archive Layout For Post */

	$wp_customize->add_setting( 'pofo_post_layout_setting_archive', array(
		'default' 			=> 'pofo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_post_layout_setting_archive', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_layout_setting_archive',
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

	$wp_customize->add_setting( 'pofo_post_left_sidebar_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_left_sidebar_archive', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_left_sidebar_archive',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_left_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_post_right_sidebar_archive', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_right_sidebar_archive', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_right_sidebar_archive',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_right_sidebar_layout_archive_callback',
	) ) );

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'pofo_post_container_style_archive', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_container_style_archive', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_container_style_archive',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Archive Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_archive_post_list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_archive_post_list_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Post List Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_archive_layout_panel',
	    'settings'   		=> 'pofo_archive_post_list_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Archive Type */

	/* Archive Style setting */

    $wp_customize->add_setting( 'pofo_blog_premade_style_archive', array(
		'default' 			=> 'blog-list',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_premade_style_archive', array(
		'label'       		=> esc_attr__( 'Post List Style', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_premade_style_archive',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'blog-full-width'		=> esc_html__( 'Full width', 'pofo' ),
								    'blog-classic' 	=> esc_html__( 'Classic', 'pofo' ),
								    'blog-list'		=> esc_html__( 'List', 'pofo' ),
								    'blog-grid'		=> esc_html__( 'Grid', 'pofo' ),
								    'blog-masonry'		=> esc_html__( 'Masonry', 'pofo' ),
								    'blog-simple'		=> esc_html__( 'Simple', 'pofo' ),
								    'blog-clean'		=> esc_html__( 'Clean', 'pofo' ),
								    'blog-personal'		=> esc_html__( 'Image boxes', 'pofo' ),
								    'blog-only-text'		=> esc_html__( 'Only text', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/full-width.jpg',
								  	POFO_THEME_IMAGES_URI . '/classic.jpg',
								  	POFO_THEME_IMAGES_URI . '/list.jpg',
								  	POFO_THEME_IMAGES_URI . '/grid.jpg',
								  	POFO_THEME_IMAGES_URI . '/masonry.jpg',
								  	POFO_THEME_IMAGES_URI . '/simple.jpg',
								  	POFO_THEME_IMAGES_URI . '/clean.jpg',
								  	POFO_THEME_IMAGES_URI . '/personal.jpg',
								  	POFO_THEME_IMAGES_URI . '/only-text.jpg',
							   ),
		'pofo_columns'    	=> '2',
	) ) );

	/* End Archive Style setting */

	/* Archive Column Type setting */

    $wp_customize->add_setting( 'pofo_blog_column_archive', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_column_archive', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_column_archive',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
								    '2' 	=> esc_html__( '2 columns', 'pofo' ),
								    '3'		=> esc_html__( '3 columns', 'pofo' ),
								    '4'		=> esc_html__( '4 columns', 'pofo' ),
								    '6'		=> esc_html__( '6 columns', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/6-columns.jpg',
							   ),
		'pofo_columns'    	=> '4',
		'active_callback'	=> 'pofo_blog_column_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_column_archive_callback' ) ) :
	   	function pofo_blog_column_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-full-width' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-list' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-masonry' ) {
		        return false;
		    } else {
		    	return true;
		    }
		}
	endif;

	/* End Archive Column Type setting */

	/* Archive Column Masonry Type setting */

    $wp_customize->add_setting( 'pofo_blog_masonry_column_archive', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_masonry_column_archive', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_masonry_column_archive',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
								    '2' 	=> esc_html__( '2 columns', 'pofo' ),
								    '3'		=> esc_html__( '3 columns', 'pofo' ),
								    '4'		=> esc_html__( '4 columns', 'pofo' ),
								    '5'		=> esc_html__( '5 columns', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/2-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/3-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/4-columns.jpg',
								  	POFO_THEME_IMAGES_URI . '/5-columns.jpg',
							   ),
		'pofo_columns'    	=> '4',
		'active_callback'	=> 'pofo_blog_masonry_column_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_masonry_column_archive_callback' ) ) :
	   	function pofo_blog_masonry_column_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-masonry' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Column Masonry Type setting */

	/* Archive Blog Type setting */

    $wp_customize->add_setting( 'pofo_blog_type_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_type_archive', array(
		'label'       		=> esc_attr__( 'Spacing Between Columns', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_type_archive',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'' 	=> esc_html__( 'Select Blog Type', 'pofo' ),
								    'gutter-large' 	=> esc_html__( 'Gutter Large', 'pofo' ),
								    'gutter-medium'		=> esc_html__( 'Gutter Medium', 'pofo' ),
								    'gutter-small'		=> esc_html__( 'Gutter Small', 'pofo' ),
								    'gutter-very-small'		=> esc_html__( 'Gutter Very Small', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/no-gutter.jpg',
									POFO_THEME_IMAGES_URI . '/gutter-large.jpg',
								  	POFO_THEME_IMAGES_URI . '/gutter-medium.jpg',
								  	POFO_THEME_IMAGES_URI . '/gutter-small.jpg',
								  	POFO_THEME_IMAGES_URI . '/gutter-very-small.jpg',
							   ),
		'pofo_columns'    	=> '5',
		'active_callback'	=> 'pofo_blog_column_spacing_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_column_spacing_archive_callback' ) ) :
	   	function pofo_blog_column_spacing_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-full-width' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-list' ) {
		        return false;
		    } else {
		    	return true;
		    }
		}
	endif;

	/* End Archive Blog Type setting */

	/* Archive Animation setting */

    $wp_customize->add_setting( 'pofo_animation_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Animation_Control( $wp_customize, 'pofo_animation_archive', array(
		'label'       		=> esc_attr__( 'Animation', 'pofo' ),
		'type'              => 'pofo_animation_style',
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_animation_archive',
	) ) );

	/* End Archive Animation setting */

	/* Archive Show Pagination setting */

	$wp_customize->add_setting( 'pofo_show_pagination_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_pagination_archive', array(
		'label'       		=> esc_attr__( 'Pagination', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_pagination_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Pagination setting */

	/* Archive Show Pagination setting */

	$wp_customize->add_setting( 'pofo_blog_pagination_style_archive', array(
		'default' 			=> 'number-pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_pagination_style_archive', array(
		'label'       		=> esc_attr__( 'Pagination Style', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_pagination_style_archive',
		'type'              => 'select',
		'choices'           => array(
									''	=> esc_html__( 'Select Pagination Style', 'pofo' ),
								    'number-pagination' 	=> esc_html__( 'Number', 'pofo' ),
								    'infinite-scroll-pagination'		=> esc_html__( 'Infinite scroll', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_pagination_style_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_pagination_style_archive_callback' ) ) :
	   	function pofo_pagination_style_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_pagination_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Show Pagination setting */

	/* Archive Show Post Thumbnail setting */

	$wp_customize->add_setting( 'pofo_show_post_thumbnail_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_thumbnail_archive', array(
		'label'       		=> esc_attr__( 'Post Thumbnail', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_thumbnail_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_post_thumbnail_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_post_thumbnail_archive_callback' ) ) :
	   	function pofo_post_thumbnail_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() != 'blog-personal') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Show Post Thumbnail setting */

	/* Archive Show Post Format Setting */

	$wp_customize->add_setting( 'pofo_show_post_format_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_format_archive', array(
		'label'       		=> esc_attr__( 'Post Featured Image Only', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_format_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Post Format Setting */

	/* Archive Image srcset setting */

    $wp_customize->add_setting( 'pofo_image_srcset_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_image_srcset_archive', array(
		'label'       		=> esc_attr__( 'Post Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_image_srcset_archive',
	) ) );

	/* End Archive Type */

	/* Archive Show Post Title setting */

	$wp_customize->add_setting( 'pofo_show_post_title_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_title_archive', array(
		'label'       		=> esc_attr__( 'Post Title', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_title_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Post Title setting */

	/* Archive Show Separator setting */

	$wp_customize->add_setting( 'pofo_show_separator_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_separator_archive', array(
		'label'       		=> esc_attr__( 'Separator', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_separator_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_show_separator_archive_callback'
	) ) );

	if ( ! function_exists( 'pofo_show_separator_archive_callback' ) ) :
   	function pofo_show_separator_archive_callback( $control )	{
        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-simple' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-grid' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-list' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-masonry' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-clean' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-only-text' ) {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;
	/* End Archive Show Separator setting */

	/* Archive Show Post Author setting */

	$wp_customize->add_setting( 'pofo_show_post_author_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_archive', array(
		'label'       		=> esc_attr__( 'Post Author', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_author_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Post Author setting */
	
	/* Archive Show Post Author Image setting */

	$wp_customize->add_setting( 'pofo_show_post_author_image_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_image_archive', array(
		'label'       		=> esc_attr__( 'Post Author Image', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_author_image_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_show_post_author_archive_callback'
	) ) );

	if ( ! function_exists( 'pofo_show_post_author_archive_callback' ) ) :
   	function pofo_show_post_author_archive_callback( $control )	{
        if ( $control->manager->get_setting( 'pofo_show_post_author_archive' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;

	/* End Archive Show Post Author Image setting */

	/* Archive Show Post Date setting */

	$wp_customize->add_setting( 'pofo_show_post_date_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_date_archive', array(
		'label'       		=> esc_attr__( 'Post Date', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_post_date_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Post Date setting */

	/* Archive Date Format setting */

	$wp_customize->add_setting( 'pofo_date_format_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_date_format_archive', array(
		'label'       		=> esc_attr__( 'Post Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_date_format_archive',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_date_format_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_date_format_archive_callback' ) ) :
	   	function pofo_date_format_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_date_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Date Format setting */

	/* Archive Show Excerpt setting */

	$wp_customize->add_setting( 'pofo_show_excerpt_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_excerpt_archive', array(
		'label'       		=> esc_attr__( 'Post Excerpt', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_excerpt_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Excerpt setting */

	/* Archive Excerpt Length setting */

    $wp_customize->add_setting( 'pofo_excerpt_length_archive', array(
		'default' 			=> 15,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_excerpt_length_archive', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_excerpt_length_archive',
		'type'              => 'text',
		'active_callback'   => 'pofo_excerpt_length_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_excerpt_length_archive_callback' ) ) :
	   	function pofo_excerpt_length_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Excerpt Length setting */

	/* Archive Show Content setting */

	$wp_customize->add_setting( 'pofo_show_content_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_content_archive', array(
		'label'       		=> esc_attr__( 'Post Full Content', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_content_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_show_content_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_show_content_archive_callback' ) ) :
	   	function pofo_show_content_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_archive' )->value() == '0') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Content setting */

	/* Archive Show Categories setting */

	$wp_customize->add_setting( 'pofo_show_category_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_category_archive', array(
		'label'       		=> esc_attr__( 'Post Categories', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_category_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Categories setting */

	/* Archive Show like setting */

	$wp_customize->add_setting( 'pofo_show_like_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_like_archive', array(
		'label'       		=> esc_attr__( 'Post Likes', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_like_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show like setting */

	/* Archive Show Comment setting */

	$wp_customize->add_setting( 'pofo_show_comment_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_comment_archive', array(
		'label'       		=> esc_attr__( 'Post Comments', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_comment_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Comment setting */

	/* Archive Show Button setting */

	$wp_customize->add_setting( 'pofo_show_button_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_button_archive', array(
		'label'       		=> esc_attr__( 'Read More Button', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_show_button_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Button setting */

	/* Archive Button Text setting */

	$wp_customize->add_setting( 'pofo_button_text_archive', array(
		'default' 			=> 'continue reading',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_button_text_archive', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_text_archive',
		'type'              => 'text',
		'active_callback'	=> 'pofo_button_text_archive_callback'
	) ) );

	if ( ! function_exists( 'pofo_button_text_archive_callback' ) ) :
	   	function pofo_button_text_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Button Text setting */

	/* Archive Show Box Border setting */

	$wp_customize->add_setting( 'pofo_box_enable_border_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_box_enable_border_archive', array(
		'label'       		=> esc_attr__( 'Show Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_enable_border_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_box_enable_border_archive_callback',
	) ) );

     if ( ! function_exists( 'pofo_box_enable_border_archive_callback' ) ) :
	   	function pofo_box_enable_border_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-only-text') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Archive Show Box Border setting */

	/* Hide Icon */

    $wp_customize->add_setting( 'pofo_hide_icon_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_icon_archive', array(
		'label'       		=> esc_attr__( 'Hover Icon', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_hide_icon_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_hover_icon_archive_callback',
	) ) );

	/* End Hide Icon */

	/* Hide Zoom Effect */

    $wp_customize->add_setting( 'pofo_zoom_effect_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_zoom_effect_archive', array(
		'label'       		=> esc_attr__( 'Zoom Effect On Hover', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_zoom_effect_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_zoom_archive_callback',
	) ) );

	/* End Hide Zoom Effect */

	/* Archive Page Title Opacity */

    $wp_customize->add_setting( 'pofo_opacity_archive', array(
		'default' 			=> '0.5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_opacity_archive', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_opacity_archive',
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
		'active_callback'   => 'pofo_opacity_archive_callback',
	) ) );
   
  	/* End Archive Title Opacity */

	/* Archive Overlay Color Setting */

	$wp_customize->add_setting( 'pofo_overlay_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_overlay_color_archive', array(
	    'label'      		=> esc_attr__( 'Overlay', 'pofo' ),
	    'section'    		=> 'pofo_add_archive_layout_panel',
	    'settings'	 		=> 'pofo_overlay_color_archive',
	    'active_callback'   => 'pofo_opacity_archive_callback',
	) ) );

	/* End Archive Overlay Color Setting */

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_archive_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_archive_layout_separator_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_archive_layout_panel',
	    'settings'   		=> 'pofo_archive_layout_separator_title_typography',
	    'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'pofo_archive_layout_title_typography_callback' ) ) :
	   	function pofo_archive_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_title_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Archive Font Size setting */

	$wp_customize->add_setting( 'pofo_title_font_size_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_size_archive', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_font_size_archive',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Font Size setting */

	/* Archive Line Height setting */

	$wp_customize->add_setting( 'pofo_title_line_height_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_line_height_archive', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_line_height_archive',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Line Height setting */

	/* Archive Letter Spacing setting */

	$wp_customize->add_setting( 'pofo_title_letter_spacing_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_letter_spacing_archive', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_letter_spacing_archive',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Letter Spacing setting */

	/* Archive Font Weight setting */

    $wp_customize->add_setting( 'pofo_title_font_weight_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_weight_archive', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_font_weight_archive',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Font Weight', 'pofo' ),
								    '300' 	=> esc_html__( 'Font weight 300', 'pofo' ),
								    '400'	=> esc_html__( 'Font weight 400', 'pofo' ),
								    '500'	=> esc_html__( 'Font weight 500', 'pofo' ),
								    '600'	=> esc_html__( 'Font weight 600', 'pofo' ),
								    '700'	=> esc_html__( 'Font weight 700', 'pofo' ),
								    '800'	=> esc_html__( 'Font weight 800', 'pofo' ),
								    '900'	=> esc_html__( 'Font weight 900', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Font Weight setting */

	/* Archive Font Italic setting */

	$wp_customize->add_setting( 'pofo_title_italic_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_italic_archive', array(
		'label'       		=> esc_attr__( 'Italic', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_italic_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Font Italic setting */

	/* Archive Font Underline setting */

	$wp_customize->add_setting( 'pofo_title_underline_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_underline_archive', array(
		'label'       		=> esc_attr__( 'Underline', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_underline_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Font Underline setting */

	/* Archive Title Color setting */

	$wp_customize->add_setting( 'pofo_title_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_color_archive', array(
		'label'       		=> esc_attr__( 'Title Color', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_color_archive',
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Title Color setting */

	/* Archive Title Hover Color setting */

	$wp_customize->add_setting( 'pofo_title_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_hover_color_archive', array(
		'label'       		=> esc_attr__( 'Title Hover Color', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_hover_color_archive',
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Title Hover Color setting */

	/* Archive Auto Responsive Font Size setting */

	$wp_customize->add_setting( 'pofo_title_enable_responsive_font_archive', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_enable_responsive_font_archive', array(
		'label'       		=> esc_attr__( 'Auto Responsive Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_title_enable_responsive_font_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'description'       => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo' ),
		'active_callback'	=> 'pofo_archive_layout_title_typography_callback',
	) ) );

	/* End Archive Auto Responsive Font Size setting */

	/* Style Separator setting */

	$wp_customize->add_setting( 'pofo_archive_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_archive_layout_separator_style', array(
	    'label'      		=> esc_attr__( 'Post Meta and Button Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_archive_layout_panel',
	    'settings'   		=> 'pofo_archive_layout_separator_style',
	) ) );

	/* End Style Separator setting */

	/* Archive Box Background Color setting */

	$wp_customize->add_setting( 'pofo_box_bg_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_bg_color_archive', array(
		'label'       		=> esc_attr__( 'Box Background', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_bg_color_archive',
		'active_callback'	=> 'pofo_box_bg_color_archive_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_bg_color_archive_callback' ) ) :
	   	function pofo_box_bg_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-only-text' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-grid' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-full-width' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-masonry') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Box Background Color setting */

	/* Archive Box Background Hover Color setting */

	$wp_customize->add_setting( 'pofo_box_bg_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_bg_hover_color_archive', array(
		'label'       		=> esc_attr__( 'Box Background Hover', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_bg_hover_color_archive',
		'active_callback'	=> 'pofo_box_bg_hover_color_archive_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_bg_hover_color_archive_callback' ) ) :
	   	function pofo_box_bg_hover_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-only-text' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Box Background Hover Color setting */

	/* Archive Post Meta Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_color_archive', array(
		'label'       		=> esc_attr__( 'Post Meta', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_meta_color_archive',
	) ) );

	/* End Archive Post Meta Color setting */

	/* Archive Post Meta Hover Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_hover_color_archive', array(
		'label'       		=> esc_attr__( 'Post Meta Hover', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_post_meta_hover_color_archive',
	) ) );

	/* End Archive Post Meta Hover Color setting */

	/* Archive Button Color setting */

	$wp_customize->add_setting( 'pofo_button_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_color_archive', array(
		'label'       		=> esc_attr__( 'Button', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_color_archive',
		'active_callback'	=> 'pofo_button_color_archive_callback',
	) ) );

    if ( ! function_exists( 'pofo_button_color_archive_callback' ) ) :
	   	function pofo_button_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Button Color setting */

	/* Archive Button Hover Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_color_archive', array(
		'label'       		=> esc_attr__( 'Button Hover', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_hover_color_archive',
		'active_callback'	=> 'pofo_button_color_archive_callback',
	) ) );

	/* End Archive Button Hover Color setting */

	/* Archive Button Text Color setting */

	$wp_customize->add_setting( 'pofo_button_text_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_text_color_archive', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_text_color_archive',
		'active_callback'	=> 'pofo_button_color_archive_callback',
	) ) );

	/* End Archive Button Text Color setting */

	/* Archive Button Hover Text Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_text_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_text_color_archive', array(
		'label'       		=> esc_attr__( 'Button Text Hover', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_hover_text_color_archive',
		'active_callback'	=> 'pofo_button_color_archive_callback',
	) ) );

	/* End Archive Button Hover Text Color setting */

	/* Archive Button Border Color setting */

	$wp_customize->add_setting( 'pofo_button_border_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_border_color_archive', array(
		'label'       		=> esc_attr__( 'Button Border', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_button_border_color_archive',
		'active_callback'	=> 'pofo_button_color_archive_callback',
	) ) );

	/* End Archive Button Border Color setting */

	/* Archive Separator Color setting */

	$wp_customize->add_setting( 'pofo_separator_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_separator_color_archive', array(
		'label'       		=> esc_attr__( 'Separator Color', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_separator_color_archive',
		'active_callback'	=> 'pofo_separator_color_archive_callback',
	) ) );

    if ( ! function_exists( 'pofo_separator_color_archive_callback' ) ) :
	   	function pofo_separator_color_archive_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'pofo_show_separator_archive' )->value() == '1') && ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-simple' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-grid' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-list' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-masonry' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-clean' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-only-text' ) ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Separator Color setting */

	/* Archive Separator Thickness setting */

	$wp_customize->add_setting( 'pofo_seperator_height_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_seperator_height_archive', array(
		'label'       		=> esc_attr__( 'Separator Thickness', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_seperator_height_archive',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_separator_color_archive_callback',
	) ) );

	/* End Archive Separator Thickness setting */

	/* Archive Post Title Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_title_text_transform_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_title_text_transform_archive', array(
		'label'       		=> esc_attr__( 'Post Title Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_post_title_text_transform_archive',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Archive Post Title Text Transform setting */

	/* Archive Post Meta Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_meta_text_transform_archive', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_meta_text_transform_archive', array(
		'label'       		=> esc_attr__( 'Post Meta Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_blog_post_meta_text_transform_archive',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Archive Post Meta Text Transform setting */

	/* Archive Box Border Color setting */

	$wp_customize->add_setting( 'pofo_box_border_color_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_border_color_archive', array(
		'label'       		=> esc_attr__( 'Box Border Color', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_border_color_archive',
		'active_callback'	=> 'pofo_box_border_color_archive_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_border_color_archive_callback' ) ) :
	   	function pofo_box_border_color_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_box_enable_border_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Box Border Color setting */

	/* Archive Box Border Size setting */

	$wp_customize->add_setting( 'pofo_box_border_size_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_size_archive', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_border_size_archive',
		'type'              => 'text',
		'active_callback'	=> 'pofo_box_border_color_archive_callback',
	) ) );

	/* End Archive Box Border Size setting */

	/* Archive Box Border Type Transform setting */

    $wp_customize->add_setting( 'pofo_box_border_type_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_type_archive', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_archive_layout_panel',
		'settings'			=> 'pofo_box_border_type_archive',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_box_border_color_archive_callback',
	) ) );

	/* End Archive Box Border Type Transform setting */

	if ( ! function_exists( 'pofo_post_left_sidebar_layout_archive_callback' ) ) :
		function pofo_post_left_sidebar_layout_archive_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_post_layout_setting_archive' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_post_layout_setting_archive' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_post_right_sidebar_layout_archive_callback' ) ) :
		function pofo_post_right_sidebar_layout_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_post_layout_setting_archive' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_post_layout_setting_archive' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_zoom_archive_callback' ) ) :
		function pofo_zoom_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-personal' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_opacity_archive_callback' ) ) :
		function pofo_opacity_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-personal' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_hover_icon_archive_callback' ) ) :
		function pofo_hover_icon_archive_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_archive' )->value() == 'blog-grid' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;