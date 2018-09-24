<?php
/**
 * Shortcode For Separator
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Separator */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_separator_shortcode' ) ) {
    function pofo_separator_shortcode( $atts, $content = null ) {

        global $pofo_responsive_style;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'pofo_enable_responsive_css' => '',
            'responsive_css' => '',
            
            'pofo_sep_bg_color' => '',

            'desktop_alignment' => 'center-col',

            'pofo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_height' => '',
            'desktop_width' => '',
        ), $atts ) );
        
        $output = $style = '';
        $classes = $style_array = array();

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        
        $classes[] = 'separator-line-horrizontal-full bg-extra-light-gray';

        $pofo_sep_bg_color = ($pofo_sep_bg_color) ? $style_array[] = 'background-color:'.$pofo_sep_bg_color.';' : '';

        // Section Alignment Settings
        $desktop_alignment = ( $desktop_alignment ) ? $classes[] = $desktop_alignment : '';

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        !empty( $desktop_height ) ?  $style_array[] = "min-height: ".$desktop_height.";" : '';
        !empty( $desktop_width ) ?  $style_array[] = "width: ".$desktop_width.";" : '';

        //Unique Style Class
        $classes[] = 'pofo-separator';

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-separator-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        // Class List
        $class_list = !empty( $classes ) ? implode(" ", $classes) : '';
        $class_attr = ( $class_list ) ? ' class="'.$class_list.'"' : '';

        $sep_style = !empty( $style_array ) ? ' style="' . implode( " ", $style_array ) . '"' : '';

        $output .= '<div'.$id.$class_attr.$sep_style.'></div>';

        // Responsive CSS Box Style
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
            
            $pofo_responsive_style .= $responsive_style;
        }

        return $output;
    }
}
add_shortcode( 'pofo_separator', 'pofo_separator_shortcode' );