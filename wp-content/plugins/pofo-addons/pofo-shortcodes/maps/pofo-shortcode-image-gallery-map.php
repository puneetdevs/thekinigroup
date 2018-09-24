<?php
/**
 * Map For Image gallery
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Image gallery */
/*-----------------------------------------------------------------------------------*/

  vc_map( array(
    'name' => esc_html__('Image Gallery', 'pofo-addons'),
    'description' => esc_html__( 'Simple/lightbox/zoom image gallery', 'pofo-addons' ),  
    'icon' => 'pofo-shortcode-icon far fa-image',
    'base' => 'pofo_image_gallery',
    'category' => 'Pofo',
    'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__('Type', 'pofo-addons'),
          'param_name' => 'image_gallery_type',
          'value' => array(esc_html__('Select type', 'pofo-addons') => '',
                    esc_html__('Simple image lightbox', 'pofo-addons') => 'simple-image-lightbox',
                    esc_html__('Lightbox gallery', 'pofo-addons') => 'lightbox-gallery',
                    esc_html__('Zoom gallery', 'pofo-addons') => 'zoom-gallery',
                    esc_html__('Metro gallery', 'pofo-addons') => 'metro-gallery',
                    esc_html__('Justified gallery', 'pofo-addons') => 'justified-gallery',
          ),
        ),
        array(
          'type' => 'pofo_preview_image',
          'heading' => esc_html__('Select pre-made style', 'pofo-addons'),
          'param_name' => 'pofo_image_gallery_preview_image',
          'value' => array(esc_html__('Select image gallery type', 'pofo-addons') => '',
                      esc_html__('Simple image lightbox', 'pofo-addons') => 'simple-image-lightbox',
                      esc_html__('Lightbox gallery', 'pofo-addons') => 'lightbox-gallery',
                      esc_html__('Zoom gallery', 'pofo-addons') => 'zoom-gallery',
                      esc_html__('Metro gallery', 'pofo-addons') => 'metro-gallery',
                      esc_html__('Justified gallery', 'pofo-addons') => 'justified-gallery',
          ),
        ),
        array(
          'type' => 'attach_image',
          'heading' => esc_html__('Image', 'pofo-addons'),
          'param_name' => 'single_image',
          'holder' => 'div',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox')),
        ),
        array(
          'type' => 'attach_images',
          'heading' => esc_html__('Images', 'pofo-addons'),
          'param_name' => 'image_gallery',
          'holder' => 'div',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery','zoom-gallery','metro-gallery','justified-gallery')),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Image thumbnail size', 'pofo-addons' ),
          'param_name' => 'pofo_image_srcset',
          'value' => pofo_get_thumbnail_image_sizes(),
          'std' => 'full',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery','justified-gallery')),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__('Grid style', 'pofo-addons'),
          'param_name' => 'lightbox_type',
          'std' => 'grid',
          'value' => array(esc_html__('Grid', 'pofo-addons') => 'grid',
                    esc_html__('Masonry', 'pofo-addons') => 'masonry',
          ),
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery') )
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__('No. of columns', 'pofo-addons'),
          'param_name' => 'pofo_column',
          'std' => '3',
          'value' => array(esc_html__('Select Column Type', 'pofo-addons') => '',
                    esc_html__('1 column', 'pofo-addons') => '1',
                    esc_html__('2 columns', 'pofo-addons') => '2',
                    esc_html__('3 columns', 'pofo-addons') => '3',
                    esc_html__('4 columns', 'pofo-addons') => '4',
                    esc_html__('6 columns', 'pofo-addons') => '6',
          ),
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery','zoom-gallery','metro-gallery') )
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__('Title', 'pofo-addons'),
          'param_name' => 'justified_title',
          'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                           esc_html__('On', 'pofo-addons') => '1',
                          ),
          'std' => '1',
          'dependency' => array( 'element' => 'image_gallery_type', 'value' => array('justified-gallery') ),
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Select spacing between columns', 'pofo-addons'),
          'param_name' => 'pofo_justified_portfolio_gap',
          'value' => '',
          'std' => '10',
          'dependency' => array( 'element' => 'image_gallery_type', 'value' => array('justified-gallery') ),
        ),
        array(
          'type' => 'textfield',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Height', 'pofo-addons'),
          'param_name' => 'pofo_justified_gallery_height',
          'value' => '',
          'std' => '400',
          'dependency' => array( 'element' => 'image_gallery_type', 'value' => array('justified-gallery') ),
        ),
        array(
          'type' => 'dropdown',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Spacing between columns', 'pofo-addons'),
          'param_name' => 'pofo_gutter_type',
          'value' => array(esc_html__( 'Select spacing between columns', 'pofo-addons') => '',
                           esc_html__( 'Gutter very small', 'pofo-addons') => 'gutter-very-small',
                           esc_html__( 'Gutter small', 'pofo-addons') => 'gutter-small',
                           esc_html__( 'Gutter medium', 'pofo-addons') => 'gutter-medium',
                           esc_html__( 'Gutter large', 'pofo-addons') => 'gutter-large',

          ),
          'std' => 'gutter-medium',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery','zoom-gallery','metro-gallery') )
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__('Lightbox gallery', 'pofo-addons'),
          'param_name' => 'lightbox_gallery',
          'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                           esc_html__('On', 'pofo-addons') => '1'
                          ),
          'std' => '1',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery','justified-gallery')),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Metro', 'pofo-addons'),
          'param_name' => 'pofo_show_metro',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('lightbox-gallery','zoom-gallery','metro-gallery')),
        ),
        array(
            'type' => 'textfield',
            'class' => '',
            'heading' => esc_html__( 'Metro grid positions', 'pofo-addons'),
            'param_name' => 'pofo_double_grid_position',
            'description' => esc_html__( 'Mention the positions (comma separated like 1, 6, 7) where that image will cover spacing of multiple columns and / or rows considering the image width and height.', 'pofo-addons' ),
            'dependency' => array( 'element' => 'pofo_show_metro', 'value' => array('1') ),
        ),
        array(
          'type' => 'animation_style',
          'heading' => esc_html__( 'CSS animation', 'pofo-addons' ),
          'param_name' => 'pofo_column_animation_style',
          'value' => '',
          'settings' => array(
            'type' => array(
              'in',
              'other',
            ),
          ),
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery','justified-gallery')),
          'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'pofo-addons' ),
        ),
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'CSS box', 'pofo-addons' ),
          'param_name' => 'css',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery')),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'pofo_bg_image_type', 
          'heading' => esc_html__( 'Background type', 'pofo-addons' ),
          'value' => array(esc_html__('Select background type', 'pofo-addons') => '',
                           esc_html__('Fix background', 'pofo-addons') => 'fix-background',
                           esc_html__('Cover background', 'pofo-addons') => 'cover-background',
                          ),
          'edit_field_class' => 'vc_col-sm-3 vc_column-with-padding',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery')),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Background position', 'pofo-addons' ),
          'param_name' => 'desktop_bg_image_position',
          'value' => $pofo_desktop_bg_image_position,
          'edit_field_class' => 'vc_col-sm-3',
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery')),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'param_name' => 'pofo_custom_separator_heading', // all params must have a unique name
          'type' => 'pofo_custom_title', // this param type
          'value' => '', // your custom markup
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery')),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Enable responsive css', 'pofo-addons'),
          'param_name' => 'pofo_enable_responsive_css',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'dependency'  => array( 'element' => 'image_gallery_type', 'value' => array('simple-image-lightbox','lightbox-gallery','zoom-gallery','metro-gallery')),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'responsive_css_editor',
          'heading' => esc_html__( 'Responsive css box', 'pofo-addons' ),
          'param_name' => 'responsive_css',
          'height' => 'no',
          'width' => 'no',
          'dependency' => array( 'element' => 'pofo_enable_responsive_css', 'value' => array('1') ),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        $pofo_vc_extra_id,
        $pofo_vc_extra_class,
    )
  ) );