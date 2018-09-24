<?php
/**
 * Shortcode For Progressbar
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Progressbar */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_progress_shortcode' ) ) 
{
    function pofo_progress_shortcode( $atts, $content = null )
    {
       extract( shortcode_atts( array(
                    'id' => '',
                    'class' => '',
                    'pofo_progress_style' => '',
                    'pofo_progress_values' => '',
                    'pofo_progress_height' => '',
                    'pofo_default_color' => '',
                    'pofo_progress_color' => '',
                    'pofo_gradient_color' => '',
                    'pofo_title_text_transform' => 'text-uppercase',

                    'pofo_title_font_size' => '',
                    'pofo_title_line_height' => '',
                    'pofo_title_letter_spacing' => '',
                    'pofo_title_font_weight' => '',
                    'pofo_title_italic' => '',
                    'pofo_title_underline' => '',
                    'pofo_title_element_tag' => '',
                    'pofo_title_color' => '',
                    'pofo_title_enable_responsive_font' => '',
                ), $atts ) );

        $output = $pofo_progress_bar_style = $pofo_title_style_attr = '';
        $classes = $pofo_title_style_array = array();

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        
        if( !empty( $pofo_progress_values ) ) {

            $pofo_progress_values = json_decode( urldecode( $pofo_progress_values ) );
            $pofo_progress_style = ($pofo_progress_style) ? $classes[] = $pofo_progress_style : 'skillbar-bar-style1';
            
            $class_list     = !empty( $classes ) ? implode(" ", $classes) : '';
            $cl_list        = ( $class_list ) ? ' '.$class_list : '';

            // Title Text Case
            $pofo_title_text_transform = !empty( $pofo_title_text_transform ) ? ' ' . $pofo_title_text_transform : '';

            // For Title Style
            !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
            !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
            !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
            !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
            ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
            ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
            !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

            $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
            $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
            $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );
        
            $height_style                = !empty( $pofo_progress_height ) ? 'height:'.$pofo_progress_height.'; ' : '';
            $pofo_default_color_style    = !empty( $pofo_default_color ) ? 'background-color:'.$pofo_default_color.'; ' : '';
            $pofo_progress_color_style   = !empty( $pofo_progress_color ) ? 'background-color:'.$pofo_progress_color.'; ' : '';

            if( $pofo_progress_style == 'skillbar-bar-style3' ) {
                
                $pofo_progress_color         = !empty( $pofo_progress_color ) ? $pofo_progress_color : '';
                $pofo_gradient_color         = !empty( $pofo_gradient_color ) ? $pofo_gradient_color : '';

                $pofo_progress_color_style   = !empty( $pofo_progress_color ) || !empty( $pofo_gradient_color ) ? 'background: rgba(0, 0, 0, 0) linear-gradient(to right, '.$pofo_progress_color.' 0%, '.$pofo_gradient_color.' 100%) repeat scroll 0 0; ' : '';
            }

            $pofo_progress_bar_style     .= $height_style . $pofo_progress_color_style;
            $pofo_default_color_style    .= $height_style . $pofo_default_color_style;
            $pofo_default_color_style    = !empty( $pofo_default_color_style ) ? ' style="'.$pofo_default_color_style.'"' : '';
            $pofo_progress_bar_style     = !empty( $pofo_progress_bar_style ) ? ' style="'.$pofo_progress_bar_style.'"' : '';

            $output .='<div'.$id.' class="skillbar-bar-main '.$cl_list.'">';
               
                foreach ($pofo_progress_values as $progress_value) {

                    $pofo_progress_width    = !empty( $progress_value->pofo_progress_width ) ? $progress_value->pofo_progress_width : '0';
                    $pofo_progress_title    = !empty( $progress_value->pofo_progress_title ) ? $progress_value->pofo_progress_title : '';

                    // Replace || to <br /> in title
                    $pofo_progress_title = ( $pofo_progress_title ) ? str_replace('||', '<br />',$pofo_progress_title) : '';

                    $output .= '<div class="skillbar margin-45px-bottom" data-percent="'.$pofo_progress_width.'%" '.$pofo_default_color_style.'>';
                        $output .= '<'.$pofo_title_element_tag.' class="skill-bar-text text-extra-small text-dark-gray'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_progress_title.'</'.$pofo_title_element_tag.'>';
                        $output .= '<p class="skillbar-bar"'.$pofo_progress_bar_style.'></p>';
                        $output .= '<span class="skill-bar-percent text-small"></span>';
                    $output .= '</div>';
                }

            $output .='</div>';
        }
        return $output;
    }
}
add_shortcode( 'pofo_progress', 'pofo_progress_shortcode' );