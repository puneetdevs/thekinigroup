<?php
/**
 * Metabox For Portfolio Setting.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_text('pofo_subtitle_single',
				esc_html__('Subtitle', 'pofo-addons'),
				esc_html__('This title will be displayed on hover of the portfolio image', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_portfolio_featured_image_single',
				esc_html__('Featured Image in Portfolio Page', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons'),
					 ),
				esc_html__('Select Off if you want to hide featured image in the portfolio detail page.', 'pofo-addons')
			);
pofo_meta_box_text('pofo_portfolio_external_link_single',
				esc_html__('External Link', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_portfolio_link_target_single',
				esc_html__('Target', 'pofo-addons'),
				array('_self' => esc_html__('Self', 'pofo-addons'),
					  '_blank' => esc_html__('New Window', 'pofo-addons'),
					 )
			);