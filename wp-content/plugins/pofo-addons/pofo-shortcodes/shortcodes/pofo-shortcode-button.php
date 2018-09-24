<?php
/**
 * Shortcode For Button
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Button */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_button_shortcode' ) ) {
    function pofo_button_shortcode( $atts, $content = null ) {
        
        global $pofo_featured_array, $pofo_responsive_style, $pofo_button;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'pofo_enable_responsive_css' => '',
            'responsive_css' => '',

            'pofo_bg_image_type' => '',
            'desktop_bg_image_position' => '',

            'pofo_button_style' =>'',
            'pofo_button_type' => '',
            'pofo_enable_icon' => '',
            'custom_icon' => '',
            'pofo_icon_type' => '',
            'custom_icon_image' => '',
            'pofo_button_icon' => '',
            'pofo_icon_position' => 'left',
            'pofo_button_text' => '',
            'pofo_button_one_page' => '',

            'pofo_button_text_color' => '',
            'pofo_button_icon_color' => '',
            'pofo_button_border_color' => '',
            'pofo_button_hover_bg_color' => '',
            'pofo_button_hover_text_color' => '',
            'pofo_button_hover_icon_color' => '',
            'pofo_button_hover_border_color' => '',

            'desktop_display' => '',
            'desktop_mini_display' => '',
            'ipad_display' => '',
            'mobile_display' => '',
            
            'pofo_animation_style' => '',
        ), $atts ) );

        $output = $style_attr = $style = $icon = '';
        $classes = $style_array = array();

        // Column Id and class
        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        $pofo_button = !empty( $pofo_button ) ? $pofo_button : 0;
        $pofo_button = $pofo_button + 1;
        $classes[] = 'pofo-button-'.$pofo_button;

        $first_button_parse_args = vc_parse_multi_attribute($pofo_button_text);
        $first_button_link     = ( isset($first_button_parse_args['url']) ) ? $first_button_parse_args['url'] : '#';
        $first_button_title    = ( isset($first_button_parse_args['title']) ) ? $first_button_parse_args['title'] : '';
        $first_button_target   = ( isset($first_button_parse_args['target']) ) ? trim($first_button_parse_args['target']) : '_self';
        $first_button_target   = !empty( $first_button_target ) ? ' target="' . $first_button_target . '"' : '';

        if( $pofo_button_one_page == 1 ) {

            $classes[] = 'section-link';
            $first_button_target = '';
        }

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        
        $pofo_animation_style = !empty( $pofo_animation_style ) ? $classes[] = ' wow '.$pofo_animation_style : '';

        // Button Color Settings
        $pofo_button_text_color       = !empty( $pofo_button_text_color ) ? $style_array[] = 'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_icon_color       = !empty( $pofo_button_icon_color ) ? ' style="color:'.$pofo_button_icon_color.';" ' : '';
        $pofo_button_border_color     = !empty( $pofo_button_border_color ) ? $style_array[] = 'border-color:'.$pofo_button_border_color.'; ' : '';

        $pofo_button_hover_bg_color   = !empty( $pofo_button_hover_bg_color ) ? 'background-color:'.$pofo_button_hover_bg_color.' !important; ' : '';
        $pofo_button_hover_text_color = !empty( $pofo_button_hover_text_color ) ? 'color:'.$pofo_button_hover_text_color.' !important; ' : '';
        $pofo_button_hover_icon_color = !empty( $pofo_button_hover_icon_color ) ? 'color:'.$pofo_button_hover_icon_color.' !important; ' : '';
        $pofo_button_hover_border_color= !empty( $pofo_button_hover_border_color ) ? 'border-color:'.$pofo_button_hover_border_color.' !important; ' : '';

        if( !empty( $pofo_button_hover_bg_color ) || !empty( $pofo_button_hover_text_color ) || !empty( $pofo_button_hover_border_color ) ){
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover, a.btn.pofo-button-'.$pofo_button.':focus { '.$pofo_button_hover_bg_color.$pofo_button_hover_text_color.$pofo_button_hover_border_color.' }';
        }
        if( !empty( $pofo_button_hover_icon_color )  ) {
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover i, a.btn.pofo-button-'.$pofo_button.':focus i { '.$pofo_button_hover_icon_color.' }';
        }
        
        // Display setting
        $desktop_display        = !empty($desktop_display) ? $classes[] = $desktop_display : '';
        $desktop_mini_display   = !empty($desktop_mini_display) ? $classes[] = $desktop_mini_display : '';
        $ipad_display           = !empty($ipad_display) ? $classes[] = $ipad_display : '';
        $mobile_display         = !empty($mobile_display) ? $classes[] = $mobile_display : '';
        
        $classes[] = 'button-' . $pofo_button_style . ' ';

        // For Button Style
        switch ($pofo_button_style) {
            case 'style1':
                $classes[] = "btn-dark-gray";
            break;
            case 'style2':
                $classes[] = "btn-white";
            break;
            case 'style3':
                $classes[] = "btn-transparent-black";
            break;
            case 'style4':
                $classes[] = "btn-transparent-white";
            break;
            case 'style5':
                $classes[] = "btn-dark-gray btn-rounded";
            break;
            case 'style6':
                $classes[] = "btn-white btn-rounded";
            break;
            case 'style7':
                $classes[] = "btn-transparent-dark-gray btn-rounded";
            break;
            case 'style8':
                $classes[] = "btn-transparent-white btn-rounded";
            break;
            case 'style9':
                $classes[] = "btn-small button";
            break;
        }

        // For Button Type
        switch ($pofo_button_type) {
            case 'extra-large':
                $classes[] = " btn-extra-large";
            break;
            case 'large':
                $classes[] = " btn-large";
            break;
            case 'medium':
                $classes[] = " btn-medium ";
            break;
            case 'small':
                $classes[] = " btn-small ";
            break;
            case 'vsmall':
                $classes[] = " btn-very-small ";
            break;
        }

        // Image Alt, Title, Caption
        $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt($custom_icon_image) : '';
        $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title($custom_icon_image) : '';
        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

        // new font awesome icons

        $fa_icons_solid = pofo_fontawesome_solid();
        $fa_icons_reg = pofo_fontawesome_reg();
        $fa_icons_brand = pofo_fontawesome_brand();
        $fa_icon_old = pofo_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($pofo_button_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $pofo_button_icon = substr(strstr($pofo_button_icon," "), 1);

            if(array_key_exists($pofo_button_icon, $fa_icon_old)){
                $pofo_button_icon = $fa_icon_old[$pofo_button_icon];
            }else if(in_array($pofo_button_icon, $fa_icons_solid)){
                $pofo_button_icon = 'fas '.$pofo_button_icon;
            }else if(in_array($pofo_button_icon, $fa_icons_reg)){
                $pofo_button_icon = 'far '.$pofo_button_icon;
            }else if(in_array($pofo_button_icon, $fa_icons_brand)){
                $pofo_button_icon = 'fab '.$pofo_button_icon;
            }else{
                $pofo_button_icon = '';
            }
        }


        // Icon or Custom Image
        if( $pofo_enable_icon == 1 ) {
            $icon_title_gap = $pofo_icon_position == 'right' ? ' margin-5px-left no-margin-right' : ' margin-5px-right no-margin-left';
            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                $icon = '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image'.$icon_title_gap.'" />';
            } else { 
                $icon = '<i class="'.$pofo_button_icon.' '.$pofo_icon_type.' '.$icon_title_gap.'" aria-hidden="true"'.$pofo_button_icon_color.'></i>';
            }

            // Icon Position
            if( $pofo_icon_position == 'right' ) {
                $first_button_title = $first_button_title . $icon;
            } else {
                $first_button_title = $icon . $first_button_title;
            }
        }

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-button-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        // Class List
        $class_list = !empty( $classes ) ? implode(" ", $classes) : '';

        // Style Property List
        $style_attr = !empty( $style_array ) ? implode(" ", $style_array) : '';
        $style = !empty( $style_attr ) ? ' style="'.$style_attr.'"' : '';

        if( !empty( $first_button_title ) ) {
            $output .= '<a '.$id.' href="'.$first_button_link.'"'.$first_button_target.' class="btn '.$class_list.'" '.$style.'>'.$first_button_title.'</a>';

            // Responsive CSS Box Style
            if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
                
                $pofo_responsive_style .= $responsive_style;
            }
        }

        return $output;
    }
}
add_shortcode( 'pofo_button', 'pofo_button_shortcode' );