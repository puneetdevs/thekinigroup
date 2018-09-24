<?php
/**
 * Shortcode For Text Block
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Text Block */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'vc_column_text' ) ) {
    function vc_column_text( $atts, $content = null ) {

        global $pofo_responsive_style;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'pofo_enable_responsive_css' => '',
            'responsive_css' => '',

            'pofo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_width' => '',

            'pofo_text_color' => '',
            
        ), $atts ) );
        
        $output = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = $class_attr = $cl_attr = '';
        $classes = $style_array = array();
        $id         = ($id) ? ' id='.$id : '';
        $class      = ($class) ? $classes[] = $class : ''; 

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        if( !is_singular( 'post' ) ) {
            $classes[] = 'last-paragraph-no-margin';
        }

        //Text Color
        $pofo_text_color = !empty( $pofo_text_color ) ? $style_array[] = "color: ".$pofo_text_color.";" : '';

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        !empty( $desktop_width ) ?  $style_array[] = "width: ".$desktop_width.";" : '';

        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-text-block-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        // Class List
        $class_list = !empty( $classes ) ? implode(" ", $classes) : '';

        // Style Property List
        $style_property_list = implode(" ", $style_array);
        $style = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';
        if(!empty($class_list)){
            $cl_attr = ' class="'.$class_list.'"';
        }
        if( $id || $cl_attr || $style){    
            $output .='<div'.$id.$cl_attr.$style.'>';  
        }

        $output.= do_shortcode( pofo_remove_wpautop($content) );
            
        if( $id || $cl_attr || $style){
            $output .='</div>';
        }

        // Responsive CSS Box Style
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
            
            $pofo_responsive_style .= $responsive_style;
        }

        return $output;
    }
}
add_shortcode( 'vc_column_text', 'vc_column_text' );