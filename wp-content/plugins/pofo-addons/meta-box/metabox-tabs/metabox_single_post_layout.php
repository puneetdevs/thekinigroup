<?php
/**
 * Metabox For Single Post Layout.
 *
 * @package Pofo
 */
?>
<?php 
if($post->post_type == 'post') {

	pofo_meta_box_dropdown('pofo_post_layout_style_single',
				esc_html__('Post Layout Style', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'post-layout-style-1' => esc_html__('Single Post Layout Style 1', 'pofo-addons'),
					  'post-layout-style-2' => esc_html__('Single Post Layout Style 2', 'pofo-addons'),
					  'post-layout-style-3' => esc_html__('Single Post Layout Style 3', 'pofo-addons')
					 )
			);
	
	pofo_meta_box_dropdown('pofo_hide_category_single',
				esc_html__('Category', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_hide_date_single',
				esc_html__('Date', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_text( 'pofo_post_date_format_single', 
				esc_html__('Date Format', 'pofo-addons')
			);

	pofo_meta_box_dropdown('pofo_hide_author_single',
				esc_html__('Author', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_hide_tags_single',
				esc_html__('Tags', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
	pofo_meta_box_dropdown('pofo_hide_like_single',
				esc_html__('Like', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
	pofo_meta_box_dropdown('pofo_hide_share_single',
				esc_html__('Share', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
	pofo_meta_box_dropdown('pofo_hide_post_author_box_single',
				esc_html__('Author Box', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);
	pofo_meta_box_dropdown('pofo_single_post_meta_text_transform_single',
				esc_html__('Post Meta Text Transform', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'text-normal' => esc_html__('Normal', 'pofo-addons'),
					  'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
					  'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
					  'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
			  		  'text-none' => esc_html__('None', 'pofo-addons'),
					 )
			);

	pofo_meta_box_separator(
		'pofo_single_related_posts_single',
		esc_html__( 'Related Posts', 'pofo-addons' )
	);

	pofo_meta_box_dropdown('pofo_hide_related_posts_single',
				esc_html__('Related Posts', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_no_of_related_posts_columns_single',
				esc_html__('Column', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);

	pofo_meta_box_text( 'pofo_related_posts_title_single', 
				esc_html__('Related Post Title', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_no_of_related_posts_single',
				esc_html__('No. of Posts', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '5' => '5',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_related_posts_hide_date_single',
				esc_html__('Post Date', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);

	pofo_meta_box_text( 'pofo_related_posts_date_format_single', 
				esc_html__('Date Format', 'pofo-addons'),
				'Date format should be like F j, Y',
				'',
				array( 'element' => 'pofo_related_posts_hide_date_single', 'value' => array('1'))
			);

	pofo_meta_box_dropdown('pofo_related_posts_hide_author_single',
				esc_html__('Post Author', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);
	pofo_meta_box_dropdown('pofo_related_posts_separator_single',
				esc_html__('Post Separator', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);
	pofo_meta_box_text( 'pofo_related_post_excerpt_length_single', 
				esc_html__('Excerpt Length', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_hide_related_posts_single', 'value' => array('default','1'))
			);
	pofo_meta_box_separator(
		'pofo_single_post_color_single',
		esc_html__( 'Color Settings', 'pofo-addons' )
	);
	pofo_meta_box_colorpicker( 'pofo_single_post_meta_text_color_single',
		esc_html__( 'Post Meta Color', 'pofo-addons' )
	);
	pofo_meta_box_colorpicker( 'pofo_single_post_meta_text_hover_color_single',
		esc_html__( 'Post Meta Hover Color', 'pofo-addons' )
	);

} else {

	// Portfolio Style & Data
	
	pofo_meta_box_dropdown('pofo_portfolio_hide_category_single',
				esc_html__('Category', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_portfolio_hide_date_single',
				esc_html__('Date', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_text( 'pofo_portfolio_date_format_single', 
				esc_html__('Date Format', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_portfolio_hide_date_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_portfolio_hide_author_single',
				esc_html__('Author', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_hide_single_portfolio_share_single',
				esc_html__('Share', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_text( 'pofo_single_portfolio_share_title_single', 
				esc_html__('Share Heading', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_hide_single_portfolio_share_single', 'value' => array('default','1'))
			);

	pofo_meta_box_colorpicker( 'pofo_single_portfolio_share_box_bg_color_single',
		esc_html__( 'Share Box Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_single_portfolio_share_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_single_portfolio_share_box_title_color_single',
		esc_html__( 'Share Box Title Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_single_portfolio_share_single', 'value' => array('default','1'))
	);

	// Portfolio Related Portfolio
	pofo_meta_box_separator(
		'pofo_portfolio_related_portfolio_separator_single',
		esc_html__( 'Related Portfolio', 'pofo-addons' )
	);
	
	pofo_meta_box_dropdown('pofo_hide_related_single_portfolio_single',
				esc_html__('Related Portfolio', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_no_of_related_single_portfolio_columns_single',
				esc_html__('No. of Columns', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_text( 'pofo_related_single_portfolio_title_single', 
				esc_html__('Title', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_no_of_related_single_portfolio_single',
				esc_html__('Number of Portfolios', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => '1',
					  '2' => '2',
					  '3' => '3',
					  '4' => '4',
					  '5' => '5',
					  '6' => '6',
					 ),
				'',
				array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_textarea( 'pofo_related_single_portfolio_content_single', 
				esc_html__('Content', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_related_single_portfolio_subtitle_text_transform_single',
				esc_html__('Related Portfolio Subtitle Text Case', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'text-normal' => esc_html__('Normal', 'pofo-addons'),
					  'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
					  'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
					  'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
			  		  'text-none' => esc_html__('None', 'pofo-addons'),
					 )
			);

	pofo_meta_box_colorpicker( 'pofo_related_single_portfolio_box_bg_color_single',
		esc_html__( 'Related Portfolio Box Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_related_single_portfolio_title_text_color_single',
		esc_html__( 'Related Portfolio Box Title Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_related_single_portfolio_content_color_single',
		esc_html__( 'Related Portfolio Box Content Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_related_single_portfolio_single', 'value' => array('default','1'))
	);

	// Portfolio Navigation
	pofo_meta_box_separator(
		'pofo_portfolio_navigation_separator_single',
		esc_html__( 'Navigation', 'pofo-addons' )
	);
	
	pofo_meta_box_dropdown('pofo_hide_navigation_single_portfolio_single',
				esc_html__('Navigation', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 )
			);

	pofo_meta_box_dropdown('pofo_hide_navigation_middle_link_single_portfolio_single',
				esc_html__('Navigation Middle Link', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_dropdown('pofo_middle_link_type_single_portfolio_single',
				esc_html__('Navigation Middle Link Type', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  'archive_link' => esc_html__('Archive Link', 'pofo-addons'),
					  'custom_link' => esc_html__('Custom Link', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_navigation_middle_link_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_text( 'pofo_middle_custom_link_single_portfolio_single', 
				esc_html__('Custom Link', 'pofo-addons'),
				'',
				'',
				array( 'element' => 'pofo_middle_link_type_single_portfolio_single', 'value' => array('custom_link'))
			);

	pofo_meta_box_dropdown('pofo_hide_navigation_border_single_portfolio_single',
				esc_html__('Navigation Border', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons')
					 ),
				'',
				array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
			);

	pofo_meta_box_colorpicker( 'pofo_navigation_single_portfolio_bg_color_single',
		esc_html__( 'Navigation Background Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_navigation_single_portfolio_text_color_single',
		esc_html__( 'Navigation Text Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_navigation_single_portfolio_link_color_single',
		esc_html__( 'Navigation Link Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
	);

	pofo_meta_box_colorpicker( 'pofo_hide_navigation_single_portfolio_link_hover_color_single',
		esc_html__( 'Navigation Link Hover Color', 'pofo-addons' ),
		'',
		array( 'element' => 'pofo_hide_navigation_single_portfolio_single', 'value' => array('default','1'))
	);
	pofo_meta_box_colorpicker( 'pofo_single_portfolio_meta_text_color_single',
		esc_html__( 'Portfolio Meta Color', 'pofo-addons' )
	);
	pofo_meta_box_colorpicker( 'pofo_single_portfolio_meta_text_hover_color_single',
		esc_html__( 'Portfolio Meta Hover Color', 'pofo-addons' )
	);

}