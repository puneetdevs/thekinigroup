<?php
/**
 * Map For Timer
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Timer */
/*-----------------------------------------------------------------------------------*/

vc_map( array(
      'name' => esc_html__( 'Countdown Timer', 'pofo-addons' ),
      'base' => 'pofo_timer',
      'category' => 'Pofo',
      'icon' => 'fas fa-hourglass pofo-shortcode-icon',
      'description' => esc_html__( 'Create a timer', 'pofo-addons' ),
      'params' => array(
          array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'pofo-addons'),
            'param_name' => 'pofo_timer_style',
            'value' => array(esc_html__('Select timer style', 'pofo-addons') => '',
                      esc_html__('Timer style 1', 'pofo-addons') => 'timer1',
                      esc_html__('Timer style 2', 'pofo-addons') => 'timer2',
            ),
          ),
          array(
            'type' => 'pofo_preview_image',
            'heading' => esc_html__( 'Select pre-made style', 'pofo-addons'),
            'param_name' => 'pofo_timer_preview_image',
            'admin_label' => true,
            'value' => array(esc_html__('Select timer style', 'pofo-addons') => '',
                      esc_html__('Timer style 1', 'pofo-addons') => 'timer1',
                      esc_html__('Timer style 2', 'pofo-addons') => 'timer2',
            ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Timer end date', 'pofo-addons'),
            'param_name' => 'pofo_timer_date',
            'admin_label' => true,
            'description' => esc_html__( 'Enter end date in yyyy/mm/dd format like 2020/10/25', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'pofo_custom_switch_option',
            'heading' => esc_html__( 'Separator', 'pofo-addons'),
            'param_name' => 'pofo_enable_separator',
            'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                             esc_html__( 'On', 'pofo-addons') => '1'
                            ),
            'std' => '1',
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Hours text', 'pofo-addons'),
            'param_name' => 'pofo_hour_text',
            'std' => esc_html__('Hours', 'pofo-addons'),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Minutes text', 'pofo-addons'),
            'param_name' => 'pofo_minute_text',
            'std' => esc_html__('Minutes', 'pofo-addons'),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Days text', 'pofo-addons'),
            'param_name' => 'pofo_day_text',
            'std' => esc_html__('Days', 'pofo-addons'),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__('Seconds text', 'pofo-addons'),
            'param_name' => 'pofo_second_text',
            'std' => esc_html__('Seconds', 'pofo-addons'),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Separator thickness', 'pofo-addons' ),
            'param_name' => 'pofo_separator_width',
            'dependency' => array( 'element' => 'pofo_enable_separator', 'value' => array('1') ),
            'description' => esc_html__( 'In pixel like 2px', 'pofo-addons' ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Separator height', 'pofo-addons' ),
            'param_name' => 'pofo_separator_height',
            'dependency' => array( 'element' => 'pofo_enable_separator', 'value' => array('1') ),
            'description' => esc_html__( 'In pixel like 20px', 'pofo-addons' ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Separator color', 'pofo-addons' ),
            'param_name' => 'pofo_separator_color',
            'dependency' => array( 'element' => 'pofo_enable_separator', 'value' => array('1') ),
            'group' => esc_html__( 'Style', 'pofo-addons' ),
          ),
          array(
            'param_name' => 'pofo_custom_timer_number_heading', // all params must have a unique name
            'type' => 'pofo_custom_title', // this param type
            'value' => esc_html__( 'Timer number typography', 'pofo-addons' ), // your custom markup
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size', 'pofo-addons' ),
            'param_name' => 'pofo_timer_number_font_size',
            'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
            'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'pofo_timer_number_font_weight',
            'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
            'value' => pofo_font_weight_style(),
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Color', 'pofo-addons' ),
            'param_name' => 'pofo_timer_number_color',
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'param_name' => 'pofo_custom_timer_text_heading', // all params must have a unique name
            'type' => 'pofo_custom_title', // this param type
            'value' => esc_html__( 'Timer text typography', 'pofo-addons' ), // your custom markup
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Font size', 'pofo-addons' ),
            'param_name' => 'pofo_timer_text_font_size',
            'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
            'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'dropdown',
            'param_name' => 'pofo_timer_text_font_weight',
            'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
            'value' => pofo_font_weight_style(),
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          array(
            'type' => 'colorpicker',
            'class' => '',
            'heading' => esc_html__( 'Color', 'pofo-addons' ),
            'param_name' => 'pofo_timer_text_color',
            'edit_field_class' => 'vc_col-sm-4',
            'group' => esc_html__( 'Typography', 'pofo-addons' ),
            'dependency'  => array( 'element' => 'pofo_timer_style', 'value' => array('timer1','timer2') ),
          ),
          $pofo_vc_extra_id,
          $pofo_vc_extra_class,
      )
));