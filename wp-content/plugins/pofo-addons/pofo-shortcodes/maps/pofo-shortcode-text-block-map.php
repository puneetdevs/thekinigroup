<?php
/**
 * Shortcode Map For Text Block
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

  vc_map( array(
    'name' => esc_html__( 'Text Block', 'pofo-addons' ),
    'base' => 'vc_column_text',
    'icon' => 'icon-wpb-layer-shape-text',
    'wrapper_class' => 'clearfix',
    'category' => 'Pofo',
    'description' => esc_html__( 'A block of text with WYSIWYG editor', 'pofo-addons' ),
    'params' => array(
        array(
          'type' => 'textarea_html',
          'holder' => 'div',
          'heading' => esc_html__( 'Text', 'pofo-addons' ),
          'param_name' => 'content',
          'value' => esc_html__( 'I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'pofo-addons' )
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Text color', 'pofo-addons' ),
          'param_name' => 'pofo_text_color',
        ),
        array(
          'type' => 'css_editor',
          'heading' => esc_html__( 'CSS box', 'pofo-addons' ),
          'param_name' => 'css',
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
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Background position', 'pofo-addons' ),
          'param_name' => 'desktop_bg_image_position',
          'value' => $pofo_desktop_bg_image_position,
          'edit_field_class' => 'vc_col-sm-3',
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Width', 'pofo-addons' ),
          'param_name' => 'desktop_width',
          'value' => '',
          'edit_field_class' => 'vc_col-sm-3',
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'param_name' => 'pofo_custom_separator_heading', // all params must have a unique name
          'type' => 'pofo_custom_title', // this param type
          'value' => '', // your custom markup
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'holder' => 'div',
          'class' => '',
          'heading' => esc_html__( 'Enable responsive css box', 'pofo-addons'),
          'param_name' => 'pofo_enable_responsive_css',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        array(
          'type' => 'responsive_css_editor',
          'heading' => esc_html__( 'Responsive css box', 'pofo-addons' ),
          'param_name' => 'responsive_css',
          'height' => 'no',
          'dependency' => array( 'element' => 'pofo_enable_responsive_css', 'value' => array('1') ),
          'group' => esc_html__( 'Design Options', 'pofo-addons' ),
        ),
        $pofo_vc_extra_id,
        $pofo_vc_extra_class,
      )
  ) );