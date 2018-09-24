<?php

  	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_title_tagline_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_title_tagline_separator', array(
	    'label'      		=> esc_attr__( 'Site Identity', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'title_tagline',
	    'settings'   		=> 'pofo_title_tagline_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_header_image_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_header_image_separator', array(
	    'label'      		=> esc_attr__( 'Header Image', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'header_image',
	    'settings'   		=> 'pofo_header_image_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_background_image_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_background_image_separator', array(
	    'label'      		=> esc_attr__( 'Background Image Identity', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'background_image',
	    'settings'   		=> 'pofo_background_image_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_store_notice_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_store_notice_separator', array(
	    'label'      		=> esc_attr__( 'Store Notice', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'woocommerce_store_notice',
	    'settings'   		=> 'pofo_store_notice_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_catalog_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_catalog_separator', array(
	    'label'      		=> esc_attr__( 'Product Catalog', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'woocommerce_product_catalog',
	    'settings'   		=> 'pofo_product_catalog_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_product_images_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_product_images_separator', array(
	    'label'      		=> esc_attr__( 'Product Images', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'woocommerce_product_images',
	    'settings'   		=> 'pofo_product_images_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */

	/* Separator Settings */
	$wp_customize->add_setting( 'pofo_checkout_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_checkout_separator', array(
	    'label'      		=> esc_attr__( 'Checkout', 'pofo' ),
	    'type'              => 'pofo_separator',
	    'section'    		=> 'woocommerce_checkout',
	    'settings'   		=> 'pofo_checkout_separator',
	    'priority'	 		=> 1
	) ) );

	/* End Separator Settings */