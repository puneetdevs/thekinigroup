<?php
/**
 * Metabox For Content.
 *
 * @package Pofo
 */
?>
<?php 
if($post->post_type == 'post'){
	pofo_meta_box_dropdown('pofo_hide_comment_single',
				esc_html__('Comment', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}elseif($post->post_type == 'portfolio'){

	pofo_meta_box_dropdown(	'pofo_hide_single_portfolio_comment_single',
				esc_html__('Comments', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}else{
	pofo_meta_box_dropdown(	'pofo_hide_page_comment_single',
				esc_html__('Comments', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
}