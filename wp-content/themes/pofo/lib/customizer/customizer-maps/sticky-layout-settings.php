<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_default_post_list_style_data_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_post_list_style_data_separator', array(
	    'label'      		=> esc_attr__( 'Post List Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_sticky_layout_panel',
	    'settings'   		=> 'pofo_default_post_list_style_data_separator',	    
	) ) );

	/* End Separator Settings */

	/* Sticky Show Post Thumbnail setting */

	$wp_customize->add_setting( 'pofo_show_post_thumbnail_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_thumbnail_sticky', array(
		'label'       		=> esc_attr__( 'Post Thumbnail', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_thumbnail_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Post Thumbnail setting */

	/* Sticky Show Post Format Setting */

	$wp_customize->add_setting( 'pofo_show_post_format_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_format_sticky', array(
		'label'       		=> esc_attr__( 'Post Featured Image Only', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_format_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Post Format Setting */

	/* Sticky Image srcset setting */

    $wp_customize->add_setting( 'pofo_image_srcset_sticky', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_image_srcset_sticky', array(
		'label'       		=> esc_attr__( 'Post Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_image_srcset_sticky',
	) ) );

	/* End Sticky Type */

	/* Sticky Show Post Title setting */

	$wp_customize->add_setting( 'pofo_show_post_title_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_title_sticky', array(
		'label'       		=> esc_attr__( 'Post Title', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_title_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Post Title setting */

	/* Sticky Show Post Author setting */

	$wp_customize->add_setting( 'pofo_show_post_author_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_sticky', array(
		'label'       		=> esc_attr__( 'Post Author', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_author_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Post Author setting */

	/* Sticky Show Post Author Image setting */

	$wp_customize->add_setting( 'pofo_show_post_author_image_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_author_image_sticky', array(
		'label'       		=> esc_attr__( 'Post Author Image', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_author_image_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_show_post_author_default_callback'
	) ) );

	if ( ! function_exists( 'pofo_show_post_author_default_callback' ) ) :
   	function pofo_show_post_author_default_callback( $control )	{
        if ( $control->manager->get_setting( 'pofo_show_post_author_sticky' )->value() == '1') {
	        return true;
	    } else {
	    	return false;
	    }
	}
	endif;

	/* End Sticky Show Post Author Image setting */

	/* Sticky Show Post Date setting */

	$wp_customize->add_setting( 'pofo_show_post_date_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_post_date_sticky', array(
		'label'       		=> esc_attr__( 'Post Date', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_post_date_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Post Date setting */

	/* Sticky Date Format setting */

	$wp_customize->add_setting( 'pofo_date_format_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_date_format_sticky', array(
		'label'       		=> esc_attr__( 'Post Date Format', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_date_format_sticky',
		'type'              => 'text',
		'description'		=> sprintf( __( 'Date format should be like F j, Y <a target="_blank" href="%s">click here</a> to see other date formates.', 'pofo' ), '//codex.wordpress.org/Formatting_Date_and_Time' ),
		'active_callback'   => 'pofo_date_format_sticky_callback',
	) ) );

	if ( ! function_exists( 'pofo_date_format_sticky_callback' ) ) :
	   	function pofo_date_format_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_date_sticky' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Date Format setting */

	/* Sticky Show Excerpt setting */

	$wp_customize->add_setting( 'pofo_show_excerpt_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_excerpt_sticky', array(
		'label'       		=> esc_attr__( 'Post Excerpt', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_excerpt_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Excerpt setting */

	/* Sticky Excerpt Length setting */

    $wp_customize->add_setting( 'pofo_excerpt_length_sticky', array(
		'default' 			=> '35',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_excerpt_length_sticky', array(
		'label'       		=> esc_attr__( 'Excerpt Length', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_excerpt_length_sticky',
		'type'              => 'text',
		'active_callback'   => 'pofo_excerpt_length_sticky_callback',
	) ) );

	if ( ! function_exists( 'pofo_excerpt_length_sticky_callback' ) ) :
	   	function pofo_excerpt_length_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_sticky' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Excerpt Length setting */

	/* Sticky Show Content setting */

	$wp_customize->add_setting( 'pofo_show_content_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_content_sticky', array(
		'label'       		=> esc_attr__( 'Post Full Content', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_content_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'   => 'pofo_show_content_sticky_callback',
	) ) );

	if ( ! function_exists( 'pofo_show_content_sticky_callback' ) ) :
	   	function pofo_show_content_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_excerpt_sticky' )->value() == '0' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;
	/* End Sticky Show Content setting */

	/* Sticky Show Categories setting */

	$wp_customize->add_setting( 'pofo_show_category_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_category_sticky', array(
		'label'       		=> esc_attr__( 'Post Categories', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_category_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Categories setting */

	/* Sticky Show like setting */

	$wp_customize->add_setting( 'pofo_show_like_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_like_sticky', array(
		'label'       		=> esc_attr__( 'Post Likes', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_like_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show like setting */

	/* Sticky Show Comment setting */

	$wp_customize->add_setting( 'pofo_show_comment_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_comment_sticky', array(
		'label'       		=> esc_attr__( 'Post Comments', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_comment_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Comment setting */

	/* Sticky Show Button setting */

	$wp_customize->add_setting( 'pofo_show_button_sticky', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_show_button_sticky', array(
		'label'       		=> esc_attr__( 'Read More Button', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_show_button_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Sticky Show Button setting */

	/* Sticky Button Text setting */

	$wp_customize->add_setting( 'pofo_button_text_sticky', array(
		'default' 			=> 'continue reading',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_button_text_sticky', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_text_sticky',
		'type'              => 'text',
		'active_callback'	=> 'pofo_button_text_sticky_callback'
	) ) );

	if ( ! function_exists( 'pofo_button_text_sticky_callback' ) ) :
	   	function pofo_button_text_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Button Text setting */

	/* Default Show Box Border setting */

	$wp_customize->add_setting( 'pofo_box_enable_border_sticky', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_box_enable_border_sticky', array(
		'label'       		=> esc_attr__( 'Show Box Border', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_box_enable_border_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* Title Typography Separator setting */

	$wp_customize->add_setting( 'pofo_sticky_layout_separator_title_typography', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_sticky_layout_separator_title_typography', array(
	    'label'      		=> esc_attr__( 'Title Typography and Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_sticky_layout_panel',
	    'settings'   		=> 'pofo_sticky_layout_separator_title_typography',
	    'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	if ( ! function_exists( 'pofo_sticky_layout_title_typography_callback' ) ) :
	   	function pofo_sticky_layout_title_typography_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_post_title_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Title Typography Separator setting */

	/* Sticky Font Size setting */

	$wp_customize->add_setting( 'pofo_title_font_size_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_size_sticky', array(
		'label'       		=> esc_attr__( 'Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_font_size_sticky',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font Size setting */

	/* Sticky Line Height setting */

	$wp_customize->add_setting( 'pofo_title_line_height_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_line_height_sticky', array(
		'label'       		=> esc_attr__( 'Line Height', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_line_height_sticky',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Line Height setting */

	/* Sticky Letter Spacing setting */

	$wp_customize->add_setting( 'pofo_title_letter_spacing_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_letter_spacing_sticky', array(
		'label'       		=> esc_attr__( 'Letter Spacing', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_letter_spacing_sticky',
		'type'              => 'text',
		'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Letter Spacing setting */

	/* Sticky Font Weight setting */

    $wp_customize->add_setting( 'pofo_title_font_weight_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_title_font_weight_sticky', array(
		'label'       		=> esc_attr__( 'Font Weight', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_font_weight_sticky',
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
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font Weight setting */

	/* Sticky Font Italic setting */

	$wp_customize->add_setting( 'pofo_title_italic_sticky', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_italic_sticky', array(
		'label'       		=> esc_attr__( 'Italic', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_italic_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font Italic setting */

	/* Sticky Font Underline setting */

	$wp_customize->add_setting( 'pofo_title_underline_sticky', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_underline_sticky', array(
		'label'       		=> esc_attr__( 'Underline', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_underline_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Font Underline setting */

	/* Sticky Title Color setting */

	$wp_customize->add_setting( 'pofo_title_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_color_sticky', array(
		'label'       		=> esc_attr__( 'Title Color', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_color_sticky',
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Title Color setting */

	/* Sticky Title Hover Color setting */

	$wp_customize->add_setting( 'pofo_title_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_title_hover_color_sticky', array(
		'label'       		=> esc_attr__( 'Title Hover Color', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_hover_color_sticky',
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Title Hover Color setting */

	/* Sticky Auto Responsive Font Size setting */

	$wp_customize->add_setting( 'pofo_title_enable_responsive_font_sticky', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_title_enable_responsive_font_sticky', array(
		'label'       		=> esc_attr__( 'Auto Responsive Font Size', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_title_enable_responsive_font_sticky',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'description'       => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo' ),
		'active_callback'	=> 'pofo_sticky_layout_title_typography_callback',
	) ) );

	/* End Sticky Auto Responsive Font Size setting */


	/* Style Separator setting */

	$wp_customize->add_setting( 'pofo_sticky_layout_separator_style', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_sticky_layout_separator_style', array(
	    'label'      		=> esc_attr__( 'Post Meta and Button Colors', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_sticky_layout_panel',
	    'settings'   		=> 'pofo_sticky_layout_separator_style',
	) ) );

	/* End Style Separator setting */

	/* Sticky Post Box Background Color setting */

	$wp_customize->add_setting( 'pofo_box_bg_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_bg_color_sticky', array(
		'label'       		=> esc_attr__( 'Box Background', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_box_bg_color_sticky',
	) ) );

	/* Sticky Post Meta Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_color_sticky', array(
		'label'       		=> esc_attr__( 'Post Meta', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_post_meta_color_sticky',
	) ) );

	/* End Sticky Post Meta Color setting */

	/* Sticky Post Meta Hover Color setting */

	$wp_customize->add_setting( 'pofo_post_meta_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_post_meta_hover_color_sticky', array(
		'label'       		=> esc_attr__( 'Post Meta Hover', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_post_meta_hover_color_sticky',
	) ) );

	/* End Sticky Post Meta Hover Color setting */

	/* Sticky Box Border Color setting */

	$wp_customize->add_setting( 'pofo_box_border_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_box_border_color_sticky', array(
		'label'       		=> esc_attr__( 'Box Border Color', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_box_border_color_sticky',
		'active_callback'	=> 'pofo_box_border_color_sticky_callback',
	) ) );

    if ( ! function_exists( 'pofo_box_border_color_sticky_callback' ) ) :
	   	function pofo_box_border_color_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_box_enable_border_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Box Border Color setting */

	/* Sticky Box Border Size setting */

	$wp_customize->add_setting( 'pofo_box_border_size_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_size_sticky', array(
		'label'       		=> esc_attr__( 'Box Border Size', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_box_border_size_sticky',
		'type'              => 'text',
		'active_callback'	=> 'pofo_box_border_color_sticky_callback',
	) ) );

	/* End Sticky Box Border Size setting */

	/* Sticky Box Border Type Transform setting */

    $wp_customize->add_setting( 'pofo_box_border_type_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_box_border_type_sticky', array(
		'label'       		=> esc_attr__( 'Box Border Type', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_box_border_type_sticky',
		'type'              => 'select',
		'choices'           => array(
									''			=> esc_html__( 'Select Border Type', 'pofo' ),
								    'dotted' 	=> esc_html__( 'Dotted', 'pofo' ),
								    'dashed'	=> esc_html__( 'Dashed', 'pofo' ),
								    'solid'		=> esc_html__( 'Solid', 'pofo' ),
								    'double'	=> esc_html__( 'Double', 'pofo' ),
								   ),
		'active_callback'	=> 'pofo_box_border_color_sticky_callback',
	) ) );

	/* Sticky Button Color setting */

	$wp_customize->add_setting( 'pofo_button_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_color_sticky', array(
		'label'       		=> esc_attr__( 'Button', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_color_sticky',
		'active_callback'	=> 'pofo_button_color_sticky_callback',
	) ) );

    if ( ! function_exists( 'pofo_button_color_sticky_callback' ) ) :
	   	function pofo_button_color_sticky_callback( $control )	{
	        if ( $control->manager->get_setting( 'pofo_show_button_sticky' )->value() == '1') {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Sticky Button Color setting */

	/* Sticky Button Hover Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_color_sticky', array(
		'label'       		=> esc_attr__( 'Button Hover', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_hover_color_sticky',
		'active_callback'	=> 'pofo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Hover Color setting */

	/* Sticky Button Text Color setting */

	$wp_customize->add_setting( 'pofo_button_text_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_text_color_sticky', array(
		'label'       		=> esc_attr__( 'Button Text', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_text_color_sticky',
		'active_callback'	=> 'pofo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Text Color setting */

	/* Sticky Button Hover Text Color setting */

	$wp_customize->add_setting( 'pofo_button_hover_text_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_hover_text_color_sticky', array(
		'label'       		=> esc_attr__( 'Button Text Hover', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_hover_text_color_sticky',
		'active_callback'	=> 'pofo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Hover Text Color setting */

	/* Sticky Button Border Color setting */

	$wp_customize->add_setting( 'pofo_button_border_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_button_border_color_sticky', array(
		'label'       		=> esc_attr__( 'Button Border', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_button_border_color_sticky',
		'active_callback'	=> 'pofo_button_color_sticky_callback',
	) ) );

	/* End Sticky Button Border Color setting */

	/* Sticky Box Border Color setting */

	$wp_customize->add_setting( 'pofo_meta_border_color_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr',
		'transport'         => 'postMessage'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_meta_border_color_sticky', array(
		'label'       		=> esc_attr__( 'Meta Border Color', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_meta_border_color_sticky',
	) ) );

	/* Sticky Post Title Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_title_text_transform_sticky', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_title_text_transform_sticky', array(
		'label'       		=> esc_attr__( 'Post Title Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_blog_post_title_text_transform_sticky',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Title Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Sticky Post Title Text Transform setting */

	/* Sticky Post Meta Text Transform setting */

    $wp_customize->add_setting( 'pofo_blog_post_meta_text_transform_sticky', array(
		'default' 			=> 'text-uppercase',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_blog_post_meta_text_transform_sticky', array(
		'label'       		=> esc_attr__( 'Post Meta Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_sticky_layout_panel',
		'settings'			=> 'pofo_blog_post_meta_text_transform_sticky',
		'type'              => 'select',
		'choices'           => array(
									''					=> esc_html__( 'Select Post Meta Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								   ),
	) ) );

	/* End Sticky Post Meta Text Transform setting */