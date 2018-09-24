<?php
/**
 * Shortcode For Testimonial Slider
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$pofo_slider_unique_id = 1;
function pofo_testimonial_slider_shortcode( $atts, $content = null ) {
    
    global $pofo_slider_unique_id, $pofo_slider_script;

    extract( shortcode_atts( array(
            'pofo_slider_style' => '',
            'pofo_testimonial_slides' => '',
            'pofo_box_bg_color' => '',
            'show_pagination' => '1',
            'show_pagination_style' => '',
            'show_pagination_color_style' => '',
            'show_navigation' => '1',
            'show_navigation_style' => '',
            'show_cursor_color_style' => '',
            'transition_style' => '',

            'slides_per_view_desktop' => '3',
            'slides_per_view_mini_desktop' => '3',
            'slides_per_view_tablet' => '2',
            'slides_per_view_mobile' => '1',
            'autoloop' => '',
            'autoplay' => '',
            'slidedelay' => '',
            'slidespeed' => '',
            'pofo_slider_id' => '',
            'pofo_slider_class' => '',

            'pofo_title_font_size' => '',
            'pofo_title_line_height' => '',
            'pofo_title_letter_spacing' => '',
            'pofo_title_font_weight' => '',
            'pofo_title_italic' => '',
            'pofo_title_underline' => '',
            'pofo_title_element_tag' => '',
            'pofo_title_color' => '',
            'pofo_title_enable_responsive_font' => '',
            'pofo_designation_font_size' => '',
            'pofo_designation_line_height' => '',
            'pofo_designation_letter_spacing' => '',
            'pofo_designation_font_weight' => '',
            'pofo_designation_italic' => '',
            'pofo_designation_underline' => '',
            'pofo_designation_element_tag' => '',
            'pofo_designation_color' => '',
            'pofo_designation_enable_responsive_font' => '',
            'pofo_content_font_size' => '',
            'pofo_content_line_height' => '',
            'pofo_content_letter_spacing' => '',
            'pofo_content_font_weight' => '',
            'pofo_content_color' => '',
            'pofo_content_enable_responsive_font' => '',
        ), $atts ) );

    $output = $slider_config = $slider_class = $pofo_title_style_attr = $pofo_designation_style_attr = $pofo_content_style_attr = $stars = '';
    $pofo_title_style_array = $pofo_designation_style_array = $pofo_content_style_array = array();

    if( !empty( $pofo_testimonial_slides ) ) {

        $pofo_box_bg_color = !empty( $pofo_box_bg_color ) ? ' style="background-color: '. $pofo_box_bg_color .';"' : '';
        $pofo_testimonial_slides = json_decode( urldecode( $pofo_testimonial_slides ) );
        $transition_style = ( $transition_style ) ? $transition_style : '';
        $show_pagination_color_style= ( $show_pagination_color_style ) ? ' swiper-pagination-white' : ' swiper-pagination-black';
        $show_cursor_color_style = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style.' ' : ' white-move ';
        $slides_per_view_desktop= !empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '3';
        $slides_per_view_mini_desktop= !empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
        $slides_per_view_tablet = !empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
        $slides_per_view_mobile = !empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

        // Check if slider id and class
        $pofo_slider_unique_id  = !empty( $pofo_slider_unique_id ) ? $pofo_slider_unique_id : 1;
        $navigation_unique_id   = $pofo_slider_unique_id;
        $pofo_slider_id         = ( $pofo_slider_id ) ? $pofo_slider_id : 'testimonial-slider';
        $pofo_slider_id         .= '-' . $pofo_slider_unique_id;
        $pofo_slider_unique_id++;

        $pofo_slider_style      = ( $pofo_slider_style ) ? $pofo_slider_style : '';
        $pofo_slider_class      = ( $pofo_slider_class ) ? $pofo_slider_class . ' ' . $pofo_slider_style : $pofo_slider_style;
        
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

        // For Designation Style
        !empty( $pofo_designation_font_size ) ? $pofo_designation_style_array[] = 'font-size: ' . $pofo_designation_font_size . ';' : '';
        !empty( $pofo_designation_line_height ) ? $pofo_designation_style_array[] = 'line-height: ' . $pofo_designation_line_height . ';' : '';
        !empty( $pofo_designation_letter_spacing ) ? $pofo_designation_style_array[] = 'letter-spacing: ' . $pofo_designation_letter_spacing . ';' : '';
        !empty( $pofo_designation_font_weight ) ? $pofo_designation_style_array[] = 'font-weight: ' . $pofo_designation_font_weight . ';' : '';
        ( $pofo_designation_italic == 1 ) ? $pofo_designation_style_array[] = 'font-style: italic;' : '';
        ( $pofo_designation_underline == 1 ) ? $pofo_designation_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_designation_color ) ? $pofo_designation_style_array[] = 'color: '.$pofo_designation_color.';' : '';

        $pofo_designation_dynamic_font_size = $pofo_designation_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_designation_style_attr   = pofo_get_style_attribute( $pofo_designation_style_array, $pofo_designation_font_size, $pofo_designation_line_height );

        // For Content Style
        !empty( $pofo_content_font_size ) ? $pofo_content_style_array[] = 'font-size: ' . $pofo_content_font_size . ';' : '';
        !empty( $pofo_content_line_height ) ? $pofo_content_style_array[] = 'line-height: ' . $pofo_content_line_height . ';' : '';
        !empty( $pofo_content_letter_spacing ) ? $pofo_content_style_array[] = 'letter-spacing: ' . $pofo_content_letter_spacing . ';' : '';
        !empty( $pofo_content_font_weight ) ? $pofo_content_style_array[] = 'font-weight: ' . $pofo_content_font_weight . ';' : '';
        !empty( $pofo_content_color ) ? $pofo_content_style_array[] = 'color: '.$pofo_content_color.';' : '';

        $pofo_content_dynamic_font_size = $pofo_content_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_content_style_attr   = pofo_get_style_attribute( $pofo_content_style_array, $pofo_content_font_size, $pofo_content_line_height );

        switch ( $pofo_slider_style ) {

            case 'style-1':

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'p';
                $pofo_designation_element_tag = ( $pofo_designation_element_tag ) ? $pofo_designation_element_tag : 'p';
                $pagination_class = $show_pagination == 1 ? ' pagination-bottom-space' : '';

                $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container xs-text-center testimonial-style1 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.$show_pagination_color_style.$pagination_class.'">
                                <div class="swiper-wrapper">';
                            
                        foreach ($pofo_testimonial_slides as $slide) {
                        
                            /* Image Alt, Title, Caption */
                            $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                            $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                            $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                            $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
                            
                            // Replace || to <br /> in title
                            $slide_title    = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                            $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                            $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                            $srcset = $srcset_data = $sizes_data = '';
                            $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                            if( $srcset ){
                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                            }

                            $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                            if( $sizes ){
                                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                            }

                            $output .= '<div class="swiper-slide">';
                                $output .= '<div class="col-md-7 col-sm-10 col-xs-12 center-col">';
                                    $output .= '<div class="col-md-3 col-sm-3 col-xs-12 display-table">';
                                        $output .= '<div class="display-table-cell vertical-align-middle">';
                                            if( !empty( $thumb[0] ) ){
                                                $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' class="border-radius-100 width-150px xs-width-100px xs-margin-15px-bottom"/>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                    $output .= '<div class="col-md-8 col-sm-8 col-xs-12 text-left xs-text-center margin-20px-left xs-no-margin-left display-table">';
                                        $output .= '<div class="display-table-cell vertical-align-middle">';
                                            if( !empty( $slide->pofo_content ) ){
                                                $output .= '<div class="margin-15px-bottom last-paragraph-no-margin'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop( $slide->pofo_content ) ) . '</div>';
                                            }
                                            if( !empty( $slide_title ) ){
                                                $output .= '<'.$pofo_title_element_tag.' class="text-dark-gray alt-font text-small no-margin-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        }

                $output .= '    </div>';
            
                break;

            case 'style-2':

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'p';
                $pofo_designation_element_tag = ( $pofo_designation_element_tag ) ? $pofo_designation_element_tag : 'p';

                $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container black-move swiper-pagination-bottom testimonial-style2 '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.$show_pagination_color_style.'">
                                <div class="swiper-wrapper">';

                    foreach ($pofo_testimonial_slides as $slide) {
                    
                        /* Image Alt, Title, Caption */
                        $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                        $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                        $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                        // Replace || to <br /> in title
                        $slide_title    = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                        $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                        $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                        $srcset = $srcset_data = $sizes_data = '';
                        $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }

                        $output .= '<div class="swiper-slide">';
                        
                            $output .= '<div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 center-col">';
                                $output .= '<div class="testimonia-block width-90 xs-width-100 center-col text-center">';
                                    $output .= '<div class="bg-light-gray text-center padding-60px-all border-radius-6 xs-padding-20px-all xs-padding-25px-bottom"' . $pofo_box_bg_color . '>';
                                        if( !empty( $slide->pofo_content ) ){
                                            $output .= '<div class="'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop($slide->pofo_content) ) . '</div>';
                                        }
                                    $output .= '</div>';
                                    $output .= '<div class="profile-box">';
                                        if( !empty( $thumb[0] ) ){
                                            $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' class="width-20 xs-center-col border-radius-100 border-color-white border-width-4 border-solid margin-15px-bottom"/>';
                                        }
                                        if( !empty( $slide_title ) ){
                                            $output .= '<'.$pofo_title_element_tag.' class="alt-font text-small font-weight-600 text-black margin-5px-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                        }
                                        if( !empty( $slide->pofo_designation ) ){
                                            $output .= '<'.$pofo_designation_element_tag.' class="no-margin text-extra-small text-medium-gray'.$pofo_designation_dynamic_font_size.'"'.$pofo_designation_style_attr.'>'.$slide->pofo_designation.'</'.$pofo_designation_element_tag.'>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    }
                $output .= '    </div>';
            
                break;

            case 'style-3':

                $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
                $pofo_designation_element_tag = ( $pofo_designation_element_tag ) ? $pofo_designation_element_tag : 'span';

                $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container swiper-pagination-bottom testimonial-style3 '.$pofo_slider_id.' '.$show_cursor_color_style.' '.$pofo_slider_class.$show_pagination_color_style.'">';
                    $output .= '<div class="swiper-wrapper">';
                        
                        foreach ($pofo_testimonial_slides as $slide) {

                            /* Image Alt, Title, Caption */
                            $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                            $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                            $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                            $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                            $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                            $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src($slide->pofo_image, $pofo_image_srcset) : array();

                            $srcset = $srcset_data = $sizes_data = '';
                            $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                            if( $srcset ){
                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                            }

                            $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                            if( $sizes ){
                                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                            }

                            $pofo_member_name   = !empty( $slide->pofo_member_name ) ? $slide->pofo_member_name : '';
                            $pofo_member_des    = !empty( $slide->pofo_member_des ) ? $slide->pofo_member_des : '';

                            // Replace || to <br /> in title
                            $slide_title    = !empty( $slide->pofo_title ) ? str_replace('||', '<br />',$slide->pofo_title) : '';

                            $output .= '<div class="swiper-slide sm-margin-four-bottom padding-15px-lr">';
                                $output .= '<div class="margin-half-all bg-white box-shadow-light text-center padding-fourteen-all xs-padding-30px-all"' . $pofo_box_bg_color . '>';
                                    if( !empty( $thumb[0] ) ){
                                        $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom"/>';
                                    }
                                    if( !empty( $slide->pofo_content ) ){
                                        $output .= '<div class="sm-margin-15px-bottom xs-margin-20px-bottom'.$pofo_content_dynamic_font_size.'"'.$pofo_content_style_attr.'>' . do_shortcode( pofo_remove_wpautop($slide->pofo_content) ) . '</div>';
                                    }
                                    if( !empty( $slide_title ) ){
                                        $output .= '<'.$pofo_title_element_tag.' class="text-extra-dark-gray text-small display-block line-height-10 alt-font font-weight-600'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.$slide_title.'</'.$pofo_title_element_tag.'>';
                                    }
                                    if( !empty( $slide->pofo_designation ) ){
                                        $output .= '<'.$pofo_designation_element_tag.' class="text-light-gray2 text-extra-small text-medium-gray'.$pofo_designation_dynamic_font_size.'"'.$pofo_designation_style_attr.'>'.$slide->pofo_designation.'</'.$pofo_designation_element_tag.'>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        }

                    $output .= '</div>';

                break;

            default:

                break; 
        }

        if( $show_pagination == 1 ) {
            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
            $class_name = 'swiper-pagination-' . $navigation_unique_id;
            $output .= '<div class="swiper-pagination text-center ' . $class_name . $pagination_style_class . '"></div>';

            $slider_config .= "pagination: '." . $class_name . "',";
            $slider_config .= "paginationType: 'bullets',";
        }
        if( $show_navigation == 1 && ( $pofo_slider_style == 'style-1' || $pofo_slider_style == 'style-2' ) ) {
            
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

        /* Add custom script Start*/
        $slidedelay = ( $slidedelay ) ? $slidedelay : '300';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        $slider_config .= "autoplayStopOnLast: true,";
        $slider_config .= "autoplayDisableOnInteraction: false,";
        $slider_config .= "paginationClickable: true,";
        $slider_config .= "keyboardControl: true,";
        $slider_config .= "mousewheelControl: false,";
        if( $transition_style == 'fade' ) {
            $slider_config .= "fade: { crossFade: true },";
        }
        ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
        ( $autoplay == 1 ) ? $slider_config .= 'autoplay: '.$slidedelay.',' : $slider_config .= 'autoplay: false,';
        ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';
        ( $transition_style && $transition_style != 'slide') ? $slider_config .= 'effect: "'.$transition_style .'",' : '';
        
        if( $pofo_slider_style == 'style-3' ) {

            $slider_config .= "slidesPerView: ".$slides_per_view_desktop.",";
            $slider_config .= "breakpoints: { 1199: { slidesPerView: ".$slides_per_view_mini_desktop." }, 991: { slidesPerView: ".$slides_per_view_tablet." }, 767: { slidesPerView: ".$slides_per_view_mobile." }, },";
        } else {
            $slider_config .= "slidesPerView: 1,";
        }

    	ob_start();?>
        $(document).ready(function () { var testimonialSliderID = "<?php echo str_replace( '-', '_', $pofo_slider_id ); ?>"; setTimeout(function () { testimonialSliderID = new Swiper('#<?php echo $pofo_slider_id; ?>', { <?php echo $slider_config;?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); /* If Internet Explorer, return version number */ if( msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if( $( '#<?php echo $pofo_slider_id; ?>' ).length > 0 ){ testimonialSliderID.onResize(); } }); }, 300); } $(window).resize(function () { setTimeout(function () { if ($( '#<?php echo $pofo_slider_id; ?>' ).length > 0){ testimonialSliderID.onResize(); } }, 500); }); });
        <?php 
    	$pofo_slider_script .= ob_get_contents();
    	ob_end_clean();
        /* Add custom script End*/

    }
    return $output;
}
add_shortcode( 'pofo_testimonial_slider', 'pofo_testimonial_slider_shortcode' );