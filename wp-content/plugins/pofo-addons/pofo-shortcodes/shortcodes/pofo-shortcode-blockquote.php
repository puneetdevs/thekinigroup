<?php
/**
 * Shortcode For Blockquote
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blockquote */
/*-----------------------------------------------------------------------------------*/

function pofo_blockquote_shortcode( $atts, $content = null ) {
    
    extract( shortcode_atts( array(
        'id' => '',
        'class' => '',

        'pofo_blockquote_style' =>'',
        'pofo_title'=>'',
        'pofo_author'=>'',
        'pofo_separator_width' =>'',
        'pofo_separator_color' =>'',
        'pofo_background_color' =>'',
        'pofo_enable_icon' =>'1',
        'custom_icon' =>'0',
        'custom_icon_image' =>'',
        'pofo_icon_list' =>'',
        'pofo_icon_size' =>'',
        'pofo_icon_color' =>'',

        'pofo_content_font_size' =>'',
        'pofo_content_line_height' =>'',
        'pofo_content_letter_spacing' =>'',
        'pofo_content_font_weight' =>'',
        'pofo_content_italic' =>'',
        'pofo_content_underline' =>'',
        'pofo_content_color' =>'',
        'pofo_content_enable_responsive_font' =>'',
        'pofo_author_font_size' =>'',
        'pofo_author_line_height' =>'',
        'pofo_author_letter_spacing' =>'',
        'pofo_author_font_weight' =>'',
        'pofo_author_italic' =>'',
        'pofo_author_underline' =>'',
        'pofo_author_color' =>'',
        'pofo_authort_enable_responsive_font' =>'',
        'pofo_title_font_size' =>'',
        'pofo_title_line_height' =>'',
        'pofo_title_letter_spacing' =>'',
        'pofo_title_font_weight' =>'',
        'pofo_title_italic' =>'',
        'pofo_title_underline' =>'',
        'pofo_title_element_tag' =>'',
        'pofo_title_color' =>'',
        'pofo_title_enable_responsive_font' =>'',
    ), $atts ) );
    
    $output = $pofo_content_style_attr = $pofo_author_style_attr = $pofo_title_style_attr = $pofo_separator_attr = '';
    $classes = $pofo_content_style_array = $pofo_author_style_array = $pofo_title_style_array = array();

    $id = ( $id ) ? ' id="'.$id.'"' : '';
    $class = ( $class ) ? $classes[] = $class : '';
    
    // Replace || to <br /> in title
    $pofo_title = ( $pofo_title ) ? str_replace( '||', '<br />', $pofo_title ) : '';

    // Replace || to <br /> in author
    $pofo_author = ( $pofo_author ) ? str_replace( '||', '<br />', $pofo_author ) : '';

    // For Content Style
    !empty( $pofo_content_font_size ) ? $pofo_content_style_array[] = 'font-size: ' . $pofo_content_font_size . ';' : '';
    !empty( $pofo_content_line_height ) ? $pofo_content_style_array[] = 'line-height: ' . $pofo_content_line_height . ';' : '';
    !empty( $pofo_content_letter_spacing ) ? $pofo_content_style_array[] = 'letter-spacing: ' . $pofo_content_letter_spacing . ';' : '';
    !empty( $pofo_content_font_weight ) ? $pofo_content_style_array[] = 'font-weight: ' . $pofo_content_font_weight . ';' : '';
    ( $pofo_content_italic == 1 ) ? $pofo_content_style_array[] = 'font-style: italic;' : '';
    ( $pofo_content_underline == 1 ) ? $pofo_content_style_array[] = 'text-decoration: underline;' : '';
    $pofo_content_color = !empty( $pofo_content_color ) ? $pofo_content_style_array[] ='color: '.$pofo_content_color.';' : '';

    $pofo_content_dynamic_font_size = $pofo_content_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_content_style_attr = pofo_get_style_attribute( $pofo_content_style_array, $pofo_content_font_size, $pofo_content_line_height );

    // For Author Style
    !empty( $pofo_author_font_size ) ? $pofo_author_style_array[] = 'font-size: ' . $pofo_author_font_size . ';' : '';
    !empty( $pofo_author_line_height ) ? $pofo_author_style_array[] = 'line-height: ' . $pofo_author_line_height . ';' : '';
    !empty( $pofo_author_letter_spacing ) ? $pofo_author_style_array[] = 'letter-spacing: ' . $pofo_author_letter_spacing . ';' : '';
    !empty( $pofo_author_font_weight ) ? $pofo_author_style_array[] = 'font-weight: ' . $pofo_author_font_weight . ';' : '';
    ( $pofo_author_italic == 1 ) ? $pofo_author_style_array[] = 'font-style: italic;' : '';
    ( $pofo_author_underline == 1 ) ? $pofo_author_style_array[] = 'text-decoration: underline;' : '';
    $pofo_author_color = !empty( $pofo_author_color ) ? $pofo_author_style_array[] ='color: '.$pofo_author_color.';' : '';

    $pofo_author_dynamic_font_size = $pofo_authort_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_author_style_attr = pofo_get_style_attribute( $pofo_author_style_array, $pofo_author_font_size, $pofo_author_line_height );

    // For Title Style
    !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
    !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
    !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
    !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
    ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
    ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
    !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

    $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
    $pofo_title_style_attr = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

    // Image Alt, Title, Caption
    $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt( $custom_icon_image ) : '';
    $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title( $custom_icon_image ) : '';
    $icon_image_alt         = isset( $icon_img_alt['alt'] ) && !empty( $icon_img_alt['alt'] ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""';
    $icon_image_title       = isset( $icon_img_title['title'] ) && !empty( $icon_img_title['title'] ) ? ' title="'.$icon_img_title['title'].'"' : '';

    $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

    // For icon
    $pofo_icon_color  = ( $pofo_icon_color ) ? ' style="color:'.$pofo_icon_color.'";' : '';
    $pofo_icon_list   = ( $pofo_icon_list ) ? $pofo_icon_list : '';

    $fa_icons_solid = pofo_fontawesome_solid();
    $fa_icons_reg = pofo_fontawesome_reg();
    $fa_icons_brand = pofo_fontawesome_brand();
    $fa_icon_old = pofo_fontawesome_old();
    $font_awesome_fa_icons = explode( ' ', trim( $pofo_icon_list ) );

    if( $font_awesome_fa_icons[0] == 'fa' ) {
        $pofo_icon_list = substr( strstr( $pofo_icon_list, " " ), 1 );

        if( !empty( $pofo_icon_list ) && array_key_exists( $pofo_icon_list, $fa_icon_old ) ) {
            $pofo_icon_list = $fa_icon_old[$pofo_icon_list];
        }else if(in_array($pofo_icon_list, $fa_icons_solid)){
            $pofo_icon_list = 'fas '.$pofo_icon_list;
        }else if(in_array($pofo_icon_list, $fa_icons_reg)){
            $pofo_icon_list = 'far '.$pofo_icon_list;
        }else if(in_array($pofo_icon_list, $fa_icons_brand)){
            $pofo_icon_list = 'fab '.$pofo_icon_list;
        }else{
            $pofo_icon_list = '';
        }
    }

    $pofo_icon_list = ( $pofo_icon_list ) ? ' ' . $pofo_icon_list : '';

    //Unique Style Class
    $classes[] = $pofo_blockquote_style;

    // Class List
    $class_list = !empty( $classes ) ? implode( " ", $classes ) : '';

    switch ( $pofo_blockquote_style ) {

        case 'blockquote-style-1':

            $pofo_background_color= !empty( $pofo_background_color ) ? $pofo_separator_attr .= 'background-color: ' . $pofo_background_color . ';' : '';
            $pofo_separator_color = !empty( $pofo_separator_color ) ? $pofo_separator_attr .= 'border-color: ' . $pofo_separator_color. ';' : '';
            $pofo_separator_width = !empty( $pofo_separator_width ) ? $pofo_separator_attr .= 'border-width: ' . $pofo_separator_width . ';' : '';
            $pofo_separator_attr  = !empty( $pofo_separator_attr ) ? ' style="' . $pofo_separator_attr . '"' : '';

            $output .= '<div'.$id.' class="'.$class_list.'">';
              
                $output .= '<blockquote class="border-color-deep-pink"'.$pofo_separator_attr.'>'; 
              
                  if( $content ) {
                      $output .= '<div class="last-paragraph-no-margin"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                  } 
                  if( $pofo_author ) {
                      $output.= '<footer'.$pofo_author_style_attr.'>' . $pofo_author . '</footer>';
                  } 
               $output.= '</blockquote>';
            $output.= '</div>';
        break;

        case 'blockquote-style-2':
        
            $pofo_title_element_tag = !empty( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h5';
            $pofo_icon_size   = ( $pofo_icon_size ) ? ' '.$pofo_icon_size : ' icon-large';
            
            $output.='<div'.$id.' class="'.$class_list.'">';
                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {

                    $output .= '<div class="icon-set"><img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" /></div>';

                } elseif( $pofo_icon_list ) {

                    $output .= '<i class="margin-15px-bottom text-deep-pink'.$pofo_icon_list.$pofo_icon_size.'"' . $pofo_icon_color . '></i>';
                }
                $output.='<'.$pofo_title_element_tag.' class="alt-font margin-20px-bottom font-weight-500 display-inline-block text-extra-dark-gray"'.$pofo_title_style_attr.'>'. $pofo_title .'</'.$pofo_title_element_tag.'>';
            $output.='</div>';
        break;

        case 'blockquote-style-3':

            $pofo_title_element_tag = !empty( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h6'; 
            $pofo_background_color  = !empty( $pofo_background_color ) ? ' style="background-color: ' . $pofo_background_color . ';"' : '';
            $pofo_icon_size   = ( $pofo_icon_size ) ? ' '.$pofo_icon_size : ' special-char-medium';

            $output.='<div'.$id.' class="'.$class_list.'">';
              $output .='<div class="bg-deep-pink text-center md-width-70 xs-width-85 padding-50px-all xs-padding-45px-tb xs-padding-25px-lr block-4 width-50 absolute-middle-center z-index-5"' . $pofo_background_color . '>';

                  if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {

                      $output .= '<span class="text-white absolute-middle-center top-0 position-absolute"><img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" /></span>';

                  } elseif( $pofo_icon_list ) {

                      $output .= '<span class="text-white absolute-middle-center top-0 position-absolute'.$pofo_icon_list.$pofo_icon_size.'"' . $pofo_icon_color . '></span>';
                  }
                  $output .='<'.$pofo_title_element_tag.' class="font-weight-300 no-margin-bottom text-white"'.$pofo_title_style_attr.'>' . $pofo_title . '</'.$pofo_title_element_tag.'>';
              $output .='</div>';
            $output .='</div>';
        break;
    }
    
    return $output;
}
add_shortcode( 'pofo_blockquote', 'pofo_blockquote_shortcode' );