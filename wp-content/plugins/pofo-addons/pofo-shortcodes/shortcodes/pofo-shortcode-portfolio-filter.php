<?php
/**
 * Shortcode For Portfolio
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_portfolio_filter_shortcode' ) ) {
    function pofo_portfolio_filter_shortcode( $atts, $content = null ) {

        global $pofo_portfolio_filter_unique_id;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_portfolio_filter_style' => '',
            'pofo_categories_list' => '',
            'pofo_filter_color' => '',
            'pofo_filter_font_size' => '',
            'pofo_filter_line_height' => '',
            'pofo_filter_font_weight' => '',
            'pofo_show_all_categories_filter' => '1',
            'pofo_show_all_text' => esc_html__( 'All', 'pofo-addons' ),
            'pofo_default_category_selected' => '',
            'pofo_portfolio_categories_orderby' => 'id',
            'pofo_portfolio_categories_order' => 'ASC',
            'pofo_token_class' => '',
            'pofo_filter_hover_color' => '',
            'pofo_filter_hover_bg_color' => '',
            'pofo_filter_border_color' => '',
        ), $atts ) );

        global $pofo_featured_array;
        $output = $classes = $pofo_filter_style = '';
        $classes = $style_array = $pofo_filter_style_array = array();
        $pofo_token_class = $pofo_token_class.$id;

        // Check if portfolio id and class
        $pofo_portfolio_filter_unique_id  = !empty( $pofo_portfolio_filter_unique_id ) ? $pofo_portfolio_filter_unique_id : 1;
        $pofo_portfolio_id      = ( $id ) ? $id : 'pofo-portfolio';
        $pofo_portfolio_id      .= '-' . $pofo_portfolio_filter_unique_id;
        $pofo_portfolio_filter_unique_id++;

        $class = ( $class ) ? $classes[] = $class : '';

        $pofo_portfolio_categories_orderby = !empty( $pofo_portfolio_categories_orderby ) ? $pofo_portfolio_categories_orderby : 'id';
        $pofo_portfolio_categories_order = !empty( $pofo_portfolio_categories_order ) ? $pofo_portfolio_categories_order : 'ASC';

        // For Filter Style
        $pofo_filter_color   = !empty( $pofo_filter_color ) ? $pofo_filter_style_array[] = 'color: '.$pofo_filter_color.';' : '';
        $pofo_filter_font_size    = !empty( $pofo_filter_font_size ) ? $pofo_filter_style_array[] = 'font-size: ' . $pofo_filter_font_size . ';' : '';
        $pofo_filter_line_height  = !empty( $pofo_filter_line_height ) ? $pofo_filter_style_array[] = 'line-height: ' . $pofo_filter_line_height . ';' : '';
        $pofo_filter_font_weight  = !empty( $pofo_filter_font_weight ) ? $pofo_filter_style_array[] = 'font-weight: ' . $pofo_filter_font_weight . ';' : '';

        $pofo_filter_style_attr   = pofo_get_style_attribute( $pofo_filter_style_array, $pofo_filter_font_size, $pofo_filter_line_height );

        // Custom css
        if( !empty( $pofo_filter_hover_color ) ) {
            $pofo_featured_array[] = '.'.$pofo_token_class.' li a:hover, .'.$pofo_token_class.' li:active, .'.$pofo_token_class.' li.active a{ color:'.$pofo_filter_hover_color.' !important;}';   
        }
        if( !empty( $pofo_filter_hover_bg_color ) ) {
            $pofo_featured_array[] = '.'.$pofo_token_class.' li a:hover, .'.$pofo_token_class.' li:focus a, .'.$pofo_token_class.' li.active a{ background-color:'.$pofo_filter_hover_bg_color.' !important;}';
        }
        if( !empty( $pofo_filter_border_color ) ) {
            $pofo_featured_array[] = '.'.$pofo_token_class.' li a:hover, .'.$pofo_token_class.' li.active a { border-color:'.$pofo_filter_border_color.';}';
        }

        //Unique Style Class
        $classes[] = $pofo_portfolio_filter_style;

        // Class List
        $class_list = !empty( $classes ) ? ' '.implode(" ", $classes) : '';
        
        $categories_to_display_ids = explode(",",$pofo_categories_list);
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( 'portfolio-category' );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            foreach ( $terms as $term ) {
                $categories_to_display_ids[] = $term->slug;
            }
        }
        
        $taxonomy = 'portfolio-category';
        $args = array(
                        'orderby'   => $pofo_portfolio_categories_orderby,
                        'order'     => $pofo_portfolio_categories_order,
                        'hide_empty'=> 0, 
                        'slug'      => $categories_to_display_ids,
                    );
        $tax_terms = get_terms($taxonomy, $args);
        switch ($pofo_portfolio_filter_style) {
            case 'filter-style-1':
                $output .='<ul id="'.$pofo_portfolio_id.'" class="portfolio-filter nav nav-tabs border-none portfolio-filter-tab-1 font-weight-600 alt-font text-uppercase text-center text-small'.$class_list.' '.$pofo_token_class.'">';
                    if($pofo_show_all_categories_filter == 1):
                        $active_class = empty( $pofo_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav'.$active_class.'"><a href="#" data-filter="*" data-id="'.$pofo_portfolio_id.'" class="xs-display-inline light-gray-text-link text-very-small dynamic-font-size"'.$pofo_filter_style_attr.'>'.esc_html( $pofo_show_all_text ).'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        $active_class = ( $pofo_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav'.$active_class.'"><a href="#" data-id="'.$pofo_portfolio_id.'" data-filter=".portfolio-filter-'.$tax_term->term_id.'-'.$pofo_portfolio_id.'" class="xs-display-inline light-gray-text-link text-very-small dynamic-font-size"'.$pofo_filter_style_attr.'>'.esc_html( $tax_term->name ).'</a></li>';
                    }
                $output .='</ul>';
            break;

            case 'filter-style-2':
                $output .='<ul id="'.$pofo_portfolio_id.'" class="portfolio-filter nav nav-tabs portfolio-filter-tab-2 border-none font-weight-600 alt-font text-center text-small padding-35px-tb'.$class_list.' '.$pofo_token_class.'">';
                    if($pofo_show_all_categories_filter == 1):
                        $active_class = empty( $pofo_default_category_selected ) ? ' active' : '';
                        $output .='<li class="nav'.$active_class.'"><a href="#" data-id="'.$pofo_portfolio_id.'" data-filter="*" class="text-black text-very-small dynamic-font-size"'.$pofo_filter_style_attr.'>'.esc_html( $pofo_show_all_text ).'</a></li>';
                    endif;
                    foreach ($tax_terms as $tax_term) {
                        $active_class = ( $pofo_default_category_selected == $tax_term->slug ) ? ' active' : '';
                        $output .='<li class="nav'.$active_class.'"><a href="#" data-id="'.$pofo_portfolio_id.'" data-filter=".portfolio-filter-'.$tax_term->term_id.'-'.$pofo_portfolio_id.'" class="text-black text-very-small dynamic-font-size"'.$pofo_filter_style_attr.'>'.esc_html( $tax_term->name ).'</a></li>';
                    }
                $output .='</ul>';
            break;
        }

        return $output;
    }
}
add_shortcode( 'pofo_portfolio_filter', 'pofo_portfolio_filter_shortcode' );