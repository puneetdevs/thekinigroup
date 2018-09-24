<?php
/**
 * Shortcode For Pricing Table 
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Pofo Pricing Table  */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_pricing_table_shortcode' ) ) {
    function pofo_pricing_table_shortcode( $atts, $content = null ) {
        
        global $pofo_featured_array, $pofo_pricing1, $pofo_pricing2;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_pricing_style' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'pricing_table_icon' =>'',
            'sale_type' => '',
            'price' => '',
            'per_price' => '',
            'pofo_button_config' => '',
            'pofo_button_one_page' => '',

            'pofo_pricing_table_icon_size' => '',
            'pofo_icon_bg_color' => '',
            'pofo_sale_type_bg_color' => '',
            'pofo_title_text_transform' => 'text-uppercase',
            'pofo_per_price_text_transform' => 'text-uppercase',
            'pofo_top_box_background_color' => '',
            'pofo_bottom_box_background_color' => '',
            'pofo_icon_color' => '',
            'pofo_highlight_table' => '',
            'pofo_enable_border' => '1',
            'pofo_border_color' => '#ededed',
            'pofo_border_size' => '1px',
            'pofo_border_type' => 'solid',
            'pofo_border_radius' => '',
            'pofo_button_bg_color' => '',
            'pofo_button_text_color' => '',
            'pofo_button_hover_bg_color' => '',
            'pofo_button_hover_text_color' => '',
            'pofo_button_border_color' => '',

            'pofo_sale_type_font_size' => '',
            'pofo_sale_type_line_height' => '',
            'pofo_sale_type_letter_spacing' => '',
            'pofo_sale_type_font_weight' => '',
            'pofo_sale_type_italic' => '',
            'pofo_sale_type_underline' => '',
            'pofo_sale_type_color' => '',
            'pofo_sale_type_enable_responsive_font' => '',
            'pofo_price_font_size' => '',
            'pofo_price_line_height' => '',
            'pofo_price_letter_spacing' => '',
            'pofo_price_font_weight' => '',
            'pofo_price_italic' => '',
            'pofo_price_underline' => '',
            'pofo_price_element_tag' => '',
            'pofo_price_color' => '',
            'pofo_price_enable_responsive_font' => '',
            'pofo_per_price_font_size' => '',
            'pofo_per_price_line_height' => '',
            'pofo_per_price_letter_spacing' => '',
            'pofo_per_price_font_weight' => '',
            'pofo_per_price_italic' => '',
            'pofo_per_price_underline' => '',
            'pofo_per_price_color' => '',
            'pofo_per_price_enable_responsive_font' => '',

        ), $atts ) );

        $output = '';   

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        
    	$pofo_price_style_attr = $pofo_sale_type_style_attr = $pofo_per_price_style_attr = $sep_style = '';
        $classes = $classes_icon = $pofo_price_style_array = $pofo_sale_type_style_array = $pofo_per_price_style_array = array();

        // new font awesome icons

        $fa_icons_solid = pofo_fontawesome_solid();
        $fa_icons_reg = pofo_fontawesome_reg();
        $fa_icons_brand = pofo_fontawesome_brand();
        $fa_icon_old = pofo_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($pricing_table_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $pricing_table_icon = substr(strstr($pricing_table_icon," "), 1);

            if(array_key_exists($pricing_table_icon, $fa_icon_old)){
                $pricing_table_icon = $fa_icon_old[$pricing_table_icon];
            }else if(in_array($pricing_table_icon, $fa_icons_solid)){
                $pricing_table_icon = 'fas '.$pricing_table_icon;
            }else if(in_array($pricing_table_icon, $fa_icons_reg)){
                $pricing_table_icon = 'far '.$pricing_table_icon;
            }else if(in_array($pricing_table_icon, $fa_icons_brand)){
                $pricing_table_icon = 'fab '.$pricing_table_icon;
            }else{
                $pricing_table_icon = '';
            }
        }

    	$pricing_table_icon          = ( $pricing_table_icon ) ? $classes_icon[] = $pricing_table_icon : '' ;
    	$pofo_pricing_table_icon_size= ( $pofo_pricing_table_icon_size ) ? $classes_icon[] = $pofo_pricing_table_icon_size : $classes_icon[] ='icon-medium';
        
        $pofo_icon_style = '';
        if( !empty( $pofo_icon_bg_color ) ) {
            $pofo_icon_style .= 'background-color: '.$pofo_icon_bg_color.';';
        }
        if( !empty( $pofo_icon_color ) ) {
            $pofo_icon_style .= 'color: '.$pofo_icon_color.';';
        }
        $pofo_icon_style = !empty( $pofo_icon_style ) ? ' style="'.$pofo_icon_style.'"' : '';

        // Title & Duration Text Case
        $pofo_title_text_transform = !empty( $pofo_title_text_transform ) ? ' ' . $pofo_title_text_transform : '';
        $pofo_per_price_text_transform = !empty( $pofo_per_price_text_transform ) ? ' ' . $pofo_per_price_text_transform : '';

        // For Sale Type Style
        !empty( $pofo_sale_type_font_size ) ? $pofo_sale_type_style_array[] = 'font-size: ' . $pofo_sale_type_font_size . ';' : '';
        !empty( $pofo_sale_type_line_height ) ? $pofo_sale_type_style_array[] = 'line-height: ' . $pofo_sale_type_line_height . ';' : '';
        !empty( $pofo_sale_type_letter_spacing ) ? $pofo_sale_type_style_array[] = 'letter-spacing: ' . $pofo_sale_type_letter_spacing . ';' : '';
        !empty( $pofo_sale_type_font_weight ) ? $pofo_sale_type_style_array[] = 'font-weight: ' . $pofo_sale_type_font_weight . ';' : '';
        ( $pofo_sale_type_italic == 1 ) ? $pofo_sale_type_style_array[] = 'font-style: italic;' : '';
        ( $pofo_sale_type_underline == 1 ) ? $pofo_sale_type_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_sale_type_color ) ? $pofo_sale_type_style_array[] = 'color: '.$pofo_sale_type_color.';' : '';
        !empty( $pofo_sale_type_bg_color ) ? $pofo_sale_type_style_array[] = 'background-color: '.$pofo_sale_type_bg_color.';' : '';

        $pofo_sale_type_dynamic_font_size = $pofo_sale_type_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_sale_type_style_attr   = pofo_get_style_attribute( $pofo_sale_type_style_array, $pofo_sale_type_font_size, $pofo_sale_type_line_height );

    	// For Price Style
        !empty( $pofo_price_font_size ) ? $pofo_price_style_array[] = 'font-size: ' . $pofo_price_font_size . ';' : '';
        !empty( $pofo_price_line_height ) ? $pofo_price_style_array[] = 'line-height: ' . $pofo_price_line_height . ';' : '';
        !empty( $pofo_price_letter_spacing ) ? $pofo_price_style_array[] = 'letter-spacing: ' . $pofo_price_letter_spacing . ';' : '';
        !empty( $pofo_price_font_weight ) ? $pofo_price_style_array[] = 'font-weight: ' . $pofo_price_font_weight . ';' : '';
        ( $pofo_price_italic == 1 ) ? $pofo_price_style_array[] = 'font-style: italic;' : '';
        ( $pofo_price_underline == 1 ) ? $pofo_price_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_price_color ) ? $pofo_price_style_array[] = 'color: '.$pofo_price_color.';' : '';

        $pofo_price_dynamic_font_size = $pofo_price_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_price_style_attr   = pofo_get_style_attribute( $pofo_price_style_array, $pofo_price_font_size, $pofo_price_line_height );

        // For Per Price Style
        !empty( $pofo_per_price_font_size ) ? $pofo_per_price_style_array[] = 'font-size: ' . $pofo_per_price_font_size . ';' : '';
        !empty( $pofo_per_price_line_height ) ? $pofo_per_price_style_array[] = 'line-height: ' . $pofo_per_price_line_height . ';' : '';
        !empty( $pofo_per_price_letter_spacing ) ? $pofo_per_price_style_array[] = 'letter-spacing: ' . $pofo_per_price_letter_spacing . ';' : '';
        !empty( $pofo_per_price_font_weight ) ? $pofo_per_price_style_array[] = 'font-weight: ' . $pofo_per_price_font_weight . ';' : '';
        ( $pofo_per_price_italic == 1 ) ? $pofo_per_price_style_array[] = 'font-style: italic;' : '';
        ( $pofo_per_price_underline == 1 ) ? $pofo_per_price_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_per_price_color ) ? $pofo_per_price_style_array[] = 'color: '.$pofo_per_price_color.';' : '';

        $pofo_per_price_dynamic_font_size = $pofo_per_price_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_per_price_style_attr   = pofo_get_style_attribute( $pofo_per_price_style_array, $pofo_per_price_font_size, $pofo_per_price_line_height );

        // Replace || to <br /> in sale_type
        $sale_type = ( $sale_type ) ? str_replace('||', '<br />',$sale_type) : '';

        // For Pricing Table Box Border
        $pofo_border_color   = ( $pofo_border_color ) ? 'border-color: ' . $pofo_border_color . '; ' : '';
        $pofo_border_size    = ( $pofo_border_size ) ? 'border-width: ' . $pofo_border_size . '; ' : '';
        $pofo_border_type    = ( $pofo_border_type ) ? 'border-style: ' . $pofo_border_type . '; ' : '';
        $pofo_border_style   = ( $pofo_enable_border == 0 ) ? 'border: none; ' : $pofo_border_color.$pofo_border_size.$pofo_border_type;

        $pofo_border_radius  = ($pofo_border_radius) ? ' border-radius: '.$pofo_border_radius.'; -moz-border-radius: '.$pofo_border_radius.'; -webkit-border-radius: '.$pofo_border_radius.'; -ms-border-radius: '.$pofo_border_radius.'; -o-border-radius: '.$pofo_border_radius.'; ' : '';
        $pofo_top_box_background_color  = ($pofo_top_box_background_color) ? ' style="background-color: '.$pofo_top_box_background_color.';"' : '';
        $pofo_bottom_box_background_color= ($pofo_bottom_box_background_color) ? ' style="background-color: '.$pofo_bottom_box_background_color.';"' : '';

        // Button Color Settings
        $pofo_button_bg_color         = !empty( $pofo_button_bg_color ) ?  'background-color:'.$pofo_button_bg_color.'; ' : '';
        $pofo_button_text_color       = !empty( $pofo_button_text_color ) ?  'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_hover_bg_color   = !empty( $pofo_button_hover_bg_color ) ?  'background-color:'.$pofo_button_hover_bg_color.'; ' : '';
        $pofo_button_hover_text_color = !empty( $pofo_button_hover_text_color ) ?  'color:'.$pofo_button_hover_text_color.'; ' : '';
        $pofo_button_border_color     = !empty( $pofo_button_border_color ) ?  'border-color:'.$pofo_button_border_color.'; ' : '';

        // Button Style
        $pofo_button_parse_args = !empty( $pofo_button_config ) ? vc_parse_multi_attribute($pofo_button_config) : array();
        $pofo_button_link     = ( isset($pofo_button_parse_args['url']) ) ? $pofo_button_parse_args['url'] : '#';
        $pofo_button_title    = ( isset($pofo_button_parse_args['title']) ) ? $pofo_button_parse_args['title'] : '';
        $pofo_button_target   = ( isset($pofo_button_parse_args['target']) ) ? trim($pofo_button_parse_args['target']) : '_self';
        $pofo_button_target   = !empty( $pofo_button_target ) ? ' target="' . $pofo_button_target . '"' : '';

        $section_link_class = '';
        if( $pofo_button_one_page == 1 ) {

            $section_link_class = ' section-link';
            $pofo_button_target = '';
        }

        $pofo_box_style   = !empty( $pofo_border_style ) || !empty( $pofo_border_radius ) ? ' style="'.$pofo_border_style.$pofo_border_radius.'"' : '';

        $class_list3    = !empty( $classes_icon ) ? implode( " ", $classes_icon ) : '';
        $class_icon_attr= ( $class_list3 ) ? ' '.$class_list3 : '';

        // Image Alt, Title, Caption
        $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt($custom_icon_image) : '';
        $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title($custom_icon_image) : '';
        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

        //Table Highlight
        $pofo_highlight_table == 1 ? $classes[] = 'highlight' : '';

        $classes[] = $pofo_pricing_style;

        // Class List
        $class_list     = !empty( $classes ) ? implode(" ", $classes) : '';

        switch ( $pofo_pricing_style ) {

            case 'pricing-style-1':

                $pofo_pricing1 = !empty( $pofo_pricing1 ) ? $pofo_pricing1 : 0;
                $pofo_pricing1 = $pofo_pricing1 + 1;

                if( !empty( $pofo_button_bg_color ) || !empty( $pofo_button_text_color ) || !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.pricing1-'.$pofo_pricing1.' .pricing-action a.btn { '.$pofo_button_bg_color.$pofo_button_text_color.$pofo_button_border_color.' }';
                }
                if( !empty( $pofo_button_hover_bg_color ) || !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.pricing1-'.$pofo_pricing1.' .pricing-action a.btn:hover { '.$pofo_button_hover_bg_color.$pofo_button_hover_text_color.' }';
                }

                $pofo_price_element_tag = !empty( $pofo_price_element_tag ) ? $pofo_price_element_tag : 'h4';

                $output .= '<div'.$id.' class="'.$class_list.' pricing-box border-all border-width-1 border-color-extra-light-gray overflow-hidden pricing1-'.$pofo_pricing1.'"'.$pofo_box_style.'>';
                    $output .= '<div class="padding-55px-all bg-very-light-gray sm-padding-30px-all xs-padding-40px-all"'.$pofo_top_box_background_color.'>';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $output .= '<div class="pricing-title">';
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="text-deep-pink display-inline-block padding-30px-all bg-white box-shadow-light border-radius-100 margin-25px-bottom"'.$pofo_icon_style.' />';
                            $output .= '</div>';
                        }elseif( $pricing_table_icon ){
                            $output .= '<div class="pricing-title">';
                                $output .= '<i class="text-deep-pink display-inline-block padding-30px-all bg-white box-shadow-light border-radius-100 margin-25px-bottom'.$class_icon_attr.'"'.$pofo_icon_style.'></i>';
                            $output .= '</div>';
                        }
                        if( $sale_type || $price || $per_price ){
                            $output .= '<div class="pricing-price">';
                                if( $sale_type ){
                                    $output .= '<span class="alt-font text-extra-dark-gray font-weight-600'.$pofo_title_text_transform.$pofo_sale_type_dynamic_font_size.'" '.$pofo_sale_type_style_attr.'>'.$sale_type.'</span>';
                                }
                                if( $price ){
                                    $output .= '<'.$pofo_price_element_tag.' class="text-extra-dark-gray alt-font font-weight-600 no-margin-bottom'.$pofo_price_dynamic_font_size.'" '.$pofo_price_style_attr.'>'.$price.'</'.$pofo_price_element_tag.'>';
                                }
                                if( $per_price ){
                                    $output .= '<div class="text-extra-small alt-font margin-5px-top'.$pofo_per_price_text_transform.$pofo_per_price_dynamic_font_size.'" '.$pofo_per_price_style_attr.'>'.$per_price.'</div>';
                                }
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                    $output .= '<div class="padding-45px-all pricing-features sm-padding-20px-all xs-padding-30px-all"'.$pofo_bottom_box_background_color.'>';
                        if( $content ){
                            $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                        if( !empty( $pofo_button_title ) ) {
                            $output .= '<div class="pricing-action margin-35px-top sm-no-margin-top">';
                                $output .= '<a '.$id.' href="'.$pofo_button_link.'"'.$pofo_button_target.'" class="btn btn-dark-gray btn-small text-extra-small'.$section_link_class.'">'.$pofo_button_title.'</a>';
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';

            break;

            case 'pricing-style-2':

                $pofo_pricing2 = !empty( $pofo_pricing2 ) ? $pofo_pricing2 : 0;
                $pofo_pricing2 = $pofo_pricing2 + 1;

                if( !empty( $pofo_button_bg_color ) || !empty( $pofo_button_text_color ) || !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.pricing2-'.$pofo_pricing2.' .pricing-action a.btn { '.$pofo_button_bg_color.$pofo_button_text_color.$pofo_button_border_color.' }';
                }
                if( !empty( $pofo_button_hover_bg_color ) || !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.pricing2-'.$pofo_pricing2.' .pricing-action a.btn:hover { '.$pofo_button_hover_bg_color.$pofo_button_hover_text_color.' }';
                }

                $pofo_price_element_tag = !empty( $pofo_price_element_tag ) ? $pofo_price_element_tag : 'h4';

                $output .= '<div'.$id.' class="'.$class_list.' pricing-box border-all border-width-1 border-color-extra-light-gray bg-white pricing2-'.$pofo_pricing2.'"'.$pofo_box_style.'>';
                    if( $sale_type ){
                        $output .= '<div class="padding-30px-lr bg-extra-dark-gray padding-10px-tb alt-font text-white font-weight-600'.$pofo_title_text_transform.$pofo_sale_type_dynamic_font_size.'" '.$pofo_sale_type_style_attr.'>'.$sale_type.'</div>';
                    }
                    if( $price || $per_price ){
                        $output .= '<div class="bg-light-gray padding-35px-all"'.$pofo_top_box_background_color.'>';
                            if( $price ){
                                $output .= '<'.$pofo_price_element_tag.' class="text-extra-dark-gray font-weight-500 no-margin-bottom'.$pofo_price_dynamic_font_size.'" '.$pofo_price_style_attr.'>'.$price.'</'.$pofo_price_element_tag.'>';
                            }
                            if( $per_price ){
                                $output .= '<div class="text-extra-small margin-5px-top'.$pofo_per_price_text_transform.$pofo_per_price_dynamic_font_size.'" '.$pofo_per_price_style_attr.'>'.$per_price.'</div>';
                            }
                        $output .= '</div>';
                    }
                    $output .= '<div class="padding-30px-all pricing-features sm-padding-20px-all xs-padding-30px-all"'.$pofo_bottom_box_background_color.'>';
                        if( $content ){
                            $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                        if( !empty( $pofo_button_title ) ) {
                            $output .= '<div class="pricing-action margin-35px-top sm-no-margin-top">';
                                $output .= '<a '.$id.' href="'.$pofo_button_link.'"'.$pofo_button_target.'" class="btn btn-transparent-dark-gray btn-very-small text-extra-small'.$section_link_class.'">'.$pofo_button_title.'</a>';
                            $output .= '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';

            break;

            default:
            break;
        }
        return $output;        
    }
}
add_shortcode( 'pofo_pricing_table', 'pofo_pricing_table_shortcode' );