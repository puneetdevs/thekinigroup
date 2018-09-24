<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	// Get All Register Sidebar List.
	$pofo_sidebar_array = pofo_register_sidebar_customizer_array();

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_footer_wrapper_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_footer_wrapper_separator', array(
	    'label'      		=> esc_attr__( 'Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'   		=> 'pofo_general_footer_wrapper_separator',	    
	) ) );

	/* End Separator Settings */

	/* Start Disable Footer Wrapper */

    $wp_customize->add_setting( 'pofo_disable_footer_wrapper', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_footer_wrapper', array(
		'label'       		=> esc_attr__( 'Footer Wrapper', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_disable_footer_wrapper',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Footer Wrapper */

	/* Start Footer Wrapper Style */

    $wp_customize->add_setting( 'pofo_footer_wrapper_style', array(
		'default' 			=> 'footer-wrapper-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_footer_wrapper_style', array(
		'label'       		=> esc_attr__( 'Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_wrapper_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'footer-wrapper-style-1' => esc_html__( 'Footer wrapper style 1', 'pofo' ),
								  	'footer-wrapper-style-2' => esc_html__( 'Footer wrapper style 2', 'pofo' ),
								  	'footer-wrapper-style-3' => esc_html__( 'Footer wrapper style 3', 'pofo' ),
							   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/footer-wrapper-1.jpg',
								  	POFO_THEME_IMAGES_URI . '/footer-wrapper-2.jpg',
								  	POFO_THEME_IMAGES_URI . '/footer-wrapper-3.jpg',
							   ),
		'pofo_columns'    	=> '1',
	) ) );

	/* End Footer Wrapper Style */

	/* Footer Wrapper Container Setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_container_fluid', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_wrapper_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_wrapper_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    '1' => esc_html__( 'Fluid / Full Width', 'pofo' ),
								    '0'  => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Footer Wrapper Container Setting */

	/* Footer Text */

    $wp_customize->add_setting( 'pofo_footer_wrapper_text', array(
		'default' 			=> '',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_wrapper_text', array(
		'label'       		=> esc_attr__( 'Text', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_wrapper_text',
		'type'              => 'textarea',
	) ) );

  	/* End Footer Text */

  	/* Footer Logo */

    $wp_customize->add_setting( 'pofo_footer_logo_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_footer_logo_image', array(
		'label'       		=> esc_attr__( 'Logo ', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_logo_image',
	) ) );

	/* Footer Logo */

	/* Footer Logo */

    $wp_customize->add_setting( 'pofo_footer_retina_logo_image', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pofo_footer_retina_logo_image', array(
		'label'       		=> esc_attr__( 'Retina Logo ', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_retina_logo_image',
	) ) );

	/* Footer Logo */

	/* Footer Logo Url */

	$wp_customize->add_setting( 'pofo_footer_logo_url', array(
		'default' 			=> home_url('/'),
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_logo_url', array(
	    'label'      		=> esc_attr__( 'Logo URL', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_logo_url',
	    'type'       		=> 'text',
	) );

	/* End Footer Logo Url */

	/* Footer Wrapper Padding */

	$wp_customize->add_setting( 'pofo_footer_wrapper_padding_setting', array(
		'default' 			=> 'small-padding',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_wrapper_padding_setting', array(
		'label'       		=> esc_attr__( 'Padding Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_wrapper_padding_setting',
		'type'              => 'select',
		'choices'           => array(
								    'small-padding' => esc_html__( 'Small Padding', 'pofo' ),
								    'medium-padding'  => esc_html__( 'Medium Padding', 'pofo' ),
								    'large-padding'  => esc_html__( 'Large Padding', 'pofo' ),
							   ),
	) ) );

	/* End Footer Wrapper Padding */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_footer_social_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_footer_social_separator', array(
	    'label'      		=> esc_attr__( 'Social Media Icons', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'   		=> 'pofo_general_footer_social_separator',	    
	) ) );

	/* End Separator Settings */

  	/* Disable Footer Social Icon */

    $wp_customize->add_setting( 'pofo_disable_footer_social', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_footer_social', array(
		'label'       		=> esc_attr__( 'Social Icons Section', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_disable_footer_social',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Footer Social Icon */

	/* Footer Before Text */
  	
    $wp_customize->add_setting( 'pofo_before_social_icons_text', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_before_social_icons_text', array(
		'label'       		=> esc_attr__( 'Social Text', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_before_social_icons_text',
		'type'              => 'text',
	) ) );

	/* End Footer Before Text */

	/* Footer Social Icon Target */
  	
    $wp_customize->add_setting( 'pofo_disable_footer_social_target', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_footer_social_target', array(
		'label'       		=> esc_attr__( 'Open links in new window?', 'pofo' ),
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_disable_footer_social_target',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'Yes', 'pofo' ),
								  	'0' => esc_html__( 'No', 'pofo' ),
							   ),
	) ) );

	/* End Footer Social Icon Target */


	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_footer_social_icons', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Customize_Social_Icons( $wp_customize, 'pofo_footer_social_icons', array(
		'label'       		=> esc_attr__( 'Social media URLS', 'pofo' ),
		'type'              => 'pofo_social_icons',
		'section'     		=> 'pofo_add_footer_wrapper_section',
		'settings'			=> 'pofo_footer_social_icons',
		'choices'           => array(
									'fa fa-facebook' => esc_html__( 'Facebook', 'pofo' ),
								  	'fa fa-twitter' => esc_html__( 'Twitter', 'pofo' ),
								  	'fa fa-google-plus' => esc_html__( 'Google+', 'pofo' ),
								  	'fa fa-dribbble' => esc_html__( 'Dribbble', 'pofo' ),
								  	'fa fa-linkedin' => esc_html__( 'Linkedin', 'pofo' ),
								  	'fa fa-instagram' => esc_html__( 'Instagram', 'pofo' ),
								  	'fa fa-tumblr' => esc_html__( 'Tumblr', 'pofo' ),
								  	'fa fa-pinterest-p' => esc_html__( 'Pinterest', 'pofo' ),
								  	'fa fa-youtube' => esc_html__( 'Youtube', 'pofo' ),
								  	'fa fa-vimeo' => esc_html__( 'Vimeo', 'pofo' ),
								  	'fa fa-heart' => esc_html__( 'Bloglovin', 'pofo' ),
								  	'fa fa-soundcloud' => esc_html__( 'Soundcloud', 'pofo' ),
								  	'fa fa-flickr' => esc_html__( 'Flickr', 'pofo' ),
								  	'fa fa-rss' => esc_html__( 'RSS', 'pofo' ),
								  	'fa fa-behance' => esc_html__( 'Behance', 'pofo' ),
								  	'fa fa-vine' => esc_html__( 'Vine', 'pofo' ),
								  	'fa fa-github' => esc_html__( 'GitHub', 'pofo' ),
								  	'fa fa-xing' => esc_html__( 'Xing', 'pofo' ),
								  	'fa fa-vk' => esc_html__( 'VK', 'pofo' ),
								  	'fa fa-reddit' => esc_html__( 'Reddit', 'pofo' ),
								  	'fa fa-external-link' => esc_html__( 'External Link', 'pofo' ),
								  	'fa fa-yelp' => esc_html__( 'Yelp', 'pofo' ),
								  	'fa fa-discord' => esc_html__( 'Discord', 'pofo' ),
								  	'fa fa-envelope' => esc_html__( 'Email Address', 'pofo' ),
							   ),
	) ) );

	/* End Facebook Social Icon */

	/* Custom Social Link */

	$wp_customize->add_setting( 'pofo_footer_custom_link', array(
	    'default' 			=> '',
	    'sanitize_callback' => 'wp_kses_post'
	) );
	 
	$wp_customize->add_control( 'pofo_footer_custom_link', array(
	    'label'      		=> esc_attr__( 'Custom Icons Code', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'   		=> 'pofo_footer_custom_link',
	    'type'       		=> 'textarea',
	) );

	/* End Custom Social Link */

	/* Footer Social Text font size setting */

	$wp_customize->add_setting( 'pofo_footer_social_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_text_font_size', array(
	    'label'      		=> esc_attr__( 'Social Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Social Text font size setting */

	/* Footer Social Text line height setting */

	$wp_customize->add_setting( 'pofo_footer_social_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_text_line_height', array(
	    'label'      		=> esc_attr__( 'Scoial Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Social Text line height setting */

	/* Footer Social Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_social_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Social Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Social Text letter spacing setting */

	/* Footer Social Icon font size setting */

	$wp_customize->add_setting( 'pofo_footer_social_icon_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_icon_font_size', array(
	    'label'      		=> esc_attr__( 'Social Icon Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_icon_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Social Icon font size setting */

	/* Footer Social Icon line height setting */

	$wp_customize->add_setting( 'pofo_footer_social_icon_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_icon_line_height', array(
	    'label'      		=> esc_attr__( 'Scoial Icon Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_icon_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Social Icon line height setting */

	/* Footer Social Icon letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_social_icon_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_social_icon_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Social Icon Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_icon_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Social Icon letter spacing setting */

	/* Footer Before Text Color Setting */

	$wp_customize->add_setting( 'pofo_footer_before_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_before_text_color', array(
	    'label'      		=> esc_attr__( 'Social Text Color', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_before_text_color',
	) ) );

	/* End Footer Social Icon color Setting */

	/* Footer Social Icon Color Setting */

	$wp_customize->add_setting( 'pofo_footer_social_icon_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_social_icon_color', array(
	    'label'      		=> esc_attr__( 'Social Icons Color', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_icon_color',
	) ) );

	/* End Footer Social Icon color Setting */

	/* Footer Social Icon Color Setting */

	$wp_customize->add_setting( 'pofo_footer_social_icon_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_social_icon_hover_color', array(
	    'label'      		=> esc_attr__( 'Social Icons Hover Color', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_social_icon_hover_color',
	) ) );

	/* End Footer Social Icon color Setting */

  	/* End Footer Social Icon */

	/* Footer Wrapper Color Setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_footer_wrapper_separator', array(
	    'label'      		=> esc_attr__( 'Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'   		=> 'pofo_footer_wrapper_separator',
	) ) );

	/* End Footer Wrapper Color Setting */

	/* Footer Wrapper Widget Title font size setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_wrapper_text_font_size', array(
	    'label'      		=> esc_attr__( 'Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_wrapper_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Wrapper Widget font size setting */

	/* Footer Wrapper Widget Title line height setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_wrapper_text_line_height', array(
	    'label'      		=> esc_attr__( 'Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_wrapper_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Wrapper Widget line height setting */

	/* Footer Wrapper Widget Title letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_wrapper_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_wrapper_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Wrapper Widget letter spacing setting */

	/* Footer Wrapper Background color setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_wrapper_bg_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_wrapper_bg_color',
	) ) );

	/* End Footer Wrapper Background color setting */

	/* Footer Wrapper text color setting */

	$wp_customize->add_setting( 'pofo_footer_wrapper_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_wrapper_text_color', array(
	    'label'      		=> esc_attr__( 'Text', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_wrapper_section',
	    'settings'	 		=> 'pofo_footer_wrapper_text_color',
	) ) );

	/* End Footer Wrapper text color setting */


	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_footer_middle_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_footer_middle_separator', array(
	    'label'      		=> esc_attr__( 'Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'   		=> 'pofo_footer_middle_separator',	    
	) ) );

	/* End Separator Settings */

	/* Start Disable Footer */

    $wp_customize->add_setting( 'pofo_disable_footer', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_footer', array(
		'label'       		=> esc_attr__( 'Footer', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_disable_footer',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Footer */

	/* Footer Layout Style */

    $wp_customize->add_setting( 'pofo_footer_style', array(
		'default' 			=> 'footer-style-one',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_footer_style', array(
		'label'       		=> esc_attr__( 'Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'footer-style-one'   => esc_html__( 'Footer Style1', 'pofo' ),
								    'footer-style-two'   => esc_html__( 'Footer Style2', 'pofo' ),
								    'footer-style-three' => esc_html__( 'Footer Style3', 'pofo' ),
							   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/footer-style-1.jpg',
								  	POFO_THEME_IMAGES_URI . '/footer-style-2.jpg',
								  	POFO_THEME_IMAGES_URI . '/footer-style-3.jpg',
							   ),
		'pofo_columns'    	=> '1',
	) ) );
   
  	/* End Footer Layout Style */

  	/* Footer Container Setting */

	$wp_customize->add_setting( 'pofo_footer_container_fluid', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    '1' => esc_html__( 'Fluid / Full Width', 'pofo' ),
								    '0'  => esc_html__( 'Fixed', 'pofo' ),
							   ),	
	) ) );

	/* End Footer Container Setting */

	/* Footer Sidebar 1 */

	$wp_customize->add_setting( 'pofo_footer_sidebar1', array(
		'default' 			=> 'footer-sidebar-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_sidebar1', array(
		'label'       		=> esc_attr__( 'Column 1 Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_sidebar1',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
	) ) );

	/* End Footer Sidebar 1 */

	/* Footer Sidebar 2 */

	$wp_customize->add_setting( 'pofo_footer_sidebar2', array(
		'default' 			=> 'footer-sidebar-2',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_sidebar2', array(
		'label'       		=> esc_attr__( 'Column 2 Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_sidebar2',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
	) ) );

	/* End Footer Sidebar 2 */

	/* Footer Sidebar 3 */

	$wp_customize->add_setting( 'pofo_footer_sidebar3', array(
		'default' 			=> 'footer-sidebar-3',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_sidebar3', array(
		'label'       		=> esc_attr__( 'Column 3 Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_sidebar3',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
	) ) );

	/* End Footer Sidebar 3 */

	/* Footer Sidebar 4 */

	$wp_customize->add_setting( 'pofo_footer_sidebar4', array(
		'default' 			=> 'footer-sidebar-4',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_sidebar4', array(
		'label'       		=> esc_attr__( 'Column 4 Sidebar', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_sidebar4',
		'type'              => 'select',
		'choices'           => $pofo_sidebar_array,
	) ) );

	/* End Footer Sidebar 4 */

	/* Footer Padding */

	$wp_customize->add_setting( 'pofo_footer_padding_setting', array(
		'default' 			=> 'small-padding',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_padding_setting', array(
		'label'       		=> esc_attr__( 'Padding Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_section',
		'settings'			=> 'pofo_footer_padding_setting',
		'type'              => 'select',
		'choices'           => array(
								    'small-padding' => esc_html__( 'Small Padding', 'pofo' ),
								    'medium-padding'  => esc_html__( 'Medium Padding', 'pofo' ),
								    'large-padding'  => esc_html__( 'Large Padding', 'pofo' ),
							   ),
	) ) );
	/* End Footer Padding */

	/* Footer Color Setting */

	$wp_customize->add_setting( 'pofo_footer_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_footer_separator', array(
	    'label'      		=> esc_attr__( 'Color Settings', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'   		=> 'pofo_footer_separator',
	) ) );

	/* End Footer Color Setting */

	/* Footer Background color setting */

	$wp_customize->add_setting( 'pofo_footer_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bg_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_bg_color',
	) ) );

	/* End Footer Background color setting */

	/* Footer text color setting */

	$wp_customize->add_setting( 'pofo_footer_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_text_color', array(
	    'label'      		=> esc_attr__( 'Text', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_text_color',
	) ) );

	/* End Footer text color setting */

	/* Footer link color setting */

	$wp_customize->add_setting( 'pofo_footer_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_link_color', array(
	    'label'      		=> esc_attr__( 'Link', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_link_color',
	) ) );

	/* End Footer link color setting */

	/* Footer link hover color setting */

	$wp_customize->add_setting( 'pofo_footer_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_link_hover_color',
	) ) );

	/* End Footer link hover color setting */

	/* Footer Border color setting */

	$wp_customize->add_setting( 'pofo_footer_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_border_color', array(
	    'label'      		=> esc_attr__( 'Vertical Separator', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_border_color',
	    'active_callback' 	=> 'pofo_footer_border_color_callback',
	) ) );

	/* End Footer Border color setting */

	/* Footer Widget Title color setting */

	$wp_customize->add_setting( 'pofo_footer_widget_title_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_widget_title_color', array(
	    'label'      		=> esc_attr__( 'Widget Title', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_widget_title_color',
	) ) );

	/* End Footer Widget Title color setting */

	/* Footer Widget Title font size setting */

	$wp_customize->add_setting( 'pofo_footer_widget_title_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_widget_title_font_size', array(
	    'label'      		=> esc_attr__( 'Widget Title Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_widget_title_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Widget font size setting */

	/* Footer Widget Title line height setting */

	$wp_customize->add_setting( 'pofo_footer_widget_title_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_widget_title_line_height', array(
	    'label'      		=> esc_attr__( 'Widget Title Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_widget_title_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Widget line height setting */

	/* Footer Widget Title letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_widget_title_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_widget_title_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Widget Title Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_section',
	    'settings'	 		=> 'pofo_footer_widget_title_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Widget letter spacing setting */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_general_footer_bottom_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_general_footer_bottom_separator', array(
	    'label'      		=> esc_attr__( 'Style and Data', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'   		=> 'pofo_general_footer_bottom_separator',	    
	) ) );

	/* End Separator Settings */

	/* Start Disable Footer Bottom */

    $wp_customize->add_setting( 'pofo_disable_footer_bottom', array(
		'default' 			=> '1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_disable_footer_bottom', array(
		'label'       		=> esc_attr__( 'Footer Bottom', 'pofo' ),
		'section'     		=> 'pofo_add_footer_bottom_section',
		'settings'			=> 'pofo_disable_footer_bottom',
		'type'              => 'pofo_switch',
		'choices'           => array(
									'1' => esc_html__( 'On', 'pofo' ),
								  	'0' => esc_html__( 'Off', 'pofo' ),
							   ),
	) ) );

	/* End Disable Footer Bottom */

	/* Start Footer Bottom Style */

    $wp_customize->add_setting( 'pofo_footer_bottom_style', array(
		'default' 			=> 'footer-bottom-style-1',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Preview_Image_Control( $wp_customize, 'pofo_footer_bottom_style', array(
		'label'       		=> esc_attr__( 'Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_bottom_section',
		'settings'			=> 'pofo_footer_bottom_style',
		'type'              => 'pofo_preview_image',
		'choices'           => array(
									'footer-bottom-style-1' => esc_html__( 'Footer bottom style 1', 'pofo' ),
								  	'footer-bottom-style-2' => esc_html__( 'Footer bottom style 2', 'pofo' ),
							   ),
		'pofo_img'			=> array(
									POFO_THEME_IMAGES_URI . '/footer-bottom-1.jpg',
								  	POFO_THEME_IMAGES_URI . '/footer-bottom-2.jpg',	
							   ),
		'pofo_columns'    	=> '1',
	) ) );

	/* End Footer Bottom Style */

	/* Footer Bottom Container Setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_container_fluid', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_bottom_container_fluid', array(
		'label'       		=> esc_attr__( 'Container Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_bottom_section',
		'settings'			=> 'pofo_footer_bottom_container_fluid',
		'type'              => 'select',
		'choices'           => array(
								    '1' => esc_html__( 'Fluid / Full Width', 'pofo' ),
								    '0'  => esc_html__( 'Fixed', 'pofo' ),
							   ),
	) ) );

	/* End Footer Bottom Container Setting */

	/* Footer Footer Bottom Left Text setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_left_text', array(
		'default' 			=> 'POFO - Portfolio Concept Theme',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_bottom_left_text', array(
		'label'      		=> esc_attr__( 'Left Text', 'pofo' ),
		'section'    		=> 'pofo_add_footer_bottom_section',
		'settings'	 		=> 'pofo_footer_bottom_left_text',
		'type'              => 'textarea',
	) ) );

	/* End Footer Footer Bottom Left Text setting */

	/* Footer Footer Bottom Right Text setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_right_text', array(
		'default' 			=> '2018 POFO is Proudly Powered by ThemeZaa',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_bottom_right_text', array(
		'label'      		=> esc_attr__( 'Right Text', 'pofo' ),
		'section'    		=> 'pofo_add_footer_bottom_section',
		'settings'	 		=> 'pofo_footer_bottom_right_text',
		'type'              => 'textarea',
	) ) );

	/* End Footer Footer Bottom Right Text setting */

	/* Padding */

	$wp_customize->add_setting( 'pofo_footer_bottom_padding_setting', array(
		'default' 			=> 'small-padding',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_footer_bottom_padding_setting', array(
		'label'       		=> esc_attr__( 'Padding Style', 'pofo' ),
		'section'     		=> 'pofo_add_footer_bottom_section',
		'settings'			=> 'pofo_footer_bottom_padding_setting',
		'type'              => 'select',
		'choices'           => array(
								    'small-padding' => esc_html__( 'Small Padding', 'pofo' ),
								    'medium-padding'  => esc_html__( 'Medium Padding', 'pofo' ),
								    'large-padding'  => esc_html__( 'Large Padding', 'pofo' ),
							   ),
	) ) );

	/* End Padding */

	/* Footer Bootom Color Setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_footer_bottom_separator', array(
	    'label'      		=> esc_attr__( 'Font and Color', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'   		=> 'pofo_footer_bottom_separator',
	) ) );

	/* End Footer Color Setting */

	/* Footer Bottom Left Text font size setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_left_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_left_text_font_size', array(
	    'label'      		=> esc_attr__( 'Left Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_left_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Bottom Left Text font size setting */

	/* Footer Bottom Left Text line height setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_left_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_left_text_line_height', array(
	    'label'      		=> esc_attr__( 'Left Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_left_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Bottom Left Text line height setting */

	/* Footer Bottom Left Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_left_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_left_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Left Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_left_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Bottom Left Text letter spacing setting */

	/* Footer Bottom Right Text font size setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_right_text_font_size', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_right_text_font_size', array(
	    'label'      		=> esc_attr__( 'Right Text Font Size', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_right_text_font_size',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add font size like 12px.', 'pofo' ),
	) );

	/* End Footer Bottom Right Text font size setting */

	/* Footer Bottom Right Text line height setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_right_text_line_height', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_right_text_line_height', array(
	    'label'      		=> esc_attr__( 'Right Text Line Height', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_right_text_line_height',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add line height like 12px.', 'pofo' ),
	) );

	/* End Footer Bottom Right Text line height setting */

	/* Footer Bottom Right Text letter spacing setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_right_text_letter_spacing', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
    ) );

	$wp_customize->add_control( 'pofo_footer_bottom_right_text_letter_spacing', array(
	    'label'      		=> esc_attr__( 'Right Text Character Spacing', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_right_text_letter_spacing',
	    'type'       		=> 'text',
	    'description'       => esc_attr__( 'Add letter spacing like 1px.', 'pofo' ),
	) );

	/* End Footer Bottom Right Text letter spacing setting */

	/* Footer Background color setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_bg_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bottom_bg_color', array(
	    'label'      		=> esc_attr__( 'Background', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_bg_color',
	) ) );

	/* End Footer Background color setting */

	/* Footer text color setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_text_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bottom_text_color', array(
	    'label'      		=> esc_attr__( 'Text', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_text_color',
	) ) );

	/* End Footer text color setting */

	/* Footer link color setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_link_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bottom_link_color', array(
	    'label'      		=> esc_attr__( 'Link', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_link_color',
	) ) );

	/* End Footer link color setting */

	/* Footer link hover color setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_link_hover_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
		
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bottom_link_hover_color', array(
	    'label'      		=> esc_attr__( 'Link Hover', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_link_hover_color',
	) ) );

	/* End Footer link hover color setting */

	/* Footer Border color setting */

	$wp_customize->add_setting( 'pofo_footer_bottom_border_color', array(
		'default' 			=> '',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_footer_bottom_border_color', array(
	    'label'      		=> esc_attr__( 'Horizontal Separator', 'pofo' ),
	    'section'    		=> 'pofo_add_footer_bottom_section',
	    'settings'	 		=> 'pofo_footer_bottom_border_color',
	    'active_callback' 	=> 'pofo_footer_bottom_border_color_callback',
	) ) );

	/* End Footer Border color setting */

  	/* Callback Functions */

  	if ( ! function_exists( 'pofo_footer_text_center_callback' ) ) :
		function pofo_footer_text_center_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_footer_style' )->value() == 'footer-style-three' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	if ( ! function_exists( 'pofo_footer_text_center_device_callback' ) ) :
		function pofo_footer_text_center_device_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_footer_text_center' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	

	if ( ! function_exists( 'pofo_footer_border_color_callback' ) ) :
		function pofo_footer_border_color_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_footer_style' )->value() == 'footer-style-two' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;	

	if ( ! function_exists( 'pofo_footer_bottom_border_color_callback' ) ) :
		function pofo_footer_bottom_border_color_callback( $control ){
			if ( $control->manager->get_setting( 'pofo_footer_bottom_style' )->value() == 'footer-bottom-style-1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;

	/* End Callback Functions */