<?php
/**
 * Map For Alert Message
 *
 * @package Pofo
 */
?>
<?php
vc_map( 
  array(
    'name' => esc_html__('Alert Message', 'pofo-addons'),
    'base' => 'pofo_alert_massage',
    'category' => 'Pofo',
    'description' => esc_html__( 'Create an alert message', 'pofo-addons' ),
    'icon' => 'fas fa-exclamation-triangle pofo-shortcode-icon', //URL or CSS class with icon image.
    'params' => array(
    array(
        'type' => 'dropdown',
        'holder' => 'div',
        'class' => '',
        'heading' => esc_html__('Style', 'pofo-addons'),
        'param_name' => 'pofo_alert_massage_premade_style',
        'value' => array(esc_html__('Select style', 'pofo-addons') => '',
                         esc_html__('Style 1', 'pofo-addons') => 'alert-massage-style-1',
                         esc_html__('Style 2', 'pofo-addons') => 'alert-massage-style-2',
                         esc_html__('Style 3', 'pofo-addons') => 'alert-massage-style-3',
                      ),
    ),
    array(
        'type' => 'pofo_preview_image',
        'heading' => esc_html__('Style for tab', 'pofo-addons'),
        'param_name' => 'alert_massage_preview_image',
        'admin_label' => true,
        'value' => array(esc_html__('Message box image', 'pofo-addons') => '',
                         esc_html__('Style 1', 'pofo-addons') => 'alert-massage-style-1',
                         esc_html__('Style 2', 'pofo-addons') => 'alert-massage-style-2',
                         esc_html__('Style 3', 'pofo-addons') => 'alert-massage-style-3',
                      ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Type', 'pofo-addons'),
        'param_name' => 'pofo_alert_massage_type',
        'admin_label' => true,
        'value' => array(esc_html__('Select type', 'pofo-addons') => '',
                         esc_html__('Success message', 'pofo-addons') => 'success',
                         esc_html__('Info message', 'pofo-addons') => 'info',
                         esc_html__('Warning message', 'pofo-addons') => 'warning',
                         esc_html__('Danger message', 'pofo-addons') => 'danger',
                        ),
        'dependency'  => array( 'element' => 'pofo_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3')),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Message (in bold)', 'pofo-addons'),
        'param_name' => 'pofo_highliget_title',
        'admin_label' => true,
        'dependency'  => array( 'element' => 'pofo_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3')),
    ),
    array(
        'type' => 'textarea',
        'heading' => esc_html__('Description', 'pofo-addons'),
        'param_name' => 'pofo_subtitle',
        'admin_label' => true,
        'dependency'  => array( 'element' => 'pofo_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3')),
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__( 'Content case', 'pofo-addons'),
      'param_name' => 'pofo_text_transform',
      'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                         esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                         esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                         esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                         esc_html__( 'None', 'pofo-addons' ) => 'text-none',
                        ),
        'dependency'  => array( 'element' => 'pofo_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3')),
    ),
    array(
        'type' => 'pofo_custom_switch_option',
        'holder' => 'div',
        'class' => '',
        'heading' => esc_html__('Close button', 'pofo-addons'),
        'param_name' => 'show_close_button',
        'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                           esc_html__('On', 'pofo-addons') => '1'
                          ),
        'std' => '1',
        'description' => esc_html__( 'Select ON to show close button in Message', 'pofo-addons' ),
        'dependency'  => array( 'element' => 'pofo_alert_massage_premade_style', 'value' => array('alert-massage-style-1','alert-massage-style-2','alert-massage-style-3')),
    ),
    $pofo_vc_extra_id,
    $pofo_vc_extra_class,
    ),
  ) 
);