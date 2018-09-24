<?php
/**
 * Metabox For Post Setting.
 *
 * @package Pofo
 */
?>
<?php 
pofo_meta_box_dropdown('pofo_featured_image_single',
				esc_html__('Featured Image in Post Page', 'pofo-addons'),
				array('default' => esc_html__('Default', 'pofo-addons'),
					  '1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons'),
					 ),
				esc_html__('Select Off if you want to hide featured image in the post detail page.', 'pofo-addons')
			);
pofo_meta_box_textarea('pofo_quote_single',
				esc_html__('Blockquote', 'pofo-addons'),
				esc_html__('Add block quote content', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_lightbox_image_single',
				esc_html__('List Type', 'pofo-addons'),
				array('1' => esc_html__('Grid with Lightbox Popup', 'pofo-addons'),
					  '0' => esc_html__('Slider', 'pofo-addons'),
					 ),
				esc_html__('Select listing type', 'pofo-addons')
			);
pofo_meta_box_upload_multiple('pofo_gallery_single', 
				esc_html__('Images', 'pofo-addons'),
				esc_html__('Upload / select multiple images to build a gallery', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_link_type_single',
				esc_html__('Link Type', 'pofo-addons'),
				array('external' => esc_html__('External Url', 'pofo-addons'),
					  'ajax-popup' => esc_html__('Ajax Popup', 'pofo-addons'),
					 ),
				esc_html__('Select link type', 'pofo-addons')
			);
pofo_meta_box_text('pofo_link_single',
				esc_html__('External Link', 'pofo-addons'),
				esc_html__('Add external link', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_video_type_single',
				esc_html__('Video Type', 'pofo-addons'),
				array('self' => esc_html__('Self Hosted', 'pofo-addons'),
					  'external' => esc_html__('External Url', 'pofo-addons'),
					 ),
				esc_html__('Select video type', 'pofo-addons')
			);
pofo_meta_box_dropdown('pofo_enable_mute_single',
				esc_html__('Video Mute', 'pofo-addons'),
				array('1' => esc_html__('On', 'pofo-addons'),
					  '0' => esc_html__('Off', 'pofo-addons'),
					 ),
				esc_html__('Select on to mute background video sound.', 'pofo-addons')
			);
pofo_meta_box_text('pofo_video_mp4_single',
				esc_html__('MP4', 'pofo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'pofo-addons'),
				esc_html__('', 'pofo-addons')
			);
pofo_meta_box_text('pofo_video_ogg_single',
				esc_html__('OGG', 'pofo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'pofo-addons'),
				esc_html__('', 'pofo-addons')
			);
pofo_meta_box_text('pofo_video_webm_single',
				esc_html__('WEBM', 'pofo-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'pofo-addons'),
				esc_html__('', 'pofo-addons')
			);
pofo_meta_box_text('pofo_video_single',
				esc_html__('External video url', 'pofo-addons'),
				'Video url is required here if external url option is selected.',
				esc_html__('Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code. or add VIMEO VIDEO EMBED URL like https://player.vimeo.com/video/xxxxxxxx, you will get this from vimeo embed iframe src code.', 'pofo-addons')
			);
pofo_meta_box_textarea('pofo_audio_single',
				esc_html__('Audio URL (Oembed) OR Embed Code', 'pofo-addons'),
				esc_html__('Add code.', 'pofo-addons')
			);