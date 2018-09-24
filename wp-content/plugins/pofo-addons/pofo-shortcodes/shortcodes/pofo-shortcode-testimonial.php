<?php
/**
 * Shortcode For Testimonial
 *
 * @package Pofo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/

function pofo_testimonial_shortcode( $atts, $content = null ) {
    
    global $pofo_featured_array, $pofo_testimonial1;

    extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_testimonial_style' => '',
            'pofo_testimonial_image' => '',
            'pofo_member_name' => '',
            'pofo_member_des' => '',
            'pofo_title_text_transform' => 'text-uppercase',
            'pofo_des_text_transform' => 'text-uppercase',
            'pofo_box_bg_color' => '',
            'pofo_enable_content' => '1',
            'pofo_enable_quote' => '1',
            'pofo_icon_size' => '',
            'pofo_icon_color' => '',

            'pofo_member_name_font_size' => '',
            'pofo_member_name_line_height' => '',
            'pofo_member_name_letter_spacing' => '',
            'pofo_member_name_font_weight' => '',
            'pofo_member_name_italic' => '',
            'pofo_member_name_underline' => '',
            'pofo_member_name_element_tag' => '',
            'pofo_member_name_color' => '',
            'pofo_member_name_enable_responsive_font' => '',
            'pofo_member_des_font_size' => '',
            'pofo_member_des_line_height' => '',
            'pofo_member_des_letter_spacing' => '',
            'pofo_member_des_font_weight' => '',
            'pofo_member_des_italic' => '',
            'pofo_member_des_underline' => '',
            'pofo_member_des_element_tag' => '',
            'pofo_member_des_color' => '',
            'pofo_member_des_enable_responsive_font' => '',

            'alignment_setting' => '1',
            'desktop_alignment' => 'text-center',
            'desktop_mini_alignment' => '',
            'ipad_alignment' => '',
            'mobile_alignment' => '',
            'vertical_alignment_setting' => '1',
            'vertical_desktop_alignment' => 'vertical-align-middle',
            'vertical_desktop_mini_alignment' => '',
            'vertical_ipad_alignment' => '',
            'vertical_mobile_alignment' => '',
            'pofo_image_srcset' => 'full',
        ), $atts ) );
    
    $output = $style = $pofo_member_name_style_attr = $pofo_member_des_style_attr = $alignment_class = $vertical_alignment_class = $sep_style = '';
    $classes = $pofo_member_name_style_array = $pofo_member_des_style_array = array();

    $id         = ( $id ) ? ' id="'.$id.'"' : '';
    $class      = ( $class ) ? $classes[] = $class : '';
    
    /* Image Alt, Title, Caption */
    $img_alt                = pofo_option_image_alt($pofo_testimonial_image);
    $img_title              = pofo_option_image_title($pofo_testimonial_image);
    $image_alt              = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title            = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

    $pofo_image_srcset  = !empty($pofo_image_srcset) ? $pofo_image_srcset : 'full';
    $thumb              = !empty( $pofo_testimonial_image ) ? wp_get_attachment_image_src($pofo_testimonial_image, $pofo_image_srcset) : array();

    $srcset = $srcset_data = $sizes_data = '';
    $srcset = !empty( $pofo_testimonial_image ) ? wp_get_attachment_image_srcset( $pofo_testimonial_image, $pofo_image_srcset ) : '';
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes = !empty( $pofo_testimonial_image ) ? wp_get_attachment_image_sizes( $pofo_testimonial_image, $pofo_image_srcset ) : '';
    if( $sizes ){
        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
    }

    $pofo_member_name       = ( $pofo_member_name ) ? $pofo_member_name : '';
    $pofo_member_des        = ( $pofo_member_des ) ? $pofo_member_des : '';

    // Title & Designation Text Case
    $pofo_title_text_transform = !empty( $pofo_title_text_transform ) ? ' ' . $pofo_title_text_transform : '';
    $pofo_des_text_transform = !empty( $pofo_des_text_transform ) ? ' ' . $pofo_des_text_transform : '';

    $pofo_box_border_top_color = ( $pofo_box_bg_color ) ? 'border-top-color: ' . $pofo_box_bg_color . ';' : '';
    $pofo_box_bg_color      = ( $pofo_box_bg_color ) ? 'background-color: ' . $pofo_box_bg_color . ';' : '';
    $pofo_icon_size         = ( $pofo_icon_size ) ? $pofo_icon_size : '';
    $pofo_icon_color        = ( $pofo_icon_color ) ? ' style="color:'.$pofo_icon_color.';"' : '';

    // For Member Name Style
    !empty( $pofo_member_name_font_size ) ? $pofo_member_name_style_array[] = 'font-size: ' . $pofo_member_name_font_size . ';' : '';
    !empty( $pofo_member_name_line_height ) ? $pofo_member_name_style_array[] = 'line-height: ' . $pofo_member_name_line_height . ';' : '';
    !empty( $pofo_member_name_letter_spacing ) ? $pofo_member_name_style_array[] = 'letter-spacing: ' . $pofo_member_name_letter_spacing . ';' : '';
    !empty( $pofo_member_name_font_weight ) ? $pofo_member_name_style_array[] = 'font-weight: ' . $pofo_member_name_font_weight . ';' : '';
    ( $pofo_member_name_italic == 1 ) ? $pofo_member_name_style_array[] = 'font-style: italic;' : '';
    ( $pofo_member_name_underline == 1 ) ? $pofo_member_name_style_array[] = 'text-decoration: underline;' : '';
    !empty( $pofo_member_name_color ) ? $pofo_member_name_style_array[] = 'color: '.$pofo_member_name_color.';' : '';

    $pofo_member_name_element_tag = ( $pofo_member_name_element_tag ) ? $pofo_member_name_element_tag : 'div';
    $pofo_member_name_dynamic_font_size = $pofo_member_name_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_member_name_style_attr   = pofo_get_style_attribute( $pofo_member_name_style_array, $pofo_member_name_font_size, $pofo_member_name_line_height );

    // For Member Designation Style
    !empty( $pofo_member_des_font_size ) ? $pofo_member_des_style_array[] = 'font-size: ' . $pofo_member_des_font_size . ';' : '';
    !empty( $pofo_member_des_line_height ) ? $pofo_member_des_style_array[] = 'line-height: ' . $pofo_member_des_line_height . ';' : '';
    !empty( $pofo_member_des_letter_spacing ) ? $pofo_member_des_style_array[] = 'letter-spacing: ' . $pofo_member_des_letter_spacing . ';' : '';
    !empty( $pofo_member_des_font_weight ) ? $pofo_member_des_style_array[] = 'font-weight: ' . $pofo_member_des_font_weight . ';' : '';
    ( $pofo_member_des_italic == 1 ) ? $pofo_member_des_style_array[] = 'font-style: italic;' : '';
    ( $pofo_member_des_underline == 1 ) ? $pofo_member_des_style_array[] = 'text-decoration: underline;' : '';
    !empty( $pofo_member_des_color ) ? $pofo_member_des_style_array[] = 'color: '.$pofo_member_des_color.';' : '';

    $pofo_member_des_element_tag = ( $pofo_member_des_element_tag ) ? $pofo_member_des_element_tag : 'p';
    $pofo_member_des_dynamic_font_size = $pofo_member_des_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_member_des_style_attr   = pofo_get_style_attribute( $pofo_member_des_style_array, $pofo_member_des_font_size, $pofo_member_des_line_height );

    //Unique Style Class
    $classes[] = $pofo_testimonial_style;

    // Class List
    $class_list = !empty( $classes ) ? implode(" ", $classes) : '';

    switch ($pofo_testimonial_style) 
    {
        case 'testimonial-1':

            $pofo_testimonial1 = !empty( $pofo_testimonial1 ) ? $pofo_testimonial1 : 0;
            $pofo_testimonial1 = $pofo_testimonial1 + 1;

            if( !empty( $pofo_box_bg_color ) ) {
                $pofo_featured_array[] = '.testimonial1-'.$pofo_testimonial1.' .arrow-bottom { '.$pofo_box_bg_color.' }';
            }
            if( !empty( $pofo_box_border_top_color ) ) {
                $pofo_featured_array[] = '.testimonial1-'.$pofo_testimonial1.' .arrow-bottom::after { '.$pofo_box_border_top_color.' }';
            }

            $output .= '<div'.$id.' class="'.$class_list.' testimonial-style-1 testimonial-style3 testimonial1-'.$pofo_testimonial1.'">';

                if( $pofo_enable_content && $content ) {
                    $output .= '<div class="testimonial-content-box padding-twelve-all bg-white border-radius-6 box-shadow arrow-bottom sm-padding-eight-all last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                }
                $output .= '<div class="testimonial-box padding-25px-all xs-padding-20px-all">';
                    if( !empty( $thumb[0] ) ){
                        $output .='<div class="image-box width-20"><img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="border-radius-100"/></div>';
                    }
                    $output .= '<div class="name-box padding-20px-left">';
                        if( $pofo_member_name ){
                            $output .= '<'.$pofo_member_name_element_tag.' class="alt-font font-weight-600 text-small text-extra-dark-gray'.$pofo_title_text_transform.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>'.$pofo_member_name.'</'.$pofo_member_name_element_tag.'>';
                        }
                        if( $pofo_member_des ){
                            $output .= '<div class="text-extra-small text-medium-gray'.$pofo_des_text_transform.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';

            $output .= '</div>';
        break;

        case 'testimonial-2':

            $output .= '<div'.$id.' class="'.$class_list.' testimonial-style-2">';
                        if( !empty( $thumb[0] ) ){
                            $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="border-radius-100 width-30 margin-30px-bottom xs-margin-15px-bottom xs-width-100px"/>';
                        }
                        if( $pofo_enable_content && $content ) {
                            $output .= '<div class="width-90 margin-30px-bottom display-inline-block last-paragraph-no-margin xs-margin-15px-bottom">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                        if( $pofo_enable_quote ) {
                            $output .= '<i class="fas fa-quote-left icon-small text-deep-pink display-block margin-15px-bottom '.$pofo_icon_size.'"'.$pofo_icon_color.'></i>';
                        }
                        if( $pofo_member_name ){
                            $output .= '<'.$pofo_member_name_element_tag.' class="text-extra-dark-gray font-weight-600 text-small display-block line-height-10 alt-font'.$pofo_title_text_transform.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>'.$pofo_member_name.'</'.$pofo_member_name_element_tag.'>';
                        }
                        if( $pofo_member_des ){
                            $output .= '<span class="text-light-gray2 text-extra-small text-medium-gray'.$pofo_des_text_transform.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</span>';
                        }
            $output .= '</div>';
        break;

        case 'testimonial-3':

            $output .= '<div'.$id.' class="'.$class_list.' testimonial-style-3">';
                        if( $pofo_enable_quote ) {
                            $output .= '<i class="fas fa-quote-left icon-small text-deep-pink display-block margin-25px-bottom '.$pofo_icon_size.'"'.$pofo_icon_color.'></i>';
                        }
                        if( $pofo_member_name ){
                            $pofo_member_name_dynamic_font_size .= ( $pofo_enable_content && $content ) ? ' margin-5px-bottom' : '';
                            $output .= '<'.$pofo_member_name_element_tag.' class="alt-font text-extra-dark-gray font-weight-600'.$pofo_title_text_transform.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>'.$pofo_member_name.'</'.$pofo_member_name_element_tag.'>';
                        }
                        if( $pofo_enable_content && $content ) {
                            $output .= '<h5 class="alt-font text-extra-dark-gray font-weight-300">' . do_shortcode( $content ) . '</h5>';
                        } 
                        if( $pofo_member_des ){
                            $output .= '<span class="text-extra-small alt-font letter-spacing-3 text-medium-gray'.$pofo_des_text_transform.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</span>';
                        }
            $output .= '</div>';
        break;
    }

    return $output;
}
add_shortcode( 'pofo_testimonial', 'pofo_testimonial_shortcode' );