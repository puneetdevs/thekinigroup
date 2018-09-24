<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_googlefonts = pofo_googlefonts_list();

	/* Main Font Separator Settings */
	$wp_customize->add_setting( 'pofo_main_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_main_font_setting_separator', array(
	    'label'      		=> esc_attr__( 'Main / Body Font', 'pofo' ),
        'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_font_family_section',
	    'settings'   		=> 'pofo_main_font_setting_separator',
        'description'	    => esc_html__('In this section you can overwrite theme default body and additional fonts with your desired Google fonts.','pofo'),
	) ) );

	/* End Main Font Separator Settings */

    $wp_customize->add_setting( 'pofo_enable_main_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_main_font', array(
        'label'             => esc_attr__( 'Main / Body Font', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_enable_main_font',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'pofo' ),
                                    '0' => esc_html__( 'Off', 'pofo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'pofo_main_font', array(
		'default'			=> 'Roboto',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_main_font', array(
		'label'				=> esc_attr__( 'Main / Body Font', 'pofo' ),
		'section'			=> 'pofo_add_general_font_family_section',
		'setting'			=> 'pofo_main_font',
		'type'              => 'select',
		'choices'           => $pofo_googlefonts,
        'active_callback'  => 'pofo_main_font_callback',
	) ) );

	$wp_customize->add_setting( 'pofo_main_font_weight', array(
        'default'           => array( '100', '300', '400', '500', '700', '900' ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_main_font_weight', array(
        'label'   			=> esc_attr__( 'Font Weight', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_font_family_section',
        'settings'			=> 'pofo_main_font_weight',
        'choices'           => array(
        							'100' => '100',
        							'200' => '200',
        							'300' => '300',
        							'400' => '400',
        							'500' => '500',
        							'600' => '600',
        							'700' => '700',
        							'800' => '800',
        							'900' => '900',
        						),
        'active_callback'  => 'pofo_main_font_callback',
    ) ) );

    /* Alt Font Separator Settings */
	$wp_customize->add_setting( 'pofo_alt_font_setting_separator', array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'		
	) );

	$wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_alt_font_setting_separator', array(
	    'label'      		=> esc_attr__( 'Additional Font', 'pofo' ),
        'type'              => 'pofo_separator',
	    'section'    		=> 'pofo_add_general_font_family_section',
	    'settings'   		=> 'pofo_alt_font_setting_separator',
	) ) );

	/* End Alt Font Separator Settings */

    $wp_customize->add_setting( 'pofo_enable_alt_font', array(
        'default'           => '1',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( new Pofo_Customize_switch_Control( $wp_customize, 'pofo_enable_alt_font', array(
        'label'             => esc_attr__( 'Additional Font', 'pofo' ),
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_enable_alt_font',
        'type'              => 'pofo_switch',
        'choices'           => array(
                                    '1' => esc_html__( 'On', 'pofo' ),
                                    '0' => esc_html__( 'Off', 'pofo' ),
                               ),
    ) ) );

	$wp_customize->add_setting( 'pofo_alt_font', array(
		'default'			=> 'Montserrat',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pofo_alt_font', array(
		'label'				=> esc_attr__( 'Additional Font', 'pofo' ),
		'section'			=> 'pofo_add_general_font_family_section',
		'setting'			=> 'pofo_alt_font',
		'type'              => 'select',
		'choices'           => $pofo_googlefonts,
        'active_callback'  => 'pofo_alt_font_callback',
	) ) );

	$wp_customize->add_setting( 'pofo_alt_font_weight', array(
        'default'           => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_alt_font_weight', array(
        'label'   			=> esc_attr__( 'Font Weight', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section' 			=> 'pofo_add_general_font_family_section',
        'settings'			=> 'pofo_alt_font_weight',
        'choices'           => array(
        							'100' => '100',
        							'200' => '200',
        							'300' => '300',
        							'400' => '400',
        							'500' => '500',
        							'600' => '600',
        							'700' => '700',
        							'800' => '800',
        							'900' => '900',
        						),
        'active_callback'  => 'pofo_alt_font_callback',
    ) ) );

    
    $wp_customize->add_setting( 'pofo_main_font_languages_setting_separator', array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'       
    ) );

    $wp_customize->add_control( new Pofo_Customize_Separator_Control( $wp_customize, 'pofo_main_font_languages_setting_separator', array(
        'label'             => esc_attr__( 'Font Languages', 'pofo' ),
        'type'              => 'pofo_separator',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_languages_setting_separator',
        'active_callback'  => 'pofo_main_font_callback',
    ) ) );

    $wp_customize->add_setting( 'pofo_main_font_subsets', array(
        'default'           => array( 'cyrillic', 'cyrillic-ext', 'greek', 'greek-ext', 'latin-ext', 'vietnamese' ),
        'sanitize_callback' => 'pofo_sanitize_multiple_checkbox'
    ) );

    $wp_customize->add_control( new Pofo_Customize_Checkbox_Multiple( $wp_customize, 'pofo_main_font_subsets', array(
        'label'             => esc_attr__( 'Font Languages', 'pofo' ),
        'type'              => 'pofo_checkbox_multiple',
        'section'           => 'pofo_add_general_font_family_section',
        'settings'          => 'pofo_main_font_subsets',
        'choices'           => array(
                                    'cyrillic'      => esc_attr__( 'Cyrillic', 'pofo' ),
                                    'cyrillic-ext'  => esc_attr__( 'Cyrillic Extended', 'pofo' ),
                                    'greek'         => esc_attr__( 'Greek', 'pofo' ),
                                    'greek-ext'     => esc_attr__( 'Greek Extended', 'pofo' ),
                                    'latin-ext'     => esc_attr__( 'Latin Extended', 'pofo' ),
                                    'vietnamese'    => esc_attr__( 'Vietnamese', 'pofo' ),
                                ),
        'active_callback'  => 'pofo_main_font_callback',
    ) ) );

    if ( ! function_exists( 'pofo_main_font_callback' ) ) {
        function pofo_main_font_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_enable_main_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    }

    if ( ! function_exists( 'pofo_alt_font_callback' ) ) {
        function pofo_alt_font_callback( $control ) {
                if ( $control->manager->get_setting( 'pofo_enable_alt_font' )->value() == '1' ) {
                return true;
            } else {
                return false;
            }
        }
    }