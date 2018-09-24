<?php
/**
 * Metabox For Footer.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_dropdown('pofo_disable_footer_single',
				esc_html__('Footer', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_footer_style_single',
				esc_html__('Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'footer-style-one' => esc_html__('Footer Style 1', 'pofo-addons'),
					  'footer-style-two' => esc_html__('Footer Style 2', 'pofo-addons'),
					  'footer-style-three' => esc_html__('Footer Style 3', 'pofo-addons'),
					 )
			);
pofo_meta_box_dropdown('pofo_footer_container_fluid_single',
				esc_html__('Container Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('Fluid / Full Width', 'pofo-addons'),
					  '0' => esc_html__('Fixed', 'pofo-addons')
					 )
			);
$pofo_sidebar_array = pofo_register_sidebar_array();
pofo_meta_box_dropdown('pofo_disable_footer_sidebar1_single',
				esc_html__('Column 1 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar1_single',
				esc_html__('Column 1 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar1_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar2_single',
				esc_html__('Column 2 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar2_single',
				esc_html__('Column 2 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar2_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar3_single',
				esc_html__('Column 3 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar3_single',
				esc_html__('Column 3 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar3_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_disable_footer_sidebar4_single',
				esc_html__('Column 4 Sidebar?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown_sidebar(	'pofo_footer_sidebar4_single',
				esc_html__('Column 4 Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				'',
				array( 'element' => 'pofo_disable_footer_sidebar4_single', 'value' => array('default','1'))
			);
pofo_meta_box_dropdown('pofo_footer_padding_setting_single',
				esc_html__('Padding Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'small-padding' => esc_html__('Small Padding', 'pofo-addons'),
					  'medium-padding' => esc_html__('Medium Padding', 'pofo-addons'),
					  'large-padding' => esc_html__('Large Padding', 'pofo-addons'),
					 )
			);
pofo_meta_box_separator(
		'pofo_footer_middle_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_bg_color_single',
		esc_html__( 'Background Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_text_color_single',
		esc_html__( 'Text Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_link_color_single',
		esc_html__( 'Link Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_link_hover_color_single',
		esc_html__( 'Link Hover Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_border_color_single',
		esc_html__( 'Vertical Separator Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_footer_style_single', 'value' => array( 'default', 'footer-style-two' ))
	);
pofo_meta_box_colorpicker( 'pofo_footer_widget_title_color_single',
		esc_html__( 'Widget Title Color', 'pofo-addons' )
	);