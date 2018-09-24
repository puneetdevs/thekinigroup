<?php
/**
 * Shortcode For Feature Box
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Feature Box */
/*-----------------------------------------------------------------------------------*/
$breadcrumb_text = NULL;
if ( ! function_exists( 'pofo_feature_box_shortcode' ) ) {
    function pofo_feature_box_shortcode( $atts, $content = null ) {
        global $post, $pofo_featured_array, $pofo_responsive_style, $pofo_featurebox1, $pofo_featurebox2, $pofo_featurebox3, $pofo_featurebox4, $pofo_featurebox5, $pofo_featurebox6, $pofo_featurebox7, $pofo_featurebox8, $pofo_featurebox9, $pofo_featurebox10, $pofo_featurebox11, $pofo_featurebox12, $pofo_featurebox13, $pofo_featurebox14, $pofo_featurebox15, $pofo_featurebox16, $pofo_featurebox17, $pofo_featurebox18, $pofo_featurebox19, $pofo_featurebox20, $pofo_featurebox21, $pofo_featurebox22, $pofo_featurebox23, $pofo_featurebox24, $pofo_featurebox25, $pofo_featurebox26, $pofo_featurebox27, $pofo_featurebox28, $pofo_featurebox29, $pofo_featurebox30, $pofo_featurebox31, $pofo_featurebox32, $pofo_featurebox33, $pofo_featurebox34, $pofo_featurebox35,$pofo_featurebox36,$pofo_featurebox37,$pofo_featurebox38;
        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'css' => '',
            'pofo_enable_responsive_css' => '',
            'responsive_css' => '',

            'pofo_bg_image_type' => '',
            'desktop_bg_image_position' => '',
            'desktop_width' => '',

            'pofo_feature_type' => '',
            'pofo_feature_icon' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'pofo_icon_list' =>'',
            'pofo_enable_icon_bg' => '',
            'pofo_number_text' => '',
            
            'pofo_image' => '',
            'pofo_image_position' => 'top',
            'pofo_feature_title' => '',
            'pofo_feature_subtitle' => '',
            'pofo_button_config' => '',
            'pofo_button_one_page' => '',
            'pofo_enable_strike_line' => '1',
            
            'pofo_number_text_font_size' => '',
            'pofo_number_text_line_height' => '',
            'pofo_number_text_font_weight' => '',
            'pofo_number_element_tag' => '',
            'pofo_number_text_color' => '',
            'pofo_number_text_hover_color' => '',
            'pofo_number_text_hover_bg_color' => '',
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
            'pofo_subtitle_color' => '',
            'pofo_subtitle_enable_responsive_font' => '',

            'pofo_box_hover_bg_color' => '',
            'pofo_box_hover_border_color' => '',
            'pofo_box_hover_border_size' => '',
            'pofo_box_border_bottom_color' => '',
            'pofo_box_border_bottom_size' => '',
            'pofo_icon_size' => '',
            'pofo_icon_color' => '',
            'pofo_icon_bg_color' => '',
            'pofo_box_hover_icon_bg_color' => '',
            'pofo_box_hover_icon_color' => '',
            'pofo_box_hover_number_color' => '',
            'pofo_box_hover_title_color' => '',
            'pofo_box_hover_content_color' => '',
            'pofo_box_hover_effect' => '1',
            'pofo_enable_box_shadow' => '1',
            'pofo_enable_link' => '',
            'pofo_link_url' => '',
            'pofo_link_on' => '',
            'pofo_link_target' => '',
            'pofo_link_hover_color' => '',
            'pofo_enable_border' => '1',
            'pofo_border_color' => '#ff214f',
            'pofo_border_size' => '1px',
            'pofo_border_type' => 'solid',
            'pofo_enable_process_line' => '',
            'pofo_enable_separator' => '1',
            'pofo_separator_color' => '',
            'pofo_separator_height' => '',
            'pofo_separator_width' => '',

            'content_desktop_width' => '',
            'content_desktop_mini_width' => '',
            'content_ipad_width' => '',
            'content_mobile_width' => '',
            'pofo_image_srcset' => 'full',
            'pofo_button_bg_color' => '',
            'pofo_button_text_color' => '',
            'pofo_button_hover_bg_color' => '',
            'pofo_button_hover_text_color' => '',
            'pofo_button_border_color' => '',

        ), $atts ) );

        $output = $style = $sep_style = $pofo_title_style_attr = $pofo_subtitle_style_attr = '';
        $classes = $content_classes = $style_array = $pofo_title_style_array = $pofo_subtitle_style_array = array();
        
        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $pofo_feature_type;
        $classes[]  = 'pofo-featurebox'; // This is used for equalize from vc equalize
        
        $pofo_icon_size                     = ( $pofo_icon_size ) ? ' '.$pofo_icon_size : ' icon-medium';
        $pofo_number_text_color             = ( $pofo_number_text_color ) ?  'color:'.$pofo_number_text_color.'; ' : '';
        $pofo_number_text_font_size         = ( $pofo_number_text_font_size ) ?  'font-size:'.$pofo_number_text_font_size.'; ' : '';
        $pofo_number_text_line_height       = ( $pofo_number_text_line_height ) ?  'line-height:'.$pofo_number_text_line_height.'; ' : '';
        $pofo_number_text_hover_color       = ( $pofo_number_text_hover_color ) ?  'color:'.$pofo_number_text_hover_color.'; ' : '';
        $pofo_number_text_hover_bg_color    = ( $pofo_number_text_hover_bg_color ) ?  'background-color:'.$pofo_number_text_hover_bg_color.'; ' : '';
        $pofo_number_text_font_weight       = ( $pofo_number_text_font_weight ) ? 'font-weight:'.$pofo_number_text_font_weight.'; ' : '';
        $pofo_icon_color                    = ( $pofo_icon_color ) ? 'color:'.$pofo_icon_color.'; ' : '';
        $pofo_icon_bg_color                 = ( $pofo_icon_bg_color ) ? 'background-color:'.$pofo_icon_bg_color.'; ' : '';
        $pofo_box_hover_icon_bg_color       = ( $pofo_box_hover_icon_bg_color ) ? 'background-color:'.$pofo_box_hover_icon_bg_color.' !important; ' : '';
        $pofo_box_hover_icon_color          = ( $pofo_box_hover_icon_color ) ? ' color:'.$pofo_box_hover_icon_color.' !important;' : '';
        $pofo_box_hover_number_color        = ( $pofo_box_hover_number_color ) ? ' color:'.$pofo_box_hover_number_color.' !important;' : '';
        $pofo_box_hover_title_color         = ( $pofo_box_hover_title_color ) ? ' color:'.$pofo_box_hover_title_color.' !important;' : '';
        $pofo_box_hover_content_color       = ( $pofo_box_hover_content_color ) ? ' color:'.$pofo_box_hover_content_color.' !important;' : '';
        $pofo_box_hover_bg_color            = ( $pofo_box_hover_bg_color ) ? 'background-color:'.$pofo_box_hover_bg_color.' !important;' : '';
        $pofo_box_hover_border_color        = ( $pofo_box_hover_border_color ) ? 'background-color:'.$pofo_box_hover_border_color.';' : '';
        $pofo_box_hover_border_size         = ( $pofo_box_hover_border_size ) ? $pofo_box_hover_border_size : '';
        $pofo_box_border_bottom_color       = ( $pofo_box_border_bottom_color ) ? 'background-color:'.$pofo_box_border_bottom_color.';' : '';
        $pofo_box_border_bottom_size        = ( $pofo_box_border_bottom_size ) ? 'height:'.$pofo_box_border_bottom_size.';' : '';

        if( $pofo_feature_type == 'featurebox9' ) {        
            $pofo_separator_color  = ( $pofo_separator_color ) ? 'border-color:'.$pofo_separator_color.'; ' : '';
        } else {
            $pofo_separator_color  = ( $pofo_separator_color ) ? 'background:'.$pofo_separator_color.'; ' : '';
        }

        $pofo_separator_width = ( $pofo_separator_width ) ? 'width:'.$pofo_separator_width.'; ' : '';

        if( $pofo_feature_type == 'featurebox2' || $pofo_feature_type == 'featurebox9' ) {
            $pofo_separator_height = ( $pofo_separator_height ) ? 'width:'.$pofo_separator_height.'; ' : '';
        } else {
            $pofo_separator_height = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.'; ' : '';
        }

        if( $pofo_separator_color || $pofo_separator_height ){
            $sep_style .= ' style="'.$pofo_separator_color.$pofo_separator_height.$pofo_separator_width.'"';
        }

        $pofo_icon_list     = ( $pofo_icon_list ) ? $pofo_icon_list : '';
        $pofo_feature_subtitle = ( $pofo_feature_subtitle ) ? $pofo_feature_subtitle : '';

        $pofo_link_url      = ( $pofo_link_url ) ? $pofo_link_url : '';
        $pofo_link_on       = ( $pofo_link_on ) ? $pofo_link_on : '';
        $pofo_link_hover_color = ( $pofo_link_hover_color ) ? 'color: '.$pofo_link_hover_color.';' : '';

        $pofo_link_target_attr  = ( !empty( $pofo_link_target ) && $pofo_link_target != 'one_page' ) ? ' target="'.$pofo_link_target.'"' : '';
        $section_link_class     = $pofo_link_target == 'one_page' ? ' section-link' : '';

        // Button Color Settings
        $pofo_button_strike_line_color= !empty( $pofo_button_text_color ) ?  'background-color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_hover_strike_line_color= !empty( $pofo_button_hover_text_color ) ?  'background-color:'.$pofo_button_hover_text_color.'; ' : '';
        $pofo_button_bg_color         = !empty( $pofo_button_bg_color ) ?  'background-color:'.$pofo_button_bg_color.'; ' : '';
        $pofo_button_text_color       = !empty( $pofo_button_text_color ) ?  'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_hover_bg_color   = !empty( $pofo_button_hover_bg_color ) ?  'background-color:'.$pofo_button_hover_bg_color.'; ' : '';
        $pofo_button_hover_text_color = !empty( $pofo_button_hover_text_color ) ?  'color:'.$pofo_button_hover_text_color.'; ' : '';
        $pofo_button_border_color     = !empty( $pofo_button_border_color ) ?  'border-color:'.$pofo_button_border_color.'; ' : '';

        // Replace || to <br /> in title
        $pofo_feature_title = ( $pofo_feature_title ) ? str_replace('||', '<br />',$pofo_feature_title) : '';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        $pofo_title_color = !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        // For Subtitle Style
        !empty( $pofo_subtitle_font_size ) ? $pofo_subtitle_style_array[] = 'font-size: ' . $pofo_subtitle_font_size . ';' : '';
        !empty( $pofo_subtitle_line_height ) ? $pofo_subtitle_style_array[] = 'line-height: ' . $pofo_subtitle_line_height . ';' : '';
        !empty( $pofo_subtitle_letter_spacing ) ? $pofo_subtitle_style_array[] = 'letter-spacing: ' . $pofo_subtitle_letter_spacing . ';' : '';
        !empty( $pofo_subtitle_font_weight ) ? $pofo_subtitle_style_array[] = 'font-weight: ' . $pofo_subtitle_font_weight . ';' : '';
        !empty( $pofo_subtitle_color ) ? $pofo_subtitle_style_array[] = 'color: '.$pofo_subtitle_color.';' : '';

        $pofo_subtitle_dynamic_font_size = $pofo_subtitle_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_subtitle_style_attr   = pofo_get_style_attribute( $pofo_subtitle_style_array, $pofo_subtitle_font_size, $pofo_subtitle_line_height );

        // For Number Text Border
        $pofo_border_color      = !empty( $pofo_border_color ) ? 'border-color: ' . $pofo_border_color . '; ' : '';
        $pofo_border_size       = !empty( $pofo_border_size ) ? 'border-width: ' . $pofo_border_size . '; ' : '';
        $pofo_border_type       = !empty( $pofo_border_type ) ? 'border-style: ' . $pofo_border_type . '; ' : '';
        $pofo_border_style      = ( $pofo_enable_border == 0 ) ? 'border: none; ' : $pofo_border_color.$pofo_border_size.$pofo_border_type;

        $pofo_button_parse_args = !empty( $pofo_button_config ) ? vc_parse_multi_attribute($pofo_button_config) : '';
        $pofo_button_link       = ( isset($pofo_button_parse_args['url']) ) ? $pofo_button_parse_args['url'] : '#';
        $pofo_button_title      = ( isset($pofo_button_parse_args['title']) ) ? $pofo_button_parse_args['title'] : '';
        $pofo_button_target     = ( isset($pofo_button_parse_args['target']) ) ? trim($pofo_button_parse_args['target']) : '_self';
        $pofo_button_target     = !empty( $pofo_button_target ) ? ' target="' . $pofo_button_target . '"' : '';

        $section_button_class = '';
        if( $pofo_button_one_page == 1 ) {

            $section_button_class = ' section-link';
            $pofo_button_target = '';
        }

        // Image Alt, Title, Caption
        $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt($custom_icon_image) : '';
        $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title($custom_icon_image) : '';
        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

        $img_alt           = !empty( $pofo_image ) ? pofo_option_image_alt($pofo_image) : '';
        $img_title         = !empty( $pofo_image ) ? pofo_option_image_title($pofo_image) : '';
        $image_alt         = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
        $image_title       = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

        $pofo_image_srcset  = !empty($pofo_image_srcset) ? $pofo_image_srcset : 'full';
        $thumb              = !empty( $pofo_image ) ? wp_get_attachment_image_src($pofo_image, $pofo_image_srcset) : array();

        $srcset = $srcset_data = $sizes = $srcset_classes = '';
        $srcset = wp_get_attachment_image_srcset( $pofo_image, $pofo_image_srcset );
        if( $srcset ){
            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
        }

        $sizes = wp_get_attachment_image_sizes( $pofo_image, $pofo_image_srcset );
        if( $sizes ){
            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
        }

        // Section Width Settings
        $content_desktop_width = ( $content_desktop_width ) ?  $content_classes[] = $content_desktop_width : '';
        $content_desktop_mini_width = ( $content_desktop_mini_width ) ? $content_classes[] = $content_desktop_mini_width : '';
        $content_ipad_width   = ( $content_ipad_width ) ? $content_classes[] = $content_ipad_width : '';
        $content_mobile_width = ( $content_mobile_width ) ? $content_classes[] = $content_mobile_width : '';

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        !empty( $desktop_width ) ?  $style_array[] = "width: ".$desktop_width.";" : '';

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-feature-box-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        // Class List
        $class_list         = !empty( $classes ) ? implode(" ", $classes) : '';
        $content_class_list = !empty( $content_classes ) ? ' ' . implode(" ", $content_classes) : '';

        // Style List
        $style_list = !empty( $style_array ) ? implode(" ", $style_array) : '';
        $style_list = !empty( $style_list ) ? ' style="'.$style_list.'"' : '';

        // new font awesome icons

        $fa_icons_solid = pofo_fontawesome_solid();
        $fa_icons_reg = pofo_fontawesome_reg();
        $fa_icons_brand = pofo_fontawesome_brand();
        $fa_icon_old = pofo_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($pofo_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $pofo_icon_list = substr(strstr($pofo_icon_list," "), 1);

            if(array_key_exists($pofo_icon_list, $fa_icon_old)){
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

        switch ($pofo_feature_type) {
            
            case 'featurebox1':

                $pofo_featurebox1 = !empty( $pofo_featurebox1 ) ? $pofo_featurebox1 : 0;
                $pofo_featurebox1 = $pofo_featurebox1 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox1-'.$pofo_featurebox1.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox1-'.$pofo_featurebox1.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'h3';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-1 featurebox1-'.$pofo_featurebox1.'" '.$style_list.'>';
                    $output .= '<div class="margin-15px-bottom alt-font">';
                                    if($pofo_number_text){                 
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<'.$pofo_number_element_tag.' class="text-deep-pink char-value text-medium-gray letter-spacing-minus-1 font-weight-500" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';   
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-large text-extra-dark-gray padding-20px-left sm-padding-15px width-100 line-height-22 display-table-cell vertical-align-middle'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                    $output .= '</div>';
                                if($content){
                                    $output .= '<div class="width-90 sm-width-100 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                                if($pofo_enable_separator) {
                                    $output .= '<div class="clearfix"></div>
                                    <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-30px-top xs-margin-25px-top"'.$sep_style.'></div>';
                                }
                $output .= '</div>';
            break;

            case 'featurebox2':

                $pofo_featurebox2 = !empty( $pofo_featurebox2 ) ? $pofo_featurebox2 : 0;
                $pofo_featurebox2 = $pofo_featurebox2 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox2-'.$pofo_featurebox2.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox2-'.$pofo_featurebox2.' a.feature-icon-link, .featurebox2-'.$pofo_featurebox2.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox2-'.$pofo_featurebox2.' a.feature-icon-link:hover i.link-icon, .featurebox2-'.$pofo_featurebox2.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox2-'.$pofo_featurebox2.'" '.$style_list.'>';
                    $output .= '<div class="col-md-3 col-sm-4 col-xs-12 no-padding-left xs-no-padding-right pull-left">';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {              
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image xs-margin-15px-bottom position-relative top-minus2" />';                 
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif($pofo_icon_list){                
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<i class="link-icon text-medium-gray xs-margin-15px-bottom position-relative top-minus2 '.$pofo_icon_list.$pofo_icon_size.'"></i>';                 
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if($pofo_enable_separator) {
                            $output .= '<span class="separator-line-verticle-large margin-ten-right bg-deep-pink vertical-align-top pull-right margin-two-top hidden-xs"'.$sep_style.'></span>';
                        }
                    $output .= '</div>';
                    $output .= '<div class="col-md-9 col-sm-8 col-xs-12 sm-no-padding-lr">';
                        if($pofo_feature_title){
                            $output .= '<'.$pofo_title_element_tag.' class="text-medium margin-10px-bottom text-extra-dark-gray alt-font display-block'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if($content){
                           $output .= '<div class="width-90 md-width-100 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox3':

                $pofo_featurebox3 = !empty( $pofo_featurebox3 ) ? $pofo_featurebox3 : 0;
                $pofo_featurebox3 = $pofo_featurebox3 + 1;

                if( !empty( $pofo_box_hover_border_color ) ) {
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.'::before, .featurebox3-'.$pofo_featurebox3.'::after, .featurebox3-'.$pofo_featurebox3.' .content::before, .featurebox3-'.$pofo_featurebox3.' .content::after { '.$pofo_box_hover_border_color.' }';
                }
                if( !empty( $pofo_box_hover_border_size ) ) {
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.'::before, .featurebox3-'.$pofo_featurebox3.'::after { width: '.$pofo_box_hover_border_size.'; }';
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.' .content::before, .featurebox3-'.$pofo_featurebox3.' .content::after { height: '.$pofo_box_hover_border_size.'; }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.' a.feature-icon-link, .featurebox3-'.$pofo_featurebox3.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox3-'.$pofo_featurebox3.' a.feature-icon-link:hover i.link-icon, .featurebox3-'.$pofo_featurebox3.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box featurebox3-'.$pofo_featurebox3.'" '.$style_list.'>';
                    $output .= '<div class="content">';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image margin-25px-bottom" />';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif($pofo_icon_list){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<i class="link-icon margin-25px-bottom sm-margin-15px-bottom text-medium-gray '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if($pofo_feature_title){
                            $output .= '<'.$pofo_title_element_tag.' class="text-medium alt-font text-capitalize text-extra-dark-gray margin-10px-bottom sm-margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if($content){
                           $output .= '<div class="width-85 margin-lr-auto sm-width-100 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox4':

                $pofo_featurebox4 = !empty( $pofo_featurebox4 ) ? $pofo_featurebox4 : 0;
                $pofo_featurebox4 = $pofo_featurebox4 + 1;

                if( !empty( $pofo_button_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.btn { '.$pofo_button_bg_color.' }';   
                }
                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.btn { '.$pofo_button_text_color.' }';   
                }
                if( !empty( $pofo_button_hover_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.btn:hover { '.$pofo_button_hover_bg_color.' }';   
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                }
                if( !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.btn { '.$pofo_button_border_color.' }';   
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox4-'.$pofo_featurebox4.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="grid-item feature-box-4 '.$class_list.' featurebox4-'.$pofo_featurebox4.'" '.$style_list.'>';
                    $output .= '<div class="content">';
                        $output .= '<figure>';
                                if( !empty( $thumb[0] ) ){
                                    $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/>';
                                }
                                $output .= '<div class="opacity-medium bg-extra-dark-gray"></div>';
                                $output .= '<figcaption>';
                                    if($pofo_feature_subtitle){
                                        $output .= '<span class="text-medium-gray margin-10px-bottom display-inline-block'.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</span>';
                                    }
                                    if($pofo_enable_separator) {
                                        $output .= '<div class="bg-deep-pink separator-line-horrizontal-full display-inline-block margin-10px-bottom"'.$sep_style.'></div>';
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-large display-block text-white alt-font margin-25px-bottom width-60 md-width-100 sm-width-100 sm-margin-seven-bottom xs-width-100'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($pofo_button_title){
                                        $output .= '<a class="btn btn-very-small btn-white font-weight-300'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                        $output .= $pofo_button_title;
                                        $output .= '</a>';
                                    }
                            $output .= '</figcaption>';
                        $output .= '</figure>';
                    $output .= '</div>';
                $output .= '</div>';
            break;
                 
            case 'featurebox5':

                $pofo_featurebox5 = !empty( $pofo_featurebox5 ) ? $pofo_featurebox5 : 0;
                $pofo_featurebox5 = $pofo_featurebox5 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox5-'.$pofo_featurebox5.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox5-'.$pofo_featurebox5.' a.feature-icon-link, .featurebox5-'.$pofo_featurebox5.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox5-'.$pofo_featurebox5.' a.feature-icon-link:hover i.link-icon, .featurebox5-'.$pofo_featurebox5.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $class_list .= ( $custom_icon == 1 && !empty( $custom_icon_image ) ) || ( $custom_icon != 1 && !empty( $pofo_icon_list ) ) ? ' feature-box-5' : '';
                $output .= '<div'.$id.' class="'.$class_list.' position-relative featurebox5-'.$pofo_featurebox5.'" '.$style_list.'>';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';   
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif($pofo_icon_list){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<i class="link-icon text-medium-gray '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                    $output .= '<div class="feature-content">';
                        if($pofo_feature_title){
                            $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if($content){
                           $output .= '<div class="last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox6':

                $pofo_featurebox6 = !empty( $pofo_featurebox6 ) ? $pofo_featurebox6 : 0;
                $pofo_featurebox6 = $pofo_featurebox6 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox6-'.$pofo_featurebox6.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox6-'.$pofo_featurebox6.' a.feature-icon-link, .featurebox6-'.$pofo_featurebox6.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox6-'.$pofo_featurebox6.' a.feature-icon-link:hover i.link-icon, .featurebox6-'.$pofo_featurebox6.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="padding-fifteen-all xs-padding-five-lr xs-padding-ten-tb display-table-cell vertical-align-middle featurebox6-'.$pofo_featurebox6.' '.$class_list.'" '.$style_list.'>';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image margin-two-top" />';    
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }elseif($pofo_icon_list){
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<i class="link-icon margin-two-top text-deep-pink '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="display-block alt-font font-weight-600 text-extra-dark-gray margin-25px-top sm-margin-15px-top'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if($content){
                               $output .= '<div class="last-paragraph-no-margin margin-5px-top">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                $output .= '</div>';
            break;

            case 'featurebox7':

                $pofo_featurebox7 = !empty( $pofo_featurebox7 ) ? $pofo_featurebox7 : 0;
                $pofo_featurebox7 = $pofo_featurebox7 + 1;

                if( $pofo_box_hover_effect == 1 && !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox7-'.$pofo_featurebox7.'.box:hover { '.$pofo_box_hover_bg_color.' }';
                }
                if( !empty( $pofo_box_hover_title_color ) ) {
                    $pofo_featured_array[] = '.feature-box-7 .featurebox7-'.$pofo_featurebox7.'.box:hover span { '.$pofo_box_hover_title_color.' }';
                }
                if( !empty( $pofo_box_hover_icon_color ) ) {
                    $pofo_featured_array[] = '.feature-box-7 .featurebox7-'.$pofo_featurebox7.'.box:hover i { '.$pofo_box_hover_icon_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox7-'.$pofo_featurebox7.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox7-'.$pofo_featurebox7.' a.feature-icon-link, .featurebox7-'.$pofo_featurebox7.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox7-'.$pofo_featurebox7.' a.feature-icon-link:hover i.link-icon, .featurebox7-'.$pofo_featurebox7.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box feature-box-7">';
                    $output .= '<div class="box featurebox7-'.$pofo_featurebox7.'" '.$style_list.'>';
                        $output .= '<div class="content">';
                            $output .= '<figure>';
                                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '</a>';
                                                }
                                            }elseif($pofo_icon_list){
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= '<i class="link-icon text-medium-gray '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '</a>';
                                                }
                                            }
                                            if($pofo_feature_title){
                                                $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray display-block margin-15px-top'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                        $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                    }
                                                        $output .= $pofo_feature_title;
                                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                        $output .= '</a>';
                                                    }
                                                $output .= '</'.$pofo_title_element_tag.'>';
                                            }
                                            if($content){
                                               $output .= '<div class="details">
                                                                <div class="center-col margin-10px-top last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>
                                                        </div>';
                                            }
                            $output .= '</figure>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox8':

                if( $pofo_enable_box_shadow == 1 ) {
                    $class_list .= ' box-shadow-light';
                }

                $pofo_featurebox8 = !empty( $pofo_featurebox8 ) ? $pofo_featurebox8 : 0;
                $pofo_featurebox8 = $pofo_featurebox8 + 1;

                if( $pofo_box_hover_effect == 1 && !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover .feature-box-overlay { height: 100% !important; '.$pofo_box_hover_bg_color.' }';
                }
                if( !empty( $pofo_box_border_bottom_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.' .feature-box-overlay { '.$pofo_box_border_bottom_color.' }';
                }
                if( $pofo_box_hover_effect != 1 ) {
                    
                    $pofo_box_border_bottom_size = !empty( $pofo_box_border_bottom_size ) ? $pofo_box_border_bottom_size : 'height: 2px !important;';
                    $pofo_box_border_bottom_color = !empty( $pofo_box_border_bottom_color ) ? $pofo_box_border_bottom_color : 'background-color: #ff214f !important';

                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover .feature-box-overlay { '.$pofo_box_border_bottom_size.' '.$pofo_box_border_bottom_color.' }';
                    //$pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover div, .featurebox8-'.$pofo_featurebox8.':hover p { color: inherit !important; }';
                }

                if( !empty( $pofo_box_hover_icon_color ) || !empty( $pofo_box_hover_icon_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover i { '.$pofo_box_hover_icon_color.$pofo_box_hover_icon_bg_color.' }';
                }                
                if( !empty( $pofo_box_hover_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover div { '.$pofo_box_hover_title_color.' }';
                }
                if( !empty( $pofo_box_hover_content_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.':hover p { '.$pofo_box_hover_content_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.' a.feature-icon-link, .featurebox8-'.$pofo_featurebox8.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox8-'.$pofo_featurebox8.' a.feature-icon-link:hover i.link-icon, .featurebox8-'.$pofo_featurebox8.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $box_hover_class = $pofo_box_hover_effect == 1 ? ' feature-box-8 ' : '';

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="'.$class_list.$box_hover_class.' position-relative overflow-hidden z-index-5 padding-twelve-all md-padding-six-all xs-padding-15px-lr featurebox8-'.$pofo_featurebox8.'" '.$style_list.'>';
                    $icon_bg = $pofo_enable_icon_bg == 1 ? ' text-white icon-round-small bg-deep-pink' : ' text-deep-pink ';
                    
                    $icon_wrap_margin_bottom = $pofo_enable_icon_bg == 1 ? ' margin-20px-bottom' : '';
                    $icon_margin_bottom = $pofo_enable_icon_bg == 1 || $pofo_enable_box_shadow == 1 ? ' margin-25px-bottom margin-25px-top sm-margin-20px-bottom xs-margin-15px-bottom' : ' margin-20px-bottom';

                    //$last_p_no_margin = $pofo_enable_box_shadow != 1 ? ' last-paragraph-no-margin' : '';

                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $output .= '<div class="display-inline-block'.$icon_wrap_margin_bottom.'">';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image'.$icon_margin_bottom.'" />';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</div>';
                        }elseif($pofo_icon_list){
                            $output .= '<div class="display-inline-block'.$icon_wrap_margin_bottom.'">';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<i class="link-icon '.$pofo_icon_list.$pofo_icon_size.$icon_bg.$icon_margin_bottom.'" style="'.$pofo_icon_color.$pofo_icon_bg_color.'"></i>';   
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</div>';
                        }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom sm-margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($content){
                       $output .= '<div class="center-col last-paragraph-no-margin '.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                    if( $pofo_box_hover_effect == 1 ) {
                        $output .= '<div class="feature-box-overlay bg-deep-pink" style="'.$pofo_box_border_bottom_size.'"></div>';
                    }
                $output .= '</div>';
            break;

            case 'featurebox9':

                $pofo_featurebox9 = !empty( $pofo_featurebox9 ) ? $pofo_featurebox9 : 0;
                $pofo_featurebox9 = $pofo_featurebox9 + 1;

                if( !empty( $pofo_box_hover_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox9-'.$pofo_featurebox9.':hover i { '.$pofo_box_hover_icon_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox9-'.$pofo_featurebox9.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox9-'.$pofo_featurebox9.' a.feature-icon-link, .featurebox9-'.$pofo_featurebox9.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox9-'.$pofo_featurebox9.' a.feature-icon-link:hover i.link-icon, .featurebox9-'.$pofo_featurebox9.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'p';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-9 display-inline-block featurebox9-'.$pofo_featurebox9.'" '.$style_list.'>';
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image margin-20px-bottom" />';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif($pofo_icon_list){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i class="link-icon margin-20px-bottom text-deep-pink '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-medium text-light-gray'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-light-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($pofo_enable_separator) {
                        $output .= '<div class="text-bottom-line border-color-deep-pink"'.$sep_style.'></div>';
                    }
                $output .= '</div>';
            break;

            case 'featurebox10':

                $pofo_featurebox10 = !empty( $pofo_featurebox10 ) ? $pofo_featurebox10 : 0;
                $pofo_featurebox10 = $pofo_featurebox10 + 1;

                if( !empty( $pofo_number_text_hover_color ) || !empty( $pofo_number_text_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox10-'.$pofo_featurebox10.':hover .number { '.$pofo_number_text_hover_color.' '.$pofo_number_text_hover_bg_color.' }';
                    $pofo_featured_array[] = '.featurebox10-'.$pofo_featurebox10.' .number { '.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox10-'.$pofo_featurebox10.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox10-'.$pofo_featurebox10.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-10 featurebox10-'.$pofo_featurebox10.'" '.$style_list.'>';
                    if($pofo_number_text){
                        $process_line = $pofo_enable_process_line == 1 ? ' number-center ' : '';
                        $output .= '<div class="display-inline-block padding-five-all xs-padding-15px-all margin-10px-bottom">';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<span class="number alt-font border-width-2 border-all border-color-deep-pink border-radius-100 letter-spacing-minus-1 text-extra-dark-gray '.$process_line.'" style="'.$pofo_border_style.'">'.$pofo_number_text.'</span>';   
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</div>';
                    }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-medium text-extra-dark-gray margin-10px-bottom sm-margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($content){
                       $output .= '<div class="width-75 md-width-85 xs-width-100  display-inline-block last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                $output .= '</div>';
            break;
                 
            case 'featurebox11':

                $pofo_featurebox11 = !empty( $pofo_featurebox11 ) ? $pofo_featurebox11 : 0;
                $pofo_featurebox11 = $pofo_featurebox11 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox11-'.$pofo_featurebox11.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox11-'.$pofo_featurebox11.' a.feature-icon-link, .featurebox11-'.$pofo_featurebox11.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox11-'.$pofo_featurebox11.' a.feature-icon-link:hover i.link-icon, .featurebox11-'.$pofo_featurebox11.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $icon_bg = $pofo_enable_icon_bg == 1 ? ' border-radius-100 bg-white padding-30px-all width-130px height-130px line-height-65' : '';

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-11 text-center featurebox11-'.$pofo_featurebox11.'" '.$style_list.'>';
                    
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            $process_line = $pofo_enable_process_line == 1 ? ' progress-line ' : '';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<div class="display-inline-block '.$process_line.$icon_bg.'" style="'.$pofo_icon_bg_color.'">';
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';
                                $output .= '</div>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif($pofo_icon_list){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<div class="display-inline-block'.$icon_bg.'" style="'.$pofo_icon_bg_color.'">';
                                    $output .= '<i class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                $output .= '</div>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font margin-30px-top margin-5px-bottom text-extra-dark-gray xs-margin-15px-top font-weight-600'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($content){
                       $output .= '<div class="width-75 md-width-100 sm-width-90 center-col last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                $output .= '</div>';

            break;

            case 'featurebox12':

                $pofo_featurebox12 = !empty( $pofo_featurebox12 ) ? $pofo_featurebox12 : 0;
                $pofo_featurebox12 = $pofo_featurebox12 + 1;

                if( !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox12-'.$pofo_featurebox12.':hover .hover-content-box { '.$pofo_box_hover_bg_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox12-'.$pofo_featurebox12.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox12-'.$pofo_featurebox12.' a.feature-icon-link, .featurebox12-'.$pofo_featurebox12.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox12-'.$pofo_featurebox12.' a.feature-icon-link:hover i.link-icon, .featurebox12-'.$pofo_featurebox12.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $icon_bg = $pofo_enable_icon_bg == 1 ? ' border-radius-100 bg-white' : '';
                $output .= '<div'.$id.' class="'.$class_list.' position-relative feature-box-12 featurebox12-'.$pofo_featurebox12.'" '.$style_list.'>';
                    
                    $output .= '<div class="feature-icon-box text-medium-gray'.$icon_bg.$pofo_icon_size.'" style="'.$pofo_border_style.$pofo_icon_bg_color.'">';
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif($pofo_icon_list){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i aria-hidden="true" class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    $output .= '</div>';
                    if($pofo_feature_title){
                        $output .= '<div class="feature-content-box padding-30px-left">';
                            if($pofo_feature_title) {
                                $output .= '<p class="no-margin alt-font text-extra-dark-gray text-medium'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_feature_title.'</p>';
                            }
                            if($pofo_feature_subtitle) {
                                $output .= '<p class="no-margin"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</p>';
                            }
                        $output .= '</div>';
                    }
                    if($pofo_feature_title || $content){
                        $output .= '<div class="hover-content-box padding-35px-all sm-padding-25px-all xs-padding-35px-all">';
                            $output .= '<div class="hover-content-box-middle">';
                                $output .= '<div class="hover-content-box-center">';
                                    if($pofo_feature_title) {
                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-very-light-gray no-margin'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-very-light-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                       $output .= '<div class="no-margin last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    }
                $output .= '</div>';
            break;
            
            case 'featurebox13':

                $pofo_featurebox13 = !empty( $pofo_featurebox13 ) ? $pofo_featurebox13 : 0;
                $pofo_featurebox13 = $pofo_featurebox13 + 1;

                if( !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox13-'.$pofo_featurebox13.':before { '.$pofo_box_hover_bg_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox13-'.$pofo_featurebox13.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox13-'.$pofo_featurebox13.' a.feature-icon-link, .featurebox13-'.$pofo_featurebox13.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox13-'.$pofo_featurebox13.' a.feature-icon-link:hover i.link-icon, .featurebox13-'.$pofo_featurebox13.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'p';

                $output .= '<div'.$id.' class="'.$class_list.' feature-box-13 featurebox13-'.$pofo_featurebox13.' position-relative padding-eighteen-all md-padding-ten-all sm-padding-25px-all last-paragraph-no-margin" '.$style_list.'>';
                    
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image  margin-15px-bottom" />';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif($pofo_icon_list){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i aria-hidden="true" class="link-icon text-medium-gray margin-15px-bottom '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    if($pofo_feature_title){
                        if($pofo_feature_title) {
                            $output .= '<'.$pofo_title_element_tag.' class="text-medium text-extra-light-gray alt-font'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-light-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                    }
                    $output .= '<div class="feature-box-overlay bg-deep-pink"></div>';
                $output .= '</div>';
            break;
            
            case 'featurebox14':

                $pofo_featurebox14 = !empty( $pofo_featurebox14 ) ? $pofo_featurebox14 : 0;
                $pofo_featurebox14 = $pofo_featurebox14 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox14-'.$pofo_featurebox14.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox14-'.$pofo_featurebox14.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'h2';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div class="'.$class_list.' feature-box-14 padding-fifteen-all sm-padding-50px-all xs-padding-30px-all featurebox14-'.$pofo_featurebox14.'"'.$style_list.'>';
                    if($pofo_number_text){                 
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<'.$pofo_number_element_tag.' class="text-light-gray alt-font letter-spacing-minus-3 margin-10px-bottom" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';   
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    if($pofo_feature_subtitle){
                        $output .= '<span class="alt-font display-block text-small'.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</span>';
                    }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="display-block alt-font text-medium text-extra-dark-gray margin-10px-bottom xs-margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($content){
                        $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                $output .= '</div>';
            break;

            case 'featurebox15':

                $pofo_featurebox15 = !empty( $pofo_featurebox15 ) ? $pofo_featurebox15 : 0;
                $pofo_featurebox15 = $pofo_featurebox15 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox15-'.$pofo_featurebox15.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox15-'.$pofo_featurebox15.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_hover_bg = ( $pofo_box_hover_bg_color ) ? ' style="'.$pofo_box_hover_bg_color.'"' : '';

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="feature-box-16 xs-width-100 featurebox15-'.$pofo_featurebox15.' '.$class_list.'" '.$style_list.'>';
                    if( !empty( $thumb[0] ) ){
                        $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/>';
                    }
                    $output .= '<div class="feature-box-content">';
                        $output .= '<div class="opacity-full-dark bg-extra-dark-gray" '.$pofo_hover_bg.'></div>';
                        $output .= '<div class="display-table height-100 width-100 position-relative">';
                            $output .= '<div class="vertical-align-middle display-table-cell padding-15px-lr padding-20px-tb">';
                                if($pofo_feature_title){
                                    $output .= '<'.$pofo_title_element_tag.' class="text-white alt-font text-medium margin-15px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-title-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= $pofo_feature_title;
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</'.$pofo_title_element_tag.'>';
                                }
                                if($content){
                                    $output .= '<div class="center-col text-extra-light-gray last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox16':

                $pofo_featurebox16 = !empty( $pofo_featurebox16 ) ? $pofo_featurebox16 : 0;
                $pofo_featurebox16 = $pofo_featurebox16 + 1;

                if( !empty( $pofo_button_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.btn { '.$pofo_button_bg_color.' }';   
                }
                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.btn, .featurebox16-'.$pofo_featurebox16.' a.btn i { '.$pofo_button_text_color.' }';   
                }
                if( !empty( $pofo_button_hover_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.btn:hover { '.$pofo_button_hover_bg_color.' }';   
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.btn:hover, .featurebox16-'.$pofo_featurebox16.' a.btn:hover i { '.$pofo_button_hover_text_color.' }';   
                }
                if( !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.btn { '.$pofo_button_border_color.' }';   
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox16-'.$pofo_featurebox16.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="banner-style3 '.$class_list.' featurebox16-'.$pofo_featurebox16.'" '.$style_list.'>';
                    $output .= '<figure class="bg-extra-dark-gray">';
                        if( !empty( $thumb[0] ) ){
                            $output .= '<div class="banner-image bg-extra-dark-gray">';
                                $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/>';
                            $output .= '</div>';
                        }
                        $output .= '<figcaption>';
                            $output .= '<div class="display-table width-100 height-100">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-large text-white alt-font font-weight-600 margin-10px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                        $output .= '<div class="text-light-gray margin-lr-auto'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    if($pofo_button_title){
                                        $output .= '<a class="btn btn-small btn-white font-weight-300 btn-rounded'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                        $output .= $pofo_button_title . '<i class="ti-arrow-right"></i>';
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</figcaption>';
                    $output .= '</figure>';
                $output .= '</div>';
            break;

            case 'featurebox17':

                $pofo_featurebox17 = !empty( $pofo_featurebox17 ) ? $pofo_featurebox17 : 0;
                $pofo_featurebox17 = $pofo_featurebox17 + 1;

                if( !empty( $pofo_button_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.btn { '.$pofo_button_bg_color.' }';   
                }
                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.btn { '.$pofo_button_text_color.' }';   
                }
                if( !empty( $pofo_button_hover_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.btn:hover { '.$pofo_button_hover_bg_color.' }';   
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                }
                if( !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.btn { '.$pofo_button_border_color.' }';   
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox17-'.$pofo_featurebox17.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="position-relative overflow-hidden '.$class_list.' featurebox17-'.$pofo_featurebox17.'" '.$style_list.'>';
                    if( !empty( $thumb[0] ) ){
                        $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image width-100"/>';
                        $output .= '<div class="opacity-extra-medium bg-extra-dark-gray"></div>';
                    }
                    $output .= '<div class="blog-box">';
                        $output .= '<div class="blog-box-image height-100">';
                            $output .= '<div class="display-table width-100 height-100 text-center">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-white alt-font font-weight-600 text-small letter-spacing-2'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="blog-box-content height-100">';
                            $output .= '<div class="display-table width-100 height-100 text-center">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                    if($pofo_button_title){
                                    $output .= '<a class="btn btn-white btn-rounded btn-small'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                    $output .= $pofo_button_title;
                                    $output .= '</a>';
                                }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox18':

                $pofo_featurebox18 = !empty( $pofo_featurebox18 ) ? $pofo_featurebox18 : 0;
                $pofo_featurebox18 = $pofo_featurebox18 + 1;

                if( !empty( $pofo_button_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.btn { '.$pofo_button_bg_color.' }';   
                }
                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.btn { '.$pofo_button_text_color.' }';   
                }
                if( !empty( $pofo_button_hover_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.btn:hover { '.$pofo_button_hover_bg_color.' }';   
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                }
                if( !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.btn { '.$pofo_button_border_color.' }';   
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox18-'.$pofo_featurebox18.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_hover_bg = ( $pofo_box_hover_bg_color ) ? ' style="'.$pofo_box_hover_bg_color.'"' : '';

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' banner-style2 featurebox18-'.$pofo_featurebox18.'" '.$style_list.'>';
                    $output .= '<figure>';
                        if( !empty( $thumb[0] ) ){
                            if( $srcset ){
                                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                $srcset_classes = ' bg-image-srcset';
                            }
                            $pofo_image_style = "background-image:url('". $thumb[0] ."');";
                            $output .= '<div class="banner-image bg-black height-400px cover-background height-350px'.$srcset_classes.'" style="'.$pofo_image_style.'"'.$srcset_data.'></div>';
                        }
                        $output .= '<figcaption class="padding-seven-all bg-white last-paragraph-no-margin" '.$pofo_hover_bg.'>';
                            $output .= '<div class="display-table width-100 height-100">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                    if($pofo_feature_subtitle){
                                        $output .= '<span class="text-medium-gray alt-font"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</span>';
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-large font-weight-600 text-extra-dark-gray alt-font padding-15px-bottom display-block'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                        $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    if($pofo_button_title){
                                        $output .= '<a class="btn btn-dark-gray btn-small margin-30px-top'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                        $output .= $pofo_button_title;
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</figcaption>';
                    $output .= '</figure>';
                $output .= '</div>';
            break;
            
            case 'featurebox19':

                $pofo_featurebox19 = !empty( $pofo_featurebox19 ) ? $pofo_featurebox19 : 0;
                $pofo_featurebox19 = $pofo_featurebox19 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox19-'.$pofo_featurebox19.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox19-'.$pofo_featurebox19.' a.feature-icon-link, .featurebox19-'.$pofo_featurebox19.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox19-'.$pofo_featurebox19.' a.feature-icon-link:hover i.link-icon, .featurebox19-'.$pofo_featurebox19.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="icon-box width-100 sm-margin-lr-auto xs-width-100 featurebox19-'.$pofo_featurebox19.' '.$class_list.'" '.$style_list.'>';
                    $output .= '<div class="icon-box-holder vertical-align-middle display-table-cell position-relative">';                                    
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image padding-5px-top" />';    
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }elseif($pofo_icon_list){
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<i class="link-icon padding-5px-top '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="alt-font'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if($content){
                               $output .= '<div class="last-paragraph-no-margin ">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox20':

                $pofo_featurebox20 = !empty( $pofo_featurebox20 ) ? $pofo_featurebox20 : 0;
                $pofo_featurebox20 = $pofo_featurebox20 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox20-'.$pofo_featurebox20.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox20-'.$pofo_featurebox20.' a.feature-icon-link, .featurebox20-'.$pofo_featurebox20.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox20-'.$pofo_featurebox20.' a.feature-icon-link:hover i.link-icon, .featurebox20-'.$pofo_featurebox20.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $title_margin_bootm = '';
                $arrow_class = $pofo_image_position == 'bottom' ? ' arrow-bottom' : ' arrow-top';
                $class_list .= $pofo_image_position == 'bottom' ? ' sm-swap-block' : '';

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                if( $srcset ){
                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                    $srcset_classes = ' bg-image-srcset';
                }
                $bg_style = !empty( $thumb[0] ) ? ' style="background-image: url('. $thumb[0] .')"' : '';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-wrap image-hover-style-3 bg-light-gray overflow-hidden featurebox20-'.$pofo_featurebox20.'" '.$style_list.'>';

                    if( $pofo_image_position == 'top' ) {
                        $output .= '<div class="width-100 display-table position-relative cover-background small-screen xs-height-300px'.$srcset_classes.'"'.$bg_style.$srcset_data.'></div>';
                    }
                    $output .= '<div class="width-100 display-table small-screen xs-height-300px'.$arrow_class.'">
                                    <div class="display-table-cell vertical-align-middle text-center padding-eighteen-lr md-padding-twelve-lr sm-padding-fifteen-all sm-padding-ten-lr xs-padding-five-lr xs-padding-fourteen-tb">';
                                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image margin-25px-bottom" />';    
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                        $title_margin_bootm .= ' margin-5px-bottom';
                                    }elseif($pofo_icon_list){
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<i class="link-icon margin-25px-bottom text-deep-pink '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                        $title_margin_bootm .= ' margin-5px-bottom';
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray alt-font width-95 center-col xs-margin-15px-bottom'.$title_margin_bootm.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                       $output .= '<div class="no-letter-spacing padding-two-lr line-height-26 xs-line-height-20 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    if($pofo_enable_separator) {
                                        $output .= '<div class="separator-line-horrizontal-medium-light2 bg-deep-pink display-inline-block margin-40px-top xs-margin-20px-top"'.$sep_style.'></div>';
                                    }
                    $output .= '    </div>
                                </div>';
                    if( $pofo_image_position == 'bottom' ) {
                        $output .= '<div class="width-100 display-table position-relative cover-background small-screen xs-height-300px'.$srcset_classes.'"'.$bg_style.$srcset_data.'></div>';
                    }

                $output .= '</div>';
            break;

            case 'featurebox21':

                $pofo_featurebox21 = !empty( $pofo_featurebox21 ) ? $pofo_featurebox21 : 0;
                $pofo_featurebox21 = $pofo_featurebox21 + 1;

                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.pofo-info-link { '.$pofo_button_text_color.' }';
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.pofo-info-link::before { '.$pofo_button_strike_line_color.' }';
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.pofo-info-link:hover { '.$pofo_button_hover_text_color.' }';
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.pofo-info-link:hover::before { '.$pofo_button_hover_strike_line_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.feature-icon-link, .featurebox21-'.$pofo_featurebox21.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox21-'.$pofo_featurebox21.' a.feature-icon-link:hover i.link-icon, .featurebox21-'.$pofo_featurebox21.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox21-'.$pofo_featurebox21.'" '.$style_list.'>';
                            $output .= '<div class="display-inline-block margin-25px-bottom sm-margin-15px-bottom xs-margin-10px-bottom">';
                                if( $pofo_enable_icon_bg == 1 ) {
                                    $output .= '<div class="bg-extra-dark-gray icon-round-medium" style="'.$pofo_icon_bg_color.'">';
                                }
                                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }elseif($pofo_icon_list){
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<i class="link-icon display-block '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }
                                if( $pofo_enable_icon_bg == 1 ) {
                                    $output .= '</div>';
                                }
                            $output .= '</div>';
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray display-inline-block width-100 text-small font-weight-600 alt-font margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if($content){
                               $output .= '<div class="xs-margin-10px-bottom center-col last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                            if( $pofo_button_title ) {
                                $pofo_strike_line_class = $pofo_enable_strike_line == 1 ? ' text-decoration-line-through-deep-pink' : '';
                                $output .= '<a class="pofo-info-link margin-15px-top xs-no-margin-top display-inline-block text-deep-pink text-small'.esc_attr( $pofo_strike_line_class ).$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                $output .= $pofo_button_title;
                                $output .= '</a>';
                            }
                $output .= '</div>';
            break;

            case 'featurebox22':

                $pofo_featurebox22 = !empty( $pofo_featurebox22 ) ? $pofo_featurebox22 : 0;
                $pofo_featurebox22 = $pofo_featurebox22 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox22-'.$pofo_featurebox22.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox22-'.$pofo_featurebox22.' a.feature-icon-link, .featurebox22-'.$pofo_featurebox22.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox22-'.$pofo_featurebox22.' a.feature-icon-link:hover i.link-icon, .featurebox22-'.$pofo_featurebox22.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="vertical-align-middle featurebox22-'.$pofo_featurebox22.' '.$class_list.'" '.$style_list.'>';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }elseif($pofo_icon_list){
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<i class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="alt-font margin-10px-top no-margin-bottom display-block '.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                $output .= '</div>';
            break;

            case 'featurebox23':

                $pofo_featurebox23 = !empty( $pofo_featurebox23 ) ? $pofo_featurebox23 : 0;
                $pofo_featurebox23 = $pofo_featurebox23 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox23-'.$pofo_featurebox23.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox23-'.$pofo_featurebox23.' a.feature-icon-link, .featurebox23-'.$pofo_featurebox23.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox23-'.$pofo_featurebox23.' a.feature-icon-link:hover i.link-icon, .featurebox23-'.$pofo_featurebox23.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $icon_bg = $pofo_enable_icon_bg == 1 ? ' padding-35px-all border-radius-100 bg-light-gray' : '';
                $output .= '<div'.$id.' class="padding-50px-all md-padding-40px-all xs-padding-30px-all bg-white box-shadow featurebox23-'.$pofo_featurebox23.' '.$class_list.'" '.$style_list.'>';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                $output .= '<div class="display-inline-block margin-40px-bottom xs-margin-30px-bottom'.$icon_bg.'" style="'.$pofo_icon_bg_color.'">';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                            }elseif($pofo_icon_list){
                                $output .= '<div class="display-inline-block margin-40px-bottom xs-margin-30px-bottom'.$icon_bg.'" style="'.$pofo_icon_bg_color.'">';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= '<i class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                            }
                            if($pofo_feature_subtitle){
                                $output .= '<div class="text-small alt-font text-medium-gray"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</div>';
                            }
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-600 display-block margin-20px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if($content){
                               $output .= '<div class="last-paragraph-no-margin ">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                $output .= '</div>';
            break;

            case 'featurebox24':

                $pofo_featurebox24 = !empty( $pofo_featurebox24 ) ? $pofo_featurebox24 : 0;
                $pofo_featurebox24 = $pofo_featurebox24 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox24-'.$pofo_featurebox24.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox24-'.$pofo_featurebox24.' a.feature-icon-link, .featurebox24-'.$pofo_featurebox24.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox24-'.$pofo_featurebox24.' a.feature-icon-link:hover i.link-icon, .featurebox24-'.$pofo_featurebox24.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="position-relative featurebox24-'.$pofo_featurebox24.' '.$class_list.'" '.$style_list.'>';
                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image margin-20px-bottom" />';    
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }elseif($pofo_icon_list){
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= '<i class="link-icon margin-15px-bottom text-deep-pink '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            }
                            $output .= '<div class="feature-content">';
                                if($pofo_feature_title){
                                    $output .= '<'.$pofo_title_element_tag.' class="text-medium text-extra-dark-gray alt-font font-weight-600 display-inline-block margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= $pofo_feature_title;
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</'.$pofo_title_element_tag.'>';
                                }
                                if($pofo_feature_subtitle){
                                    $output .= '<div class="opacity7 margin-15px-bottom xs-margin-5px-bottom"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</div>';
                                }
                                if($content){
                                   $output .= '<div class="last-paragraph-no-margin '.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                            $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox25':

                $pofo_featurebox25 = !empty( $pofo_featurebox25 ) ? $pofo_featurebox25 : 0;
                $pofo_featurebox25 = $pofo_featurebox25 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox25-'.$pofo_featurebox25.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox25-'.$pofo_featurebox25.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'span';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="feature-content padding-30px-all sm-padding-20px-all bg-white box-shadow-light featurebox25-'.$pofo_featurebox25.' '.$class_list.'" '.$style_list.'>';
                                $output .= '<div class="alt-font font-weight-600 text-extra-dark-gray margin-10px-bottom">';
                                    if($pofo_number_text){                 
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<'.$pofo_number_element_tag.' class="text-deep-pink margin-5px-right" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                $output .= '</div>';
                                if($content){
                                   $output .= '<div class="last-paragraph-no-margin ">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                $output .= '</div>';
            break;

            case 'featurebox26':

                $pofo_featurebox26 = !empty( $pofo_featurebox26 ) ? $pofo_featurebox26 : 0;
                $pofo_featurebox26 = $pofo_featurebox26 + 1;

                if( !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox26-'.$pofo_featurebox26.' .feature-box-content:hover .hover-content { '.$pofo_box_hover_bg_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox26-'.$pofo_featurebox26.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox26-'.$pofo_featurebox26.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="team-block feature-box-15 featurebox26-'.$pofo_featurebox26.' '.$class_list.'" '.$style_list.'>';
                    $output .= '<figure>';
                        $output .= '<div class="feature-box-content xs-width-100">';
                            if( !empty( $thumb[0] ) ){
                                $output .='<div class="feature-box-image"><img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/></div>';
                            }
                            $output .= '<div class="hover-content bg-deep-pink">';
                                $output .= '<div class="display-table height-100 width-100">';
                                    $output .= '<div class="vertical-align-middle display-table-cell padding-twelve-lr">';
                                    if($content){
                                        $output .= '<div class="text-white display-inline-block last-paragraph-no-margin ">' .   do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                        if($pofo_feature_title || $pofo_feature_subtitle){
                            $output .= '<figcaption>';
                                $output .= '<div class="margin-25px-top">';
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray alt-font font-weight-600'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($pofo_feature_subtitle){
                                        $output .= '<div class="width-90 sm-width-100 display-inline-block"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</div>';
                                    }
                                $output .= '</div>';
                            $output .= '</figcaption>';
                        }
                    $output .= '</figure>';
                $output .= '</div>';
            break;

            case 'featurebox27':

                $pofo_featurebox27 = !empty( $pofo_featurebox27 ) ? $pofo_featurebox27 : 0;
                $pofo_featurebox27 = $pofo_featurebox27 + 1;

                if( !empty( $pofo_box_hover_title_color ) ) {
                    $pofo_featured_array[] = '.info-banner-box-2.featurebox27-'.$pofo_featurebox27.' .hover-box .hover-title { '.$pofo_box_hover_title_color.' }';
                }
                if( !empty( $pofo_box_hover_content_color ) ) {
                    $pofo_featured_array[] = '.info-banner-box-2.featurebox27-'.$pofo_featurebox27.' .hover-box .hover-content { '.$pofo_box_hover_content_color.' }';
                }                

                if( !empty( $pofo_box_hover_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox27-'.$pofo_featurebox27.' .hover-box i { '.$pofo_box_hover_icon_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox27-'.$pofo_featurebox27.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox27-'.$pofo_featurebox27.' a.feature-icon-link, .featurebox27-'.$pofo_featurebox27.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox27-'.$pofo_featurebox27.' .hover-box a.feature-icon-link:hover i.link-icon, .featurebox27-'.$pofo_featurebox27.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_hover_bg = ( $pofo_box_hover_bg_color ) ? ' style="'.$pofo_box_hover_bg_color.'"' : '';
 
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="info-banner-box-2 bg-medium-light-gray featurebox27-'.$pofo_featurebox27.' '.$class_list.'">';

                    $box_class = $pofo_box_hover_effect == 1 ? 'content-box ' : 'height-100 ';

                    $output .= '<div class="'.$box_class.'display-table width-100 padding-50px-lr md-padding-20px-lr sm-padding-50px-lr xs-padding-15px-lr" '.$style_list.'>';
                        $output .= '<div class="display-table-cell vertical-align-middle">';
                            $output .= '<div class="col-lg-2 col-md-3 col-sm-12 sm-margin-10px-bottom">';
                                if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                }elseif($pofo_icon_list){
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= '<i class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                }
                            $output .= '</div>';
                            $output .= '<div class="col-lg-10 col-md-9 col-sm-12">';
                                if($pofo_feature_title){
                                    $output .= '<'.$pofo_title_element_tag.' class="alt-font text-medium font-weight-600 margin-5px-bottom '.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= $pofo_feature_title;
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</'.$pofo_title_element_tag.'>';
                                }
                                if($content){
                                   $output .= '<div class="last-paragraph-no-margin ">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';

                    if( $pofo_box_hover_effect == 1 ) {

                        $output .= '<div class="hover-box bg-deep-pink text-white bg-medium-light-gray display-table width-100 padding-50px-lr md-padding-20px-lr sm-padding-50px-lr xs-padding-15px-lr" '.$pofo_hover_bg.'>';
                            $output .= '<div class="display-table-cell vertical-align-middle">';
                                $output .= '<div class="col-lg-2 col-md-3 col-sm-12 sm-margin-10px-bottom">';
                                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }elseif($pofo_icon_list){
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-icon-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<i class="link-icon text-white '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }
                                $output .= '</div>';
                                $output .= '<div class="col-lg-10 col-md-9 col-sm-12">';
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="hover-title alt-font text-medium font-weight-600 margin-5px-bottom '.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-white'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                       $output .= '<div class="last-paragraph-no-margin hover-content ">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';

                    }
                $output .= '</div>';
            break;

            case 'featurebox28':

                $pofo_featurebox28 = !empty( $pofo_featurebox28 ) ? $pofo_featurebox28 : 0;
                $pofo_featurebox28 = $pofo_featurebox28 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox28-'.$pofo_featurebox28.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox28-'.$pofo_featurebox28.' a.feature-icon-link, .featurebox28-'.$pofo_featurebox28.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox28-'.$pofo_featurebox28.' a.feature-icon-link:hover i.link-icon, .featurebox28-'.$pofo_featurebox28.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $content_wrap_class = !empty( $content ) ? 'margin-30px-bottom xs-margin-20px-bottom ' : '';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="feature-box-6 position-relative last-paragraph-no-margin featurebox28-'.$pofo_featurebox28.' '.$content_wrap_class.' '.$class_list.'" '.$style_list.'>';
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';    
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif($pofo_icon_list){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i class="link-icon text-deep-pink '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    if($pofo_feature_title || $pofo_feature_subtitle){
                        if($pofo_feature_title){
                            $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-600 line-height-20 display-table'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if($pofo_feature_subtitle){
                            $output .= '<p class="line-height-20"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</p>';
                        }
                    }
                $output .= '</div>';
                if($content){
                    $output .= '<div class="last-paragraph-no-margin ">' .   do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';        
                }
            break;

            case 'featurebox29':

                $pofo_featurebox29 = !empty( $pofo_featurebox29 ) ? $pofo_featurebox29 : 0;
                $pofo_featurebox29 = $pofo_featurebox29 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox29-'.$pofo_featurebox29.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox29-'.$pofo_featurebox29.' a.feature-icon-link, .featurebox29-'.$pofo_featurebox29.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox29-'.$pofo_featurebox29.' a.feature-icon-link:hover i.link-icon, .featurebox29-'.$pofo_featurebox29.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="icon-box width-100 sm-margin-lr-auto xs-width-100 margin-15px-bottom featurebox29-'.$pofo_featurebox29.' '.$class_list.'" '.$style_list.'>';
                    $output .= '<div class="icon-box-holder vertical-align-middle display-table-cell position-relative height-auto last-paragraph-no-margin">';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image padding-5px-top" />';    
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif($pofo_icon_list){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<i class="link-icon text-deep-pink padding-5px-top '.$pofo_icon_list.$pofo_icon_size.'"></i>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if($pofo_feature_title || $pofo_feature_subtitle){
                            if($pofo_feature_title){
                                $output .= '<'.$pofo_title_element_tag.' class="alt-font text-medium-gray text-small'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-title-link text-medium-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_feature_title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if($pofo_feature_subtitle){
                                $output .= '<p class="text-extra-dark-gray font-weight-500"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</p>';
                            }
                        }
                    $output .= '</div>';
                $output .= '</div>';
                if($content){
                    $output .= '<div class="last-paragraph-no-margin '.$content_class_list.'">' .   do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';        
                }
            break;
           
            case 'featurebox30':

                $pofo_featurebox30 = !empty( $pofo_featurebox30 ) ? $pofo_featurebox30 : 0;
                $pofo_featurebox30 = $pofo_featurebox30 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox30-'.$pofo_featurebox30.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox30-'.$pofo_featurebox30.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'h2';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox30-'.$pofo_featurebox30.'" '.$style_list.'>';
                    $output .= '<div class="col-md-3 text-center xs-no-padding-lr">';
                        if($pofo_number_text){                 
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_number_element_tag.' class="text-light-gray alt-font letter-spacing-minus-3 no-margin-bottom sm-margin-10px-bottom" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';   
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                    $output .= '<div class="col-md-9 margin-5px-top xs-no-padding-lr">';
                        if($pofo_feature_title){
                            $output .= '<'.$pofo_title_element_tag.' class="alt-font text-medium text-extra-dark-gray margin-5px-bottom display-block'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $pofo_feature_title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if($pofo_feature_subtitle){
                            $output .= '<span class="alt-font text-extra-small margin-10px-bottom display-block"'.$pofo_subtitle_style_attr.'>'.$pofo_feature_subtitle.'</span>';
                        }
                        if($content){
                           $output .= '<div class="width-80 md-width-100 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox31':

                $pofo_featurebox31 = !empty( $pofo_featurebox31 ) ? $pofo_featurebox31 : 0;
                $pofo_featurebox31 = $pofo_featurebox31 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox31-'.$pofo_featurebox31.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox31-'.$pofo_featurebox31.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'span';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox31-'.$pofo_featurebox31.'" '.$style_list.'>';
                    $output .= '<div class="text-light-gray margin-10px-bottom sm-margin-5px-bottom alt-font">';
                                    if($pofo_number_text){                 
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= '<'.$pofo_number_element_tag.' class="text-deep-pink margin-15px-right pull-left text-large xs-display-block xs-margin-lr-auto xs-width-100" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';   
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    }
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray '.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                    $output .= '</div>';
                                if($content){
                                    $output .= '<div class="last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                $output .= '</div>';
            break;

            case 'featurebox32':

                $pofo_featurebox32 = !empty( $pofo_featurebox32 ) ? $pofo_featurebox32 : 0;
                $pofo_featurebox32 = $pofo_featurebox32 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox32-'.$pofo_featurebox32.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox32-'.$pofo_featurebox32.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox32-'.$pofo_featurebox32.'" '.$style_list.'>';
                                if( !empty( $thumb[0] ) ){
                                    $output .='<div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom"><img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/></div>';
                                }
                                if($pofo_enable_separator) {
                                    $output .= '<div class="separator-line-verticle-small-think bg-deep-pink display-inline-block vertical-align-top margin-two-half-top margin-four-right xs-display-none"'.$sep_style.'></div>';
                                }
                                $output .= '<div class="post-details width-90 display-inline-block xs-width-100 xs-text-center">';   
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font margin-5px-bottom display-block text-extra-dark-gray font-weight-600'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                        $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox33':

                $pofo_featurebox33 = !empty( $pofo_featurebox33 ) ? $pofo_featurebox33 : 0;
                $pofo_featurebox33 = $pofo_featurebox33 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox33-'.$pofo_featurebox33.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox33-'.$pofo_featurebox33.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_number_element_tag = ( $pofo_number_element_tag ) ? $pofo_number_element_tag : 'h5';
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-1 featurebox33-'.$pofo_featurebox33.'" '.$style_list.'>';
                                if($pofo_number_text){                 
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= '<'.$pofo_number_element_tag.' class="text-light-gray font-weight-300 alt-font no-margin-bottom" style="'.$pofo_number_text_color.$pofo_number_text_font_size.$pofo_number_text_line_height.$pofo_number_text_font_weight.'">'.$pofo_number_text.'</'.$pofo_number_element_tag.'>';   
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                }
                                if($pofo_feature_title){
                                    $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray alt-font text-large margin-15px-bottom display-block sm-margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= $pofo_feature_title;
                                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</'.$pofo_title_element_tag.'>';
                                }
                                if($content){
                                    $output .= '<div class="width-90 sm-width-100 last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                }
                                if($pofo_enable_separator) {
                                    $output .= '<div class="separator-line-horrizontal-medium-light3 bg-deep-pink width-50px margin-25px-top display-inline-block"'.$sep_style.'></div>';
                                }
                $output .= '</div>';
            break;

            case 'featurebox34':

                $pofo_featurebox34 = !empty( $pofo_featurebox34 ) ? $pofo_featurebox34 : 0;
                $pofo_featurebox34 = $pofo_featurebox34 + 1;

                if( !empty( $pofo_button_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.btn { '.$pofo_button_bg_color.' }';   
                }
                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.btn, .featurebox34-'.$pofo_featurebox34.' a.btn i { '.$pofo_button_text_color.' }';   
                }
                if( !empty( $pofo_button_hover_bg_color ) ){
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.btn:hover { '.$pofo_button_hover_bg_color.' }';   
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.btn:hover, .featurebox34-'.$pofo_featurebox34.' a.btn:hover i { '.$pofo_button_hover_text_color.' }';   
                }
                if( !empty( $pofo_button_border_color ) ){
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.btn { '.$pofo_button_border_color.' }';   
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox34-'.$pofo_featurebox34.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="bg-white '.$class_list.' featurebox34-'.$pofo_featurebox34.'" '.$style_list.'>';
                                if( !empty( $thumb[0] ) ){
                                    $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/>';
                                }
                                $output .= '<div class="padding-45px-all sm-padding-15px-all inner-match-height">';   
                                    if($pofo_feature_title){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray font-weight-600 display-block alt-font margin-10px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                            }
                                                $output .= $pofo_feature_title;
                                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                $output .= '</a>';
                                            }
                                        $output .= '</'.$pofo_title_element_tag.'>';
                                    }
                                    if($content){
                                        $output .= '<div class="last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    if($pofo_button_title){
                                        $output .= '<a class="btn btn-small btn-rounded btn-transparent-dark-gray margin-25px-top'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                        $output .= $pofo_button_title . '<i class="ti-arrow-right"></i>';
                                        $output .= '</a>';
                                    }
                                $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox35':

                $pofo_featurebox35 = !empty( $pofo_featurebox35 ) ? $pofo_featurebox35 : 0;
                $pofo_featurebox35 = $pofo_featurebox35 + 1;

                if( !empty( $pofo_button_text_color ) ){
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.pofo-info-link { '.$pofo_button_text_color.' }';
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.pofo-info-link::before { '.$pofo_button_strike_line_color.' }';
                }
                if( !empty( $pofo_button_hover_text_color ) ){
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.pofo-info-link:hover, .featurebox35-'.$pofo_featurebox35.' a.pofo-info-link i { '.$pofo_button_hover_text_color.' }';
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.pofo-info-link:hover::before { '.$pofo_button_hover_strike_line_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox35-'.$pofo_featurebox35.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' featurebox35-'.$pofo_featurebox35.'" '.$style_list.'>';
                    if( !empty( $thumb[0] ) ){
                        $output .= '<div class="margin-ten-bottom overflow-hidden image-hover-style-1 sm-margin-20px-bottom">';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' class="icon-image"/>';  
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</div>';
                    }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font margin-5px-bottom display-block text-extra-dark-gray font-weight-600 text-small'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                    $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';   
                    }
                    if($content){
                        $output .= '<div>' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                    }
                    if($pofo_enable_separator) {
                        $output .= '<div class="separator-line-horrizontal-medium-light2 bg-extra-light-gray margin-20px-bottom xs-margin-15px-bottom width-100"'.$sep_style.'></div>';
                    }
                    if($pofo_button_title){
                        $output .= '<a class="pofo-info-link alt-font text-extra-dark-gray font-weight-600 text-extra-small'.$section_button_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                        $output .= $pofo_button_title . '<i class="fas fa-long-arrow-alt-right margin-5px-left text-deep-pink text-medium position-relative top-2" aria-hidden="true"></i>';
                        $output .= '</a>';
                    }
                $output .= '</div>';
            break;

            case 'featurebox36':

                $pofo_featurebox36 = !empty( $pofo_featurebox36 ) ? $pofo_featurebox36 : 0;
                $pofo_featurebox36 = $pofo_featurebox36 + 1;

                if( $pofo_box_hover_effect == 1 && !empty( $pofo_box_hover_bg_color ) ) {
                    $pofo_featured_array[] = '.featurebox36-'.$pofo_featurebox36.'.box:hover { '.$pofo_box_hover_bg_color.' }';
                }
                if( !empty( $pofo_box_hover_title_color ) ) {
                    $pofo_featured_array[] = '.feature-box-7 .featurebox36-'.$pofo_featurebox36.'.box:hover span.text-medium { '.$pofo_box_hover_title_color.' }';
                }
                if( !empty( $pofo_box_hover_number_color ) ) {
                    $pofo_featured_array[] = '.feature-box-7 .featurebox36-'.$pofo_featurebox36.'.box:hover h6 { '.$pofo_box_hover_number_color.' }';
                }
                if( $pofo_enable_box_shadow == 1 ) {
                    $class_list .= ' box-shadow-light';
                }

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox36-'.$pofo_featurebox36.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox36-'.$pofo_featurebox36.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box feature-box-7">';
                    $output .= '<div class="box featurebox36-'.$pofo_featurebox36.'" '.$style_list.'>';
                        $output .= '<div class="content">';
                            $output .= '<figure>';
                                            if( $pofo_number_text ) {
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= '<h6 class="text-deep-pink font-weight-300 margin-5px-bottom">'.$pofo_number_text.'</h6>';    
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '</a>';
                                                }
                                            }
                                            if($pofo_feature_title){
                                                $output .= '<'.$pofo_title_element_tag.' class="text-medium alt-font text-extra-dark-gray display-block margin-15px-top'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                        $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                    }
                                                        $output .= $pofo_feature_title;
                                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                                        $output .= '</a>';
                                                    }
                                                $output .= '</'.$pofo_title_element_tag.'>';
                                            }
                                            if($content){
                                               $output .= '<div class="details">
                                                                <div class="center-col margin-10px-top last-paragraph-no-margin'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>
                                                        </div>';
                                            }
                            $output .= '</figure>';
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'featurebox37':

                $pofo_featurebox37 = !empty( $pofo_featurebox37 ) ? $pofo_featurebox37 : 0;
                $pofo_featurebox37 = $pofo_featurebox37 + 1;

                // Link Color Style
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.featurebox37-'.$pofo_featurebox37.' a.feature-icon-link, .featurebox37-'.$pofo_featurebox37.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.featurebox37-'.$pofo_featurebox37.' a.feature-icon-link:hover i.link-icon, .featurebox37-'.$pofo_featurebox37.' a.feature-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_hover_bg = ( $pofo_box_hover_bg_color ) ? ' style="'.$pofo_box_hover_bg_color.'"' : '';
 
                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $output .= '<div'.$id.' class="'.$class_list.' banner-style1 sm-margin-30px-bottom featurebox37-'.$pofo_featurebox37.'" '.$style_list.'>';
                    $output .= '<figure class="bg-extra-dark-gray" '.$pofo_hover_bg.'>';
                        if( !empty( $thumb[0] ) ){
                            if( $srcset ){
                                $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                $srcset_classes = ' bg-image-srcset';
                            }
                            $pofo_image_style = "background-image:url('". $thumb[0] ."');";
                            $output .= '<div class="banner-image height-250px cover-background'.$srcset_classes.'" style="'.$pofo_image_style.'"'.$srcset_data.'></div>';
                        }
                        $output .= '<figcaption>';
                            $output .= '<div class="display-table width-100 height-100">';
                                $output .= '<div class="display-table-cell vertical-align-middle">';
                                            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '<a class="feature-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= '<div><img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" /></div>';    
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '</a>';
                                                }
                                            }elseif($pofo_icon_list){
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '<a class="feature-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= '<div><i class="link-icon '.$pofo_icon_list.$pofo_icon_size.'"></i></div>';
                                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                                    $output .= '</a>';
                                                }
                                            }
                                            if($content){
                                               $output .= '<div class="center-col text-medium-gray last-paragraph-no-margin xs-padding-15px-lr'.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                            }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</figcaption>';
                    $output .= '</figure>';
                $output .= '</div>';
            break;

            case 'featurebox38':

                $pofo_featurebox38 = !empty( $pofo_featurebox38 ) ? $pofo_featurebox38 : 0;
                $pofo_featurebox38 = $pofo_featurebox38 + 1;

                // Link Color Style
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.featurebox38-'.$pofo_featurebox38.' a.feature-title-link { '.$pofo_title_color.' }';
                }
                if( $pofo_enable_box_shadow == 1 ) {
                    $class_list .= ' box-shadow-light';
                }

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
                $output .= '<div'.$id.' class="'.$class_list.' position-relative overflow-hidden z-index-5 bg-white padding-fifteen-all xs-padding-five-all featurebox38-'.$pofo_featurebox38.'" '.$style_list.'>';

                    if( $pofo_number_text ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="feature-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<h4 class="text-deep-pink alt-font margin-15px-bottom margin-25px-top sm-margin-15px-bottom">'.$pofo_number_text.'</h4>';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    if($pofo_feature_title){
                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-600 margin-10px-bottom sm-margin-5px-bottom feature-title'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="feature-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= $pofo_feature_title;
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        $output .= '</'.$pofo_title_element_tag.'>';
                    }
                    if($content){
                       $output .= '<div class="center-col last-paragraph-no-margin '.$content_class_list.'">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
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
add_shortcode( 'pofo_feature_box', 'pofo_feature_box_shortcode' );