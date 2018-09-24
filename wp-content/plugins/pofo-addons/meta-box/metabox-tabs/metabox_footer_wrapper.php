<?php
/**
 * Metabox For Footer.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_dropdown('pofo_disable_footer_wrapper_single',
				esc_html__('Footer Wrapper', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
pofo_meta_box_dropdown('pofo_footer_wrapper_style_single',
				esc_html__('Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'footer-wrapper-style-1' => esc_html__('Footer wrapper style 1', 'pofo-addons'),
					  'footer-wrapper-style-2' => esc_html__('Footer wrapper style 2', 'pofo-addons'),
					  'footer-wrapper-style-3' => esc_html__('Footer wrapper style 3', 'pofo-addons'),
					 )
			);
pofo_meta_box_dropdown('pofo_footer_wrapper_container_fluid_single',
				esc_html__('Container Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('Fluid / Full Width', 'pofo-addons'),
					  '0' => esc_html__('Fixed', 'pofo-addons')
					 )
			);
pofo_meta_box_textarea('pofo_footer_wrapper_text_single',
				esc_html__('Text', 'pofo-addons')
			);
pofo_meta_box_upload(	'pofo_footer_logo_image_single', 
				esc_html__('Logo', 'pofo-addons'),
				esc_html__('Upload the logo that will be displayed in the footer', 'pofo-addons')
			);
pofo_meta_box_upload(	'pofo_footer_retina_logo_image_single', 
				esc_html__('Retina Logo', 'pofo-addons'),
				esc_html__('Upload the retina logo that will be displayed in the footer', 'pofo-addons')
			);
pofo_meta_box_text( 'pofo_footer_logo_url_single', 
				esc_html__('Logo URL', 'pofo-addons')
	);
pofo_meta_box_dropdown('pofo_footer_wrapper_padding_setting_single',
				esc_html__('Padding Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'small-padding' => esc_html__('Small Padding', 'pofo-addons'),
					  'medium-padding' => esc_html__('Medium Padding', 'pofo-addons'),
					  'large-padding' => esc_html__('Large Padding', 'pofo-addons'),
					 )
			);
pofo_meta_box_separator(
		'pofo_footer_wrapper_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_wrapper_bg_color_single',
		esc_html__( 'Background Color', 'pofo-addons' )
	);
pofo_meta_box_colorpicker( 'pofo_footer_wrapper_text_color_single',
		esc_html__( 'Footer Wrapper Text Color', 'pofo-addons' )
	);