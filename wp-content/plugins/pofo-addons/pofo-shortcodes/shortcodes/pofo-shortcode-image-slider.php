<?php
/**
 * Shortcode For Slider
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$pofo_slider_parent_type='';
$pofo_slider_unique_id = 1;
if ( ! function_exists( 'pofo_slider_shortcode' ) ) {
    function pofo_slider_shortcode( $atts, $content = null ) {

        global $pofo_slider_unique_id, $pofo_featured_array, $pofo_slider_script, $pofoslider1, $pofoslider2, $pofoslider3, $pofoslider4, $pofoslider5, $pofoslider8, $pofoslider9;

        extract( shortcode_atts( array(
                    'slider_premade_style' => '',
                    'pofo_image_slides' => '',
                    'pofo_image_slides_style_seven' => '',
                    'image_gallery' => '',
                    'pofo_image_srcset' => '',

                    'pofo_title' => '',
                    'pofo_subtitle' => '',
                    'pofo_social_sorting' => '',
                    'pofo_fb_url' => '',
                    'pofo_tw_url' => '',
                    'pofo_gp_url' => '',
                    'pofo_db_url' => '',
                    'pofo_li_url' => '',
                    'pofo_ig_url' => '',
                    'pofo_tb_url' => '',
                    'pofo_pi_url' => '',
                    'pofo_yt_url' => '',
                    'pofo_vm_url' => '',
                    'pofo_sc_url' => '',
                    'pofo_fk_url' => '',
                    'pofo_rss_url' => '',
                    'pofo_rd_url' => '',
                    'pofo_bh_url' => '',
                    'pofo_vine_url' => '',
                    'pofo_gh_url' => '',
                    'pofo_xing_url' => '',
                    'pofo_vk_url' => '',
                    'pofo_ws_url' => '',
                    'pofo_yelp_url' => '',
                    'pofo_discord_url' => '',
                    'pofo_email_url' => '',
                    'pofo_custom_link' => '',

                    'show_center_slide' => '1',
                    'pofo_enable_box_shadow' => '0',
                    'show_pagination' => '1',
                    'show_pagination_style' => '',
                    'show_navigation' => '',
                    'show_navigation_style' => '',
                    'pofo_navigation_bg_color' => '',
                    'pofo_navigation_color' => '',
                    'show_cursor_color_style' => '',                    
                    'pofo_content_bg_color' => '',
                    'pofo_content_strikethrough' => '1',
                    
                    'pofo_slider_height' => '',
                    'transition_style' => '',
                    'show_pagination_color_style' => '',
                    'slides_per_view_desktop' => '2',
                    'slides_per_view_mini_desktop' => '2',
                    'slides_per_view_tablet' => '2',
                    'slides_per_view_mobile' => '1',
                    'slides_per_group_desktop' => '',
                    'slides_per_group_mini_desktop' => '',
                    'slides_per_group_tablet' => '',
                    'slides_per_group_mobile' => '',
                    'space_between_slide_desktop' => '15',
                    'space_between_slide_mini_desktop' => '',
                    'space_between_slide_tablet' => '',
                    'space_between_slide_mobile' => '',
                    'slidespeed' => '',
                    'autoplay' => '',
                    'autoloop' => '',
                    'slidedelay' => '3000',
                    'pofo_slider_id' => '',
                    'pofo_slider_class' => '',

                    'show_overlay' => '',
                    'pofo_overlay_opacity' => '0.7',
                    'pofo_row_overlay_color' => '',
                    'pofo_z_index' => '',

                    'pofo_first_button_bg_color' => '',
                    'pofo_first_button_text_color' => '',
                    'pofo_first_button_hover_bg_color' => '',
                    'pofo_first_button_hover_text_color' => '',
                    'pofo_first_button_border_color' => '',
                    'pofo_second_button_bg_color' => '',
                    'pofo_second_button_text_color' => '',
                    'pofo_second_button_hover_bg_color' => '',
                    'pofo_second_button_hover_text_color' => '',
                    'pofo_second_button_border_color' => '',
                    'pofo_icon_type' => 'large-icon',
                    'pofo_icon_color' => '',
                    'pofo_icon_hover_color' => '',

                    'pofo_title_font_size' => '',
                    'pofo_title_line_height' => '',
                    'pofo_title_letter_spacing' => '',
                    'pofo_title_font_weight' => '',
                    'pofo_title_italic' => '',
                    'pofo_title_underline' => '',
                    'pofo_title_element_tag' => '',
                    'pofo_title_color' => '',
                    'pofo_title_enable_responsive_font' => '',
                    'pofo_content_font_size' => '',
                    'pofo_content_line_height' => '',
                    'pofo_content_letter_spacing' => '',
                    'pofo_content_font_weight' => '',
                    'pofo_content_color' => '',
                    'pofo_content_enable_responsive_font' => '',
                ), $atts ) );

        $output = $slider_config = $slider_id = $slider_class = $pofo_title_style_attr = $pofo_content_style_attr = $overlay_style = '';
        $classes = $pofo_title_style_array = $pofo_content_style_array = $social_data = array();

        $slider_premade_style       = ( $slider_premade_style ) ? $slider_premade_style : '';
        $transition_style           = ( $transition_style ) ? $transition_style : '';

        $show_pagination_color_style= ( $show_pagination_color_style ) ? ' swiper-pagination-white' : ' swiper-pagination-black';
        $show_cursor_color_style    = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : '';
        $pofo_content_bg_color      = !empty( $pofo_content_bg_color ) ? ' style="background-color: '.$pofo_content_bg_color.';"' : '';
        $slides_per_view_desktop= !empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : 'auto';
        $slides_per_view_mini_desktop= !empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : 'auto';
        $slides_per_view_tablet = !empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : 'auto';
        $slides_per_view_mobile = !empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : 'auto';

        $slides_per_group_desktop= !empty( $slides_per_group_desktop ) ? $slides_per_group_desktop : '';
        $slides_per_group_mini_desktop= !empty( $slides_per_group_mini_desktop ) ? 'slidesPerGroup: '.$slides_per_group_mini_desktop.',' : '';
        $slides_per_group_tablet = !empty( $slides_per_group_tablet ) ? 'slidesPerGroup: '.$slides_per_group_tablet.',' : '';
        $slides_per_group_mobile = !empty( $slides_per_group_mobile ) ? 'slidesPerGroup: '.$slides_per_group_mobile.',' : '';

        $space_between_slide_desktop = !empty( $space_between_slide_desktop ) ? $space_between_slide_desktop : '';
        $space_between_slide_mini_desktop = !empty( $space_between_slide_mini_desktop ) ? 'spaceBetween: '.$space_between_slide_mini_desktop.',' : '';
        $space_between_slide_tablet = !empty( $space_between_slide_tablet ) ? 'spaceBetween: '.$space_between_slide_tablet.',' : '';
        $space_between_slide_mobile = !empty( $space_between_slide_mobile ) ? 'spaceBetween: '.$space_between_slide_mobile.',' : '';

        // Check if slider id and class
        $pofo_slider_unique_id  = !empty( $pofo_slider_unique_id ) ? $pofo_slider_unique_id : 1;
        $navigation_unique_id   = $pofo_slider_unique_id;
        $pofo_slider_id         = ( $pofo_slider_id ) ? $pofo_slider_id : 'pofo-image-slider';
        $pofo_slider_id         .= '-' . $pofo_slider_unique_id;
        $pofo_slider_unique_id++;

        $pofo_slider_class      = ( $pofo_slider_class ) ?  ' ' . $pofo_slider_class . ' ' . $slider_premade_style : ' ' . $slider_premade_style;

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

        // For Content Style
        !empty( $pofo_content_font_size ) ? $pofo_content_style_array[] = 'font-size: ' . $pofo_content_font_size . ';' : '';
        !empty( $pofo_content_line_height ) ? $pofo_content_style_array[] = 'line-height: ' . $pofo_content_line_height . ';' : '';
        !empty( $pofo_content_letter_spacing ) ? $pofo_content_style_array[] = 'letter-spacing: ' . $pofo_content_letter_spacing . ';' : '';
        !empty( $pofo_content_font_weight ) ? $pofo_content_style_array[] = 'font-weight: ' . $pofo_content_font_weight . ';' : '';
        !empty( $pofo_content_color ) ? $pofo_content_style_array[] = 'color: '.$pofo_content_color.';' : '';

        $pofo_content_dynamic_font_size = $pofo_content_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_content_style_attr   = pofo_get_style_attribute( $pofo_content_style_array, $pofo_content_font_size, $pofo_content_line_height );

        // Overlay Style
        $pofo_overlay_opacity = !empty($pofo_overlay_opacity) ? 'opacity:'.$pofo_overlay_opacity.'; ' : 'opacity:0;';
        $pofo_row_overlay_color_att = ($pofo_row_overlay_color) ? 'background-color:'.$pofo_row_overlay_color.'; ' : '';
        $pofo_z_index = ( $pofo_z_index || $pofo_z_index == '0') ? 'z-index:'.$pofo_z_index.'; ' : '';

        if( $pofo_overlay_opacity || $pofo_row_overlay_color_att || $pofo_z_index ){
            $overlay_style = ' style="'.$pofo_overlay_opacity.$pofo_row_overlay_color_att.$pofo_z_index.'"';
        }

        // Button 1 Color Settings
        $pofo_first_button_bg_color         = ( $pofo_first_button_bg_color ) ?  'background-color:'.$pofo_first_button_bg_color.'; ' : '';
        $pofo_first_button_text_color       = ( $pofo_first_button_text_color ) ?  'color:'.$pofo_first_button_text_color.'; ' : '';
        $pofo_first_button_hover_bg_color   = ( $pofo_first_button_hover_bg_color ) ?  'background-color:'.$pofo_first_button_hover_bg_color.'; ' : '';
        $pofo_first_button_hover_text_color = ( $pofo_first_button_hover_text_color ) ?  'color:'.$pofo_first_button_hover_text_color.'; ' : '';
        $pofo_first_button_border_color     = ( $pofo_first_button_border_color ) ?  'border-color:'.$pofo_first_button_border_color.'; ' : '';

        // Button 2 Color Settings
        $pofo_second_button_bg_color         = ( $pofo_second_button_bg_color ) ?  'background-color:'.$pofo_second_button_bg_color.'; ' : '';
        $pofo_second_button_text_color       = ( $pofo_second_button_text_color ) ?  'color:'.$pofo_second_button_text_color.'; ' : '';
        $pofo_second_button_hover_bg_color   = ( $pofo_second_button_hover_bg_color ) ?  'background-color:'.$pofo_second_button_hover_bg_color.'; ' : '';
        $pofo_second_button_hover_text_color = ( $pofo_second_button_hover_text_color ) ?  'color:'.$pofo_second_button_hover_text_color.'; ' : '';
        $pofo_second_button_border_color     = ( $pofo_second_button_border_color ) ?  'border-color:'.$pofo_second_button_border_color.'; ' : '';

        //$slider_config .= "autoplayStopOnLast: true,";
        $slider_config .= "autoplayDisableOnInteraction: false,";
        $slider_config .= "paginationClickable: true,";
        $slider_config .= "keyboardControl: true,";
        if( $slider_premade_style != 'pofo-slider6' ) {
            $slider_config .= "slidesPerView: 1,";
        }

        switch ($slider_premade_style) {
            case 'pofo-slider1':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_dynamic_font_size .= empty( $pofo_title_element_tag ) ? ' title-extra-large' : '';
                    $pofo_title_element_tag = !empty( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';

                    $pofoslider1 = !empty( $pofoslider1 ) ? $pofoslider1 : 0;
                    $pofoslider1 = $pofoslider1 + 1;

                        // Slider height
                        if( !empty( $pofo_slider_height ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' { height: '.$pofo_slider_height.' !important; }';   
                        }

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.first-btn:hover, .pofo-slider1-'.$pofoslider1.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.first-btn:hover, .pofo-slider1-'.$pofoslider1.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.first-btn, .pofo-slider1-'.$pofoslider1.' a.first-btn:hover, .pofo-slider1-'.$pofoslider1.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.second-btn:hover, .pofo-slider1-'.$pofoslider1.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.second-btn:hover, .pofo-slider1-'.$pofoslider1.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider1-'.$pofoslider1.' a.second-btn, .pofo-slider1-'.$pofoslider1.' a.second-btn:hover, .pofo-slider1-'.$pofoslider1.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container height-100 width-100 pofo-image-style1 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider1-'.$pofoslider1.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide cover-background'.$srcset_classes.'"'.$background_image.$srcset_data.'>';

                                    // Overlay div
                                    if($show_overlay=='1'){
                                        $output .= '<div class="bg-black bg-overlay"'.$overlay_style.'></div>';
                                    }

                                    $output .= '<div class="container position-relative full-screen">';
                                        $output .= '<div class="slider-typography text-center">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( !empty( $slide->pofo_content ) ){
                                                        $output .= '<div class="text-very-light-gray padding-ten-lr font-weight-300 margin-two-bottom sm-margin-four-bottom xs-margin-five-bottom last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                                    }
                                                    if( !empty( $slide->pofo_title ) ){
                                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-white font-weight-700 letter-spacing-minus-3 margin-two-bottom width-60 center-col md-width-80 sm-margin-four-bottom xs-width-90 xs-margin-five-bottom xs-letter-spacing-0'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                    }
                                                    if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                        $output .= '<div class="btn-dual">';
                                                            if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                                $output .= '<a class="btn btn-transparent-white btn-small xs-margin-two-all first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                            }
                                                            if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                                $output .= '<a class="btn btn-transparent-white btn-small xs-margin-two-all second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider2':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h2';

                    $pofoslider2 = !empty( $pofoslider2 ) ? $pofoslider2 : 0;
                    $pofoslider2 = $pofoslider2 + 1;

                        // Slider height
                        if( !empty( $pofo_slider_height ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' { height: '.$pofo_slider_height.' !important; }';   
                        }

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.first-btn:hover, .pofo-slider2-'.$pofoslider2.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.first-btn:hover, .pofo-slider2-'.$pofoslider2.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.first-btn, .pofo-slider2-'.$pofoslider2.' a.first-btn:hover, .pofo-slider2-'.$pofoslider2.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.second-btn:hover, .pofo-slider2-'.$pofoslider2.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.second-btn:hover, .pofo-slider2-'.$pofoslider2.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider2-'.$pofoslider2.' a.second-btn, .pofo-slider2-'.$pofoslider2.' a.second-btn:hover, .pofo-slider2-'.$pofoslider2.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container width-100 swiper-container-horizontal pofo-image-style2 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider2-'.$pofoslider2.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide cover-background'.$srcset_classes.'"'.$background_image.$srcset_data.'>';
                                    
                                    // Overlay div
                                    if($show_overlay=='1'){
                                        $output .= '<div class="bg-extra-dark-gray bg-overlay"'.$overlay_style.'></div>';
                                    }

                                    $output .= '<div class="container position-relative one-fourth-screen xs-height-400px">';
                                        $output .= '<div class="slider-typography text-center">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( !empty( $slide->pofo_content ) ){
                                                        $output .= '<div class="text-large text-very-light-gray font-weight-300 width-95 center-col margin-25px-bottom xs-margin-15px-bottom display-block last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                                    }
                                                    if( !empty( $slide->pofo_title ) ){
                                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-white font-weight-700 width-75 xs-width-95 center-col margin-35px-bottom xs-margin-15px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                    }
                                                    if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                        $output .= '<div class="btn-dual">';
                                                            if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                                $output .= '<a class="btn btn-white btn-rounded btn-medium xs-margin-two-all first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                            }
                                                            if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                                $output .= '<a class="btn btn-white btn-rounded btn-medium xs-margin-two-all second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider3':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h2';

                    $pofoslider3 = !empty( $pofoslider3 ) ? $pofoslider3 : 0;
                    $pofoslider3 = $pofoslider3 + 1;

                        // Slider height
                        if( !empty( $pofo_slider_height ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' { height: '.$pofo_slider_height.' !important; }';   
                        }

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.first-btn:hover, .pofo-slider3-'.$pofoslider3.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.first-btn:hover, .pofo-slider3-'.$pofoslider3.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.first-btn, .pofo-slider3-'.$pofoslider3.' a.first-btn:hover, .pofo-slider3-'.$pofoslider3.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.second-btn:hover, .pofo-slider3-'.$pofoslider3.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.second-btn:hover, .pofo-slider3-'.$pofoslider3.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider3-'.$pofoslider3.' a.second-btn, .pofo-slider3-'.$pofoslider3.' a.second-btn:hover, .pofo-slider3-'.$pofoslider3.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $pofo_slider_class .= !empty( $classes ) ? ' ' . implode( ' ', $classes ) : '';

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container width-100 height-100 pofo-image-style3 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider3-'.$pofoslider3.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide cover-background'.$srcset_classes.'"'.$background_image.$srcset_data.'>';

                                    // Overlay div
                                    if($show_overlay=='1'){
                                        $output .= '<div class="bg-extra-dark-gray bg-overlay"'.$overlay_style.'></div>';
                                    }

                                    $output .= '<div class="container position-relative full-screen">';
                                        $output .= '<div class="col-md-12 slider-typography text-left xs-text-center">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( !empty( $slide->pofo_title ) ){
                                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-extra-dark-gray font-weight-700 letter-spacing-minus-1 line-height-80 width-55 margin-35px-bottom md-width-60 sm-width-70 md-line-height-auto xs-width-100 xs-margin-15px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                    }
                                                    if( !empty( $slide->pofo_content ) ){
                                                        $output .= '<div class="text-extra-dark-gray text-large margin-four-bottom width-40 md-width-50 sm-width-60 xs-width-100 xs-margin-15px-bottom'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                                    }
                                                    if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                        $output .= '<div class="btn-dual">';
                                                            if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                                $output .= '<a class="btn btn-white btn-rounded btn-small no-margin-lr first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                            }
                                                            if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                                $output .= '<a class="btn btn-transparent-white btn-rounded btn-small margin-20px-lr xs-margin-5px-top second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider4':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h5';

                    $pofoslider4 = !empty( $pofoslider4 ) ? $pofoslider4 : 0;
                    $pofoslider4 = $pofoslider4 + 1;

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.first-btn:hover, .pofo-slider4-'.$pofoslider4.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.first-btn:hover, .pofo-slider4-'.$pofoslider4.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.first-btn, .pofo-slider4-'.$pofoslider4.' a.first-btn:hover, .pofo-slider4-'.$pofoslider4.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.second-btn:hover, .pofo-slider4-'.$pofoslider4.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.second-btn:hover, .pofo-slider4-'.$pofoslider4.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider4-'.$pofoslider4.' a.second-btn, .pofo-slider4-'.$pofoslider4.' a.second-btn:hover, .pofo-slider4-'.$pofoslider4.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-auto-height-container position-relative width-100 pofo-image-style4 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider4-'.$pofoslider4.'">';
                        $output .= '<div class="swiper-wrapper overflow-hidden">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide padding-100px-all cover-background position-relative xs-padding-35px-all'.$srcset_classes.'"'.$background_image.$srcset_data.'>';
                                    $output .= '<div class="position-relative width-40 md-width-60 sm-width-85 xs-width-100 display-inline-block slide-banner">';
                                        $output .= '<div class="padding-80px-all bg-black-opacity sm-padding-40px-all xs-padding-30px-all xs-width-100 xs-text-center"'.$pofo_content_bg_color.'>';
                                            if( !empty( $slide->pofo_title ) ){
                                                $output .= '<'.$pofo_title_element_tag.' class="alt-font text-white width-90 sm-width-100'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                            }
                                            if( !empty( $slide->pofo_content ) ){
                                                $output .= '<div class="width-90 xs-width-100'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                            }
                                            if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                $output .= '<div class="btn-dual">';
                                                    if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                        $output .= '<a class="no-margin-left btn btn-small btn-white first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                    }
                                                    if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                        $output .= '<a class="btn btn-small btn-transparent-white first-btn second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                    }
                                                $output .= '</div>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_navigation == 1 ) {

                            $pofo_navigation_bg_color   = !empty( $pofo_navigation_bg_color ) ? ' style="background-color: ' . $pofo_navigation_bg_color . ';"' : '';
                            $pofo_navigation_color      = !empty( $pofo_navigation_color ) ? ' style="color: ' . $pofo_navigation_color . ';"' : '';

                            $output .= '<div class="navigation-area">';
                                $output .= '<div class="swiper-button-next swiper-next-style4 bg-primary text-white swiper-next-' . $navigation_unique_id . '"'.$pofo_navigation_bg_color.'><i class="fas fa-arrow-up" aria-hidden="true"'.$pofo_navigation_color.'></i></div>
                                            <div class="swiper-button-prev swiper-prev-style4 swiper-prev-' . $navigation_unique_id . '"'.$pofo_navigation_bg_color.'><i class="fas fa-arrow-down" aria-hidden="true"'.$pofo_navigation_color.'></i></div>';
                            $output .= '</div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider5':

                $explode_image = !empty( $image_gallery ) ? explode(",",$image_gallery) : array();

                if( !empty( $explode_image ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h1';

                    $pofoslider5 = !empty( $pofoslider5 ) ? $pofoslider5 : 0;
                    $pofoslider5 = $pofoslider5 + 1;

                    $pofo_icon_type         = !empty( $pofo_icon_type ) ? $pofo_icon_type : '';
                    $pofo_icon_color        = !empty( $pofo_icon_color ) ? 'color: ' . $pofo_icon_color . ';' : '';
                    $pofo_icon_hover_color  = !empty( $pofo_icon_hover_color ) ? 'background-color: ' . $pofo_icon_hover_color . ';' : '';
               
                    if( !empty( $pofo_icon_color ) ){
                        $pofo_featured_array[] = '.pofo-slider5-'.$pofoslider5.' .social-icon-style-5-light ul li a { '.$pofo_icon_color.' }';   
                    }
                    if( !empty( $pofo_icon_hover_color ) ){
                        $pofo_featured_array[] = '.pofo-slider5-'.$pofoslider5.' .social-icon-style-5-light ul li a:hover { '.$pofo_icon_hover_color.' }';   
                    }

                    $pofo_fb_url = !empty( $pofo_fb_url ) ? $social_data['facebook'] = $pofo_fb_url : '';
                    $pofo_tw_url = !empty( $pofo_tw_url ) ? $social_data['twitter'] = $pofo_tw_url : '';
                    $pofo_gp_url = !empty( $pofo_gp_url ) ? $social_data['gplus'] = $pofo_gp_url : '';
                    $pofo_db_url = !empty( $pofo_db_url ) ? $social_data['dribbble'] = $pofo_db_url : '';
                    $pofo_li_url = !empty( $pofo_li_url ) ? $social_data['linkedin'] = $pofo_li_url : '';
                    $pofo_ig_url = !empty( $pofo_ig_url ) ? $social_data['instagram'] = $pofo_ig_url : '';
                    $pofo_tb_url = !empty( $pofo_tb_url ) ? $social_data['tumblr'] = $pofo_tb_url : '';
                    $pofo_pi_url = !empty( $pofo_pi_url ) ? $social_data['pinterest'] = $pofo_pi_url : '';
                    $pofo_yt_url = !empty( $pofo_yt_url ) ? $social_data['youtube'] = $pofo_yt_url : '';
                    $pofo_vm_url = !empty( $pofo_vm_url ) ? $social_data['vimeo'] = $pofo_vm_url : '';
                    $pofo_sc_url = !empty( $pofo_sc_url ) ? $social_data['soundcloud'] = $pofo_sc_url : '';
                    $pofo_fk_url = !empty( $pofo_fk_url ) ? $social_data['flickr'] = $pofo_fk_url : '';
                    $pofo_rss_url = !empty( $pofo_rss_url ) ? $social_data['rss'] = $pofo_rss_url : '';
                    $pofo_rd_url = !empty( $pofo_rd_url ) ? $social_data['reddit'] = $pofo_rd_url : '';
                    $pofo_bh_url = !empty( $pofo_bh_url ) ? $social_data['behance'] = $pofo_bh_url : '';
                    $pofo_vine_url = !empty( $pofo_vine_url ) ? $social_data['vine'] = $pofo_vine_url : '';
                    $pofo_gh_url = !empty( $pofo_gh_url ) ? $social_data['github'] = $pofo_gh_url : '';
                    $pofo_xing_url = !empty( $pofo_xing_url ) ? $social_data['xing'] = $pofo_xing_url : '';
                    $pofo_vk_url = !empty( $pofo_vk_url ) ? $social_data['vk'] = $pofo_vk_url : '';
                    $pofo_yelp_url = !empty( $pofo_yelp_url ) ? $social_data['yelp'] = $pofo_yelp_url : '';
                    $pofo_discord_url = !empty( $pofo_discord_url ) ? $social_data['discord'] = $pofo_discord_url : '';
                    $pofo_email_url = !empty( $pofo_email_url ) ? $social_data['email'] = $pofo_email_url : '';

                    if( !empty( $pofo_social_sorting ) ) {

                        // Get sorted social icons            
                        $social_data = pofo_get_sorted_social_data( $pofo_social_sorting, $social_data );
                    }

                    // Get all social icons
                    $social_icons = pofo_get_social_icons();

                    $output .= '<div class="position-relative full-screen pofo-slider5-'.$pofoslider5.'">';

                        if( !empty( $pofo_title ) || !empty( $pofo_subtitle ) || !empty( $social_data ) ) {
                           
                            $output .= '<div class="absolute-middle-center text-center z-index-2 xs-width-95">';
                                if( !empty( $pofo_subtitle ) ) {
                                    $output .= '<span class="text-large text-very-light-gray font-weight-300 width-95 center-col margin-25px-bottom display-block xs-width-85'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>'.$pofo_subtitle.'</span>';
                                }
                                if( !empty( $pofo_title ) ) {
                                    $output .= '<'.$pofo_title_element_tag.' class="alt-font text-white font-weight-700 width-75 md-width-100 center-col margin-20px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$pofo_title.'</'.$pofo_title_element_tag.'>';
                                }
                                if( !empty( $social_data ) ) {
                                    $output .= '<div class="social-icon-style-5-light padding-20px-top xs-no-padding-top">';
                                        $output .= '<ul class="margin-20px-tb '.$pofo_icon_type.'">';
                                            foreach( $social_data as $key => $social_url ) {
                                                
                                                $key = !empty( $social_icons[$key] ) ? $social_icons[$key] : '';

                                                if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                                    $icon_class = 'fas fa-'.esc_html( $key );
                                                } else{
                                                    $icon_class = 'fab fa-'.esc_html( $key );
                                                }
                                                $output .= '<li><a class="'.esc_html( $key ).'" href="'.esc_url( $social_url ).'" target="_blank"><i class="'.$icon_class.'"></i><span></span></a></li>';
                                            }
                                            if( !empty( $pofo_custom_link ) ) :
                                                $output .= nl2br( rawurldecode( base64_decode( strip_tags( $pofo_custom_link ) ) ) );
                                            endif;
                                        $output .= '</ul>';
                                    $output .= '</div>';
                                }
                            $output .= '</div>';
                        }

                        $pofo_image_srcset  = !empty( $pofo_image_srcset ) ? $pofo_image_srcset : 'full';

                        $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container pofo-image-style5 full-screen '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.'">';
                            $output .= '<div class="swiper-wrapper">';

                                foreach ($explode_image as $key => $value) {

                                    // Image Alt, Title, Caption
                                    $img_alt            = !empty( $value ) ? pofo_option_image_alt($value) : array();
                                    $img_title          = !empty( $value ) ? pofo_option_image_title($value) : array();
                                    $image_alt          = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
                                    $image_title        = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

                                    $image_url = !empty( $value ) ? wp_get_attachment_image_src($value, $pofo_image_srcset) : array();
                                    $srcset = $srcset_data = $srcset_classes = '';
                                    $srcset = !empty( $value ) ? wp_get_attachment_image_srcset( $value, $pofo_image_srcset ) : array();
                                    if( $srcset ){
                                        $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                        $srcset_classes = ' bg-image-srcset';
                                    }
                                    $background_image = !empty( $image_url[0] ) ? ' style="background-image:url('.$image_url[0].')"' : '';

                                    $output .= '<div class="swiper-slide cover-background full-screen'.$srcset_classes.'"'.$background_image.$srcset_data.'>';

                                        // Overlay div
                                        if($show_overlay=='1'){
                                            $output .= '<div class="bg-extra-dark-gray bg-overlay z-index-0"'.$overlay_style.'></div>';
                                        }

                                    $output .= '</div>';
                                }

                            $output .= '</div>';

                            if( $show_pagination == 1 ) {
                                $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                                $class_name = 'swiper-pagination-' . $navigation_unique_id;
                                $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                                $slider_config .= "pagination: '." . $class_name . "',";
                                $slider_config .= "paginationType: 'bullets',";
                            }
                            if( $show_navigation == 1 ) {
                                
                                if( $show_navigation_style == 1 ) {
                                    $navigation_style_class = ' swiper-button-black-highlight';
                                } else if( $show_navigation_style == 2 ) {
                                    $navigation_style_class = ' swiper-button-white-highlight';
                                } else {
                                    $navigation_style_class = ' slider-long-arrow-white';
                                }

                                $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                            <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                            
                                $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                                $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                            }

                        $output .= '</div>';
                        
                    $output .= '</div>';
                }
            break;

            case 'pofo-slider6':

                $shadow_img_class = ($pofo_enable_box_shadow == '1')? ' class="box-shadow-large"' : '';
                $pagination_class = $show_pagination == 1 ? ' pagination-bottom-space' : '';
                
                if( !empty( $pofo_image_slides_style_seven ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';

                    $pofo_image_slides = json_decode( urldecode( $pofo_image_slides_style_seven ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container pofo-image-style6 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.$pagination_class.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                                // Image Alt, Title, Caption
                                $img_alt            = !empty( $slide->pofo_image ) ? pofo_option_image_alt($slide->pofo_image) : array();
                                $img_title          = !empty( $slide->pofo_image ) ? pofo_option_image_title($slide->pofo_image) : array();
                                $image_alt          = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
                                $image_title        = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

                                $srcset = $srcset_data = $sizes = $sizes_data = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                                if( $srcset ){
                                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                }

                                $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                                if( $sizes ){
                                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                }

                                $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                $pofo_image_link    = !empty( $slide->pofo_image_link ) ? $slide->pofo_image_link : '';
                                $pofo_link_target_attr  = ( !empty( $slide->pofo_image_link_target ) && $slide->pofo_image_link_target != 'one_page' ) ? ' target="'.$slide->pofo_image_link_target.'"' : '';
                                $section_link_class     = !empty( $slide->pofo_image_link_target ) && $slide->pofo_image_link_target == 'one_page' ? ' section-link' : '';

                                if( !empty( $image_url ) ) {

                                    $output .= '<div class="swiper-slide">';
                                        if( !empty( $pofo_image_link ) ) {
                                            $output .= '<a class="pofo-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_image_link ).'">';
                                        }
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$shadow_img_class.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                                        if( !empty( $pofo_image_link ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</div>';
                                }
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        
                        if( $show_center_slide == 1 ) {
                            $slider_config .= "centeredSlides: true,";
                            $slider_config .= "loopedSlides: 3,";
                            if( $autoloop == 1 ) {
                                $slider_config .= "loopAdditionalSlides: 3,";
                            }
                        }
                        if( !empty( $slides_per_group_desktop ) ) {
                            $slider_config .= "slidesPerGroup: ".$slides_per_group_desktop.",";
                        }
                        if( !empty( $space_between_slide_desktop ) ) {
                            $slider_config .= "spaceBetween: ".$space_between_slide_desktop.",";
                        }
                        //$slider_config .= "autoplayDisableOnInteraction: true,";
                        //$slider_config .= "allowTouchMove: false,";
                        $slider_config .= "slidesPerView: '".$slides_per_view_desktop."',";
                        $slider_config .= "breakpoints: { 1199: { slidesPerView: '".$slides_per_view_mini_desktop."', ".$slides_per_group_mini_desktop." ".$space_between_slide_mini_desktop." }, 991: { slidesPerView: '".$slides_per_view_tablet."', ".$slides_per_group_tablet." ".$space_between_slide_tablet." }, 767: { slidesPerView: '".$slides_per_view_mobile."', ".$slides_per_group_mobile." ".$space_between_slide_mobile." }, },";
                    $output .= '</div>';
                }
            break;

            case 'pofo-slider7':

                if( !empty( $pofo_image_slides_style_seven ) ) {

                    $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h2';

                    $pofoslider7 = !empty( $pofoslider7 ) ? $pofoslider7 : 0;
                    $pofoslider7 = $pofoslider7 + 1;

                    // Slider height
                    if( !empty( $pofo_slider_height ) ){
                        $pofo_featured_array[] = '.pofo-slider7-'.$pofoslider7.' { height: '.$pofo_slider_height.' !important; }';   
                    }

                    $pofo_image_slides = json_decode( urldecode( $pofo_image_slides_style_seven ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container height-100 width-100 white-move swiper-container-horizontal pofo-image-style2 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider7-'.$pofoslider7.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                                // Image Alt, Title, Caption
                                $img_alt            = !empty( $slide->pofo_image ) ? pofo_option_image_alt($slide->pofo_image) : array();
                                $img_title          = !empty( $slide->pofo_image ) ? pofo_option_image_title($slide->pofo_image) : array();
                                $image_alt          = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ;
                                $image_title        = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';        

                                $srcset = $srcset_data = $sizes = $sizes_data = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                                if( $srcset ){
                                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                }

                                $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                                if( $sizes ){
                                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                }

                                $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                $pofo_image_link= !empty( $slide->pofo_image_link ) ? $slide->pofo_image_link : '';
                                $pofo_link_target_attr  = ( !empty( $slide->pofo_image_link_target ) && $slide->pofo_image_link_target != 'one_page' ) ? ' target="'.$slide->pofo_image_link_target.'"' : '';
                                $section_link_class     = !empty( $slide->pofo_image_link_target ) && $slide->pofo_image_link_target == 'one_page' ? ' section-link' : '';

                                if( !empty( $image_url ) ) {

                                    $output .= '<div class="swiper-slide" data-swiper-slide-index="0">';
                                        $output .= '<div class="container-fluid no-padding">';
                                            $output .= '<div class="col-lg-12 no-padding text-center">';
                                                if( !empty( $pofo_image_link ) ) {
                                                    $output .= '<a class="pofo-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_image_link ).'">';
                                                }
                                                    $output .= '<img src="'.$image_url.'" class="width-100" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                                                if( !empty( $pofo_image_link ) ) {
                                                    $output .= '</a>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';

                                }
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider8':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_dynamic_font_size .= empty( $pofo_title_element_tag ) ? ' title-medium' : '';
                    $pofo_title_element_tag = !empty( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';

                    $pofoslider8 = !empty( $pofoslider8 ) ? $pofoslider8 : 0;
                    $pofoslider8 = $pofoslider8 + 1;

                        // Slider height
                        if( !empty( $pofo_slider_height ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' { height: '.$pofo_slider_height.' !important; }';   
                        }

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.first-btn:hover, .pofo-slider8-'.$pofoslider8.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.first-btn:hover, .pofo-slider8-'.$pofoslider8.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.first-btn, .pofo-slider8-'.$pofoslider8.' a.first-btn:hover, .pofo-slider8-'.$pofoslider8.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.second-btn:hover, .pofo-slider8-'.$pofoslider8.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.second-btn:hover, .pofo-slider8-'.$pofoslider8.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider8-'.$pofoslider8.' a.second-btn, .pofo-slider8-'.$pofoslider8.' a.second-btn:hover, .pofo-slider8-'.$pofoslider8.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container height-100 width-100 pofo-image-style1 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider8-'.$pofoslider8.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide cover-background'.$srcset_classes.'"'.$background_image.$srcset_data.'>';

                                    // Overlay div
                                    if($show_overlay=='1'){
                                        $output .= '<div class="bg-black bg-overlay"'.$overlay_style.'></div>';
                                    }

                                    $output .= '<div class="container position-relative full-screen">';
                                        $output .= '<div class="slider-typography text-center">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( !empty( $slide->pofo_content ) ){
                                                        $output .= '<div class="alt-font text-very-light-gray letter-spacing-1 padding-ten-lr margin-three-bottom last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                                    }
                                                    if( !empty( $slide->pofo_title ) ){
                                                        $output .= '<'.$pofo_title_element_tag.' class="alt-font text-white font-weight-600 letter-spacing-minus-1 margin-three-bottom width-60 center-col md-width-80 sm-margin-four-bottom xs-width-90 xs-margin-five-bottom xs-letter-spacing-0'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                    }
                                                    if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                        $output .= '<div class="btn-dual">';
                                                            if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                                $output .= '<a class="btn btn-transparent-white btn-medium xs-margin-two-all border-radius-4 first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                            }
                                                            if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                                $output .= '<a class="btn btn-transparent-white btn-medium xs-margin-two-all border-radius-4 second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                            }
                                                        $output .= '</div>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;

            case 'pofo-slider9':

                if( !empty( $pofo_image_slides ) ) {

                    $pofo_title_dynamic_font_size .= empty( $pofo_title_element_tag ) ? ' title-medium' : '';
                    $pofo_title_element_tag = !empty( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';

                    $pofoslider9 = !empty( $pofoslider9 ) ? $pofoslider9 : 0;
                    $pofoslider9 = $pofoslider9 + 1;

                        // Slider height
                        if( !empty( $pofo_slider_height ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' { height: '.$pofo_slider_height.' !important; }';   
                        }

                        // First Button Color Settings
                        if( !empty( $pofo_first_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.first-btn { '.$pofo_first_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.first-btn { '.$pofo_first_button_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.first-btn:hover, .pofo-slider9-'.$pofoslider9.' a.first-btn:focus { '.$pofo_first_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_first_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.first-btn:hover, .pofo-slider9-'.$pofoslider9.' a.first-btn:focus { '.$pofo_first_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_first_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.first-btn, .pofo-slider9-'.$pofoslider9.' a.first-btn:hover, .pofo-slider9-'.$pofoslider9.' a.first-btn:focus { '.$pofo_first_button_border_color.' }';   
                        }

                        // Second Button Color Settings
                        if( !empty( $pofo_second_button_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.second-btn { '.$pofo_second_button_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.second-btn { '.$pofo_second_button_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_bg_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.second-btn:hover, .pofo-slider9-'.$pofoslider9.' a.second-btn:focus { '.$pofo_second_button_hover_bg_color.' }';   
                        }
                        if( !empty( $pofo_second_button_hover_text_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.second-btn:hover, .pofo-slider9-'.$pofoslider9.' a.second-btn:focus { '.$pofo_second_button_hover_text_color.' }';   
                        }
                        if( !empty( $pofo_second_button_border_color ) ){
                            $pofo_featured_array[] = '.pofo-slider9-'.$pofoslider9.' a.second-btn, .pofo-slider9-'.$pofoslider9.' a.second-btn:hover, .pofo-slider9-'.$pofoslider9.' a.second-btn:focus { '.$pofo_second_button_border_color.' }';   
                        }

                    $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

                    $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container height-100 width-100 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.' pofo-slider9-'.$pofoslider9.'">';
                        $output .= '<div class="swiper-wrapper">';

                            foreach ($pofo_image_slides as $slide) {

                                /* Image Alt, Title, Caption */
                                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();
                                $srcset = $srcset_data = $srcset_classes = '';
                                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : array();
                                if( $srcset ){
                                    $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
                                    $srcset_classes = ' bg-image-srcset';
                                }
                                $background_image = !empty( $thumb[0] ) ? ' style="background-image:url('.$thumb[0].')"' : '';

                                $pofo_first_button_config   = !empty( $slide->pofo_first_button_config ) ? $slide->pofo_first_button_config : '';
                                $pofo_second_button_config  = !empty( $slide->pofo_second_button_config ) ? $slide->pofo_second_button_config : '';

                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_first_button_section_link_class = $pofo_second_button_section_link_class = '';

                                /* Slide button */
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_first_button_config)) {
                                    //First button
                                    $pofo_first_button_parse_args = vc_parse_multi_attribute($pofo_first_button_config);
                                    $pofo_first_button_link     = ( isset($pofo_first_button_parse_args['url']) ) ? $pofo_first_button_parse_args['url'] : '#';
                                    $pofo_first_button_title    = ( isset($pofo_first_button_parse_args['title']) ) ? $pofo_first_button_parse_args['title'] : '';
                                    $pofo_first_button_target   = ( isset($pofo_first_button_parse_args['target']) ) ? trim($pofo_first_button_parse_args['target']) : '_self';
                                    $pofo_first_button_target   = !empty( $pofo_first_button_target ) ? ' target="' . $pofo_first_button_target . '"' : '';

                                    if( !empty( $slide->pofo_first_button_one_page ) && $slide->pofo_first_button_one_page == 1 ) {

                                        $pofo_first_button_section_link_class = ' section-link';
                                        $pofo_first_button_target = '';
                                    }
                                }
                                if ( (function_exists('vc_parse_multi_attribute') && $pofo_second_button_config != '')) {
                                    $pofo_second_button_parse_args = vc_parse_multi_attribute($pofo_second_button_config);
                                    $pofo_second_button_link     = ( isset($pofo_second_button_parse_args['url']) ) ? $pofo_second_button_parse_args['url'] : '#';
                                    $pofo_second_button_title    = ( isset($pofo_second_button_parse_args['title']) ) ? $pofo_second_button_parse_args['title'] : '';
                                    $pofo_second_button_target   = ( isset($pofo_second_button_parse_args['target']) ) ? trim($pofo_second_button_parse_args['target']) : '_self';
                                    $pofo_second_button_target   = !empty( $pofo_second_button_target ) ? ' target="' . $pofo_second_button_target . '"' : '';

                                    if( !empty( $slide->pofo_second_button_one_page ) && $slide->pofo_second_button_one_page == 1 ) {

                                        $pofo_second_button_section_link_class = ' section-link';
                                        $pofo_second_button_target = '';
                                    }
                                }

                                $output .= '<div class="swiper-slide">';
                                    $output .= '<div class="col-md-6 col-sm-6 col-xs-12 bg-deep-pink height-700px xs-height-250px"'.$pofo_content_bg_color.'>';
                                        $output .= '<div class="display-table width-100 height-100">';
                                            $output .= '<div class="display-table-cell vertical-align-middle text-left padding-twelve-all xs-padding-five-all">';
                                                if( !empty( $slide->pofo_title ) ){
                                                    $output .= '<'.$pofo_title_element_tag.' class="title-large text-white margin-auto alt-font font-weight-600 letter-spacing-minus-3'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                }
                                                if( !empty( $slide->pofo_content ) ) {
                                                    $pofo_content_dynamic_font_size .= $pofo_content_strikethrough == 1 ? ' text-middle-line' : '';
                                                    $output .= '<div class="text-large font-weight-300 margin-30px-top width-65 md-width-75 sm-width-90 text-white display-block xs-margin-15px-top'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                                }
                                                if( !empty( $slide->pofo_no_button ) && ( $pofo_first_button_config || $pofo_second_button_config ) ){
                                                    $output .= '<div class="btn-dual margin-35px-top">';
                                                        if( $slide->pofo_no_button && $pofo_first_button_config ){
                                                            $output .= '<a class="btn btn-transparent-white btn-medium xs-margin-two-all no-margin-lr first-btn'.$pofo_first_button_section_link_class.'" href="'.$pofo_first_button_link.'"'.$pofo_first_button_target.'>'.$pofo_first_button_title.'</a>';
                                                        }
                                                        if( $slide->pofo_no_button == 'twobutton' && $pofo_second_button_config ){
                                                            $output .= '<a class="btn btn-white btn-medium xs-margin-two-all second-btn'.$pofo_second_button_section_link_class.'" href="'.$pofo_second_button_link.'"'.$pofo_second_button_target.'>'.$pofo_second_button_title.'</a>';
                                                        }
                                                    $output .= '</div>';
                                                }
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                    $output .= '<div class="col-md-6 col-sm-6 col-xs-12 no-padding-lr cover-background height-700px xs-height-400px'.$srcset_classes.'"'.$background_image.$srcset_data.'></div>';
                                $output .= '</div>';
                            }

                        $output .= '</div>';

                        if( $show_pagination == 1 ) {
                            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
                            $class_name = 'swiper-pagination-' . $navigation_unique_id;
                            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= "paginationType: 'bullets',";
                        }
                        if( $show_navigation == 1 ) {
                            
                            if( $show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
                        }

                    $output .= '</div>';
                }
            break;
        }

        /* Add custom script Start*/
        $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
        ( $autoplay == 1 ) ? $slider_config .= 'autoplay: '.$slidedelay.',' : $slider_config .= 'autoplay: false,';
        ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';
        
        if( $slider_premade_style == 'pofo-slider4' ) {
            $slider_config .= 'autoHeight: true,';
            $slider_config .= 'effect: "fade",';
            $slider_config .= "fade: { crossFade: true },";
        } else {
            ( $transition_style && $transition_style != 'slide') ? $slider_config .= 'effect: "'.$transition_style .'",' : '';
            if( $transition_style == 'fade' && $slider_premade_style != 'pofo-slider5' ) {
                $slider_config .= "fade: { crossFade: true },";
            }
        }

        ob_start();?>
        $(document).ready(function () { var imageSliderID = "<?php echo str_replace( '-', '_', $pofo_slider_id ); ?>"; setTimeout(function () { imageSliderID = new Swiper('#<?php echo $pofo_slider_id; ?>', { <?php echo $slider_config;?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); /* If Internet Explorer, return version number */ if( msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if( $( '#<?php echo $pofo_slider_id; ?>' ).length > 0 ){ imageSliderID.onResize(); } }); }, 300); } $(window).resize(function () { setTimeout(function () { if ($( '#<?php echo $pofo_slider_id; ?>' ).length > 0){ imageSliderID.onResize(); } }, 500); }); });
        <?php 
        $pofo_slider_script .= ob_get_contents();
        ob_end_clean();

        /* Add custom script End*/
        return $output;
    }
}
add_shortcode( 'pofo_slider', 'pofo_slider_shortcode' );