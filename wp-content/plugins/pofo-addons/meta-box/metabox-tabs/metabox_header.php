<?php
/**
 * Metabox For Header.
 *
 * @package Pofo
 */
?>
<?php 
	
	$pofo_sidebar_array = pofo_register_sidebar_array();

	pofo_meta_box_dropdown(	'pofo_enable_box_layout_single',
		esc_html__( 'Box Layout', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'1' => esc_html__('On', 'pofo-addons'),
            '0' => esc_html__('Off', 'pofo-addons')
		)
	);
	
	pofo_meta_box_dropdown(
		'pofo_disable_header_single',
		esc_html__( 'Header', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__('On', 'pofo-addons'),
            '0' => esc_html__('Off', 'pofo-addons')
		)
	);

	pofo_meta_box_separator(
		'pofo_logo_favicon_separator_single',
		esc_html__( 'Logo', 'pofo-addons' )
	);
	
	pofo_meta_box_dropdown(	'pofo_disable_header_logo_single',
		esc_html__( 'Logo', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'1' => esc_html__('On', 'pofo-addons'),
            '0' => esc_html__('Off', 'pofo-addons')
		)
	);

	pofo_meta_box_upload( 'pofo_logo_single', 
		esc_html__( 'Logo', 'pofo-addons' ),
		esc_html__( 'Upload the logo image which will be displayed in the website header.', 'pofo-addons' )
	);

	pofo_meta_box_upload( 'pofo_logo_light_single', 
		esc_html__( 'Logo &#40;Light&#41;', 'pofo-addons' ),
		esc_html__( 'Upload the logo light image which will be displayed in the website header in scrolled version header.', 'pofo-addons' )
	);
	
	pofo_meta_box_upload( 'pofo_logo_ratina_single', 
		esc_html__( 'Retina Logo', 'pofo-addons' ),
		esc_html__( 'Upload the double size logo image which will be displayed in the website header of retina devices.', 'pofo-addons' )
	);

	pofo_meta_box_upload( 'pofo_logo_light_ratina_single', 
		esc_html__( 'Retina Logo &#40;Light&#41;', 'pofo-addons' ),
		esc_html__( 'Upload the logo light image which will be displayed in the website header of retina devices in scrolled version header.', 'pofo-addons' )
	);

	pofo_meta_box_text( 'pofo_header_svg_width_single',
		esc_html__( 'SVG Width', 'pofo-addons' )
	);

	pofo_meta_box_separator(
		'pofo_header_style_data_separator_single',
		esc_html__( 'Header Style and Data', 'pofo-addons' )
	);

	pofo_meta_box_dropdown(	'pofo_header_container_style_single',
		esc_html__( 'Container Style', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo-addons' ),
			'container' => esc_html__( 'Fixed', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);
	
	pofo_meta_box_dropdown(	'pofo_header_type_single',
		esc_html__( 'Header Style', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'headertype1' => esc_html__( 'Standard', 'pofo-addons' ),
		    'headertype2' => esc_html__( 'Hamburger', 'pofo-addons' ),
		    'headertype3' => esc_html__( 'Left Classic', 'pofo-addons' ),
		    'headertype4' => esc_html__( 'Left Modern', 'pofo-addons' ),
        )
	);

	pofo_meta_box_dropdown_menu( 'pofo_header_menu_single',
		esc_html__( 'Menu', 'pofo-addons' ),
		'',
		esc_html__( 'You can manage menu using Appearance &#62; Menus', 'pofo-addons' )
	);

	pofo_meta_box_dropdown_menu( 'pofo_header_secondary_menu_single',
		esc_html__( 'Secondary Menu', 'pofo-addons' ),
		'',
		esc_html__( 'You can manage menu using Appearance &#62; Menus', 'pofo-addons' ),
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_dropdown( 'pofo_header_nav_type_single',
		esc_html__( 'Sticky Type', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    'navbar-top' => esc_html__( 'Appear on Up Scroll', 'pofo-addons' ),
		    'navbar-fixed-top' => esc_html__( 'Sticky on Down Scroll', 'pofo-addons' ),
		    'navbar-non-sticky-top' => esc_html__( 'Non Sticky', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype2'))
	);

	pofo_meta_box_dropdown( 'pofo_menu_position_center_single',
		esc_html__( 'Center Menu', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__( 'On', 'pofo-addons' ),
			'0' => esc_html__( 'Off', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_dropdown(	'pofo_logo_position_single',
		esc_html__( 'Logo Position', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'left' => esc_html__( 'Left', 'pofo-addons' ),
			'top' => esc_html__( 'Top', 'pofo-addons' ),
			'center' => esc_html__( 'Center', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype2'))
	);

	pofo_meta_box_dropdown( 'pofo_disable_header_search_single',
		esc_html__( 'Search', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__('On', 'pofo-addons'),
            '0' => esc_html__('Off', 'pofo-addons')
		)
	);

	pofo_meta_box_dropdown( 'pofo_disable_header_sidebar_single',
		esc_html__( 'Header Sidebar', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__( 'On', 'pofo-addons' ),
			'0' => esc_html__( 'Off', 'pofo-addons' ),
		)
	);

	pofo_meta_box_dropdown_sidebar(	'pofo_header_sidebar_single',
		esc_html__( 'Select Sidebar', 'pofo-addons' ),
		$pofo_sidebar_array,
		esc_html__( 'Select sidebar to display in header', 'pofo-addons' ),
		array( 'element' => 'pofo_disable_header_sidebar_single', 'value' => array('default','1'))
	);

	pofo_meta_box_dropdown(	'pofo_header_sidebar_position_single',
		esc_html__( 'Sidebar Position', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
			'left' => esc_html__( 'Left', 'pofo-addons' ),
			'right' => esc_html__( 'Right', 'pofo-addons' ),
		),
		esc_html__( 'Its work when logo position is center and header style is hamburger menu', 'pofo-addons' ),
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_dropdown( 'pofo_disable_slide_menu_single',
		esc_html__( 'Slide Menu', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__( 'On', 'pofo-addons' ),
			'0' => esc_html__( 'Off', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_dropdown_sidebar(	'pofo_slide_menu_sidebar_single',
		esc_html__( 'Slide Menu Sidebar', 'pofo-addons' ),
		$pofo_sidebar_array,
		esc_html__( 'Select sidebar to display in slide menu', 'pofo-addons' ),
		array( 'element' => 'pofo_disable_slide_menu_single', 'value' => array('default','1'))
	);

	/* if WooCommerce plugin is activated */
	if( class_exists( 'WooCommerce' ) ) {

		pofo_meta_box_dropdown( 'pofo_enable_header_mini_cart_single',
			esc_html__( 'Mini Cart', 'pofo-addons' ),
			array(
				'default' => esc_html__( 'Default', 'pofo-addons' ),
			    '1' => esc_html__( 'On', 'pofo-addons' ),
				'0' => esc_html__( 'Off', 'pofo-addons' ),
			),
			''
		);

		pofo_meta_box_dropdown_sidebar(	'pofo_header_mini_cart_sidebar_single',
			esc_html__( 'Mini Cart Sidebar', 'pofo-addons' ),
			$pofo_sidebar_array,
			esc_html__( 'Select sidebar to display in header', 'pofo-addons' ),
			array( 'element' => 'pofo_enable_header_mini_cart_single', 'value' => array('default','1'))
		);
	}

	pofo_meta_box_upload( 'pofo_menu_vertical_image_single', 
		esc_html__( 'Menu Vertical Text Image', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype4'))
	);

	pofo_meta_box_dropdown(
		'pofo_disable_header_copyright_single',
		esc_html__( 'Copyright', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__( 'On', 'pofo-addons' ),
			'0' => esc_html__( 'Off', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2','headertype3'))
	);

	pofo_meta_box_textarea('pofo_header_copyright_text_single',
		esc_html__('Copyright Text', 'pofo-addons'),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2','headertype3'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_copyright_text_color_single',
		esc_html__( 'Copyright Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2','headertype3'))
	);

	pofo_meta_box_separator(
		'pofo_header_color_single',
		esc_html__( 'Header Font and Color Settings', 'pofo-addons' )
	);

	pofo_meta_box_text( 'pofo_header_menu_text_font_size_single',
		esc_html__( 'Menu Text Font Size', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype3','headertype4'))
	);

	pofo_meta_box_text( 'pofo_header_menu_text_line_height_single',
		esc_html__( 'Menu Text Line Height', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype3','headertype4'))
	);

	pofo_meta_box_text( 'pofo_header_menu_text_letter_spacing_single',
		esc_html__( 'Menu Text Character Spacing', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype3','headertype4'))
	);

	pofo_meta_box_dropdown('pofo_header_menu_text_transform_single',
		esc_html__('Menu Text Transform', 'pofo-addons'),
		array('default' => esc_html__('Default', 'pofo-addons'),
			  'text-normal' => esc_html__('Normal', 'pofo-addons'),
			  'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
			  'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
			  'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
			  'text-none' => esc_html__('None', 'pofo-addons'),
			 ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype3','headertype4'))
	);

	pofo_meta_box_text( 'pofo_header_menu_icon_font_size_single',
		esc_html__( 'Icon Font Size', 'pofo-addons' )
	);

	pofo_meta_box_colorpicker( 'pofo_header_background_color_single',
		esc_html__( 'Background Color', 'pofo-addons' )
	);

	pofo_meta_box_colorpicker( 'pofo_menu_text_color_single',
		esc_html__( 'Menu Text Color', 'pofo-addons' )
	);

	pofo_meta_box_colorpicker( 'pofo_menu_hover_text_color_single',
		esc_html__( 'Menu Hover Text Color', 'pofo-addons' )
	);

	pofo_meta_box_colorpicker( 'pofo_sticky_header_background_color_single',
		esc_html__( 'Sticky Header Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_sticky_menu_text_color_single',
		esc_html__( 'Sticky Menu Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_sticky_menu_hover_text_color_single',
		esc_html__( 'Sticky Menu Text Hover Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1','headertype2'))
	);

	pofo_meta_box_separator(
		'pofo_mobile_menu_color_single',
		esc_html__( 'Mobile Menu Color Settings', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_menu_background_color_single',
		esc_html__( 'Mobile Menu Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_menu_text_color_single',
		esc_html__( 'Mobile Menu Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_menu_hover_color_single',
		esc_html__( 'Mobile Menu Text Hover Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_submenu_background_color_single',
		esc_html__( 'Mobile Submenu Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_submenu_heading_color_single',
		esc_html__( 'Mobile Submenu Heading Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_submenu_text_color_single',
		esc_html__( 'Mobile Submenu Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_colorpicker( 'pofo_header_mobile_submenu_hover_color_single',
		esc_html__( 'Mobile Submenu Text Hover Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype1'))
	);

	pofo_meta_box_separator(
		'pofo_hamburger_menu_single',
		esc_html__( 'Hamburger Menu Settings', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);	
	
	pofo_meta_box_text( 'pofo_hamburger_menu_text_font_size_single',
		esc_html__( 'Menu Text Font Size', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_text( 'pofo_hamburger_menu_text_line_height_single',
		esc_html__( 'Menu Text Line Height', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_text( 'pofo_hamburger_menu_text_letter_spacing_single',
		esc_html__( 'Menu Text Character Spacing', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_dropdown('pofo_hamburger_menu_text_transform_single',
		esc_html__('Menu Text Transform', 'pofo-addons'),
		array('default' => esc_html__('Default', 'pofo-addons'),
			  'text-normal' => esc_html__('Normal', 'pofo-addons'),
			  'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
			  'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
			  'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
			  'text-none' => esc_html__('None', 'pofo-addons'),
			 ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_text( 'pofo_hamburger_menu_icon_font_size_single',
		esc_html__( 'Icon Font Size', 'pofo-addons' ),
		'',
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_menu_background_color_single',
		esc_html__( 'Menu Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_hamburger_menu_text_color_single',
		esc_html__( 'Menu Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_hamburger_menu_hover_text_color_single',
		esc_html__( 'Menu Text Hover Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_upload( 'pofo_menu_background_image_single', 
		esc_html__( 'Background Image', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_upload( 'pofo_menu_background_logo_single', 
		esc_html__( 'Logo', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_upload( 'pofo_menu_background_logo_ratina_single', 
		esc_html__( 'Ratina Logo', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_colorpicker( 'pofo_menu_background_overlay_color_single',
		esc_html__( 'Background Overlay Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_dropdown( 'pofo_menu_background_overlay_opacity_single',
		esc_html__( 'Background Overlay Opacity', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '0.0'  => esc_html__( 'No opacity', 'pofo-addons' ),
		    '0.1'  => '0.1',
		    '0.2'  => '0.2',
		    '0.3'  => '0.3',
		    '0.4'  => '0.4',
		    '0.5'  => '0.5',
		    '0.6'  => '0.6',
		    '0.7'  => '0.7',
		    '0.8'  => '0.8',
		    '0.9'  => '0.9',
		    '1.0'  => '1.0',
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_dropdown( 'pofo_disable_hamburger_menu_sidebar_single',
		esc_html__( 'Hamburger Menu Sidebar', 'pofo-addons' ),
		array(
			'default' => esc_html__( 'Default', 'pofo-addons' ),
		    '1' => esc_html__( 'On', 'pofo-addons' ),
			'0' => esc_html__( 'Off', 'pofo-addons' ),
		),
		'',
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);

	pofo_meta_box_dropdown_sidebar(	'pofo_hamburger_menu_sidebar_single',
		esc_html__( 'Select Hamburger Menu Sidebar', 'pofo-addons' ),
		$pofo_sidebar_array,
		esc_html__( 'Select sidebar to display in hamburger menu', 'pofo-addons' ),
		array( 'element' => 'pofo_header_type_single', 'value' => array('default','headertype2'))
	);