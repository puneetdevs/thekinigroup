<?php
/**
 * Metabox For Title Wrapper.
 *
 * @package Pofo
 */
?>
<?php
/* if WooCommerce plugin is activated */
if( $post->post_type == 'product' && class_exists( 'WooCommerce' ) ){
  pofo_meta_box_dropdown('pofo_disable_single_product_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_product_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_product_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_product_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_product_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If no, background image will show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_product_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_product_title_image_single', 'value' => array('1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_product_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_product_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_product_title_video_type_single', 'value' => array('external' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_product_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_product_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_separator('pofo_single_product_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_product_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_product_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_product_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
}elseif($post->post_type == 'post'){
	pofo_meta_box_dropdown('pofo_disable_single_post_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_post_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_post_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_post_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_post_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If no, background image will show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_post_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_post_title_image_single', 'value' => array('1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_post_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    esc_html__('Use only for Page Title Style 7.', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_post_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_post_title_video_type_single', 'value' => array('external' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_post_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_post_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_separator('pofo_single_post_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_post_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_post_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_post_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
}elseif( $post->post_type == 'portfolio' ){
	pofo_meta_box_dropdown('pofo_disable_single_portfolio_title_single',
                    esc_html__('Title', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a title will display in page', 'pofo-addons')
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_style_single',
                    esc_html__('Style', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
                          'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
                          'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
                          'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
                          'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
                          'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
                          'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
                          'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
                          'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
                          'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
                         ),
                    esc_html__('Choose page title style', 'pofo-addons')
                );
    pofo_meta_box_dropdown('pofo_single_portfolio_title_text_transform_single',
                    esc_html__('Text Case', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
                          'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
                          'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
                          'text-normal' => esc_html__('Normal', 'pofo-addons'),
                          'text-none' => esc_html__('None', 'pofo-addons'),
                         )
                );
    pofo_meta_box_dropdown('pofo_disable_single_portfolio_subtitle_single',
                    esc_html__('Subtitle', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, show Subtitle.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_subtitle_single', 
                    esc_html__('Subtitle', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_disable_single_portfolio_subtitle_single', 'value' => array('default','1'))
                );
    pofo_meta_box_dropdown('pofo_disable_single_portfolio_title_image_single',
                    esc_html__('Enable Background Image', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, background image will show in title.', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_upload( 'pofo_single_portfolio_title_bg_image_single', 
                    esc_html__('Background Image', 'pofo-addons'),
                    esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
                    array( 'element' => 'pofo_disable_single_portfolio_title_image_single', 'value' => array('1'))
                );
    pofo_meta_box_upload_multiple('pofo_single_portfolio_title_bg_multiple_image_single', 
                    esc_html__('Background Gallery Images', 'pofo-addons'),
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_callto_section_id_single', 
                    esc_html__('Next Section ID', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-7' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_video_type_single',
                    esc_html__('Video type', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'self' => esc_html__('Self', 'pofo-addons'),
                          'external' => esc_html__('External', 'pofo-addons'),
                         ),
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-8' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_mp4_single', 
                    esc_html__('MP4', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_ogg_single', 
                    esc_html__('OGG', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_webm_single', 
                    esc_html__('WEBM', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_video_type_single', 'value' => array('self' ))
                );
    pofo_meta_box_text( 'pofo_single_portfolio_title_video_youtube_single', 
                    esc_html__('External video url', 'pofo-addons'),
                    '',
                    '',
                    array( 'element' => 'pofo_single_portfolio_title_video_type_single', 'value' => array('external' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_parallax_effect_single',
                    esc_html__('Parallax effects', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
                          '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
                          '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
                          '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
                          '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
                          '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
                          '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
                          '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
                          '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
                          '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
                          '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
                         ),
                    esc_html__('Choose parallax effect', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown( 'pofo_single_portfolio_title_opacity_single',
                    esc_html__('Page title Opacity', 'pofo-addons'),
                    array('default'   => esc_html__( 'Default', 'pofo-addons' ),
                        '0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
                        '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
                        '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
                        '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
                        '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
                        '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
                        '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
                        '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
                        '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
                        '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
                        '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
                         ),
                    esc_html__('Choose page title opacity', 'pofo-addons'),
                    array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
                );
    pofo_meta_box_dropdown('pofo_single_portfolio_disable_breadcrumb_single',
                    esc_html__('Breadcrumb', 'pofo-addons'),
                    array('default' => esc_html__('Default', 'pofo-addons'),
                          '1' => esc_html__('On', 'pofo-addons'),
                          '0' => esc_html__('Off', 'pofo-addons')
                         ),
                    esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
                );
    pofo_meta_box_separator('pofo_single_portfolio_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_opacity_color_single',
            esc_html__( 'Opacity Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_bg_color_single',
            esc_html__( 'Background Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_color_single',
            esc_html__( 'Title Text Color', 'pofo-addons' )
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_subtitle_color_single',
            esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_disable_single_portfolio_subtitle_single', 'value' => array('default','1'))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_bg_color_single',
            esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_border_color_single',
            esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_color_single',
            esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
    pofo_meta_box_colorpicker( 'pofo_single_portfolio_title_breadcrumb_text_hover_color_single',
            esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
            '',
            array( 'element' => 'pofo_single_portfolio_disable_breadcrumb_single', 'value' => array('default','1' ))
        );
}else{
	pofo_meta_box_dropdown('pofo_disable_page_title_single',
					esc_html__('Title', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  '1' => esc_html__('On', 'pofo-addons'),
						  '0' => esc_html__('Off', 'pofo-addons')
						 ),
					esc_html__('If on, a title will display in page', 'pofo-addons')
				);
	pofo_meta_box_dropdown( 'pofo_page_title_style_single',
					esc_html__('Style', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  'page-title-style-1' => esc_html__('Page Title Style 1', 'pofo-addons'),
						  'page-title-style-2' => esc_html__('Page Title Style 2', 'pofo-addons'),
						  'page-title-style-3' => esc_html__('Page Title Style 3', 'pofo-addons'),
						  'page-title-style-4' => esc_html__('Page Title Style 4', 'pofo-addons'),
						  'page-title-style-5' => esc_html__('Page Title Style 5', 'pofo-addons'),
						  'page-title-style-6' => esc_html__('Page Title Style 6', 'pofo-addons'),
						  'page-title-style-7' => esc_html__('Page Title Style 7', 'pofo-addons'),
						  'page-title-style-8' => esc_html__('Page Title Style 8', 'pofo-addons'),
						  'page-title-style-9' => esc_html__('Page Title Style 9', 'pofo-addons'),
						  'page-title-style-10' => esc_html__('Page Title Style 10', 'pofo-addons')
						 ),
					esc_html__('Choose page title style', 'pofo-addons')
				);
	pofo_meta_box_dropdown('pofo_page_title_text_transform_single',
					esc_html__('Text Case', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  'text-uppercase' => esc_html__('Uppercase', 'pofo-addons'),
						  'text-lowercase' => esc_html__('Lowercase', 'pofo-addons'),
						  'text-capitalize' => esc_html__('Capitalize', 'pofo-addons'),
						  'text-normal' => esc_html__('Normal', 'pofo-addons'),
              'text-none' => esc_html__('None', 'pofo-addons'),
						 )
				);
	pofo_meta_box_dropdown('pofo_disable_page_subtitle_single',
					esc_html__('Subtitle', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  '1' => esc_html__('On', 'pofo-addons'),
						  '0' => esc_html__('Off', 'pofo-addons')
						 ),
					esc_html__('If on, show Subtitle.', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-1','page-title-style-2','page-title-style-3','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
				);
	pofo_meta_box_text( 'pofo_page_title_subtitle_single', 
					esc_html__('Subtitle', 'pofo-addons'),
          '',
          '',
          array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
				);
	pofo_meta_box_dropdown('pofo_disable_page_title_image_single',
					esc_html__('Enable Background Image', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  '1' => esc_html__('On', 'pofo-addons'),
						  '0' => esc_html__('Off', 'pofo-addons')
						 ),
					esc_html__('If no, background image will show in title.', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
				);
	pofo_meta_box_upload( 'pofo_page_title_bg_image_single', 
					esc_html__('Background Image', 'pofo-addons'),
					esc_html__('Recommended image size is 1920px X 700px.', 'pofo-addons'),
          array( 'element' => 'pofo_disable_page_title_image_single', 'value' => array('1'))
				);
	pofo_meta_box_upload_multiple('pofo_page_title_bg_multiple_image_single', 
					esc_html__('Background Gallery Images', 'pofo-addons'),
					'',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-7' ))
				);
	pofo_meta_box_text( 'pofo_page_title_callto_section_id_single', 
					esc_html__('Next Section ID', 'pofo-addons'),
					'',
          '',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-7' ))
				);
	pofo_meta_box_dropdown( 'pofo_page_title_video_type_single',
					esc_html__('Video type', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  'self' => esc_html__('Self', 'pofo-addons'),
						  'external' => esc_html__('External', 'pofo-addons'),
						 ),
					'',
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-8' ))
				);
	pofo_meta_box_text( 'pofo_page_title_video_mp4_single', 
					esc_html__('MP4', 'pofo-addons'),
					'',
          '',
          array( 'element' => 'pofo_page_title_video_type_single', 'value' => array('self' ))
				);
	pofo_meta_box_text( 'pofo_page_title_video_ogg_single', 
					esc_html__('OGG', 'pofo-addons'),
					'',
          '',
          array( 'element' => 'pofo_page_title_video_type_single', 'value' => array('self' ))
				);
	pofo_meta_box_text( 'pofo_page_title_video_webm_single', 
					esc_html__('WEBM', 'pofo-addons'),
					'',
          '',
          array( 'element' => 'pofo_page_title_video_type_single', 'value' => array('self' ))
				);
	pofo_meta_box_text( 'pofo_page_title_video_youtube_single', 
					esc_html__('External video url', 'pofo-addons'),
					'',
          '',
          array( 'element' => 'pofo_page_title_video_type_single', 'value' => array('external' ))
				);
	pofo_meta_box_dropdown( 'pofo_page_title_parallax_effect_single',
					esc_html__('Parallax effects', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  'no-parallax' => esc_html__('No Parallax', 'pofo-addons'),
						  '0.1' => esc_html__('Parallax Effect 1', 'pofo-addons'),
						  '0.2' => esc_html__('Parallax Effect 2', 'pofo-addons'),
						  '0.3' => esc_html__('Parallax Effect 3', 'pofo-addons'),
						  '0.4' => esc_html__('Parallax Effect 4', 'pofo-addons'),
						  '0.5' => esc_html__('Parallax Effect 5', 'pofo-addons'),
						  '0.6' => esc_html__('Parallax Effect 6', 'pofo-addons'),
						  '0.7' => esc_html__('Parallax Effect 7', 'pofo-addons'),
						  '0.8' => esc_html__('Parallax Effect 8', 'pofo-addons'),
						  '0.9' => esc_html__('Parallax Effect 9', 'pofo-addons'),
						  '1.0' => esc_html__('Parallax Effect 10', 'pofo-addons')
						 ),
					esc_html__('Choose parallax effect', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-8','page-title-style-10' ))
				);
	pofo_meta_box_dropdown( 'pofo_page_title_opacity_single',
					esc_html__('Page title Opacity', 'pofo-addons'),
					array('default'   => esc_html__( 'Default', 'pofo-addons' ),
						'0.0'   => esc_html__( 'No Opacity', 'pofo-addons' ),
					    '0.1'   => esc_html__( '0.1', 'pofo-addons' ),
					    '0.2'   => esc_html__( '0.2', 'pofo-addons' ),
					    '0.3'   => esc_html__( '0.3', 'pofo-addons' ),
					    '0.4'   => esc_html__( '0.4', 'pofo-addons' ),
					    '0.5'   => esc_html__( '0.5', 'pofo-addons' ),
					    '0.6'   => esc_html__( '0.6', 'pofo-addons' ),
					    '0.7'   => esc_html__( '0.7', 'pofo-addons' ),
					    '0.8'   => esc_html__( '0.8', 'pofo-addons' ),
					    '0.9'   => esc_html__( '0.9', 'pofo-addons' ),
					    '1.0'   => esc_html__( '1.0', 'pofo-addons' ),
						 ),
					esc_html__('Choose page title opacity', 'pofo-addons'),
          array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
				);
	pofo_meta_box_dropdown('pofo_disable_breadcrumb_single',
					esc_html__('Breadcrumb', 'pofo-addons'),
					array('default' => esc_html__('Default', 'pofo-addons'),
						  '1' => esc_html__('On', 'pofo-addons'),
						  '0' => esc_html__('Off', 'pofo-addons')
						 ),
					esc_html__('If on, a breadcrumb will display in page', 'pofo-addons')
				);
  pofo_meta_box_separator('pofo_single_page_title_color_single',
            esc_html__( 'Color Settings', 'pofo-addons' )
    );
	pofo_meta_box_colorpicker( 'pofo_page_title_opacity_color_single',
			esc_html__( 'Opacity Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_page_title_style_single', 'value' => array('default','page-title-style-4','page-title-style-5','page-title-style-6','page-title-style-7','page-title-style-8','page-title-style-10' ))
		);
	pofo_meta_box_colorpicker( 'pofo_page_title_bg_color_single',
			esc_html__( 'Background Color', 'pofo-addons' )
		);
	pofo_meta_box_colorpicker( 'pofo_page_title_color_single',
			esc_html__( 'Title Text Color', 'pofo-addons' )
		);
	pofo_meta_box_colorpicker( 'pofo_page_subtitle_color_single',
			esc_html__( 'Subtitle Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_page_subtitle_single', 'value' => array('default','1'))
		);
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_bg_color_single',
      esc_html__( 'Breadcrumb Background', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
  pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_border_color_single',
      esc_html__( 'Breadcrumb Border', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
  );
	pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_color_single',
			esc_html__( 'Breadcrumb Text Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
		);
	pofo_meta_box_colorpicker( 'pofo_page_title_breadcrumb_text_hover_color_single',
			esc_html__( 'Breadcrumb Text Hover Color', 'pofo-addons' ),
      '',
      array( 'element' => 'pofo_disable_breadcrumb_single', 'value' => array('default','1' ))
		);
}