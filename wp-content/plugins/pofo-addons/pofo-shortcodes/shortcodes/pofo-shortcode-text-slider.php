<?php

$pofo_slider_unique_id = 1;
if ( ! function_exists( 'pofo_text_slider_shortcode' ) ) {
    function pofo_text_slider_shortcode( $atts, $content = null ) {
        
        global $pofo_slider_unique_id, $pofo_featured_array, $pofo_slider_script, $pofo_text_slider_style2;

       	extract( 
       		shortcode_atts( 
       			array(
                    'text_slider_style' => '',
                    'pofo_text_slides' => '',
                    'pofo_show_pagination' => '1',
                    'pofo_show_navigation' => '1',
                    'pofo_show_navigation_style' => '',
                    'pofo_show_cursor_color_style' => '',
                    'pofo_show_strikethrough' => '1',
                    'autoloop' => '',
                    'autoplay' => '',
                    'slidedelay' => '3000',
                    'slidespeed' => '',
                    'pofo_slider_id' => '',
                    'pofo_slider_class' => '',

                    'pofo_number_color' => '',
                    'pofo_button_color' => '',
                    'pofo_button_hover_color' => '',
                    'pofo_button_text_color' => '',
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
                    'pofo_subtitle_element_tag' => '',
                    'pofo_subtitle_color' => '',
                    'pofo_subtitle_enable_responsive_font' => '',
                    'pofo_content_font_size' => '',
                    'pofo_content_line_height' => '',
                    'pofo_content_letter_spacing' => '',
                    'pofo_content_font_weight' => '',
                    'pofo_content_color' => '',
                    'pofo_content_enable_responsive_font' => '',
                ), $atts
            )
       	);

        $output = $slider_config = $slider_class = $pofo_title_style_attr = $pofo_subtitle_style_attr = $pofo_content_style_attr = '';
        $pofo_title_style_array = $pofo_subtitle_style_array = $pofo_content_style_array = array();

        if( !empty( $pofo_text_slides ) ) {

            $pofo_text_slides = json_decode( urldecode( $pofo_text_slides ) );
            $text_slider_style = ( $text_slider_style ) ? $text_slider_style : '';
            $pofo_show_cursor_color_style= ( $pofo_show_cursor_color_style ) ? ' '.$pofo_show_cursor_color_style : ' black-move';
            $pofo_number_color = !empty( $pofo_number_color ) ? ' style="color: ' . $pofo_number_color . ';"' : '';

            // Check if slider id and class
            $pofo_slider_unique_id  = !empty( $pofo_slider_unique_id ) ? $pofo_slider_unique_id : 1;
            $pofo_slider_id         = ( $pofo_slider_id ) ? $pofo_slider_id : 'text-slider';
            $pofo_slider_id         .= '-' . $pofo_slider_unique_id;
            $pofo_slider_unique_id++;

            $pofo_slider_class      = ( $pofo_slider_class ) ?  ' ' . $pofo_slider_class . ' ' . $text_slider_style : ' ' . $text_slider_style;

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

            // For Content Style
            !empty( $pofo_content_font_size ) ? $pofo_content_style_array[] = 'font-size: ' . $pofo_content_font_size . ';' : '';
            !empty( $pofo_content_line_height ) ? $pofo_content_style_array[] = 'line-height: ' . $pofo_content_line_height . ';' : '';
            !empty( $pofo_content_letter_spacing ) ? $pofo_content_style_array[] = 'letter-spacing: ' . $pofo_content_letter_spacing . ';' : '';
            !empty( $pofo_content_font_weight ) ? $pofo_content_style_array[] = 'font-weight: ' . $pofo_content_font_weight . ';' : '';
            !empty( $pofo_content_color ) ? $pofo_content_style_array[] = 'color: '.$pofo_content_color.';' : '';

            $pofo_content_dynamic_font_size = $pofo_content_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
            $pofo_content_style_attr   = pofo_get_style_attribute( $pofo_content_style_array, $pofo_content_font_size, $pofo_content_line_height );

            //For Button Style
            $pofo_button_color= ($pofo_button_color) ? ' background-color: '.$pofo_button_color.' !important; ' : '';
            $pofo_button_hover_color= ($pofo_button_hover_color) ? ' background-color: '.$pofo_button_hover_color.' !important; ' : '';
            $pofo_button_text_color= ($pofo_button_text_color) ? ' color: '.$pofo_button_text_color.' !important; ' : '';
            $pofo_button_hover_text_color= ($pofo_button_hover_text_color) ? ' color: '.$pofo_button_hover_text_color.' !important; ' : '';
            $pofo_button_border_color= ($pofo_button_border_color) ? ' border-color: '.$pofo_button_border_color.' !important; ' : '';

            switch ($text_slider_style) {
                case 'pofo-text-slider1':

                    $strike_line_class = $pofo_show_strikethrough == 1 ? ' text-middle-line' : '';

            		$output .='<div id="'.$pofo_slider_id.'" class="swiper-container swiper-number-pagination swiper-container-horizontal '.$pofo_slider_id.' '.$pofo_show_cursor_color_style.$pofo_slider_class.'">';
                        $output .='<div class="bg-transparent-white opacity-full-dark z-index-5 sm-display-none"></div>';
                        $output .='<div class="swiper-wrapper">';

                            $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                            foreach ($pofo_text_slides as $slide) {
                              
                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $output .= '<div class="swiper-slide">';
                                    $output .= '<div class="slider-half-small-screen position-relative bg-white">';
                                        $output .= '<div class="slider-typography text-left">';
                                            $output .= '<div class="slider-text-middle-main">';
                                                $output .= '<div class="slider-text-middle">';
                                                    if( !empty( $slide->pofo_title ) ){
                                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-large font-weight-300 text-deep-pink display-block margin-two-bottom width-50 xs-width-65'.$strike_line_class.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                                    }
                                                    if( !empty( $slide->pofo_content ) ){
                                                        $output .= '<h2 class="text-extra-dark-gray width-50 display-inline-block font-weight-300 letter-spacing-minus-1 md-width-70 xs-width-80 last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . $slide->pofo_content . '</h2>';
                                                    }
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';

                            }

                        $output .='</div>';

                        if( $pofo_show_pagination == 1 ) {
                            $class_name = 'swiper-pagination-' . $pofo_slider_unique_id;
                            $output .='<div class="swiper-pagination swiper-number ' . $class_name . '"></div>';

                            $slider_config .= "pagination: '." . $class_name . "',";
                            $slider_config .= 'paginationClickable: true,';

                            $slider_config .= 'paginationBulletRender: function (swiper, index, className) { var page_number = index + 1; page_number = (page_number < 10) ? \'0\' + page_number.toString() : page_number.toString(); return \'<span class="\' + className + \'">\' + page_number + \'</span>\'; },';
                        }

                    $output .='</div>';
                break;

                case 'pofo-text-slider2':

                    //Custom css start
                    $pofo_text_slider_style2 = !empty( $pofo_text_slider_style2 ) ? $pofo_text_slider_style2 : 0;
                    $pofo_text_slider_style2 = $pofo_text_slider_style2 + 1;

                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.text-slider-style2-'.$pofo_text_slider_style2.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.text-slider-style2-'.$pofo_text_slider_style2.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.text-slider-style2-'.$pofo_text_slider_style2.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.text-slider-style2-'.$pofo_text_slider_style2.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.text-slider-style2-'.$pofo_text_slider_style2.' a.btn { '.$pofo_button_border_color.' }';   
                    }

                    $output .='<div id="'.$pofo_slider_id.'" class="swiper-container text-center content-right-slider text-slider-style2-'.$pofo_text_slider_style2.' '.$pofo_slider_id.' '.$pofo_show_cursor_color_style.$pofo_slider_class.'">';
                        $output .='<div class="swiper-wrapper">';

                            $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'h4';
                                $pofo_subtitle_element_tag = ( $pofo_subtitle_element_tag ) ? $pofo_subtitle_element_tag : 'p';
                            $i = 0;
                            foreach ($pofo_text_slides as $slide) {
                              
                                $i++;
                                // Replace || to <br /> in title
                                $slide_title = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                                $pofo_button_parse_args = !empty( $slide->pofo_button_config ) ? vc_parse_multi_attribute( $slide->pofo_button_config ) : '';
                                $pofo_button_link       = ( isset($pofo_button_parse_args['url']) ) ? $pofo_button_parse_args['url'] : '#';
                                $pofo_button_title      = ( isset($pofo_button_parse_args['title']) ) ? $pofo_button_parse_args['title'] : '';
                                $pofo_button_target     = ( isset($pofo_button_parse_args['target']) ) ? trim($pofo_button_parse_args['target']) : '_self';
                                $pofo_button_target     = !empty( $pofo_button_target ) ? ' target="' . $pofo_button_target . '"' : '';

                                $section_link_class = '';
                                if( !empty( $slide->pofo_button_one_page ) && $slide->pofo_button_one_page == 1 ) {

                                    $section_link_class = ' section-link';
                                    $pofo_button_target = '';
                                }

                                $output .= '<div class="swiper-slide last-paragraph-no-margin">';
                                    $output .= '<div class="padding-eighteen-all md-padding-eight-all sm-padding-thirteen-all xs-padding-15px-lr">';
                                        $output .= '<div class="margin-30px-bottom text-center position-relative">';
                                            $output .= '<span class="title-large alt-font font-weight-100 text-dark-gray opacity4"'.$pofo_number_color.'>'.str_pad($i, 2, 0, STR_PAD_LEFT).'</span>';
                                            if( !empty( $slide->pofo_subtitle ) ){
                                                $output .= '<'.$pofo_subtitle_element_tag.' class="alt-font font-weight-600 text-deep-pink position-absolute left-0 right-0 top-35 sm-top-25 xs-top-12'.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.$slide->pofo_subtitle.'</'.$pofo_subtitle_element_tag.'>';
                                            }
                                        $output .= '</div>';
                                        if( !empty( $slide->pofo_title ) ){
                                            $output .= '<'.$pofo_title_element_tag.' class="alt-font text-dark-gray'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                        }
                                        if( !empty( $slide->pofo_content ) ){
                                            $output .= '<div class="width-90 sm-width-95 xs-width-85 center-col last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . $slide->pofo_content . '</div>';
                                        }
                                        if($pofo_button_title){
                                            $output .= '<a class="btn btn-small btn-dark-gray margin-35px-top'.$section_link_class.'"'.$pofo_button_target.' href="'.esc_url( $pofo_button_link ).'">';
                                            $output .= $pofo_button_title;
                                            $output .= '</a>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            }

                        $output .='</div>';

                        if( $pofo_show_navigation == 1 ) {
                            
                            if( $pofo_show_navigation_style == 1 ) {
                                $navigation_style_class = ' swiper-button-black-highlight';
                            } else if( $pofo_show_navigation_style == 2 ) {
                                $navigation_style_class = ' swiper-button-white-highlight';
                            } else {
                                $navigation_style_class = ' slider-long-arrow-white';
                            }

                            $output .= '<div class="swiper-button-next swiper-next-' . $pofo_slider_unique_id . $navigation_style_class . '"></div>
                                        <div class="swiper-button-prev swiper-prev-' . $pofo_slider_unique_id . $navigation_style_class . '"></div>';
                                        
                            $slider_config .= "nextButton: '.swiper-next-" . $pofo_slider_unique_id . "',";
                            $slider_config .= "prevButton: '.swiper-prev-" . $pofo_slider_unique_id . "',";
                        }

                    $output .='</div>';
                break;
            }
         
            /* Add custom script Start*/
            $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
            $slidespeed = ( $slidespeed ) ? $slidespeed : '';

            ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
            ( $autoplay == 1 ) ? $slider_config .= 'autoplay: '.$slidedelay.', autoplayDisableOnInteraction: false,' : $slider_config .= 'autoplay: false,';
            ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';

        	ob_start();?>
            $(document).ready(function () { var textSliderID = "<?php echo str_replace( '-', '_', $pofo_slider_id ); ?>"; setTimeout(function () { textSliderID = new Swiper('#<?php echo $pofo_slider_id; ?>', { <?php echo $slider_config;?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); /* If Internet Explorer, return version number */ if( msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if( $( '#<?php echo $pofo_slider_id; ?>' ).length > 0 ){ textSliderID.onResize(); } }); }, 300); } $(window).resize(function () { setTimeout(function () { if ($( '#<?php echo $pofo_slider_id; ?>' ).length > 0){ textSliderID.onResize(); } }, 500); }); });
            <?php 
        	$pofo_slider_script .= ob_get_contents();
        	ob_end_clean();

        }
        return $output;
    }
}
add_shortcode( 'pofo_text_slider', 'pofo_text_slider_shortcode' );