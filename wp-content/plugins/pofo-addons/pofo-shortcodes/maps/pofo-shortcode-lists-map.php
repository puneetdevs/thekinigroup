<?php
/**
 * Shortcode Map For Lists
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Lists */
/*-----------------------------------------------------------------------------------*/

  vc_map( 
      array(
      'name' => esc_html__( 'Lists' , 'pofo-addons' ), //Name of your shortcode for human reading inside element list
      'base' => 'pofo_lists', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
      'description' => esc_html__( 'Place a list value', 'pofo-addons' ), //Short description of your element, it will be visible in 'Add element' window
      'icon' => 'fas fa-list pofo-shortcode-icon', //URL or CSS class with icon image.
      'category' => 'Pofo',
      'params' => array(
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'pofo-addons'),
            'param_name' => 'pofo_list_style',
            'admin_label' => true,
            'value' => array( esc_html__( 'Select style', 'pofo-addons') => '',
                              esc_html__( 'List style 1', 'pofo-addons') => 'list-style-1',
                              esc_html__( 'List style 2', 'pofo-addons') => 'list-style-2',
                              esc_html__( 'List style 3', 'pofo-addons') => 'list-style-3',
                              esc_html__( 'List style 4', 'pofo-addons') => 'list-style-4',
                              esc_html__( 'List style 5', 'pofo-addons') => 'list-style-5',
                              esc_html__( 'List style 6', 'pofo-addons') => 'list-style-6',
                              esc_html__( 'List style 7', 'pofo-addons') => 'list-style-7',
                            ),
          ),
          array(
            'type' => 'pofo_preview_image',
            'heading' => esc_html__( 'Select pre-made style for block', 'pofo-addons'),
            'param_name' => 'pofo_list_preview_image',
            'admin_label' => true,
            'value' => array( esc_html__( 'List image', 'pofo-addons') => '',
                              esc_html__( 'List style 1', 'pofo-addons') => 'list-style-1',
                              esc_html__( 'List style 2', 'pofo-addons') => 'list-style-2',
                              esc_html__( 'List style 3', 'pofo-addons') => 'list-style-3',
                              esc_html__( 'List style 4', 'pofo-addons') => 'list-style-4',
                              esc_html__( 'List style 5', 'pofo-addons') => 'list-style-5',
                              esc_html__( 'List style 6', 'pofo-addons') => 'list-style-6',
                              esc_html__( 'List style 7', 'pofo-addons') => 'list-style-7',
                            ),
          ),
          array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Text case', 'pofo-addons'),
            'param_name' => 'pofo_text_transform',
            'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                               esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                               esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                               esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                               esc_html__( 'None', 'pofo-addons' ) => 'text-none',
                              ),
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-1', 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5' , 'list-style-6', 'list-style-7') ),
          ),
          array(
            'param_name' => 'pofo_list_values', // all params must have a unique name
            'type' => 'param_group', // this param type
            'heading' => esc_html__( 'Manage list content', 'pofo-addons' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'List content text', 'pofo-addons' ),
                    'param_name' => 'pofo_list_value',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Subtitle for list style 7', 'pofo-addons' ),
                    'param_name' => 'pofo_list_subtitle',
                    'admin_label' => true,
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback',
            ),
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-1', 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5' , 'list-style-6', 'list-style-7') ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Text color', 'pofo-addons' ),
            'param_name' => 'pofo_text_color',
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-1', 'list-style-2', 'list-style-3', 'list-style-4', 'list-style-5' , 'list-style-6', 'list-style-7') ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Subtitle color', 'pofo-addons' ),
            'param_name' => 'pofo_subtitle_color',
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-7') ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Icon Color', 'pofo-addons' ),
            'param_name' => 'pofo_bulleting_color',
            'std' => '#ff214f',
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-4', 'list-style-5' ) ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Separator color', 'pofo-addons' ),
            'param_name' => 'pofo_border_color',
            'dependency' => array( 'element' => 'pofo_list_style', 'value' => array( 'list-style-4', 'list-style-5', 'list-style-6', 'list-style-7') ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          $pofo_vc_extra_id,
          $pofo_vc_extra_class,
        ),
      )
  );