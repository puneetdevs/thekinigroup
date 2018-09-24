<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_post_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_post_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_social_share_section',
	    'settings'   		=> 'pofo_post_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_post_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_post_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_add_social_share_section',
		'settings'			=> 'pofo_single_post_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo' ),
								  	'digg' => esc_html__( 'Digg', 'pofo' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo' ),
								  	'vk' => esc_html__( 'VK', 'pofo' ),
								  	'xing' => esc_html__( 'XING', 'pofo' ),
							   ),
	) ) );

	/* End Facebook Social Icon */


	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_portfolio_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_portfolio_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_portfolio_add_social_share_section',
	    'settings'   		=> 'pofo_portfolio_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_portfolio_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_portfolio_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_portfolio_add_social_share_section',
		'settings'			=> 'pofo_single_portfolio_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo' ),
								  	'digg' => esc_html__( 'Digg', 'pofo' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo' ),
								  	'vk' => esc_html__( 'VK', 'pofo' ),
								  	'xing' => esc_html__( 'XING', 'pofo' ),
							   ),
	) ) );

	/* End Facebook Social Icon */
	
	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_social_sharing_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_social_sharing_separator', array(
	    'label'      		=> esc_attr__( 'Social Share', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_product_add_social_share_section',
	    'settings'   		=> 'pofo_product_social_sharing_separator',	    
	) ) );

	/* End Separator Settings */

	/* Facebook Social Icon */

    $wp_customize->add_setting( 'pofo_single_product_social_sharing', array(
		'default' 			=> '',
		'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
	) );

	$wp_customize->add_control( new Pofo_Post_Customize_Social_Icons( $wp_customize, 'pofo_single_product_social_sharing', array(
		'label'       		=> esc_attr__( 'Social Media Websites', 'pofo' ),
		'type'              => 'pofo_post_social_icons',
		'section'     		=> 'pofo_product_add_social_share_section',
		'settings'			=> 'pofo_single_product_social_sharing',
		'choices'           => array(
									'facebook' => esc_html__( 'Facebook', 'pofo' ),
								  	'twitter' => esc_html__( 'Twitter', 'pofo' ),
								  	'google-plus' => esc_html__( 'Google+', 'pofo' ),
								  	'linkedin' => esc_html__( 'Linkedin', 'pofo' ),
								  	'pinterest' => esc_html__( 'Pinterest', 'pofo' ),
								  	'delicious' => esc_html__( 'Delicious', 'pofo' ),
								  	'reddit' => esc_html__( 'Reddit', 'pofo' ),
								  	'stumbleupon' => esc_html__( 'StumbleUpon', 'pofo' ),
								  	'digg' => esc_html__( 'Digg', 'pofo' ),
								  	'tumblr' => esc_html__( 'Tumblr', 'pofo' ),
								  	'vk' => esc_html__( 'VK', 'pofo' ),
								  	'xing' => esc_html__( 'XING', 'pofo' ),
							   ),
	) ) );

	/* End Facebook Social Icon */