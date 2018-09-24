<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_default_title_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_default_title_separator', array(
	    'label'      		=> esc_attr__( 'Title Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'   		=> 'pofo_general_default_title_separator',	    
	) ) );

	/* End Separator Settings */

  	/* Start Disable Default Title */

    $wp_customize->add_setting( 'pofo_disable_default_title', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_default_title', array(
		'label'       		=> esc_attr__( 'Title', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_disable_default_title',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Default Title */

	/* Default Title Layout Style */

    $wp_customize->add_setting( 'pofo_default_title_style', array(
		'default' 			=> 'page-title-style-9',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_default_title_style', array(
		'label'       		=> esc_attr__( 'Style', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'page-title-style-1'   => esc_html__( 'Page Title Style 1', 'pofo' ),
								    'page-title-style-2'   => esc_html__( 'Page Title Style 2', 'pofo' ),
								    'page-title-style-3'   => esc_html__( 'Page Title Style 3', 'pofo' ),
								    'page-title-style-4'   => esc_html__( 'Page Title Style 4', 'pofo' ),
								    'page-title-style-5'   => esc_html__( 'Page Title Style 5', 'pofo' ),
								    'page-title-style-6'   => esc_html__( 'Page Title Style 6', 'pofo' ),
								    'page-title-style-7'   => esc_html__( 'Page Title Style 7', 'pofo' ),
								    'page-title-style-8'   => esc_html__( 'Page Title Style 8', 'pofo' ),
								    'page-title-style-9'   => esc_html__( 'Page Title Style 9', 'pofo' ),
								    'page-title-style-10'   => esc_html__( 'Page Title Style 10', 'pofo' ),
							   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/page-title-style-1.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-2.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-3.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-4.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-5.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-6.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-7.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-8.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-9.jpg',
								  	POFO_THEME_IMAGES_URI . '/page-title-style-10.jpg',
							   ),
		'pofo_columns'    	=> '1',
	) ) );
   
  	/* End Default Title Style */

  	/* Title Text Transform setting */

    $wp_customize->add_setting( 'pofo_default_title_text_transform', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_title_text_transform', array(
		'label'       		=> esc_attr__( 'Text Case', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_text_transform',
		'type'              => 'select',
		'choices'           => array(
									''		=> esc_html__( 'Select Title Text Transform', 'pofo' ),
								    'text-uppercase' 	=> esc_html__( 'Uppercase', 'pofo' ),
								    'text-lowercase'	=> esc_html__( 'Lowercase', 'pofo' ),
								    'text-capitalize'	=> esc_html__( 'Capitalize', 'pofo' ),
								    'text-normal'	=> esc_html__( 'Normal', 'pofo' ),
								   ),
	) ) );

	/* End Title Text Transform setting */

	/* Subtitle */

	$wp_customize->add_setting( 'pofo_default_title_subtitle', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_subtitle', array(
	    'label'      		=> esc_attr__( 'Subtitle', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_subtitle',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'pofo_default_title_subtitle_callback',
	) );

	/* End Subtitle */

	/* Default Title BG Image */

    $wp_customize->add_setting( 'pofo_default_title_bg_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_default_title_bg_image', array(
		'label'       		=> esc_attr__( 'Background Image', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_bg_image',
		'description'       => esc_html__( 'Recommended image size is 1920px X 1200px.', 'pofo' ),
		'active_callback' 	=> 'pofo_default_title_image_callback',
	) ) );

	/* End Default Title BG Image */

	/* Default Title Image srcset setting */

    $wp_customize->add_setting( 'pofo_default_title_image_srcset', array(
		'default' 			=> 'full',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Image_SRCSET_Control( $wp_customize, 'pofo_default_title_image_srcset', array(
		'label'       		=> esc_attr__( 'Thumbnail Size', 'pofo' ),
		'type'              => 'pofo_image_srcset',
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_image_srcset',
		'active_callback' 	=> 'pofo_default_title_image_callback',
	) ) );

	/* End Default Title Image srcset */

	/* Default Title Multiple Image */

    $wp_customize->add_setting( 'pofo_default_title_bg_multiple_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Multiple_Image( $wp_customize, 'pofo_default_title_bg_multiple_image', array(
		'label'       		=> esc_attr__( 'Background Gallery Images ', 'pofo' ),
		'type'              => 'pofo_multiple_image',
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_bg_multiple_image',
		'active_callback' 	=> 'pofo_default_title_slider_callback',
	) ) );

	/* End Default Title Multiple Image */

	/* Start Default Title Scroll to */

    $wp_customize->add_setting( 'pofo_default_title_scroll_to_down', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_default_title_scroll_to_down', array(
		'label'       		=> esc_attr__( 'Scroll To Down', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_scroll_to_down',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback' 	=> 'pofo_default_title_callto_action_callback',
	) ) );

	/* End Default Title Scroll to */

	/* Section id */

	$wp_customize->add_setting( 'pofo_default_title_callto_section_id', array(
		'default' 			=> '#about',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_callto_section_id', array(
	    'label'      		=> esc_attr__( 'Next Section ID', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_callto_section_id',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'pofo_default_title_callto_action_id_callback',
	) );

	/* End Section id */

	/* Start Default Title Video Type */

    $wp_customize->add_setting( 'pofo_default_title_video_type', array(
		'default' 			=> 'self',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_default_title_video_type', array(
		'label'       		=> esc_attr__( 'Video Type', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_video_type',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'self' => esc_html__( 'Self', 'pofo' ),
								  	'external' => esc_html__( 'External', 'pofo' ),
							   ),
		'active_callback' 	=> 'pofo_default_title_video_callback',
	) ) );

	/* End Default Title Video Type */

	/* MP4 */

	$wp_customize->add_setting( 'pofo_default_title_video_mp4', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_video_mp4', array(
	    'label'      		=> esc_attr__( 'MP4', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_video_mp4',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'pofo_default_title_video_self_callback',
	) );

	/* End MP4 */

	/* OGG */

	$wp_customize->add_setting( 'pofo_default_title_video_ogg', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_video_ogg', array(
	    'label'      		=> esc_attr__( 'OGG', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_video_ogg',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'pofo_default_title_video_self_callback',
	) );

	/* End OGG */

	/* WEBM */

	$wp_customize->add_setting( 'pofo_default_title_video_webm', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_video_webm', array(
	    'label'      		=> esc_attr__( 'WEBM', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_video_webm',
	    'type'       		=> 'text',
	    'active_callback' 	=> 'pofo_default_title_video_self_callback',
	) );

	/* End WEBM */

	/* Start loop */

    $wp_customize->add_setting( 'pofo_default_loop_video', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_default_loop_video', array(
		'label'       		=> esc_attr__( 'Loop', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_loop_video',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback' 	=> 'pofo_default_title_video_self_callback',
	) ) );

	/* End loop */

	/* Start mute */

    $wp_customize->add_setting( 'pofo_default_mute_video', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_default_mute_video', array(
		'label'       		=> esc_attr__( 'Mute', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_mute_video',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
		'active_callback' 	=> 'pofo_default_title_video_self_callback',
	) ) );

	/* End mute */

	/* Youtube */

	$wp_customize->add_setting( 'pofo_default_title_video_youtube', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_default_title_video_youtube', array(
	    'label'      		=> esc_attr__( 'Youtube / Vimeo', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_video_youtube',
	    'type'       		=> 'text',
	    'description'       => esc_html__( 'Click here for more information on video ID / embed URL and setting parameters.', 'pofo' ),
	    'active_callback' 	=> 'pofo_default_title_video_external_callback',
	) );

	/* End Youtube */

	/* Default Title Parallax Effect */

    $wp_customize->add_setting( 'pofo_default_title_parallax_effect', array(
		'default' 			=> '0.5',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_title_parallax_effect', array(
		'label'       		=> esc_attr__( 'Parallax Effect', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_parallax_effect',
		'type'              => 'select',
		'choices'           => array(
									'no-parallax'   => esc_html__( 'No Parallax', 'pofo' ),
									'0.1'   => esc_html__( 'Parallax Effect 1', 'pofo' ),
								    '0.2'   => esc_html__( 'Parallax Effect 2', 'pofo' ),
								    '0.3'   => esc_html__( 'Parallax Effect 3', 'pofo' ),
								    '0.4'   => esc_html__( 'Parallax Effect 4', 'pofo' ),
								    '0.5'   => esc_html__( 'Parallax Effect 5', 'pofo' ),
								    '0.6'   => esc_html__( 'Parallax Effect 6', 'pofo' ),
								    '0.7'   => esc_html__( 'Parallax Effect 7', 'pofo' ),
								    '0.8'   => esc_html__( 'Parallax Effect 8', 'pofo' ),
								    '0.9'   => esc_html__( 'Parallax Effect 9', 'pofo' ),
								    '1.0'   => esc_html__( 'Parallax Effect 10', 'pofo' ),
							   ),
		'active_callback' 	=> 'pofo_default_title_image_callback',
	) ) );
   
  	/* End Default Title Parallax Effect */

  	/* Default Title Opacity */

    $wp_customize->add_setting( 'pofo_default_title_opacity', array(
		'default' 			=> '0.7',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_title_opacity', array(
		'label'       		=> esc_attr__( 'Opacity', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_opacity',
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
		'active_callback' 	=> 'pofo_default_title_image_opacity_callback',
	) ) );
   
  	/* End Default Title Opacity */

  	/* Default Title Breadcrumb color setting */

	$wp_customize->add_setting( 'pofo_default_title_opacity_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_opacity_color', array(
	    'label'      		=> esc_attr__( 'Opacity Color', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_opacity_color',
	    'active_callback' 	=> 'pofo_default_title_image_opacity_callback',
	) ) );

	/* End Default Title Breadcrumb color setting */

	/* Start Disable Breadcrumb */

    $wp_customize->add_setting( 'pofo_default_disable_breadcrumb', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_default_disable_breadcrumb', array(
		'label'       		=> esc_attr__( 'Breadcrumb', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_disable_breadcrumb',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Breadcrumb */

	/* Title Section Top Space */

    $wp_customize->add_setting( 'pofo_default_title_top_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_title_top_section_space', array(
		'label'       		=> esc_attr__( 'Top Space ( In pixel )', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_top_section_space',
		'type'              => 'text',
	) ) );

	/* End Title Section Top Space */

	/* Title Section Bottom Space */

    $wp_customize->add_setting( 'pofo_default_title_bottom_section_space', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_default_title_bottom_section_space', array(
		'label'       		=> esc_attr__( 'Bottom Space ( In pixel )', 'pofo' ),
		'section'     		=> 'pofo_add_default_title_section',
		'settings'			=> 'pofo_default_title_bottom_section_space',
		'type'              => 'text',
	) ) );

	/* End Title Section Bottom Space */

	/* Default title Separator setting */

	$wp_customize->add_setting( 'pofo_default_title_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_default_title_separator', array(
	    'label'      		=> esc_attr__( 'Title Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'   		=> 'pofo_default_title_separator',
	) ) );

	/* End Default title Separator setting */

	/* Title Font Size */

    $wp_customize->add_setting( 'pofo_default_title_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_title_font_size', array(
        'label'             => esc_attr__( 'Title Font Size', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_title_font_size',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
    ) );

    /* End Title Font Size */

    /* Title Line Height */

    $wp_customize->add_setting( 'pofo_default_title_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_title_line_height', array(
        'label'             => esc_attr__( 'Title Line Height', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_title_line_height',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
    ) );

    /* End Title Line Height */

    /* Title Letter Spacing */

    $wp_customize->add_setting( 'pofo_default_title_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_title_letter_spacing', array(
        'label'             => esc_attr__( 'Title Letter Spacing', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_title_letter_spacing',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
    ) );

    /* End Title Letter Spacing */

    /* Subtitle Font Size */

    $wp_customize->add_setting( 'pofo_default_subtitle_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_subtitle_font_size', array(
        'label'             => esc_attr__( 'Subtitle Font Size', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_subtitle_font_size',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
    ) );

    /* End Subtitle Font Size */

    /* Subtitle Line Height */

    $wp_customize->add_setting( 'pofo_default_subtitle_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_subtitle_line_height', array(
        'label'             => esc_attr__( 'Subtitle Line Height', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_subtitle_line_height',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
    ) );

    /* End Subtitle Line Height */

    /* Subtitle Letter Spacing */

    $wp_customize->add_setting( 'pofo_default_subtitle_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_subtitle_letter_spacing', array(
        'label'             => esc_attr__( 'Subtitle Letter Spacing', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_subtitle_letter_spacing',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
    ) );

    /* End Subtitle Letter Spacing */

    /* Breadcrumb Font Size */

    $wp_customize->add_setting( 'pofo_default_breadcrumb_font_size', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_breadcrumb_font_size', array(
        'label'             => esc_attr__( 'Breadcrumb Font Size', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_breadcrumb_font_size',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
        'active_callback'   => 'pofo_default_title_breadcrumb_callback',
    ) );

    /* End Breadcrumb Font Size */

    /* Breadcrumb Line Height */

    $wp_customize->add_setting( 'pofo_default_breadcrumb_line_height', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_breadcrumb_line_height', array(
        'label'             => esc_attr__( 'Breadcrumb Line Height', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_breadcrumb_line_height',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 15px', 'pofo' ),
        'active_callback'   => 'pofo_default_title_breadcrumb_callback',
    ) );

    /* End Breadcrumb Line Height */

    /* Breadcrumb Letter Spacing */

    $wp_customize->add_setting( 'pofo_default_breadcrumb_letter_spacing', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'pofo_default_breadcrumb_letter_spacing', array(
        'label'             => esc_attr__( 'Breadcrumb Letter Spacing', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_breadcrumb_letter_spacing',
        'type'              => 'text',
        'description'       => esc_html__( 'In pixel like 1px', 'pofo' ),
        'active_callback'   => 'pofo_default_title_breadcrumb_callback',
    ) );

    /* End Breadcrumb Letter Spacing */

	/* Default Title color setting */

	$wp_customize->add_setting( 'pofo_default_title_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_bg_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_bg_color',
	) ) );

	/* End Default Title color setting */

	/* Default Title color setting */

	$wp_customize->add_setting( 'pofo_default_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_color', array(
	    'label'      		=> esc_attr__( 'Title Text', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_color',
	) ) );

	/* End Default Title color setting */

	/* Default Subtitle color setting */

	$wp_customize->add_setting( 'pofo_default_subtitle_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_subtitle_color', array(
	    'label'      		=> esc_attr__( 'Subtitle Text', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_subtitle_color',
	    'active_callback' 	=> 'pofo_default_title_subtitle_callback',
	) ) );

	/* End Default Subtitle color setting */

	/* Default Title Breadcrumb Background color setting */

    $wp_customize->add_setting( 'pofo_default_title_breadcrumb_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_breadcrumb_bg_color', array(
        'label'             => esc_attr__( 'Breadcrumb Background', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_title_breadcrumb_bg_color',
        'active_callback'   => 'pofo_default_title_breadcrumb_bg_callback',
    ) ) );

    /* End Default Title Breadcrumb Background color setting */

    /* Default Title Breadcrumb Border color setting */

    $wp_customize->add_setting( 'pofo_default_title_breadcrumb_border_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_breadcrumb_border_color', array(
        'label'             => esc_attr__( 'Breadcrumb Border', 'pofo' ),
        'section'           => 'pofo_add_default_title_section',
        'settings'          => 'pofo_default_title_breadcrumb_border_color',
        'active_callback'   => 'pofo_default_title_breadcrumb_bg_callback',
    ) ) );

    /* End Default Title Breadcrumb Border color setting */

	/* Default Title Breadcrumb color setting */

	$wp_customize->add_setting( 'pofo_default_title_breadcrumb_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_breadcrumb_color', array(
	    'label'      		=> esc_attr__( 'Breadcrumb Text', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_breadcrumb_color',
	    'active_callback' 	=> 'pofo_default_title_breadcrumb_callback',
	) ) );

	/* End Default Title Breadcrumb color setting */

	/* Default Title Breadcrumb color setting */

	$wp_customize->add_setting( 'pofo_default_title_breadcrumb_text_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_breadcrumb_text_hover_color', array(
	    'label'      		=> esc_attr__( 'Breadcrumb Text Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_breadcrumb_text_hover_color',
	    'active_callback' 	=> 'pofo_default_title_breadcrumb_callback',
	) ) );

	/* End Default Title Breadcrumb color setting */

	/* Default Title Icon Background setting */

	$wp_customize->add_setting( 'pofo_default_title_icon_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_icon_bg_color', array(
	    'label'      		=> esc_attr__( 'Icon Background', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_icon_bg_color',
	    'active_callback' 	=> 'pofo_default_title_callto_action_id_callback',
	) ) );

	/* End Default Title Icon Background color setting */

	/* Default Title Icon setting */

	$wp_customize->add_setting( 'pofo_default_title_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_default_title_icon_color', array(
	    'label'      		=> esc_attr__( 'Icon', 'pofo' ),
	    'section'    		=> 'pofo_add_default_title_section',
	    'settings'	 		=> 'pofo_default_title_icon_color',
	    'active_callback' 	=> 'pofo_default_title_callto_action_id_callback',
	) ) );

	/* End Default Title Icon color setting */

	/* Callback Functions */

	if ( ! function_exists( 'pofo_default_title_image_callback' ) ) :
		function pofo_default_title_image_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-4' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-5' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-6' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-8' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-10' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_image_opacity_callback' ) ) :
		function pofo_default_title_image_opacity_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-4' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-5' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-6' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-7' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-8' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-10' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_video_callback' ) ) :
		function pofo_default_title_video_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_video_self_callback' ) ) :
		function pofo_default_title_video_self_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_video_type' )->value() == 'self' && $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_video_external_callback' ) ) :
		function pofo_default_title_video_external_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_video_type' )->value() == 'external' && $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-8' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_slider_callback' ) ) :
		function pofo_default_title_slider_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-7' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_callto_action_callback' ) ) :
		function pofo_default_title_callto_action_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-7' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_callto_action_id_callback' ) ) :
		function pofo_default_title_callto_action_id_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_scroll_to_down' )->value() == '1' && $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-7' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_opacity_callback' ) ) :
		function pofo_default_title_opacity_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_opacity' )->value() != '' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_breadcrumb_callback' ) ) :
		function pofo_default_title_breadcrumb_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_disable_breadcrumb' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_default_title_breadcrumb_bg_callback' ) ) :
        function pofo_default_title_breadcrumb_bg_callback( $control ){
            if ( $control->manager->get_setting( 'pofo_default_disable_breadcrumb' )->value() == '1' && ( $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-3' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-4' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-5' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-6' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-7' || $control->manager->get_setting( 'pofo_default_title_style' )->value() == 'page-title-style-10' ) ) {
                return true;
            } else {
                return false;
            }
        }
    endif;

	if ( ! function_exists( 'pofo_default_title_subtitle_callback' ) ) :
		function pofo_default_title_subtitle_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_default_title_style' )->value() != 'page-title-style-9' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */
	 