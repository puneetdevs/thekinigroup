<?php
/**
 * Shortcode Map For Inner Row
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Inner Row */
/*-----------------------------------------------------------------------------------*/

  vc_map( 
    array(
        'name' => esc_html__( 'Inner Row' , 'pofo-addons' ),
        'content_element' => false,
        'is_container' => true,
        'icon' => 'icon-wpb-row',
        'weight' => 1000,
        'description' => esc_html__( 'Place content elements inside the section', 'pofo-addons' ),
        'show_settings_on_create' => false,
        'base' => 'vc_row_inner',
        'js_view' => 'VcRowView',
        'category' => 'Pofo',
        'params' => array(
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Columns gap', 'pofo-addons' ),
              'param_name' => 'gap',
              'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
              ),
              'std' => '0',
              'description' => esc_html__( 'Select gap between columns in row.', 'pofo-addons' ),
            ),
            array(
              'type' => 'checkbox',
              'heading' => esc_html__( 'Equal height', 'pofo-addons' ),
              'param_name' => 'equal_height',
              'description' => esc_html__( 'If checked columns will be set to equal height.', 'pofo-addons' ),
              'value' => array( esc_html__( 'Yes', 'pofo-addons' ) => 'yes' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Content position', 'pofo-addons' ),
              'param_name' => 'content_placement',
              'value' => array(
                esc_html__( 'Default', 'pofo-addons' ) => '',
                esc_html__( 'Top', 'pofo-addons' ) => 'top',
                esc_html__( 'Middle', 'pofo-addons' ) => 'middle',
                esc_html__( 'Bottom', 'pofo-addons' ) => 'bottom',
              ),
              'description' => esc_html__( 'Select content position within columns.', 'pofo-addons' ),
            ),
            array(
              'type' => 'checkbox',
              'heading' => esc_html__( 'Disable row', 'pofo-addons' ),
              'param_name' => 'disable_element',
              // Inner param name.
              'description' => esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'pofo-addons' ),
              'value' => array( esc_html__( 'Yes', 'pofo-addons' ) => 'yes' ),
            ),


            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Position relative', 'pofo-addons'),
              'param_name' => 'position_relative',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
            ),
            array(
              'type' => 'dropdown',
              'param_name' => 'pofo_overflow_type', 
              'heading' => esc_html__( 'Overflow', 'pofo-addons' ),
              'value' => array(esc_html__('Select overflow', 'pofo-addons') => '',
                               esc_html__('Overflow visible', 'pofo-addons') => 'overflow-visible',
                               esc_html__('Overflow hidden', 'pofo-addons') => 'overflow-hidden',
                               esc_html__('Overflow auto', 'pofo-addons') => 'overflow-auto',
                              ),
            ),
            array(
              'type' => 'animation_style',
              'heading' => esc_html__( 'CSS animation', 'pofo-addons' ),
              'param_name' => 'initial_loading_animation',
              'value' => '',
              'settings' => array(
                'type' => array(
                  'in',
                  'other',
                ),
              ),
              'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'pofo-addons' ),
            ),
            array(
              'type' => 'pofo_custom_switch_option',
              'holder' => 'div',
              'class' => '',
              'heading' => esc_html__( 'Overlay', 'pofo-addons'),
              'param_name' => 'show_overlay',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'group' => esc_html__( 'Overlay', 'pofo-addons' ),
            ),
            array(
              'type' => 'colorpicker',
              'class' => '',
              'heading' => esc_html__( 'Overlay color', 'pofo-addons' ),
              'param_name' => 'pofo_row_overlay_color',
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'group' => esc_html__( 'Overlay', 'pofo-addons' ),
            ),
            array(
              'type' => 'dropdown',
              'heading' => esc_html__( 'Overlay opacity', 'pofo-addons'),
              'param_name' => 'pofo_overlay_opacity',
              'admin_label' => true,
              'value' => array( esc_html__( 'No opacity','pofo-addons') => '',
                                '0.1'  => '0.1',
                                '0.2'  => '0.2',
                                '0.3'  => '0.3',
                                '0.4'  => '0.4',
                                '0.5'  => '0.5',
                                '0.6'  => '0.6',
                                '0.7'  => '0.7',
                                '0.8'  => '0.8',
                                '0.9'  => '0.9',
                                '1.0'  => '1.0',
                              ),
              'std' => '0.7',
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'group' => esc_html__( 'Overlay', 'pofo-addons' ),
            ),
            array(
              'type' => 'textfield',
              'heading' => esc_html__( 'Z-index', 'pofo-addons'),
              'param_name' => 'pofo_z_index',
              'dependency' => array( 'element' => 'show_overlay', 'value' => array('1') ),
              'group' => esc_html__( 'Overlay', 'pofo-addons' ),
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
              'heading' => esc_html__( 'Minimum height', 'pofo-addons' ),
              'param_name' => 'desktop_height',
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
              'description' => esc_html__( 'This will enable mini dekstop, tablet and mobile css options.', 'pofo-addons' ),
              'group' => esc_html__( 'Design Options', 'pofo-addons' ),
            ),
            array(
              'type' => 'responsive_css_editor',
              'heading' => esc_html__( 'Responsive css box', 'pofo-addons' ),
              'param_name' => 'responsive_css',
              'width' => 'no',
              'dependency' => array( 'element' => 'pofo_enable_responsive_css', 'value' => array('1') ),
              'group' => esc_html__( 'Design Options', 'pofo-addons' ),
            ),
            $pofo_vc_extra_id,
            $pofo_vc_extra_class,
        ),
    )
  );