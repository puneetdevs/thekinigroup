<?php
/**
 * Metabox For Footer Social Icon.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_dropdown('pofo_disable_footer_social_single',
				esc_html__('Social Icons Section', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_disable_before_text_single',
				esc_html__('Social Text?', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_text( 'pofo_before_social_icons_text_single', 
				esc_html__('Social Text', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_disable_before_text_single', 'value' => array('default','1'))
			);
pofo_meta_box_separator(
		'pofo_footer_social_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_before_text_color_single',
		esc_html__( 'Social Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_disable_before_text_single', 'value' => array('default','1'))
	);
pofo_meta_box_colorpicker( 'pofo_footer_social_icon_color_single',
		esc_html__( 'Social Icons Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_social_icon_hover_color_single',
		esc_html__( 'Social Icons Hover Color', 'pofo-addons' )
	);