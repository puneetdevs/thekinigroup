<?php
/**
 * Shortcode Map For Client Image Slider
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Client Image Slider */
/*-----------------------------------------------------------------------------------*/

  vc_map( 
    array(
        'name' => esc_html__( 'Client Logo Slider' , 'pofo-addons' ), //Name of your shortcode for human reading inside element list
        'base' => 'pofo_client_image_slider', //Shortcode tag. For [my_shortcode] shortcode base is my_shortcode
        'description' => esc_html__( 'Create a client image slider', 'pofo-addons' ), //Short description of your element, it will be visible in 'Add element' window
        'icon' => 'fas fa-arrows-alt-h pofo-shortcode-icon', //URL or CSS class with icon image.
        'category' => 'Pofo',
        'params' => array( //List of shortcode attributes. Array which holds your shortcode params, these params will be editable in shortcode settings page
            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Pagination', 'pofo-addons'),
              'param_name' => 'show_pagination',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'std' => '1',
              'description' => esc_html__( 'Select ON to show pagination in slider', 'pofo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Pagination style', 'pofo-addons'),
              'param_name' => 'show_pagination_style',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select pagination style', 'pofo-addons') => '',
                             esc_html__( 'Dot style', 'pofo-addons') => '0',
                             esc_html__( 'Line style', 'pofo-addons') => '1',
                            ),
              'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Pagination color style', 'pofo-addons'),
                'param_name' => 'show_pagination_color_style',
                'admin_label' => true,
                'value' => array(esc_html__( 'Select pagination color style', 'pofo-addons') => '',
                                 esc_html__( 'Dark style', 'pofo-addons') => '0',
                                 esc_html__( 'Light style', 'pofo-addons') => '1'
                                ),
                'dependency' => array( 'element' => 'show_pagination', 'value' => array('1') ),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Navigation', 'pofo-addons'),
              'param_name' => 'show_navigation',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'std' => '1',
              'description' => esc_html__( 'Select ON to show navigation in slider', 'pofo-addons' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Navigation style', 'pofo-addons'),
                'param_name' => 'show_navigation_style',
                'admin_label' => true,
                'value' => array(esc_html__( 'Select navigation style', 'pofo-addons') => '',
                                 esc_html__( 'Next/Prev long arrow', 'pofo-addons') => '0',
                                 esc_html__( 'Next/Prev black arrow', 'pofo-addons') => '1',
                                 esc_html__( 'Next/Prev white arrow', 'pofo-addons') => '2'
                                ),
                'dependency' => array( 'element' => 'show_navigation', 'value' => array('1') ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Cursor color style', 'pofo-addons'),
              'param_name' => 'show_cursor_color_style',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select cursor color style', 'pofo-addons') => '',
                             esc_html__( 'White cursor', 'pofo-addons') => 'white-move',
                             esc_html__( 'Black cursor', 'pofo-addons') => 'black-move',
                             esc_html__( 'Default cursor', 'pofo-addons') => 'no-move',
                            ),
            ),
            array(
              'param_name' => 'pofo_image_slides', // all params must have a unique name
              'type' => 'param_group', // this param type
              'heading' => esc_html__( 'Slide', 'pofo-addons' ),
              'value' => '',
              'params' => array(
                  array(
                      'type' => 'attach_image',
                      'heading' => esc_html__( 'Image', 'pofo-addons'),
                      'param_name' => 'pofo_image',
                      'holder' => 'div'
                  ),
                  array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Image thumbnail size', 'pofo-addons' ),
                    'param_name' => 'pofo_image_srcset',
                    'value' => pofo_get_thumbnail_image_sizes(),
                    'std' => 'full',
                  ),
              ),
              'callbacks' => array(
                  'after_add' => 'vcChartParamAfterAddCallback',
              ),
              'group'       => 'Slides',
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Slides per view in desktop', 'pofo-addons'),
              'param_name' => 'slides_per_view_desktop',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select slide per view', 'pofo-addons') => '',
                             esc_html__( '1', 'pofo-addons') => '1',
                             esc_html__( '2', 'pofo-addons') => '2',
                             esc_html__( '3', 'pofo-addons') => '3',
                             esc_html__( '4', 'pofo-addons') => '4',
                             esc_html__( '5', 'pofo-addons') => '5',
                             esc_html__( '6', 'pofo-addons') => '6',
                            ),
              'std' => '4',
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Slides per view in mini desktop', 'pofo-addons'),
              'param_name' => 'slides_per_view_mini_desktop',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select slide per view', 'pofo-addons') => '',
                             esc_html__( '1', 'pofo-addons') => '1',
                             esc_html__( '2', 'pofo-addons') => '2',
                             esc_html__( '3', 'pofo-addons') => '3',
                             esc_html__( '4', 'pofo-addons') => '4',
                             esc_html__( '5', 'pofo-addons') => '5',
                             esc_html__( '6', 'pofo-addons') => '6',
                            ),
              'std' => '3',
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Slides per view in tablet', 'pofo-addons'),
              'param_name' => 'slides_per_view_tablet',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select slide per view', 'pofo-addons') => '',
                             esc_html__( '1', 'pofo-addons') => '1',
                             esc_html__( '2', 'pofo-addons') => '2',
                             esc_html__( '3', 'pofo-addons') => '3',
                             esc_html__( '4', 'pofo-addons') => '4',
                             esc_html__( '5', 'pofo-addons') => '5',
                             esc_html__( '6', 'pofo-addons') => '6',
                            ),
              'std' => '2',
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Slides per view in mobile', 'pofo-addons'),
              'param_name' => 'slides_per_view_mobile',
              'admin_label' => true,
              'value' => array(esc_html__( 'Select slide per view', 'pofo-addons') => '',
                             esc_html__( '1', 'pofo-addons') => '1',
                             esc_html__( '2', 'pofo-addons') => '2',
                             esc_html__( '3', 'pofo-addons') => '3',
                             esc_html__( '4', 'pofo-addons') => '4',
                             esc_html__( '5', 'pofo-addons') => '5',
                             esc_html__( '6', 'pofo-addons') => '6',
                            ),
              'std' => '1',
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Transition speed', 'pofo-addons'),
              'param_name' => 'slidespeed',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'Enter slide speed time like 500, where 1000 = 1 second', 'pofo-addons'),
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Auto play', 'pofo-addons'),
              'param_name' => 'autoplay',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'description' => esc_html__( 'Select ON to auto play slider', 'pofo-addons' ),
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Delay time', 'pofo-addons'),
              'param_name' => 'slidedelay',
              'admin_label' => true,
              'value' => '',
              'description' => esc_html__( 'Enter delay time (before switching to other slide) like 500, where 1000 = 1 second', 'pofo-addons'),
              'dependency'  => array( 'element' => 'autoplay', 'value' => array('1') ),
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Loop', 'pofo-addons'),
              'param_name' => 'autoloop',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'description' => esc_html__( 'Select ON to autoloop slider', 'pofo-addons' ),
              'group' => esc_html__( 'Slider Configuration', 'pofo-addons'),
            ),
            array(
               'type'        => 'textfield',
               'heading'     => esc_html__( 'Element ID', 'pofo-addons' ),
               'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %s).', 'pofo-addons'), '<a target="_blank" href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>'),
               'param_name'  => 'pofo_slider_id',
               'group'       => esc_html__( 'Extras', 'pofo-addons' ),
            ),
            array(
               'type'        => 'textfield',
               'heading'     => esc_html__( 'Extra class name', 'pofo-addons' ),
               'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'pofo-addons' ),
               'param_name'  => 'pofo_slider_class',
               'group'       => esc_html__( 'Extras', 'pofo-addons' ),
            ),
        ),
    )
  );