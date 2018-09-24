<?php
/**
 * Map For Tabs
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Tabs */
/*-----------------------------------------------------------------------------------*/

$tab_id_1 = time() . '-1-' . rand( 0, 100 );
$tab_id_2 = time() . '-2-' . rand( 0, 100 );
vc_map( array(
  'name' => esc_html__( 'Tabs', 'pofo-addons' ),
  'base' => 'vc_tabs',
  'category' => 'Pofo',
  'show_settings_on_create' => false,
  'is_container' => true,
  'icon' => 'icon-wpb-ui-tab-content',
  //'category' => esc_html__( 'Content', 'pofo-addons' ),
  'description' => esc_html__( 'Place tabbed content', 'pofo-addons' ),
  'params' => array(
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Tabs style', 'pofo-addons'),
      'param_name' => 'tabs_style',
      'admin_label' => true,
      'class' => 'pofo_select_preview_image',
      'value' => array(esc_html__('Select tabs style', 'pofo-addons') => '',
                       esc_html__('Tab style 1', 'pofo-addons') => 'tab-style1',
                       esc_html__('Tab style 2', 'pofo-addons') => 'tab-style2', 
                       esc_html__('Tab style 3', 'pofo-addons') => 'tab-style3',
                       esc_html__('Tab style 4', 'pofo-addons') => 'tab-style4',
                      ),
      'std' => 'tab-style2',
    ),
    array(
      'type' => 'pofo_preview_image',
      'heading' => esc_html__('Select pre-made style for tab', 'pofo-addons'),
      'param_name' => 'tab_preview_image',
      'value' => array(esc_html__('Tab image', 'pofo-addons') => '',
                       esc_html__('Tab image 1', 'pofo-addons') => 'tab-style1',
                       esc_html__('Tab image 2', 'pofo-addons') => 'tab-style2',
                       esc_html__('Tab image 3', 'pofo-addons') => 'tab-style3',
                       esc_html__('Tab style 4', 'pofo-addons') => 'tab-style4',
                      ),
      'std' => 'tab-style2',
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Active tab', 'pofo-addons' ),
      'param_name' => 'active_tab',
      'value' => '1',
      'description' => esc_html__( 'Enter active tab number.', 'pofo-addons' ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'tabs_alignment',
      'heading' => esc_html__('Tabs alignment', 'pofo-addons' ),
      'value' => array(esc_html__('No align', 'pofo-addons') => '',
                       esc_html__('Left align', 'pofo-addons') => 'text-left',
                       esc_html__('Right align', 'pofo-addons') => 'text-right',
                       esc_html__('Center align', 'pofo-addons') => 'text-center',
                      ),
      'description' => esc_html__( 'Select tabs section title alignment.', 'pofo-addons' ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__( 'Text case', 'pofo-addons'),
      'param_name' => 'text_transform',
      'value' => array(  esc_html__('Select', 'pofo-addons') => '', 
                         esc_html__('Lowercase', 'pofo-addons') => 'text-lowercase',
                         esc_html__('Uppercase', 'pofo-addons') => 'text-uppercase',
                         esc_html__('Capitalize', 'pofo-addons') => 'text-capitalize',
                         esc_html__('None', 'pofo-addons') => 'text-none',
                        ),
      'std' => 'text-uppercase',
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
    ),
    array(
      'type' => 'dropdown',
      'heading' => esc_html__( 'Icon size', 'pofo-addons'),
      'param_name' => 'pofo_icon_size',
      'std' => 'icon-medium',
      'admin_label' => true,
      'value' => array(esc_html__( 'Default', 'pofo-addons') => '',
                       esc_html__( 'Extra large', 'pofo-addons') => 'icon-extra-large', 
                       esc_html__( 'Large', 'pofo-addons') => 'icon-large',
                       esc_html__( 'Extra medium', 'pofo-addons') => 'icon-extra-medium',
                       esc_html__( 'Medium', 'pofo-addons') => 'icon-medium',
                       esc_html__( 'Small', 'pofo-addons') => 'icon-small',
                       esc_html__( 'Extra small', 'pofo-addons') => 'icon-extra-small',
                      ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
    ),
    array(
      'param_name' => 'pofo_custom_title_heading', // all params must have a unique name
      'type' => 'pofo_custom_title', // this param type
      'value' => esc_html__( 'Title Typography', 'pofo-addons' ), // your custom markup
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Font size', 'pofo-addons' ),
      'param_name' => 'pofo_title_font_size',
      'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4 vc_column-with-padding',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Line height', 'pofo-addons' ),
      'param_name' => 'pofo_title_line_height',
      'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Letter spacing', 'pofo-addons' ),
      'param_name' => 'pofo_title_letter_spacing',
      'description' => esc_html__( 'Define letter spacing like 12px', 'pofo-addons' ),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'dropdown',
      'param_name' => 'pofo_title_font_weight',
      'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
      'value' => pofo_font_weight_style(),
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
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
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
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
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => esc_html__( 'Color', 'pofo-addons' ),
      'param_name' => 'pofo_title_color',
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => esc_html__( 'Active Color', 'pofo-addons' ),
      'param_name' => 'pofo_title_active_color',
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
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
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style1', 'tab-style2', 'tab-style3', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => esc_html__( 'Background Color', 'pofo-addons' ),
      'param_name' => 'pofo_title_bg_color',
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style2', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    array(
      'type' => 'colorpicker',
      'class' => '',
      'heading' => esc_html__( 'Active Background Color', 'pofo-addons' ),
      'param_name' => 'pofo_title_active_bg_color',
      'dependency' => array( 'element' => 'tabs_style', 'value' => array( 'tab-style2', 'tab-style4' ) ),
      'edit_field_class' => 'vc_col-sm-4',
      'group' => esc_html__( 'Typography', 'pofo-addons' ),
    ),
    $pofo_vc_extra_id,
    $pofo_vc_extra_class,
  ),
  'custom_markup' => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
                      <ul class="tabs_controls">
                      </ul>
                      %content%
                      </div>',
  'default_content' => '[vc_tab title="' . esc_html__( 'Tab 1', 'pofo-addons' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
                        [vc_tab title="' . esc_html__( 'Tab 2', 'pofo-addons' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]',
  'js_view' => 'VcTabsView'
) );

vc_map( array(
  'name' => esc_html__( 'Tab Item', 'pofo-addons' ),
  'base' => 'vc_tab',
  'category' => 'Pofo',
  'allowed_container_element' => 'vc_row',
  'is_container' => true,
  'content_element' => false,
  'params' => array(
    array(
      'type' => 'tab_id',
      'heading' => esc_html__( 'ID', 'pofo-addons' ),
      'param_name' => 'tab_id'
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'heading' => esc_html__('Title', 'pofo-addons'),
      'param_name' => 'show_title',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0',
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__( 'Title text', 'pofo-addons' ),
      'param_name' => 'title',
      'value' => '',
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'heading' => esc_html__('Icon / Image', 'pofo-addons'),
      'param_name' => 'show_icon',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0',
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'heading' => esc_html__('Custom icon image', 'pofo-addons'),
      'param_name' => 'custom_tab_icon',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0',
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'dependency' => array( 'element' => 'show_icon', 'value' => '1' ),
    ),
    array(
      'type' => 'attach_image',
      'heading' => esc_html__('Custom image', 'pofo-addons'),
      'param_name' => 'custom_tab_icon_image',
      'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '1' ),
      'description' => esc_html__( 'Recommended size: Extra Large - 60px X 60px, Large - 50px X 50px, Extra Medium - 40px X 40px, Medium - 35px X 35px, Small - 24px X 24px, Extra Small - 16px X 16px', 'pofo-addons' ),
    ),
    array(
      'type' => 'pofo_icon',
      'heading' => esc_html__('Font icon', 'pofo-addons'),
      'param_name' => 'tab_icon',
      'admin_label' => true,
      'dependency' => array( 'element' => 'custom_tab_icon', 'value' => '0' ),
    ),
  ),
  'js_view' => 'VcTabView'
) );