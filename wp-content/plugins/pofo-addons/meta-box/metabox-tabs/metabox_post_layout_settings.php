<?php
/**
 * Metabox For Post Layout Setting.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_dropdown('pofo_single_post_layout_setting_single',
				esc_html__('Sidebar Settings', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'pofo_layout_left_sidebar' => esc_html__('Two Columns Left', 'pofo-addons'),
					  'pofo_layout_right_sidebar' => esc_html__('Two Columns Right', 'pofo-addons'),
					  'pofo_layout_both_sidebar' => esc_html__('Three Columns', 'pofo-addons'),
					  'pofo_layout_full_screen_12col' => esc_html__('One Column', 'pofo-addons')
					 )
			);

$pofo_sidebar_array = pofo_register_sidebar_array();
pofo_meta_box_dropdown_sidebar(	'pofo_single_post_left_sidebar_single',
				esc_html__('Left Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				esc_html__('Select sidebar to display in left column of page', 'pofo-addons'),
				array( 'element' => 'pofo_single_post_layout_setting_single', 'value' => array('default','pofo_layout_left_sidebar','pofo_layout_both_sidebar' ))
			);
pofo_meta_box_dropdown_sidebar(	'pofo_single_post_right_sidebar_single',
				esc_html__('Right Sidebar', 'pofo-addons'),
				$pofo_sidebar_array,
				esc_html__('Select sidebar to display in right column of page', 'pofo-addons'),
				array( 'element' => 'pofo_single_post_layout_setting_single', 'value' => array('default','pofo_layout_right_sidebar','pofo_layout_both_sidebar' ))
			);
pofo_meta_box_dropdown(	'pofo_single_post_container_style_single',
				esc_html__( 'Container Style', 'pofo-addons' ),
				array(
					'default' => esc_html__( 'Default', 'pofo-addons' ),
					'container-fluid' => esc_html__( 'Fluid / Full Width', 'pofo-addons' ),
					'container' => esc_html__( 'Fixed', 'pofo-addons' ),
				)
			);
pofo_meta_box_colorpicker( 'pofo_body_background_color_single',
            esc_html__( 'Body Background', 'pofo-addons' )
        );