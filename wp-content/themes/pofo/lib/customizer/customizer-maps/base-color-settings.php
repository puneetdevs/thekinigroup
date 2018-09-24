<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Separator Settings */
    $wp_customize->add_setting( 'pofo_base_color_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_base_color_setting_separator', array(
        'label'             => esc_attr__( 'Color', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_base_color_section',
        'settings'          => 'pofo_base_color_setting_separator',       
    ) ) );

    /* End Separator Settings */

    /* Base Color Setting */

    $wp_customize->add_setting( 'pofo_base_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pofo_base_color', array(
        'label'             => esc_attr__( 'Base Color', 'pofo' ),
        'section'           => 'pofo_add_base_color_section',
        'settings'          => 'pofo_base_color',
    ) ) );

    /* End Base Color Setting */

	