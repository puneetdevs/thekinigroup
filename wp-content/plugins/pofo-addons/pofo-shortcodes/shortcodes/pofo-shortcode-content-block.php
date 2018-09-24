<?php
/**
 * Shortcode For Content Block 
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Pofo Content Block  */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_content_block_shortcode' ) ) {
    function pofo_content_block_shortcode( $atts, $content = null ) {

        global $pofo_featured_array, $pofo_responsive_style, $pofo_block1, $pofo_block2;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'pofo_enable_responsive_css' => '',
            'responsive_css' => '',

            'pofo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_width' => '',

            'pofo_block_premade_style' => '',
            'pofo_block_title' => '',
            'pofo_block_subtitle' => '',
            'pofo_show_separator' => '1',
            'pofo_show_quote' => '1',
            'pofo_button_config' => '',
            'pofo_button_one_page' => '',
            'pofo_title_text_transform' => '',
            'pofo_separator_color' => '',
            'pofo_separator_height' => '',
            'pofo_quote_color' => '',
            'content_desktop_width' => '',
            'content_desktop_mini_width' => '',
            'content_ipad_width' => '',
            'content_mobile_width' => '',
            'pofo_button_bg_color' => '',
            'pofo_button_text_color' => '',
            'pofo_button_hover_bg_color' => '',
            'pofo_button_hover_text_color' => '',
            'pofo_button_border_color' => '',

            'pofo_title_font_size' => '',
            'pofo_title_line_height' => '',
            'pofo_title_letter_spacing' => '',
            'pofo_title_font_weight' => '',
            'pofo_title_italic' => '',
            'pofo_title_underline' => '',
            'pofo_title_element_tag' => '',
            'pofo_title_color' => '',
            'pofo_title_enable_responsive_font' => '',
            'pofo_subtitle_font_size' => '',
            'pofo_subtitle_line_height' => '',
            'pofo_subtitle_letter_spacing' => '',
            'pofo_subtitle_font_weight' => '',
            'pofo_subtitle_italic' => '',
            'pofo_subtitle_underline' => '',
            'pofo_subtitle_color' => '',
            'pofo_subtitle_enable_responsive_font' => '',

            'initial_loading_animation' => '',
        ), $atts ) );

        $output = '';   

        $pofo_title_style_attr = $pofo_subtitle_style_attr = $sep_style = $quote_style = '';
        $classes = $classes_icon = $style_array = $pofo_title_style_array = $pofo_subtitle_style_array = $content_classes = array();

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';
        
    	( $initial_loading_animation ) ? $classes[] = 'wow '.$initial_loading_animation : '';

        // Replace || to <br /> in title
        $pofo_block_title = ( $pofo_block_title ) ? str_replace('||', '<br />',$pofo_block_title) : '';

    	// For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        ( $pofo_title_text_transform ) ? $pofo_title_dynamic_font_size .=  ' ' . $pofo_title_text_transform : '';

        // For Subtitle Style
        !empty( $pofo_subtitle_font_size ) ? $pofo_subtitle_style_array[] = 'font-size: ' . $pofo_subtitle_font_size . ';' : '';
        !empty( $pofo_subtitle_line_height ) ? $pofo_subtitle_style_array[] = 'line-height: ' . $pofo_subtitle_line_height . ';' : '';
        !empty( $pofo_subtitle_letter_spacing ) ? $pofo_subtitle_style_array[] = 'letter-spacing: ' . $pofo_subtitle_letter_spacing . ';' : '';
        !empty( $pofo_subtitle_font_weight ) ? $pofo_subtitle_style_array[] = 'font-weight: ' . $pofo_subtitle_font_weight . ';' : '';
        ( $pofo_subtitle_italic == 1 ) ? $pofo_subtitle_style_array[] = 'font-style: italic;' : '';
        ( $pofo_subtitle_underline == 1 ) ? $pofo_subtitle_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_subtitle_color ) ? $pofo_subtitle_style_array[] = 'color: '.$pofo_subtitle_color.';' : '';

        $pofo_subtitle_dynamic_font_size = $pofo_subtitle_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_subtitle_style_attr   = pofo_get_style_attribute( $pofo_subtitle_style_array, $pofo_subtitle_font_size, $pofo_subtitle_line_height );

        // Section Width Settings
        $content_desktop_width = ( $content_desktop_width ) ?  $content_classes[] = $content_desktop_width : '';
        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $content_classes[] = $content_desktop_mini_width : '';
        $content_ipad_width   = ( $content_ipad_width ) ? $content_classes[] = $content_ipad_width : '';
        $content_mobile_width = ( $content_mobile_width ) ? $content_classes[] = $content_mobile_width : '';
        
        // Button Color Settings
        $pofo_button_bg_color         = !empty( $pofo_button_bg_color ) ?  'background-color:'.$pofo_button_bg_color.'; ' : '';
        $pofo_button_text_color       = !empty( $pofo_button_text_color ) ?  'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_hover_bg_color   = !empty( $pofo_button_hover_bg_color ) ?  'background-color:'.$pofo_button_hover_bg_color.'; ' : '';
        $pofo_button_hover_text_color = !empty( $pofo_button_hover_text_color ) ?  'color:'.$pofo_button_hover_text_color.'; ' : '';
        $pofo_button_border_color     = !empty( $pofo_button_border_color ) ?  'border-color:'.$pofo_button_border_color.'; ' : '';

        // For Separator Style
        $pofo_separator_color  = ( $pofo_separator_color ) ? 'background-color:'.$pofo_separator_color.'; ' : ''; 
        $pofo_separator_height = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.';' : ''; 
        if( $pofo_separator_color || $pofo_separator_height){
            $sep_style .= ' style="'.$pofo_separator_color.$pofo_separator_height.'"';
        }

        // For Quote Style
        $pofo_quote_color  = ( $pofo_quote_color ) ? 'color:'.$pofo_quote_color.'; ' : ''; 
        if( $pofo_quote_color ) {
            $quote_style .= ' style="'.$pofo_quote_color.'"';
        }

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

        //Unique Style Class
        $classes[] = $pofo_block_premade_style;

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        !empty( $desktop_width ) ?  $style_array[] = "width: ".$desktop_width.";" : '';

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-content-block-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        // Class List
        $class_list     = !empty( $classes ) ? ' ' . implode(" ", $classes) : '';
        $content_class_list = !empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

        // Style List
        $style_list = !empty( $style_array ) ? implode(" ", $style_array) : '';
        $style_list = !empty( $style_list ) ? ' style="'.$style_list.'"' : '';

        switch ($pofo_block_premade_style) {
            
            case 'block-1':

                $pofo_block1 = !empty( $pofo_block1 ) ? $pofo_block1 : 0;
                $pofo_block1 = $pofo_block1 + 1;

                if( !empty( $pofo_button_bg_color ) || !empty( $pofo_button_text_color ) || !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.block1-'.$pofo_block1.' a.btn { '.$pofo_button_bg_color.$pofo_button_text_color.$pofo_button_border_color.' }';
                }
                if( !empty( $pofo_button_hover_bg_color ) || !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.block1-'.$pofo_block1.' a.btn:hover { '.$pofo_button_hover_bg_color.$pofo_button_hover_text_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h1';

                $output .= '<div'.$id.' class="bg-deep-pink-opacity padding-eleven-all sm-padding-seven-all xs-padding-30px-all'.$class_list.' block1-'.$pofo_block1.'"'.$style_list.'>';

                    if( $pofo_show_separator ) {
                        $output .= '<div class="box-separator-line width-180px bg-white md-width-120px sm-width-90px sm-display-none"'.$sep_style.'></div>';
                    }
                    if( $pofo_block_title ){
                        $output .= '<'.$pofo_title_element_tag.' class="font-weight-600 alt-font text-white width-95 sm-width-100'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_block_title.'</'.$pofo_title_element_tag.'>';
                    }
                    if( $content ){
                        $output .= '<div class="text-large font-weight-300 text-white last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                    if( !empty( $pofo_button_title ) ) {
                        $output .= '<a href="'.$pofo_button_link.'"'.$pofo_button_target.' class="btn btn-medium btn-white margin-40px-top xs-margin-10px-top text-link-deep-pink'.$section_link_class.'">'.$pofo_button_title.'</a>';
                    }

                $output .= '</div>';
            break;

            case 'block-2':

                $pofo_block2 = !empty( $pofo_block2 ) ? $pofo_block2 : 0;
                $pofo_block2 = $pofo_block2 + 1;

                if( !empty( $pofo_button_bg_color ) || !empty( $pofo_button_text_color ) || !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.block2-'.$pofo_block2.' a.btn { '.$pofo_button_bg_color.$pofo_button_text_color.$pofo_button_border_color.' }';
                }
                if( !empty( $pofo_button_hover_bg_color ) || !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.block2-'.$pofo_block2.' a.btn:hover { '.$pofo_button_hover_bg_color.$pofo_button_hover_text_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h1';

                $output .= '<div'.$id.' class="padding-80px-all md-padding-ten-all xs-padding-30px-all'.$class_list.' block2-'.$pofo_block2.'"'.$style_list.'>';

                    if( $pofo_block_title ){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-700 letter-spacing-minus-2 title-large'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_block_title.'</'.$pofo_title_element_tag.'>';
                    }
                    if( $pofo_show_separator ) {
                        $output .= '<div class="separator-line-horrizontal-full width-90 margin-35px-tb bg-extra-dark-gray xs-margin-20px-tb sm-width-100"'.$sep_style.'></div>';
                    }
                    if( $content ){
                        $output .= '<div class="text-dark-gray text-extra-large font-weight-300 margin-35px-bottom display-block xs-margin-five-bottom last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                    if( !empty( $pofo_button_title ) ) {
                        $output .= '<a href="'.$pofo_button_link.'"'.$pofo_button_target.' class="btn btn-dark-gray btn-medium'.$section_link_class.'">'.$pofo_button_title.'</a>';
                    }

                $output .= '</div>';
            break;

            case 'block-3':

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';

                $output .= '<div'.$id.' class="'.$class_list.'"'.$style_list.'>';

                    if( $pofo_block_title ){
                        $output .= '<'.$pofo_title_element_tag.' class="font-weight-300 alt-font title-large text-extra-dark-gray display-inline-block vertical-align-bottom margin-auto'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_block_title.'</'.$pofo_title_element_tag.'>';
                    }
                    if( $pofo_block_subtitle ){
                        $output .= '<div class="text-medium-gray text-small margin-40px-top letter-spacing-2 alt-font xs-margin-10px-top'.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.$pofo_block_subtitle.'</div>';
                    }

                $output .= '</div>';
            break;

            case 'block-4':

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h6';

                $output .= '<div'.$id.' class="bg-deep-pink width-50 text-center absolute-middle-center z-index-5 md-width-70 xs-width-85 padding-50px-all xs-padding-45px-tb xs-padding-25px-lr'.$class_list.'"'.$style_list.'>';

                    if( $pofo_show_quote ) {
                        $output .= '<span class="special-char-medium text-white absolute-middle-center top-0 position-absolute fas fa-quote-left"'.$quote_style.'></span>';
                    }
                    if( $pofo_block_title ){
                        $output .= '<'.$pofo_title_element_tag.' class="font-weight-300 no-margin-bottom text-white'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_block_title.'</'.$pofo_title_element_tag.'>';
                    }

                $output .= '</div>';
            break;

        }

        // Responsive CSS Box Style
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
            
            $pofo_responsive_style .= $responsive_style;
        }

        return $output;        
    }
}
add_shortcode( 'pofo_content_block', 'pofo_content_block_shortcode' );