<?php
/**
 * Shortcode Map For Portfolio Filter
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio Filter */
/*-----------------------------------------------------------------------------------*/

  $portfolio_filter_class = 'pofo_portfolio_filter_'.time() . '-2-' . rand( 0, 100 );
  vc_map( array(
    'name' => esc_html__( 'Portfolio Filter', 'pofo-addons'),
    'description' => esc_html__( 'Place portfolio filter list', 'pofo-addons' ),
    'icon' => 'fas fa-filter pofo-shortcode-icon',
    'base' => 'pofo_portfolio_filter',
    'category' => 'Pofo',
    'params' => array(
        array(
          'type' => 'hidden',
          'heading' => esc_html__( 'Text', 'pofo-addons' ),
          'param_name' => 'pofo_token_class',
          'value' => $portfolio_filter_class,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Style', 'pofo-addons'),
            'param_name' => 'pofo_portfolio_filter_style',
            'value' => array(esc_html__( 'Select style', 'pofo-addons') => '',
                             esc_html__( 'Style 1', 'pofo-addons') => 'filter-style-1',
                             esc_html__( 'Style 2', 'pofo-addons') => 'filter-style-2',
            ),
        ),
        array(
            'type' => 'pofo_preview_image',
            'heading' => esc_html__( 'Select pre-made style', 'pofo-addons'),
            'param_name' => 'pofo_portfolio_filter_preview_image',
            'admin_label' => true,
            'value' => array(esc_html__( 'Select image style', 'pofo-addons') => '',
                             esc_html__( 'Style 1', 'pofo-addons') => 'filter-style-1',
                             esc_html__( 'Style 2', 'pofo-addons') => 'filter-style-2',
                            ),
        ),
        array(
            'type' => 'pofo_multiple_portfolio_categories',
            'heading' => esc_html__( 'Categories', 'pofo-addons'),
            'param_name' => 'pofo_categories_list',
            'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        ),
        array(
              'type' => 'pofo_custom_switch_option',
              'heading' => esc_html__( 'All filter', 'pofo-addons'),
              'param_name' => 'pofo_show_all_categories_filter',
              'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                               esc_html__( 'On', 'pofo-addons') => '1'
                              ),
              'std' => '1',
              'description' => esc_html__( 'Select On to show filter above portfolio', 'pofo-addons' ),
              'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'All filter text', 'pofo-addons'),
            'param_name' => 'pofo_show_all_text',
            'dependency' => array( 'element' => 'pofo_show_all_categories_filter', 'value' => array('1') ),
            'std' => esc_html__( 'All', 'pofo-addons' ),
        ),
        array(
            'type' => 'pofo_multiple_portfolio_categories',
            'heading' => esc_html__( 'Default / selected filter category', 'pofo-addons'),
            'param_name' => 'pofo_default_category_selected',    
            'multiple' => false,
            'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        ),
        array(
            'type' => 'dropdown',
            'holder' => 'div',
            'class' => '',
            'heading' => esc_html__( 'Categories order by', 'pofo-addons'),
            'param_name' => 'pofo_portfolio_categories_orderby',
            'value' => array(esc_html__( 'Select Order By', 'pofo-addons') => '',
                             esc_html__( 'Name', 'pofo-addons') => 'name',
                             esc_html__( 'Slug', 'pofo-addons') => 'slug',
                             esc_html__( 'Id', 'pofo-addons') => 'id',
                             esc_html__( 'Count', 'pofo-addons') => 'count',
            ),
            'std' => 'id',
            'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        ),
        array(
            'type' => 'dropdown',
            'holder' => 'div',
            'class' => '',
            'heading' => esc_html__( 'Categories sort by', 'pofo-addons'),
            'param_name' => 'pofo_portfolio_categories_order',
            'value' => array(esc_html__( 'Select Order', 'pofo-addons') => '',
                             esc_html__( 'Ascending', 'pofo-addons') => 'ASC',
                             esc_html__( 'Descending', 'pofo-addons') => 'DESC',
            ),
            'std' => 'ASC',
            'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Font size', 'pofo-addons' ),
          'param_name' => 'pofo_filter_font_size',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
          'description' => esc_html__( 'In pixel like 12px.', 'pofo-addons' ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'textfield',
          'heading' => esc_html__( 'Line height', 'pofo-addons' ),
          'param_name' => 'pofo_filter_line_height',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
          'description' => esc_html__( 'In pixel like 20px.', 'pofo-addons' ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'dropdown',
          'param_name' => 'pofo_filter_font_weight',
          'heading' => esc_html__( 'Font weight', 'pofo-addons' ),
          'value' => array(esc_html__( 'Select Font Weight', 'pofo-addons') => '', 
                           esc_html__( 'Font weight 300', 'pofo-addons') => '300',
                           esc_html__( 'Font weight 400', 'pofo-addons') => '400',
                           esc_html__( 'Font weight 500', 'pofo-addons') => '500',
                           esc_html__( 'Font weight 600', 'pofo-addons') => '600',
                           esc_html__( 'Font weight 700', 'pofo-addons') => '700',
                           esc_html__( 'Font weight 800', 'pofo-addons') => '800',
                           esc_html__( 'Font weight 900', 'pofo-addons') => '900',
                          ),
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Color', 'pofo-addons' ),
          'param_name' => 'pofo_filter_color',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1','filter-style-2') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Hover color', 'pofo-addons' ),
          'param_name' => 'pofo_filter_hover_color',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Hover background color', 'pofo-addons' ),
          'param_name' => 'pofo_filter_hover_bg_color',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-2') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),
        array(
          'type' => 'colorpicker',
          'class' => '',
          'heading' => esc_html__( 'Underline color', 'pofo-addons' ),
          'param_name' => 'pofo_filter_border_color',
          'dependency' => array( 'element' => 'pofo_portfolio_filter_style', 'value' => array('filter-style-1') ),
          'group' => esc_html__( 'Style', 'pofo-addons' ),
        ),      
        $pofo_vc_extra_id,
        $pofo_vc_extra_class,
    )
  ) );