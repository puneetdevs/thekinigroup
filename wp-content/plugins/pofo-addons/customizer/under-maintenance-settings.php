<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }

	if( class_exists( 'Pofo_Customize_Separator_Control' ) || class_exists( 'Pofo_Customize_switch_Control' ) ) {
	
		/* Separator Settings */
		$wp_customize->add_setting( 'pofo_under_maintenance_separator', array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_under_maintenance_separator', array(
		    'label'     		=> esc_attr__( 'Under Construction', 'pofo-addons' ),
		    'type'              => 'pofo_separator',
		    'section'   		=> 'pofo_add_general_panel',
		    'settings'  		=> 'pofo_under_maintenance_separator',
		    'priority'	 		=> 2,
		) ) );

		/* End Separator Settings */
		
		/* Set Under Construction page */

		$wp_customize->add_setting( 'pofo_enable_under_maintenance', array(
			'default' 			=> 0,
			'sanitize_callback' => 'esc_attr'
		) );

		$wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_under_maintenance', array(
			'label'     		=> esc_attr__( 'Under Construction', 'pofo-addons' ),
			'section'   		=> 'pofo_add_general_panel',
			'settings'			=> 'pofo_enable_under_maintenance',
			'type'              => 'pofo_switch',
			'choices'   		=> array(
											'1' => esc_html__( 'On', 'pofo-addons' ),
										  	'0' => esc_html__( 'Off', 'pofo-addons' ),
									   	),
			'priority'	 		=> 2,
		) ) );

		$wp_customize->add_setting( 'pofo_enable_under_maintenance_pages', array(
			'default' 			=> '0',
			'sanitize_callback' => 'esc_attr'
		) );


		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_enable_under_maintenance_pages', array(
			'label'       		=> esc_attr__( 'Under Construction Page', 'pofo-addons' ),
			'section'     		=> 'pofo_add_general_panel',
			'settings'			=> 'pofo_enable_under_maintenance_pages',
			'type'             	=> 'dropdown-pages',
			'active_callback'   => 'pofo_under_construction_page_callback',
			'priority'	 		=> 2,
		) ));

		/* Custom Callback Functions */
		if ( ! function_exists( 'pofo_under_construction_page_callback' ) ) :
			function pofo_under_construction_page_callback( $control ) {
				if ( $control->manager->get_setting( 'pofo_enable_under_maintenance' )->value() == '1' ) {
			        return true;
			    } else {
			    	return false;
			    }
			}
		endif;

	}