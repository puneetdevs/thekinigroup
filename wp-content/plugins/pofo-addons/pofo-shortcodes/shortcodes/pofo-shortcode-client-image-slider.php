<?php
/**
 * Shortcode For Client Image Slider
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$pofo_slider_parent_type = '';
$pofo_slider_unique_id = 1;
function pofo_client_image_slider_shortcode( $atts, $content = null ) {
    
    global $pofo_slider_unique_id, $pofo_slider_script;

    extract( shortcode_atts( array(
                'pofo_image_slides' => '',
                'show_pagination' => '1',
                'show_pagination_style' => '',
                'show_pagination_color_style' => '',
                'show_navigation' => '1',
                'show_navigation_style' => '',
                'show_cursor_color_style' => '',
                'slides_per_view_desktop' => '4',
                'slides_per_view_mini_desktop' => '3',
                'slides_per_view_tablet' => '2',
                'slides_per_view_mobile' => '1',
                'autoloop' => '',
                'autoplay' => '',
                'slidedelay' => '',
                'slidespeed' => '',
                'pofo_slider_id' => '',
                'pofo_slider_class' => '',
            ), $atts ) );

    $output  = $slider_config = $slider_class ='';

    if( !empty( $pofo_image_slides ) ) {

        $pofo_image_slides          = json_decode( urldecode( $pofo_image_slides ) );

        $show_pagination_color_style= ( $show_pagination_color_style ) ? ' swiper-pagination-white' : ' swiper-pagination-black';
        $show_cursor_color_style= ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' black-move';
        $slides_per_view_desktop= !empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '4';
        $slides_per_view_mini_desktop= !empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
        $slides_per_view_tablet = !empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
        $slides_per_view_mobile = !empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

        // Check if slider id and class
        $pofo_slider_unique_id  = !empty( $pofo_slider_unique_id ) ? $pofo_slider_unique_id : 1;
        $navigation_unique_id   = $pofo_slider_unique_id;
        $pofo_slider_id         = ( $pofo_slider_id ) ? $pofo_slider_id : 'pofo-client-image-slider';
        $pofo_slider_id         .= '-' . $pofo_slider_unique_id;
        $pofo_slider_unique_id++;

        $pofo_slider_class      = ( $pofo_slider_class ) ? $pofo_slider_class : '';

        $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container '.$pofo_slider_id.' '.$show_cursor_color_style.$pofo_slider_class.'">';
            $output .= '<div class="swiper-wrapper">';
                
            foreach( $pofo_image_slides as $slide ) {

                /* Image Alt, Title, Caption */
                $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
                
                $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                $srcset = $srcset_data = $sizes = $sizes_data = '';
                $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                if( $srcset ){
                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                }

                $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                if( $sizes ){
                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                }

                $output .= '<div class="swiper-slide slide-content-middle text-center">';
                    if( !empty( $thumb[0] ) ){
                        $output .= '<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                    }
                $output .= '</div>';
            }

            $output .= '</div>';

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

        if( $show_pagination == 1 ) {
            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
            $class_name = 'swiper-pagination-' . $navigation_unique_id;
            $output .= '<div class="swiper-pagination '.$show_pagination_color_style. ' ' . $class_name . $pagination_style_class . '"></div>';

            $slider_config .= "pagination: '." . $class_name . "',";
            $slider_config .= "paginationType: 'bullets',";
        }

        /* Add custom script Start*/
        $slidedelay = ( $slidedelay ) ? $slidedelay : '3000';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        $slider_config .= "autoplayStopOnLast: true,";
        $slider_config .= "autoplayDisableOnInteraction: false,";
        $slider_config .= "paginationClickable: true,";
        $slider_config .= "keyboardControl: true,";
        $slider_config .= "mousewheelControl: false,";
        $slider_config .= "slidesPerView: ".$slides_per_view_desktop.",";
        $slider_config .= "breakpoints: { 1199: { slidesPerView: ".$slides_per_view_mini_desktop." }, 991: { slidesPerView: ".$slides_per_view_tablet." }, 767: { slidesPerView: ".$slides_per_view_mobile." }, },";
        ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
        ( $autoplay == 1 ) ? $slider_config .= 'autoplay: '.$slidedelay.',' : $slider_config .= 'autoplay: false,';
        ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';
        
    	ob_start();?>
        $(document).ready(function () { var clientSliderID = "<?php echo str_replace( '-', '_', $pofo_slider_id ); ?>"; setTimeout(function () { clientSliderID = new Swiper('#<?php echo $pofo_slider_id; ?>', { <?php echo $slider_config;?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); /* If Internet Explorer, return version number */ if( msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if( $( '#<?php echo $pofo_slider_id; ?>' ).length > 0 ){ clientSliderID.onResize(); } }); }, 300); } $(window).resize(function () { setTimeout(function () { if ($( '#<?php echo $pofo_slider_id; ?>' ).length > 0){ clientSliderID.onResize(); } }, 500); }); });
        <?php
    	$pofo_slider_script .= ob_get_contents();
    	ob_end_clean();
    }

	/* Add custom script End*/
    return $output;
}
add_shortcode( 'pofo_client_image_slider', 'pofo_client_image_slider_shortcode' );