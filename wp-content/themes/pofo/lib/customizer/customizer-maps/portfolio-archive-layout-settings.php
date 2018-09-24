<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/*
	 * Archive layout setting panel.
	 */

	/* Separator Settings */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_layout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_archive_page_layout_separator', array(
	    'label'      		=> esc_attr__( 'Layout and Container', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'   		=> 'pofo_portfolio_archive_page_layout_separator',	    
	) ) );

	/* End Separator Settings */

	/* Archive Layout For Post */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_layout_column', array(
		'default' 			=> 'pofo_layout_right_sidebar',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_portfolio_archive_page_layout_column', array(
		'label'       		=> esc_attr__( 'Layout Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_layout_column',
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

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_layout_left_sidebar', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_layout_left_sidebar', array(
		'label'       		=> esc_attr__( 'Left Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_layout_left_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_portfolio_archive_page_layout_left_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_layout_left_sidebar_callback' ) ) :
		function pofo_portfolio_archive_page_layout_left_sidebar_callback( $control ) {
	      	if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_layout_column' )->value() == 'pofo_layout_left_sidebar' || $control->manager->get_setting( 'pofo_portfolio_archive_page_layout_column' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Archive Left Sidebar */

	/* Archive Right Sidebar */
	
	$wp_customize->add_setting( 'pofo_portfolio_archive_page_layout_right_sidebar', array(
		'default' 			=> 'sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_layout_right_sidebar', array(
		'label'       		=> esc_attr__( 'Right Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_layout_right_sidebar',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
		'active_callback'   => 'pofo_portfolio_archive_page_layout_right_sidebar_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_layout_right_sidebar_callback' ) ) :
		function pofo_portfolio_archive_page_layout_right_sidebar_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_layout_column' )->value() == 'pofo_layout_right_sidebar' || $control->manager->get_setting( 'pofo_portfolio_archive_page_layout_column' )->value() == 'pofo_layout_both_sidebar' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Archive Right Sidebar */

	/* Archive Container Setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_container_style', array(
		'default' 			=> 'container',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_container_style', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_container_style',
		'type'              => 'select',
		'choices'           => array(
								    'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo' ),
									'container' => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Archive Container Setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_archive_page_list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_archive_page_list_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Portfolio List Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'   		=> 'pofo_portfolio_archive_page_list_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Portfolio Archive Style setting */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_premade_style', array(
		'default' 			=> 'portfolio-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_portfolio_archive_page_premade_style', array(
		'label'       		=> esc_attr__( 'Portfolio List Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_premade_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'portfolio-style-1'		=> esc_html__( 'Portfolio Overlay Style 1', 'pofo' ),
								    'portfolio-style-2' 	=> esc_html__( 'Portfolio Overlay Style 2', 'pofo' ),
								    'portfolio-style-3'		=> esc_html__( 'Portfolio Image Gallery', 'pofo' ),
								    'portfolio-style-4'		=> esc_html__( 'Portfolio Full Overlay', 'pofo' ),
								    'portfolio-style-5'		=> esc_html__( 'Portfolio Inner Overlay', 'pofo' ),
								    'portfolio-style-6'		=> esc_html__( 'Portfolio Overlay With Icon', 'pofo' ),
								    'portfolio-style-7'		=> esc_html__( 'Portfolio Transform', 'pofo' ),
								    'portfolio-style-8'		=> esc_html__( 'Portfolio Zooming', 'pofo' ),
								    'portfolio-style-9'		=> esc_html__( 'Portfolio Justified Gallery', 'pofo' ),
								    'portfolio-style-10'	=> esc_html__( 'Portfolio Fancy Overlay With Icon', 'pofo' ),
								    'portfolio-style-11'	=> esc_html__( 'Portfolio Overlay Style 3', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/portfolio-style-1.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-2.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-3.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-4.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-5.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-6.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-7.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-8.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-9.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-10.jpg',
								  	POFO_THEME_IMAGES_URI . '/portfolio-style-11.jpg',
							   ),
		'pofo_columns'    	=> '1',
	) ) );

	/* End Portfolio Archive Style setting */

	/* Portfolio Archive Column Type Setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_column', array(
		'default' 			=> '2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_portfolio_archive_page_column', array(
		'label'       		=> esc_attr__( 'Column Type', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_column',
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
		'active_callback'   => 'pofo_portfolio_archive_page_column_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_column_callback' ) ) :
		function pofo_portfolio_archive_page_column_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Column Type Setting */

	/* Portfolio Archive Spacing Between Columns */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_spacing_between_columns', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_portfolio_archive_page_spacing_between_columns', array(
		'label'       		=> esc_attr__( 'Spacing Between Columns', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_spacing_between_columns',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'' 					=> esc_html__( 'Gutter None', 'pofo' ),
									'gutter-very-small'	=> esc_html__( 'Gutter Very Small', 'pofo' ),
									'gutter-small'		=> esc_html__( 'Gutter Small', 'pofo' ),
									'gutter-medium'		=> esc_html__( 'Gutter Medium', 'pofo' ),
								    'gutter-large' 		=> esc_html__( 'Gutter Large', 'pofo' ),
								   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/no-gutter.jpg',
									POFO_THEME_IMAGES_URI . '/gutter-very-small.jpg',
								  	POFO_THEME_IMAGES_URI . '/gutter-small.jpg',
								  	POFO_THEME_IMAGES_URI . '/gutter-medium.jpg',
									POFO_THEME_IMAGES_URI . '/gutter-large.jpg',
							   ),
		'pofo_columns'    	=> '5',
		'active_callback'	=> 'pofo_portfolio_archive_page_spacing_between_columns_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_spacing_between_columns_callback' ) ) :
		function pofo_portfolio_archive_page_spacing_between_columns_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Spacing Between Columns */

	/* Portfolio Archive Show Portfolio Metro */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_portfolio_metro', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_portfolio_metro', array(
		'label'       		=> esc_attr__( 'Metro portfolio', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_portfolio_metro',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_portfolio_metro_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_portfolio_metro_callback' ) ) :
		function pofo_portfolio_archive_page_portfolio_metro_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Show Portfolio Metro */

	/* Portfolio Archive Double Grid Position setting */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_double_grid_position', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_double_grid_position', array(
		'label'       		=> esc_attr__( 'Metro grid positions', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_double_grid_position',
		'type'              => 'text',
		'description'		=> esc_html__( 'Please add grid position number with comma(,) separator. Like 2,6,7', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_double_grid_position_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_double_grid_position_callback' ) ) :
		function pofo_portfolio_archive_page_double_grid_position_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_portfolio_metro' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Double Grid Position setting */

	/* Archive Show Pagination setting */

	$wp_customize->add_setting( 'pofo_show_pagination_portfolio_archive', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_pagination_portfolio_archive', array(
		'label'       		=> esc_attr__( 'Pagination', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_show_pagination_portfolio_archive',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Archive Show Pagination setting */

	/* Archive Show Pagination setting */

	$wp_customize->add_setting( 'pofo_pagination_style_portfolio_archive', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_pagination_style_portfolio_archive', array(
		'label'       		=> esc_attr__( 'Pagination Style', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_pagination_style_portfolio_archive',
		'type'              => 'select',
		'choices'           => array(
									''	=> esc_html__( 'Select Pagination Style', 'pofo' ),
								    'number-pagination' 	=> esc_html__( 'Number', 'pofo' ),
								    'infinite-scroll-pagination'		=> esc_html__( 'Infinite scroll', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_pagination_style_portfolio_archive_callback',
	) ) );

	if ( ! function_exists( 'pofo_pagination_style_portfolio_archive_callback' ) ) :
	   	function pofo_pagination_style_portfolio_archive_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_pagination_portfolio_archive' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Archive Show Pagination setting */

	/* Archive Image srcset setting */

    $wp_customize->add_setting( 'pofo_image_srcset_portfolio_archive', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_image_srcset_portfolio_archive', array(
		'label'       		=> esc_attr__( 'Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_image_srcset_portfolio_archive',
	) ) );

	/* End Archive Type */

	/* Portfolio Archive Title */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_text', array(
		'default' 			=> 'portfolio',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_text', array(
		'label'       		=> esc_attr__( 'Portfolio Title', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_text',
		'type'              => 'text',
	) ) );

	/* End Portfolio Archive Title*/

	/* Portfolio Archive Show Title */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_show_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_show_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_show_title',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Portfolio Archive Show Title */

	/* Portfolio Archive Title Text Transform */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_text_transform', array(
		'label'       		=> esc_attr__( 'Title text case', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
								    'text-lowercase' 	=> esc_html__( 'Lowercase', 'pofo' ),
									'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
									'text-capitalize' 	=> esc_html__( 'Capitalize', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_title_text_transform_callback',
	) ) );

    if ( ! function_exists( 'pofo_portfolio_archive_page_title_text_transform_callback' ) ) :
		function pofo_portfolio_archive_page_title_text_transform_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_show_title' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Portfolio Archive Title Text Transform */

	/* Portfolio Archive Show Subtitle */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_show_subtitle', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_show_subtitle', array(
		'label'       		=> esc_attr__( 'Subtitle', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_show_subtitle',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Portfolio Archive Show Subtitle */

	/* Portfolio Archive Subtitle Text Transform */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_text_transform', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_text_transform', array(
		'label'       		=> esc_attr__( 'Subtitle text case', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_text_transform',
		'type'              => 'select',
		'choices'           => array(
								    'text-lowercase' => esc_html__( 'Lowercase', 'pofo' ),
									'text-uppercase' => esc_html__( 'Uppercase', 'pofo' ),
									'text-capitalize' => esc_html__( 'Capitalize', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_subtitle_text_transform_callback',
	) ) );

    if ( ! function_exists( 'pofo_portfolio_archive_page_subtitle_text_transform_callback' ) ) :
		function pofo_portfolio_archive_page_subtitle_text_transform_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_show_subtitle' )->value() != '0' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Subtitle Text Transform */

	/* Portfolio Archive Show Separator */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_show_separator', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_show_separator', array(
		'label'       		=> esc_attr__( 'Separator', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_show_separator',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_show_separator_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_show_separator_callback' ) ) :
		function pofo_portfolio_archive_page_show_separator_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-1' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-2' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-3' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-4' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-5' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Show Separator */

	/* Portfolio Archive Post link icon */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_show_internal', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_show_internal', array(
		'label'       		=> esc_attr__( 'Post link icon', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_show_internal',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_show_internal_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_show_internal_callback' ) ) :
		function pofo_portfolio_archive_page_show_internal_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-6' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-10' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Post link icon */

	/* Portfolio Archive Post image zoom icon */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_show_lightbox', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_show_lightbox', array(
		'label'       		=> esc_attr__( 'Lightbox Gallery', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_show_lightbox',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Portfolio Archive Post image zoom icon */

	/* Portfolio Archive Post image plus icon */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_image_plus_icon', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_image_plus_icon', array(
		'label'       		=> esc_attr__( 'Post image plus icon', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_image_plus_icon',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_show_image_plus_icon_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_show_image_plus_icon_callback' ) ) :
		function pofo_portfolio_archive_page_show_image_plus_icon_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Post image plus icon */

	/* Portfolio Archive Height */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_justified_height', array(
		'default' 			=> '400',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_justified_height', array(
		'label'       		=> esc_attr__( 'Height', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_justified_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define height like 400', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_justified_callback',
	) ) );

	/* End Portfolio Archive Height */

	/* Portfolio Archive Gap */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_gap', array(
		'default' 			=> '10',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_gap', array(
		'label'       		=> esc_attr__( 'Spacing between columns', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_gap',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define spacing between columns like 10', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_justified_callback',
	) ) );

	/* End Portfolio Archive Gap */

	if ( ! function_exists( 'pofo_portfolio_archive_page_justified_callback' ) ) :
		function pofo_portfolio_archive_page_justified_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* Portfolio Archive Post image plus icon */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_zoom_on_hover', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_zoom_on_hover', array(
		'label'       		=> esc_attr__( 'Zoom Effect On Hover', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_zoom_on_hover',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_portfolio_archive_page_zoom_on_hover_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_zoom_on_hover_callback' ) ) :
		function pofo_portfolio_archive_page_zoom_on_hover_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-1' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-2' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-5' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-8' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-10' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Post image plus icon */

	/* Portfolio Archive Opacity */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_opacity', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_opacity', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_opacity',
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
		'active_callback' 	=> 'pofo_portfolio_archive_page_opacity_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_opacity_callback' ) ) :
		function pofo_portfolio_archive_page_opacity_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-1' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-2' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-3' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-4' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-5' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-6' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-10' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-11'  ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Opacity */

	/* Portfolio Archive Animation setting */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_animation', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Animation_Control( $wp_customize, 'pofo_portfolio_archive_page_animation', array(
		'label'       		=> esc_attr__( 'CSS animation', 'pofo' ),
		'type'              => 'pofo_animation_style',
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_animation',
	) ) );

	/* End Portfolio Archive Animation setting */

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_archive_page_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'   		=> 'pofo_portfolio_archive_page_title_typography',
	    'active_callback'	=> 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_title_typography_callback' ) ) :
	   	function pofo_portfolio_archive_page_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_show_title' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Portfolio Archive Title Font Size */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Font Size */

	/* Portfolio Archive Title Line Height */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Line Height */

	/* Portfolio Archive Title Letter Spacing */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Letter Spacing */

	/* Portfolio Archive Title Font Weight */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_font_weight',
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
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Font Weight */

	/* Portfolio Archive Font Italic */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_font_italic', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_title_font_italic', array(
		'label'       		=> esc_attr__( 'Font Italic', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_font_italic',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Font Italic */

	/* Portfolio Archive Font Underline */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_font_underline', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_title_font_underline', array(
		'label'       		=> esc_attr__( 'Font Underline', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_font_underline',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Font Underline */

	/* Portfolio Archive Title Element Tag */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_title_element_tag', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_title_element_tag', array(
		'label'       		=> esc_attr__( 'Element Tag', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_element_tag',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'Select Element Tag', 'pofo'),
									'h1' => esc_html__( 'H1', 'pofo'),
									'h2' => esc_html__( 'H2', 'pofo'),
									'h3' => esc_html__( 'H3', 'pofo'),
									'h4' => esc_html__( 'H4', 'pofo'),
									'h5' => esc_html__( 'H5', 'pofo'),
									'h6' => esc_html__( 'H6', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Element Tag */

	//Color

	/* Portfolio Archive Title Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_title_color', array(
	    'label'      		=> esc_attr__( 'Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_title_color',
	    'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Color */

	/* Portfolio Archive Hover Title Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_title_hover_color', array(
	    'label'      		=> esc_attr__( 'Hover Title Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_title_hover_color',
	    'active_callback'	=> 'pofo_portfolio_archive_page_title_hover_color_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_title_hover_color_callback' ) ) :
		function pofo_portfolio_archive_page_title_hover_color_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-11' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Hover Title Color */

	/* Portfolio Archive Title Auto Responsive Font Size */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_title_auto_responsive_font_size', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_title_auto_responsive_font_size', array(
		'label'       		=> esc_attr__( 'Auto Responsive Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_title_auto_responsive_font_size',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'description'       => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Portfolio Archive Title Auto Responsive Font Size */

	/* Subtitle Typography Separator setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_typography', array(
	    'label'      		=> esc_attr__( 'Subtitle Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'   		=> 'pofo_portfolio_archive_page_subtitle_typography',
	    'active_callback'	=> 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_subtitle_typography_callback' ) ) :
	   	function pofo_portfolio_archive_page_subtitle_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_show_subtitle' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Subtitle Typography Separator setting */

	/* Portfolio Archive Title Font Size */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_font_size', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_font_size',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define font size like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive Title Font Size */

	/* Portfolio Archive Title Line Height */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_line_height', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_line_height',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive Title Line Height */

	/* Portfolio Archive Title Letter Spacing */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_letter_spacing', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_letter_spacing',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define letter spacing like 12px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive Title Letter Spacing */

	/* Portfolio Archive Title Font Weight */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_font_weight', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_font_weight', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_font_weight',
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
		'active_callback'   => 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive Title Font Weight */


	/* Portfolio Archive Subtitle Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_color', array(
	    'label'      		=> esc_attr__( 'Subtitle Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_subtitle_color',
	    'active_callback'	=> 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive subtitle Color */

	/* Portfolio Archive Subtitle Auto Responsive Font Size */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_subtitle_auto_responsive_font_size', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_subtitle_auto_responsive_font_size', array(
		'label'       		=> esc_attr__( 'Auto Responsive Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_subtitle_auto_responsive_font_size',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_subtitle_typography_callback',
	) ) );

	/* End Portfolio Archive Title Auto Responsive Font Size */

	/* Style Separator Setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_archive_page_style', array(
	    'label'      		=> esc_attr__( 'Style', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'   		=> 'pofo_portfolio_archive_page_style',
	    //'active_callback'	=> 'pofo_portfolio_archive_page_title_typography_callback',
	) ) );

	/* End Style Separator Setting */

	/* Portfolio Archive Separator Thickness */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_separator_thickness', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_separator_thickness', array(
		'label'       		=> esc_attr__( 'Separator Thickness', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_separator_thickness',
		'type'              => 'text',
		'description'		=> esc_html__( 'Define custom separator thickness in px like 2px', 'pofo' ),
		'active_callback'   => 'pofo_portfolio_archive_page_separator_thickness_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_separator_thickness_callback' ) ) :
		function pofo_portfolio_archive_page_separator_thickness_callback( $control ) {
	        if ( ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-1' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-2' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-4' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-3' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-5' ) && $control->manager->get_setting( 'pofo_portfolio_archive_page_show_separator' )->value() == 1 ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Separator Thickness */

	/* Portfolio Archive Separator Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_separator_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_separator_color', array(
	    'label'      		=> esc_attr__( 'Separator Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_separator_color',
	    'active_callback'	=> 'pofo_portfolio_archive_page_separator_thickness_callback',
	) ) );

	/* End Portfolio Archive Separator Color */

	/* Portfolio Archive Box Hover Background Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_box_hover_background_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_box_hover_background_color', array(
	    'label'      		=> esc_attr__( 'Box Hover Background Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_box_hover_background_color',
	    'active_callback'	=> 'pofo_portfolio_archive_page_box_hover_background_color_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_box_hover_background_color_callback' ) ) :
		function pofo_portfolio_archive_page_box_hover_background_color_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-7' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Box Hover Background Color */

	/* Portfolio Archive plus icon Color */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_portfolio_archive_page_icon_color', array(
	    'label'      		=> esc_attr__( 'Icon Color', 'pofo' ),
	    'section'    		=> 'pofo_add_portfolio_archive_layout_panel',
	    'settings'	 		=> 'pofo_portfolio_archive_page_icon_color',
	    'active_callback'	=> 'pofo_portfolio_archive_page_caption_icon_color_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_caption_icon_color_callback' ) ) :
		function pofo_portfolio_archive_page_caption_icon_color_callback( $control ) {
	        if ( ( $control->manager->get_setting( 'pofo_portfolio_archive_page_image_plus_icon' )->value() == '1' && $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-8' ) || ( $control->manager->get_setting( 'pofo_portfolio_archive_page_show_lightbox' )->value() == '1' && $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-3' ) ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive plus icon Color */

	/* Portfolio Archive Alignment Setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_alignment_setting', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_alignment_setting', array(
		'label'       		=> esc_attr__( 'Alignment', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_alignment_setting',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_alignment_setting_callback',
	) ) );

    

    if ( ! function_exists( 'pofo_portfolio_archive_page_alignment_setting_callback' ) ) :
		function pofo_portfolio_archive_page_alignment_setting_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Alignment Setting */

	/* Portfolio Archive Desktop Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_desktop_alignment', array(
		'default' 			=> 'text-left',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_desktop_alignment', array(
		'label'       		=> esc_attr__( 'Alignment in desktop', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_desktop_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' 			 => esc_html__( 'No Align', 'pofo'),
									'text-left'  => esc_html__( 'Left Align', 'pofo'),
									'text-right' => esc_html__( 'Right Align', 'pofo'),
									'text-center'=> esc_html__( 'Center Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_alignment_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_alignment_callback' ) ) :
		function pofo_portfolio_archive_page_alignment_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' && $control->manager->get_setting( 'pofo_portfolio_archive_page_alignment_setting' )->value() != 0 ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Desktop Alignment */

	/* Portfolio Archive Desktop Mini Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_desktop_mini_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_desktop_mini_alignment', array(
		'label'       		=> esc_attr__( 'Alignment in mini desktop', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_desktop_mini_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' 			 => esc_html__( 'No Align', 'pofo'),
									'md-text-left'  => esc_html__( 'Left Align', 'pofo'),
									'md-text-right' => esc_html__( 'Right Align', 'pofo'),
									'md-text-center'=> esc_html__( 'Center Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_alignment_callback',
	) ) );

	/* End Portfolio Archive Desktop Mini Alignment */

	/* Portfolio Archive iPad/Tablet Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_ipad_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_ipad_alignment', array(
		'label'       		=> esc_attr__( 'Alignment in tablet', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_ipad_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' 			 => esc_html__( 'No Align', 'pofo'),
									'sm-text-left'  => esc_html__( 'Left Align', 'pofo'),
									'sm-text-right' => esc_html__( 'Right Align', 'pofo'),
									'sm-text-center'=> esc_html__( 'Center Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_alignment_callback',
	) ) );

	/* End Portfolio Archive iPad/Tablet Alignment */

	/* Portfolio Archive Mobile Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_mobile_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_mobile_alignment', array(
		'label'       		=> esc_attr__( 'Alignment in mobile', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_mobile_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' 			 => esc_html__( 'No Align', 'pofo'),
									'xs-text-left'  => esc_html__( 'Left Align', 'pofo'),
									'xs-text-right' => esc_html__( 'Right Align', 'pofo'),
									'xs-text-center'=> esc_html__( 'Center Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_alignment_callback',
	) ) );

	/* End Portfolio Archive Mobile Alignment */

	/* Portfolio Archive Vertical Alignment Setting */

	$wp_customize->add_setting( 'pofo_portfolio_archive_page_vertical_alignment_setting', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_portfolio_archive_page_vertical_alignment_setting', array(
		'label'       		=> esc_attr__( 'Vertical Alignment', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_vertical_alignment_setting',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_vertical_alignment_setting_callback',
	) ) );

    

    if ( ! function_exists( 'pofo_portfolio_archive_page_vertical_alignment_setting_callback' ) ) :
		function pofo_portfolio_archive_page_vertical_alignment_setting_callback( $control ) {
	        if ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() != 'portfolio-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Vertical Alignment Setting */

	/* Portfolio Archive Desktop Vertical Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_desktop_vertical_alignment', array(
		'default' 			=> 'vertical-align-bottom',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_desktop_vertical_alignment', array(
		'label'       		=> esc_attr__( 'Vertical alignment in desktop', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_desktop_vertical_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'No Align', 'pofo'),
									'vertical-align-top' => esc_html__( 'Top Align', 'pofo'),
									'vertical-align-middle' => esc_html__( 'Middle Align', 'pofo'),
									'vertical-align-bottom' => esc_html__( 'Bottom Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_vertical_alignment_callback',
	) ) );

	if ( ! function_exists( 'pofo_portfolio_archive_page_vertical_alignment_callback' ) ) :
		function pofo_portfolio_archive_page_vertical_alignment_callback( $control ) {
	        if ( ( $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-1' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-2' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-3' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-4' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-5' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-6' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-7' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-8' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-10' || $control->manager->get_setting( 'pofo_portfolio_archive_page_premade_style' )->value() == 'portfolio-style-11' ) && $control->manager->get_setting( 'pofo_portfolio_archive_page_vertical_alignment_setting' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }  
		}
	endif;

	/* End Portfolio Archive Desktop Vertical Alignment */

	/* Portfolio Archive Mini Desktop Vertical Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_mini_desktop_vertical_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_mini_desktop_vertical_alignment', array(
		'label'       		=> esc_attr__( 'Vertical alignment in mini desktop', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_mini_desktop_vertical_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'No Align', 'pofo'),
									'md-vertical-align-top' => esc_html__( 'Top Align', 'pofo'),
									'md-vertical-align-middle' => esc_html__( 'Middle Align', 'pofo'),
									'md-vertical-align-bottom' => esc_html__( 'Bottom Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_vertical_alignment_callback',
	) ) );

	/* End Portfolio Archive Mini Desktop Vertical Alignment */

	/* Portfolio Archive iPad/Tablet Vertical Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_ipad_vertical_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_ipad_vertical_alignment', array(
		'label'       		=> esc_attr__( 'Vertical alignment in tablet', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_ipad_vertical_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'No Align', 'pofo'),
									'sm-vertical-align-top' => esc_html__( 'Top Align', 'pofo'),
									'sm-vertical-align-middle' => esc_html__( 'Middle Align', 'pofo'),
									'sm-vertical-align-bottom' => esc_html__( 'Bottom Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_vertical_alignment_callback',
	) ) );

	/* End Portfolio Archive iPad/Tablet Vertical Alignment */

	/* Portfolio Archive Mobile Vertical Alignment */

    $wp_customize->add_setting( 'pofo_portfolio_archive_page_mobile_vertical_alignment', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_portfolio_archive_page_mobile_vertical_alignment', array(
		'label'       		=> esc_attr__( 'Vertical alignment in mobile', 'pofo' ),
		'section'     		=> 'pofo_add_portfolio_archive_layout_panel',
		'settings'			=> 'pofo_portfolio_archive_page_mobile_vertical_alignment',
		'type'              => 'select',
		'choices'           => array(
									'' => esc_html__( 'No Align', 'pofo'),
									'xs-vertical-align-top' => esc_html__( 'Top Align', 'pofo'),
									'xs-vertical-align-middle' => esc_html__( 'Middle Align', 'pofo'),
									'xs-vertical-align-bottom' => esc_html__( 'Bottom Align', 'pofo'),
							   ),
		'active_callback'   => 'pofo_portfolio_archive_page_vertical_alignment_callback',
	) ) );

	/* End Portfolio Archive Mobile Vertical Alignment */