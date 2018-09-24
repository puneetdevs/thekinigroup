<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();
	
	/*
	 * default layout setting panel.
	 */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_default_post_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_post_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_layout_panel',
	    'settings'   		=> 'pofo_default_post_separator',	    
	) ) );

	/* End Separator Settings */

/* Default Layout For Post */

	$wp_customize->add_setting( 'pofo_post_layout_setting_default', array(
		'default' 			=> 'pofo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_post_layout_setting_default', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_layout_setting_default',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'pofo_layout_full_screen_12col' => esc_html__( 'One Column', 'pofo' ),
								  	'pofo_layout_left_sidebar'      => esc_html__( 'Two Columns Left', 'pofo' ),
								  	'pofo_layout_right_sidebar'     => esc_html__( 'Two Columns Right', 'pofo' ),
								  	'pofo_layout_both_sidebar' 	    => esc_html__( 'Three Columns', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/1col.png',
								  	POFO_THEME_IMAGES_URI . '/2cl.png',
								  	POFO_THEME_IMAGES_URI . '/2cr.png',
								  	POFO_THEME_IMAGES_URI . '/3cm.png',
							   ),	
		'pofo_columns'    		=> '4',
	) ) );

	/* End Default Layout For Post */

	/* Default Left Sidebar */

	$wp_customize->add_setting( 'pofo_post_left_sidebar_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_left_sidebar_default', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_left_sidebar_default',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_left_sidebar_layout_default_callback',
	) ) );

	/* End Default Left Sidebar */

	/* Default Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_post_right_sidebar_default', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_right_sidebar_default', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_right_sidebar_default',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_post_right_sidebar_layout_default_callback',
	) ) );

	/* End Default Right Sidebar */

	/* Default Container Setting */

	$wp_customize->add_setting( 'pofo_post_container_style_default', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_post_container_style_default', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_container_style_default',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),
	) ) );

	/* End Default Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_default_post__list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_post__list_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Post List Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_layout_panel',
	    'settings'   		=> 'pofo_default_post__list_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Default Type */

	/* Default Style setting */

    $wp_customize->add_setting( 'pofo_blog_premade_style_default', array(
		'default' 			=> 'blog-list',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_premade_style_default', array(
		'label'       		=> esc_attr__( 'Post List Style', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_premade_style_default',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'blog-full-width'	=> esc_html__( 'Full width', 'pofo' ),
								    'blog-classic' 		=> esc_html__( 'Classic', 'pofo' ),
								    'blog-list'			=> esc_html__( 'List', 'pofo' ),
								    'blog-grid'			=> esc_html__( 'Grid', 'pofo' ),
								    'blog-masonry'		=> esc_html__( 'Masonry', 'pofo' ),
								    'blog-simple'		=> esc_html__( 'Simple', 'pofo' ),
								    'blog-clean'		=> esc_html__( 'Clean', 'pofo' ),
								    'blog-personal'		=> esc_html__( 'Image boxes', 'pofo' ),
								    'blog-only-text'	=> esc_html__( 'Only text', 'pofo' ),
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

	/* End Default Style setting */

	/* Default Column Type setting */

    $wp_customize->add_setting( 'pofo_blog_column_default', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_column_default', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_column_default',
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
		'active_callback'	=> 'pofo_blog_column_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_column_default_callback' ) ) :
	   	function pofo_blog_column_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-full-width' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-list' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-masonry' ) {
		        return false;
		    } else {
		    	return true;
		    }
		}
	endif;

	/* End Default Column Type setting */

	/* Default Column Masonry Type setting */

    $wp_customize->add_setting( 'pofo_blog_masonry_column_default', array(
		'default' 			=> '3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_masonry_column_default', array(
		'label'       		=> esc_attr__( 'No. of Columns', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_masonry_column_default',
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
		'active_callback'	=> 'pofo_blog_masonry_column_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_masonry_column_default_callback' ) ) :
	   	function pofo_blog_masonry_column_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-masonry' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Column Masonry Type setting */

	/* Default Blog Type setting */

    $wp_customize->add_setting( 'pofo_blog_type_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_blog_type_default', array(
		'label'       		=> esc_attr__( 'Spacing Between Columns', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_type_default',
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
		'active_callback'	=> 'pofo_blog_column_spacing_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_blog_column_spacing_default_callback' ) ) :
	   	function pofo_blog_column_spacing_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-full-width' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-list' ) {
		        return false;
		    } else {
		    	return true;
		    }
		}
	endif;

	/* End Default Blog Type setting */

	/* Default Animation setting */

    $wp_customize->add_setting( 'pofo_animation_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Animation_Control( $wp_customize, 'pofo_animation_default', array(
		'label'       		=> esc_attr__( 'Animation', 'pofo' ),
		'type'              => 'pofo_animation_style',
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_animation_default',
	) ) );

	/* End Default Animation setting */

	/* default Blog Title setting */

    $wp_customize->add_setting( 'pofo_default_post_title_default', array(
		'default' 			=> 'Blog',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_post_title_default', array(
		'label'       		=> esc_attr__( 'Blog Title', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_default_post_title_default',
		'type'              => 'text',
	) ) );

	/* End default Posts Per Page setting */

	/* Default Show Pagination setting */

	$wp_customize->add_setting( 'pofo_show_pagination_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_pagination_default', array(
		'label'       		=> esc_attr__( 'Pagination', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_pagination_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Pagination setting */

	/* Default Show Pagination setting */

	$wp_customize->add_setting( 'pofo_blog_pagination_style_default', array(
		'default' 			=> 'number-pagination',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_pagination_style_default', array(
		'label'       		=> esc_attr__( 'Pagination Style', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_pagination_style_default',
		'type'              => 'select',
		'choices'           => array(
									''	=> esc_html__( 'Select Pagination Style', 'pofo' ),
								    'number-pagination' 	=> esc_html__( 'Number', 'pofo' ),
								    'infinite-scroll-pagination'		=> esc_html__( 'Infinite scroll', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_pagination_style_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_pagination_style_default_callback' ) ) :
	   	function pofo_pagination_style_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_pagination_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Show Pagination setting */

	/* Default Show Post Thumbnail setting */

	$wp_customize->add_setting( 'pofo_show_post_thumbnail_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_thumbnail_default', array(
		'label'       		=> esc_attr__( 'Post Thumbnail', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_thumbnail_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_post_thumbnail_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_post_thumbnail_default_callback' ) ) :
	   	function pofo_post_thumbnail_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() != 'blog-personal') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Show Post Thumbnail setting */

	/* Default Show Post Format Setting */

	$wp_customize->add_setting( 'pofo_show_post_format_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_format_default', array(
		'label'       		=> esc_attr__( 'Post Featured Image Only', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_format_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Post Format Setting */

	/* Default Image srcset setting */

    $wp_customize->add_setting( 'pofo_image_srcset_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_image_srcset_default', array(
		'label'       		=> esc_attr__( 'Post Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_image_srcset_default',
	) ) );

	/* End Default Type */

	/* Default Show Post Title setting */

	$wp_customize->add_setting( 'pofo_show_post_title_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_title_default', array(
		'label'       		=> esc_attr__( 'Post Title', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_title_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Post Title setting */

	/* Default Show Separator setting */

	$wp_customize->add_setting( 'pofo_show_separator_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_separator_default', array(
		'label'       		=> esc_attr__( 'Separator', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_separator_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_show_separator_default_callback'
	) ) );

	if ( ! function_exists( 'pofo_show_separator_default_callback' ) ) :
   	function pofo_show_separator_default_callback( $control )	{
        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-list' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-simple' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-grid' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-masonry' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-clean' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-only-text' ) {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;
	/* End Default Show Separator setting */

	/* Default Show Post Author setting */

	$wp_customize->add_setting( 'pofo_show_post_author_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_default', array(
		'label'       		=> esc_attr__( 'Post Author', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_author_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Post Author setting */
	
	/* Default Show Post Author Image setting */

	$wp_customize->add_setting( 'pofo_show_post_author_image_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_image_default', array(
		'label'       		=> esc_attr__( 'Post Author Image', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_author_image_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_show_post_author_default_callback'
	) ) );

	if ( ! function_exists( 'pofo_show_post_author_default_callback' ) ) :
   	function pofo_show_post_author_default_callback( $control )	{
        if ( $control->manager->get_setting( 'pofo_show_post_author_default' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;

	/* End Default Show Post Author Image setting */

	/* Default Show Post Date setting */

	$wp_customize->add_setting( 'pofo_show_post_date_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_date_default', array(
		'label'       		=> esc_attr__( 'Post Date', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_post_date_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Post Date setting */

	/* Default Date Format setting */

	$wp_customize->add_setting( 'pofo_date_format_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_date_format_default', array(
		'label'       		=> esc_attr__( 'Post Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_date_format_default',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_date_format_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_date_format_default_callback' ) ) :
	   	function pofo_date_format_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_date_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Date Format setting */

	/* Default Show Excerpt setting */

	$wp_customize->add_setting( 'pofo_show_excerpt_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_excerpt_default', array(
		'label'       		=> esc_attr__( 'Post Excerpt', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_excerpt_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Excerpt setting */

	/* Default Excerpt Length setting */

    $wp_customize->add_setting( 'pofo_excerpt_length_default', array(
		'default' 			=> 15,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_excerpt_length_default', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_excerpt_length_default',
		'type'              => 'text',
		'active_callback'   => 'pofo_excerpt_length_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_excerpt_length_default_callback' ) ) :
	   	function pofo_excerpt_length_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Excerpt Length setting */

	/* Default Show Content setting */

	$wp_customize->add_setting( 'pofo_show_content_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_content_default', array(
		'label'       		=> esc_attr__( 'Post Full Content', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_content_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_show_content_default_callback',
	) ) );

	if ( ! function_exists( 'pofo_show_content_default_callback' ) ) :
	   	function pofo_show_content_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_default' )->value() == '0') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Show Content setting */

	/* Default Show Categories setting */

	$wp_customize->add_setting( 'pofo_show_category_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_category_default', array(
		'label'       		=> esc_attr__( 'Post Categories', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_category_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Categories setting */

	/* Default Show like setting */

	$wp_customize->add_setting( 'pofo_show_like_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_like_default', array(
		'label'       		=> esc_attr__( 'Post Likes', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_like_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show like setting */

	/* Default Show Comment setting */

	$wp_customize->add_setting( 'pofo_show_comment_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_comment_default', array(
		'label'       		=> esc_attr__( 'Post Comments', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_comment_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Comment setting */

	/* Default Show Button setting */

	$wp_customize->add_setting( 'pofo_show_button_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_button_default', array(
		'label'       		=> esc_attr__( 'Read More Button', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_show_button_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Default Show Button setting */

	/* Default Button Text setting */

	$wp_customize->add_setting( 'pofo_button_text_default', array(
		'default' 			=> 'continue reading',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_button_text_default', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_text_default',
		'type'              => 'text',
		'active_callback'	=> 'pofo_button_text_default_callback'
	) ) );

	if ( ! function_exists( 'pofo_button_text_default_callback' ) ) :
	   	function pofo_button_text_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Button Text setting */

	/* Default Show Box Border setting */

	$wp_customize->add_setting( 'pofo_box_enable_border_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_box_enable_border_default', array(
		'label'       		=> esc_attr__( 'Show Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_enable_border_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_box_enable_border_default_callback',
	) ) );

     if ( ! function_exists( 'pofo_box_enable_border_default_callback' ) ) :
	   	function pofo_box_enable_border_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-only-text') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Default Show Box Border setting */

	/* Hide Icon */

    $wp_customize->add_setting( 'pofo_hide_icon_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_hide_icon_default', array(
		'label'       		=> esc_attr__( 'Hover Icon', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_hide_icon_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_hover_icon_default_callback',
	) ) );

	/* End Hide Icon */

	/* Hide Zoom Effect */

    $wp_customize->add_setting( 'pofo_zoom_effect_default', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_zoom_effect_default', array(
		'label'       		=> esc_attr__( 'Zoom Effect On Hover', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_zoom_effect_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_zoom_default_callback',
	) ) );

	/* End Hide Zoom Effect */

	/* Default Page Title Opacity */

    $wp_customize->add_setting( 'pofo_opacity_default', array(
		'default' 			=> '0.5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_opacity_default', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_opacity_default',
		'type'              => 'select',
		'choices'           => array(
									'0.0'   => esc_html__( 'No Opacity', 'pofo' ),
								    '0.1'   => esc_html__( '0.1', 'pofo' ),
								    '0.2'   => esc_html__( '0.2', 'pofo' ),
								    '0.3'   => esc_html__( '0.3', 'pofo' ),
								    '0.4'   => esc_html__( '0.4', 'pofo' ),
								    '0.5'   => esc_html__( '0.5', 'pofo' ),
								    '0.6'   => esc_html__( '0.6', 'pofo' ),
								    '0.7'   => esc_html__( '0.7', 'pofo' ),
								    '0.8'   => esc_html__( '0.8', 'pofo' ),
								    '0.9'   => esc_html__( '0.9', 'pofo' ),
								    '1.0'   => esc_html__( '1.0', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_opacity_default_callback',
	) ) );
   
  	/* End Default Title Opacity */

	/* Default Overlay Color Setting */

	$wp_customize->add_setting( 'pofo_overlay_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_overlay_color_default', array(
	    'label'      		=> esc_attr__( 'Overlay', 'pofo' ),
	    'section'    		=> 'pofo_add_default_layout_panel',
	    'settings'	 		=> 'pofo_overlay_color_default',
	    'active_callback'   => 'pofo_opacity_default_callback',
	) ) );

	/* End Default Overlay Color Setting */

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_default_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_layout_separator_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_layout_panel',
	    'settings'   		=> 'pofo_default_layout_separator_title_typography',
	    'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'pofo_default_layout_title_typography_callback' ) ) :
	   	function pofo_default_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_title_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Default Font Size setting */

	$wp_customize->add_setting( 'pofo_title_font_size_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_size_default', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_font_size_default',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Font Size setting */

	/* Default Line Height setting */

	$wp_customize->add_setting( 'pofo_title_line_height_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_line_height_default', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_line_height_default',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Line Height setting */

	/* Default Letter Spacing setting */

	$wp_customize->add_setting( 'pofo_title_letter_spacing_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_letter_spacing_default', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_letter_spacing_default',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Letter Spacing setting */

	/* Default Font Weight setting */

    $wp_customize->add_setting( 'pofo_title_font_weight_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_weight_default', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_font_weight_default',
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
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Font Weight setting */

	/* Default Font Italic setting */

	$wp_customize->add_setting( 'pofo_title_italic_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_italic_default', array(
		'label'       		=> esc_attr__( 'Italic', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_italic_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Font Italic setting */

	/* Default Font Underline setting */

	$wp_customize->add_setting( 'pofo_title_underline_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_underline_default', array(
		'label'       		=> esc_attr__( 'Underline', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_underline_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Font Underline setting */

	/* Default Title Color setting */

	$wp_customize->add_setting( 'pofo_title_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_color_default', array(
		'label'       		=> esc_attr__( 'Title Color', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_color_default',
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Title Color setting */

	/* Default Title Hover Color setting */

	$wp_customize->add_setting( 'pofo_title_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_hover_color_default', array(
		'label'       		=> esc_attr__( 'Title Hover Color', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_hover_color_default',
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Title Hover Color setting */

	/* Default Auto Responsive Font Size setting */

	$wp_customize->add_setting( 'pofo_title_enable_responsive_font_default', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_enable_responsive_font_default', array(
		'label'       		=> esc_attr__( 'Auto Responsive Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_title_enable_responsive_font_default',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'description'       => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo' ),
		'active_callback'	=> 'pofo_default_layout_title_typography_callback',
	) ) );

	/* End Default Auto Responsive Font Size setting */

	/* Style Separator setting */

	$wp_customize->add_setting( 'pofo_default_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_layout_separator_style', array(
	    'label'      		=> esc_attr__( 'Post Meta and Button Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_layout_panel',
	    'settings'   		=> 'pofo_default_layout_separator_style',
	) ) );

	/* End Style Separator setting */

	/* Default Box Background Color setting */

	$wp_customize->add_setting( 'pofo_box_bg_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_bg_color_default', array(
		'label'       		=> esc_attr__( 'Box Background', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_bg_color_default',
		'active_callback'	=> 'pofo_box_bg_color_default_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_bg_color_default_callback' ) ) :
	   	function pofo_box_bg_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-only-text' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-grid' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-full-width' ||
	        	 $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-masonry') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Box Background Color setting */

	/* Default Box Background Hover Color setting */

	$wp_customize->add_setting( 'pofo_box_bg_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_bg_hover_color_default', array(
		'label'       		=> esc_attr__( 'Box Background Hover', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_bg_hover_color_default',
		'active_callback'	=> 'pofo_box_bg_hover_color_default_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_bg_hover_color_default_callback' ) ) :
	   	function pofo_box_bg_hover_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-only-text' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Box Background Color setting */

	/* Default Post Meta Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_color_default', array(
		'label'       		=> esc_attr__( 'Post Meta', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_meta_color_default',
	) ) );

	/* End Default Post Meta Color setting */

	/* Default Post Meta Hover Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_hover_color_default', array(
		'label'       		=> esc_attr__( 'Post Meta Hover', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_post_meta_hover_color_default',
	) ) );

	/* End Default Post Meta Hover Color setting */

	/* Default Button Color setting */

	$wp_customize->add_setting( 'pofo_button_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_color_default', array(
		'label'       		=> esc_attr__( 'Button', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_color_default',
		'active_callback'	=> 'pofo_button_color_default_callback',
	) ) );

    if ( ! function_exists( 'pofo_button_color_default_callback' ) ) :
	   	function pofo_button_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Button Color setting */

	/* Default Button Hover Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_color_default', array(
		'label'       		=> esc_attr__( 'Button Hover', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_hover_color_default',
		'active_callback'	=> 'pofo_button_color_default_callback',
	) ) );

	/* End Default Button Hover Color setting */

	/* Default Button Text Color setting */

	$wp_customize->add_setting( 'pofo_button_text_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_text_color_default', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_text_color_default',
		'active_callback'	=> 'pofo_button_color_default_callback',
	) ) );

	/* End Default Button Text Color setting */

	/* Default Button Hover Text Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_text_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_text_color_default', array(
		'label'       		=> esc_attr__( 'Button Text Hover', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_hover_text_color_default',
		'active_callback'	=> 'pofo_button_color_default_callback',
	) ) );

	/* End Default Button Hover Text Color setting */

	/* Default Button Border Color setting */

	$wp_customize->add_setting( 'pofo_button_border_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_border_color_default', array(
		'label'       		=> esc_attr__( 'Button Border', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_button_border_color_default',
		'active_callback'	=> 'pofo_button_color_default_callback',
	) ) );

	/* End Default Button Border Color setting */

	/* Default Separator Color setting */

	$wp_customize->add_setting( 'pofo_separator_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_separator_color_default', array(
		'label'       		=> esc_attr__( 'Separator Color', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_separator_color_default',
		'active_callback'	=> 'pofo_separator_color_default_callback',
	) ) );

    if ( ! function_exists( 'pofo_separator_color_default_callback' ) ) :
	   	function pofo_separator_color_default_callback( $control )	{
	        if ( ( $control->manager->get_setting( 'pofo_show_separator_default' )->value() == '1') && ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-simple' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-grid' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-masonry' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-clean' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-only-text' ) ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Separator Color setting */

	/* Default Separator Thickness setting */

	$wp_customize->add_setting( 'pofo_seperator_height_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_seperator_height_default', array(
		'label'       		=> esc_attr__( 'Separator Thickness', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_seperator_height_default',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_separator_color_default_callback',
	) ) );

	/* End Default Separator Thickness setting */

	/* Default Post Meta Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_title_text_transform_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_title_text_transform_default', array(
		'label'       		=> esc_attr__( 'Post Title Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_post_title_text_transform_default',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Default Post Meta Text Transform setting */

	/* Default Post Meta Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_meta_text_transform_default', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_meta_text_transform_default', array(
		'label'       		=> esc_attr__( 'Post Meta Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_blog_post_meta_text_transform_default',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Default Post Meta Text Transform setting */

	/* Default Box Border Color setting */

	$wp_customize->add_setting( 'pofo_box_border_color_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_border_color_default', array(
		'label'       		=> esc_attr__( 'Box Border Color', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_border_color_default',
		'active_callback'	=> 'pofo_box_border_color_default_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_border_color_default_callback' ) ) :
	   	function pofo_box_border_color_default_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_box_enable_border_default' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Default Box Border Color setting */

	/* Default Box Border Size setting */

	$wp_customize->add_setting( 'pofo_box_border_size_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_size_default', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_border_size_default',
		'type'              => 'text',
		'active_callback'	=> 'pofo_box_border_color_default_callback',
	) ) );

	/* End Default Box Border Size setting */

	/* Default Box Border Type Transform setting */

    $wp_customize->add_setting( 'pofo_box_border_type_default', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_type_default', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_default_layout_panel',
		'settings'			=> 'pofo_box_border_type_default',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_box_border_color_default_callback',
	) ) );

	/* End Default Box Border Type Transform setting */

	if ( ! function_exists( 'pofo_post_left_sidebar_layout_default_callback' ) ) :
		function pofo_post_left_sidebar_layout_default_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_post_layout_setting_default' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_post_layout_setting_default' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_post_right_sidebar_layout_default_callback' ) ) :
		function pofo_post_right_sidebar_layout_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_post_layout_setting_default' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_post_layout_setting_default' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_zoom_default_callback' ) ) :
		function pofo_zoom_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-personal' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_opacity_default_callback' ) ) :
		function pofo_opacity_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-classic' || $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-personal' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	if ( ! function_exists( 'pofo_hover_icon_default_callback' ) ) :
		function pofo_hover_icon_default_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_blog_premade_style_default' )->value() == 'blog-grid' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;