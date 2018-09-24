<?php
/**
 * Shortcode Map For Separator
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

  $pofo_hidden_markup_class = 'pofo_hidden_markup_'.time() .'_2_'.rand( 0, 100 );

  vc_map( array(
        'name' => esc_html__( 'Separator', 'pofo-addons' ),
        'base' => 'pofo_separator',
        'category' => 'Pofo',
        'icon' => 'fas fa-ellipsis-h pofo-shortcode-icon',
        'description' => esc_html__( 'Create a separator', 'pofo-addons' ),
        'params' => array(
          array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Color', 'pofo-addons' ),
              'param_name' => 'pofo_sep_bg_color',
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'desktop_alignment',
            'heading' => esc_html__( 'Alignment', 'pofo-addons' ),
            'value' => array(esc_html__( 'No align', 'pofo-addons') => '',
                             esc_html__( 'Left align', 'pofo-addons') => 'pull-left',
                             esc_html__( 'Right align', 'pofo-addons') => 'pull-right',
                             esc_html__( 'Center align', 'pofo-addons') => 'center-col',
                            ),
            'std' => 'center-col',
          ),
          array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'CSS Box', 'pofo-addons' ),
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
            'heading' => esc_html__( 'Minimum height', 'pofo-addons' ),
            'param_name' => 'desktop_height',
            'value' => '',
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
            'heading' => esc_html__( 'Enable Responsive CSS', 'pofo-addons'),
            'param_name' => 'pofo_enable_responsive_css',
            'value' => array(esc_html__( 'OFF', 'pofo-addons') => '0', 
                             esc_html__( 'ON', 'pofo-addons') => '1'
                            ),
            'group' => esc_html__( 'Design Options', 'pofo-addons' ),
          ),
          array(
            'type' => 'responsive_css_editor',
            'heading' => esc_html__( 'Responsive CSS Box', 'pofo-addons' ),
            'param_name' => 'responsive_css',
            'dependency' => array( 'element' => 'pofo_enable_responsive_css', 'value' => array('1') ),
            'group' => esc_html__( 'Design Options', 'pofo-addons' ),
          ),
          $pofo_vc_extra_id,
          $pofo_vc_extra_class, 
  )));