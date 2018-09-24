<?php
/**
 * Shortcode Map For Progressbar
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

  vc_map(
    array(
      'name' => esc_html__( 'Progress Bar' , 'pofo-addons' ),
      'base' => 'pofo_progress',
      'category' => 'Pofo',
      'icon' => 'fas fa-bars pofo-shortcode-icon',
      'description' => esc_html__( 'Place a Progress Bar', 'pofo-addons' ),
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Progress bar style', 'pofo-addons'),
          'param_name' => 'pofo_progress_style',
          'admin_label' => true,
          'value' => array(esc_html__( 'Select progress bar style', 'pofo-addons') => '',
                           esc_html__( 'Style 1', 'pofo-addons') => 'skillbar-bar-style1',
                           esc_html__( 'Style 2', 'pofo-addons') => 'skillbar-bar-style2',
                           esc_html__( 'Style 3', 'pofo-addons') => 'skillbar-bar-style3',
                        ),
        ),
        array(
          'type' => 'pofo_preview_image',
          'heading' => esc_html__( 'Select pre-made style', 'pofo-addons'),
          'param_name' => 'pofo_progress_preview_image',
          'admin_label' => true,
          'value' => array(esc_html__( 'Select progress bar style', 'pofo-addons') => '',
                           esc_html__( 'Style 1', 'pofo-addons') => 'skillbar-bar-style1',
                           esc_html__( 'Style 2', 'pofo-addons') => 'skillbar-bar-style2',
                           esc_html__( 'Style 3', 'pofo-addons') => 'skillbar-bar-style3',
                        ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Thickness', 'pofo-addons'),
          'description' => esc_html__( 'In pixel like 1px.', 'pofo-addons'),
          'param_name' => 'pofo_progress_height',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3') ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Default color', 'pofo-addons'),
          'param_name' => 'pofo_default_color',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3') ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Progress color', 'pofo-addons'),
          'param_name' => 'pofo_progress_color',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3') ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Gradient color', 'pofo-addons'),
          'param_name' => 'pofo_gradient_color',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style3') ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Title text case', 'pofo-addons'),
          'param_name' => 'pofo_title_text_transform',
          'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                             esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                             esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                             esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                             esc_html__( 'None', 'pofo-addons' ) => 'text-none',
                            ),
          'std' => 'text-uppercase',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3') ),
        ),
        array(
          'param_name' => 'pofo_progress_values', // all params must have a unique name
          'type' => 'param_group', // this param type
          'heading' => esc_html__( 'Manage progress bars', 'pofo-addons' ),
          'value' => '',
          'params' => array(
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'pofo-addons'),
                'param_name' => 'pofo_progress_title',
                'admin_label' => true,
                'description' => esc_html__( 'Use || to break the word in new line.', 'pofo-addons' ),
              ),
              array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Value', 'pofo-addons'),
                'description' => esc_html__( 'Define value of progressbar in numeric value like 80', 'pofo-addons'),
                'param_name' => 'pofo_progress_width',
                'admin_label' => true,
              ),
          ),
          'callbacks' => array(
              'after_add' => 'vcChartParamAfterAddCallback',
          ),
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group'       => esc_html__( 'Bars', 'pofo-addons' ),
        ),
        array(
          'param_name' => 'pofo_custom_title_heading', // all params must have a unique name
          'type' => 'pofo_custom_title', // this param type
          'value' => esc_html__( 'Title Typography', 'pofo-addons' ), // your custom markup
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Font size', 'pofo-addons' ),
          'param_name' => 'pofo_title_font_size',
          'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
          'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Line height', 'pofo-addons' ),
          'param_name' => 'pofo_title_line_height',
          'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
          'param_name' => 'pofo_title_letter_spacing',
          'description' => esc_html__( 'Define letter spacing like 12px', 'pofo-addons' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'pofo_title_font_weight',
          'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
          'value' => pofo_font_weight_style(),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font italic', 'pofo-addons'),
          'param_name' => 'pofo_title_italic',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Font underline', 'pofo-addons'),
          'param_name' => 'pofo_title_underline',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => esc_html__( 'Element tag', 'pofo-addons'),
          'param_name' => 'pofo_title_element_tag',
          'value' => array(esc_html__( 'Element tag', 'pofo-addons') => '',
                           esc_html__( 'h1', 'pofo-addons') => 'h1',
                           esc_html__( 'h2', 'pofo-addons') => 'h2',
                           esc_html__( 'h3', 'pofo-addons') => 'h3',
                           esc_html__( 'h4', 'pofo-addons') => 'h4',
                           esc_html__( 'h5', 'pofo-addons') => 'h5',
                           esc_html__( 'h6', 'pofo-addons') => 'h6',
                          ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Color', 'pofo-addons' ),
          'param_name' => 'pofo_title_color',
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        array(
          'type' => 'pofo_custom_switch_option',
          'heading' => esc_html__( 'Auto responsive font size', 'pofo-addons'),
          'param_name' => 'pofo_title_enable_responsive_font',
          'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                           esc_html__( 'On', 'pofo-addons') => '1'
                          ),
          'description' => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo-addons' ),
          'edit_field_class' => 'vc_col-sm-4',
          'dependency' => array( 'element' => 'pofo_progress_style', 'value' => array('skillbar-bar-style1', 'skillbar-bar-style2', 'skillbar-bar-style3', 'skillbar-bar-style4') ),
          'group' => esc_html__( 'Typography', 'pofo-addons' ),
        ),
        $pofo_vc_extra_id,
        $pofo_vc_extra_class,
      ),
    )
  );