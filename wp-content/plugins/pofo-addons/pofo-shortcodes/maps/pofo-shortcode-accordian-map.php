<?php
/**
 * Shortcode Map For Accordian
 *
 * @package Pofo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Accordian */
/*-----------------------------------------------------------------------------------*/

  vc_map( 
    array(
        'icon' => 'pofo-shortcode-icon fas fa-indent',
        'name' => esc_html__( 'Accordion' , 'pofo-addons' ),
        'base' => 'pofo_accordion',
        'category' => 'Pofo',
        'description' => esc_html__( 'Create an accordion', 'pofo-addons' ),
        'params'   => array(
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Style', 'pofo-addons' ),
              'param_name' => 'pofo_accordion_style',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select accordion style', 'pofo-addons') => '',
                        esc_html__( 'Accordion style 1', 'pofo-addons') => 'accordion-style1',
                        esc_html__( 'Accordion style 2', 'pofo-addons') => 'accordion-style2',
                        esc_html__( 'Toggles style 1', 'pofo-addons') => 'toggles-style1',
                      ),
            ),
            array(
              'type' => 'pofo_preview_image',
              'heading' => esc_html__( 'Select pre-made style', 'pofo-addons'),
              'param_name' => 'accordion_preview_image',
              'admin_label' => true,
              'value' => array(esc_html__( 'Accordion image', 'pofo-addons') => '',
                               esc_html__( 'Accordion image 1', 'pofo-addons') => 'accordion-style1',
                               esc_html__( 'Accordion image 2', 'pofo-addons') => 'accordion-style2',
                               esc_html__( 'Toggles image 1', 'pofo-addons') => 'toggles-style1',
                              ),
            ),
            array(
              'param_name' => 'pofo_accordion', // all params must have a unique name
              'type' => 'param_group', // this param type
              'heading' => esc_html__( 'Manage accordion slides', 'pofo-addons' ),
              'value' => '',
              'params' => array(
                  array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'pofo-addons' ),
                    'param_name' => 'pofo_accordion_title',
                    'admin_label' => true,
                    'edit_field_class' => 'vc_col-sm-6 vc_column-with-padding',
                    'description' => esc_html__( 'Use || to break the word in new line.', 'pofo-addons' ),
                  ),
                  array(
                    'type' => 'checkbox',
                    'heading' => esc_html__( 'Active / default open slide?', 'pofo-addons'),
                    'param_name' => 'pofo_accordion_active',
                    'admin_label' => true,
                    'edit_field_class' => 'vc_col-sm-6',
                    'value' => array( esc_html__( 'Yes', 'pofo-addons' ) => '1' ),
                  ),
                  array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'pofo-addons'),
                    'param_name' => 'pofo_content',
                  ),
              ),
              'callbacks' => array(
                  'after_add' => 'vcChartParamAfterAddCallback',
              ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Title background color', 'pofo-addons' ),
              'param_name' => 'pofo_title_bg_color',
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style2') ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Number color', 'pofo-addons' ),
              'param_name' => 'pofo_number_color',
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style2') ),
            ),
            array(
              'param_name'  => 'pofo_custom_title_heading', // all params must have a unique name
              'type'        => 'pofo_custom_title', // this param type
              'value'       => esc_html__( 'Title typography', 'pofo-addons' ), // your custom markup
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'group'       => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Font size', 'pofo-addons' ),
              'param_name' => 'pofo_title_font_size',
              'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Line height', 'pofo-addons' ),
              'param_name' => 'pofo_title_line_height',
              'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
              'param_name' => 'pofo_title_letter_spacing',
              'description' => esc_html__( 'In pixel like 1px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'pofo_title_font_weight',
              'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
              'value' => pofo_font_weight_style(),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'heading' => esc_html__( 'Font italic', 'pofo-addons'),
              'param_name' => 'pofo_title_italic',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'heading' => esc_html__( 'Font underline', 'pofo-addons'),
              'param_name' => 'pofo_title_underline',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0',
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Color', 'pofo-addons' ),
              'param_name' => 'pofo_title_color',
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
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
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'param_name' => 'pofo_custom_content_heading', // all params must have a unique name
              'type' => 'pofo_custom_title', // this param type
              'value' => esc_html__( 'Content typography', 'pofo-addons' ), // your custom markup
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Font size', 'pofo-addons' ),
              'param_name' => 'pofo_content_font_size',
              'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Line height', 'pofo-addons' ),
              'param_name' => 'pofo_content_line_height',
              'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
              'param_name' => 'pofo_content_letter_spacing',
              'description' => esc_html__( 'In pixel like 1px.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'pofo_content_font_weight',
              'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
              'value' => pofo_font_weight_style(),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Color', 'pofo-addons' ),
              'param_name' => 'pofo_content_color',
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'heading' => esc_html__( 'Auto responsive font size', 'pofo-addons'),
              'param_name' => 'pofo_content_enable_responsive_font',
              'value' => array(esc_html__( 'NO', 'pofo-addons') => '0',
                               esc_html__( 'YES', 'pofo-addons') => '1'
                              ),
              'description' => esc_html__( 'If ON then it will display font size automatically as per device size instead of above mentioned fixed font size in all devices.', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_accordion_style', 'value' => array('accordion-style1', 'accordion-style2', 'toggles-style1') ),
              'edit_field_class' => 'vc_col-sm-4',
              'group' => esc_html__( 'Typography', 'pofo-addons' ),
            ),
            $pofo_vc_extra_id,
            $pofo_vc_extra_class,
        ),
    )
  );